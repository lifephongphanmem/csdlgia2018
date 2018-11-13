<?php

namespace App\Http\Controllers;

use App\DauGiaDat;
use App\DauGiaDatCt;
use App\DauGiaDatCtDf;
use App\DiaBanHd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DauGiaDatController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $modeldb = DiaBanHd::where('level','H')->get();
            if(session('admin')->level == 'X') {
                $inputs['district'] = session('admin')->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
            }else {
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $modeldb->first()->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
            }

            $model = DauGiaDat::where('trangthai',$inputs['trangthai'])
                ->WhereYear('created_at',$inputs['nam'])
                ->where('district',$inputs['district'])
                ->get();
            return view('manage.dinhgia.giadaugiadat.kekhai.index')
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(session('admin')->level == 'X')
                $inputs['district'] = session('admin')->district;
            $modeldb = DiaBanHd::where('level','H')
                ->where('district',$inputs['district'])
                ->first();
            $modelct = DauGiaDatCtDf::where('district',$inputs['district'])
                ->get();
            return view('manage.dinhgia.giadaugiadat.kekhai.create')
                ->with('modelct',$modelct)
                ->with('modeldb',$modeldb)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahs'] = $inputs['district'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new DauGiaDat();
            if($model->create($inputs)){
                $modelctdf = DauGiaDatCtDf::where('district',$inputs['district']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new DauGiaDatCt();
                    $modelct->vitridiadiem = $ctdf->vitridiadiem;
                    $modelct->mucgiasan= $ctdf->mucgiasan;
                    $modelct->mucgiadaugia = $ctdf->mucgiadaugia;
                    $modelct->donvidaugia = $ctdf->donvidaugia;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('thongtindaugiadat?&district='.$model->district.'&trangthai='.$inputs['trangthai']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = DauGiaDat::findOrFail($id);
            $modelct = DauGiaDatCt::where('mahs',$model->mahs)
                ->get();
            return view('manage.dinhgia.giadaugiadat.kekhai.edit')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DauGiaDat::findOrFail($id);
            $model->update($inputs);

            return redirect('thongtindaugiadat?&district='.$model->district.'&trangthai='.$inputs['trangthai']);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = DauGiaDat::findOrFail($id);
            $modelct = DauGiaDatCt::where('mahs',$model->mahs)
                ->get();

            return view('manage.dinhgia.giadaugiadat.reports.print')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Hồ sơ đấu giá đất');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = DauGiaDat::findOrFail($id);
            $district = $model->district;
            $modelct = DauGiaDatCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thongtindaugiadat?&district='.$district.'&trangthai=CHT');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = DauGiaDat::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtindaugiadat?&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = DauGiaDat::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thongtindaugiadat?&trangthai=HHT');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = DauGiaDat::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtindaugiadat?&trangthai=CB');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['vitridiadiem'] = isset($inputs['vitridiadiem']) ? $inputs['vitridiadiem'] : '';
            $model = DauGiaDatCt::join('daugiadat','daugiadat.mahs','=','daugiadatct.mahs')
                ->select('daugiadatct.*','daugiadat.soqd','daugiadat.donvi','daugiadat.trangthai','daugiadat.thdaugia','daugiadat.created_at','daugiadat.diadiem')
                ->whereIn('daugiadat.trangthai',['HT','CB']);

            if($inputs['nam'] != '')
                $model = $model->whereYear('daugiadat.created_at',$inputs['nam']);
            if($inputs['vitridiadiem'] != '')
                $model = $model->where('daugiadatct.vitridiadiem','like','%'.$inputs['vitridiadiem'].'%');
            $model = $model->get();



            return view('manage.dinhgia.giadaugiadat.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin đấu giá đất');
        }else
            return view('errors.notlogin');
    }
}
