<?php

namespace App\Http\Controllers\manage\giataisancong;

use App\Model\manage\dinhgia\giadatphanloai\GiaDatPhanLoaiDm;
use App\Model\manage\dinhgia\GiaTaiSanCongDm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaTaiSanCongDmController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
//            if(can('kkgiacldat','index')) {
                $model = GiaTaiSanCongDm::all();
                return view('manage.dinhgia.giataisancong.danhmuc.index')
                    ->with('model',$model)
                    ->with('pageTitle','Danh mục giá tài sản công');
//            }else
//                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
//            if(can('kkgiacldat','create')) {
                return view('manage.dinhgia.giataisancong.danhmuc.create')
                    ->with('pageTitle','Danh mục giá tài sản công');
//            }else
//                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['giatri'] = getMoneyToDb($inputs['giatri']);
            $inputs['dientich'] = getMoneyToDb($inputs['dientich']);
            GiaTaiSanCongDm::create($inputs);
            return redirect('giataisancongdm');
        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = GiaTaiSanCongDm::findOrFail($id);
            return view('manage.dinhgia.giataisancong.danhmuc.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tư giá tài sản công');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['giatri'] = getMoneyToDb($inputs['giatri']);
            $inputs['dientich'] = getMoneyToDb($inputs['dientich']);
            GiaTaiSanCongDm::findOrFail($id)->update($inputs);
            return redirect('giataisancongdm');
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            GiaTaiSanCongDm::where('id',$inputs['iddelete'])->delete();
            return redirect('giataisancongdm');
        } else
            return view('errors.notlogin');
    }
}
