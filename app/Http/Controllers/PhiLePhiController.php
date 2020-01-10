<?php

namespace App\Http\Controllers;

use App\District;
use App\DmPhiLePhi;
use App\PhiLePhi;
use App\PhiLePhiCt;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class PhiLePhiController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : 'all';
//            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';


            $model = PhiLePhi::join('dmphilephi','dmphilephi.manhom','=','philephi.manhom')
                ->select('philephi.*','dmphilephi.tennhom','dmphilephi.dvt');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('philephi.ngayapdung',$inputs['nam']);
//            if($inputs['trangthai'] != '')
//                $model = $model->where('philephi.trangthai',$inputs['trangthai']);

            $model=$model->get();
            $m_nhomphilephi = DmPhiLePhi::all();
            return view('manage.dinhgia.philephi.kekhai.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('m_nhomphilephi',$m_nhomphilephi)
                ->with('pageTitle','Thông tin hồ sơ phí, lệ phí');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $delmodel = PhiLePhiCt::where('trangthai','CXD')->delete();
            $m_nhomphilephi = DmPhiLePhi::where('manhom',$inputs['manhom'])->first();
            $inputs['mahs'] = getdate()[0];
            $modelct = PhiLePhiCt::where('mahs',$inputs['mahs'])
                ->get();
            return view('manage.dinhgia.philephi.kekhai.create')
                ->with('m_nhomphilephi',$m_nhomphilephi)
                ->with('inputs',$inputs)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thêm mới thông tin hồ sơ phí, lệ phí');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();

            $inputs['mahuyen'] = session('admin')->mahuyen!= '' ? session('admin')->mahuyen : 'T';
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['trangthai'] = 'CHT';
            $model = new PhiLePhi();
            if($model->create($inputs)){
                $modelctdf = PhiLePhiCt::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('philephi');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = PhiLePhi::findOrFail($id);
            $modelct =  PhiLePhiCt::where('mahs',$model->mahs)
                ->get();
            $m_nhomphilephi = DmPhiLePhi::where('manhom',$model->manhom)
                ->first();
            return view('manage.dinhgia.philephi.kekhai.edit')
                ->with('m_nhomphilephi',$m_nhomphilephi)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ phí lệ phí chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = PhiLePhi::findOrFail($id);
            if($model->update($inputs))
                $modelctdf = PhiLePhiCt::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            return redirect('philephi');

        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = PhiLePhi::findOrFail($id);
            $modelct = PhiLePhiCt::where('mahs',$model->mahs)
                ->get();
            $m_nhomphilephi = DmPhiLePhi::where('manhom',$model->manhom)->first();
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

            return view('manage.dinhgia.philephi.reports.print')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('m_nhomphilephi',$m_nhomphilephi)
                ->with('inputs',$inputs)
                ->with('pageTitle','Phí lệ phí');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = PhiLePhi::findOrFail($id);
            $modelct = PhiLePhiCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('philephi');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = PhiLePhi::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('philephi');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = PhiLePhi::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            return redirect('philephi');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = PhiLePhi::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('philephi');
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuycongbo'];
            $model = PhiLePhi::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('philephi');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : '';
            $inputs['ptcp'] = isset($inputs['ptcp']) ? $inputs['ptcp'] : '';
            $model = PhiLePhiCt::Leftjoin('philephi','philephi.mahs','=','philephict.mahs')
                ->Leftjoin('dmphilephi','dmphilephi.manhom','=','philephi.manhom')
                ->whereIn('philephi.trangthai',['HT','CB'])
                ->select('philephict.*','philephi.soqd','philephi.ngayapdung','philephi.trangthai','dmphilephi.tennhom');
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('ngayapdung',$inputs['nam']);
            if($inputs['manhom'] != '')
                $model = $model->where('manhom',$inputs['manhom']);
            if($inputs['ptcp'] != '')
                $model = $model->where('ptcp','like','%'.$inputs['ptcp'].'%');
            $model = $model->get();

            $modelnhom = DmPhiLePhi::all();
            return view('manage.dinhgia.philephi.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('modelnhom',$modelnhom)
                ->with('pageTitle','Tìm kiếm thông tin phí lệ phí');
        }else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $delmodel = PhiLePhiCt::where('trangthai','CXD')->delete();
            $m_nhomphilephi = DmPhiLePhi::all();
            $inputs['mahs'] = getdate()[0];
            return view('manage.dinhgia.philephi.kekhai.importexcel')
                ->with('m_nhomphilephi',$m_nhomphilephi)
                ->with('inputs',$inputs)
                ->with('pageTitle','Nhận dữ liệu excel thông tin hồ sơ phí, lệ phí');
        }else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $delmodel = PhiLePhiCt::where('trangthai','CXD')->delete();
            $m_nhomphilephi = DmPhiLePhi::where('manhom',$inputs['manhom'])->first();
            $inputs['mahs'] = getdate()[0];

            $filename = getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });
            //dd($data);
            for ($i = getDbl($inputs['tudong']); $i <= getDbl($inputs['dendong']); $i++) {
                //dd($data[$i]);
                if (!isset($data[$i][$inputs['ptcp']]) || $data[$i][$inputs['ptcp']] == '') {
                    continue;//Tên cán bộ rỗng => thoát
                }
                $modelctnew = new PhiLePhiCt();
                $modelctnew->mahs = $inputs['mahs'];
                $modelctnew->trangthai = 'CXD';
                $modelctnew->ptcp = $data[$i][$inputs['ptcp']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->mucthuphi = getDbl($data[$i][$inputs['mucthuphi']]);
                $modelctnew->save();
            }
            File::Delete($path);

            $modelct = PhiLePhiCt::where('mahs',$inputs['mahs'])
                ->get();
            return view('manage.dinhgia.philephi.kekhai.create')
                ->with('m_nhomphilephi',$m_nhomphilephi)
                ->with('inputs',$inputs)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thêm mới thông tin hồ sơ phí, lệ phí');

        }else
            return view('errors.notlogin');
    }
}
