<?php

namespace App\Http\Controllers\manage\giathitruong;

use App\District;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongTt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThiTruongTtController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = GiaThiTruongTt::all();
            return view('manage.giathitruong.danhmuc.nhom.index')
                ->with('model',$model)
                ->with('pageTitle', 'Thông tư giá thị trường');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new GiaThiTruongTt();
            $model->create($inputs);
            return redirect('thongtugiathitruong');
        }else
            return view('errors.notlogin');
    }

    public function edit(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();
        $id = $inputs['id'];
        $model = GiaThiTruongTt::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $model = GiaThiTruongTt::findOrFail($id);
            $model->matt = $inputs['edit_matt'];
            $model->ttqd = $inputs['edit_ttqd'];
            $model->mota = $inputs['edit_mota'];
            $model->ghichu = $inputs['edit_ghichu'];
            $model->theodoi = $inputs['edit_theodoi'];
            $model->save();
            return redirect('thongtugiathitruong');
        }else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $ttqds = GiaThiTruongTt::all();
            $district = District::all();
            return view('manage.giathitruong.danhmuc.importexcel')
                ->with('ttqds',$ttqds)
                ->with('districts',$district)
                ->with('pageTitle','Nhận danh mục giá thị trường từ file excel');
        }else
            return view('errors.notlogin');
    }
}
