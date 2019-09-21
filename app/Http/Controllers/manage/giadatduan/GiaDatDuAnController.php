<?php

namespace App\Http\Controllers\manage\giadatduan;

use App\DiaBanHd;
use App\Model\manage\dinhgia\giadatduan\DmGiaDatDuAn;
use App\Model\manage\dinhgia\giadatduan\GiaDatDuAn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaDatDuAnController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if(can('giadatduan','index')) {
                $inputs = $request->all();
                $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
                $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
                $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : 'all';
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['manhomduan'] = isset($inputs['manhomduan']) ? $inputs['manhomduan'] : 'all';
                $huyens = DiaBanHd::where('level','H')
                    ->get();
                $xas = DiaBanHd::where('level','X')
                    ->get();
                $modeldm = DmGiaDatDuAn::all();
                $model = GiaDatDuAn::join('dmgiadatduan','dmgiadatduan.manhomduan','=','giadatduan.manhomduan')
                    ->select('giadatduan.*','dmgiadatduan.tennhomduan');
                if($inputs['nam'] != 'all')
                    $model = $model->whereYear('giadatduan.thoidiem',$inputs['nam']);
                if($inputs['mahuyen'] != 'all') {
                    $model = $model->where('giadatduan.mahuyen', $inputs['mahuyen']);
                    $xas = DiaBanHd::where('level','X')
                        ->where('district',$inputs['mahuyen'])
                        ->get();
                }
                if($inputs['maxa'] != 'all')
                    $model = $model->where('giadatduan.maxa', $inputs['maxa']);
                if($inputs['manhomduan'] != 'all')
                    $model = $model->where('giadatduan.manhomduan',$inputs['manhomduan']);
                if($inputs['tenduan'] != '')
                    $model = $model->where('giadatduan.tenduan','like', '%'.$inputs['tenduan'].'%');
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
                return view('manage.dinhgia.giadatduan.index')
                    ->with('model',$model)
                    ->with('inputs',$inputs)
                    ->with('huyens',$huyens)
                    ->with('xas',$xas)
                    ->with('modeldm',$modeldm)
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
                foreach ($modeldm as $dm)
                    $nhomduan[$dm->manhomduan] = $dm->tennhomduan;
                $modelxas = DiaBanHd::where('level','X')
                    ->where('district',$inputs['mahuyen'])
                    ->get();
                $xas = array();
                foreach ($modelxas as $xa)
                    $xas[$xa->town] = $xa->diaban;
                return view('manage.dinhgia.giadatduan.create')
                    ->with('modeldb',$modeldb)
                    ->with('inputs',$inputs)
                    ->with('nhomduan',$nhomduan)
                    ->with('xas',$xas)
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

            $inputs['qdgiadato'] = getDoubleToDb($inputs['qdgiadato']);
            $inputs['qdgiadattmdv'] = getDoubleToDb($inputs['qdgiadattmdv']);
            $inputs['qdgiadatsxkd'] = getDoubleToDb($inputs['qdgiadatsxkd']);
            $inputs['qdgiadatnn'] = getDoubleToDb($inputs['qdgiadatnn']);
            $inputs['qdgiadatnuoits'] = getDoubleToDb($inputs['qdgiadatnuoits']);
            $inputs['qdgiadatmuoi'] = getDoubleToDb($inputs['qdgiadatmuoi']);

            $inputs['qdpddato'] = getDoubleToDb($inputs['qdpddato']);
            $inputs['qdpddattmdv'] = getDoubleToDb($inputs['qdpddattmdv']);
            $inputs['qdpddatsxkd'] = getDoubleToDb($inputs['qdpddatsxkd']);
            $inputs['qdpddatnn'] = getDoubleToDb($inputs['qdpddatnn']);
            $inputs['qdpddatnuoits'] = getDoubleToDb($inputs['qdpddatnuoits']);
            $inputs['qdpddatmuoi'] = getDoubleToDb($inputs['qdpddatmuoi']);

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
                $modelxas = DiaBanHd::where('level','X')
                    ->where('district',$model->mahuyen)
                    ->get();
                $xas = array();
                foreach ($modelxas as $xa)
                    $xas[$xa->town] = $xa->diaban;
                return view('manage.dinhgia.giadatduan.edit')
                    ->with('modeldb',$modeldb)
                    ->with('model',$model)
                    ->with('nhomduan',$nhomduan)
                    ->with('xas',$xas)
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

            $inputs['qdgiadato'] = getDoubleToDb($inputs['qdgiadato']);
            $inputs['qdgiadattmdv'] = getDoubleToDb($inputs['qdgiadattmdv']);
            $inputs['qdgiadatsxkd'] = getDoubleToDb($inputs['qdgiadatsxkd']);
            $inputs['qdgiadatnn'] = getDoubleToDb($inputs['qdgiadatnn']);
            $inputs['qdgiadatnuoits'] = getDoubleToDb($inputs['qdgiadatnuoits']);
            $inputs['qdgiadatmuoi'] = getDoubleToDb($inputs['qdgiadatmuoi']);

            $inputs['qdpddato'] = getDoubleToDb($inputs['qdpddato']);
            $inputs['qdpddattmdv'] = getDoubleToDb($inputs['qdpddattmdv']);
            $inputs['qdpddatsxkd'] = getDoubleToDb($inputs['qdpddatsxkd']);
            $inputs['qdpddatnn'] = getDoubleToDb($inputs['qdpddatnn']);
            $inputs['qdpddatnuoits'] = getDoubleToDb($inputs['qdpddatnuoits']);
            $inputs['qdpddatmuoi'] = getDoubleToDb($inputs['qdpddatmuoi']);

            $model = GiaDatDuAn::findOrFail($id);
            $model->update($inputs);

            return redirect('thongtingiadatduan');


        } else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = GiaDatDuAn::join('dmgiadatduan','dmgiadatduan.manhomduan','=','giadatduan.manhomduan')
                ->where('giadatduan.id',$id)
                ->first();
            $huyen = DiaBanHd::where('district',$model->mahuyen)
                ->where('level','H')
                ->first();
            $xa = DiaBanHd::where('town',$model->maxa)
                ->where('level','X')
                ->first();
            return view('manage.dinhgia.giadatduan.show')
                ->with('model',$model)
                ->with('huyen',$huyen)
                ->with('xa',$xa)
                ->with('pageTitle','Thông tin gia đất cụ thể của dự án ');

        } else
            return view('errors.notlogin');
    }

    public function prints(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
            $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhomduan'] = isset($inputs['manhomduan']) ? $inputs['manhomduan'] : 'all';
            $model = GiaDatDuAn::join('dmgiadatduan', 'dmgiadatduan.manhomduan', '=', 'giadatduan.manhomduan')
                ->select('giadatduan.*', 'dmgiadatduan.tennhomduan');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('giadatduan.thoidiem',$inputs['nam']);
            if($inputs['mahuyen'] != 'all')
                $model = $model->where('giadatduan.mahuyen',$inputs['mahuyen']);
//            if($inputs['maxa'] != 'all')
//                $model = $model->where('giadatduan.maxa',$inputs['maxa']);
            if($inputs['manhomduan'] != 'all')
                $model = $model->where('giadatduan.manhomduan',$inputs['manhomduan']);
            if($inputs['tenduan'] != '')
                $model = $model->where('giadatduan.tenduan','like', '%'.$inputs['tenduan'].'%');
            $model = $model->get();
            if($inputs['manhomduan'] != 'all')
                $modeldm = DmGiaDatDuAn::where('manhomduan',$inputs['manhomduan'])
                    ->get();
            else
                $modeldm = DmGiaDatDuAn::all();
            if($inputs['mahuyen'] != 'all') {
                $modeldb = DiaBanHd::where('district',$inputs['mahuyen'])
                    ->where('level','H')
                    ->first();
//                dd($modeldb);
//                dd($model);
//                dd($modeldm);
                foreach($model as $tt){
                    $tenxa = DiaBanHd::where('level','X')
                        ->where('town',$tt->maxa)
                        ->first();
                    $tt->tenxa = $tenxa->diaban;
                }

                return view('manage.dinhgia.giadatduan.reports.phuluc08a')
                    ->with('model', $model)
                    ->with('modeldm',$modeldm)
                    ->with('modeldb',$modeldb)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Thông tin gia đất cụ thể của dự án ');
            }else{
                $modeldb = DiaBanHd::where('level','H')
                    ->get();
                foreach($model as $tt){
                    $tenxa = DiaBanHd::where('level','X')
                        ->where('town',$tt->maxa)
                        ->first();
                    $tt->tenxa = $tenxa->diaban;
                }
                return view('manage.dinhgia.giadatduan.reports.phuluc08')
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
                $modeldm = DmGiaDatDuAn::all();
                return view('manage.dinhgia.giadatduan.reports.index')
                    ->with('modeldb', $modeldb)
                    ->with('modeldm',$modeldm)
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
                return redirect('thongtingiadatduan/print?&mahuyen='.$inputs['mahuyen'].'&nam='.$inputs['nam'].'&manhomduan='.$inputs['manhomduan']);
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
                return view('manage.dinhgia.giadatduan.search')
                    ->with('model',$model)
                    ->with('inputs',$inputs)
                    ->with('diabans',$diabans)
                    ->with('pageTitle','Tìm kiếm thông tin gia đất cụ thể của dự án');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $districts =DiaBanHd::where('level','H')
                ->get();
            $modeldm = DmGiaDatDuAn::all();
            return view('manage.dinhgia.giadatduan.importexcel')
                ->with('districts',$districts)
                ->with('modeldm',$modeldm)
                ->with('pageTitle','Nhận dữ liệu giá đất cụ thể của dự án từ file Excel');

        } else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $filename = $inputs['district'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });

            for ($i = $inputs['tudong']; $i <= $inputs['dendong']; $i++) {

                $modelctnew = new GiaDatDuAn();
                $modelctnew->nam = $inputs['nam'];
                $modelctnew->district = $inputs['district'];
                $modelctnew->manhomduan = $inputs['manhomduan'];
                $modelctnew->tenduan = $data[$i][$inputs['tenduan']];
                $modelctnew->thoidiem = getDateToDb($data[$i][$inputs['thoidiem']]);
                $modelctnew->dientich = $data[$i][$inputs['dientich']];
                $modelctnew->loaidat = $data[$i][$inputs['loaidat']];
                $modelctnew->tenduong = $data[$i][$inputs['tenduong']];
                $modelctnew->loaiduong = $data[$i][$inputs['loaiduong']];
                $modelctnew->vitri = $data[$i][$inputs['vitri']];
                $modelctnew->qddato = $data[$i][$inputs['qddato']];
                $modelctnew->qddatsxkd = $data[$i][$inputs['qddatsxkd']];
                $modelctnew->qddatnnkdc = $data[$i][$inputs['qddatnnkdc']];
                $modelctnew->qddatnnnkdc = $data[$i][$inputs['qddatnnnkdc']];
                $modelctnew->tddato = $data[$i][$inputs['tddato']];
                $modelctnew->tddatsxkd = $data[$i][$inputs['tddatsxkd']];
                $modelctnew->tddatnnkdc = $data[$i][$inputs['tddatnnkdc']];
                $modelctnew->tddatnnnkdc = $data[$i][$inputs['tddatnnnkdc']];
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('thongtingiadatduan?&nam='.$inputs['nam'].'&district='.$inputs['district'].'&manhomduan='.$inputs['manhomduan']);
        }else
            return view('errors.notlogin');
    }
}
