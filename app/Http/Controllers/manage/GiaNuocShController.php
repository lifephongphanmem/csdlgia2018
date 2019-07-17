<?php

namespace App\Http\Controllers\manage;

use App\Model\manage\dinhgia\GiaNuocSh;
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
            $inputs['diaban'] = isset($inputs['diaban']) ? $inputs['diaban'] : 'All';
            $inputs['doituong'] = isset($inputs['doituong']) ? $inputs['doituong'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $model = new GiaNuocSh();
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('ngayapdung',$inputs['nam']);
            if($inputs['diaban'] != 'All')
                $model = $model->where('diaban',$inputs['diaban']);
            if($inputs['doituong'] != '')
                $model = $model->where('doituong','like', '%'.$inputs['doituong'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('mota','like', '%'.$inputs['mota'].'%');
            $model = $model->paginate($inputs['paginate']);

            return view('manage.dinhgia.gianuocsh.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ giá nước sạch sinh hoạt');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = new GiaNuocSh();
            $model->ngayapdung = getDateToDb($inputs['add_ngayapdung']);
            $model->diaban = $inputs['add_diaban'];
            $model->doituong = $inputs['add_doituong'];
            $model->mota = $inputs['add_mota'];
            $model->thanhtien = chkDbl($inputs['add_thanhtien']);
            $model->dvt = $inputs['add_dvt'];
            $model->save();
            $nam = date('Y',strtotime(getDateToDb($inputs['add_ngayapdung'])));
            return redirect('gianuocsachsinhhoat?&nam='.$nam.'&diaban='.$inputs['add_diaban']);

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
        $model = GiaNuocSh::findOrFail($id);
        $model->date = getDayVn($model->ngayapdung);
        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['edit_ngayapdung']);
            $inputs['diaban'] = $inputs['edit_diaban'];
            $inputs['doituong'] = $inputs['edit_doituong'];
            $inputs['mota'] = $inputs['edit_mota'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $inputs['thanhtien'] = chkDbl($inputs['edit_thanhtien']);

            $model = GiaNuocSh::where('id',$inputs['edit_id'])->first();
            $model->update($inputs);
            $nam = date('Y',strtotime(getDateToDb($inputs['edit_ngayapdung'])));
            return redirect('gianuocsachsinhhoat?&nam='.$nam.'&diaban='.$inputs['edit_diaban']);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['destroy_id'];
            $model = GiaNuocSh::findOrFail($id);
            $model->delete();
            return redirect('gianuocsachsinhhoat?&nam='.$model->nam.'&diaban='.$model->diaban);

        }else
            return view('errors.notlogin');
    }

    public function multidelete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaNuocSh::whereYear('ngayapdung',$inputs['namdel']);
            if($inputs['diabandel'] != 'All')
                $model = $model->where('diaban',$inputs['diabandel']);

            $model = $model->delete();

            return redirect('gianuocsachsinhhoat?&nam='.$inputs['namdel'].'&diaban='.$inputs['diabandel']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            $nam = date('Y',strtotime($model->ngayapdung));
            return redirect('gianuocsachsinhhoat?&nam='.$nam.'&diaban='.$model->diaban);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'HCB';
            $model->save();

            $nam = date('Y',strtotime($model->ngayapdung));
            return redirect('gianuocsachsinhhoat?&nam='.$nam.'&diaban='.$model->diaban);
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
                ->with('pageTitle','Nhận dữ liệu giá dịch vụ giáo dục đào tạo từ file Excel');

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
                $modelctnew->ngayapdung = getDateToDb($inputs['nam']);
                $modelctnew->diaban = $inputs['diaban'];
                $modelctnew->doituong = $data[$i][$inputs['doituong']];
                $modelctnew->mota = $data[$i][$inputs['mota']];
                $modelctnew->thanhtien = (isset($data[$i][$inputs['thanhtien']]) && $data[$i][$inputs['thanhtien']] != '' ? chkDbl($data[$i][$inputs['thanhtien']]) : 0);
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->username = session('admin')->name.'('.session('admin')->username.')' ;
                $modelctnew->thaotac = 'Import';
                $modelctnew->save();
            }
            File::Delete($path);
            $nam = date('Y',strtotime(getDateToDb($inputs['ngayapdung'])));
            return redirect('gianuocsachsinhhoat?&nam='.$nam.'&diaban='.$inputs['diaban']);
        }else
            return view('errors.notlogin');
    }
}
