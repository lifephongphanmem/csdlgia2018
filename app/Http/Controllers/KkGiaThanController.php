<?php

namespace App\Http\Controllers;

use App\Company;
use App\District;
use App\KkGiaThan;
use App\KkGiaThanCt;
use App\KkGiaThanCtDf;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaThanController extends Controller
{
    public function ttdn(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
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
                $model = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.level','THAN')
                    ->where('company.mahuyen',$inputs['maxa'])
                    ->get();
                return view('manage.kkgia.than.kkgia.kkgiadv.ttdn')
                    ->with('model', $model)
                    ->with('modeldvql',$modeldvql)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách doanh nghiệp kê khai giá than');
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'THAN' || session('admin')->level == 'T' || session('admin')->level == 'H'  || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                    $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
                else
                    $inputs['masothue'] = session('admin')->maxa;
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

                $modeldn = Company::where('maxa', $inputs['masothue'])
                    ->where('level', 'THAN')
                    ->first();
                if(count($modeldn) >0) {

                    $model = KkGiaThan::where('maxa', $inputs['masothue'])
                        ->whereYear('ngaynhap', $inputs['nam'])
                        ->orderBy('id', 'desc')
                        ->get();

                    $modeldv = Town::where('maxa', $modeldn->mahuyen)
                        ->first();

                    return view('manage.kkgia.than.kkgia.kkgiadv.index')
                        ->with('model', $model)
                        ->with('modeldn', $modeldn)
                        ->with('modeldv', $modeldv)
                        ->with('inputs', $inputs)
                        ->with('pageTitle', 'Danh sách hồ sơ kê khai than');
                } else
                    return view('errors.perm');
            } else
                return view('errors.perm');

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
                $modelct = KkGiaThanCtDf::where('maxa',$inputs['masothue'])->get();
                $modeldn = Company::where('maxa', $inputs['masothue'])
                    ->where('level', 'THAN')->first();
                $datenow = date('Y-m-d');
                $ngayhieuluc = date('d/m/Y', strtotime(getNgayApDung($datenow,$modeldn->mahuyen)));
                $ngaynhap = date('d/m/Y', strtotime($datenow));

                return view('manage.kkgia.than.kkgia.kkgiadv.create')
                    ->with('modeldn', $modeldn)
                    ->with('modelct',$modelct)
                    ->with('maxa', $inputs['masothue'])
                    ->with('ngaynhap', $ngaynhap)
                    ->with('ngayhieuluc', $ngayhieuluc)
                    ->with('pageTitle', 'Kê khai giá than thêm mới');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'THAN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = new KkGiaThan();
                $inputs['mahs'] = $inputs['maxa'].getdate()[0];
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                if($model->create($inputs)){
                    $modelctdf = KkGiaThanCtDf::where('maxa',$inputs['maxa']);

                    foreach($modelctdf->geT() as $ctdf) {
                        $modelct = new KkGiaThanCt();
                        $arrays = $ctdf->toArray();
                        unset($arrays['id']);
                        $arrays['mahs'] = $inputs['mahs'];
                        $modelct->create($arrays);
                    }
                    $modelctdf->delete();
                }
                return redirect('kekhaigiathan?&masothue='.$inputs['maxa']);
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
            $modelkk = KkGiaThan::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->where('level','THAN')
                ->first();
            $modelkkct = KkGiaThanCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('manage.kkgia.than.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá than');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X' || session('admin')->level == 'THAN'){
                $model = KkGiaThan::findOrFail($id);
                $modelct = KkGiaThanCt::where('mahs',$model->mahs)->get();
                $modeldn = Company::where('maxa', $model->maxa)
                    ->where('level', 'THAN')->first();

                return view('manage.kkgia.than.kkgia.kkgiadv.edit')
                    ->with('modeldn', $modeldn)
                    ->with('modelct',$modelct)
                    ->with('model',$model)
                    ->with('pageTitle', 'Kê khai giá than chỉnh sửa');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'THAN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model = KkGiaThan::findOrFail($id);
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model->update($inputs);
                return redirect('kekhaigiathan?&masothue='.$model->maxa);
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'THAN' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $id = $inputs['iddelete'];
                $model = KkGiaThan::findOrFail($id);
                if($model->delete()){
                    $modelct = KkGiaThanCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaigiathan?&masothue='.$model->maxa);
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
            $model = KkGiaThan::where('id',$inputs['id'])
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
            if (session('admin')->level == 'THAN' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = KkGiaThan::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = Company::where('maxa',$model->maxa)
                        ->where('level','THAN')
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
                return redirect('kekhaigiathan?&masothue='.$model->maxa);
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
            $model = KkGiaThan::where('id',$inputs['id'])
                ->first();
            $modelql = Town::where('maxa',$model->mahuyen)->first();
            $modeldn = Company::where('maxa',$model->maxa)
                ->where('level','THAN')
                ->first();

            $result['message'] = '<div class="form-group" id="showlydo">';
            $result['message'] = '<label style="color: blue"><b>'.$modelql->tendv.'</b> trả lại hồ sơ kê khai giá số: <b>'.$model->socv.'</b> của '.$modeldn->tendn.'- mã số thuế <b>'.$modeldn->maxa.'</b> vào lúc <b>'.getDateTime($model->updated_at).'</b>.<br> Lý do trả lại: '.$model->lydo.'</lable>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
}
