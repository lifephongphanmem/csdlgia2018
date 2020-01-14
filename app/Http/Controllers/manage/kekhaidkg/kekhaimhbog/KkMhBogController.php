<?php

namespace App\Http\Controllers\manage\kekhaidkg\kekhaimhbog;

use App\District;
use App\Jobs\SendMail;
use App\Model\manage\kekhaidkg\kehaimhbog\KkMhBog;
use App\Model\manage\kekhaidkg\kehaimhbog\KkMhBogCt;
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

class KkMhBogController extends Controller
{
    public function ttdn(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['mh'] = DmNgheKd::where('manganh','BOG')
                    ->where('manghe',$inputs['manghe'])
                    ->first()->tennghe;
                $modeldmnghe = DmNgheKd::where('manganh','BOG')
                    ->where('manghe',$inputs['manghe'])
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
                    ->join('town','town.maxa','=','companylvcc.mahuyen')
                    ->where('companylvcc.manghe',$inputs['manghe'])
                    ->where('companylvcc.mahuyen',$inputs['maxa'])
                    ->where('company.trangthai','Kích hoạt')
                    ->select('company.*','town.tendv')
                    ->get();

                $ttql = District::where('mahuyen',$modeldmnghe->mahuyen)
                    ->first();

                return view('manage.kkgia.dkg.kekhaimhbog.kekhai.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('ttql',$ttql)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách thông tin doanh nghiệp');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mh'] = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first()->tennghe;
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : '';
            else
                $inputs['maxa'] = session('admin')->maxa;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $model = KkMhBog::where('maxa', $inputs['maxa'])
                ->whereYear('ngaynhap', $inputs['nam'])
                ->where('phanloai',$inputs['manghe'])
                ->orderBy('id', 'desc')
                ->get();
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.trangthai','Kích hoạt')
                ->where('company.maxa',$inputs['maxa'])
                ->where('companylvcc.manghe',$inputs['manghe'])
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $modeldv = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            $inputs['hsdd'] = KkMhBog::where('maxa', $inputs['maxa'])
                ->where('phanloai',$inputs['manghe'])
                ->where('trangthai','DD')->count();
            return view('manage.kkgia.dkg.kekhaimhbog.kekhai.index')
                ->with('model', $model)
                ->with('modeldn', $modeldn)
                ->with('inputs',$inputs)
                ->with('modeldv',$modeldv)
                ->with('pageTitle', 'Danh sách hồ sơ giá kê khai mặt hàng BOG');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mh'] = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first()->tennghe;
            $delct = KkMhBogCt::where('trangthai', 'CXD')
                ->where('maxa', $inputs['maxa'])
                ->delete();
            $inputs['mahs'] = $inputs['manghe'] . '' . $inputs['maxa'] . getdate()[0];
            $modeldn = Company::join('companylvcc', 'companylvcc.maxa', '=', 'company.maxa')
                ->where('company.trangthai', 'Kích hoạt')
                ->where('company.maxa', $inputs['maxa'])
                ->where('companylvcc.manghe', $inputs['manghe'])
                ->select('company.*', 'companylvcc.mahuyen')
                ->first();
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $idhslk = KkMhBog::where('trangthai', 'DD')
                ->where('maxa', $inputs['maxa'])
                ->where('phanloai', $inputs['manghe'])
                ->max('id');
            if (isset($idhslk)) {
                $modellk = KkMhBog::where('id', $idhslk)
                    ->first();
                $modellkct = KkMhBogCt::where('mahs', $modellk->mahs)
                    ->get();
                $inputs['socvlk'] = $modellk->socv;
                $inputs['ngaycvlk'] = $modellk->ngaynhap;
                foreach ($modellkct as $ctdf) {
                    $addct = new KkMhBogCt();
                    $addct->tenhh = $ctdf->tenhh;
                    $addct->quycach = $ctdf->quycach;
                    $addct->dvt = $ctdf->dvt;
                    $addct->gialk = $ctdf->giakk;
                    $addct->giakk = $ctdf->giakk;
                    $addct->ghichu = $ctdf->ghichu;
                    $addct->maxa = $inputs['maxa'];
                    $addct->mahs = $inputs['mahs'];
                    $addct->trangthai = 'CXD';
                    $addct->save();
                }
            }
            $modelct = KkMhBogCt::where('mahs', $inputs['mahs'])
                ->get();
            $dmnghe = DmNgheKd::where('manghe', $inputs['manghe'])
                ->where('manganh', 'BOG')
                ->first();
            return view('manage.kkgia.dkg.kekhaimhbog.kekhai.create')
                ->with('modeldn', $modeldn)
                ->with('inputs', $inputs)
                ->with('modelct', $modelct)
                ->with('dmnghe', $dmnghe)
                ->with('pageTitle', 'Giá kê khai mặt hàng BOG');

        }
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
            $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
            if($inputs['ngaycvlk'] != '')
                $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
            else
                unset($inputs['ngaycvlk']);
            $inputs['trangthai'] = 'CC';
            if(isset($inputs['ipf1']) && $inputs['ipf1'] !='' ) {
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/kkdkg/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = new KkMhBog();
            if($model->create($inputs)){
                $modelct = KkMhBogCt::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('kkgiamhbog/?&manghe='.$inputs['phanloai'].'&maxa='.$inputs['maxa']);

        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkMhBog::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->first();
            $modelkkct = KkMhBogCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modelkk->mahuyen)
                ->first();
            return view('manage.kkgia.dkg.kekhaimhbog.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Giá kê khai mặt hàng BOG');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){

        if (Session::has('admin')) {
            //Kiểm tra có thuộc sự quản lý hay k

            $model = KkMhBog::findOrFail($id);
            $delct = KkMhBogCt::where('trangthai','CXD')
                ->where('maxa',$model->maxa)
                ->delete();
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.maxa',$model->maxa)
                ->where('companylvcc.manghe',$model->phanloai)
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $modelct = KkMhBogCt::where('mahs',$model->mahs)
                ->get();
            $dmnghe = DmNgheKd::where('manghe',$model->phanloai)
                ->where('manganh','BOG')
                ->first();
            return view('manage.kkgia.dkg.kekhaimhbog.kekhai.edit')
                ->with('modeldn', $modeldn)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('dmnghe',$dmnghe)
                ->with('pageTitle', 'Chỉnh sửa hồ sơ giá kê khai mặt hàng BOG');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (Session::has('admin')) {
                $inputs = $request->all();
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if ($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk'] = getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model = KkMhBog::findOrFail($id);
                if ($model->update($inputs)) {
                    $modelct = KkMhBogCt::where('mahs', $inputs['mahs'])
                        ->update(['trangthai' => 'XD']);
                }
                return redirect('kkgiamhbog/?&manghe=' . $inputs['phanloai'] . '&maxa=' . $inputs['maxa']);
            } else
                return view('errors.notlogin');
        }
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = KkMhBog::where('id',$inputs['iddelete'])
                ->first();
            if($model->delete()){
                $modelct = KkMhBogCt::where('mahs',$model->mahs)
                    ->delete();
            }
            return redirect('kkgiamhbog/?&manghe='.$model->phanloai.'&maxa='.$model->maxa);
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
        $inputs = $request->all();
        $ngaychuyen = Carbon::now()->toDateTimeString();
        if(isset($inputs['id'])){
            $model = KkMhBog::where('id',$inputs['id'])
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
            while (strtotime($ngaychuyen) < strtotime($ngayduyet)) {
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
//            dd($ngaylv.'-'.$modeldv->songaylv);
            if ($ngaylv >= $modeldv->songaylv) {
                $model = KkMhBog::where('id',$inputs['id'])
                    ->first();
                $result['message'] = '<div class="form-group" id="tthschuyen">';
                $result['message'] .= '<label> Số CV: '.$model->socv.'- Ngày áp dụng: '.getDayVn($model->ngayhieuluc).'</label>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';

            }else{
                $result['status'] = 'fail';
                $result['message'] = '"Ngày áp dụng hồ sơ không đủ điều kiện xét duyệt", "Lỗi!!!"';
            }
        }
        die(json_encode($result));
    }


    public function chuyen(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = KkMhBog::where('id',$inputs['idchuyen'])
                ->first();
            $inputs['trangthai'] = 'CD';
            $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
            $model->update($inputs);

            if($model->update($inputs)){
                $modeldn = Company::where('maxa', $model->maxa)
                    ->first();
                $modeldv = Town::where('maxa',$model->mahuyen)
                    ->first();
                $dmnghe = DmNgheKd::where('manghe',$model->phanloai)
                    ->where('manganh','BOG')
                    ->first();
                $tg = getDateTime(Carbon::now()->toDateTimeString());
                $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp. Số công văn: '.$model->socv.
                    ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên hệ: '.$inputs['dtll'].'!!!';
                $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                    ' Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên hệ: '.$inputs['dtll'].'!!!';
                $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                $run->handle();
                //dispatch($run);
            }
            return redirect('kkgiamhbog/?&manghe='.$model->phanloai.'&maxa='.$model->maxa);

        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mh'] = DmNgheKd::where('manghe',$inputs['manghe'])->first()->tennghe;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
            $model = KkMhBogCt::leftJoin('kkmhbog','kkmhbog.mahs','=','kkmhbogct.mahs')
                ->leftjoin('company','company.maxa','=','kkmhbog.maxa')
                ->whereYear('kkmhbog.ngayhieuluc',$inputs['nam'])
                ->select('kkmhbogct.*','company.tendn','kkmhbog.ngayhieuluc')
                ->where('phanloai',$inputs['manghe'])
                ->where('kkmhbog.trangthai','DD')
                ->where('company.trangthai','Kích hoạt');
            if($inputs['tenhh'] != '')
                $model = $model->where('kkmhbogct.tenhh','like','%'.$inputs['tenhh'].'%');
            $model = $model->get();

            return view('manage.kkgia.dkg.kekhaimhbog.timkiem.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Tìm kiếm thông tin giá kê khai ' .$inputs['mh']);
        }else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modeldn = Company::join('companylvcc', 'companylvcc.maxa', '=', 'company.maxa')
                ->where('company.trangthai', 'Kích hoạt')
                ->where('company.maxa', $inputs['maxa'])
                ->where('companylvcc.manghe', $inputs['manghe'])
                ->select('company.*', 'companylvcc.mahuyen')
                ->first();
            $dmnghe = DmNgheKd::where('manghe', $inputs['manghe'])
                ->where('manganh', 'BOG')
                ->first();
            return view('manage.kkgia.dkg.kekhaimhbog.kekhai.importexcel')
                ->with('inputs', $inputs)
                ->with('modeldn',$modeldn)
                ->with('dmnghe',$dmnghe)
                ->with('pageTitle', 'Nhận dữ liệu Giá kê khai mặt hàng BOG');
        }else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mh'] = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first()->tennghe;
            $delct = KkMhBogCt::where('trangthai', 'CXD')
                ->where('maxa', $inputs['maxa'])
                ->delete();
            $inputs['mahs'] = $inputs['manghe'] . '' . $inputs['maxa'] . getdate()[0];
            $modeldn = Company::join('companylvcc', 'companylvcc.maxa', '=', 'company.maxa')
                ->where('company.trangthai', 'Kích hoạt')
                ->where('company.maxa', $inputs['maxa'])
                ->where('companylvcc.manghe', $inputs['manghe'])
                ->select('company.*', 'companylvcc.mahuyen')
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
                $modelctnew = new KkMhBogCt();
                $modelctnew->maxa = $inputs['maxa'];
                $modelctnew->mahs = $inputs['mahs'];
                $modelctnew->trangthai = 'CXD';
                $modelctnew->tenhh = $data[$i][$inputs['tenhh']];
                $modelctnew->quycach = $data[$i][$inputs['quycach']];
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->gialk = getDbl($data[$i][$inputs['gialk']]);
                $modelctnew->giakk = getDbl($data[$i][$inputs['giakk']]);
                $modelctnew->save();
            }
            File::Delete($path);
            $modelct = KkMhBogCt::where('mahs', $inputs['mahs'])
                ->get();
            $dmnghe = DmNgheKd::where('manghe', $inputs['manghe'])
                ->where('manganh', 'BOG')
                ->first();
            return view('manage.kkgia.dkg.kekhaimhbog.kekhai.create')
                ->with('modeldn', $modeldn)
                ->with('inputs', $inputs)
                ->with('modelct', $modelct)
                ->with('dmnghe', $dmnghe)
                ->with('pageTitle', 'Giá kê khai mặt hàng BOG');

        }else
            return view('errors.notlogin');
    }
}
