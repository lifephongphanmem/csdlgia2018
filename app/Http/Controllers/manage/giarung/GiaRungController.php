<?php

namespace App\Http\Controllers\manage\giarung;

use App\DiaBanHd;
use App\District;
use App\DmGiaRung;
use App\Model\manage\dinhgia\GiaRung;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaRungController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
            $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $districts = DiaBanHd::where('level','H')
                ->get();
            $loairungs = DmGiaRung::all();
            if(session('admin')->level == 'T' || session('admin')->level == 'H')
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
            else
                $inputs['district'] = session('admin')->district;

            $model  = GiaRung::join('diabanhd','diabanhd.district','=','giarung.district')
                ->where('diabanhd.level','H')
                ->join('dmgiarung','dmgiarung.manhom','=','giarung.manhom')
                ->select('giarung.*','diabanhd.diaban','dmgiarung.tennhom');

            if($inputs['nam'] != 'all')
                $model = $model->whereYear('giarung.thoidiem',$inputs['nam']);

            if($inputs['district'] !='all')
                $model = $model->where('giarung.district',$inputs['district']);

            if($inputs['manhom'] != 'all')
                $model = $model->where('giarung.manhom',$inputs['manhom']);

            if($inputs['tenduan'] != '')
                $model = $model->where('giarung.tenduan','like', '%'.$inputs['tenduan'].'%');

            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.giarung.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('districts',$districts)
                ->with('loairungs',$loairungs)
                ->with('pageTitle','Thông tin giá thuê môi trường rừng');

        } else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $districts =DiaBanHd::where('level','H')
                ->get();
            $loairungs = DmGiaRung::all();
            return view('manage.dinhgia.giarung.importexcel')
                ->with('districts',$districts)
                ->with('loairungs',$loairungs)
                ->with('pageTitle','Nhận dữ liệu giá thuê môi trường rừng file Excel');

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

                $modelctnew = new Giarung();
                $modelctnew->district = $inputs['district'];
                $modelctnew->manhom = $inputs['manhom'];
                $modelctnew->thoidiem = getDateToDb($data[$i][$inputs['khuvuc']]);
                $modelctnew->tenduan = $data[$i][$inputs['tenduan']];
                $modelctnew->dongia = (isset($data[$i][$inputs['dongia']]) && $data[$i][$inputs['dongia']] != '' ? chkDbl($data[$i][$inputs['dongia']]) : 0);
                $modelctnew->ttqd = $data[$i][$inputs['ttqd']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->trangthai = 'CHT';
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('giarung?&district='.$inputs['district'].'&manhom='.$inputs['manhom']);
        }else
            return view('errors.notlogin');
    }

    public function multidelete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaRung::whereYear('thoidiem',$inputs['namdel']);
            if($inputs['districtdel'] != 'all')
                $model = $model->where('district',$inputs['districtdel'])
                    ->where('trangthai','CHT');

            $model = $model->delete();

            return redirect('giarung?&nam='.$inputs['namdel'].'&district='.$inputs['districtdel']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['destroy_id'];
            $model = GiaRung::findOrFail($id);
            $model->delete();
            $nam = date('Y',strtotime($model->thoidiem));
            return redirect('giarung?&nam='.$nam.'&district='.$model->district.'&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function edit(Request $request){
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
        $model = GiaRung::findOrFail($id);
        $model->date = getDayVn($model->thoidiem);
        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaRung::where('id',$inputs['edit_id'])->first();
            $model->district = $inputs['edit_district'];
            $model->thoidiem = getDateToDb($inputs['edit_thoidiem']);
            $model->manhom = $inputs['edit_manhom'];
            $model->tenduan = $inputs['edit_tenduan'];
            $model->dongia = chkDbl($inputs['edit_dongia']);
            $model->ttqd = $inputs['edit_ttqd'];
            $model->ghichu = $inputs['edit_ghichu'];
            $model->save();


            $nam = date('Y',strtotime(getDateToDb($inputs['edit_thoidiem'])));

            return redirect('giarung?&nam='.$nam.'&district='.$inputs['edit_district'].'&manhom='.$inputs['edit_manhom']);
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = new GiaRung();
            $model->district = $inputs['add_district'];
            $model->thoidiem = getDateToDb($inputs['add_thoidiem']);
            $model->manhom = $inputs['add_manhom'];
            $model->tenduan = $inputs['add_tenduan'];
            $model->dongia = chkDbl($inputs['add_dongia']);
            $model->ttqd = $inputs['add_ttqd'];
            $model->ghichu = $inputs['add_ghichu'];
            $model->trangthai = 'CHT';
            $model->save();
            $nam = date('Y',strtotime(getDateToDb($inputs['add_thoidiem'])));

            return redirect('giarung?&nam='.$nam.'&district='.$inputs['add_district'].'&manhom='.$inputs['add_manhom']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            $nam = date('Y',strtotime($model->thoidiem));
            return redirect('giarung?&nam='.$nam.'&district='.$model->district.'&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            $nam = date('Y',strtotime($model->thoidiem));
            return redirect('giarung?&nam='.$nam.'&district='.$model->district.'&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['hoanthanh_id'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            $nam = date('Y',strtotime($model->thoidiem));
            return redirect('giarung?&nam='.$nam.'&district='.$model->district.'&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huyhoanthanh_id'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            $nam = date('Y',strtotime($model->thoidiem));
            return redirect('giarung?&nam='.$nam.'&district='.$model->district.'&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    function checkmulti(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaRung::whereYear('thoidiem',$inputs['namcheck']);
            if($inputs['districtcheck'] != 'all')
                $model = $model->where('district',$inputs['districtcheck'])
                    ->whereIn('trangthai',['HT','CB']);

            $model = $model->update(['trangthai' => $inputs['trangthaicheck']]);

            return redirect('giarung?&nam='.$inputs['namcheck'].'&district='.$inputs['districtcheck']);
        }else
            return view('errors.notlogin');
    }

    function BcGiaRung(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
            $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
            $districts = DiaBanHd::where('level','H')
                ->get();
            $loairungs = DmGiaRung::all();
            if(session('admin')->level == 'T' || session('admin')->level == 'H')
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
            else
                $inputs['district'] = session('admin')->district;

            $model  = GiaRung::join('diabanhd','diabanhd.district','=','giarung.district')
                ->where('diabanhd.level','H')
                ->join('dmgiarung','dmgiarung.manhom','=','giarung.manhom')
                ->select('giarung.*','diabanhd.diaban','dmgiarung.tennhom');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('giarung.thoidiem',$inputs['nam']);
            if($inputs['district'] !='all') {
                $model = $model->where('giarung.district', $inputs['district']);
                $districts = DiaBanHd::where('level','H')
                    ->where('district',$inputs['district'])
                    ->first();
            }
            if($inputs['manhom'] != 'all') {
                $model = $model->where('giarung.manhom', $inputs['manhom']);
                $loairungs = DmGiaRung::where('manhom',$inputs['manhom'])
                    ->first();
            }
            if($inputs['tenduan'] != '')
                $model = $model->where('giarung.tenduan','like', '%'.$inputs['tenduan'].'%');
            $model = $model->get();

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
            return view('manage.dinhgia.giarung.reports.BcGiaRung')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('districts',$districts)
                ->with('loairungs',$loairungs)
                ->with('pageTitle','Báo cáo giá thuê môi trường rừng');


        } else
            return view('errors.notlogin');
    }

}
