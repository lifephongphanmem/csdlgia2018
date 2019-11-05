<?php

namespace App\Http\Controllers\manage\giataisancong;

use App\DiaBanHd;
use App\District;
use App\Model\manage\dinhgia\GiaTaiSanCong;
use App\Model\manage\dinhgia\GiaTaiSanCongDm;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaTaiSanCongController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $inputs['tenphanloai'] = isset($inputs['tenphanloai']) ? $inputs['tenphanloai'] : '';
            $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
            $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : 'all';
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $huyens = DiaBanHd::where('level','H')
                ->get();
            $xas = DiaBanHd::where('level','X')
                ->get();
            $model = new GiaTaiSanCong();
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('thoidiemden',$inputs['nam']);
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('mahuyen', $inputs['mahuyen']);
                $xas = DiaBanHd::where('level','X')
                    ->where('district',$inputs['mahuyen'])
                    ->get();
            }
            if($inputs['maxa'] != 'all')
                $model = $model->where('maxa', $inputs['maxa']);
            if($inputs['tenphanloai'] != '')
                $model = $model->where('tenphanloai','like', '%'.$inputs['tenduan'].'%');
            $model = $model->paginate($inputs['paginate']);
            $m_dm = GiaTaiSanCongDm::all();
            foreach($model as $tt){
                $tenhuyen = DiaBanHd::where('level','H')
                    ->where('district',$tt->mahuyen)
                    ->first();
                $tenxa = DiaBanHd::where('level','X')
                    ->where('town',$tt->maxa)
                    ->first();
                $dm = $m_dm->where('mataisan',$tt->mataisan)->first();
                if(count($dm)> 0){
                    $tt->tentaisan = $dm->tentaisan;
                    $tt->nguyengia = $dm->giatri;
                }else{
                    $tt->tentaisan = '';
                    $tt->nguyengia = 0;
                }
                $tt->tenhuyen = $tenhuyen->diaban;
                $tt->tenxa = $tenxa->diaban;
            }

            return view('manage.dinhgia.giataisancong.kekhai.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('huyens',$huyens)
                ->with('xas',$xas)
                ->with('pageTitle','Thông tin hồ sơ giá tài sản công');
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
            $model_dm = GiaTaiSanCongDm::all();
            return view('manage.dinhgia.giataisancong.kekhai.create')
                ->with('modeldb',$modeldb)
                ->with('xas',$xas)
                ->with('a_dm',array_column($model_dm->toArray(),'tentaisan','mataisan'))
                ->with('pageTitle','Thông tin hồ sơ giá tài sản công');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $inputs['giathue'] = getMoneyToDb($inputs['giathue']);
            $inputs['thoidiemden'] = getDateToDb($inputs['thoidiemden']);
            GiaTaiSanCong::create($inputs);
            return redirect('giataisancong?&mahuyen='.$inputs['mahuyen']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = GiaTaiSanCong::findOrFail($id);
            $modeldb = DiaBanHd::where('district',$model->mahuyen)
                ->where('level','H')
                ->first();
            $modelxas = DiaBanHd::where('level','X')
                ->where('district',$model->mahuyen)
                ->get();
            $xas = array();
            foreach ($modelxas as $xa)
                $xas[$xa->town] = $xa->diaban;
            $model_dm = GiaTaiSanCongDm::all();
            return view('manage.dinhgia.giataisancong.kekhai.edit')
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('xas',$xas)
                ->with('a_dm',array_column($model_dm->toArray(),'tentaisan','mataisan'))
                ->with('pageTitle','Thông tin hồ sơ giá tài sản công');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['thoidiemden'] = getDateToDb($inputs['thoidiemden']);
            $inputs['giathue'] = getMoneyToDb($inputs['giathue']);
            $model = GiaTaiSanCong::findOrFail($id);
            $model->update($inputs);

            return redirect('giataisancong?&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = GiaTaiSanCong::findOrFail($id);
            $m_dm = GiaTaiSanCongDm::where('mataisan',$model->mataisan)->first();
            $model->tentaisan = $m_dm->tentaisan;
            $model->giatri = $m_dm->giatri;
            $modelct = GiaTaiSanCongDm::all();
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

            return view('manage.dinhgia.giataisancong.kekhai.show')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modeldb',$modeldb)
                ->with('modelxa',$modelxa)
                ->with('inputs',$inputs)
                ->with('pageTitle','Hồ sơ giá tài sản công');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaTaiSanCong::findOrFail($id);
            $district = $model->district;
            $model->delete();
            return redirect('giataisancong?&mahuyen='.$district);
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaTaiSanCong::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('giataisancong');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaTaiSanCong::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('giataisancong');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaTaiSanCong::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('giataisancong');
        }else
            return view('errors.notlogin');
    }

    public function ketxuat(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['tenphanloai'] = isset($inputs['tenphanloai']) ? $inputs['tenphanloai'] : '';
            $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
            $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : 'all';
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $huyens = DiaBanHd::where('level','H')
                ->get();
            $model = new GiaTaiSanCong();
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('thoidiemden',$inputs['nam']);
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('mahuyen', $inputs['mahuyen']);
            }
            if($inputs['maxa'] != 'all')
                $model = $model->where('maxa', $inputs['maxa']);
            if($inputs['tenphanloai'] != '')
                $model = $model->where('tenphanloai','like', '%'.$inputs['tenphanloai'].'%');
            $model = $model->get();
            $array = '';
            foreach($model as $tt){
                $tenxa = DiaBanHd::where('level','X')
                    ->where('town',$tt->maxa)
                    ->first();
                $tt->tenxa = $tenxa->diaban;
                $array = $array.$tt->mahs.',';
            }

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
            $m_dm = GiaTaiSanCongDm::all();
            foreach ($model as $ct){
                $dm = $m_dm->where('mataisan',$ct->mataisan)->first();
                $ct->tentaisan = $dm->tentaisan;
                $ct->giatri = $dm->giatri;
            }

            return view('manage.dinhgia.giataisancong.reports.print')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('huyens',$huyens)
                ->with('pageTitle','Thông tin hồ sơ giá tài sản công');
        }else
            return view('errors.notlogin');
    }
}
