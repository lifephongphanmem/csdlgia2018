<?php

namespace App\Http\Controllers\manage\kekhaigia\kkgiatacn;

use App\District;
use App\Jobs\SendMail;
use App\Model\manage\kekhaigia\kkgiatacn\KkGiaTaCn;
use App\Model\manage\kekhaigia\kkgiatacn\KkGiaTaCnCt;
use App\Model\manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDf;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\NgayNghiLe;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class KkGiaTaCnController extends Controller
{
    public function ttdn(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $modeldmnghe = DmNgheKd::where('manganh','TACN')
                    ->where('manghe','TACN')
                    ->first();
                if(session('admin')->level == 'T'){
                    $modeldv = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                }elseif(session('admin')->level == 'H'){
                    if(session('admin')->mahuyen == $modeldmnghe->mahuyen){
                        $modeldv = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
                        $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                    }else
                        return view('errors.perm');
                }else{
                    if(session('admin')->mahuyen == $modeldmnghe->mahuyen){
                        $modeldv = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
                        $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : session('admin')->maxa;
                    }else
                        return view('errors.perm');
                }
                $model = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                    ->where('company.trangthai','Kích hoạt')
                    ->where('companylvcc.manghe','TACN')
                    ->where('companylvcc.mahuyen',$inputs['maxa'])
                    ->join('town','town.maxa','=','companylvcc.mahuyen')
                    ->select('company.*','town.tendv')
                    ->get();

                $ttql = District::where('mahuyen',$modeldmnghe->mahuyen)
                    ->first();

                return view('manage.kkgia.dvtacn.kkgia.kkgiadv.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('ttql',$ttql)
                    ->with('pageTitle', 'Danh sách doanh nghiệp kê khai giá thức ăn chăn nuôi');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H'  || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

                $model = KkGiaTaCn::where('maxa', $inputs['masothue'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->orderBy('id', 'desc')
                    ->get();
                $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                    ->where('company.trangthai','Kích hoạt')
                    ->where('company.maxa',$inputs['masothue'])
                    ->where('companylvcc.manghe','TACN')
                    ->select('company.*','companylvcc.mahuyen')
                    ->first();

                if(isset($modeldn)) {
                    $modeldv = Town::where('maxa', $modeldn->mahuyen)
                        ->first();
                    $inputs['hsdd'] = KkGiaTaCn::where('maxa', $inputs['masothue'])->where('trangthai','DD')->count();
                    return view('manage.kkgia.dvtacn.kkgia.kkgiadv.index')
                        ->with('model', $model)
                        ->with('modeldn', $modeldn)
                        ->with('modeldv',$modeldv)
                        ->with('inputs',$inputs)
                        ->with('pageTitle', 'Danh sách hồ sơ kê khai giá thức ăn chăn nuôi');
                }else
                    return view('errors.perm');


            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X' || session('admin')->level == 'DN')
                $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
            else
                $inputs['masothue'] = session('admin')->maxa;
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.trangthai','Kích hoạt')
                ->where('company.maxa',$inputs['masothue'])
                ->where('companylvcc.manghe','TACN')
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $inputs['mahs'] = $inputs['masothue'].getdate()[0];
            if(isset($modeldn)) {
                $delctdf = KkGiaTaCnCt::where('maxa',$inputs['masothue'])
                    ->where('trangthai','CXD')->delete();
                $idlk = KkGiaTaCn::where('maxa',$inputs['masothue'])
                    ->where('trangthai','DD')
                    ->max('id');
                if(isset($idlk)){
                    $modellk = KkGiaTaCn::where('id',$idlk)
                        ->first();
                    $modellkct = KkGiaTaCnCt::where('mahs',$modellk->mahs)
                        ->get();
                    $inputs['socvlk'] = $modellk->socv;
                    $inputs['ngaycvlk'] = $modellk->ngaynhap;
                    foreach($modellkct as  $ctdf){
                        $addct = new KkGiaTaCnCt();
                        $addct->tenhh = $ctdf->tenhh;
                        $addct->qccl = $ctdf->qccl;
                        $addct->dvt = $ctdf->dvt;
                        $addct->dongialk = $ctdf->dongia;
                        $addct->maxa = $inputs['masothue'];
                        $addct->mahs = $inputs['mahs'];
                        $addct->trangthai = 'CXD';
//                        $addct->cpnvlttlk= $ctdf->cpnvltt;
//                        $addct->cpncttlk= $ctdf->cpnctt;
//                        $addct->cpsxclk= $ctdf->cpsxc;
//                        $addct->cpnvpxlk= $ctdf->cpnvpx;
//                        $addct->cpvllk= $ctdf->cpvl;
//                        $addct->cpdcsxlk= $ctdf->cpdcsx;
//                        $addct->cpkhtscdlk= $ctdf->cpkhtscd;
//                        $addct->cpdvmnlk= $ctdf->cpdvmn;
//                        $addct->cpbtklk= $ctdf->cpbtk;
//                        $addct->cpklk= $ctdf->cpk;
//                        $addct->tcpsxlk= $ctdf->tcpsx;
//                        $addct->cpbhlk= $ctdf->cpbh;
//                        $addct->cpqldnlk= $ctdf->cpqldn;
//                        $addct->cptclk= $ctdf->cptc;
//                        $addct->tgttblk= $ctdf->tgttb;
//                        $addct->lndklk= $ctdf->lndk;
//                        $addct->gbctlk= $ctdf->gbct;
//                        $addct->thuettdblk= $ctdf->thuettdb;
//                        $addct->thuegtgtlk= $ctdf->thuegtgt;
//                        $addct->gbdctlk= $ctdf->gbdct;
                        $addct->save();
                    }
                }
                $modelct = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
                    ->get();

                return view('manage.kkgia.dvtacn.kkgia.kkgiadv.create')
                    ->with('modeldn', $modeldn)
                    ->with('modelct',$modelct)
                    ->with('inputs', $inputs)
                    ->with('pageTitle', 'Kê khai giá thức ăn chăn nuôi thêm mới');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H'  || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                $model = new KkGiaTaCn();
                if($model->create($inputs)){
                    $modelctdf = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
                        ->update(['trangthai' => 'XD']);
                }
                return redirect('kekhaigiathucanchannuoi?&masothue='.$inputs['maxa']);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $model = KkGiaTaCn::findOrFail($id);
                $modelct = KkGiaTaCnCt::where('mahs',$model->mahs)
                    ->get();
                $modeldn = Company::where('maxa', $model->maxa)
                    ->first();

                return view('manage.kkgia.dvtacn.kkgia.kkgiadv.edit')
                    ->with('modeldn', $modeldn)
                    ->with('model',$model)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Chỉnh sửa kê khai giá thức ăn chăn nuôi');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model = KkGiaTaCn::findOrFail($id);
                if($model->update($inputs)){
                    $modelctdf = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
                        ->update(['trangthai' => 'XD']);
                }
                return redirect('kekhaigiathucanchannuoi?&masothue='.$model->maxa);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkGiaTaCn::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->first();
            $modelkkct = KkGiaTaCnCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modelkk->mahuyen)
                ->first();
            return view('manage.kkgia.dvtacn.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá thức ăn chăn nuôi');

        }else
            return view('errors.notlogin');
    }

    public function kiemtra(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => '"Ngày thực hiện mức giá kê khai không thể sử dụng được! Bạn cần chỉnh sửa lại thông tin trước khi chuyển", "Lỗi!!!"',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => '"Bạn cần đăng nhập tài khoản để chuyển hồ so", "Lỗi!!!"',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        $ngaychuyen = Carbon::now()->toDateTimeString();
        if(isset($inputs['id'])){
            $model = KkGiaTaCn::where('id',$inputs['id'])
                ->first();
            $date = date_create($ngaychuyen);
            if(date('H',strtotime($ngaychuyen)) >= '17')
                $datenew = date_modify($date, "+1 days");
            else
                $datenew = $date;

            $ngaychuyen = date_format($datenew, "Y-m-d");
            $ngayduyet = $model->ngayhieuluc;
            $ngaylv = 0;
//            dd($ngaychuyen.'-'.$ngayduyet);
            while (strtotime($ngaychuyen) <= strtotime($ngayduyet)) {
                $checkngay = NgayNghiLe::where('tungay', '<=', $ngaychuyen)
                    ->where('denngay', '>=', $ngaychuyen)->get();
                if (count($checkngay) > 0)
                    $ngaylv = $ngaylv;
                elseif (date('D', strtotime($ngaychuyen)) == 'Sat')
                    $ngaylv = $ngaylv;
                elseif (date('D', strtotime($ngaychuyen)) == 'Sun')
                    $ngaylv = $ngaylv;
                else
                    $ngaylv = $ngaylv + 1;
                //dd($ngaylv);
                $datestart = date_create($ngaychuyen);
                $datestartnew = date_modify($datestart, "+1 days");
                $ngaychuyen = date_format($datestartnew, "Y-m-d");

            }
            $modeldv = Town::where('maxa',$model->mahuyen)
                ->first();
            if ($ngaylv >= $modeldv->songaylv) {
                $result['message'] = '<div class="form-group" id="tthschuyen">';
                $result['message'] .= '<label> Số CV: '.$model->socv.'- Ngày áp dụng: '.getDayVn($model->ngayhieuluc).'</label>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';

            }else{
                $result['status'] = 'fail';
                $result['message'] = '"Ngày áp dụng hồ sơ không đủ điều kiện xét duyệt", "Lỗi!!!"';
            }
        }
        //dd($result);
        die(json_encode($result));
    }

    public function chuyen(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = KkGiaTaCn::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $modeldn = Company::where('maxa', $model->maxa)
                        ->first();
                    $modeldv = Town::where('maxa',$model->mahuyen)
                        ->first();
                    $dmnghe = DmNgheKd::where('manghe','TACN')
                        ->where('manganh','TACN')
                        ->first();
                    $tg = getDateTime(Carbon::now()->toDateTimeString());
                    $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp. Số công văn: '.$model->socv.
                        ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên lạc: '.$inputs['dtll'].'!!!';
                    $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                        ' Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên lạc: '.$inputs['dtll'].'!!!';
                    $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                    $run->handle();
                }
                return redirect('kekhaigiathucanchannuoi?&masothue='.$model->maxa);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function showlydo(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $model = KkGiaTaCn::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="showlydo">';
            $result['message'] = '<label>'.$model->lydo.'</lable>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = KkGiaTaCn::where('id',$inputs['iddelete'])
                    ->first();
                if($model->delete()){
                    $modelct = KkGiaTaCnCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaigiathucanchannuoi?&masothue='.$model->maxa);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.trangthai','Kích hoạt')
                ->where('company.maxa',$inputs['maxa'])
                ->where('companylvcc.manghe','TACN')
                ->select('company.*','companylvcc.mahuyen')
                ->first();
             return view('manage.kkgia.dvtacn.kkgia.kkgiadv.importexcel')
                ->with('inputs', $inputs)
                ->with('modeldn',$modeldn)
                ->with('pageTitle', 'Nhận dữ liệu Giá kê khai giá thức ăn chăn nuôi');
        }else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['masothue'] = $inputs['maxa'];
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.trangthai','Kích hoạt')
                ->where('company.maxa',$inputs['maxa'])
                ->where('companylvcc.manghe','TACN')
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];

            $filename = $inputs['maxa'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });
            //dd($data);
            for ($i = getDbl($inputs['tudong']); $i <= getDbl($inputs['dendong']); $i++) {
                //dd($data[$i]);
                if (!isset($data[$i][$inputs['tenhh']]) || $data[$i][$inputs['tenhh']] == '') {
                    continue;//Tên cán bộ rỗng => thoát
                }
                $modelctnew = new KkGiaTaCnCt();
                $modelctnew->maxa = $inputs['maxa'];
                $modelctnew->mahs = $inputs['mahs'];
                $modelctnew->trangthai = 'CXD';
                $modelctnew->tenhh = $data[$i][$inputs['tenhh']];
                $modelctnew->qccl = $data[$i][$inputs['qccl']];
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->dongialk = getDbl($data[$i][$inputs['dongialk']]);
                $modelctnew->dongia = getDbl($data[$i][$inputs['dongia']]);
                $modelctnew->save();
            }
            File::Delete($path);
            $modelct = KkGiaTaCnCt::where('mahs', $inputs['mahs'])
                ->get();
            return view('manage.kkgia.dvtacn.kkgia.kkgiadv.create')
                ->with('modeldn', $modeldn)
                ->with('modelct',$modelct)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Kê khai giá thức ăn chăn nuôi thêm mới');

        }else
            return view('errors.notlogin');
    }
}
