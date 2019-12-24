<?php

namespace App\Http\Controllers;

use App\Model\system\company\Company;
use App\Model\system\company\CompanyLvCc;
use App\District;
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
                    $inputs['name'] = isset($inputs['name']) ? $inputs['name'] : '';
                    $inputs['username'] = isset($inputs['username']) ? $inputs['username'] : '';
                    $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
//                    dd($inputs);
                    $model = Users::where('level', 'DN')
                        ->whereIn('status',['Kích hoạt','Vô hiệu hóa'])
                        ->orderBy('id', 'desc');
                    if($inputs['name'] != '')
                        $model = $model->where('name','like', '%'.$inputs['name'].'%');
                    if($inputs['username'] != '')
                        $model = $model->where('username','like', '%'.$inputs['username'].'%');
                    $model = $model->paginate($inputs['paginate']);

                    return view('system.userscompany.index')
                        ->with('model', $model)
                        ->with('inputs',$inputs)
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
            $modelcompany = Company::where('maxa',$model->maxa)
                ->first();
            $modellvcc = CompanyLvCc::join('town', 'town.maxa', '=', 'companylvcc.mahuyen')
                ->join('dmnganhkd', 'dmnganhkd.manganh', '=', 'companylvcc.manganh')
                ->join('dmnghekd', 'dmnghekd.manghe', '=', 'companylvcc.manghe')
                ->select('companylvcc.*', 'town.tendv', 'dmnganhkd.tennganh', 'dmnghekd.tennghe')
                ->where('companylvcc.maxa', $model->maxa)
                ->get();
            return view('system.userscompany.edit')
                ->with('model', $model)
                ->with('modelcompany',$modelcompany)
                ->with('modellvcc',$modellvcc)
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

                return redirect('userscompany');
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
