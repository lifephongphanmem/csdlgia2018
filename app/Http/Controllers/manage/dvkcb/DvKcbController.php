<?php

namespace App\Http\Controllers\manage\dvkcb;

use App\DiaBanHd;
use App\District;
use App\Model\manage\dinhgia\DvKcb;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class DvKcbController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
            $inputs['tenbv'] = isset($inputs['tenbv']) ? $inputs['tenbv'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $districts = DiaBanHd::where('level','H')
                ->get();
            $model  = DvKcb::join('diabanhd','diabanhd.district','=','dvkcb.district')
                ->where('diabanhd.level','H')
                ->select('dvkcb.*','diabanhd.diaban');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('dvkcb.thoidiem',$inputs['nam']);
            if($inputs['district'] !='all')
                $model = $model->where('dvkcb.district',$inputs['district']);
            if($inputs['tenbv'] != '')
                $model = $model->where('dvkcb.tenbv','like', '%'.$inputs['tenbv'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('dvkcb.mota','like', '%'.$inputs['mota'].'%');
            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.dvkcb.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('districts',$districts)
                ->with('pageTitle','Thông tin giá dịch vụ khám chữa bệnh');

        } else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $districts = DiaBanHd::where('level','H')
                ->get();
            return view('manage.dinhgia.dvkcb.importexcel')
                ->with('districts',$districts)
                ->with('pageTitle','Nhận dữ liệu giá dịch vụ khám chữa bệnh từ file Excel');

        } else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $inputs['tudong'] = getMoneyToDb($inputs['tudong']);
            $inputs['dendong'] = getMoneyToDb($inputs['dendong']);
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

                $modelctnew = new DvKcb();
                $modelctnew->district = $inputs['district'];
                $modelctnew->thoidiem = getDateToDb($data[$i][$inputs['thoidiem']]);
                $modelctnew->tenbv = $data[$i][$inputs['tenbv']];
                $modelctnew->mota = $data[$i][$inputs['mota']];
                $modelctnew->dongia = (isset($data[$i][$inputs['dongia']]) && $data[$i][$inputs['dongia']] != '' ? chkDbl($data[$i][$inputs['dongia']]) : 0);
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->ttqd = $data[$i][$inputs['ttqd']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->trangthai = 'CHT';
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('dichvukcb?&district='.$inputs['district']);
        }else
            return view('errors.notlogin');
    }

    public function multidelete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = DvKcb::whereYear('thoidiem',$inputs['namdel']);
            if($inputs['districtdel'] != 'all')
                $model = $model->where('district',$inputs['districtdel'])
                    ->where('trangthai','CHT');

            $model = $model->delete();

            return redirect('dichvukcb?&nam='.$inputs['namdel'].'&district='.$inputs['districtdel']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['destroy_id'];
            $model = DvKcb::findOrFail($id);
            $model->delete();
            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)) :'all';
            return redirect('dichvukcb?&nam='.$nam.'&district='.$model->district);
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
        $model = DvKcb::findOrFail($id);
        $model->date = getDayVn($model->thoidiem);
        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = DvKcb::where('id',$inputs['edit_id'])->first();
            $model->district = $inputs['edit_district'];
            $model->thoidiem = getDateToDb($inputs['edit_thoidiem']);
            $model->tenbv = $inputs['edit_tenbv'];
            $model->dongia = chkDbl($inputs['edit_dongia']);
            $model->mota = $inputs['edit_mota'];
            $model->dvt = $inputs['edit_dvt'];
            $model->ttqd = $inputs['edit_ttqd'];
            $model->ghichu = $inputs['edit_ghichu'];
            $model->save();
            $nam = $inputs['edit_thoidiem'] != '' ? date('Y',strtotime(getDateToDb($inputs['edit_thoidiem']))) :'all';

            return redirect('dichvukcb?&nam='.$nam.'&district='.$inputs['edit_district']);
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = new DvKcb();
            $model->district = $inputs['add_district'];
            $model->thoidiem = getDateToDb($inputs['add_thoidiem']);
            $model->tenbv = $inputs['add_tenbv'];
            $model->dongia = chkDbl($inputs['add_dongia']);
            $model->mota = $inputs['add_mota'];
            $model->dvt = $inputs['add_dvt'];
            $model->ttqd = $inputs['add_ttqd'];
            $model->ghichu = $inputs['add_ghichu'];
            $model->trangthai = 'CHT';
            $model->save();
            $nam = $inputs['add_thoidiem'] != '' ? date('Y',strtotime(getDateToDb($inputs['add_thoidiem']))) :'all';
            return redirect('dichvukcb?&nam='.$nam.'&district='.$inputs['add_district']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = DvKcb::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)): 'all';
            return redirect('dichvukcb?&nam='.$nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = DvKcb::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)): 'all';
            return redirect('dichvukcb?&nam='.$nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    function checkmulti(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = DvKcb::whereYear('thoidiem',$inputs['namcheck']);
            if($inputs['districtcheck'] != 'all')
                $model = $model->where('district',$inputs['districtcheck'])
                    ->whereIn('trangthai',['HT','CB']);

            $model = $model->update(['trangthai' => $inputs['trangthaicheck']]);

            return redirect('dichvukcb?&nam='.$inputs['namcheck'].'&district='.$inputs['districtcheck']);
        }else
            return view('errors.notlogin');
    }

    function BcGiaDvKcb(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
            $inputs['tenbv'] = isset($inputs['tenbv']) ? $inputs['tenbv'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $districts = DiaBanHd::where('level','H')
                ->get();
            $model  = DvKcb::join('diabanhd','diabanhd.district','=','dvkcb.district')
                ->where('diabanhd.level','H')
                ->select('dvkcb.*','diabanhd.diaban');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('dvkcb.thoidiem',$inputs['nam']);
            if($inputs['district'] !='all') {
                $model = $model->where('dvkcb.district', $inputs['district']);
                $districts = DiaBanHd::where('level','H')
                    ->where('district',$inputs['district'])
                    ->first();
            }
            if($inputs['tenbv'] != '')
                $model = $model->where('dvkcb.tenbv','like', '%'.$inputs['tenbv'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('dvkcb.mota','like', '%'.$inputs['mota'].'%');
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
            return view('manage.dinhgia.dvkcb.reports.BcGiaDvKcb')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('districts',$districts)
                ->with('pageTitle','Báo cáo giá dịch vụ khám chữa bệnh');

        } else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = DvKcb::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)): 'all';
            return redirect('dichvukcb?&nam='.$nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = DvKcb::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)): 'all';
            return redirect('dichvukcb?&nam='.$nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }
}
