<?php

namespace App\Http\Controllers;

use App\DmVlXd;
use App\KkGiaVlXd;
use App\KkGiaVlXdCt;
use App\KkGiaVlXdCtDf;
use App\Town;
use App\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaVlXdController extends Controller
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
                    ->where('company.level','VLXD')
                    ->where('company.mahuyen',$inputs['maxa'])
                    ->get();
                return view('manage.kkgia.vlxd.kkgia.kkgiadv.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách doanh nghiệp kê khai giá vật liệu xây dựng');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'VLXD' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CC';

                $model = KkGiaVlXd::where('maxa', $inputs['masothue'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->where('trangthai', $inputs['trangthai'])
                    ->orderBy('id', 'desc')
                    ->get();
                $modeldn = Company::where('maxa', $inputs['masothue'])
                    ->where('level', 'VLXD')->first();
                $modeldv = Town::where('maxa',$modeldn->mahuyen)->first();
                return view('manage.kkgia.vlxd.kkgia.kkgiadv.index')
                    ->with('model', $model)
                    ->with('modeldn', $modeldn)
                    ->with('modeldv',$modeldv)
                    ->with('inputs', $inputs)
                    ->with('pageTitle', 'Danh sách hồ sơ kê khai giá vật liệu xây dựng');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'VLXD' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $modeldn = Company::where('maxa',$inputs['masothue'])
                    ->where('level','VLXD')
                    ->firsT();
                $modelct = KkGiaVlXdCtDf::where('maxa',$inputs['masothue'])
                    ->get();
                $modeldm = DmVlXd::where('theodoi','TD')->get();
                return view('manage.kkgia.vlxd.kkgia.kkgiadv.create')
                    ->with('modeldn', $modeldn)
                    ->with('modelct',$modelct)
                    ->with('modeldm',$modeldm)
                    ->with('inputs', $inputs)
                    ->with('pageTitle', 'Kê khai giá vật liệu xây dựng thêm mới');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'VLXD' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = new KkGiaVlXd();
                $inputs['mahs'] = $inputs['maxa'].getdate()[0];
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                if($model->create($inputs)){
                    $modelctdf = KkGiaVlXdCtDf::where('maxa',$inputs['maxa']);

                    foreach($modelctdf->geT() as $ctdf) {
                        $modelct = new KkGiaVlXdCt();
                        $arrays = $ctdf->toArray();
                        unset($arrays['id']);
                        $arrays['mahs'] = $inputs['mahs'];
                        $modelct->create($arrays);
                    }
                    $modelctdf->delete();
                }
                return redirect('thongtinkekhaigiavatlieuxaydung?&masothue='.$inputs['maxa']);
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkGiaVlXd::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->where('level','VLXD')
                ->first();
            $modelkkct = KkGiaVlXdCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('manage.kkgia.vlxd.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá vật liệu xây dựng');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'VLXD' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {

                $model = KkGiaVlXd::findOrFail($id);
                $modelct = KkGiaVlXdCt::where('mahs',$model->mahs)
                    ->get();
                $modeldm = DmVlXd::where('theodoi','TD')->get();
                $modeldn = Company::where('maxa',$model->maxa)
                    ->where('level','VLXD')
                    ->firsT();
                return view('manage.kkgia.vlxd.kkgia.kkgiadv.edit')
                    ->with('modeldn', $modeldn)
                    ->with('model',$model)
                    ->with('modelct',$modelct)
                    ->with('modeldm',$modeldm)
                    ->with('pageTitle', 'Kê khai giá vật liệu xây dựng chỉnh sửa');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'VLXD' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = KkGiaVlXd::findOrFail($id);
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model->update($inputs);
                return redirect('thongtinkekhaigiavatlieuxaydung?&masothue='.$model->maxa);
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'VLXD' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $id = $inputs['iddelete'];
                $model = KkGiaVlXd::findOrFail($id);
                $modelct = KkGiaVlXdCt::where('mahs',$model->mahs)->delete();
                $model->delete();
                return redirect('thongtinkekhaigiavatlieuxaydung?&masothue='.$model->maxa);
            } else {
                return view('errors.perm');
            }
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
            $model = KkGiaVlXd::where('id',$inputs['id'])
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
            if (session('admin')->level == 'VLXD' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = KkGiaVlXd::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = Company::where('maxa',$model->maxa)
                        ->where('level','VLXD')
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
                return redirect('thongtinkekhaigiavatlieuxaydung?&masothue='.$model->maxa.'&trangthai=CD');
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
            $model = KkGiaVlXd::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="showlydo">';
            $result['message'] = '<label>'.$model->lydo.'</lable>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
}
