<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvvt\vtxk;

use App\District;
use App\Jobs\SendMail;
use App\Model\manage\kekhaigia\kkdvvt\vtxk\GiaVtXk;
use App\Model\manage\kekhaigia\kkdvvt\vtxk\GiaVtXkCt;
use App\Model\manage\kekhaigia\kkdvvt\vtxk\GiaVtXkCtDf;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\NgayNghiLe;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaVtXkController extends Controller
{
    public function ttdn(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $modeldmnghe = DmNgheKd::where('manganh','DVVT')
                    ->where('manghe','VTXK')
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
                    ->where('companylvcc.manghe','VTXK')
                    ->where('companylvcc.mahuyen',$inputs['maxa'])
                    ->join('town','town.maxa','=','companylvcc.mahuyen')
                    ->select('company.*','town.tendv')
                    ->get();

                $ttql = District::where('mahuyen',$modeldmnghe->mahuyen)
                    ->first();

                return view('manage.kkgia.vtxk.kkgia.kkgiadv.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('ttql',$ttql)
                    ->with('pageTitle', 'Danh sách doanh nghiệp kê khai giá vận tải xe khách');
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

                $model = GiaVtXk::where('maxa', $inputs['masothue'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->orderBy('id', 'desc')
                    ->get();
                $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                    ->where('company.maxa',$inputs['masothue'])
                    ->where('companylvcc.manghe','VTXK')
                    ->select('company.*','companylvcc.mahuyen')
                    ->first();

                if(isset($modeldn)) {
                    $modeldv = Town::where('maxa', $modeldn->mahuyen)
                        ->first();
                    return view('manage.kkgia.vtxk.kkgia.kkgiadv.index')
                        ->with('model', $model)
                        ->with('modeldn', $modeldn)
                        ->with('modeldv', $modeldv)
                        ->with('inputs', $inputs)
                        ->with('pageTitle', 'Danh sách hồ sơ kê khai giá vận tải xe khách');
                } else
                    return view('errors.perm');
            } else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
            else
                $inputs['masothue'] = session('admin')->maxa;
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.trangthai','Kích hoạt')
                ->where('company.maxa',$inputs['masothue'])
                ->where('companylvcc.manghe','VTXK')
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $inputs['mahs'] = $inputs['masothue'].getdate()[0];
            if(isset($modeldn)) {
                $delctdf = GiaVtXkCt::where('maxa',$inputs['masothue'])
                    ->where('trangthai','CXD')->delete();
                $idlk = GiaVtXk::where('maxa',$inputs['masothue'])
                    ->where('trangthai','DD')
                    ->max('id');
                if(isset($idlk)){
                    $modellk = GiaVtXk::where('id',$idlk)
                        ->first();
                    $modellkct = GiaVtXkCt::where('mahs',$modellk->mahs)
                        ->get();
                    $inputs['socvlk'] = $modellk->socv;
                    $inputs['ngaycvlk'] = $modellk->ngaynhap;
                    foreach($modellkct as  $ctdf){
                        $addct = new GiaVtXkCt();
                        $addct->tendvcu = $ctdf->tendvcu;
                        $addct->qccl = $ctdf->qccl;
                        $addct->dvt = $ctdf->dvt;
                        $addct->gialk = $ctdf->giakk;

                        $addct->maxa = $inputs['masothue'];
                        $addct->trangthai = 'CXD';
                        $addct->mahs = $inputs['mahs'];
                        $addct->save();
                    }
                }
                $modelct = GiaVtXkCt::where('mahs',$inputs['mahs'])
                    ->get();

                return view('manage.kkgia.vtxk.kkgia.kkgiadv.create')
                    ->with('modeldn', $modeldn)
                    ->with('modelct',$modelct)
                    ->with('inputs', $inputs)
                    ->with('pageTitle', 'Kê khai giá vận tải xe khách thêm mới');
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
                $model = new GiaVtXk();
                if($model->create($inputs)){
                    $modelct = GiaVtXkCt::where('mahs',$inputs['mahs'])
                        ->update(['trangthai' => 'XD']);
                }
                return redirect('kekhaigiavantaixekhach?&masothue='.$inputs['maxa']);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $mahs = $inputs['mahs'];
            $modelkk = GiaVtXk::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->first();
            $modelkkct = GiaVtXkCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modelkk->mahuyen)
                ->first();
            return view('manage.kkgia.vtxk.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá vận tải xe khách');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H'  || session('admin')->level == 'X') {
                $model = GiaVtXk::findOrFail($id);
                $modeldn = Company::where('maxa',$model->maxa)
                    ->first();
                $modelct = GiaVtXkCt::where('mahs',$model->mahs)
                    ->get();
                return view('manage.kkgia.vtxk.kkgia.kkgiadv.edit')
                    ->with('model',$model)
                    ->with('modeldn',$modeldn)
                    ->with('modelct',$modelct)
                    ->with('pageTitle','Kê khai giá vận tải xe khách chỉnh sửa');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H'  || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = GiaVtXk::findOrFail($id);
                if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X' || $model->maxa == session('admin')->maxa) {
                    $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                    $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                    if ($inputs['ngaycvlk'] != '')
                        $inputs['ngaycvlk'] = getDateToDb($inputs['ngaycvlk']);
                    else
                        unset($inputs['ngaycvlk']);
                    if($model->update($inputs)){
                        $modelct = GiaVtXkCt::where('mahs',$inputs['mahs'])
                            ->update(['trangthai' => 'XD']);
                    }
                    return redirect('kekhaigiavantaixekhach?&masothue=' . $model->maxa);
                } else
                    return view('errors.perm');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = GiaVtXk::where('id',$inputs['iddelete'])
                    ->first();
                if($model->delete()){
                    $modelct = GiaVtXkCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaigiavantaixekhach?&masothue='.$model->maxa);
            }else{
                return view('errors.perm');
            }

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
            $model = GiaVtXk::where('id',$inputs['id'])
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
                $model = GiaVtXk::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $modeldn = Company::where('maxa', $model->maxa)
                        ->first();
                    $modeldv = Town::where('maxa',$model->mahuyen)
                        ->first();
                    $dmnghe = DmNgheKd::where('manghe','VTXK')
                        ->where('manganh','DVVT')
                        ->first();
                    $tg = getDateTime(Carbon::now()->toDateTimeString());
                    $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp. Số công văn: '.$model->socv.
                        ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên hệ: '.$inputs['dtll'].'!!!';

                    $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                        ' Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên hệ: '.$inputs['dtll'].'!!!';
                    $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                    $run->handle();
                }
                return redirect('kekhaigiavantaixekhach?&masothue='.$model->maxa.'&trangthai='.$model->trangthai);
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
            $model = GiaVtXk::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="showlydo">';
            $result['message'] = '<label>'.$model->lydo.'</lable>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
}
