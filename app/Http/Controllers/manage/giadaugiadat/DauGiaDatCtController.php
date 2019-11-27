<?php

namespace App\Http\Controllers\manage\giadaugiadat;

use App\DiaBanHd;
use App\Model\manage\dinhgia\giadaugiadat\DauGiaDat;
use App\Model\manage\dinhgia\giadaugiadat\DauGiaDatCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DauGiaDatCtController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DauGiaDatCt::where('mahs',$inputs['mahs'])
                ->get();
            $modelhs = DauGiaDat::where('mahs',$inputs['mahs'])
                ->first();
            $huyen = DiaBanHd::where('level','H')
                ->where('district',$modelhs->mahuyen)
                ->first();
            $xa = DiaBanHd::where('level','X')
                ->where('district',$modelhs->mahuyen)
                ->where('town',$modelhs->maxa)
                ->first();
            return view('manage.dinhgia.giadaugiadat.kekhai.chitiet.index')
                ->with('model',$model)
                ->with('modelhs',$modelhs)
                ->with('inputs',$inputs)
                ->with('huyen',$huyen)
                ->with('xa',$xa)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất');
        }else
            return view('errors.notlogin');
    }
    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['dientich'] = getMoneyToDb($inputs['dientich']);
            $inputs['qdgiadato'] = getMoneyToDb($inputs['qdgiadato']);
            $inputs['qdgiadattmdv'] = getMoneyToDb($inputs['qdgiadattmdv']);
            $inputs['qdgiadatsxkd'] = getMoneyToDb($inputs['qdgiadatsxkd']);
            $inputs['qdgiadatnn'] = getMoneyToDb($inputs['qdgiadatnn']);
            $inputs['qdgiadatnuoits'] = getMoneyToDb($inputs['qdgiadatnuoits']);
            $inputs['qdgiadatmuoi'] = getMoneyToDb($inputs['qdgiadatmuoi']);

            $inputs['qdpddato'] = getMoneyToDb($inputs['qdpddato']);
            $inputs['qdpddattmdv'] = getMoneyToDb($inputs['qdpddattmdv']);
            $inputs['qdpddatsxkd'] = getMoneyToDb($inputs['qdpddatsxkd']);
            $inputs['qdpddatnn'] = getMoneyToDb($inputs['qdpddatnn']);
            $inputs['qdpddatnuoits'] = getMoneyToDb($inputs['qdpddatnuoits']);
            $inputs['qdpddatmuoi'] = getMoneyToDb($inputs['qdpddatmuoi']);

            $inputs['kqdgdato'] = getMoneyToDb($inputs['kqdgdato']);
            $inputs['kqdgdattmdv'] = getMoneyToDb($inputs['kqdgdattmdv']);
            $inputs['kqdgdatsxkd'] = getMoneyToDb($inputs['kqdgdatsxkd']);
            $inputs['kqdgdatnn'] = getMoneyToDb($inputs['kqdgdatnn']);
            $inputs['kqdgdatnuoits'] = getMoneyToDb($inputs['kqdgdatnuoits']);
            $inputs['kqdgdatmuoi'] = getMoneyToDb($inputs['kqdgdatmuoi']);

            $modeladd = new DauGiaDatCt();
            $modeladd->create($inputs);
            return redirect('thongtindaugiadatct?&mahs='.$inputs['mahs']);
        }else
            return view('errors.notlogin');
    }

    public function edit(Request $request)
    {
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
        $model = DauGiaDatCt::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DauGiaDatCt::where('id',$inputs['edit_id'])
                ->first();
            $model->loaidat = $inputs['edit_loaidat'];
            $model->tenduong = $inputs['edit_tenduong'];
            $model->loaiduong = $inputs['edit_loaiduong'];
            $model->vitri= $inputs['edit_vitri'];

            $model->dientich = getMoneyToDb($inputs['edit_dientich']);

            $model->qdgiadato = getMoneyToDb($inputs['edit_qdgiadato']);
            $model->qdgiadattmdv = getMoneyToDb($inputs['edit_qdgiadattmdv']);
            $model->qdgiadatsxkd = getMoneyToDb($inputs['edit_qdgiadatsxkd']);
            $model->qdgiadatnn = getMoneyToDb($inputs['edit_qdgiadatnn']);
            $model->qdgiadatnuoits = getMoneyToDb($inputs['edit_qdgiadatnuoits']);
            $model->qdgiadatmuoi = getMoneyToDb($inputs['edit_qdgiadatmuoi']);

            $model->qdpddato = getMoneyToDb($inputs['edit_qdpddato']);
            $model->qdpddattmdv = getMoneyToDb($inputs['edit_qdpddattmdv']);
            $model->qdpddatsxkd = getMoneyToDb($inputs['edit_qdpddatsxkd']);
            $model->qdpddatnn = getMoneyToDb($inputs['edit_qdpddatnn']);
            $model->qdpddatnuoits = getMoneyToDb($inputs['edit_qdpddatnuoits']);
            $model->qdpddatmuoi = getMoneyToDb($inputs['edit_qdpddatmuoi']);

//            $model->giakhoidiem = getMoneyToDb($inputs['edit_giakhoidiem']);
//            $model->giadaugia = getMoneyToDb($inputs['edit_giadaugia']);

            $model->kqdgdato = getMoneyToDb($inputs['edit_kqdgdato']);
            $model->kqdgdattmdv = getMoneyToDb($inputs['edit_kqdgdattmdv']);
            $model->kqdgdatsxkd = getMoneyToDb($inputs['edit_kqdgdatsxkd']);
            $model->kqdgdatnn = getMoneyToDb($inputs['edit_kqdgdatnn']);
            $model->kqdgdatnuoits = getMoneyToDb($inputs['edit_kqdgdatnuoits']);
            $model->kqdgdatmuoi = getMoneyToDb($inputs['edit_kqdgdatmuoi']);

            $model->save();
            return redirect('thongtindaugiadatct?&mahs='.$inputs['mahs']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DauGiaDatCt::where('id',$inputs['iddelete'])->delete();
            return redirect('thongtindaugiadatct?&mahs='.$inputs['mahs']);
        }else
            return view('errors.notlogin');
    }
}
