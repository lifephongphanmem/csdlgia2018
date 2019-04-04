<?php

namespace App\Http\Controllers;

use App\KkGs;
use App\Company;
use App\KkGsCt;
use App\KkGsCtDf;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGsController extends Controller
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
                    ->where('company.level','TPCNTE6T')
                    ->where('company.mahuyen',$inputs['maxa'])
                    ->get();
                return view('manage.kkgia.dvgs.kkgia.kkgiadv.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách doanh nghiệp kê khai giá TPCN cho TE dưới 6 tuổi');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'TPCNTE6T' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CC';

                $model = KkGs::where('maxa', $inputs['masothue'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->where('trangthai', $inputs['trangthai'])
                    ->orderBy('id', 'desc')
                    ->get();
                $modeldn = Company::where('maxa', $inputs['masothue'])
                    ->where('level', 'TPCNTE6T')->first();
                return view('manage.kkgia.dvgs.kkgia.kkgiadv.index')
                    ->with('model', $model)
                    ->with('modeldn', $modeldn)
                    ->with('nam', $inputs['nam'])
                    ->with('trangthai', $inputs['trangthai'])
                    ->with('masothue', $inputs['masothue'])
                    ->with('pageTitle', 'Danh sách hồ sơ kê khai giá TPCN cho TE dưới 6 tuổi');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'TPCNTE6T' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();

                $modelct = KkGsCtDf::where('maxa',$inputs['masothue'])->get();

                $modeldn = Company::where('maxa', $inputs['masothue'])
                    ->where('level', 'TPCNTE6T')->first();

                $datenow = date('Y-m-d');
                $ngayhieuluc = date('d/m/Y', strtotime(getNgayHieuLuc($datenow,'TPCNTE6T')));
                $ngaynhap = date('d/m/Y', strtotime($datenow));

                return view('manage.kkgia.dvgs.kkgia.kkgiadv.create')
                    ->with('modeldn', $modeldn)
                    ->with('maxa', $inputs['masothue'])
                    ->with('ngaynhap', $ngaynhap)
                    ->with('ngayhieuluc', $ngayhieuluc)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Kê khai giá mặt hàng sữa');
            } else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVGS' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['mahs'] = $inputs['maxa'].getdate()[0];
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                $model = new KkGs();
                if($model->create($inputs)){
                    $modelctdf = KkGsCtDf::where('maxa',$inputs['maxa']);
                    foreach($modelctdf->get() as $ctdf){
                        $modelct = new KkGsCt();
                        $modelct->maxa = $inputs['maxa'];
                        $modelct->mahuyen = $inputs['mahuyen'];
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->tenhh= $ctdf->tenhh;
                        $modelct->qccl= $ctdf->qccl;
                        $modelct->dvt= $ctdf->dvt;
                        $modelct->ghichu= $ctdf->ghichu;

                        $modelct->giaQlk= $ctdf->giaQlk;
                        $modelct->giaClk= $ctdf->giaClk;
                        $modelct->giaCttlk= $ctdf->giaCttlk;
                        $modelct->giaCvtlk= $ctdf->giaCvtlk;
                        $modelct->giaCnclk= $ctdf->giaCnclk;
                        $modelct->giaCkhlk= $ctdf->giaCkhlk;
                        $modelct->giaCklk= $ctdf->giaCklk;
                        $modelct->giaCclk= $ctdf->giaCclk;
                        $modelct->giaCcmlk= $ctdf->giaCcmlk;
                        $modelct->giaCtclk= $ctdf->giaCtclk;
                        $modelct->giaCbhlk= $ctdf->giaCbhlk;
                        $modelct->giaCqllk= $ctdf->giaCqllk;
                        $modelct->giaTClk= $ctdf->giaTClk;
                        $modelct->giaCPlk= $ctdf->giaCPlk;
                        $modelct->giaZlk= $ctdf->giaZlk;
                        $modelct->giaZdvlk= $ctdf->giaZdvlk;

                        $modelct->giaQ= $ctdf->giaQ;
                        $modelct->giaC= $ctdf->giaC;
                        $modelct->giaCtt= $ctdf->giaCtt;
                        $modelct->giaCvt= $ctdf->giaCvt;
                        $modelct->giaCnc= $ctdf->giaCnc;
                        $modelct->giaCkh= $ctdf->giaCkh;
                        $modelct->giaCk= $ctdf->giaCk;
                        $modelct->giaCc= $ctdf->giaCc;
                        $modelct->giaCcm= $ctdf->giaCcm;
                        $modelct->giaCtc= $ctdf->giaCtc;
                        $modelct->giaCbh= $ctdf->giaCbh;
                        $modelct->giaCql= $ctdf->giaCql;
                        $modelct->giaTC= $ctdf->giaTC;
                        $modelct->giaCP= $ctdf->giaCP;
                        $modelct->giaZ= $ctdf->giaZ;
                        $modelct->giaZdv= $ctdf->giaZdv;
                        $modelct->save();
                    }
                    $modelctdf->delete();
                }
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$inputs['maxa']);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVGS' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                //Kiểm tra có thuộc sự quản lý hay k

                $model = KkGs::findOrFail($id);

                $modeldn = Company::where('maxa', $model->maxa)
                    ->where('level', 'TPCNTE6T')->first();
                $modelct = KkGsCt::where('mahs',$model->mahs)
                    ->get();

                return view('manage.kkgia.dvgs.kkgia.kkgiadv.edit')
                    ->with('modeldn', $modeldn)
                    ->with('model',$model)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Chỉnh sửa hồ sơ kê khai giá mật hàng sữa');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'TPCNTE6T' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model = KkGs::findOrFail($id);
                $model->update($inputs);
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$inputs['maxa'].'&trangthai='.$model->trangthai);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkGs::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->where('level','TPCNTE6T')
                ->first();
            $modelkkct = KkGsCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('manage.kkgia.dvgs.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Hồ sơ kê khai giá TPCN cho TE dưới 6 tuổi;');

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
            $model = KkGs::where('id',$inputs['id'])
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
            if (session('admin')->level == 'TPCNTE6T' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = KkGs::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = Company::where('maxa',$model->maxa)
                        ->where('level','TPCNTE6T')
                        ->first();
                    $data=[];
                    $data['tendn'] = $dn->tendn;
                    $data['masothue'] = $model->maxa;
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
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$model->maxa.'&trangthai='.$model->trangthai);
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
            $model = KkGs::where('id',$inputs['id'])
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
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = KkGs::where('id',$inputs['iddelete'])
                    ->first();
                if($model->delete()){
                    $modelct = KkGsCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaithucphamchucnangchote6t?&masothue='.$model->maxa);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

}
