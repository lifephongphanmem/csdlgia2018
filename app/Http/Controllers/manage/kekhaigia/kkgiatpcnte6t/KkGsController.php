<?php

namespace App\Http\Controllers\manage\kekhaigia\kkgiatpcnte6t;

use App\District;
use App\Jobs\SendMail;
use App\Model\manage\kekhaigia\kkgiatpcnte6t\KkGs;
use App\Model\manage\kekhaigia\kkgiatpcnte6t\KkGsCt;
use App\Model\manage\kekhaigia\kkgiatpcnte6t\KkGsCtDf;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\NgayNghiLe;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGsController extends Controller
{
    public function ttdn(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $modeldmnghe = DmNgheKd::where('manganh','TPCNTE6T')
                    ->where('manghe','TPCNTE6T')
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
                    ->where('companylvcc.manghe','TPCNTE6T')
                    ->where('companylvcc.mahuyen',$inputs['maxa'])
                    ->join('town','town.maxa','=','companylvcc.mahuyen')
                    ->select('company.*','town.tendv')
                    ->get();

                $ttql = District::where('mahuyen',$modeldmnghe->mahuyen)
                    ->first();

                return view('manage.kkgia.dvgs.kkgia.kkgiadv.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('ttql',$ttql)
                    ->with('pageTitle', 'Danh sách doanh nghiệp kê khai giá TPCN cho TE dưới 6 tuổi');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

                $model = KkGs::where('maxa', $inputs['masothue'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->orderBy('id', 'desc')
                    ->get();
                $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                    ->where('company.maxa',$inputs['masothue'])
                    ->where('companylvcc.manghe','TPCNTE6T')
                    ->select('company.*','companylvcc.mahuyen')
                    ->first();

                if(isset($modeldn)) {
                    $modeldv = Town::where('maxa', $modeldn->mahuyen)
                        ->first();
                    return view('manage.kkgia.dvgs.kkgia.kkgiadv.index')
                        ->with('model', $model)
                        ->with('modeldn', $modeldn)
                        ->with('modeldv',$modeldv)
                        ->with('inputs',$inputs)
                        ->with('pageTitle', 'Danh sách hồ sơ kê khai giá TPCN cho TE dưới 6 tuổi');
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
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                    ->where('company.maxa',$inputs['masothue'])
                    ->where('companylvcc.manghe','TPCNTE6T')
                    ->select('company.*','companylvcc.mahuyen')
                    ->first();
                if(isset($modeldn)) {
                    $delctdf = KkGsCtDf::where('maxa', $inputs['masothue'])->delete();
                    $idlk = KkGs::where('maxa', $inputs['masothue'])
                        ->where('trangthai', 'DD')
                        ->max('id');
                    if (isset($idlk)) {
                        $modellk = KkGs::where('id', $idlk)
                            ->first();
                        $modellkct = KkGsCt::where('mahs', $modellk->mahs)
                            ->get();
                        foreach ($modellkct as $ctdf) {
                            $addct = new KkGsCtDf();
                            $addct->tenhh = $ctdf->tenhh;
                            $addct->qccl = $ctdf->qccl;
                            $addct->dvt = $ctdf->dvt;
                            $addct->ghichu = $ctdf->ghichu;

                            $addct->giaQlk = $ctdf->giaQ;
                            $addct->giaClk = $ctdf->giaC;
                            $addct->giaCttlk = $ctdf->giaCtt;
                            $addct->giaCvtlk = $ctdf->giaCvt;
                            $addct->giaCnclk = $ctdf->giaCnc;
                            $addct->giaCkhlk = $ctdf->giaCkh;
                            $addct->giaCklk = $ctdf->giaCk;
                            $addct->giaCclk = $ctdf->giaCc;
                            $addct->giaCcmlk = $ctdf->giaCcm;
                            $addct->giaCtclk = $ctdf->giaCtc;
                            $addct->giaCbhlk = $ctdf->giaCbh;
                            $addct->giaCqllk = $ctdf->giaCql;
                            $addct->giaTClk = $ctdf->giaTC;
                            $addct->giaCPlk = $ctdf->giaCP;
                            $addct->giaZlk = $ctdf->giaZ;
                            $addct->giaZdvlk = $ctdf->giaZdv;

                            $addct->maxa = $ctdf->$inputs['masothue'];
                            $addct->save();
                        }
                    }
                    $modelct = KkGsCtDf::where('maxa', $inputs['masothue'])
                        ->get();

                    return view('manage.kkgia.dvgs.kkgia.kkgiadv.create')
                        ->with('modeldn', $modeldn)
                        ->with('inputs', $inputs)
                        ->with('modelct', $modelct)
                        ->with('pageTitle', 'Kê khai giá mặt hàng thực phẩm chức năng cho trẻ em dưới 6 tuổi');
                }else
                    return view('errors.perm');
            } else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['mahs'] = $inputs['maxa'].getdate()[0];
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                $model = new KkGs();
                if($model->create($inputs)){
                    $modelctdf = KkGsCtDf::where('maxa',$inputs['maxa']);
                    foreach($modelctdf->get() as $ctdf){
                        $modelct = new KkGsCt();
                        $modelct->maxa = $inputs['maxa'];
                        $modelct->mahuyen = $inputs['mahuyen'];
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->tenhh= $ctdf->tenhh;
                        $modelct->qccl= $ctdf->qccl;
                        $modelct->dvt= $ctdf->dvt;
                        $modelct->ghichu= $ctdf->ghichu;

                        $modelct->giaQlk= $ctdf->giaQlk;
                        $modelct->giaClk= $ctdf->giaClk;
                        $modelct->giaCttlk= $ctdf->giaCttlk;
                        $modelct->giaCvtlk= $ctdf->giaCvtlk;
                        $modelct->giaCnclk= $ctdf->giaCnclk;
                        $modelct->giaCkhlk= $ctdf->giaCkhlk;
                        $modelct->giaCklk= $ctdf->giaCklk;
                        $modelct->giaCclk= $ctdf->giaCclk;
                        $modelct->giaCcmlk= $ctdf->giaCcmlk;
                        $modelct->giaCtclk= $ctdf->giaCtclk;
                        $modelct->giaCbhlk= $ctdf->giaCbhlk;
                        $modelct->giaCqllk= $ctdf->giaCqllk;
                        $modelct->giaTClk= $ctdf->giaTClk;
                        $modelct->giaCPlk= $ctdf->giaCPlk;
                        $modelct->giaZlk= $ctdf->giaZlk;
                        $modelct->giaZdvlk= $ctdf->giaZdvlk;

                        $modelct->giaQ= $ctdf->giaQ;
                        $modelct->giaC= $ctdf->giaC;
                        $modelct->giaCtt= $ctdf->giaCtt;
                        $modelct->giaCvt= $ctdf->giaCvt;
                        $modelct->giaCnc= $ctdf->giaCnc;
                        $modelct->giaCkh= $ctdf->giaCkh;
                        $modelct->giaCk= $ctdf->giaCk;
                        $modelct->giaCc= $ctdf->giaCc;
                        $modelct->giaCcm= $ctdf->giaCcm;
                        $modelct->giaCtc= $ctdf->giaCtc;
                        $modelct->giaCbh= $ctdf->giaCbh;
                        $modelct->giaCql= $ctdf->giaCql;
                        $modelct->giaTC= $ctdf->giaTC;
                        $modelct->giaCP= $ctdf->giaCP;
                        $modelct->giaZ= $ctdf->giaZ;
                        $modelct->giaZdv= $ctdf->giaZdv;
                        $modelct->save();
                    }
                    $modelctdf->delete();
                }
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$inputs['maxa']);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                //Kiểm tra có thuộc sự quản lý hay k

                $model = KkGs::findOrFail($id);

                $modeldn = Company::where('maxa', $model->maxa)
                    ->first();
                $modelct = KkGsCt::where('mahs',$model->mahs)
                    ->get();

                return view('manage.kkgia.dvgs.kkgia.kkgiadv.edit')
                    ->with('modeldn', $modeldn)
                    ->with('model',$model)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Chỉnh sửa hồ sơ kê khai giá thực phẩm chức năng cho trẻ em dưới 6 tuổi');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model = KkGs::findOrFail($id);
                $model->update($inputs);
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$model->maxa.'&trangthai='.$model->trangthai);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkGs::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->first();
            $modelkkct = KkGsCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modelkk->mahuyen)
                ->first();
            return view('manage.kkgia.dvgs.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Hồ sơ kê khai giá TPCN cho TE dưới 6 tuổi;');

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
            $model = KkGs::where('id',$inputs['id'])
                ->first();
            $date = date_create($ngaychuyen);
            if(date('H',strtotime($ngaychuyen)) >= '17')
                $datenew = date_modify($date, "+1 days");
            else
                $datenew = $date;

            $ngaychuyen = date_format($datenew, "Y-m-d");
            $ngayduyet = $model->ngayhieuluc;
            $ngaylv = 0;
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
                $model = KkGs::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $modeldn = Company::where('maxa', $model->maxa)
                        ->first();
                    $modeldv = Town::where('maxa',$model->mahuyen)
                        ->first();
                    $dmnghe = DmNgheKd::where('manghe','TPCNTE6T')
                        ->where('manganh','TPCNTE6T')
                        ->first();
                    $tg = getDateTime(Carbon::now()->toDateTimeString());
                    $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp. Số công văn: '.$model->socv.
                        ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['ttnguoinop'].'!!!';
                    $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                        ' Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['ttnguoinop'].'!!!';
                    $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                    $run->handle();
                }
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$model->maxa.'&trangthai='.$model->trangthai);
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
            $model = KkGs::where('id',$inputs['id'])
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
                $model = KkGs::where('id',$inputs['iddelete'])
                    ->first();
                if($model->delete()){
                    $modelct = KkGsCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$model->maxa);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

}
