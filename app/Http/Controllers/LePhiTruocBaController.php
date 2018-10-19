<?php

namespace App\Http\Controllers;

use App\LePhiTruocBa;
use App\LePhiTruocBaCt;
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

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahuyen'] = session('admin')->mahuyen!= '' ? session('admin')->mahuyen : 'T';
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new LePhiTruocBa();
            if($model->create($inputs)){
                $modelctdf = LePhiTruocBaCtDf::where('mahuyen',$inputs['mahuyen']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new LePhiTruocBaCt();
                    $modelct->manhom = $ctdf->manhom;
                    $modelct->nhanhieu= $ctdf->nhanhieu;
                    $modelct->tentm = $ctdf->tentm;
                    $modelct->ttlv = $ctdf->ttlv;
                    $modelct->socho = $ctdf->socho;
                    $modelct->giatinhlptb = $ctdf->giatinhlptb;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('lephitruocba');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $modelnhomxe = NhomLePhiTruocBa::all();
            $model = LePhiTruocBa::findOrFail($id);
            $modelct =  LePhiTruocBaCt::where('mahs',$model->mahs)
                ->join('nhomlephitruocba','nhomlephitruocba.manhom','=','lephitruocbact.manhom')
                ->select('lephitruocbact.*','nhomlephitruocba.nhomxe')->get();
            return view('manage.dinhgia.lephitruocba.kekhai.edit')
                ->with('modelnhomxe',$modelnhomxe)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ lệ phí trước bạ chỉnh sửa');

        }else
            return view('errors.notlogin');
    }


    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = LePhiTruocBa::findOrFail($id);
            $model->update($inputs);
            return redirect('lephitruocba');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = LePhiTruocBa::findOrFail($id);
            $modelct =  LePhiTruocBaCt::where('mahs',$model->mahs)
                ->join('nhomlephitruocba','nhomlephitruocba.manhom','=','lephitruocbact.manhom')
                ->select('lephitruocbact.*','nhomlephitruocba.nhomxe')->get();
            $modelgr = NhomLePhiTruocBa::all();
            return view('manage.dinhgia.lephitruocba.kekhai.show')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modelgr',$modelgr)
                ->with('pageTitle','Thông tin hồ sơ lệ phí trước bạ');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = LePhiTruocBa::findOrFail($id);
            $modelct = LePhiTruocBaCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('lephitruocba');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = LePhiTruocBa::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('lephitruocba?&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = LePhiTruocBa::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('lephitruocba?&trangthai=HHT');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = LePhiTruocBa::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('lephitruocba?&trangthai=CB');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tentm'] = isset($inputs['tentm']) ? $inputs['tentm'] : '';
            $model = LePhiTruocBaCt::join('lephitruocba','lephitruocbact.mahs','=','lephitruocba.mahs')
                ->join('nhomlephitruocba','nhomlephitruocba.manhom','=','lephitruocbact.manhom')
                ->select('lephitruocbact.*','lephitruocba.soqd','lephitruocba.ngayapdung','lephitruocba.trangthai','nhomlephitruocba.nhomxe')
                ->whereYear('lephitruocba.ngayapdung',$inputs['nam'])
                ->where('lephitruocba.trangthai','HT')
                ->OrWhere('lephitruocba.trangthai','CB');
            if($inputs['tentm'] != '')
                $model = $model->where('lephitruocbact.tentm','like','%'.$inputs['tentm'].'%');
            $model = $model->get();
            return view('manage.dinhgia.lephitruocba.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('tentm',$inputs['tentm'])
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin giá lệ phí trước bạ');
        }else
            return view('errors.notlogin');
    }
}
