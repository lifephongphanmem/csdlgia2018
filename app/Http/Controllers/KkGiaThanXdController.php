<?php

namespace App\Http\Controllers;

use App\Company;
use App\District;
use App\KkGiaThan;
use App\KkGiaThanCt;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaThanXdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';

                $model = KkGiaThan::join('company','company.maxa','=','kkgiathan.maxa')
                    ->select('kkgiathan.*','company.tendn')
                    ->where('company.level','THAN')
                    ->where('kkgiathan.trangthai',$inputs['trangthai'])
                    ->whereYear('kkgiathan.ngaychuyen',$inputs['nam']);

                $modeldvql = District::all();
                if(session('admin')->level == 'X') {
                    $modeldv = Town::where('maxa',session('admin')->maxa)->get();
                    $inputs['maxa'] = session('admin')->maxa;
                    $inputs['mahuyen'] = session('admin')->mahuyen;

                }else {
                    if(session('admin')->level == 'T') {
                        $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldvql->first()->mahuyen;
                        $modeldv = Town::where('mahuyen',$inputs['mahuyen'])->get();
                    }else {
                        $inputs['mahuyen'] = session('admin')->mahuyen;
                        $modeldv = Town::where('mahuyen', session('admin')->mahuyen)->get();
                    }
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : (count($modeldv)> 0 ? $modeldv->first()->maxa : '');
                }
                $model = $model->where('kkgiathan.mahuyen',$inputs['maxa']);

                $model = $model->get();
                return view('manage.kkgia.than.kkgia.xetduyet.index')
                    ->with('model', $model)
                    ->with('inputs',$inputs)
                    ->with('modeldvql',$modeldvql)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle', 'Xét duyệt hồ sơ kê khai giá than');
            }else{
                return view('errors.perm');
            }

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

            $modelhs = KkGiaThan::where('id',$inputs['id'])
                ->first();
            $modeldn = Company::where('maxa',$modelhs->maxa)->where('level','THAN')->first();

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
                $model = KkGiaThan::where('id',$inputs['idtralai'])->first();
                if($model->update($inputs)){
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = Company::where('maxa',$model->maxa)->where('level','THAN')->first();
                    $data=[];
                    $data['tendn'] = $dn->tendn;
                    $data['masothue'] = $model->maxa;
                    $data['tg'] = Carbon::now()->toDateTimeString();
                    $data['tencqcq'] = $tencqcq->tendv;
                    $data['lydo'] = $inputs['lydo'];
                    $maildn = $dn->email;
                    $tendn = $dn->tendn;
                    $mailql = $tencqcq->emailql;
                    $tenql = $tencqcq->tendv;
                    Mail::send('mail.replykkgia',$data, function ($message) use($maildn,$tendn,$mailql,$tenql) {
                        $message->to($maildn,$tendn)
                            ->to($mailql,$tenql)
                            ->subject('Thông báo trả lại hồ sơ kê khai giá dịch vụ');
                        $message->from('phanmemcsdlgia@gmail.com','Phần mềm CSDL giá');
                    });
                }
                return redirect('xetduyetgiathan?&trangthai='.$inputs['trangthai'].'&maxa='.$model->mahuyen);
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

            $modelhs =  KkGiaThan::where('id',$inputs['id'])
                ->first();
            $model = Town::where('maxa',$modelhs->mahuyen)
                ->first();
            $modeldn = Company::where('maxa',$modelhs->maxa)
                ->where('level','THAN')
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
        $model = KkGiaThan::where('trangthai', 'DD')
            ->where('mahuyen', $mahuyen)
            ->max('id');
        if (count($model) == 0) {
            $stt = 1;
        } else
            $stt = $model->sohsnhan + 1;
        return $stt;
    }

    public function nhanhs(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['idnhanhs'];
            $model = KkGiaThan::findOrFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['ngaynhan'] = getDateToDb($inputs['ngaynhan']);
            //$inputs['thoihan'] = getThXdHsDvLt($model->ngaychuyen,$inputs['ngaynhan']);

            if($model->update($inputs)){
                //$this->congbo($id);

                $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                $dn = Company::where('maxa',$model->maxa)
                    ->where('level','THAN')
                    ->first();
                $data=[];
                $data['tendn'] = $dn->tendn;
                $data['tg'] = Carbon::now()->toDateTimeString();
                $data['tencqcq'] = $tencqcq->tendv;
                $data['ngaykk'] = $model->ngaynhap;
                $data['ngayapdung'] = $model->ngayhieuluc;
                $data['socv'] = $model->socv;
                $data['ngaynhan'] = $inputs['ngaynhan'];
                $data['sohsnhan'] = $inputs['sohsnhan'];

                $maildn = $dn->email;
                $tendn = $dn->tendn;
                $mailql = $tencqcq->emailql;
                $tenql = $tencqcq->tendv;
                Mail::send('mail.successkkgia',$data, function ($message) use($maildn,$tendn,$mailql,$tenql) {
                    $message->to($maildn,$tendn)
                        ->to($mailql,$tenql)
                        ->subject('Thông báo xét duyệt hồ sơ kê khai giá dịch vụ');
                    $message->from('phanmemcsdlgia@gmail.com','Phần mềm CSDL giá');
                });

            }
            return redirect('xetduyetgiathan?&trangthai=DD&maxa='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tthhdv'] = isset($inputs['tthhdv']) ? $inputs['tthhdv'] : '';
            $model = KkGiaThan::leftJoin('kkgiathanct','kkgiathanct.mahs','=','kkgiathan.mahs')
                ->leftjoin('company','company.maxa','=','kkgiathan.maxa')
                ->where('company.level','THAN')
                ->whereYear('kkgiathan.ngayhieuluc',$inputs['nam'])
                ->select('kkgiathanct.*','company.tendn','kkgiathan.ngayhieuluc','kkgiathan.maxa')
                ->where('kkgiathan.trangthai','DD');
            if($inputs['tthhdv'] != '')
                $model = $model->where('kkgiathanct.tthhdv','like','%'.$inputs['tthhdv'].'%');
            $model = $model->get();

            return view('manage.kkgia.than.kkgia.timkiem.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Tìm kiếm thông tin kê khai giá than');
        }else
            return view('errors.notlogin');
    }

}