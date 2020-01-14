<?php

namespace App\Http\Controllers\system\dmnganhnghekd;

use App\District;
use App\Model\system\dmnganhnghekd\DmNganhKd;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmNgheKdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $nganhs = DmNganhKd::where('manganh',$inputs['manganh'])
                ->first();
            $model = DmNgheKd::leftjoin('district','district.mahuyen','=','dmnghekd.mahuyen')
                ->join('dmnganhkd','dmnganhkd.manganh','=','dmnghekd.manganh')
                ->select('dmnghekd.*','district.tendv','dmnganhkd.tennganh')
                ->where('dmnghekd.manganh',$inputs['manganh'])
                ->get();
            $districts = District::all();
//            $a_districts = array_column($districts->toArray(), 'mahuyen', 'tendv');
            return view('system.dmnganhnghekd.nghe')
                ->with('model',$model)
                ->with('nganhs',$nganhs)
                ->with('districts',$districts)
//                ->with('a_districts',$a_districts)
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
        $model = DmNgheKd::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DmNgheKd::where('id',$inputs['edit_id'])
                ->first();
            $model->theodoi = $inputs['edit_theodoi'];
            $model->congbo = $inputs['edit_congbo'];
//            $model->mahuyen =  implode(',', $inputs['edit_mahuyen']);
            $model->mahuyen =  $inputs['edit_mahuyen'];
            $model->save();
            return redirect('danhmucnghekd?&manganh='.$model->manganh);
        }else
            return view('errors.notlogin');
    }
}
