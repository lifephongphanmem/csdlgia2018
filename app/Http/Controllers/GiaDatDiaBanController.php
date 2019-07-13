<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\GiaDatDiaBan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaDatDiaBanController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['loaidat'] = isset($inputs['loaidat']) ? $inputs['loaidat'] : 'All';
            $inputs['khuvuc'] = isset($inputs['khuvuc']) ? $inputs['khuvuc'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 20;
            $diabans = DiaBanHd::where('level','H')
                ->get();
            if(session('admin')->level == 'T' || session('admin')->level == 'H')
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'All';
            else
                $inputs['district'] = session('admin')->districts;

            $model  = new GiaDatDiaBan();
            if($inputs['district'] !='All')
                $model = $model->where('district',$inputs['district']);
            if($inputs['loaidat'] != 'All')
                $model = $model->where('loaidat',$inputs['loaidat']);
            if($inputs['khuvuc'] != '')
                $model = $model->where('loaidat','like', '%'.$inputs['loaidat'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('mota','like', '%'.$inputs['mota'].'%');
            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.giadatdiaban.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('diabans',$diabans)
                ->with('pageTitle','Thông tin gia đất theo địa bàn');

        } else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $districts =DiaBanHd::where('level','H')
                ->get();
            return view('manage.dinhgia.giadatdiaban.importexcel')
                ->with('districts',$districts)
                ->with('pageTitle','Nhận dữ liệu giá đất trên địa bàn file Excel');

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

            for ($i = $inputs['tudong']; $i < ($inputs['tudong'] + $inputs['sodong']); $i++) {
                if (!isset($data[$i][$inputs['khuvuc']]) || $data[$i][$inputs['khuvuc']] == '') {
                    continue;//Tên cán bộ rỗng => thoát
                }
                $modelctnew = new GiaDatDiaBan();
                $modelctnew->district = $inputs['district'];
                $modelctnew->loaidat = $inputs['loaidat'];
                $modelctnew->khuvuc = $data[$i][$inputs['khuvuc']];
                $modelctnew->mota = $data[$i][$inputs['mota']];
                $modelctnew->mdsd = $data[$i][$inputs['mdsd']];
                $modelctnew->giavt1 = (isset($data[$i][$inputs['giavt1']]) && $data[$i][$inputs['giavt1']] != '' ? chkDbl($data[$i][$inputs['giavt1']]) : 0);
                $modelctnew->giavt2 = (isset($data[$i][$inputs['giavt2']]) && $data[$i][$inputs['giavt2']] != '' ? chkDbl($data[$i][$inputs['giavt2']]) : 0);
                $modelctnew->giavt3 = (isset($data[$i][$inputs['giavt3']]) && $data[$i][$inputs['giavt3']] != '' ? chkDbl($data[$i][$inputs['giavt3']]) : 0);
                $modelctnew->giavt4 = (isset($data[$i][$inputs['giavt4']]) && $data[$i][$inputs['giavt4']] != '' ? chkDbl($data[$i][$inputs['giavt4']]) : 0);
                $modelctnew->giavt5 = (isset($data[$i][$inputs['giavt5']]) && $data[$i][$inputs['giavt5']] != '' ? chkDbl($data[$i][$inputs['giavt5']]) : 0);
                $modelctnew->username = session('admin')->name.'('.session('admin')->username.')' ;
                $modelctnew->thaotac = 'Import';
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('giadatdiaban?&district='.$inputs['district'].'&loaidat='.$inputs['loaidat']);
        }else
            return view('errors.notlogin');
    }
}
