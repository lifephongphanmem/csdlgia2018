<?php

namespace App\Http\Controllers;

use App\DauGiaDat;
use App\DauGiaDatCt;
use App\DauGiaDatCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DauGiaDatController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';

            $model = DauGiaDat::where('trangthai',$inputs['trangthai'])
                ->WhereYear('created_at',$inputs['nam'])
                ->get();
            return view('manage.dinhgia.giadaugiadat.kekhai.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất');
        }else
            return view('errors.notlogin');
    }

    public function create(){
        if(Session::has('admin')){
            $inputs['mahuyen'] = session('admin')->mahuyen!= '' ? session('admin')->mahuyen : 'T';

            $modelct = DauGiaDatCtDf::where('mahuyen',$inputs['mahuyen'])
                ->get();
            return view('manage.dinhgia.giadaugiadat.kekhai.create')
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahuyen'] = session('admin')->mahuyen!= '' ? session('admin')->mahuyen : 'T';
            $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new DauGiaDat();
            if($model->create($inputs)){
                $modelctdf = DauGiaDatCtDf::where('mahuyen',$inputs['mahuyen']);
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
            return redirect('thongtindaugiadat');
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

            return redirect('thongtindaugiadat');
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
            $modelct = DauGiaDatCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thongtindaugiadat');
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
                ->where('daugiadat.trangthai','HT')
                ->OrWhere('daugiadat.trangthai','CB');

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
