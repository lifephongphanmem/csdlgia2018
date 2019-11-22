<?php

namespace App\Http\Controllers\manage\thuetn;

use App\Model\manage\dinhgia\thuetn\DmThueTn;
use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class DmThueTnController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();

            $model = DmThueTn::where('manhom',$inputs['manhom'])
                ->get();
            $nhom = NhomThueTn::where('manhom',$inputs['manhom'])->first();
            return view('manage.dinhgia.thuetn.danhmuc.chitiet.index')
                ->with('model',$model)
                ->with('nhom',$nhom)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin chi tiết mặt hàng thuế tài nguyên');

        }else
            return view('errors.notlogin');

    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new DmThueTn();
            $model->create($inputs);
            return redirect('dmthuetn?&manhom='.$inputs['manhom']);
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
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
        $model = DmThueTn::findOrFail($id);
        $model->date = getDayVn($model->ngayapdung);
        die($model);
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $inputs['ten'] = $inputs['edit_ten'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $inputs['cap1'] = $inputs['edit_cap1'];
            $inputs['cap2'] = $inputs['edit_cap2'];
            $inputs['cap3'] = $inputs['edit_cap3'];
            $inputs['cap4'] = $inputs['edit_cap4'];
            $inputs['cap5'] = $inputs['edit_cap5'];
            $inputs['level'] = $inputs['edit_level'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmThueTn::findOrFail($id);
            $model->update($inputs);
            return redirect('dmthuetn?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = DmThueTn::findOrFail($id);
            $manhom = $model->manhom;
            $model->delete();
            return redirect('dmthuetn?&manhom='.$manhom);
        }else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
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

                $modelctnew = new DmThueTn();
                $modelctnew->manhom = $inputs['imex_manhom'];
                $modelctnew->level = $data[$i][$inputs['imex_level']];
                $modelctnew->ten = $data[$i][$inputs['imex_ten']];
                $modelctnew->dvt = $data[$i][$inputs['imex_dvt']];
                $modelctnew->cap1 = $data[$i][$inputs['imex_cap1']];
                $modelctnew->cap2 = $data[$i][$inputs['imex_cap2']];
                $modelctnew->cap3 = $data[$i][$inputs['imex_cap3']];
                $modelctnew->cap4 = $data[$i][$inputs['imex_cap4']];
                $modelctnew->cap5 = $data[$i][$inputs['imex_cap5']];
                $modelctnew->theodoi = 'TD';
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('dmthuetn?&manhom='.$inputs['imex_manhom']);
        }else
            return view('errors.notlogin');
    }
}
