<?php

namespace App\Http\Controllers;

use App\Company;
use App\CsKdDvLt;
use App\District;
use App\DmDvQl;
use App\dmvitridat;
use App\DnDvGs;
use App\DnDvLt;
use App\DnDvLtReg;
use App\DonViDvVt;
use App\DonViDvVtReg;
use App\GeneralConfigs;
use App\KkDvVtKhac;
use App\KkDvVtXb;
use App\KkDvVtXk;
use App\KkDvVtXtx;
use App\KkGDvGs;
use App\KkGDvLt;
use App\KkGDvTaCn;
use App\Register;
use App\TtDn;
use App\TtQd;
use App\Users;
use App\ViewPage;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /*
     * Thông tin email
     *
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=giadvvinhphuc@gmail.com
    MAIL_PASSWORD=giadvvinhphuc123456
    MAIL_ENCRYPTION=tls

    1. Please download the full version of the software at:
https://www.swordsky.com/F/PRO4/7FWODF59DF/dwfull/

2. Install the full version of the software on your computer.
** Administrator user is recommended

3. Start up the software and enter your registration information.

Your registration information is:

User name: Viet Hai Nguyen
User email: hainv@outlook.com
License code: PRO4-69G6Q4M-8YGNXX-M2N8-KCHVWYK

     * */
    public function index(){
        if (Session::has('admin')) {
            if(session('admin')->sadmin == 'sa' )
                return redirect('general');
            else{
                return view('dashboard')
                    ->with('pageTitle','Thông tin hỗ trợ');
            }
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
            $session = Session::getId();
            $model = ViewPage::where('ip',$ip)
                ->where('session',$session)->count();
            if($model == 0){
                $model = new ViewPage();
                $model->ip = $ip;
                $model->session = $session;
                $model->save();
            }
            return redirect('giahanghoadichvu');
        }
    }

    public function congbo(){

        $viewpage = ViewPage::count();
        return view('dashboardcb')

            ->with('viewpage',$viewpage)
            ->with('pageTitle','Giá hàng hóa - dịch vụ');
    }

    /*public function regdvlt(){
        $model = DmDvQl::where('plql','TC')
            ->get();
        return view('system.register.dvlt.register')
            ->with('model',$model)
            ->with('pageTitle','Đăng ký thông tin doanh nghiệp cung cấp dịch vụ lưu trú');
    }*/

    /*public function regdvltstore(Request $request){
        $input = $request->all();
        if($input['g-recaptcha-response'] != '') {
            $check = DnDvLt::where('masothue', $input['masothue'])
                ->first();
            if (count($check) > 0) {
                return view('errors.register-errors');
            } else {
                $checkuser = User::where('username', $input['username'])->first();
                if (count($checkuser) > 0) {
                    return view('errors.register-errors');
                } else {

                    $ma = getdate()[0];
                    $model = new Register();
                    $model->tendn = $input['tendn'];
                    $model->masothue = $input['masothue'];
                    $model->diachi = $input['diachidn'];
                    $model->tel = $input['teldn'];
                    $model->fax = $input['faxdn'];
                    $model->email = $input['emaildn'];
                    $model->noidknopthue = $input['noidknopthue'];
                    $model->cqcq = $input['cqcq'];
                    $model->giayphepkd = $input['giayphepkd'];
                    $model->tailieu = $input['tailieu'];
                    $model->username = $input['username'];
                    $model->password = md5($input['rpassword']);
                    $model->pl = 'DVLT';
                    $model->diadanh = $input['diadanh'];
                    $model->nguoiky = $input['nguoiky'];
                    $model->chucdanh = $input['chucdanh'];
                    $model->setting = '';
                    $model->dvxk = 0;
                    $model->dvxb = 0;
                    $model->dvxtx = 0;
                    $model->dvk = 0;
                    $model->trangthai = 'Chờ duyệt';
                    $model->lydo = '';
                    $model->ma = $ma;
                    if ($model->save()) {
                        $tencqcq = DmDvQl::where('maqhns', $input['cqcq'])->first();
                        $data = [];
                        $data['tendn'] = $input['tendn'];
                        $data['tg'] = Carbon::now()->toDateTimeString();
                        $data['tencqcq'] = $tencqcq->tendv;
                        $data['masothue'] = $input['masothue'];
                        $data['user'] = $input['username'];
                        $data['madk'] = $ma;
                        $maildn = $input['emaildn'];
                        $tendn = $input['tendn'];
                        $mailql = $tencqcq->emailqt;
                        $tenql = $tencqcq->tendv;

                        Mail::send('mail.register', $data, function ($message) use ($maildn, $tendn, $mailql, $tenql) {
                            $message->to($maildn, $tendn)
                                ->to($mailql, $tenql)
                                ->subject('Thông báo đăng ký tài khoản');
                            $message->from('qlgiakhanhhoa@gmail.com', 'Phần mềm CSDL giá');
                        });

                    }
                    return view('system.register.view.register-success')
                        ->with('ma', $ma);
                }
            }
        }else
            return view('errors.register-errors');
    }*/

    /*public function regdvvt(){
        $model = DmDvQl::where('plql','VT')
            ->get();
        return view('system.register.dvvt.register')
            ->with('model',$model)
            ->with('pageTitle','Đăng ký thông tin doanh nghiệp cung cấp dịch vụ vận tải');
    }*/

    /*public function regdvvtstore(Request $request){
        $input = $request->all();
        $ma = getdate()[0];
        $model = new Register();

        $model->tendn = $input['tendn'];
        $model->masothue = $input['masothue'];
        $model->diachi = $input['diachidn'];
        $model->tel = $input['teldn'];
        $model->fax = $input['faxdn'];
        $model->email = $input['emaildn'];
        $model->noidknopthue = $input['noidknopthue'];
        $model->giayphepkd = $input['giayphepkd'];
        $model->tailieu = $input['tailieu'];
        $model->cqcq = $input['cqcq'];
        $model->username = $input['username'];
        $model->password = md5($input['rpassword']);
        $model->pl = 'DVVT';

        $input['roles'] = isset($input['roles']) ? $input['roles'] : null;
        $model->setting = json_encode($input['roles']);
        $x = $input['roles'];
        $model->dvxk = isset($x['dvvt']['vtxk']) ? 1 : 0;
        $model->dvxb = isset($x['dvvt']['vtxb']) ? 1 : 0;
        $model->dvxtx = isset($x['dvvt']['vtxtx']) ? 1 : 0;
        $model->dvk = isset($x['dvvt']['vtch']) ? 1 : 0;
        $model->trangthai = 'Chờ duyệt';
        $model->lydo='';
        $model->ma = $ma;
        $model->save();
        return view('system.register.view.register-success')
            ->with('ma',$ma);
    }*/

    /*public function regdverror(){
        return view('system.users.register.registererror.index')
            ->with('pageTitle','Thông tin tài khoản chưa được kích hoạt');
    }*/

    /*public function checkrgmasothue(Request $request){
        $input = $request->all();
        if ($input['pl'] == 'DVLT') {
            $model = DnDvLt::where('masothue', $input['masothue'])
                ->first();
            $modelrg = Register::where('masothue', $input['masothue'])
                ->where('pl','DVLT')
                ->first();
        }elseif($input['pl']=='DVVT'){
            $model = DonViDvVt::where('masothue',$input['masothue'])
                ->first();
            $modelrg = Register::where('masothue',$input['masothue'])
                ->where('pl','DVVT')
                ->first();
        }elseif($input['pl']=='DVGS'){
            $model = DnDvGs::where('masothue',$input['masothue'])
                ->first();
            $modelrg = Register::where('masothue',$input['masothue'])
                ->where('pl','DVGS')
                ->first();
        }
        if(isset($model)) {
            echo 'cancel';
        }else{
            if(isset($modelrg)){
                echo 'cancel';
            }else
                echo 'ok';
        }
    }*/

    /*public function checkrguser(Request $request){
        $input = $request->all();
        $model = User::where('username', $input['user'])
            ->first();
        $modelrg = Register::where('username', $input['user'])
            ->first();
        if(isset($model)) {
            echo 'cancel';
        }else{
            if(isset($modelrg)){
                echo 'cancel';
            }else
                echo 'ok';
        }
    }*/

    public function forgotpassword(){
        return view('system.users.forgotpassword.index')
            ->with('pageTitle','Quên mật khẩu???');
    }

    public function forgotpasswordw(Request $request){

        $input = $request->all();
        $model = Users::where('username',$input['username'])->first();
        if(isset($model)){
            if($model->email == $input['email']){
                $npass = getRandomPassword();
                $model->password = md5($npass);
                $model->save();

                $data = [];
                $data['tendn'] = $model->name;
                $data['username'] = $model->username;
                $data['npass'] = $npass;
                $maildn = $model->email;
                $tendn = $model->name;

                Mail::send('mail.successnewpassword', $data, function ($message) use ($maildn,$tendn) {
                    $message->to($maildn,$tendn)
                        ->subject('Thông báo thay đổi mật khẩu tài khoản');
                    $message->from('qlgiakhanhhoa@gmail.com', 'Phần mềm CSDL giá');
                });
                return view('errors.forgotpass-success');
            }else
                return view('errors.forgotpass-errors');
        }else
            return view('errors.forgotpass-errors');

    }

    /*public function searchregister(){
        return view('system.register.search.index')
            ->with('pageTitle','Kiểm tra tài khoản!!!');
    }*/

    /*public function checksearchregister(Request $request){
        $input = $request->all();

        $check1 = Register::where('masothue',$input['masothue'])
            ->where('pl',$input['pl'])
            ->first();
        if(isset($check1)){
            if($check1->trangthai == 'Chờ duyệt'){
                return view('system.register.view.register-choduyet');
            }else
                return view('system.register.view.register-tralai')
                    ->with('lydo',$check1->lydo);
        }else{
            $check2 = Users::where('mahuyen',$input['masothue'])
                ->first();
            if(isset($check2)){
                return view('system.register.view.register-usersuccess');
            }else{
                return view('system.register.view.register-nouser');
            }
        }
    }*/

    /*public function show(){
        return view('system.register.search.show');
    }*/

    /*public function edit(Request $request){
        $input = $request->all();
        $model = Register::where('ma',$input['ma'])
            ->first();
        //dd($model);
        if(isset($model)){
            if($model->pl == 'DVLT'){
                $cqcq = DmDvQl::where('plql','TC')
                    ->get();
                return view('system.register.search.dvlt.edit')
                    ->with('cqcq',$cqcq)
                    ->with('model',$model)
                    ->with('pageTitle','Chỉnh sửa thông tin đăng ký tài khoản');
            }elseif($model->pl == 'DVVT'){
                $cqcq = DmDvQl::where('plql','VT')
                    ->get();
                return view('system.register.search.dvvt.edit')
                    ->with('cqcq',$cqcq)
                    ->with('model',$model)
                    ->with('pageTitle','Chỉnh sửa thông tin đăng ký tài khoản');
            }
            elseif($model->pl == 'DVGS'){
                $cqcq = DmDvQl::where('plql','CT')
                    ->get();
                return view('system.register.search.dvgs.edit')
                    ->with('cqcq',$cqcq)
                    ->with('model',$model)
                    ->with('pageTitle','Chỉnh sửa thông tin đăng ký tài khoản');
            }elseif($model->pl == 'DVTACN'){
                $cqcq = DmDvQl::where('plql','TC')
                    ->get();
                return view('system.register.search.dvtacn.edit')
                    ->with('cqcq',$cqcq)
                    ->with('model',$model)
                    ->with('pageTitle','Chỉnh sửa thông tin đăng ký tài khoản');
            }
        }else{
            return view('system.register.view.register-edit-errors');
        }
    }*/

    /*public function updatedvlt(Request $request, $id){
        $input = $request->all();
        $model = Register::findOrFail($id);
        $model->tendn = $input['tendn'];
        $model->masothue = $input['masothue'];
        $model->diachi = $input['diachidn'];
        $model->tel = $input['teldn'];
        $model->fax = $input['faxdn'];
        $model->email = $input['emaildn'];
        $model->noidknopthue = $input['noidknopthue'];
        $model->cqcq = $input['cqcq'];
        $model->giayphepkd = $input['giayphepkd'];
        $model->tailieu = $input['tailieu'];
        $model->username = $input['username'];
        $model->password = md5($input['rpassword']);
        $model->trangthai = 'Chờ duyệt';
        $model->chucdanh = $input['chucdanh'];
        $model->nguoiky = $input['nguoiky'];
        $model->diadanh = $input['diadanh'];
        if($model->save()){
            $tencqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
            $data=[];
            $data['tendn'] = $input['tendn'];
            $data['tg'] = Carbon::now()->toDateTimeString();
            $data['tencqcq'] = $tencqcq->tendv;
            $data['masothue'] = $input['masothue'];
            $data['user'] = $input['username'];
            $data['madk'] = $model->ma;
            $maildn = $input['emaildn'];
            $tendn  =  $input['tendn'];
            $mailql = $tencqcq->emailqt;
            $tenql = $tencqcq->tendv;
            Mail::send('mail.stlregister',$data, function ($message) use($maildn,$tendn,$mailql,$tenql) {
                $message->to($maildn,$tendn)
                    ->to($mailql,$tenql)
                    ->subject('Thông báo đăng ký tài khoản');
                $message->from('qlgiakhanhhoa@gmail.com','Phần mềm CSDL giá');
            });
        }
        return view('errors.register-success');
    }*/

    /*public function updatedvvt(Request $request, $id){
        $input = $request->all();
        $model = Register::findOrFail($id);

        $model->tendn = $input['tendn'];
        $model->masothue = $input['masothue'];
        $model->diachi = $input['diachidn'];
        $model->tel = $input['teldn'];
        $model->fax = $input['faxdn'];
        $model->email = $input['emaildn'];
        $model->noidknopthue = $input['noidknopthue'];
        $model->giayphepkd = $input['giayphepkd'];
        $model->tailieu = $input['tailieu'];
        $model->cqcq = $input['cqcq'];
        $model->username = $input['username'];
        $model->password = md5($input['rpassword']);

        $input['roles'] = isset($input['roles']) ? $input['roles'] : null;
        $model->setting = json_encode($input['roles']);
        $x = $input['roles'];
        $model->dvxk = isset($x['dvvt']['vtxk']) ? 1 : 0;
        $model->dvxb = isset($x['dvvt']['vtxb']) ? 1 : 0;
        $model->dvxtx = isset($x['dvvt']['vtxtx']) ? 1 : 0;
        $model->dvk = isset($x['dvvt']['vtch']) ? 1 : 0;
        $model->trangthai = 'Chờ duyệt';
        if($model->save()){
            $tencqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
            $data=[];
            $data['tendn'] = $input['tendn'];
            $data['tg'] = Carbon::now()->toDateTimeString();
            $data['tencqcq'] = $tencqcq->tendv;
            $data['masothue'] = $input['masothue'];
            $data['user'] = $input['username'];
            $data['madk'] = $model->ma;
            $a = $input['emaildn'];
            $b  =  $input['tendn'];
            Mail::send('mail.stlregister',$data, function ($message) use($a,$b) {
                $message->to($a,$b )
                    ->subject('Thông báo đăng ký tài khoản');
                $message->from('qlgiakhanhhoa@gmail.com','Phần mềm CSDL giá');
            });
        }
        return view('errors.register-success');
    }*/

    /*public function updatedvgs(Request $request, $id){
        $input = $request->all();
        $model = Register::findOrFail($id);
        $model->tendn = $input['tendn'];
        $model->masothue = $input['masothue'];
        $model->diachi = $input['diachidn'];
        $model->tel = $input['teldn'];
        $model->fax = $input['faxdn'];
        $model->email = $input['emaildn'];
        $model->noidknopthue = $input['noidknopthue'];
        $model->cqcq = $input['cqcq'];
        $model->giayphepkd = $input['giayphepkd'];
        $model->tailieu = $input['tailieu'];
        $model->username = $input['username'];
        $model->password = md5($input['rpassword']);
        $model->trangthai = 'Chờ duyệt';
        $model->chucdanh = $input['chucdanh'];
        $model->nguoiky = $input['nguoiky'];
        $model->diadanh = $input['diadanh'];
        if($model->save()){
            $tencqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
            $data=[];
            $data['tendn'] = $input['tendn'];
            $data['tg'] = Carbon::now()->toDateTimeString();
            $data['tencqcq'] = $tencqcq->tendv;
            $data['masothue'] = $input['masothue'];
            $data['user'] = $input['username'];
            $data['madk'] = $model->ma;
            $maildn = $input['emaildn'];
            $tendn  =  $input['tendn'];
            $mailql = $tencqcq->emailqt;
            $tenql = $tencqcq->tendv;
            Mail::send('mail.stlregister',$data, function ($message) use($maildn,$tendn,$mailql,$tenql) {
                $message->to($maildn,$tendn)
                    ->to($mailql,$tenql)
                    ->subject('Thông báo đăng ký tài khoản');
                $message->from('qlgiakhanhhoa@gmail.com','Phần mềm CSDL giá');
            });
        }
        return view('errors.register-success');
    }*/

    /*public function dangkydvgs(){
        $model = DmDvQl::where('plql','CT')
            ->get();
        return view('system.register.dvgs.register')
            ->with('model',$model)
            ->with('pageTitle','Đăng ký dịch vụ giá sữa');
    }*/

    /*public function dangkydvgsstore(Request $request){
        $input = $request->all();
        if($input['g-recaptcha-response'] != '') {
            $check = DnDvLt::where('masothue', $input['masothue'])
                ->first();
            if (count($check) > 0) {
                return view('errors.register-errors');
            } else {
                $checkuser = User::where('username', $input['username'])->first();
                if (count($checkuser) > 0) {
                    return view('errors.register-errors');
                } else {

                    $ma = getdate()[0];
                    $model = new Register();
                    $model->tendn = $input['tendn'];
                    $model->masothue = $input['masothue'];
                    $model->diachi = $input['diachidn'];
                    $model->tel = $input['teldn'];
                    $model->fax = $input['faxdn'];
                    $model->email = $input['emaildn'];
                    $model->noidknopthue = $input['noidknopthue'];
                    $model->cqcq = $input['cqcq'];
                    $model->giayphepkd = $input['giayphepkd'];
                    $model->tailieu = $input['tailieu'];
                    $model->username = $input['username'];
                    $model->password = md5($input['rpassword']);
                    $model->pl = 'DVGS';
                    $model->diadanh = $input['diadanh'];
                    $model->nguoiky = $input['nguoiky'];
                    $model->chucdanh = $input['chucdanh'];
                    $model->setting = '';
                    $model->dvxk = 0;
                    $model->dvxb = 0;
                    $model->dvxtx = 0;
                    $model->dvk = 0;
                    $model->trangthai = 'Chờ duyệt';
                    $model->lydo = '';
                    $model->ma = $ma;
                    if ($model->save()) {
                        $tencqcq = DmDvQl::where('maqhns', $input['cqcq'])->first();
                        $data = [];
                        $data['tendn'] = $input['tendn'];
                        $data['tg'] = Carbon::now()->toDateTimeString();
                        $data['tencqcq'] = $tencqcq->tendv;
                        $data['masothue'] = $input['masothue'];
                        $data['user'] = $input['username'];
                        $data['madk'] = $ma;
                        $maildn = $input['emaildn'];
                        $tendn = $input['tendn'];
                        $mailql = $tencqcq->emailqt;
                        $tenql = $tencqcq->tendv;

                        Mail::send('mail.register', $data, function ($message) use ($maildn, $tendn, $mailql, $tenql) {
                            $message->to($maildn, $tendn)
                                ->to($mailql, $tenql)
                                ->subject('Thông báo đăng ký tài khoản');
                            $message->from('qlgiakhanhhoa@gmail.com', 'Phần mềm CSDL giá');
                        });

                    }
                    return view('system.register.view.register-success')
                        ->with('ma', $ma);
                }
            }
        }else
            return view('errors.register-errors');
    }*/

    /*public function dangkydvtacn(){
        $model = DmDvQl::where('plql','TC')
            ->get();
        return view('system.register.dvtacn.register')
            ->with('model',$model)
            ->with('pageTitle','Đăng ký doanh nghiệp cung cấp thức ăn chăn nuôi');
    }*/

    /*public function dangkydvtacnstore(Request $request){
        $input = $request->all();
        if($input['g-recaptcha-response'] != '') {
            $check = DnDvLt::where('masothue', $input['masothue'])
                ->first();
            if (count($check) > 0) {
                return view('errors.register-errors');
            } else {
                $checkuser = User::where('username', $input['username'])->first();
                if (count($checkuser) > 0) {
                    return view('errors.register-errors');
                } else {

                    $ma = getdate()[0];
                    $model = new Register();
                    $model->tendn = $input['tendn'];
                    $model->masothue = $input['masothue'];
                    $model->diachi = $input['diachidn'];
                    $model->tel = $input['teldn'];
                    $model->fax = $input['faxdn'];
                    $model->email = $input['emaildn'];
                    $model->noidknopthue = $input['noidknopthue'];
                    $model->cqcq = $input['cqcq'];
                    $model->giayphepkd = $input['giayphepkd'];
                    $model->tailieu = $input['tailieu'];
                    $model->username = $input['username'];
                    $model->password = md5($input['rpassword']);
                    $model->pl = 'DVTACN';
                    $model->diadanh = $input['diadanh'];
                    $model->nguoiky = $input['nguoiky'];
                    $model->chucdanh = $input['chucdanh'];
                    $model->setting = '';
                    $model->dvxk = 0;
                    $model->dvxb = 0;
                    $model->dvxtx = 0;
                    $model->dvk = 0;
                    $model->trangthai = 'Chờ duyệt';
                    $model->lydo = '';
                    $model->ma = $ma;
                    if ($model->save()) {
                        $tencqcq = DmDvQl::where('maqhns', $input['cqcq'])->first();
                        $data = [];
                        $data['tendn'] = $input['tendn'];
                        $data['tg'] = Carbon::now()->toDateTimeString();
                        $data['tencqcq'] = $tencqcq->tendv;
                        $data['masothue'] = $input['masothue'];
                        $data['user'] = $input['username'];
                        $data['madk'] = $ma;
                        $maildn = $input['emaildn'];
                        $tendn = $input['tendn'];
                        $mailql = $tencqcq->emailqt;
                        $tenql = $tencqcq->tendv;

                        Mail::send('mail.register', $data, function ($message) use ($maildn, $tendn, $mailql, $tenql) {
                            $message->to($maildn, $tendn)
                                ->to($mailql, $tenql)
                                ->subject('Thông báo đăng ký tài khoản');
                            $message->from('qlgiakhanhhoa@gmail.com', 'Phần mềm CSDL giá');
                        });

                    }
                    return view('system.register.view.register-success')
                        ->with('ma', $ma);
                }
            }
        }else
            return view('errors.register-errors');
    }*/

    /*public function updatedvtacn(Request $request, $id){
        $input = $request->all();
        $input['trangthai'] = 'Chờ duyệt';
        $input['password'] = md5($input['password']);
        $model = Register::findOrFail($id);
        if($model->update($input)){
            $tencqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
            $data=[];
            $data['tendn'] = $input['tendn'];
            $data['tg'] = Carbon::now()->toDateTimeString();
            $data['tencqcq'] = $tencqcq->tendv;
            $data['masothue'] = $input['masothue'];
            $data['user'] = $input['username'];
            $data['madk'] = $model->ma;
            $maildn = $input['emaildn'];
            $tendn  =  $input['tendn'];
            $mailql = $tencqcq->emailqt;
            $tenql = $tencqcq->tendv;
            Mail::send('mail.stlregister',$data, function ($message) use($maildn,$tendn,$mailql,$tenql) {
                $message->to($maildn,$tendn)
                    ->to($mailql,$tenql)
                    ->subject('Thông báo đăng ký tài khoản');
                $message->from('qlgiakhanhhoa@gmail.com','Phần mềm CSDL giá');
            });
        }
        return view('errors.register-success');
    }*/

    public function ghichuct(){
        return view('system.ghichuct.index')
            ->with('pageTitle','Ghi chú chương trình');
    }
}
