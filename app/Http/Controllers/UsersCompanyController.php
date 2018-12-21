<?php

namespace App\Http\Controllers;

use App\Town;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UsersCompanyController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (can('users','index')) {
                if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                    $inputs = $request->all();
                    $inputs['level'] = isset($inputs['level']) ? $inputs['level'] : '';
                    $model = Users::where('level', $inputs['level'])
                        ->orderBy('id', 'desc');

                    if(session('admin')->level == 'T') {
                        $towns = Town::all();
                        $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $towns->first()->maxa;
                    }elseif(session('admin')->level == 'H') {
                        $towns = Town::where('mahuyen',session('admin')->mahuyen)->get();
                        $inputs['maxa'] =  isset($inputs['maxa']) ? $inputs['maxa'] : $towns->first()->maxa;
                    }else{
                        $towns = Town::where('mahuyen',session('admin')->mahuyen)
                            ->where('maxa',session('admin')->maxa)
                            ->get();
                        $inputs['maxa'] =  session('admin')->maxa;
                    }
                    $model = $model->where('mahuyen',$inputs['maxa'])
                        ->get();
                    $ttdv = Town::where('maxa',$inputs['maxa'])->first();

                    return view('system.userscompany.index')
                        ->with('model', $model)
                        ->with('inputs', $inputs)
                        ->with('towns',$towns)
                        ->with('ttdv',$ttdv)
                        ->with('pageTitle', 'Danh sách tài khoản doanh nghiệp');
                }else
                    return view('errors.perm');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {

            $model = Users::findOrFail($id);
            return view('system.userscompany.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Chỉnh sửa thông tin tài khoản doanh nghiệp');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $input = $request->all();
            $model = Users::findOrFail($id);
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                if ($input['newpass'] != '')
                    $input['password'] = md5($input['newpass']);
                $model->update($input);

                return redirect('userscompany?&level='.$model->level);
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function permission($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X' && can('users','per')) {
                $model = Users::findorFail($id);
                $permission = !empty($model->permission) || $model->permission != '' ? $model->permission : getPermissionDefault($model->level);
                //dd(json_decode($permission));
                return view('system.userscompany.perms')
                    ->with('permission', json_decode($permission))
                    ->with('model', $model)
                    ->with('pageTitle', 'Phân quyền cho tài khoản doanh nghiệp');
            }else
                return view('errors.noperm');
        } else
            return view('errors.notlogin');
    }

    public function uppermission(Request $request)
    {
        if (Session::has('admin')) {
            $update = $request->all();

            $id = $update['id'];

            $model = Users::findOrFail($id);
            //dd($model);
            if (isset($model)) {
                $update['roles'] = isset($update['roles']) ? $update['roles'] : null;

                $model->permission = json_encode($update['roles']);
                $model->save();
                return redirect('userscompany?&level='.$model->level);

            } else
                dd('Tài khoản không tồn tại');

        } else
            return view('errors.notlogin');
    }
}
