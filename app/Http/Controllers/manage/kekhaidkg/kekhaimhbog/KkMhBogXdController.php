<?php

namespace App\Http\Controllers\manage\kekhaidkg\kekhaimhbog;

use App\Jobs\SendMail;
use App\Model\manage\kekhaidkg\kehaimhbog\KkMhBog;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkMhBogXdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['mh'] = DmNgheKd::where('manganh','BOG')
                    ->where('manghe',$inputs['manghe'])
                    ->first()->tennghe;
                $modeldmnghe = DmNgheKd::where('manganh','BOG')
                    ->where('manghe',$inputs['manghe'])
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
                $model = KkMhBog::join('company','company.maxa','=','kkmhbog.maxa')
                    ->where('kkmhbog.phanloai',$inputs['manghe'])
                    ->where('kkmhbog.mahuyen',$inputs['mahuyen'])
                    ->where('kkmhbog.trangthai',$inputs['trangthai'])
                    ->whereYear('kkmhbog.ngaychuyen',$inputs['nam'])
                    ->select('kkmhbog.*','company.tendn')
                    ->get();
                return view('manage.kkgia.dkg.kekhaimhbog.xetduyet.index')
                    ->with('model', $model)
                    ->with('inputs',$inputs)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle', 'Xét duyệt hồ sơ kê khai giá '.$inputs['mh'] );
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }
    public function ttdnkkmhbog(Request $request){
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

            $modelhs = KkMhBog::where('id',$inputs['id'])
                ->first();

            $modeldn = Company::where('maxa',$modelhs->maxa)
                ->first();

            $result['message'] = '<div class="form-group" id="ttdnkkdkg"> ';
            $result['message'] .= '<label style="color: blue"><b>'.$modeldn->tendn.'</b> Kê khai giá số công văn <b>'.$modelhs->socv.'</b> ngày áp dụng <b>'.getDayVn($modelhs->ngayhieuluc).'</b></b></label>';
            $result['message'] .= '<label style="color: blue">Mã hồ sơ kê khai: <b>'.$modelhs->mahs.'</b></label>';
            $result['message'] .= '</div>';

            $result['status'] = 'success';
        }
        die(json_encode($result));
    }
    public function tralai(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['trangthai'] = 'BTL';
                $model = KkMhBog::where('id',$inputs['idtralai'])->first();

                if($model->update($inputs)){
                    $modeldn = Company::where('maxa', $model->maxa)
                        ->first();
                    $modeldv = Town::where('maxa',$model->mahuyen)
                        ->first();
                    $dmnghe = DmNgheKd::where('manghe',$model->phanloai)
                        ->where('manganh','BOG')
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

                return redirect('xetduyetkkmhbog?manghe='.$model->phanloai.'&trangthai='.$inputs['trangthai'].'&mahuyen='.$model->mahuyen);
            }else{
                return view('errors.perm');
            }

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

            $modelhs = KkMhBog::where('id',$inputs['id'])
                ->first();
            $model = Town::where('maxa',$modelhs->mahuyen)
                ->first();
            $modeldn = Company::where('maxa',$modelhs->maxa)
                ->first();

            $ngay = Carbon::now()->toDateString();
            $stt = $this->getsohsnhan($modelhs->mahuyen,$modelhs->phanloai);

            $result['message'] = '<div class="modal-body" id="ttnhanhs">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label style="color: blue"><b>'.$modeldn->tendn.'</b> kê khai giá mặt hàng trong danh mục bình ổn giá công văn <b>'.$modelhs->socv.'</b> ngày áp dụng <b>'.getDayVn($modelhs->ngayhieuluc).'</b></b></label>';
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
    public function getsohsnhan($mahuyen,$phanloai){
        $idmax = KkMhBog::where('trangthai', 'DD')
            ->where('mahuyen', $mahuyen)
            ->where('phanloai',$phanloai)
            ->max('id');
        if (isset($idmax)) {
            $model = KkMhBog::where('id',$idmax)
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
            $model = KkMhBog::findOrFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['congbo'] = 'HCB';
            $inputs['ngaynhan'] = getDateToDb($inputs['ngaynhan']);

            if($model->update($inputs)){
                $modeldn = Company::where('maxa', $model->maxa)
                    ->first();
                $modeldv = Town::where('maxa',$model->mahuyen)
                    ->first();
                $dmnghe = DmNgheKd::where('manghe',$model->phanloai)
                    ->where('manganh','BOG')
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

            return redirect('xetduyetkkmhbog?manghe='.$model->phanloai.'&trangthai=DD&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }
    public function lydo(Request $request){
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
            $model = KkMhBog::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="lydo">';
            $result['message'] = '<label>'.$model->lydo.'</lable>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function congbo(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = KkMhBog::findOrFail($id);
            $inputs['congbo'] = 'CB';
            $model->update($inputs);
            return redirect('xetduyetkkmhbog?manghe='.$model->phanloai.'&trangthai=DD&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idhuycongbo'];
            $model = KkMhBog::findOrFail($id);
            $inputs['congbo'] = 'HCB';
            $model->update($inputs);
            return redirect('xetduyetkkmhbog?manghe='.$model->phanloai.'&trangthai=DD&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }
}
