<?php

namespace App\Http\Controllers\manage\kekhaidkg;

use App\District;
use App\Jobs\SendMail;
use App\Model\manage\kekhaidkg\kkdkg;
use App\Model\manage\kekhaidkg\kkdkgct;
use App\Model\manage\kekhaidkg\kkdkgctdf;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\NgayNghiLe;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDkgController extends Controller
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

                return view('manage.kkgia.dkg.dangkygia.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('ttql',$ttql)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách thông tin doanh nghiệp đăng ký giá');
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

            $model = kkdkg::where('maxa', $inputs['maxa'])
                ->whereYear('ngaynhap', $inputs['nam'])
                ->where('phanloai',$inputs['manghe'])
                ->orderBy('id', 'desc')
                ->get();
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.maxa',$inputs['maxa'])
                ->where('companylvcc.manghe',$inputs['manghe'])
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $modeldv = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('manage.kkgia.dkg.dangkygia.index')
                ->with('model', $model)
                ->with('modeldn', $modeldn)
                ->with('inputs',$inputs)
                ->with('modeldv',$modeldv)
                ->with('pageTitle', 'Danh sách hồ sơ đăng ký giá mặt hàng BOG');

        }else
            return view('errors.notlogin');
    }
    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $delct = kkdkgct::where('trangthai','CXD')
                ->where('maxa',$inputs['maxa'])
                ->delete();
            $inputs['mahs'] = $inputs['manghe'].''.$inputs['maxa'].getdate()[0];
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.maxa',$inputs['maxa'])
                ->where('companylvcc.manghe',$inputs['manghe'])
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $datenow = date('Y-m-d');
            $ngaynhap = date('d/m/Y', strtotime($datenow));
            $idhslk = kkdkg::where('trangthai','DD')
                ->where('maxa',$inputs['maxa'])
                ->where('phanloai',$inputs['manghe'])
                ->max('id');
            $modellk = kkdkg::where('id',$idhslk)->first();
            if(isset($modellk)) {
                $modelctlk = kkdkgct::where('mahs', $modellk->mahs)
                    ->where('trangthai','XD')
                    ->get();
                foreach ($modelctlk as $ctlk) {
                    $modelctnew = new kkdkgct();
                    $modelctnew->mahs = $inputs['mahs'];
                    $modelctnew->tenhh = $ctlk->tenhh;
                    $modelctnew->quycach = $ctlk->quycach;
                    $modelctnew->dvt = $ctlk->dvt;
                    $modelctnew->gialk = $ctlk->giakk;
                    $modelctnew->ghichu = $ct->ghichu;
                    $modelctnew->trangthai = 'CXD';
                    $modelctnew->save();
                }
            }
            $modelct = kkdkgctdf::where('mahs',$inputs['mahs'])
                ->get();
            $dmnghe = DmNgheKd::where('manghe',$inputs['manghe'])
                ->where('manganh','BOG')
                ->first();
            return view('manage.kkgia.dkg.dangkygia.create')
                ->with('modeldn', $modeldn)
                ->with('inputs',$inputs)
                ->with('ngaynhap', $ngaynhap)
                ->with('modelct',$modelct)
                ->with('dmnghe',$dmnghe)
                ->with('pageTitle', 'Đăng ký giá mặt hàng BOG');


        }else
            return view('errors.notlogin');
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
            $model = new kkdkg();
            if($model->create($inputs)){
                $modelct = kkdkgct::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('hosokkdkg/?&manghe='.$inputs['phanloai'].'&maxa='.$inputs['maxa']);

        }else
            return view('errors.notlogin');
    }
    public function edit($id){
        if (Session::has('admin')) {
            //Kiểm tra có thuộc sự quản lý hay k

            $model = kkdkg::findOrFail($id);
            $delct = kkdkgct::where('trangthai','CXD')
                ->where('maxa',$model->maxa)
                ->delete();
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.maxa',$model->maxa)
                ->where('companylvcc.manghe',$model->phanloai)
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $modelct = kkdkgct::where('mahs',$model->mahs)
                ->get();
            $dmnghe = DmNgheKd::where('manghe',$model->phanloai)
                ->where('manganh','BOG')
                ->first();
            return view('manage.kkgia.dkg.dangkygia.edit')
                ->with('modeldn', $modeldn)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('dmnghe',$dmnghe)
                ->with('pageTitle', 'Chỉnh sửa hồ sơ đăng ký giá mặt hàng BOG');
        }else
            return view('errors.notlogin');
    }
    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
            $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
            if($inputs['ngaycvlk'] != '')
                $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
            else
                unset($inputs['ngaycvlk']);
            if(isset($inputs['ipf1']) && $inputs['ipf1'] !='' ) {
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/kkdkg/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = kkdkg::findOrFail($id);
            if($model->update($inputs)){
                $modelct = kkdkgct::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('hosokkdkg/?&manghe='.$inputs['phanloai'].'&maxa='.$inputs['maxa']);
        }else
            return view('errors.notlogin');
    }
    public function delete(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = kkdkg::where('id',$inputs['iddelete'])
                ->first();
            if($model->delete()){
                $modelct = kkdkgct::where('mahs',$model->mahs)
                    ->delete();
            }
            return redirect('hosokkdkg/?&manghe='.$model->phanloai.'&maxa='.$model->maxa);
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
            $model = kkdkg::where('id',$inputs['id'])
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
                $model = kkdkg::where('id',$inputs['id'])
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

    public function show(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelkk = kkdkg::where('mahs',$inputs['mahs'])->first();
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.maxa',$modelkk->maxa)
                ->where('companylvcc.manghe',$modelkk->phanloai)
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            $modelkkct = kkdkgct::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            $modelnghe = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$modelkk->phanloai)
                ->first();
            return view('manage.kkgia.dkg.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('modelnghe',$modelnghe)
                ->with('pageTitle','Hồ sơ đăng ký giá');

        }else
            return view('errors.notlogin');
    }

    public function chuyen(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = kkdkg::where('id',$inputs['idchuyen'])
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
                    ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên hệ: '.$inputs['dtlh'].'!!!';
                $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                    ' Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên hệ: '.$inputs['dtlh'].'!!!';
                $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                $run->handle();
                //dispatch($run);
            }
            return redirect('hosokkdkg/?&manghe='.$model->phanloai.'&maxa='.$model->maxa);

        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mh'] = DmNgheKd::where('manghe',$inputs['manghe'])->first()->tennghe;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
            $model = kkdkgct::leftJoin('kkdkg','kkdkg.mahs','=','kkdkgct.mahs')
                ->leftjoin('company','company.maxa','=','kkdkg.maxa')
                ->whereYear('kkdkg.ngayhieuluc',$inputs['nam'])
                ->select('kkdkgct.*','company.tendn','kkdkg.ngayhieuluc')
                ->where('phanloai',$inputs['manghe'])
                ->where('kkdkg.trangthai','DD')
                ->where('company.trangthai','Kích hoạt');
            if($inputs['tenhh'] != '')
                $model = $model->where('kkdkgct.tenhh','like','%'.$inputs['tenhh'].'%');
            $model = $model->get();

            return view('manage.kkgia.dkg.timkiem.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Tìm kiếm thông tin đăng ký giá ' .$inputs['mh']);
        }else
            return view('errors.notlogin');
    }

}
