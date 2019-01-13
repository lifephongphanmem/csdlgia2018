<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DiaBanHdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $inputs = $request->all();
                $inputs['level'] = isset($inputs['level']) ? $inputs['level'] : 'H';
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
                if($inputs['district'] == 'all')
                    $model = DiaBanHd::where('level',$inputs['level'])
                        ->get();
                else
                    $model = DiaBanHd::where('level',$inputs['level'])
                        ->where('district',$inputs['district'])
                        ->get();
                $huyens = DiaBanHd::where('level','H')
                    ->get();
                return view('system.diabanhd.index')
                    ->with('model',$model)
                    ->with('huyens',$huyens)
                    ->with('level',$inputs['level'])
                    ->with('district',$inputs['district'])
                    ->with('pageTitle','Thông tin danh mục địa danh');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $inputs = $request->all();
                $inputs['level'] = isset($inputs['level']) ? $inputs['level'] : 'H';
                $districts = DiaBanHd::where('level','H')
                    ->get();
                if($inputs['level'] == 'H')
                    return view('system.diabanhd.create')
                        ->with('districts',$districts)
                        ->with('level',$inputs['level'])
                        ->with('pageTitle','Thông tin địa danh thêm mới');
                elseif(count($districts) == 0)
                    dd('Bạn chưa nhập danh mục địa danh quận/huyện');
                else
                    return view('system.diabanhd.create')
                    ->with('districts',$districts)
                    ->with('level',$inputs['level'])
                    ->with('pageTitle','Thông tin địa danh thêm mới');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $inputs = $request->all();
                $model = new DiaBanHd();
                $model->create($inputs);
                return redirect('danhmucdiadanh?&level='.$inputs['level']);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $model = DiaBanHd::findOrFail($id);
                $districts = DiaBanHd::where('level','H')
                    ->get();
                return view('system.diabanhd.edit')
                    ->with('districts',$districts)
                    ->with('model',$model)
                    ->with('pageTitle','Thông tin địa danh chỉnh sửa');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $model = DiaBanHd::findOrFail($id);
                $inputs = $request->all();
                $model->update($inputs);
                return redirect('danhmucdiadanh?&level='.$model->level);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T') {
                $inputs = $request->all();
                $id = $inputs['iddelete'];
                $model = DiaBanHd::findOrFail($id);
                if($model->level == 'H'){
                    $check = DiaBanHd::where('level','X')
                        ->where('district',$model->district)->count();
                    if($check == 0){
                        $model->delete();
                    }else
                        dd('Địa danh cấp xã đã tồn tại trong huyện này!Vui lòng kiểm tra lại!!');
                }else
                    $model->delete();
                return redirect('danhmucdiadanh?&level='.$model->level);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }


}
