<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvlt;

use App\Jobs\SendMail;
use App\Model\manage\kekhaigia\kkdvlt\CsKdDvLt;
use App\Model\manage\kekhaigia\kkdvlt\KkGiaDvLt;
use App\Model\manage\kekhaigia\kkdvlt\KkGiaDvLtCt;
use App\Model\manage\kekhaigia\kkdvlt\KkGiaDvLtCtDf;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\NgayNghiLe;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaDvLtController extends Controller
{
    public function ttcskd(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $dmnghe = DmNgheKd::where('manganh','DVLT')
                    ->where('manghe','DVLT')
                    ->first();
                $model = CsKdDvLt::join('company','company.maxa','=','cskddvlt.maxa')
                    ->where('company.trangthai','Kích hoạt')
                    ->join('town','town.maxa','=','cskddvlt.mahuyen')
                    ->select('cskddvlt.*','company.tendn','town.tendv');

                if(session('admin')->level == 'T') {
                    $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)->get();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                    $model = $model->where('cskddvlt.mahuyen',$inputs['maxa']);
                }elseif(session('admin')->level == 'H') {
                    if(session('admin')->mahuyen == $dmnghe->mahuyen) {
                        $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)->get();
                        $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                        $model = $model->where('cskddvlt.mahuyen', $inputs['maxa']);
                    }else
                        return view('errors.perm');
                }elseif(session('admin')->level == 'X') {
                    if(session('admin')->mahuyen == $dmnghe->mahuyen) {
                        $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)->get();
                        $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : session('admin')->maxa;
                        $model = $model->where('cskddvlt.mahuyen', $inputs['maxa']);
                    }else
                        return view('errors.perm');
                }else {//dndvlt
                    $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)->get();
                    $inputs['maxa'] = session('admin')->maxa;
                    $model = $model->where('cskddvlt.maxa',session('admin')->maxa);
                }
                $model = $model->get();
                return view('manage.kkgia.dvlt.kkgia.kkgiadv.ttcskd')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách cơ sở kinh doanh dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['macskd'] = isset($inputs['macskd']) ? $inputs['macskd'] : '';
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $model = KkGiaDvLt::where('macskd',$inputs['macskd'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->orderBy('id','desc')
                    ->get();
                $modelcskd = CsKdDvLt::where('macskd',$inputs['macskd'])->first();
                $modeldn = Company::where('maxa',$modelcskd->maxa)
                    ->first();
                $modeldv = Town::where('maxa',$modelcskd->mahuyen)
                    ->first();
                return view('manage.kkgia.dvlt.kkgia.kkgiadv.index')
                    ->with('model', $model)
                    ->with('modelcskd',$modelcskd)
                    ->with('modeldn',$modeldn)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách hồ sơ kê khai dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

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
            $inputs['mahs'] = $inputs['macskd'].getdate()[0];
            $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                ->where('company.trangthai','Kích hoạt')
                ->where('company.maxa',$inputs['masothue'])
                ->where('companylvcc.manghe','DVLT')
                ->select('company.*','companylvcc.mahuyen')
                ->first();
            if(isset($modeldn)) {
                $modelcskd = CsKdDvLt::where('macskd', $inputs['macskd'])->first();
                $delctdf = KkGiaDvLtCt::where('macskd',$inputs['macskd'])
                    ->where('trangthai','CXD')->delete();
                $idlk = KkGiaDvLt::where('maxa',$inputs['masothue'])
                    ->where('trangthai','DD')
                    ->max('id');
                if(isset($idlk)){
                    $modellk = KkGiaDvLt::where('id',$idlk)
                        ->first();
                    $modellkct = KkGiaDvLtCt::where('mahs',$modellk->mahs)
                        ->get();
                    $inputs['socvlk'] = $modellk->socv;
                    $inputs['ngaycvlk'] = $modellk->ngaynhap;
                    foreach($modellkct as  $ctdf){
                        $addct = new KkGiaDvLtCt();
                        $addct->tenhhdv = $ctdf->tenhhdv;
                        $addct->qccl = $ctdf->qccl;
                        $addct->dvt = $ctdf->dvt;
                        $addct->mucgialk = $ctdf->mucgia;
                        $addct->macskd = $inputs['macskd'];
                        $addct->trangthai = 'CXD';
                        $addct->save();
                    }
                }
                $modelct = KkGiaDvLtCtDf::where('maxa',$inputs['masothue'])
                    ->get();

                return view('manage.kkgia.dvlt.kkgia.kkgiadv.create')
                    ->with('modelcskd', $modelcskd)
                    ->with('modeldn', $modeldn)
                    ->with('modelct',$modelct)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Kê khai giá dịch vụ lưu trú');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H'|| session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                $model = new KkGiaDvLt();
                if($model->create($inputs)){
                    $modelctdf = KkGiaDvLtCt::where('mahs',$inputs['mahs'])
                        ->update(['trangthai' => 'XD']);
                }
                return redirect('kekhaigiadvlt?&macskd='.$inputs['macskd']);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkGiaDvLt::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->first();
            $modelcskd = CsKdDvLt::where('macskd',$modelkk->macskd)
                ->first();
            $modelkkct = KkGiaDvLtCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modelkk->mahuyen)
                ->first();
            return view('manage.kkgia.dvlt.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelcskd',$modelcskd)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H'|| session('admin')->level == 'X') {
                $model = KkGiaDvLt::findOrFail($id);
                $modelcskd = CsKdDvLt::where('macskd',$model->macskd)->first();
                $modeldn = Company::where('maxa',$model->maxa)
                    ->first();
                $modelct = KkGiaDvLtCt::where('mahs',$model->mahs)
                    ->get();
                return view('manage.kkgia.dvlt.kkgia.kkgiadv.edit')
                    ->with('model', $model)
                    ->with('modelcskd',$modelcskd)
                    ->with('modeldn',$modeldn)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Chỉnh sửa hồ sơ kê khai giá dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $model = KkGiaDvLt::findOrFail($id);
                $inputs = $request->all();
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                if($model->update($inputs))
                    $modelctdf = KkGiaDvLtCt::where('mahs',$inputs['mahs'])
                        ->update(['trangthai' => 'XD']);
                return redirect('kekhaigiadvlt?&macskd='.$model->macskd);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function ktchuyendvlt(Request $request){
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
            $model = KkGiaDvLt::where('id',$inputs['id'])
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
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H'|| session('admin')->level == 'X' ) {
                $inputs = $request->all();
                $model = KkGiaDvLt::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $modeldn = Company::where('maxa', $model->maxa)
                        ->first();
                    $modeldv = Town::where('maxa',$model->mahuyen)
                        ->first();
                    $modelcskd = CsKdDvLt::where('macskd',$model->macskd)->first();
                    $dmnghe = DmNgheKd::where('manghe','DVLT')
                        ->where('manganh','DVLT')
                        ->first();
                    $tg = getDateTime(Carbon::now()->toDateTimeString());
                    $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của '.$modelcskd->tencskd.'. Số công văn: '.$model->socv.
                        ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên lạc: '.$inputs['dtll'].'!!!';
                    $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận được hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                        ' -  '.$modelcskd->tencskd.' - Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Thông tin người nộp: '.$inputs['nguoinop'].'-Số điện thoại liên lạc: '.$inputs['dtll'].'!!!';
                    $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                    $run->handle();
                }
                return redirect('kekhaigiadvlt?&macskd='.$model->macskd);
            }else{
                return view('errors.perm');
            }

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
            $model = KkGiaDvLt::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="showlydo">';
            $result['message'] = '<label style="font-weight: bold;color: blue">'.$model->lydo.'</lable>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = KkGiaDvLt::where('id',$inputs['iddelete'])
                    ->first();
                if($model->delete()){
                    $modelct = KkGiaDvLtCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaigiadvlt?&macskd='.$model->macskd);
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }
}
