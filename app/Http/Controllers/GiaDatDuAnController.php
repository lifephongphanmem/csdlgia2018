<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\DmGiaDatDuAn;
use App\GiaDatDuAn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaDatDuAnController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if(can('giadatduan','index')) {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $diabans = DiaBanHd::where('level','H')
                    ->get();
                if(session('admin')->level == 'T' || session('admin')->level == 'H')
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $diabans->first()->district;
                else
                    $inputs['mahuyen'] = session('admin')->districts;
                $model = GiaDatDuAn::join('dmgiadatduan','dmgiadatduan.manhomduan','=','giadatduan.manhomduan')
                    ->select('giadatduan.*','dmgiadatduan.tennhomduan')
                    ->whereYear('giadatduan.thoidiem',$inputs['nam'])
                    ->where('mahuyen',$inputs['mahuyen'])
                    ->get();
                return view('manage.giadatduan.index')
                    ->with('model',$model)
                    ->with('inputs',$inputs)
                    ->with('diabans',$diabans)
                    ->with('pageTitle','Thông tin gia đất cụ thể của dự án');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if(can('giadatduan','index')) {
                $inputs = $request->all();
                $modeldb = DiaBanHd::where('district',$inputs['mahuyen'])
                    ->where('level','H')
                    ->first();

                $modeldm = DmGiaDatDuAn::all();

                $nhomduan = array();
                foreach ($modeldm as $dm) {

                    $nhomduan[$dm->manhomduan] = $dm->tennhomduan;
                }
                return view('manage.giadatduan.create')
                    ->with('modeldb',$modeldb)
                    ->with('inputs',$inputs)
                    ->with('nhomduan',$nhomduan)
                    ->with('pageTitle','Thông tin gia đất cụ thể của dự án thêm mới');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new GiaDatDuAn();
            $inputs['thoidiem'] = getDateToDb($inputs['thoidiem']);
            $inputs['dientich'] = getDoubleToDb($inputs['dientich']);
            $inputs['qddato'] = getDoubleToDb($inputs['qddato']);
            $inputs['qddatsxkd'] = getDoubleToDb($inputs['qddatsxkd']);
            $inputs['qddatnnkdc']= getDoubleToDb($inputs['qddatnnkdc']);
            $inputs['qddatnnnkdc']= getDoubleToDb($inputs['qddatnnnkdc']);

            $inputs['tddato'] = getDoubleToDb($inputs['tddato']);
            $inputs['tddatsxkd'] = getDoubleToDb($inputs['tddatsxkd']);
            $inputs['tddatnnkdc'] = getDoubleToDb($inputs['tddatnnkdc']);
            $inputs['tddatnnnkdc'] = getDoubleToDb($inputs['tddatnnnkdc']);

            $model->create($inputs);

            return redirect('thongtingiadatduan');


        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if(can('giadatduan','edit')) {
                $model = GiaDatDuAn::findOrFail($id);
                $modeldb = DiaBanHd::where('district',$model->mahuyen)
                    ->where('level','H')
                    ->first();

                $modeldm = DmGiaDatDuAn::all();

                $nhomduan = array();
                foreach ($modeldm as $dm) {

                    $nhomduan[$dm->manhomduan] = $dm->tennhomduan;
                }
                return view('manage.giadatduan.edit')
                    ->with('modeldb',$modeldb)
                    ->with('model',$model)
                    ->with('nhomduan',$nhomduan)
                    ->with('pageTitle','Thông tin gia đất cụ thể của dự án chỉnh sửa');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['thoidiem'] = getDateToDb($inputs['thoidiem']);
            $inputs['dientich'] = getDoubleToDb($inputs['dientich']);
            $inputs['qddato'] = getDoubleToDb($inputs['qddato']);
            $inputs['qddatsxkd'] = getDoubleToDb($inputs['qddatsxkd']);
            $inputs['qddatnnkdc']= getDoubleToDb($inputs['qddatnnkdc']);
            $inputs['qddatnnnkdc']= getDoubleToDb($inputs['qddatnnnkdc']);

            $inputs['tddato'] = getDoubleToDb($inputs['tddato']);
            $inputs['tddatsxkd'] = getDoubleToDb($inputs['tddatsxkd']);
            $inputs['tddatnnkdc'] = getDoubleToDb($inputs['tddatnnkdc']);
            $inputs['tddatnnnkdc'] = getDoubleToDb($inputs['tddatnnnkdc']);

            $model = GiaDatDuAn::findOrFail($id);
            $model->update($inputs);

            return redirect('thongtingiadatduan');


        } else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = GiaDatDuAn::join('dmgiadatduan','dmgiadatduan.manhomduan','=','giadatduan.manhomduan')
                ->join('diabanhd','diabanhd.district','=','giadatduan.mahuyen')
                ->select('giadatduan.*','dmgiadatduan.tennhomduan','diabanhd.diaban')
                ->where('giadatduan.id',$id)
                ->first();
            return view('manage.giadatduan.show')
                ->with('model',$model)
                ->with('pageTitle','Thông tin gia đất cụ thể của dự án ');

        } else
            return view('errors.notlogin');
    }

    public function prints(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if($inputs['phuluc'] = '08a') {
                $model = GiaDatDuAn::join('dmgiadatduan', 'dmgiadatduan.manhomduan', '=', 'giadatduan.manhomduan')
                    ->join('diabanhd', 'diabanhd.district', '=', 'giadatduan.mahuyen')
                    ->select('giadatduan.*', 'dmgiadatduan.tennhomduan', 'diabanhd.diaban')
                    ->whereYear('giadatduan.thoidiem', $inputs['nam'])
                    ->where('giadatduan.mahuyen', $inputs['mahuyen'])
                    ->get();
                $modeldm = DmGiaDatDuAn::all();
                $modeldb = DiaBanHd::where('district',$inputs['mahuyen'])
                    ->where('level','H')
                    ->first();
                return view('manage.giadatduan.reports.phuluc08a')
                    ->with('model', $model)
                    ->with('modeldm',$modeldm)
                    ->with('modeldb',$modeldb)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Thông tin gia đất cụ thể của dự án ');
            }

        } else
            return view('errors.notlogin');
    }

    public function baocaotonghop(){
        if (Session::has('admin')) {
            if (can('thgiadatduan', 'baocao')) {
                $modeldb = DiaBanHd::where('level', 'H')
                    ->get();
                return view('manage.giadatduan.reports.index')
                    ->with('modeldb', $modeldb)
                    ->with('pageTitle', 'Báo cáo tổng hợp giá đất cụ thể của dự án trên địa bàn');
            }else
                return view('errors.noperm');

        }else
            return view('errors.notlogin');
    }

    public function phuluc08(Request $request){
        if (Session::has('admin')) {
            if (can('thgiadatduan', 'baocao')) {
                $inputs = $request->all();
                if($inputs['mahuyen'] == 'all'){
                    $model = GiaDatDuAn::join('dmgiadatduan', 'dmgiadatduan.manhomduan', '=', 'giadatduan.manhomduan')
                        ->join('diabanhd', 'diabanhd.district', '=', 'giadatduan.mahuyen')
                        ->select('giadatduan.*', 'dmgiadatduan.tennhomduan', 'diabanhd.diaban')
                        ->whereYear('giadatduan.thoidiem', $inputs['nam'])
                        ->get();
                    $modeldm = DmGiaDatDuAn::all();
                    $modeldb = DiaBanHd::where('level','H')
                        ->get();
                    return view('manage.giadatduan.reports.phuluc08')
                        ->with('model', $model)
                        ->with('modeldm',$modeldm)
                        ->with('modeldb',$modeldb)
                        ->with('inputs',$inputs)
                        ->with('pageTitle', 'Thông tin gia đất cụ thể của dự án ');
                }else
                    return redirect('thongtingiadatduan/print?&phuluc=08a&mahuyen='.$inputs['mahuyen'].'&nam='.$inputs['nam']);
            }else
                return view('errors.noperm');

        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            if(can('thgiadatduan','timkiem')) {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $diabans = DiaBanHd::where('level','H')
                    ->get();
                $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $diabans->first()->district;
                $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';

                $model = GiaDatDuAn::join('dmgiadatduan','dmgiadatduan.manhomduan','=','giadatduan.manhomduan')
                    ->select('giadatduan.*','dmgiadatduan.tennhomduan')
                    ->whereYear('giadatduan.thoidiem',$inputs['nam'])
                    ->where('mahuyen',$inputs['mahuyen']);
                if($inputs['tenduan'] != '')
                    $model = $model->where('tenduan','like','%'.$inputs['tenduan'].'%');
                $model = $model->get();
                return view('manage.giadatduan.search')
                    ->with('model',$model)
                    ->with('inputs',$inputs)
                    ->with('diabans',$diabans)
                    ->with('pageTitle','Tìm kiếm thông tin gia đất cụ thể của dự án');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }
}
