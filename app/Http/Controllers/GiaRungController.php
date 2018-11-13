<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\DmGiaRung;
use App\GiaRung;
use App\GiaRungCt;
use App\GiaRungCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaRungController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $districts = DiaBanHd::where('level','H')->get();
            if(session('admin')->level == 'X'){
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
                $inputs['district'] = session('admin')->district;
            }else{
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $districts->first()->district;
            }

            $model = GiaRung::whereYear('ngayapdung',$inputs['nam'])
                ->where('district',$inputs['district']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);

            $model=$model->get();

            return view('manage.dinhgia.giarung.kekhai.index')
                ->with('model',$model)
                ->with('districts',$districts)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ giá rừng');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(session('admin')->level == 'X')
                $inputs['district'] = session('admin')->district;
            $modeldm = DmGiaRung::all();
            $modelct = GiaRungCtDf::where('district',$inputs['district'])
                ->join('dmgiarung','dmgiarung.manhom','=','giarungctdf.manhom')
                ->select('giarungctdf.*','dmgiarung.tennhom')
                ->get();
            return view('manage.dinhgia.giarung.kekhai.create')
                ->with('modeldm',$modeldm)
                ->with('modelct',$modelct)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ giá rừng thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['mahs'] = $inputs['district'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new GiaRung();
            if($model->create($inputs)){
                $modelctdf = GiaRungCtDf::where('district',$inputs['district']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new GiaRungCt();
                    $modelct->manhom = $ctdf->manhom;
                    $modelct->loairung= $ctdf->loairung;
                    $modelct->mucdo = $ctdf->mucdo;
                    $modelct->dongiasd = $ctdf->dongiasd;
                    $modelct->dongiat50 = $ctdf->dongiat50;
                    $modelct->dongiat1 = $ctdf->dongiat1;
                    $modelct->dongiaxp = $ctdf->dongiaxp;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('giarung?&district='.$inputs['district'].'&trangthai=CHT');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $modeldm = DmGiaRung::all();
            $model = GiaRung::findOrFail($id);
            $modelct =  GiaRungCt::where('mahs',$model->mahs)
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->select('giarungct.*','dmgiarung.tennhom')
                ->get();
            return view('manage.dinhgia.giarung.kekhai.edit')
                ->with('modeldm',$modeldm)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ giá rừng chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = GiaRung::findOrFail($id);
            $model->update($inputs);
            return redirect('giarung?&trangthai='.$model->trangthai.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaRung::findOrFail($id);
            $district = $model->district;
            $modelct = GiaRungCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('giarung?&trangthai=CHT&district='.$district);
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('giarung?&trangthai=HT&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('giarung?&trangthai=HHT&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('giarung?&trangthai=CB&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['loairung'] = isset($inputs['loairung']) ? $inputs['loairung'] : '';
            $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : '';
            $districts = DiaBanHd::where('level','H')->get();

            $model = GiaRungCt::join('giarung','giarung.mahs','=','giarungct.mahs')
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->join('diabanhd','diabanhd.district','=','giarung.district')
                ->select('giarungct.*','giarung.soqd','giarung.ngayapdung','giarung.trangthai','dmgiarung.tennhom','diabanhd.diaban')
                ->whereIn('giarung.trangthai',['HT','CB']);
            if($inputs['nam'] != '')
                $model = $model->whereYear('giarung.ngayapdung',$inputs['nam']);
            if($inputs['loairung'] != '')
                $model = $model->where('giarungct.loairung','like','%'.$inputs['loairung'].'%');
            if($inputs['district'] != '')
                $model = $model->where('giarung.district',$inputs['district']);
            $model = $model->get();
            return view('manage.dinhgia.giarung.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('districts',$districts)
                ->with('pageTitle','Tìm kiếm thông tin giá rừng');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = GiaRung::findOrFail($id);
            $districts = DiaBanHd::where('district',$model->district)
                ->where('level','H')
                ->first();
            $modelct = GiaRungCt::where('giarungct.mahs',$model->mahs)
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->select('giarungct.*','dmgiarung.tennhom')
                ->get();
            return view('manage.dinhgia.giarung.reports.print')
                ->with('model',$model)
                ->with('districts',$districts)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ giá rừng');

        }else
            return view('errors.notlogin');
    }

}
