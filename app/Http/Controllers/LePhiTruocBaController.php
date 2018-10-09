<?php

namespace App\Http\Controllers;

use App\LePhiTruocBa;
use App\LePhiTruocBaCtDf;
use App\NhomLePhiTruocBa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LePhiTruocBaController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';


            $model = LePhiTruocBa::whereYear('ngayapdung',$inputs['nam']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);

            $model=$model->get();
            return view('manage.dinhgia.lephitruocba.kekhai.index')
                ->with('model',$model)
                ->with('nam',$inputs['nam'])
                ->with('trangthai',$inputs['trangthai'])
                ->with('pageTitle','Thông tin hồ sơ lệ phí trước bạ');

        }else
            return view('errors.notlogin');
    }

    public function create(){
        if(Session::has('admin')){
            $inputs['mahuyen'] = session('admin')->mahuyen != '' ? session('admin')->mahuyen : 'T' ;
            $modelnhomxe = NhomLePhiTruocBa::all();
            $modelct =  LePhiTruocBaCtDf::where('mahuyen',$inputs['mahuyen'])
                ->join('nhomlephitruocba','nhomlephitruocba.manhom','=','lephitruocbactdf.manhom')
                ->select('lephitruocbactdf.*','nhomlephitruocba.nhomxe')->get();
            return view('manage.dinhgia.lephitruocba.kekhai.create')
                ->with('modelnhomxe',$modelnhomxe)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ lệ phí trước bạ thêm mới');

        }else
            return view('errors.notlogin');
    }
}
