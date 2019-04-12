<?php

namespace App\Http\Controllers;

use App\Company;
use App\CungCapGia;
use App\CungCapGiaCt;
use App\CungCapGiaCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class CungCapGiaController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X' || session('admin')->level == 'CCG') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                if(session('admin')->level == 'CCG')
                    $inputs['masothue'] = session('admin')->maxa;
                $model = CungCapGia::where('maxa',$inputs['masothue'])
                    ->whereYear('ngayapdung',$inputs['nam'])
                    ->get();
                $modeldn = Company::where('level','CCG')
                    ->where('maxa',$inputs['masothue'])
                    ->first();
                return view('manage.dncungcapgia.hoso.index')
                    ->with('inputs',$inputs)
                    ->with('model',$model)
                    ->with('modeldn',$modeldn)
                    ->with('pageTitle', 'Thông tin  cung cấp giá hàng hóa');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X' || session('admin')->level == 'CCG') {
                $inputs = $request->all();
                $delct = CungCapGiaCtDf::where('maxa',$inputs['masothue'])->delete();
                if(session('admin')->level == 'CCG')
                    $inputs['masothue'] = session('admin')->maxa;
                $modeldn = Company::where('level','CCG')
                    ->where('maxa',$inputs['masothue'])
                    ->first();
                $modelct = CungCapGiaCtDf::where('maxa',$inputs['masothue'])
                    ->get();
                return view('manage.dncungcapgia.hoso.create')
                    ->with('inputs',$inputs)
                    ->with('modeldn',$modeldn)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Thông tin hồ sơ cung cấp giá hàng hóa thêm mới');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/cungcapgia/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2'])){
                $ipf2 = $request->file('ipf2');
                $inputs['ipt2'] = $inputs['mahs'] .'&2.'.$ipf2->getClientOriginalExtension();
                $ipf2->move(public_path() . '/data/cungcapgia/', $inputs['ipt2']);
                $inputs['ipf2']= $inputs['ipt2'];
            }
            if(isset($inputs['ipf3'])){
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/cungcapgia/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4'])){
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'].'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/cungcapgia/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5'])){
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/cungcapgia/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }
            $model = new CungCapGia();
            if($model->create($inputs)){
                $modelctdf = CungCapGiaCtDf::where('maxa',$inputs['maxa']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new CungCapGiaCt();
                    $modelct->mahanghoa = $ctdf->mahanghoa;
                    $modelct->tenhanghoa = $ctdf->tenhanghoa;
                    $modelct->thongsokt = $ctdf->thongsokt;
                    $modelct->xuatxu = $ctdf->xuatxu;
                    $modelct->dvt = $ctdf->dvt;
                    $modelct->gia = $ctdf->gia;
                    $modelct->ghichu = $ctdf->ghichu;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('hosocungcapgia?&masothue='.$inputs['maxa']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = CungCapGia::findOrFail($id);
            $modelct = CungCapGiaCt::where('mahs',$model->mahs)->get();
            $modeldn = Company::where('maxa',$model->maxa)
                ->where('level','CCG')
                ->first();
            return view('manage.dncungcapgia.hoso.edit')
                ->with('model',$model)
                ->with('modeldn',$modeldn)
                ->with('modelct',$modelct)
                ->with('pageTitle','Chỉnh sửa thông tin hồ sơ cung cấp giá');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = CungCapGia::findOrFail($id);
            $model->update($inputs);
            return redirect('hosocungcapgia?&masothue='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = CungCapGia::findOrFail($id);
            $maxa = $model->maxa;
            $modelct = CungCapGiaCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('hosocungcapgia?&masothue='.$maxa);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $modelkk = CungCapGia::findOrFail($id);
            $modelkkct = CungCapGiaCt::where('mahs',$modelkk->mahs)->get();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->where('level','CCG')
                ->first();
            //dd($modelkkct );
            return view('manage.dncungcapgia.hoso.show')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('pageTitle','Thông tin hồ sơ cung cấp giá');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = CungCapGia::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('hosocungcapgia?&masothue='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function nhanexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(session('admin')->level == 'X')
                $inputs['masothue'] = session('admin')->maxa;

            $modeldn = Company::where('maxa',$inputs['masothue'])
                ->where('level','CCG')
                ->first();
            $modeldv = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('manage.dncungcapgia.hoso.excel.information')
                ->with('inputs',$inputs)
                ->with('modeldv',$modeldv)
                ->with('modeldn',$modeldn)
                ->with('pageTitle', 'Nhận dữ liệu giá hàng hóa từ file Excel');
        }else
            return view('errors.notlogin');
    }

    function import_excel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $filename = $inputs['maxa'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });
            //dd($data);
            $modeldel = CungCapGiaCtDf::where('maxa', $inputs['maxa'])->delete();

            for ($i = $inputs['tudong']; $i < ($inputs['tudong'] + $inputs['sodong']); $i++) {
                //dd($data[$i]);
                if (!isset($data[$i][$inputs['mahanghoa']]) || $data[$i][$inputs['tenhanghoa']] == '') {
                    continue;
                }
                $modelctnew = new CungCapGiaCtDf();
                $modelctnew->maxa = $inputs['maxa'];
                $modelctnew->mahanghoa = $data[$i][$inputs['mahanghoa']];
                $modelctnew->tenhanghoa = $data[$i][$inputs['tenhanghoa']];
                $modelctnew->thongsokt = $data[$i][$inputs['thongsokt']];
                $modelctnew->xuatxu = $data[$i][$inputs['xuatxu']];
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->gia = $data[$i][$inputs['gia']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->save();
            }
            File::Delete($path);
            if(session('admin')->level == 'CCG')
                $inputs['masothue'] = session('admin')->maxa;
            else
                $inputs['masothue'] = $inputs['maxa'];
            $modelct = CungCapGiaCtDf::where('maxa',$inputs['masothue'])
                ->get();

            $modeldn = Company::where('maxa',$inputs['masothue'])
                ->where('level','CCG')
                ->first();

            return view('manage.dncungcapgia.hoso.create')
                ->with('inputs',$inputs)
                ->with('modeldn',$modeldn)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Thông tin hồ sơ cung cấp giá hàng hóa thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhanghoa'] = isset($inputs['tenhanghoa']) ? $inputs['tenhanghoa'] : '';
            $model = CungCapGiaCt::join('cungcapgia','cungcapgia.mahs','=','cungcapgiact.mahs')
                ->join('company','company.maxa','=','cungcapgia.maxa')
                ->where('company.level','CCG')
                ->select('cungcapgiact.*','cungcapgia.ngayapdung','company.tendn')
                ->whereYear('cungcapgia.ngayapdung',$inputs['nam'])
                ->where('cungcapgia.trangthai','HT');
            if($inputs['tenhanghoa'] != '')
                $model = $model->where('cungcapgiact.tenhanghoa','like','%'.$inputs['tenhanghoa'].'%');
            $model = $model->get();
            return view('manage.dncungcapgia.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin giá hang hóa ');
        }else
            return view('errors.notlogin');
    }

    public function dinhkem(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );

        $inputs = $request->all();

        $model = CungCapGia::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        if (isset($model->ipt1)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 1 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/cungcapgia/' . $model->ipf1) . '">' . $model->ipt1 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt2)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 2 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/cungcapgia/' . $model->ipf2) . '">' . $model->ipt2 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt3)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 3 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/cungcapgia/' . $model->ipf3) . '">' . $model->ipt3 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt4)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 4 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/cungcapgia/' . $model->ipf4) . '">' . $model->ipt4 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt5)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 5 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/cungcapgia/' . $model->ipf5) . '">' . $model->ipt5 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }

        $result['status'] = 'success';

        die(json_encode($result));
    }
}
