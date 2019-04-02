<?php

namespace App\Http\Controllers;

use App\District;
use App\Town;
use App\TtDnTd;
use App\Company;
use App\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {

                $inputs = $request->all();
                $inputs['level'] =  isset($inputs['level']) ? $inputs['level'] : '';
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

                $tttown = Town::where('maxa',$inputs['maxa'])->first();

                $model = Company::where('level', $inputs['level'])
                    ->where('mahuyen',$inputs['maxa'])
                    ->get();


                return view('system.company.index')
                    ->with('model', $model)
                    ->with('inputs', $inputs)
                    ->with('modeldv', $modeldv)
                    ->with('modeldvql',$modeldvql)
                    ->with('tttown',$tttown)
                    ->with('pageTitle', 'Danh mục doanh nghiệp cung cấp dịch vụ');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $model = Company::findOrFail($id);
                $district = Town::all();
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                $loaihinhhd = !empty($model->loaihinhhd) ? json_decode($model->loaihinhhd) : '';
                return view('system.company.edit')
                    ->with('model', $model)
                    ->with('district', $district)
                    ->with('settingdvvt', $settingdvvt)
                    ->with('loaihinhhd',$loaihinhhd)
                    ->with('pageTitle', 'Chỉnh sửa thông tin doanh nghiệp cung cấp dịch vụ');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $inputs = $request->all();
                $model = Company::findOrFail($id);
                $inputs['settingdvvt'] = isset($inputs['roles']) ? json_encode($inputs['roles']) : '';
                $x = $inputs['roles'];
                $inputs['vtxk'] = isset($x['dvvt']['vtxk']) ? 1 : 0;
                $inputs['vtxb'] = isset($x['dvvt']['vtxb']) ? 1 : 0;
                $inputs['vtxtx'] = isset($x['dvvt']['vtxtx']) ? 1 : 0;
                $inputs['vtch'] = isset($x['dvvt']['vtch']) ? 1 : 0;
                if($model->mahuyen != $inputs['mahuyen'] || $model->tendn != $inputs['tendn']){
                    $modeluser = Users::where('maxa',$model->maxa)
                        ->where('level',$model->level)
                        ->first();
                    $modeluser->mahuyen = $inputs['mahuyen'];
                    $modeluser->name = $inputs['tendn'];
                    $modeluser->save();
                }
                $model->update($inputs);
                return redirect('company?&level='.$model->level);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function ttdn(Request $request){
        if (Session::has('admin')) {
                $inputs = $request->all();
                $inputs['level'] = session('admin')->level;
                $model = Company::where('level',$inputs['level'])
                    ->where('maxa',session('admin')->maxa)
                    ->first();
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                $modeltttd = TtDnTd::where('maxa', session('admin')->maxa)
                    ->where('level',$inputs['level'])
                    ->first();
                $settingdvvttd = !empty($modeltttd->settingdvvt) ? json_decode($modeltttd->settingdvvt) : '';
                $model_cqcq = Town::where('maxa', session('admin')->mahuyen)->first();
                if(count($model_cqcq)>0){
                    $model->tencqcq=$model_cqcq->tendv;
                    if(count($modeltttd)>0)
                        $modeltttd->tencqcq = $model_cqcq->tendv;
                }
                return view('manage.kkgia.ttdn.index')
                    ->with('model', $model)
                    ->with('modeltttd', $modeltttd)
                    ->with('settingdvvt',$settingdvvt)
                    ->with('settingdvvttd',$settingdvvttd)
                    ->with('pageTitle', 'Thông tin doanh nghiệp');
        }else
            return view('errors.notlogin');
    }

    public function ttdnedit($id){
        if (Session::has('admin')) {
            //Kiểm tra thông tin có thuộc quyền quản lý hay k
            $model = Company::findOrFail($id);
            if(session('admin')->maxa == $model->maxa) {
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                return view('manage.kkgia.ttdn.edit')
                    ->with('model', $model)
                    ->with('settingdvvt',$settingdvvt)
                    ->with('pageTitle', 'Thông tin doanh nghiệp chỉnh sửa');
            }else
                return view('errors.noperm');
        }else
            return view('errors.notlogin');
    }

    public function ttdnupdate(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $check = TtDnTd::where('maxa', session('admin')->maxa)
                ->where('level',$inputs['level'])
                ->delete();
            $model = new TtDnTd();

            if(isset($inputs['roles'])){
                $inputs['settingdvvt'] = json_encode($inputs['roles']);
                $x = $inputs['roles'];
                $inputs['vtxk'] = isset($inputs['dvvt']['vtxk']) ? 1 : 0;
                $inputs['vtxb'] = isset($x['dvvt']['vtxb']) ? 1 : 0;
                $inputs['vtxtx'] = isset($x['dvvt']['vtxtx']) ? 1 : 0;
                $inputs['vtch'] = isset($x['dvvt']['vtch']) ? 1 : 0;
            }else {
                $inputs['settingdvvt'] = '';
                $inputs['vtxk'] = 0;
                $inputs['vtxb'] = 0;
                $inputs['vtxtx'] = 0;
                $inputs['vtch'] = 0;
            }
            $inputs['trangthai'] = 'CC';
            $model->create($inputs);

            return redirect('thongtindoanhnghiep');
        } else
            return view('errors.notlogin');
    }

    public function ttdnchinhsua($id){
        if (Session::has('admin')) {
            //Kiểm tra thông tin có thuộc quyền quản lý hay k
            $model = TtDnTd::findOrFail($id);
            if(session('admin')->maxa == $model->maxa) {
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                return view('manage.kkgia.ttdn.editdf')
                    ->with('model', $model)
                    ->with('settingdvvt',$settingdvvt)
                    ->with('pageTitle', 'Thông tin doanh nghiệp chỉnh sửa');
            }else
                return view('errors.noperm');
        }else
            return view('errors.notlogin');
    }

    public function ttdncapnhat($id,Request $request){
        if (Session::has('admin')) {
            $inputs =$request->all();
            $model = TtDnTd::findOrFail($id);
            if(isset($inputs['roles'])){
                $inputs['settingdvvt'] = json_encode($inputs['roles']);
                $x = $inputs['roles'];
                $inputs['vtxk'] = isset($inputs['dvvt']['vtxk']) ? 1 : 0;
                $inputs['vtxb'] = isset($x['dvvt']['vtxb']) ? 1 : 0;
                $inputs['vtxtx'] = isset($x['dvvt']['vtxtx']) ? 1 : 0;
                $inputs['vtch'] = isset($x['dvvt']['vtch']) ? 1 : 0;
            }else {
                $inputs['settingdvvt'] = '';
                $inputs['vtxk'] = 0;
                $inputs['vtxb'] = 0;
                $inputs['vtxtx'] = 0;
                $inputs['vtch'] = 0;
            }
            $model->update($inputs);

            return redirect('thongtindoanhnghiep');
        }else
            return view('errors.notlogin');
    }

    public function ttdnchuyen($id){
        if (Session::has('admin')) {
            $model = TtDnTd::find($id);
            $model->trangthai = 'CD';
            if($model->save()) {
                $dn = Company::where('maxa', $model->maxa)
                    ->where('level',$model->level)
                    ->first();
                $tencqcq = Town::where('maxa', $dn->mahuyen)->first();
                $data = [];
                $data['tendn'] = $dn->tendn;
                $data['tg'] = Carbon::now()->toDateTimeString();
                $data['tencqcq'] = $tencqcq->tendv;
                $maildn = $dn->email;
                $tendn = $dn->tendn;
                $mailql = $tencqcq->emailqt;
                $tenql = $tencqcq->tendv;
                Mail::send('mail.changettdn', $data, function ($message) use ($maildn, $tendn, $mailql, $tenql) {
                    $message->to($maildn, $tendn)
                        ->to($mailql, $tenql)
                        ->subject('Thông báo thông tin thay đổi thông tin doanh nghiệp');
                    $message->from('phanmemcsdlgia@gmail.com', 'Phần mềm CSDL giá');
                });
            }
            return redirect('thongtindoanhnghiep');
        }else
            return view('errors.notlogin');
    }

    public function upavatar(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVVT' || session('admin')->level == 'TPCNTE6T' || session('admin')->level == 'TACN') {
                $inputs = $request->all();
                $id = $inputs['id'];
                $model = Company::findOrFail($id);
                if(isset($inputs['avatar'])) {
                    $avatar = $request->file('avatar');
                    $inputs['avatar'] = $model->maxa . '.' . $avatar->getClientOriginalExtension();
                    $avatar->move(public_path() . '/images/avatar/', $inputs['avatar']);
                }
                $model->update($inputs);
                return redirect('thongtindoanhnghiep');
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }
}
