<?php

namespace App\Http\Controllers\manage\ttpvctqlnn;

use App\Model\manage\ttpvctqlnn\TtPvCtQlNnDm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class TtPvCtQlNnDmController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = TtPvCtQlNnDm::all();
            return view('manage.ttpvctqlnn.danhmuc.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin danh mục');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new TtPvCtQlNnDm();
            $inputs['theodoi'] = 'TD';
            $model->create($inputs);
            return redirect('dmttpvctqlnn');

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
        $model = TtPvCtQlNnDm::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = TtPvCtQlNnDm::where('id',$inputs['edit_id'])
                ->first();
            $model->phanloai = $inputs['edit_phanloai'];
            $model->mota = $inputs['edit_mota'];
            $model->theodoi = $inputs['edit_theodoi'];
            $model->save();
            return redirect('dmttpvctqlnn');
        }else
            return view('errors.notlogin');
    }

}
