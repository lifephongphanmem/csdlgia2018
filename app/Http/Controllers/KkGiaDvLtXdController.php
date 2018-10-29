<?php

namespace App\Http\Controllers;

use App\CsKdDvLt;
use App\KkGiaDvLt;
use App\Company;
use App\KkGiaDvLtCt;
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
            if (session('admin')->level == 'T' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';

                if(session('admin')->level == 'T')
                    $model = KkGiaDvLt::leftJoin('cskddvlt','cskddvlt.macskd','=','kkgiadvlt.macskd')
                        ->leftJoin('company','company.maxa','=','kkgiadvlt.maxa')
                        ->where('company.level','DVLT')
                        ->select('kkgiadvlt.*','cskddvlt.tencskd','company.tendn')
                        ->where('kkgiadvlt.trangthai',$inputs['trangthai'])
                        ->whereYear('kkgiadvlt.ngaychuyen',$inputs['nam'])
                        ->get();
                else
                    $model = KkGiaDvLt::leftJoin('cskddvlt','cskddvlt.macskd','=','kkgiadvlt.macskd')
                        ->leftJoin('company','company.maxa','=','kkgiadvlt.maxa')
                        ->where('company.level','DVLT')
                        ->select('kkgiadvlt.*','cskddvlt.tencskd','company.tendn')
                        ->where('kkgiadvlt.trangthai',$inputs['trangthai'])
                        ->whereYear('kkgiadvlt.ngaychuyen',$inputs['nam'])
                        ->where('kkgiadvlt.mahuyen',session('admin')->maxa)
                        ->get();
                //dd($model);

                return view('manage.kkgia.dvlt.kkgia.xetduyet.index')
                    ->with('model', $model)
                    ->with('nam',$inputs['nam'])
                    ->with('trangthai',$inputs['trangthai'])
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
            $modeldn = Company::where('maxa',$modelhs->maxa)->where('level','DVLT')->first();
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
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = Company::where('maxa',$model->maxa)->where('level','DVLT')->first();
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
                return redirect('xetduyetkkgiadvlt');
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
        if(session('admin')->level == 'T')
            $stt = 0;
        else {
            $model = KkGiaDvLt::where('trangthai', 'DD')
                ->where('maxa', $mahuyen)
                ->max('id');
            if (count($model) == 0) {
                $stt = 1;
            } else
                $stt = $model->sohsnhan + 1;
        }
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
                $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                $dn = Company::where('maxa',$model->maxa)->first();
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
            return redirect('xetduyetkkgiadvlt');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $model = KkGiaDvLtCt::leftjoin('dtapdungdvlt','dtapdungdvlt.madtad','=','kkgiadvltct.madtad')
                ->leftjoin('kkgiadvlt','kkgiadvlt.mahs','=','kkgiadvltct.mahs')
                ->whereYear('kkgiadvlt.ngayhieuluc',$inputs['nam'])
                ->leftJoin('cskddvlt','cskddvlt.macskd','=','kkgiadvlt.macskd')
                ->leftJoin('company','company.maxa','=','kkgiadvlt.maxa')
                ->select('kkgiadvltct.*','cskddvlt.tencskd','company.tendn','kkgiadvlt.ngayhieuluc','kkgiadvlt.socv','dtapdungdvlt.tendtad')
                ->where('kkgiadvlt.trangthai','DD')
                ->OrWhere('kkgiadvlt.trangthai','CB');


            $model= $model->get();

            return view('manage.kkgia.dvlt.kkgia.timkiem.index')
                ->with('model', $model)
                ->with('nam',$inputs['nam'])
                ->with('pageTitle', 'Tìm kiếm thông tin hồ sơ kê khai giá dịch vụ lưu trú');
        }else
            return view('errors.notlogin');
    }
}
