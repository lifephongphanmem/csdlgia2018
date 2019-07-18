<?php

namespace App\Http\Controllers;

use App\Company;
use App\District;
use App\DmMhBinhOnGia;
use App\Register;
use App\Town;
use App\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X'){
                $inputs = $request->all();
                $inputs['level'] = isset($inputs['level']) ? $inputs['level'] : '';
                //Check quyền

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

                $model = Register::where('level', $inputs['level'])
                    ->where('mahuyen',$inputs['maxa'])
                    ->get();
                $ttdv = Town::where('maxa',$inputs['maxa'])->first();
                return view('system.register.xetduyet.index')
                    ->with('model', $model)
                    ->with('inputs', $inputs)
                    ->with('modeldv', $modeldv)
                    ->with('modeldvql',$modeldvql)
                    ->with('ttdv',$ttdv)
                    ->with('pageTitle', 'Xét duyệt tài khoản đăng ký');

            }else
                return view('errors.noperm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X'){
                $model = Register::findOrFail($id);
                $cqcq = Town::all();
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                return view('system.register.xetduyet.edit')
                    ->with('model', $model)
                    ->with('cqcq', $cqcq)
                    ->with('settingdvvt', $settingdvvt)
                    ->with('pageTitle', 'Chỉnh sửa thông tin đăng ký tài khoản dịch vụ');
            }else
                return view('errors.noperm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X'){
                $inputs = $request->all();
                $model = Register::findOrFail($id);
                $inputs['settingdvvt'] = isset($inputs['roles']) ? json_encode($inputs['roles']) : '';
                $model->update($inputs);
                return redirect('register?&level='.$model->level.'&mahuyen='.$model->mahuyen);
            }else
                return view('errors.noperm');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X'){
                $model = Register::findOrFail($id);
                $dvcq = Town::where('maxa', $model->mahuyen)->first()->tendv;
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                $loaihinhhd = !empty($model->loaihinhhd) ? json_decode($model->loaihinhhd) : '';
                $dmbog = DmMhBinhOnGia::all();
                return view('system.register.xetduyet.show')
                    ->with('model', $model)
                    ->with('dvcq', $dvcq)
                    ->with('settingdvvt', $settingdvvt)
                    ->with('loaihinhhd',$loaihinhhd)
                    ->with('dmbog',$dmbog)
                    ->with('pageTitle', 'Thông tin doanh nghiệp đăng ký tài khoản');
            }else
                return view('errors.noperm');
        }else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X'){
                $inputs = $request->all();
                $id = $inputs['idhs'];
                $model = Register::findOrFail($id);
                $inputs['trangthai'] = 'Bị trả lại';
                if($model->update($inputs)){
//                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
//                    $data=[];
//                    $data['tendn'] = $model->tendn;
//                    $data['tg'] = Carbon::now()->toDateTimeString();
//                    $data['tencqcq'] = $tencqcq->tendv;
//                    $data['masothue'] = $model->maxa;
//                    $data['user'] = $model->username;
//                    $data['madk'] = $model->ma;
//                    $data['lydo'] = $inputs['lydo'];
//                    $a = $model->email;
//                    $b  =  $model->tendn;
//                    Mail::send('mail.replyregister',$data, function ($message) use($a,$b) {
//                        $message->to($a,$b )
//                            ->subject('Thông báo trả lại thông tin đăng ký ');
//                        $message->from('csdlgia@gmail.com','Phần mềm CSDL giá');
//                    });
                }
                return redirect('register?&level='.$model->level.'&mahuyen='.$model->mahuyen);
            }else
                return view('errors.noperm');
        }else
            return view('errors.notlogin');
    }

    public function searchregister(){
        return view('system.register.search.index')
            ->with('pageTitle','Kiểm tra tài khoản!!!');
    }

    public function checksearchregister(Request $request){
        $input = $request->all();

        $check1 = Register::where('maxa',$input['maxa'])
            ->where('level',$input['level'])
            ->first();
        if(isset($check1)){
            if($check1->trangthai == 'Chờ duyệt'){
                return view('system.register.view.register-choduyet');
            }else
                return view('system.register.view.register-tralai')
                    ->with('lydo',$check1->lydo);
        }else{
            $check2 = Users::where('maxa',$input['maxa'])
                ->first();
            if(isset($check2)){
                return view('system.register.view.register-usersuccess');
            }else{
                return view('system.register.view.register-nouser');
            }
        }
    }

    public function showttdktk(){
        return view('system.register.search.show');
    }

    public function chinhsuadktk(Request $request){
        $input = $request->all();
        $model = Register::where('ma',$input['ma'])
            ->first();
        if(isset($model)){
            if($model->trangthai == 'Bị trả lại') {

                $cqcq = Town::all();
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                $loaihinhhd = !empty($model->loaihinhhd) ? json_decode($model->loaihinhhd) : '';
                return view('system.register.search.edit')
                    ->with('cqcq', $cqcq)
                    ->with('model', $model)
                    ->with('settingdvvt',$settingdvvt)
                    ->with('loaihinhhd',$loaihinhhd)
                    ->with('pageTitle', 'Chỉnh sửa thông tin đăng ký tài khoản');
            }else{
                return view('system.register.view.register-edit-errors');
            }
        }else{
            return view('system.register.view.register-edit-errors');
        }
    }

    public function dangkytaikhoan(Request $request){
        $inputs = $request->all();
        $model = Town::all();
        $modelbog = DmMhBinhOnGia::all();

        return view('system.register.dktk.index')
            ->with('model',$model)
            ->with('level',$inputs['level'])
            ->with('modelbog',$modelbog)
            ->with('pageTitle','Đăng ký thông tin tài khoản doanh nghiệp');
    }

    public function dangkytaikhoanstore(Request $request)
    {
        $inputs = $request->all();

        //Bỏ captcha phần vĩnh phúc
        //if ($inputs['g-recaptcha-response'] != '') {
        $check = Company::where('maxa', $inputs['maxa'])
            ->where('level', $inputs['level'])
            ->first();
        if (count($check) > 0) {
            return view('errors.register-errors');
        } else {
            $checkuser = Users::where('username', $inputs['username'])->first();
            if (count($checkuser) > 0) {
                return view('errors.register-errors');
            } else {
                $inputs['ma'] = getdate()[0];
                if(isset($inputs['roles'])){
                    $inputs['settingdvvt'] = json_encode($inputs['roles']);
                    $inputs['loaihinhhd'] = json_encode($inputs['roles']);
                    $x = $inputs['roles'];
                    $inputs['vtxk'] = isset($x['dvvt']['vtxk']) ? 1 : 0;
                    $inputs['vtxb'] = isset($x['dvvt']['vtxb']) ? 1 : 0;
                    $inputs['vtxtx'] = isset($x['dvvt']['vtxtx']) ? 1 : 0;
                    $inputs['vtch'] = isset($x['dvvt']['vtch']) ? 1 : 0;

                    $inputs['xangdau'] = isset($x['dkg']['xangdau']) ? 1 : 0;
                    $inputs['dien'] = isset($x['dkg']['dien']) ? 1 : 0;
                    $inputs['khidau'] = isset($x['dkg']['khidau']) ? 1 : 0;
                    $inputs['phan'] = isset($x['dkg']['phan']) ? 1 : 0;
                    $inputs['thuocbvtv'] = isset($x['dkg']['thuocbvtv']) ? 1 : 0;
                    $inputs['vacxingsgc'] = isset($x['dkg']['vacxingsgc']) ? 1 : 0;
                    $inputs['muoi'] = isset($x['dkg']['muoi']) ? 1 : 0;
                    $inputs['suate6t'] = isset($x['dkg']['suate6t']) ? 1 : 0;
                    $inputs['duong'] = isset($x['dkg']['duong']) ? 1 : 0;
                    $inputs['thocgao'] = isset($x['dkg']['thocgao']) ? 1 : 0;
                    $inputs['thuocpcb'] = isset($x['dkg']['thuocpcb']) ? 1 : 0;
                }

                $inputs['trangthai'] = 'Chờ duyệt';
                $inputs['password'] = md5($inputs['rpassword']);
//dd($inputs);
                $model = new Register();
                if ($model->create($inputs)) {
//                    $tencqcq = Town::where('maxa', $inputs['mahuyen'])->first();
//                    $data = [];
//                    $data['tendn'] = $inputs['tendn'];
//                    $data['tg'] = Carbon::now()->toDateTimeString();
//                    $data['tencqcq'] = $tencqcq->tendv;
//                    $data['masothue'] = $inputs['maxa'];
//                    $data['user'] = $inputs['username'];
//                    $data['madk'] = $inputs['ma'];
//                    $maildn = $inputs['email'];
//                    $tendn = $inputs['tendn'];
//                    $mailql = $tencqcq->emailqt;
//                    $tenql = $tencqcq->tendv;
//                    Mail::send('mail.register', $data, function ($message) use ($maildn, $tendn, $mailql, $tenql) {
//                        $message->to($maildn, $tendn)
//                            ->to($mailql, $tenql)
//                            ->subject('Thông báo đăng ký tài khoản');
//                        $message->from('csdlgia@gmail.com', 'Phần mềm CSDL giá');
//                    });
                }
                return view('system.register.view.register-success')
                    ->with('ma', $inputs['ma']);
            }
        }
        //} else {
        //return view('errors.register-errors');
        //}
    }

    public function dangkytaikhoanupdate(Request $request,$id){
        $inputs = $request->all();
        $checkuser = Users::where('username', $inputs['username'])->first();
        if (count($checkuser) > 0) {
            return view('errors.register-errors');
        } else {
            $inputs['trangthai'] = 'Chờ duyệt';
            $inputs['password'] = md5($inputs['rpassword']);
            $inputs['settingdvvt'] = isset($inputs['roles']) ? json_encode($inputs['roles']) : '';
            if(isset($inputs['roles'])){
                $inputs['settingdvvt'] = json_encode($inputs['roles']);
                $inputs['loaihinhhd'] = json_encode($inputs['roles']);
                $x = $inputs['roles'];
                $inputs['vtxk'] = isset($x['dvvt']['vtxk']) ? 1 : 0;
                $inputs['vtxb'] = isset($x['dvvt']['vtxb']) ? 1 : 0;
                $inputs['vtxtx'] = isset($x['dvvt']['vtxtx']) ? 1 : 0;
                $inputs['vtch'] = isset($x['dvvt']['vtch']) ? 1 : 0;

                $inputs['xangdau'] = isset($x['dkg']['xangdau']) ? 1 : 0;
                $inputs['dien'] = isset($x['dkg']['dien']) ? 1 : 0;
                $inputs['khidau'] = isset($x['dkg']['khidau']) ? 1 : 0;
                $inputs['phan'] = isset($x['dkg']['phan']) ? 1 : 0;
                $inputs['thuocbvtv'] = isset($x['dkg']['thuocbvtv']) ? 1 : 0;
                $inputs['vacxingsgc'] = isset($x['dkg']['vacxingsgc']) ? 1 : 0;
                $inputs['muoi'] = isset($x['dkg']['muoi']) ? 1 : 0;
                $inputs['suate6t'] = isset($x['dkg']['suate6t']) ? 1 : 0;
                $inputs['duong'] = isset($x['dkg']['duong']) ? 1 : 0;
                $inputs['thocgao'] = isset($x['dkg']['thocgao']) ? 1 : 0;
                $inputs['thuocpcb'] = isset($x['dkg']['thuocpcb']) ? 1 : 0;
            }
            $model = Register::findOrFail($id);
            if ($model->update($inputs)) {
//                $tencqcq = Town::where('maxa', $inputs['mahuyen'])->first();
//                $data = [];
//                $data['tendn'] = $inputs['tendn'];
//                $data['tg'] = Carbon::now()->toDateTimeString();
//                $data['tencqcq'] = $tencqcq->tendv;
//                $data['masothue'] = $inputs['maxa'];
//                $data['user'] = $inputs['username'];
//                $data['madk'] = $model->ma;
//                $maildn = $inputs['email'];
//                $tendn = $inputs['tendn'];
//                $mailql = $tencqcq->emailqt;
//                $tenql = $tencqcq->tendv;
//                Mail::send('mail.register', $data, function ($message) use ($maildn, $tendn, $mailql, $tenql) {
//                    $message->to($maildn, $tendn)
//                        ->to($mailql, $tenql)
//                        ->subject('Thông báo đăng ký tài khoản');
//                    $message->from('csdlgia@gmail.com', 'Phần mềm CSDL giá');
//                });

            }
            return view('system.register.view.register-success')
                ->with('ma',$model->ma);
        }
    }

    public function checkmasothue(Request $request){
        $inputs = $request->all();
        $model = Company::where('maxa',$inputs['maxa'])
            ->where('level',$inputs['level'])
            ->first();
        $modelrg = Register::where('maxa',$inputs['maxa'])
            ->where('level',$inputs['level'])
            ->first();
        if(isset($model)) {
            echo 'cancel';
        }else{
            if(isset($modelrg)){
                echo 'cancel';
            }else
                echo 'ok';
        }
    }

    public function checkuser(Request $request){
        $inputs = $request->all();
        $model = Users::where('username', $inputs['user'])
            ->first();
        $modelrg = Register::where('username', $inputs['user'])
            ->first();
        if(isset($model)) {
            echo 'cancel';
        }else{
            if(isset($modelrg)){
                echo 'cancel';
            }else
                echo 'ok';
        }
    }

    public function createtk(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $id = $input['idregister'];
            $model = Register::findOrFail($id);
            $inputs = $model->toArray();
            $inputs['pl'] = $model->pl;
            $inputs['avatar'] = 'no-image-available.jpg';
            unset($inputs['id']);
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $check = Company::where('maxa',$model->maxa)
                    ->where('level',$model->level)
                    ->first();

                if(count($check)>0){
                    return view('errors.notcrregisterlt');
                }else {
                    $modeldn = new Company();
                    if($modeldn->create($inputs)){
                        $modeluser = new Users();
                        $modeluser->name = $model->tendn;
                        $modeluser->username = $model->username;
                        $modeluser->password = $model->password;
                        $modeluser->email = $model->email;
                        $modeluser->status = 'Kích hoạt';
                        $modeluser->mahuyen = $model->mahuyen;
                        $modeluser->level = $model->level;
                        $modeluser->maxa = $model->maxa;
                        $modeluser->ttnguoitao = session('admin')->name.'('.session('admin')->username.') - '. getDateTime(Carbon::now()->toDateTimeString());
                        $modeluser->phanloai = $model->pl;
                        $modeluser->save();
                    }
//                    $tencqcq = Town::where('maxa', $model->mahuyen)->first();
//                    $data = [];
//                    $data['tendn'] = $model->tendn;
//                    $data['tg'] = Carbon::now()->toDateTimeString();
//                    $data['tencqcq'] = $tencqcq->tendv;
//                    $data['masothue'] = $model->maxa;
//                    $data['username'] = $model->username;
//                    $maildn = $model->email;
//                    $tendn = $model->tendn;
//                    $mailql = $tencqcq->emailqt;
//                    $tenql = $tencqcq->tendv;
//
//                    Mail::send('mail.successregister', $data, function ($message) use ($maildn,$tendn,$mailql,$tenql) {
//                        $message->to($maildn,$tendn)
//                            ->to($mailql,$tenql)
//                            ->subject('Thông báo thông tin đăng ký đã được xét duyệt');
//                        $message->from('phanmemcsdlgia@gmail.com', 'Phần mềm CSDL giá');
//                    });
                    $delete = Register::findOrFail($id)->delete();
                    return redirect('register?&level='.$model->level);
                }

            }else{
                return view('errors.noperm');
            }

        } else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X'){
                $inputs = $request->all();
                $model = Register::where('id',$inputs['iddelete'])
                    ->first();
                //$level = $model->level;
                $model->delete();
                return redirect('register');
            }else{
                return view('errors.noperm');
            }

        }else
            return view('errors.notlogin');
    }
}
