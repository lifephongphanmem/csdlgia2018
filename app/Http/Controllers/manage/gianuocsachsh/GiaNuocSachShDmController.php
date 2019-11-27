<?php

namespace App\Http\Controllers\manage\gianuocsachsh;

use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocSachShDm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaNuocSachShDmController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $model = new GiaNuocSachShDm();
            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.gianuocsh.danhmuc.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Thông tin hồ sơ danh mục giá nước sạch sinh hoạt');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = new GiaNuocSachShDm();
//            $model->madoituong = $inputs['add_madoituong'];
            $model->doituongsd = $inputs['add_doituongsd'];
            $model->save();
            return redirect('dmgianuocsachsinhhoat');
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
        $model = GiaNuocSachShDm::findOrFail($id);
        die($model);
    }

    /*public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['madoituong'] = $inputs['edit_madoituong'];
            $inputs['doituongsd'] = $inputs['edit_doituongsd'];

            $model = GiaNuocSachShDm::where('id',$inputs['edit_id'])->first();
            $model->update($inputs);
            return redirect('dmgianuocsachsinhhoat');
        }else
            return view('errors.notlogin');
    }*/

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = GiaNuocSachShDm::where('id',$inputs['edit_id'])->first();
//            $model->madoituong = $inputs['edit_madoituong'];
            $model->doituongsd = $inputs['edit_doituongsd'];
            $model->save();
            return redirect('dmgianuocsachsinhhoat');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['destroy_id'];
            $model = GiaNuocSachShDm::findOrFail($id);
            $model->delete();
            return redirect('dmgianuocsachsinhhoat');

        }else
            return view('errors.notlogin');
    }
}
