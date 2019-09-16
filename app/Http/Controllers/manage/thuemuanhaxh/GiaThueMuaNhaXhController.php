<?php

namespace App\Http\Controllers\manage\thuemuanhaxh;

use App\DiaBanHd;
use App\Model\manage\dinhgia\GiaThueMuaNhaXh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaThueMuaNhaXhController extends Controller
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
            if(session('admin')->level == 'T' || session('admin')->level == 'H')
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
            else
                $inputs['district'] = session('admin')->districts;

            $model  = GiaThueMuaNhaXh::join('diabanhd','diabanhd.district','=','giathuemuanhaxh.district')
                ->where('diabanhd.level','H')
                ->select('giathuemuanhaxh.*','diabanhd.diaban');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('giathuemuanhaxh.thoidiemht',$inputs['nam']);
            if($inputs['district'] !='all')
                $model = $model->where('giathuemuanhaxh.district',$inputs['district']);
            if($inputs['tenduan'] != '')
                $model = $model->where('giathuemuanhaxh.tenduan','like', '%'.$inputs['tenduan'].'%');
            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.giathuemuanhaxh.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('districts',$districts)
                ->with('pageTitle','Thông tin giá thuê, thuê mua nhà ở xã hội');

        } else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $districts = DiaBanHd::where('level','H')
                ->get();
            return view('manage.dinhgia.giathuemuanhaxh.importexcel')
                ->with('districts',$districts)
                ->with('pageTitle','Nhận dữ liệu giá thuê - thuê mua nhà ở xã hội từ file Excel');

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

                $modelctnew = new GiaThueMuaNhaXh();
                $modelctnew->district = $inputs['district'];
                $modelctnew->thoidiemkc = getDateToDb($data[$i][$inputs['thoidiemkc']]);
                $modelctnew->thoidiemht = getDateToDb($data[$i][$inputs['thoidiemht']]);
                $modelctnew->tenduan = $data[$i][$inputs['tenduan']];
                $modelctnew->dongiathue = (isset($data[$i][$inputs['dongiathue']]) && $data[$i][$inputs['dongiathue']] != '' ? chkDbl($data[$i][$inputs['dongiathue']]) : 0);
                $modelctnew->dongiathuemua = (isset($data[$i][$inputs['dongiathuemua']]) && $data[$i][$inputs['dongiathuemua']] != '' ? chkDbl($data[$i][$inputs['dongiathuemua']]) : 0);
                $modelctnew->ttqd = $data[$i][$inputs['ttqd']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('thuemuanhaxahoi?&district='.$inputs['district']);
        }else
            return view('errors.notlogin');
    }

    public function multidelete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaThueMuaNhaXh::whereYear('thoidiem',$inputs['namdel']);
            if($inputs['districtdel'] != 'all')
                $model = $model->where('district',$inputs['districtdel']);

            $model = $model->delete();

            return redirect('thuemuanhaxahoi?&nam='.$inputs['namdel'].'&district='.$inputs['districtdel']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['destroy_id'];
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $model->delete();
            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)) :'all';
            return redirect('thuemuanhaxahoi?&nam='.$nam.'&district='.$model->district);
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
        $model = GiaThueMuaNhaXh::findOrFail($id);
        $model->datekc = getDayVn($model->thoidiemkc);
        $model->dateht = getDayVn($model->thoidiemht);
        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaThueMuaNhaXh::where('id',$inputs['edit_id'])->first();
            $model->district = $inputs['edit_district'];
            $model->thoidiemkc= getDateToDb($inputs['edit_thoidiemkc']);
            $model->thoidiemht = getDateToDb($inputs['edit_thoidiemht']);
            $model->tenduan = $inputs['edit_tenduan'];
            $model->dongiathue = chkDbl($inputs['edit_dongiathue']);
            $model->dongiathuemua = chkDbl($inputs['edit_dongiathuemua']);
            $model->ttqd = $inputs['edit_ttqd'];
            $model->ghichu = $inputs['edit_ghichu'];
            $model->save();
            $nam = $inputs['edit_thoidiemht'] != '' ? date('Y',strtotime(getDateToDb($inputs['edit_thoidiemht']))) :'all';

            return redirect('thuemuanhaxahoi?&nam='.$nam.'&district='.$inputs['edit_district']);
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = new GiaThueMuaNhaXh();
            $model->district = $inputs['add_district'];
            $model->thoidiemkc = getDateToDb($inputs['add_thoidiemkc']);
            $model->thoidiemht = getDateToDb($inputs['add_thoidiemht']);
            $model->tenduan = $inputs['add_tenduan'];
            $model->dongiathue = chkDbl($inputs['add_dongiathue']);
            $model->dongiathuemua = chkDbl($inputs['add_dongiathuemua']);
            $model->ttqd = $inputs['add_ttqd'];
            $model->ghichu = $inputs['add_ghichu'];
            $model->save();
            $nam = $inputs['add_thoidiemht'] != '' ? date('Y',strtotime(getDateToDb($inputs['add_thoidiemht']))) :'all';

            return redirect('thuemuanhaxahoi?&nam='.$nam.'&district='.$inputs['add_district']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)): 'all';
            return redirect('thuemuanhaxahoi?&nam='.$nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $model->trangthai = 'HCB';
            $model->save();
            $nam = $model->thoidiem != '' ? date('Y',strtotime($model->thoidiem)): 'all';
            return redirect('thuemuanhaxahoi?&nam='.$nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    function checkmulti(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaThueMuaNhaXh::whereYear('thoidiem',$inputs['namcheck']);
            if($inputs['districtcheck'] != 'all')
                $model = $model->where('district',$inputs['districtcheck']);

            $model = $model->update(['trangthai' => $inputs['trangthaicheck']]);

            return redirect('thuemuanhaxahoi?&nam='.$inputs['namcheck'].'&district='.$inputs['districtcheck']);
        }else
            return view('errors.notlogin');
    }

    function BcGiaThueMuaNhaXh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
            $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
            $districts = DiaBanHd::where('level','H')
                ->get();
            if(session('admin')->level == 'T' || session('admin')->level == 'H')
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
            else
                $inputs['district'] = session('admin')->districts;

            $model  = GiaThueMuaNhaXh::join('diabanhd','diabanhd.district','=','giathuemuanhaxh.district')
                ->where('diabanhd.level','H')
                ->select('giathuemuanhaxh.*','diabanhd.diaban');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('giathuemuanhaxh.thoidiemht',$inputs['nam']);
            if($inputs['district'] !='all') {
                $model = $model->where('giathuemuanhaxh.district', $inputs['district']);
                $districts = DiaBanHd::where('level','H')
                    ->where('district',$inputs['district'])
                    ->first();
            }
            if($inputs['tenduan'] != '')
                $model = $model->where('giathuemuanhaxh.tenduan','like', '%'.$inputs['tenduan'].'%');
            $model = $model->get();
            return view('manage.dinhgia.giathuemuanhaxh.reports.BcGiaThueMuaNhaXh')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('districts',$districts)
                ->with('pageTitle','Báo cáo giá thuê - thuê mua nhà ở xã hội');


        } else
            return view('errors.notlogin');
    }
}
