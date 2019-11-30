<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThongTinDonViController extends Controller
{
    public function index(){
        if(Session::has('admin')){
            if(session('admin')->level == 'X') {
                $model = Town::where('maxa', session('admin')->maxa)
                    ->first();
                return view('system.thongtindonvi.index')
                    ->with('model', $model)
                    ->with('pageTitle', 'Thông tin đơn vị');
            }else
                return view('errors.noperm');
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
        $model = Town::findOrFail($id);

        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $model = Town::findOrFail($id);
            $model->emailql = $inputs['edit_emailql'];
            $model->emailqt = $inputs['edit_emailqt'];
            $model->tendvhienthi = $inputs['edit_tendvhienthi'];
            $model->tendvcqhienthi = $inputs['edit_tendvcqhienthi'];
            $model->songaylv = $inputs['edit_songaylv'];
            $model->save();
            return redirect('thongtindonvi');
        }else
            return view('errors.notlogin');
    }
}
