<?php

namespace App\Http\Controllers\manage\kekhaigia\kkgiaxemaynksx;

use App\Jobs\SendMail;
use App\Model\manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSx;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaXeMayNkSxXdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $modeldmnghe = DmNgheKd::where('manganh','XEMAY')
                    ->where('manghe','XEMAY')
                    ->first();
                if(session('admin')->level == 'T'){
                    $modeldv = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldv->first()->maxa;
                }elseif(session('admin')->level == 'H'){
                    if(session('admin')->mahuyen == $modeldmnghe->mahuyen){
                        $modeldv = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
                        $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldv->first()->maxa;
                    }else
                        return view('errors.perm');
                }else{
                    if(session('admin')->mahuyen == $modeldmnghe->mahuyen){
                        $modeldv = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
                        $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : session('admin')->maxa;
                    }else
                        return view('errors.perm');
                }
                $model = GiaXeMayNkSx::join('company','company.maxa','=','giaxemaynksx.maxa')
                    ->where('giaxemaynksx.mahuyen',$inputs['mahuyen'])
                    ->where('giaxemaynksx.trangthai',$inputs['trangthai'])
                    ->select('giaxemaynksx.*','company.tendn')
                    ->get();
                return view('manage.kkgia.xemaynksx.kkgia.xetduyet.index')
                    ->with('model', $model)
                    ->with('inputs',$inputs)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle', 'Xét duyệt hồ sơ kê khai giá xe máy nhập khẩu, sản xuất trong nước ');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function ttdn(Request $request){
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

            $modelhs = GiaXeMayNkSx::where('id',$inputs['id'])
                ->first();
            $modeldn = Company::where('maxa',$modelhs->maxa)->first();

            $result['message'] = '<div class="form-group" id="ttdnkkdvgs"> ';
            $result['message'] .= '<label style="color: blue"><b>'.$modeldn->tendn.'</b> Kê khai giá số công văn <b>'.$modelhs->socv.'</b> ngày áp dụng <b>'.getDayVn($modelhs->ngayhieuluc).'</b></b></label>';
            $result['message'] .= '<label style="color: blue">Mã hồ sơ kê khai: <b>'.$modelhs->mahs.'</b></label>';
            $result['message'] .= '</div>';

            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['trangthai'] = 'BTL';
                $model = GiaXeMayNkSx::where('id',$inputs['idtralai'])->first();
                if($model->update($inputs)){
                    $modeldn = Company::where('maxa', $model->maxa)
                        ->first();
                    $modeldv = Town::where('maxa',$model->mahuyen)
                        ->first();
                    $dmnghe = DmNgheKd::where('manghe','XEMAY')
                        ->where('manganh','XEMAY')
                        ->first();
                    $tg = getDateTime(Carbon::now()->toDateTimeString());
                    $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp. Số công văn: '.$model->socv.
                        ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Lý do: '.$inputs['lydo'].'!!!';
                    $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                        ' Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Lý do: '.$inputs['lydo'].'!!!';
                    $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                    $run->handle();
                    //dispatch($run);
                }
                return redirect('xetduyetgiaxemaynksx?&trangthai='.$inputs['trangthai'].'&maxa='.$model->mahuyen);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function ttnhanhs(Request $request){
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

            $modelhs =  GiaXeMayNkSx::where('id',$inputs['id'])
                ->first();
            $model = Town::where('maxa',$modelhs->mahuyen)
                ->first();
            $modeldn = Company::where('maxa',$modelhs->maxa)
                ->first();

            $ngay = Carbon::now()->toDateString();
            $stt = $this->getsohsnhan($modelhs->mahuyen);

            $result['message'] = '<div class="modal-body" id="ttnhanhs">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label style="color: blue"><b>'.$modeldn->tendn.'</b> kê khai giá số công văn <b>'.$modelhs->socv.'</b> ngày áp dụng <b>'.getDayVn($modelhs->ngayhieuluc).'</b></b></label>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label><b>Số hồ sơ nhận</b></label>';
            $result['message'] .= '<input type="text" style="text-align: center" id="sohsnhan" name="sohsnhan" class="form-control" data-mask="fdecimal" value="'.$stt.'" autofocus>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label><b>Ngày duyệt hồ sơ</b></label>';
            $result['message'] .= '<input type="date" style="text-align: center" id="ngaynhan" name="ngaynhan" class="form-control"  value="'.$ngay.'">';
            $result['message'] .= '</div>';
            /*$result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label><b>Ngày hiệu lực</b></label>';
            $result['message'] .= '<input type="date" style="text-align: center" id="ngayhieuluc" name="ngayhieuluc" class="form-control"  value="'.$modelhs->ngayhieuluc.'">';
            $result['message'] .= '</div>';*/
            $result['message'] .= '<input type="hidden" id="idnhanhs" name="idnhanhs" value="'.$inputs['id'].'">';
            $result['message'] .= '</div>';

            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function getsohsnhan($mahuyen){
        $idmax = GiaXeMayNkSx::where('trangthai', 'DD')
            ->where('mahuyen', $mahuyen)
            ->max('id');
        if (isset($idmax)) {
            $model = GiaXeMayNkSx::where('id',$idmax)
                ->first();
            $stt = $model->sohsnhan + 1;
        } else
            $stt = 1;
        return $stt;
    }

    public function nhanhs(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idnhanhs'];
            $model = GiaXeMayNkSx::findOrFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['ngaynhan'] = getDateToDb($inputs['ngaynhan']);
            //$inputs['thoihan'] = getThXdHsDvLt($model->ngaychuyen,$inputs['ngaynhan']);

            if($model->update($inputs)){
                $modeldn = Company::where('maxa', $model->maxa)
                    ->first();
                $modeldv = Town::where('maxa',$model->mahuyen)
                    ->first();
                $dmnghe = DmNgheKd::where('manghe','XEMAY')
                    ->where('manganh','XEMAY')
                    ->first();
                $tg = getDateTime(Carbon::now()->toDateTimeString());
                $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã duyệt hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp. Số công văn: '.$model->socv.
                    ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Số hồ sơ nhận: '.$inputs['sohsnhan'].'- Ngày nhận: '.getDayVn($inputs['ngaynhan']).'!!!';
                $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã duyệt hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                    '. Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Số hồ sơ nhận: '.$inputs['sohsnhan'].'- Ngày nhận: '.getDayVn($inputs['ngaynhan']).'!!!';
                $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                $run->handle();
                //dispatch($run);
            }
            return redirect('xetduyetgiaxemaynksx?&trangthai=DD&maxa='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tthhdv'] = isset($inputs['tthhdv']) ? $inputs['tthhdv'] : '';
            $model = GiaXeMayNkSx::leftJoin('giaxemaynksxct','giaxemaynksxct.mahs','=','giaxemaynksx.mahs')
                ->leftjoin('company','company.maxa','=','giaxemaynksx.maxa')
                ->whereYear('giaxemaynksx.ngayhieuluc',$inputs['nam'])
                ->select('giaxemaynksxct.*','company.tendn','giaxemaynksx.ngayhieuluc','giaxemaynksx.maxa')
                ->where('giaxemaynksx.trangthai','DD');
            if($inputs['tthhdv'] != '')
                $model = $model->where('giaxemaynksxct.tthhdv','like','%'.$inputs['tthhdv'].'%');
            $model = $model->get();

            return view('manage.kkgia.xemaynksx.kkgia.timkiem.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Tìm kiếm thông tin kê khai giá xe máy nhập khẩu, sản xuất trong nước');
        }else
            return view('errors.notlogin');
    }
}
