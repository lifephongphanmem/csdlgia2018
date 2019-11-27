<?php

namespace App\Http\Controllers\manage\giadaugiadatts;

use App\DiaBanHd;
use App\District;
use App\Model\manage\dinhgia\giadaugiadat\DauGiaDatCt;
use App\Model\manage\dinhgia\giadaugiadatts\DauGiaDatTs;
use App\Model\manage\dinhgia\giadaugiadatts\DauGiaDatTsCt;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DauGiaDatTsController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
            $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
            $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : 'all';
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $huyens = DiaBanHd::where('level','H')
                ->get();
            $xas = DiaBanHd::where('level','X')
                ->get();
            $model = new DauGiaDatTs();
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('thoidiem',$inputs['nam']);
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('mahuyen', $inputs['mahuyen']);
                $xas = DiaBanHd::where('level','X')
                    ->where('district',$inputs['mahuyen'])
                    ->get();
            }
            if($inputs['maxa'] != 'all')
                $model = $model->where('maxa', $inputs['maxa']);
            if($inputs['tenduan'] != '')
                $model = $model->where('tenduan','like', '%'.$inputs['tenduan'].'%');
            $model = $model->paginate($inputs['paginate']);
            foreach($model as $tt){
                $tenhuyen = DiaBanHd::where('level','H')
                    ->where('district',$tt->mahuyen)
                    ->first();
                $tenxa = DiaBanHd::where('level','X')
                    ->where('town',$tt->maxa)
                    ->first();
                $tt->tenhuyen = $tenhuyen->diaban;
                $tt->tenxa = $tenxa->diaban;
            }
            return view('manage.dinhgia.giadaugiadatts.kekhai.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('huyens',$huyens)
                ->with('xas',$xas)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất và tài sản gắn liền với đất');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();

            $modeldb = DiaBanHd::where('district',$inputs['mahuyen'])
                ->where('level','H')
                ->first();
            $modelxas = DiaBanHd::where('level','X')
                ->where('district',$inputs['mahuyen'])
                ->get();
            $xas = array();
            foreach ($modelxas as $xa)
                $xas[$xa->town] = $xa->diaban;
            return view('manage.dinhgia.giadaugiadatts.kekhai.create')
                ->with('modeldb',$modeldb)
                ->with('xas',$xas)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất và tài sản gắn liền với đất thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $inputs['thoidiem'] = getDateToDb($inputs['thoidiem']);
//            $inputs['dientichdat'] = getMoneyToDb($inputs['dientichdat']);
//            $inputs['dientichsanxd'] = getMoneyToDb($inputs['dientichsanxd']);
            $model = new DauGiaDatTs();
            $model->create($inputs);
            return redirect('thongtindaugiadatts?&mahuyen='.$inputs['mahuyen']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = DauGiaDatTs::findOrFail($id);
            $modeldb = DiaBanHd::where('district',$model->mahuyen)
                ->where('level','H')
                ->first();
            $modelxas = DiaBanHd::where('level','X')
                ->where('district',$model->mahuyen)
                ->get();
            $xas = array();
            foreach ($modelxas as $xa)
                $xas[$xa->town] = $xa->diaban;
            return view('manage.dinhgia.giadaugiadatts.kekhai.edit')
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('xas',$xas)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất và tài sản gắn liền đất thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['thoidiem'] = getDateToDb($inputs['thoidiem']);
//            $inputs['dientichdat'] = getMoneyToDb($inputs['dientichdat']);
//            $inputs['dientichsanxd'] = getMoneyToDb($inputs['dientichsanxd']);
            $model = DauGiaDatTs::findOrFail($id);
            $model->update($inputs);

            return redirect('thongtindaugiadatts?&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = DauGiaDatTs::findOrFail($id);
            $modelct = DauGiaDatTsCt::where('mahs',$model->mahs)
                ->get();
            $modeldb = DiaBanHd::where('level','H')
                ->where('district',$model->mahuyen)
                ->first();
            $modelxa = DiaBanHd::where('level','X')
                ->where('town',$model->maxa)
                ->first();

            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = getGeneralConfigs()['tendvcqhienthi'];
                $inputs['dv'] = getGeneralConfigs()['tendvhienthi'];
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
            return view('manage.dinhgia.giadaugiadatts.kekhai.show')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modeldb',$modeldb)
                ->with('modelxa',$modelxa)
                ->with('inputs',$inputs)
                ->with('pageTitle','Hồ sơ đấu giá đất và tài sản gắn liền đất');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = DauGiaDatTs::findOrFail($id);
            $district = $model->district;
            $modelct = DauGiaDatTsCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thongtindaugiadatts');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['hoanthanh_id'];
            $model = DauGiaDatTs::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtindaugiadatts');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['huyhoanthanh_id'];
            $model = DauGiaDatTs::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            return redirect('thongtindaugiadatts');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['congbo_id'];
            $model = DauGiaDatTs::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtindaugiadatts');
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['huycongbo_id'];
            $model = DauGiaDatTs::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtindaugiadatts');
        }else
            return view('errors.notlogin');
    }

    public function ketxuat(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
            $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
            $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : 'all';
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $huyens = DiaBanHd::where('level','H')
                ->get();
            $model = new DauGiaDatTs();
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('thoidiem',$inputs['nam']);
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('mahuyen', $inputs['mahuyen']);
            }
            if($inputs['maxa'] != 'all')
                $model = $model->where('maxa', $inputs['maxa']);
            if($inputs['tenduan'] != '')
                $model = $model->where('tenduan','like', '%'.$inputs['tenduan'].'%');
            $model = $model->get();
            $array = '';
            foreach($model as $tt){
                $tenxa = DiaBanHd::where('level','X')
                    ->where('town',$tt->maxa)
                    ->first();
                $tt->tenxa = $tenxa->diaban;
                $array = $array.$tt->mahs.',';
            }
            $modelct = DauGiaDatTsCt::whereIn('mahs',explode(',',$array))
                ->get();

            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = getGeneralConfigs()['tendvcqhienthi'];
                $inputs['dv'] = getGeneralConfigs()['tendvhienthi'];
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
            return view('manage.dinhgia.giadaugiadatts.reports.print')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('inputs',$inputs)
                ->with('huyens',$huyens)
                ->with('pageTitle','Thông tin hồ sơ đấu giá đất và tài sản gắn liền với đất');
        }else
            return view('errors.notlogin');
    }
}
