<?php

namespace App\Http\Controllers;

use App\DmQdGiaDat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmQdGiaDatController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $nam = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $model = DmQdGiaDat::orderBy('id', 'ASC')
                ->get();

            return view('manage.dinhgia.giacldat.quyetdinh.index')
                ->with('model',$model)
                ->with('nam',$nam)
                ->with('pageTitle','Danh mục quyết định quy định giá đất');

        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            return view('manage.dinhgia.giacldat.quyetdinh.create')
                ->with('pageTitle','Thêm mới quyết định quy định giá đất');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngayquyetdinh'] = getDateToDb($inputs['ngayquyetdinh']);
            $model = new DmQdGiaDat();
            $model->create($inputs);
            return redirect('dmqdgiadat');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = DmQdGiaDat::findOrFail($id);

            return view('manage.dinhgia.giacldat.quyetdinh.edit')
                ->with('model',$model)
                ->with('pageTitle','Chỉnh sửa quyết định quy định giá đất');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngayquyetdinh'] = getDateToDb($inputs['ngayquyetdinh']);
            $model = DmQdGiaDat::findOrFail($id);
            $model->update($inputs);
            return redirect('dmqdgiadat');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = DmQdGiaDat::findOrFail($id);
            $model->delete();
            return redirect('dmqdgiadat');
        }else
            return view('errors.notlogin');
    }
}
