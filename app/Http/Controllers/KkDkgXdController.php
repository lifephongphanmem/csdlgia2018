<?php

namespace App\Http\Controllers;

use App\Company;
use App\DmMhBinhOnGia;
use App\kkdkg;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDkgXdController extends Controller
{

    public function ttdn($ma)
    {
        switch ($ma) {
            case "dkgxangdau":
                $m_dn = Company::where('company.xangdau','1');
                break;
            case "dkgdien":
                $m_dn = Company::where('company.dien','1');
                break;
            case "dkgkhidau":
                $m_dn = Company::where('company.khidau','1');
                break;
            case "dkgphan":
                $m_dn = Company::where('company.phan','1');
                break;
            case "dkgthuocbvtv":
                $m_dn = Company::where('company.thuocbvtv','1');
                break;
            case "dkgvacxingsgc":
                $m_dn = Company::where('company.vacxingsgc','1');
                break;
            case "dkgmuoi":
                $m_dn = Company::where('company.muoi','1');
                break;
            case "dkgsuate6t":
                $m_dn = Company::where('company.suate6t','1');
                break;
            case "dkgduong":
                $m_dn = Company::where('company.duong','1');
                break;
            case "dkgthocgao":
                $m_dn = Company::where('company.thocgao','1');
                break;
            case "dkgthuocpcb":
                $m_dn = Company::where('company.thuocpcb','1');
                break;
            default:
                $m_dn = Company::all();
                break;
        }
        return $m_dn;
    }
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $tenmh = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';
                $model = kkdkg::leftjoin('company','company.maxa','=','kkdkg.maxa')
                    ->select('kkdkg.*','company.tendn')
                    ->where('kkdkg.phanloai',$inputs['ma'])
                    ->where('kkdkg.trangthai',$inputs['trangthai'])
                    ->whereYear('kkdkg.ngaychuyen',$inputs['nam']);
                if(session('admin')->level == 'T'){
                    $modeldv = Town::all();
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldv->first()->maxa;
                    $model = $model->where('kkdkg.mahuyen',$inputs['mahuyen']);
                }elseif(session('admin')->level == 'H'){
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldv->first()->maxa;
                    $model = $model->where('kkdkg.mahuyen',$inputs['mahuyen']);
                }else{
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)
                        ->where('maxa',session('admin')->maxa)
                        ->get();
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldv->first()->maxa;
                    $model = $model->where('kkdkg.mahuyen',$inputs['mahuyen']);
                }
                $model = $model->get();
                return view('manage.kkgia.dkg.xetduyet.index')
                    ->with('model', $model)
                    ->with('inputs',$inputs)
                    ->with('modeldv',$modeldv)
                    ->with('tenmh',$tenmh)
                    ->with('pageTitle', 'Xét duyệt hồ sơ kê khai giá '.$tenmh );
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }
    public function ttdnkkdkg(Request $request){
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

            $modelhs = kkdkg::where('id',$inputs['id'])
                ->first();

            $modeldn = $this->ttdn($modelhs->phanloai)->where('maxa',$modelhs->maxa)->first();

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
                $model = kkdkg::where('id',$inputs['idtralai'])->first();
                $model->update($inputs);
                /*
                if($model->update($inputs)){
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = ttdn($model->phanloai)->where('maxa',$model->maxa)->first();
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
                */
                return redirect('xetduyetkkdkg?ma='.$model->phanloai.'&trangthai='.$inputs['trangthai'].'&mahuyen='.$model->mahuyen);
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

            $modelhs = kkdkg::where('id',$inputs['id'])
                ->first();
            $model = Town::where('maxa',$modelhs->mahuyen)
                ->first();
            $modeldn = $this->ttdn($modelhs->phanloai)->where('maxa',$modelhs->maxa)
                ->first();

            $ngay = Carbon::now()->toDateString();
            $stt = $this->getsohsnhan($modelhs->mahuyen);

            $result['message'] = '<div class="modal-body" id="ttnhanhs">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label style="color: blue"><b>'.$modeldn->tendn.'</b> kê khai giá sữa số công văn <b>'.$modelhs->socv.'</b> ngày áp dụng <b>'.getDayVn($modelhs->ngayhieuluc).'</b></b></label>';
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
            $model = kkdkg::where('trangthai', 'DD')
                ->where('mahuyen', $mahuyen)
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
            $model = kkdkg::findOrFail($id);
            $inputs['trangthai'] = 'DD';
            $inputs['thoihan'] = getThXdHsDvLt($model->ngaychuyen,$inputs['ngaynhan']);
            $model->update($inputs);
            /*
            if($model->update($inputs)){
                //$this->congbo($id);

                $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                $dn = Company::where('maxa',$model->maxa)
                    ->where('level','TPCNTE6T')
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
            */
            return redirect('xetduyetkkdkg?ma='.$model->phanloai.'&trangthai=DD&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }
}
