<?php

namespace App\Http\Controllers\manage\giadaugiadatts;

use App\DiaBanHd;
use App\Model\manage\dinhgia\giadaugiadatts\DauGiaDatTs;
use App\Model\manage\dinhgia\giadaugiadatts\DauGiaDatTsCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DauGiaDatTsCtController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DauGiaDatTsCt::where('mahs',$inputs['mahs'])
                ->get();
            $modelhs = DauGiaDatTs::where('mahs',$inputs['mahs'])
                ->first();
            $huyen = DiaBanHd::where('level','H')
                ->where('district',$modelhs->mahuyen)
                ->first();
            $xa = DiaBanHd::where('level','X')
                ->where('district',$modelhs->mahuyen)
                ->where('town',$modelhs->maxa)
                ->first();
            return view('manage.dinhgia.giadaugiadatts.kekhai.chitiet.index')
                ->with('model',$model)
                ->with('modelhs',$modelhs)
                ->with('inputs',$inputs)
                ->with('huyen',$huyen)
                ->with('xa',$xa)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất và tài sản gắn liền đất');
        }else
            return view('errors.notlogin');
    }
    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['dientichdat'] = getMoneyToDb($inputs['dientichdat']);
            $inputs['dientichsanxd'] = getMoneyToDb($inputs['dientichsanxd']);

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

//            $inputs['giakhoidiemdat'] = getMoneyToDb($inputs['giakhoidiemdat']);
//            $inputs['giakhoidiemsanxd'] = getMoneyToDb($inputs['giakhoidiemsanxd']);
//            $inputs['giadaugiadat'] = getMoneyToDb($inputs['giadaugiadat']);
//            $inputs['giadaugiasanxd'] = getMoneyToDb($inputs['giadaugiasanxd']);

            $inputs['qdpdgiatstd'] = getMoneyToDb($inputs['qdpddatmuoi']);

            $inputs['kqgiadaugiadat'] = getMoneyToDb($inputs['qdpddatmuoi']);
            $inputs['kqgiadaugiats'] = getMoneyToDb($inputs['qdpddatmuoi']);
            $inputs['kqgiadaugiadatts'] = getMoneyToDb($inputs['qdpddatmuoi']);


            $modeladd = new DauGiaDatTsCt();
            $modeladd->create($inputs);
            return redirect('thongtindaugiadattsct?&mahs='.$inputs['mahs']);
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
        $model = DauGiaDatTsCt::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DauGiaDatTsCt::where('id',$inputs['edit_id'])
                ->first();
            $model->loaidat = $inputs['edit_loaidat'];
            $model->tenduong = $inputs['edit_tenduong'];
            $model->loaiduong = $inputs['edit_loaiduong'];
            $model->vitri= $inputs['edit_vitri'];

            $model->dientichdat = getMoneyToDb($inputs['edit_dientichdat']);
            $model->dientichsanxd = getMoneyToDb($inputs['edit_dientichsanxd']);

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

//            $model->giakhoidiemdat = getMoneyToDb($inputs['edit_giakhoidiemdat']);
//            $model->giakhoidiemsanxd = getMoneyToDb($inputs['edit_giakhoidiemsanxd']);
//            $model->giadaugiadat = getMoneyToDb($inputs['edit_giadaugiadat']);
//            $model->giadaugiasanxd = getMoneyToDb($inputs['edit_giadaugiasanxd']);

            $model->qdpdgiatstd = getMoneyToDb($inputs['edit_qdpdgiatstd']);

            $model->kqgiadaugiadat = getMoneyToDb($inputs['edit_kqgiadaugiadat']);
            $model->kqgiadaugiats = getMoneyToDb($inputs['edit_kqgiadaugiats']);
            $model->kqgiadaugiadatts = getMoneyToDb($inputs['edit_kqgiadaugiadatts']);
            $model->ghichu = getMoneyToDb($inputs['edit_ghichu']);

            $model->save();
            return redirect('thongtindaugiadattsct?&mahs='.$inputs['mahs']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DauGiaDatTsCt::where('id',$inputs['iddelete'])->delete();
            return redirect('thongtindaugiadattsct?&mahs='.$inputs['mahs']);
        }else
            return view('errors.notlogin');
    }
}
