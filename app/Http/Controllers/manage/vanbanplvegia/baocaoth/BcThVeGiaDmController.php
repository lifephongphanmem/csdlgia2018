<?php

namespace App\Http\Controllers\manage\vanbanplvegia\baocaoth;

use App\Model\manage\vanbanplvegia\baocaoth\BcThVeGiaDm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BcThVeGiaDmController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = BcThVeGiaDm::all();
            return view('manage.vanbanqlnn.baocaoth.danhmuc.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin danh mục');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new BcThVeGiaDm();
            $inputs['theodoi'] = 'TD';
            $model->create($inputs);
            return redirect('dmbaocaothvegia');

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
        $model = BcThVeGiaDm::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = BcThVeGiaDm::where('id',$inputs['edit_id'])
                ->first();
            $model->phanloai = $inputs['edit_phanloai'];
            $model->mota = $inputs['edit_mota'];
            $model->theodoi = $inputs['edit_theodoi'];
            $model->save();
            return redirect('dmbaocaothvegia');
        }else
            return view('errors.notlogin');
    }

}
