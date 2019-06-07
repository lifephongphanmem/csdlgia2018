<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\Town;
use App\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TownController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $district = District::all();
                if($district->count() > 0) {
                    $inputs = $request->all();
                    $mahuyendf = District::first()->mahuyen;
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $mahuyendf;
                    if(session('admin')->level == 'H')
                        $inputs['mahuyen'] = session('admin')->mahuyen;
                    $model = Town::where('mahuyen',$inputs['mahuyen'])->get();
                    $modeldistrict = District::where('mahuyen',$inputs['mahuyen'])->first();
                    return view('system.town.index')
                        ->with('model', $model)
                        ->with('district',$district)
                        ->with('inputs',$inputs)
                        ->with('modeldistrict',$modeldistrict)
                        ->with('pageTitle', 'Danh mục đơn vị xã/phường');
                }else
                    dd('Bạn chưa nhập thông tin đơn vị cấp quận/huyện!!!');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $modeldvql = District::where('mahuyen',$inputs['mahuyen'])->first();
                $diabans = DiaBanHd::where('level','H')->get();
                if($modeldvql->count() > 0) {
                    return view('system.town.create')
                        ->with('modeldvql',$modeldvql)
                        ->with('diabans',$diabans)
                        ->with('inputs',$inputs)
                        ->with('pageTitle', 'Thêm mới thông tin đơn vị xã/phường');
                }else
                    dd('Bạn chưa nhập thông tin đơn vị cấp quận/huyện!!!');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $checkmaxa= Town::where('mahuyen',$inputs['maxa'])->count();
                $checkuser = Users::where('username',$inputs['username'])->count();
                if($checkmaxa == 0) {
                    if($checkuser == 0) {
                        $model = new Town();
                        if ($model->create($inputs)) {
                            $modeluser = new Users();
                            $modeluser->name = $inputs['tendv'];
                            $modeluser->username = $inputs['username'];
                            $modeluser->password = md5($inputs['password']);
                            $modeluser->status = 'Kích hoạt';
                            $modeluser->mahuyen = $inputs['mahuyen'];
                            $modeluser->maxa = $inputs['maxa'];
                            $modeluser->district = $inputs['district'];
                            $modeluser->level = 'X';
                            $modeluser->save();
                        }
                        return redirect('town?&mahuyen='.$inputs['mahuyen']);
                    }else
                        dd('Tài khoản tạo đã tồn tại! Bạn cần kiểm tra lại!!!');
                }else{
                    dd('Trùng mã quan hệ ngân sách! Bạn cần kiểm tra lại!!!');
                }
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = Town::findOrFail($id);
                $district = District::all();
                return view('system.town.edit')
                    ->with('model',$model)
                    ->with('district',$district)
                    ->with('pageTitle','Chỉnh sửa thông tin đơn vị xã/phường');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = Town::findOrFail($id);
                $model->update($inputs);
                return redirect('town?&mahuyen='.$model->mahuyen);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

}
