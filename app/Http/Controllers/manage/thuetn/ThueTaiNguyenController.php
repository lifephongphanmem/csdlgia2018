<?php

namespace App\Http\Controllers\manage\thuetn;

use App\Model\manage\dinhgia\thuetn\DmThueTn;
use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class ThueTaiNguyenController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'All';
            $inputs['cap1'] = isset($inputs['cap1']) ? $inputs['cap1'] : '';
            $inputs['cap2'] = isset($inputs['cap2']) ? $inputs['cap2'] : '';
            $inputs['cap3'] = isset($inputs['cap3']) ? $inputs['cap3'] : '';
            $inputs['cap4'] = isset($inputs['cap4']) ? $inputs['cap4'] : '';
            $inputs['cap5'] = isset($inputs['cap5']) ? $inputs['cap5'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $nhoms = NhomThueTn::where('theodoi','TD')->get();
            $model = ThueTaiNguyen::join('nhomthuetn','nhomthuetn.manhom','=','thuetainguyen.manhom')
                ->select('thuetainguyen.*','nhomthuetn.tennhom');
            if($inputs['nam'] != 'all')
                $model = $model->where('thuetainguyen.nam',$inputs['nam']);
            if($inputs['manhom'] != 'All')
                $model = $model->where('thuetainguyen.manhom',$inputs['manhom']);
            if($inputs['cap1'] != '')
                $model = $model->where('thuetainguyen.cap1','like', '%'.$inputs['cap1'].'%');
            if($inputs['cap2'] != '')
                $model = $model->where('thuetainguyen.cap2','like', '%'.$inputs['cap2'].'%');
            if($inputs['cap3'] != '')
                $model = $model->where('thuetainguyen.cap3','like', '%'.$inputs['cap3'].'%');
            if($inputs['cap4'] != '')
                $model = $model->where('thuetainguyen.cap4','like', '%'.$inputs['cap4'].'%');
            if($inputs['cap5'] != '')
                $model = $model->where('thuetainguyen.cap5','like', '%'.$inputs['cap5'].'%');
            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.thuetn.index')
                ->with('model',$model)
                ->with('nhoms',$nhoms)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin giá thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = new ThueTaiNguyen();
            $model->matn = $inputs['add_matn'];
            $model->manhom = $inputs['add_manhom'];
            $model->cap1 = $inputs['add_cap1'];
            $model->cap2 = $inputs['add_cap2'];
            $model->cap3 = $inputs['add_cap3'];
            $model->cap4 = $inputs['add_cap4'];
            $model->cap5 = $inputs['add_cap5'];
            $model->dvt = $inputs['add_dvt'];
            $model->dongia = chkDbl($inputs['add_dongia']);
            $model->soqd = $inputs['add_soqd'];
            $model->nam = $inputs['add_nam'];
            $model->save();
            return redirect('thuetainguyen?&nam='.$inputs['add_nam'].'&manhom='.$inputs['add_manhom']);

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
        $model = ThueTaiNguyen::findOrFail($id);
        die($model);
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->matn = $inputs['edit_matn'];
            $model->manhom = $inputs['edit_manhom'];
            $model->cap1 = $inputs['edit_cap1'];
            $model->cap2 = $inputs['edit_cap2'];
            $model->cap3 = $inputs['edit_cap3'];
            $model->cap4 = $inputs['edit_cap4'];
            $model->cap5 = $inputs['edit_cap5'];
            $model->dvt = $inputs['edit_dvt'];
            $model->dongia = chkDbl($inputs['edit_dongia']);
            $model->soqd = $inputs['edit_soqd'];
            $model->nam = $inputs['edit_nam'];
            $model->save();
            return redirect('thuetainguyen?&nam='.$inputs['edit_nam'].'&manhom='.$inputs['edit_manhom']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['destroy_id'];
            $model = ThueTaiNguyen::findOrFail($id);
            $nam = $model->nam;
            $manhom = $model->manhom;
            $model->delete();
            return redirect('thuetainguyen?&nam='.$nam.'&manhom='.$manhom);
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = ThueTaiNguyen::where('nam',$inputs['namdel']);
            if($inputs['manhomdel'] != 'All')
                $model = $model->where('manhom',$inputs['manhomdel']);

            $model = $model->delete();

            return redirect('thuetainguyen?&nam='.$inputs['namdel'].'&manhom='.$inputs['manhomdel']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thuetainguyen?&nam='.$model->nam.'&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'HCB';
            $model->save();
            return redirect('thuetainguyen?&nam='.$model->nam.'&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    function checkmulti(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = ThueTaiNguyen::where('nam',$inputs['namcheck']);
            if($inputs['manhomcheck'] != 'All')
                $model = $model->where('manhom',$inputs['manhomcheck']);

            $model = $model->update(['trangthai' => $inputs['trangthaicheck']]);

            return redirect('thuetainguyen?&nam='.$inputs['namcheck'].'&manhom='.$inputs['manhomcheck']);
        }else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $nhoms = NhomThueTn::where('theodoi','TD')
                ->get();
            return view('manage.dinhgia.thuetn.importexcel')
                ->with('nhoms',$nhoms)
                ->with('pageTitle','Nhận dữ liệu giá thuế tài nguyên từ file Excel');

        } else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $filename = $inputs['nam'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];


            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });

            for ($i = $inputs['tudong']; $i <= $inputs['dendong']; $i++) {

                $modelctnew = new ThueTaiNguyen();
                $modelctnew->nam = $inputs['nam'];
                $modelctnew->manhom = $inputs['manhom'];
                $modelctnew->ttqd = $inputs['ttqd'];
                $modelctnew->matn = $data[$i][$inputs['matn']];
                $modelctnew->cap1 = $data[$i][$inputs['cap1']];
                $modelctnew->cap2 = $data[$i][$inputs['cap2']];
                $modelctnew->cap3 = $data[$i][$inputs['cap3']];
                $modelctnew->cap4 = $data[$i][$inputs['cap4']];
                $modelctnew->cap5 = $data[$i][$inputs['cap5']];
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->dongia = (isset($data[$i][$inputs['dongia']]) && $data[$i][$inputs['dongia']] != '' ? chkDbl($data[$i][$inputs['dongia']]) : 0);
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('thuetainguyen?&nam='.$inputs['nam'].'&manhom='.$inputs['manhom']);
        }else
            return view('errors.notlogin');
    }

    public function export(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $model_nhom = NhomThueTn::where('manhom',$inputs['manhomex'])->first();
                $model = DmThueTn::where('manhom',$inputs['manhomex'])->get();
                Excel::create('DMTHUETN', function ($excel) use ($model,$model_nhom) {
                    $excel->sheet('DMTHUETN', function ($sheet) use ($model,$model_nhom) {
                        $sheet->loadView('manage.dinhgia.thuetn.excel.danhmuc')
                            ->with('model', $model)
                            ->with('model_nhom',$model_nhom)
                            ->with('pageTitle', 'DMTHUETN');
                        //$sheet->setPageMargin(0.25);
                        $sheet->setAutoSize(false);
                        $sheet->setFontFamily('Tahoma');
                        $sheet->setFontBold(false);

                        //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                    });
                })->download('xls');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

}
