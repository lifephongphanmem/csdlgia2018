<?php

namespace App\Http\Controllers;

use App\KkGiaTaCn;
use App\KkGiaTaCnCt;
use App\KkGiaTaCnCtDf;
use App\Town;
use App\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaTaCnController extends Controller
{
    public function ttdn(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T'){
                    $modeldv = Town::all();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                }elseif(session('admin')->level == 'H'){
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                }else{
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)
                        ->where('maxa',session('admin')->maxa)
                        ->get();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : session('admin')->maxa;
                }
                $model = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.level','TACN')
                    ->where('company.mahuyen',$inputs['maxa'])
                    ->get();
                return view('manage.kkgia.dvtacn.kkgia.kkgiadv.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách doanh nghiệp kê khai giá thức ăn chăn nuôi');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'TACN' || session('admin')->level == 'T' || session('admin')->level == 'H'  || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CC';

                $model = KkGiaTaCn::where('maxa', $inputs['masothue'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->where('trangthai', $inputs['trangthai'])
                    ->orderBy('id', 'desc')
                    ->get();
                $modeldn = Company::where('maxa', $inputs['masothue'])
                    ->where('level', 'TACN')->first();
                $modeldv = Town::where('maxa',$modeldn->mahuyen)
                    ->first();

                return view('manage.kkgia.dvtacn.kkgia.kkgiadv.index')
                    ->with('model', $model)
                    ->with('modeldn', $modeldn)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách hồ sơ kê khai giá thức ăn chăn nuôi');
            } else {
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
            if($inputs['masothue'] != ''){
                $modelct = KkGiaTaCnCtDf::where('maxa',$inputs['masothue'])->get();
                $modeldn = Company::where('maxa', $inputs['masothue'])
                    ->where('level', 'TACN')->first();
                $datenow = date('Y-m-d');
                $ngayhieuluc = date('d/m/Y', strtotime(getNgayHieuLuc($datenow,'TACN')));
                $ngaynhap = date('d/m/Y', strtotime($datenow));

                return view('manage.kkgia.dvtacn.kkgia.kkgiadv.create')
                    ->with('modeldn', $modeldn)
                    ->with('modelct',$modelct)
                    ->with('maxa', $inputs['masothue'])
                    ->with('ngaynhap', $ngaynhap)
                    ->with('ngayhieuluc', $ngayhieuluc)
                    ->with('pageTitle', 'Kê khai giá thức ăn chăn nuôi thêm mới');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'TACN' || session('admin')->level == 'T' || session('admin')->level == 'H'  || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['mahs'] = $inputs['maxa'].getdate()[0];
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                $model = new KkGiaTaCn();
                if($model->create($inputs)){
                    $modelctdf = KkGiaTaCnCtDf::where('maxa',$inputs['maxa']);
                    foreach($modelctdf->get() as $ctdf){
                        $modelct = new KkGiaTaCnCt();
                        $modelct->maxa = $inputs['maxa'];
                        $modelct->mahuyen = $inputs['mahuyen'];
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->tenhh= $ctdf->tenhh;
                        $modelct->qccl= $ctdf->qccl;
                        $modelct->dvt= $ctdf->dvt;
                        $modelct->ghichu= $ctdf->ghichu;

                        $modelct->cpnvlttlk= $ctdf->cpnvlttlk;
                        $modelct->cpncttlk= $ctdf->cpncttlk;
                        $modelct->cpsxclk= $ctdf->cpsxclk;
                        $modelct->cpnvpxlk= $ctdf->cpnvpxlk;
                        $modelct->cpvllk= $ctdf->cpvllk;
                        $modelct->cpdcsxlk= $ctdf->cpdcsxlk;
                        $modelct->cpkhtscdlk= $ctdf->cpkhtscdlk;
                        $modelct->cpdvmnlk= $ctdf->cpdvmnlk;
                        $modelct->cpbtklk= $ctdf->cpbtklk;
                        $modelct->cpklk= $ctdf->cpklk;
                        $modelct->tcpsxlk= $ctdf->tcpsxlk;
                        $modelct->cpbhlk= $ctdf->cpbhlk;
                        $modelct->cpqldnlk= $ctdf->cpqldnlk;
                        $modelct->cptclk= $ctdf->cptclk;
                        $modelct->tgttblk= $ctdf->tgttblk;
                        $modelct->lndklk= $ctdf->lndklk;
                        $modelct->gbctlk= $ctdf->gbctlk;
                        $modelct->thuettdblk= $ctdf->thuettdblk;
                        $modelct->thuegtgtlk= $ctdf->thuegtgtlk;
                        $modelct->gbdctlk= $ctdf->gbdctlk;

                        $modelct->cpnvltt= $ctdf->cpnvltt;
                        $modelct->cpnctt= $ctdf->cpnctt;
                        $modelct->cpsxc= $ctdf->cpsxc;
                        $modelct->cpnvpx= $ctdf->cpnvpx;
                        $modelct->cpvl= $ctdf->cpvl;
                        $modelct->cpdcsx= $ctdf->cpdcsx;
                        $modelct->cpkhtscd= $ctdf->cpkhtscd;
                        $modelct->cpdvmn= $ctdf->cpdvmn;
                        $modelct->cpbtk= $ctdf->cpbtk;
                        $modelct->cpk= $ctdf->cpk;
                        $modelct->tcpsx= $ctdf->tcpsx;
                        $modelct->cpbh= $ctdf->cpbh;
                        $modelct->cpqldn= $ctdf->cpqldn;
                        $modelct->cptc= $ctdf->cptc;
                        $modelct->tgttb= $ctdf->tgttb;
                        $modelct->lndk= $ctdf->lndk;
                        $modelct->gbct= $ctdf->gbct;
                        $modelct->thuettdb= $ctdf->thuettdb;
                        $modelct->thuegtgt= $ctdf->thuegtgt;
                        $modelct->gbdct= $ctdf->gbdct;
                        $modelct->save();
                    }
                    $modelctdf->delete();
                }
                return redirect('kekhaigiathucanchannuoi?&masothue='.$inputs['maxa']);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = KkGiaTaCn::findOrFail($id);
            $modelct = KkGiaTaCnCt::where('mahs',$model->mahs)
                ->get();
            $modeldn = Company::where('maxa', $model->maxa)
                ->where('level', 'TACN')->first();

            return view('manage.kkgia.dvtacn.kkgia.kkgiadv.edit')
                ->with('modeldn', $modeldn)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Chỉnh sửa kê khai giá thức ăn chăn nuôi');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'TACN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model = KkGiaTaCn::findOrFail($id);
                $model->update($inputs);
                return redirect('kekhaigiathucanchannuoi?&masothue='.$model->maxa.'&trangthai='.$model->trangthai);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkGiaTaCn::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->where('level','TACN')
                ->first();
            $modelkkct = KkGiaTaCnCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('manage.kkgia.dvtacn.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá thức ăn chăn nuôi');

        }else
            return view('errors.notlogin');
    }

    public function kiemtra(Request $request){
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
            $model = KkGiaTaCn::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="tthschuyen">';
            $result['message'] .= '<label> Số CV: '.$model->socv.'- Ngày áp dụng: '.getDayVn($model->ngayhieuluc).'</label>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function chuyen(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'TACN' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = KkGiaTaCn::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = Company::where('maxa',$model->maxa)
                        ->where('level','TACN')
                        ->first();
                    $data=[];
                    $data['tendn'] = $dn->tendn;
                    $data['masothue'] = $model->masothue;
                    $data['tg'] = $inputs['ngaychuyen'];
                    $data['tencqcq'] = $tencqcq->tendv;
                    $data['ttnguoinop'] = $inputs['ttnguoinop'];
                    $maildn = $dn->email;
                    $tendn = $dn->tendn;
                    $mailql = $tencqcq->emailql;
                    $tenql = $tencqcq->tendv;

                    Mail::send('mail.kkgia',$data, function ($message) use($maildn,$tendn,$mailql,$tenql) {
                        $message->to($maildn,$tendn)
                            ->to($mailql,$tenql)
                            ->subject('Thông báo nhận hồ sơ kê khai giá dịch vụ');
                        $message->from('phanmemcsdlgia@gmail.com','Phần mềm CSDL giá');
                    });
                }
                return redirect('kekhaigiathucanchannuoi?&masothue='.$model->maxa);
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
            $model = KkGiaTaCn::where('id',$inputs['id'])
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
            if (session('admin')->level == 'TACN' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = KkGiaTaCn::where('id',$inputs['iddelete'])
                    ->first();
                if($model->delete()){
                    $modelct = KkGiaTaCnCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaigiathucanchannuoi?&masothue='.$model->maxa);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }
}
