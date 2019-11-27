<?php

namespace App\Http\Controllers\manage\gianuocsachsh;

use App\District;
use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocSachShDm;
use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocSh;
use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocShCt;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaNuocShController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $model = new GiaNuocSh();
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('ngayapdung',$inputs['nam']);
            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.gianuocsh.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ giá nước sạch sinh hoạt');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $modeldel = GiaNuocShCt::where('trangthai','CXD')->delete();
            $inputs['mahs'] = getdate()[0];
            $dms = GiaNuocSachShDm::all();
            foreach($dms as $dm){
                $modeladd = new GiaNuocShCt();
                $modeladd->doituongsd = $dm->doituongsd;
//                $modeladd->madoituong = $dm->madoituong;
                $modeladd->mahs = $inputs['mahs'];
                $modeladd->trangthai = 'CXD';
                $modeladd->save();
            }
            $modelct = GiaNuocShCt::where('mahs',$inputs['mahs'])
                ->get();
            return view('manage.dinhgia.gianuocsh.create')
                ->with('inputs', $inputs)
                ->with('modeldel',$modeldel)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Thêm mới giá nước sinh hoạt');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = new GiaNuocSh();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['trangthai'] = 'CHT';
            $model->create($inputs);
            $modelct = GiaNuocShCt::where('mahs',$inputs['mahs'])
                ->update(['trangthai' => 'XD']);
            $nam = date('Y',strtotime(getDateToDb($inputs['ngayapdung'])));
            return redirect('gianuocsachsinhhoat?&nam='.$nam);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')) {
            $model = GiaNuocSh::find($id);
            $modelct = GiaNuocShCt::where('mahs',$model->mahs)
                ->get();
            return view('manage.dinhgia.gianuocsh.edit')
                ->with('model', $model)
                ->with('modelct', $modelct)
                ->with('pageTitle', 'Chỉnh sửa giá nước sinh hoạt');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaNuocSh::findOrFail($id);
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model->update($inputs);
            $nam = date('Y',strtotime(getDateToDb($inputs['ngayapdung'])));
            return redirect('gianuocsachsinhhoat?&nam='.$nam);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['destroy_id'];
            $model = GiaNuocSh::findOrFail($id);
            $modelct = GiaNuocShCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('gianuocsachsinhhoat');

        }else
            return view('errors.notlogin');
    }


    public function multidelete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaNuocSh::whereYear('ngayapdung',$inputs['namdel'])
                ->where('trangthai','CHT');
            if($inputs['diabandel'] != 'All')
                $model = $model->where('diaban',$inputs['diabandel']);

            $model = $model->delete();

            return redirect('gianuocsachsinhhoat?&nam='.$inputs['namdel'].'&diaban='.$inputs['diabandel']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['congbo_id'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('gianuocsachsinhhoat');
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['huycongbo_id'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('gianuocsachsinhhoat');
        }else
            return view('errors.notlogin');
    }

    function checkmulti(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaNuocSh::whereYear('ngayapdung',$inputs['namcheck']);
            if($inputs['diabancheck'] != 'All')
                $model = $model->where('diaban',$inputs['diabancheck']);

            $model = $model->update(['trangthai' => $inputs['trangthaicheck']]);

            return redirect('gianuocsachsinhhoat?&nam='.$inputs['namcheck'].'&diaban='.$inputs['diabancheck']);
        }else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            return view('manage.dinhgia.gianuocsh.importexcel')
                ->with('pageTitle','Nhận dữ liệu giá nước sinh hoạt từ file Excel');
        } else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $filename = getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });

            for ($i = $inputs['tudong']; $i <= $inputs['dendong']; $i++) {

                $modelctnew = new GiaNuocSh();
                $modelctnew->ngayapdung = getDateToDb($inputs['ngayapdung']);
                $modelctnew->diaban = $inputs['diaban'];
                $modelctnew->doituong = $data[$i][$inputs['doituong']];
                $modelctnew->mota = $data[$i][$inputs['mota']];
                $modelctnew->thanhtien = (isset($data[$i][$inputs['thanhtien']]) && $data[$i][$inputs['thanhtien']] != '' ? chkDbl($data[$i][$inputs['thanhtien']]) : 0);
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->username = session('admin')->name.'('.session('admin')->username.')' ;
                $modelctnew->thaotac = 'Import';
                $modelctnew->trangthai = 'CHT';
                $modelctnew->save();
            }
            File::Delete($path);
            $nam = date('Y',strtotime(getDateToDb($inputs['ngayapdung'])));
            return redirect('gianuocsachsinhhoat?&nam='.$nam.'&diaban='.$inputs['diaban']);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')) {
            $model = GiaNuocSh::findOrFail($id);
            $modelct = GiaNuocShCt::where('mahs',$model->mahs)
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
            return view('manage.dinhgia.gianuocsh.show')
                ->with('model', $model)
                ->with('modelct',$modelct)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Giá nước sinh hoạt chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            $nam = date('Y',strtotime($model->ngayapdung));
            return redirect('gianuocsachsinhhoat?&nam='.$nam);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            $nam = date('Y',strtotime($model->ngayapdung));
            return redirect('gianuocsachsinhhoat?&nam='.$nam);
        }else
            return view('errors.notlogin');
    }
}
