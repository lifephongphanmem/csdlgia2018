<?php

namespace App\Http\Controllers\manage\giadatphanloai;

use App\Model\manage\dinhgia\giadatdiaban\TtGiaDatDiaBan;
use App\Model\manage\dinhgia\giadatphanloai\GiaDatPhanLoaiDm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaDatPhanLoaiDmController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            if(can('kkgiacldat','index')) {
                $model = GiaDatPhanLoaiDm::all();
                return view('manage.dinhgia.giadatphanloai.danhmuc.index')
                    ->with('model',$model)
                    ->with('pageTitle','Danh mục giá đất theo phân loại');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            if(can('kkgiacldat','create')) {
                return view('manage.dinhgia.giadatphanloai.danhmuc.create')
                    ->with('pageTitle','Danh mục giá đất theo phân loại');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['giatri'] = getMoneyToDb($inputs['giatri']);
            GiaDatPhanLoaiDm::create($inputs);
            return redirect('giadatphanloaidm');
        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = GiaDatPhanLoaiDm::findOrFail($id);
            return view('manage.dinhgia.giadatphanloai.danhmuc.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tư giá đất theo địa bàn chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['giatri'] = getMoneyToDb($inputs['giatri']);
            GiaDatPhanLoaiDm::findOrFail($id)->update($inputs);
            return redirect('giadatphanloaidm');
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            GiaDatPhanLoaiDm::where('id',$inputs['iddelete'])->delete();
            return redirect('giadatphanloaidm');
        } else
            return view('errors.notlogin');
    }
}
