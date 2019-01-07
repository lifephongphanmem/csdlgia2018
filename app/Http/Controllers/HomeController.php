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
            //dd(session('admin'));
            return view('dashboard')
                ->with('pageTitle', 'Thông tin hỗ trợ');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
            $session = Session::getId();
            $model = ViewPage::where('ip', $ip)
                ->where('session', $session)->count();
            if ($model == 0) {
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
            ->with('viewpage', $viewpage)
            ->with('pageTitle', 'Cơ sở dữ liệu về giá');
    }

    public function forgotpassword(){
        return view('system.users.forgotpassword.index')
            ->with('pageTitle', 'Quên mật khẩu???');
    }

    public function forgotpasswordw(Request $request){

        $input = $request->all();
        $model = Users::where('username', $input['username'])->first();
        if (isset($model)) {
            if ($model->email == $input['email']) {
                $npass = getRandomPassword();
                $model->password = md5($npass);
                $model->save();

                $data = [];
                $data['tendn'] = $model->name;
                $data['username'] = $model->username;
                $data['npass'] = $npass;
                $maildn = $model->email;
                $tendn = $model->name;

                Mail::send('mail.successnewpassword', $data, function ($message) use ($maildn, $tendn) {
                    $message->to($maildn, $tendn)
                        ->subject('Thông báo thay đổi mật khẩu tài khoản');
                    $message->from('qlgiakhanhhoa@gmail.com', 'Phần mềm CSDL giá');
                });
                return view('errors.forgotpass-success');
            } else
                return view('errors.forgotpass-errors');
        } else
            return view('errors.forgotpass-errors');
    }

    public function coming(){
        return view('congbo.coming')
            ->with('pageTitle','Dữ liệu đang cập nhật');
    }
}