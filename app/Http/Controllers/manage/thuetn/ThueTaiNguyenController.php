<?php

namespace App\Http\Controllers\manage\thuetn;

use App\District;
use App\Model\manage\dinhgia\thuetn\DmThueTn;
use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyen;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyenCt;
use App\Town;
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
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
            $modeldm = NhomThueTn::where('theodoi','TD')->get();
            $model = ThueTaiNguyen::join('nhomthuetn','nhomthuetn.manhom','=','thuetainguyen.manhom')
                ->select('thuetainguyen.*','nhomthuetn.tennhom');
            if($inputs['manhom'] != 'all')
                $model = $model->where('thuetainguyen.manhom',$inputs['manhom']);
            $model = $model->get();
            return view('manage.dinhgia.thuetn.index')
                ->with('model',$model)
                ->with('modeldm',$modeldm)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin giá thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }
    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $modelnhom = NhomThueTn::where('manhom',$inputs['add_manhom'])
                ->first();
            $check = ThueTaiNguyen::where('manhom',$inputs['add_manhom'])
                ->where('nam',$inputs['add_nam'])
                ->count();
            if($check > 0) {
                return view('manage.dinhgia.thuetn.errors.nodata')
                    ->with('nam', $inputs['add_nam'])
                    ->with('nhomtn', $modelnhom->tennhom);
            }else{
                $del = ThueTaiNguyenCt::where('trangthai','CXD')->delete();

                $inputs['mahs'] = getdate()[0];
                $modeldm = DmThueTn::where('manhom',$inputs['add_manhom'])
                    ->where('theodoi','TD')
                    ->get();
                foreach($modeldm as $dm){
                    $modelctadd = new ThueTaiNguyenCt();
                    $modelctadd->cap1 = $dm->cap1;
                    $modelctadd->cap2 = $dm->cap2;
                    $modelctadd->cap3 = $dm->cap3;
                    $modelctadd->cap4 = $dm->cap4;
                    $modelctadd->cap5 = $dm->cap5;
                    $modelctadd->ten = $dm->ten;
                    $modelctadd->dvt = $dm->dvt;
                    $modelctadd->level = $dm->level;
                    $modelctadd->mahs = $inputs['mahs'];
                    $modelctadd->trangthai = 'CXD';
                    $modelctadd->save();
                }
                $modelct = ThueTaiNguyenCt::where('mahs',$inputs['mahs'])
                    ->get();
                return view('manage.dinhgia.thuetn.create')
                    ->with('modelct',$modelct)
                    ->with('modelnhom',$modelnhom)
                    ->with('inputs',$inputs)
                    ->with('pageTitle','Bảng giá tính thuế tài nguyên thêm mới');
            }
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayqd'] = getDateToDb($inputs['ngayqd']);
            $inputs['trangthai'] = 'CHT';
            $model = new ThueTaiNguyen();
            if($model->create($inputs))
                $modelct = ThueTaiNguyenCt::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            return redirect('thuetainguyen?&manhom='.$inputs['manhom']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = ThueTaiNguyen::findOrFail($id);
            $modelct = ThueTaiNguyenCt::where('mahs',$model->mahs)
                ->get();
            $modelnhom = NhomThueTn::where('manhom',$model->manhom)
                ->first();
            return view('manage.dinhgia.thuetn.edit')
                ->with('modelct',$modelct)
                ->with('modelnhom',$modelnhom)
                ->with('model',$model)
                ->with('pageTitle','Bảng giá tính thuế tài nguyên chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update($id,Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayqd'] = getDateToDb($inputs['ngayqd']);
            $model = ThueTaiNguyen::findOrFail($id);
            $model->update($inputs);
            return redirect('thuetainguyen?&manhom='.$inputs['manhom']);
        }else
            return view('errors.notlogin');
    }

    public function delete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = ThueTaiNguyen::where('id',$inputs['iddelete'])
                ->first();
            $modelct = ThueTaiNguyenCt::where('mahs',$model->mahs)->delete();
            $model = $model->delete();

            return redirect('thuetainguyen');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idcongbo'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thuetainguyen?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhuycongbo'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thuetainguyen?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhoanthanh'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thuetainguyen?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            return redirect('thuetainguyen?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = ThueTaiNguyen::findOrFail($id);
            $modelct = ThueTaiNguyenCt::where('mahs',$model->mahs)
                ->get();
            $modelnhom = NhomThueTn::where('manhom',$model->manhom)
                ->first();
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
            return view('manage.dinhgia.thuetn.reports.prints')
                ->with('modelct',$modelct)
                ->with('modelnhom',$modelnhom)
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Bảng giá tính thuế tài nguyên ');
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
            $inputs = $request->all();
            $modelnhom = NhomThueTn::where('manhom',$inputs['manhom'])
                ->first();
            $check = ThueTaiNguyen::where('manhom',$inputs['manhom'])
                ->where('nam',$inputs['nam'])
                ->count();
            if($check > 0) {
                return view('manage.dinhgia.thuetn.errors.nodata')
                    ->with('nam', $inputs['nam'])
                    ->with('nhomtn', $modelnhom->tennhom);
            }else{
                $del = ThueTaiNguyenCt::where('trangthai','CXD')->delete();
                $inputs['add_nam'] = $inputs['nam'];
                $inputs['add_manhom'] = $inputs['manhom'];
                $inputs['mahs'] = getdate()[0];
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
                    if(isset($data[$i][$inputs['level']]) &&  $data[$i][$inputs['level']] != '') {
                        $modelctnew = new ThueTaiNguyenCt();
                        $modelctnew->level = $data[$i][$inputs['level']];
                        $modelctnew->cap1 = $data[$i][$inputs['cap1']];
                        $modelctnew->cap2 = $data[$i][$inputs['cap2']];
                        $modelctnew->cap3 = $data[$i][$inputs['cap3']];
                        $modelctnew->cap4 = $data[$i][$inputs['cap4']];
                        $modelctnew->cap5 = $data[$i][$inputs['cap5']];
                        $modelctnew->ten = $data[$i][$inputs['ten']];
                        $modelctnew->dvt = $data[$i][$inputs['dvt']];
                        $modelctnew->gia = (isset($data[$i][$inputs['gia']]) && $data[$i][$inputs['gia']] != '' ? chkDbl($data[$i][$inputs['gia']]) : 0);
                        $modelctnew->trangthai = 'CXD';
                        $modelctnew->mahs = $inputs['mahs'];
                        $modelctnew->save();
                    }else
                        continue;
                }
                File::Delete($path);
                $modelct = ThueTaiNguyenCt::where('mahs',$inputs['mahs'])
                    ->get();
                return view('manage.dinhgia.thuetn.create')
                    ->with('modelct',$modelct)
                    ->with('modelnhom',$modelnhom)
                    ->with('inputs',$inputs)
                    ->with('pageTitle','Bảng giá tính thuế tài nguyên thêm mới');
            }
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
