<?php

namespace App\Http\Controllers;

use App\NgayNghiLe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NgayNghiLeController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = NgayNghiLe::whereYear('denngay', $inputs['nam'])
                ->get();
            return view('system.ngaynghile.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin ngày nghỉ lễ');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['tungay'] = getDateToDb($inputs['tungay']);
            $inputs['denngay'] = getDateToDb($inputs['denngay']);
            $model = new NgayNghiLe();
            $model->create($inputs);
            return redirect('thongtinngaynghile');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = NgayNghiLe::findOrFail($id);
            return view('system.ngaynghile.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tin ngày nghỉ lễ chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['tungay'] = getDateToDb($inputs['tungay']);
            $inputs['denngay'] = getDateToDb($inputs['denngay']);
            $model = NgayNghiLe::findOrFail($id);
            $model->update($inputs);
             return redirect('thongtinngaynghile');

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id  = $inputs['iddelete'];
            $model = NgayNghiLe::findOrFail($id);
            $model->delete();
            return redirect('thongtinngaynghile');

        }else
            return view('errors.notlogin');
    }

}
