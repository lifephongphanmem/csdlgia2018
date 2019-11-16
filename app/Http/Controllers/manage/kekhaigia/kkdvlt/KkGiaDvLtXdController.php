<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvlt;

use App\Jobs\SendMail;
use App\Model\manage\kekhaigia\kkdvlt\CsKdDvLt;
use App\Model\manage\kekhaigia\kkdvlt\KkGiaDvLt;
use App\Model\manage\kekhaigia\kkdvlt\KkGiaDvLtCt;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaDvLtXdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'X' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';
                $model = KkGiaDvLt::leftJoin('cskddvlt','cskddvlt.macskd','=','kkgiadvlt.macskd')
                    ->leftJoin('company','company.maxa','=','kkgiadvlt.maxa')
                    ->select('kkgiadvlt.*','cskddvlt.tencskd','company.tendn')
                    ->where('kkgiadvlt.trangthai',$inputs['trangthai'])
                    ->whereYear('kkgiadvlt.ngaychuyen',$inputs['nam']);
                $dmnghe = DmNgheKd::where('manganh','DVLT')
                    ->where('manghe','DVLT')
                    ->first();
                if(session('admin')->level == 'T') {
                    $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)
                        ->get();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                    $model = $model->where('kkgiadvlt.mahuyen', $inputs['maxa']);
                }elseif(session('admin')->level == 'H') {
                    if($dmnghe->mahuyen == session('admin')->mahuyen){
                        $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)
                            ->get();
                        $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                        $model = $model->where('kkgiadvlt.mahuyen', $inputs['maxa']);
                    }else
                        return view('errors.perm');

                }else {
                    if($dmnghe->mahuyen == session('admin')->mahuyen){
                        $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)
                            ->where('maxa',session('admin')->maxa)
                            ->get();
                        $inputs['maxa'] = session('admin')->maxa;
                        $model = $model->where('kkgiadvlt.mahuyen', $inputs['maxa']);
                    }else
                        return view('errors.perm');
                }
                //dd($model);
                $model = $model->get();

                return view('manage.kkgia.dvlt.kkgia.xetduyet.index')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách hồ sơ kê khai giá dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function ttdnkkdvlt(Request $request){
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

            $modelhs = KkGiaDvLt::where('id',$inputs['id'])
                ->first();
            $modeldn = Company::where('maxa',$modelhs->maxa)->first();
            $modelcskd = CsKdDvLt::where('macskd',$modelhs->macskd)->first();

            $result['message'] = '<div class="form-group" id="ttkkgs"> ';
            $result['message'] .= '<label style="color: blue"><b>'.$modeldn->tendn.'</b> Kê khai giá dịch vụ lưu trú <b>'.$modelcskd->tencskd.'</b> số công văn <b>'.$modelhs->socv.'</b> ngày áp dụng <b>'.getDayVn($modelhs->ngayhieuluc).'</b></b></label>';
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
                $model = KkGiaDvLt::where('id',$inputs['idtralai'])->first();
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
                    $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại hồ sơ '.$dmnghe->tennghe.' của '.$modelcskd->tencskd.' . Số công văn: '.$model->socv.
                        ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Lý do: '.$inputs['lydo'].'!!!';
                    $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                        ' -  '.$modelcskd->tencskd.' - Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Lý do: '.$inputs['lydo'].'!!!';
                    $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                    $run->handle();
                    //dispatch($run);
                }
                return redirect('xetduyetkkgiadvlt?&trangthai=BTL&maxa='.$model->mahuyen);
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

            $modelhs = KkGiaDvLt::where('id',$inputs['id'])
                ->first();
            $model = Town::where('maxa',$modelhs->mahuyen)
                ->first();

            $modelcskd = CsKdDvLt::where('macskd',$modelhs->macskd)->first();

            $ngay = Carbon::now()->toDateString();
            $stt = $this->getsohsnhan($modelhs->maxa);

            $result['message'] = '<div class="modal-body" id="ttnhanhs">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label style="color: blue"><b>'.$modelcskd->tencskd.'</b> kê khai giá dịch vụ lưu trú số công văn <b>'.$modelhs->socv.'</b> ngày áp dụng <b>'.getDayVn($modelhs->ngayhieuluc).'</b></b></label>';
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
        $idmax = KkGiaDvLt::where('trangthai', 'DD')
            ->where('mahuyen', $mahuyen)
            ->max('id');
        if (isset($idmax)) {
            $model = KkGiaDvLt::where('id',$idmax)
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
            $model = KkGiaDvLt::findOrFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['thoihan'] = getThXdHsDvLt($model->ngaychuyen,$inputs['ngaynhan']);
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
                $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã duyệt hồ sơ '.$dmnghe->tennghe.' của '.$modelcskd->tencskd.'. Số công văn: '.$model->socv.
                    ' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Số hồ sơ nhận: '.$inputs['sohsnhan'].'- Ngày nhận: '.getDayVn($inputs['ngaynhan']).'!!!';
                $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã duyệt hồ sơ '.$dmnghe->tennghe.' của doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.
                    ' -  '.$modelcskd->tencskd.' - Số công văn: '.$model->socv.' - Ngày áp dung: '.getDayVn($model->ngayhieuluc).'- Số hồ sơ nhận: '.$inputs['sohsnhan'].'- Ngày nhận: '.getDayVn($inputs['ngaynhan']).'!!!';
                $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                $run->handle();
                //dispatch($run);
            }
            return redirect('xetduyetkkgiadvlt?&trangthai=DD&maxa='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 20;
            $inputs['tencskd'] = isset($inputs['tencskd']) ? $inputs['tencskd'] : '';
            $inputs['tenhhdv'] = isset($inputs['tenhhdv']) ? $inputs['tenhhdv'] : '';

            $model = KkGiaDvLtCt::leftjoin('kkgiadvlt','kkgiadvlt.mahs','=','kkgiadvltct.mahs')
                ->leftJoin('cskddvlt','cskddvlt.macskd','=','kkgiadvlt.macskd')
                ->leftJoin('company','company.maxa','=','kkgiadvlt.maxa')
                ->select('kkgiadvltct.*','cskddvlt.tencskd','company.tendn','kkgiadvlt.ngayhieuluc','kkgiadvlt.socv')
                ->whereYear('kkgiadvlt.ngayhieuluc',$inputs['nam'])
                ->where('kkgiadvlt.trangthai','DD');
//            dd($model->get());
            if($inputs['tencskd'] != '')
                $model = $model->where('tencskd','like','%'.$inputs['tencskd'].'%');
            if($inputs['tenhhdv'] != '')
                $model = $model->where('tenhhdv','like','%'.$inputs['tenhhdv'].'%');


            $model= $model->paginate($inputs['paginate']);


            return view('manage.kkgia.dvlt.kkgia.timkiem.index')
                ->with('model', $model)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Tìm kiếm thông tin hồ sơ kê khai giá dịch vụ lưu trú');
        }else
            return view('errors.notlogin');
    }
}
