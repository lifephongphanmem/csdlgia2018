<?php

namespace App\Http\Controllers;

use App\District;
use App\DmPhiLePhi;
use App\PhiLePhi;
use App\PhiLePhiCt;
use App\PhiLePhiCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
            $m_nhomphilephi = DmPhiLePhi::where('manhom',$inputs['manhom'])->first();
            $inputs['mahuyen'] = session('admin')->mahuyen!= '' ? session('admin')->mahuyen : 'T';
            $modelct = PhiLePhiCtDf::where('mahuyen',$inputs['mahuyen'])->get();
            return view('manage.dinhgia.philephi.kekhai.create')
                ->with('m_nhomphilephi',$m_nhomphilephi)
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
            $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new PhiLePhi();
            if($model->create($inputs)){
                $modelctdf = PhiLePhiCtDf::where('mahuyen',$inputs['mahuyen']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new PhiLePhiCt();
                    $modelct->ptcp= $ctdf->ptcp;
                    $modelct->mucthuphi = $ctdf->mucthuphi;
                    $modelct->ghichu = $ctdf->ghichu;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
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
            $model->update($inputs);

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
            return redirect('philephi?&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = PhiLePhi::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('philephi?&trangthai=HHT');
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
            return redirect('philephi?&trangthai=CB');
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
}
