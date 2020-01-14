<?php

namespace App\Http\Controllers\system\dmnganhnghekd;

use App\Model\system\dmnganhnghekd\DmNganhKd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmNganhKdController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = DmNganhKd::all();
            return view('system.dmnganhnghekd.nganh')
                ->with('model',$model)
                ->with('pageTitle', 'Danh mục ngành kinh doanh');
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
        $model = DmNganhKd::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DmNganhKd::where('id',$inputs['edit_id'])
                ->first();
            $model->theodoi = $inputs['edit_theodoi'];
            $model->congbo = $inputs['edit_congbo'];
            $model->save();
            return redirect('danhmucnganhkd');
        }else
            return view('errors.notlogin');
    }
}
