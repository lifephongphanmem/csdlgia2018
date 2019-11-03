<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\GiaThueDatNuoc;
use App\GiaThueDatNuocCt;
use App\GiaThueDatNuocCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThueDatNuocController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldb = DiaBanHd::where('level','H')->get();
            if(session('admin')->level == 'X') {
                $inputs['diaban'] = isset($inputs['diaban']) ? $inputs['diaban'] : session('admin')->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
            }else {

                $inputs['diaban'] = isset($inputs['diaban']) ? $inputs['diaban'] : $modeldb->first()->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
            }

            $model = GiaThueDatNuoc::whereYear('ngayapdung',$inputs['nam']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);
            if($inputs['diaban'] != '')
                $model = $model->where('district',$inputs['diaban']);

            $model=$model->get();
            return view('manage.dinhgia.thuematdatmatnuoc.kekhai.index')
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ thuê mặt đất, mặt nước');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(session('admin')->level == 'X')
                $inputs['diaban'] = session('admin')->district;
            $modelct = GiaThueDatNuocCtDf::where('district',$inputs['diaban'])->get();
            return view('manage.dinhgia.thuematdatmatnuoc.kekhai.create')
                ->with('modelct',$modelct)
                ->with('district',$inputs['diaban'])
                ->with('pageTitle','Hồ sơ thuê mặt đất, mặt nước thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['mahs'] = $inputs['district'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new GiaThueDatNuoc();
            if($model->create($inputs)){
                $modelctdf = GiaThueDatNuocCtDf::where('district',$inputs['district']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new GiaThueDatNuocCt();
                    $modelct->vitri = $ctdf->vitri;
                    $modelct->mota= $ctdf->mota;
                    $modelct->dientich = $ctdf->dientich;
                    $modelct->dongia = $ctdf->dongia;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('giathuematdatmatnuoc?&diaban='.$inputs['district'].'&trangthai='.$inputs['trangthai']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = GiaThueDatNuoc::findOrFail($id);
            $modelct = GiaThueDatNuocCt::where('mahs',$model->mahs)->get();
            return view('manage.dinhgia.thuematdatmatnuoc.kekhai.edit')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Hồ sơ thuê mặt đất, mặt nước thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = GiaThueDatNuoc::findOrFail($id);
            $model->update($inputs);

            return redirect('giathuematdatmatnuoc?trangthai='.$model->trangthai.'&diaban='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = GiaThueDatNuoc::findOrFail($id);
            $modelct = GiaThueDatNuocCt::where('mahs',$model->mahs)->get();
            return view('manage.dinhgia.thuematdatmatnuoc.kekhai.show')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Hồ sơ thuê mặt đất, mặt nước chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaThueDatNuoc::findOrFail($id);
            $district = $model->district;
            $modelct = GiaThueDatNuocCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('giathuematdatmatnuoc?&diaban='.$district.'&trangthai=CHT');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaThueDatNuoc::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('giathuematdatmatnuoc?&trangthai=HT&diaban='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaThueDatNuoc::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('giathuematdatmatnuoc?&trangthai=HHT&diaban='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaThueDatNuoc::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('giathuematdatmatnuoc?&trangthai=CB&diaban='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldb = DiaBanHd::where('level','H')->get();
            $inputs['diaban'] = isset($inputs['diaban']) ? $inputs['diaban'] : '';
            $inputs['vitri'] = isset($inputs['vitri']) ? $inputs['vitri'] : '';

            $model = GiaThueDatNuocCt::join('giathuedatnuoc','giathuedatnuoc.mahs','=','giathuedatnuocct.mahs')
                ->select('giathuedatnuocct.*','giathuedatnuoc.soqd','giathuedatnuoc.ngayapdung','giathuedatnuoc.trangthai','giathuedatnuoc.ghichu')
                ->whereIn('giathuedatnuoc.trangthai',['HT','CB']);
            if($inputs['nam']!= '')
                $model = $model->whereYear('giathuedatnuoc.ngayapdung',$inputs['nam']);
            if($inputs['vitri'] != '')
                $model = $model->where('giathuedatnuocct.vitri','like','%'.$inputs['vitri'].'%');
            if($inputs['diaban'] != '')
                $model = $model->where('giathuedatnuoc.district',$inputs['diaban']);
            $model = $model->get();
            return view('manage.dinhgia.thuematdatmatnuoc.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('diaban',$inputs['diaban'])
                ->with('vitri',$inputs['vitri'])
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('pageTitle','Tìm kiếm thông tin giá lệ phí trước bạ');
        }else
            return view('errors.notlogin');
    }

    public function ketxuat(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['diaban'] = isset($inputs['diaban']) ? $inputs['diaban'] : '';
            $inputs['vitri'] = isset($inputs['vitri']) ? $inputs['vitri'] : '';
            $model = GiaThueDatNuocCt::join('giathuedatnuoc','giathuedatnuoc.mahs','=','giathuedatnuocct.mahs')
                ->select('giathuedatnuocct.*','giathuedatnuoc.soqd','giathuedatnuoc.ngayapdung','giathuedatnuoc.trangthai','giathuedatnuoc.ghichu','giathuedatnuoc.district')
                ->whereIn('giathuedatnuoc.trangthai',['HT','CB']);
            if($inputs['nam']!= '')
                $model = $model->whereYear('giathuedatnuoc.ngayapdung',$inputs['nam']);
            if($inputs['vitri'] != '')
                $model = $model->where('giathuedatnuocct.vitri','like','%'.$inputs['vitri'].'%');
            if($inputs['diaban'] != '')
                $model = $model->where('giathuedatnuoc.district',$inputs['diaban']);
            $model = $model->get();

            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = '';
                $inputs['dv'] = getGeneralConfigs()['tendonvi'];
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }elseif(session('admin')->level == 'H'){
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }else{
                $modeldv = Town::where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }
            $huyens = DiaBanHd::where('level','H')->get();
            //dd($model);
            return view('manage.dinhgia.thuematdatmatnuoc.reports.print')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('huyens',$huyens)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất, mặt nước');
        }else
            return view('errors.notlogin');
    }
}
