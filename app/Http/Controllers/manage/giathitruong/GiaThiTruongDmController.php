<?php

namespace App\Http\Controllers\manage\giathitruong;

use App\District;
use App\GiaDatDiaBanDm;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongDm;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongTt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaThiTruongDmController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $thongtu = GiaThiTruongTt::where('matt',$inputs['matt'])
                ->first();
            $districts = District::all();
            $model = GiaThiTruongDm::leftjoin('district','district.mahuyen','=','giathitruongdm.mahuyen')
                ->select('giathitruongdm.*','district.tendv')
                ->where('giathitruongdm.matt',$inputs['matt'])
                ->get();
            return view('manage.giathitruong.danhmuc.chitiet.index')
                ->with('model',$model)
                ->with('thongtu',$thongtu)
                ->with('districts',$districts)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Danh mục giá thị trường');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new GiaThiTruongDm();
            $model->create($inputs);
            return redirect('danhmucgiathitruong?&matt='.$inputs['matt']);
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
        $model = GiaThiTruongDm::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $model = GiaThiTruongDm::findOrFail($id);
            $model->manhom = $inputs['edit_manhom'];
            $model->tennhom = $inputs['edit_tennhom'];
            $model->mahh = $inputs['edit_mahh'];
            $model->tenhh = $inputs['edit_tenhh'];
            $model->dacdiemkt = $inputs['edit_dacdiemkt'];
            $model->dvt = $inputs['edit_dvt'];
            $model->mahuyen = $inputs['edit_mahuyen'];
            $model->theodoi = $inputs['edit_theodoi'];
            $model->save();
            return redirect('danhmucgiathitruong?&matt='.$inputs['edit_matt']);
        }else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $filename = $inputs['mahuyen'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });
            for ($i = $inputs['tudong']; $i <= $inputs['dendong']; $i++) {

                $modelctnew = new GiaThiTruongDm();
                $modelctnew->matt = $inputs['matt'];
                $modelctnew->mahuyen = $inputs['mahuyen'];
                $modelctnew->manhom = $inputs['manhom'];
                $modelctnew->tennhom = $inputs['tennhom'];
                $modelctnew->mahh = $data[$i][$inputs['mahh']];
                $modelctnew->tenhh = $data[$i][$inputs['tenhh']];
                $modelctnew->dacdiemkt = $data[$i][$inputs['dacdiemkt']];
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->theodoi = 'TD';
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('danhmucgiathitruong?&matt='.$inputs['matt']);
        }else
            return view('errors.notlogin');
    }
}
