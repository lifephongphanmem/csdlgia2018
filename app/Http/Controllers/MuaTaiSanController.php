<?php

namespace App\Http\Controllers;

use App\MuaTaiSan;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MuaTaiSanController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            if(session('admin')->level == 'X') {
                $modeldv = Town::where('maxa',session('admin')->maxa)->get();
                $inputs['maxa'] = session('admin')->maxa;
            }else {
                if(session('admin')->level == 'T')
                    $modeldv = Town::all();
                else
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
            }

            $model = MuaTaiSan::whereYear('ngayapdung', $inputs['nam'])
                ->where('maxa',$inputs['maxa'])
                ->get();
            return view('manage.muataisan.index')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ mua tài sản');
        }else
            return view('errors.notlogin');
    }
}
