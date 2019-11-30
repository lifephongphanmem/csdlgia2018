<?php

namespace App\Http\Controllers\Auth;


use App\GeneralConfigs;
use App\Http\Requests\system\RegisterRequest;
use App\Jobs\SendMail;
use App\Model\system\company\Company;
use App\Model\system\company\CompanyLvCc;
use App\User;
use App\Users;
use App\Model\system\dmnganhnghekd\DmNganhKd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
//    }

    public function create(){
        $inputs['mahs'] = getdate()[0];
        $nganhs = DmNganhKd::where('theodoi','TD')
            ->get();
        $modelct = CompanyLvCc::where('mahs',$inputs['mahs'])
            ->get();
        return view('system.registers.dangkytk.create')
            ->with('nganhs', $nganhs)
            ->with('inputs',$inputs)
            ->with('modelct',$modelct)
            ->with('pageTitle','Đăng ký tài khoản truy cập');
    }

    public function store(Request $request){
        $inputs = $request->all();
        $inputs['trangthai'] = 'Chưa kích hoạt';
        $model = new Company();
        if(isset($inputs['tailieu'])){
            $ipf1 = $request->file('tailieu');
            $inputs['ipt1'] = $inputs['maxa'].'.'.$ipf1->getClientOriginalExtension();
            $ipf1->move(public_path() . '/data/doanhnghiep/', $inputs['ipt1']);
            $inputs['tailieu']= $inputs['ipt1'];
        }
        if($model->create($inputs)){
            $modeluser = new Users();
            $modeluser->username = $inputs['username'];
            $modeluser->password = md5($inputs['rpassword']);
            $modeluser->name = $inputs['tendn'];
            $modeluser->status = 'Chờ xét duyệt';
            $modeluser->level  = 'DN';
            $modeluser->maxa  = $inputs['maxa'];
            $modeluser->save();
            $modellvcc = CompanyLvCc::where('mahs',$inputs['mahs'])
                ->update(['maxa' => $inputs['maxa'],'trangthai' => 'XD']);

        }
        $modeldn = Company::where('maxa',$inputs['maxa'])
            ->first();
        $modeldv = GeneralConfigs::first();
        $tg = getDateTime(Carbon::now()->toDateTimeString());
        $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận yêu cầu đăng ký thông tin doanh nghiệp . Mã số đăng ký: '.$inputs['mahs'].'!!!';
        $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận yêu cầu thay đổi thông tin doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.' Mã số đăng ký: '.$inputs['mahs'].' !!!';
        $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
        $run->handle();
        //dispatch($run);
        return view('system.registers.dangkytk.register-success')
            ->with('mahs',$inputs['mahs'])
            ->with('pageTitle','Đăng ký tài khoản truy cập thành công');
    }

    public function update(Request $request,$id){
        $inputs = $request->all();
        $model = Company::findOrFail($id);
        if(isset($inputs['tailieu'])){
            $ipf1 = $request->file('tailieu');
            $inputs['ipt1'] = $inputs['maxa'].'.'.$ipf1->getClientOriginalExtension();
            $ipf1->move(public_path() . '/data/doanhnghiep/', $inputs['ipt1']);
            $inputs['tailieu']= $inputs['ipt1'];
        }
        $model->update($inputs);
        $modeldn = Company::where('maxa',$inputs['maxa'])
            ->first();
        $modeluserup = Users::where('maxa',$inputs['maxa'])
            ->where('level','DN')
            ->update(['status' => 'Chờ xét duyệt']);
        $modeldv = GeneralConfigs::first();
        $tg = getDateTime(Carbon::now()->toDateTimeString());
        $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận yêu cầu đăng ký thông tin doanh nghiệp . Mã số đăng ký: '.$model->mahs.'!!!';
        $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận yêu cầu thay đổi thông tin doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.' Mã số đăng ký: '.$model->mahs.' !!!';
        $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
        $run->handle();
        //dispatch($run);

        return view('system.registers.dangkytk.register-success')
            ->with('mahs',$model->mahs)
            ->with('pageTitle','Đăng ký tài khoản truy cập thành công');
    }

    public function searchindex(){
        return view('system.registers.dangkytk.search')
            ->with('pageTitle','Kiểm tra tài khoản đăng ký');
    }

    public function search(Request $request){
        $inputs = $request->all();
        $modelcompany = Company::where('maxa',$inputs['maxa'])
            ->first();
        $modeluser = Users::where('maxa',$inputs['maxa'])
            ->where('level','DN')
            ->first();
        if(isset($modeluser)) {
            if ($modeluser->status == 'Chờ xét duyệt')
                return view('system.registers.dangkytk.register-choduyet')
                    ->with('modelcompany', $modelcompany)
                    ->with('pageTitle', 'Đăng ký tài khoản truy cập đang chờ xét duyệt');
            elseif ($modeluser->status == 'Bị trả lại')
                return view('system.registers.dangkytk.register-bitralai')
                    ->with('modelcompany', $modelcompany)
                    ->with('modeluser', $modeluser)
                    ->with('pageTitle', 'Đăng ký tài khoản truy cập bị trả lại');
            else
                return view('system.registers.dangkytk.register-usersuccess');
        }else
            return view('system.registers.dangkytk.register-errors-checkmadk');
    }

    public function checkmadk(){
        return view('system.registers.dangkytk.checkmadk')
            ->with('pageTitle','Chỉnh sửa thông tin đăng ký tài khoản');
    }

    public function submitcheckmadk(Request $request){
        $inputs = $request->all();
        $check = Company::where('maxa',$inputs['maxa'])
            ->where('mahs',$inputs['mahs'])
            ->count();
        if($check > 0 ){
            $model = Company::where('maxa',$inputs['maxa'])
                ->where('mahs',$inputs['mahs'])
                ->first();
            $modeluser = Users::where('maxa',$inputs['maxa'])
                ->first();
            $modellvcc = CompanyLvCc::join('town', 'town.maxa', '=', 'companylvcc.mahuyen')
                ->join('dmnganhkd', 'dmnganhkd.manganh', '=', 'companylvcc.manganh')
                ->join('dmnghekd', 'dmnghekd.manghe', '=', 'companylvcc.manghe')
                ->select('companylvcc.*', 'town.tendv', 'dmnganhkd.tennganh', 'dmnghekd.tennghe')
                ->where('companylvcc.maxa', $inputs['maxa'])
                ->get();
            $nganhs = DmNganhKd::where('theodoi','TD')
                ->get();
            return view('system.registers.dangkytk.edit')
                ->with('model', $model)
                ->with('modeluser',$modeluser)
                ->with('modellvcc',$modellvcc)
                ->with('nganhs',$nganhs)
                ->with('pageTitle','Chỉnh sửa đăng ký tài khoản truy cập');
        }else
            return view('system.registers.dangkytk.register-errors-checkmadk');
    }

    public function index(){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $model = Users::where('status','Chờ xét duyệt')
                    ->Orwhere('status','Bị trả lại')
                    ->where('level','DN')
                    ->get();
                return view('system.registers.xetduyet.index')
                    ->with('model', $model)
                    ->with('pageTitle', 'Xét duyệt tài khoản truy cập vào chương trình');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $model = Users::findOrFail($id);
                $modelcompany = Company::where('maxa',$model->maxa)
                    ->first();
                $modellvcc = CompanyLvCc::join('town', 'town.maxa', '=', 'companylvcc.mahuyen')
                    ->join('dmnganhkd', 'dmnganhkd.manganh', '=', 'companylvcc.manganh')
                    ->join('dmnghekd', 'dmnghekd.manghe', '=', 'companylvcc.manghe')
                    ->select('companylvcc.*', 'town.tendv', 'dmnganhkd.tennganh', 'dmnghekd.tennghe')
                    ->where('companylvcc.maxa', $model->maxa)
                    ->get();
                return view('system.registers.xetduyet.show')
                    ->with('model', $model)
                    ->with('modelcompany',$modelcompany)
                    ->with('modellvcc',$modellvcc)
                    ->with('pageTitle', 'Thông tin tài khoản đề nghị truy cập vào chương trình');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $inputs = $request->all();
                $model = Users::where('id',$inputs['tralai_id'])
                   ->first();
                $model->lydo = $inputs['lydo'];
                $model->status = 'Bị trả lại';
                $model->save();
                $modeldn = Company::where('maxa',$model->maxa)->first();
                $modeldv = GeneralConfigs::first();
                $tg = getDateTime(Carbon::now()->toDateTimeString());
                $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại yêu cầu đăng ký thông tin doanh nghiệp!!!';
                $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại yêu cầu thay đổi thông tin doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.' Mã số đăng ký: '
                    .$model->mahs.'Lý do trả lại: '.$inputs['lydo'].' !!!';
                $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                $run->handle();
                //dispatch($run);
                return redirect('register');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function kichhoat(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $inputs = $request->all();
                $model = Users::where('id',$inputs['kichhoat_id'])
                    ->first();
                $model->status = 'Kích hoạt';
                if($model->save()) {
                    $modelcompany = Company::where('maxa', $model->maxa)
                        ->first();
                    $modelcompany->trangthai = 'Kích hoạt';
                    $modelcompany->save();
                }
                $modeldn = Company::where('maxa',$model->maxa)->first();
                $modeldv = GeneralConfigs::first();
                $tg = getDateTime(Carbon::now()->toDateTimeString());
                $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã duyệt yêu cầu đăng ký thông tin doanh nghiệp!!!';
                $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã nhận yêu cầu thay đổi thông tin doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.' Mã số đăng ký: '.$model->mahs.' !!!';
                $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                $run->handle();
                //dispatch($run);
                return redirect('register');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

}
