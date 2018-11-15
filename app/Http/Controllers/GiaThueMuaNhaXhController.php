<?php

namespace App\Http\Controllers;

use App\DmGiaThueMuaNhaXh;
use App\GiaThueMuaNhaXh;
use App\GiaThueMuaNhaXhCt;
use App\GiaThueMuaNhaXhCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThueMuaNhaXhController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';

            $model = GiaThueMuaNhaXh::Leftjoin('dmgiathuemuanhaxh','dmgiathuemuanhaxh.manhom','=','giathuemuanhaxh.manhom')
                ->select('giathuemuanhaxh.*', 'dmgiathuemuanhaxh.tennhom');
            if($inputs['nam'] != '')
                $model = $model->whereYear('giathuemuanhaxh.ngayapdung',$inputs['nam']);
            if ($inputs['trangthai'] != '')
                $model = $model->where('giathuemuanhaxh.trangthai', $inputs['trangthai']);

            $model = $model->get();
            $m_nhom = DmGiaThueMuaNhaXh::all();
            return view('manage.dinhgia.giathuemuanhaxh.kekhai.index')
                ->with('model', $model)
                ->with('inputs',$inputs)
                ->with('m_nhom', $m_nhom)
                ->with('pageTitle', 'Thông tin hồ sơ giá thuê mua nhà xã hội');

        } else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                if (session('admin')->level == 'T')
                    $inputs['mahuyen'] = 'T';
                else
                    $inputs['mahuyen'] = session('admin')->mahuyen;
                $modeldm = DmGiaThueMuaNhaXh::where('manhom', $inputs['manhom'])->first();
                $modelct = GiaThueMuaNhaXhCtDf::where('mahuyen', $inputs['mahuyen'])
                    ->get();
                return view('manage.dinhgia.giathuemuanhaxh.kekhai.create')
                    ->with('modelct', $modelct)
                    ->with('inputs', $inputs)
                    ->with('modeldm', $modeldm)
                    ->with('pageTitle', 'Thông tin hồ sơ giá thuê mua nhà xã hộithêm mới');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
                $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
                $inputs['trangthai'] = 'CHT';
                $model = new GiaThueMuaNhaXh();
                if($model->create($inputs)) {
                    $modelctdf = GiaThueMuaNhaXhCtDf::where('mahuyen', $inputs['mahuyen']);
                    foreach($modelctdf->get() as $ctdf){
                        $modelct = new GiaThueMuaNhaXhCt();
                        $modelct->loainha = $ctdf->loainha;
                        $modelct->thoigian = $ctdf->thoigian;
                        $modelct->dongia = $ctdf->dongia;
                        $modelct->hesodc = $ctdf->hesodc;
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->save();
                    }
                    $modelctdf->delete();
                }
                return redirect('thongtingiathuemuanhaxh?&trangthai=CHT');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = GiaThueMuaNhaXh::findOrFail($id);
                $modelct = GiaThueMuaNhaXhCt::where('mahs',$model->mahs)
                    ->get();
                $modeldm = DmGiaThueMuaNhaXh::where('manhom',$model->manhom)->first();
                return view('manage.dinhgia.giathuemuanhaxh.kekhai.edit')
                    ->with('modelct', $modelct)
                    ->with('model', $model)
                    ->with('modeldm', $modeldm)
                    ->with('pageTitle', 'Thông tin hồ sơ giá thuê mua nhà xã hội chỉnh sửa');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
                $model = GiaThueMuaNhaXh::findOrFail($id);
                $model->update($inputs);
                return redirect('thongtingiathuemuanhaxh?&trangthai='.$model->trangthai);
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $modelct = GiaThueMuaNhaXhCt::where('mahs',$model->mahs)
                ->get();
            $modeldm = DmGiaThueMuaNhaXh::where('manhom',$model->manhom)->first();
            return view('manage.dinhgia.giathuemuanhaxh.reports.print')
                ->with('modelct', $modelct)
                ->with('model', $model)
                ->with('modeldm',$modeldm)
                ->with('pageTitle', 'Thông tin hồ sơ giá thuê mua nhà xã hội');
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $modelct = GiaThueMuaNhaXhCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thongtingiathuemuanhaxh?&trangthai=CHT');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] =  isset($inputs['manhom']) ? $inputs['manhom'] : '';
            $inputs['loainha'] =  isset($inputs['loainha']) ? $inputs['loainha'] : '';
            $m_nhom = DmGiaThueMuaNhaXh::all();
            $model = GiaThueMuaNhaXhCt::join('giathuemuanhaxh','giathuemuanhaxh.mahs','=','giathuemuanhaxhct.mahs')
                ->join('dmgiathuemuanhaxh','dmgiathuemuanhaxh.manhom','=','giathuemuanhaxh.manhom')
                ->select('giathuemuanhaxhct.*','giathuemuanhaxh.soqd','giathuemuanhaxh.ngayapdung','giathuemuanhaxh.ghichu',
                    'dmgiathuemuanhaxh.tennhom')
                ->whereIn('giathuemuanhaxh.trangthai',['HT','CB']);
            if($inputs['nam'] != '')
                $model = $model->whereYear('giathuemuanhaxh.ngayapdung',$inputs['nam']);
            if($inputs['manhom'] != '')
                $model = $model->where('giathuemuanhaxh.manhom','=',$inputs['manhom']);
            if($inputs['loainha'] != '')
                $model = $model->where('giathuemuanhaxhct.loainha','like','%'.$inputs['loainha'].'%');
            $model = $model->get();
            return view('manage.dinhgia.giathuemuanhaxh.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('m_nhom',$m_nhom)
                ->with('pageTitle','Tìm kiếm thông tin giá thuê mua nhà ở xã hội');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtingiathuemuanhaxh?&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thongtingiathuemuanhaxh?&trangthai=HHT');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaThueMuaNhaXh::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtingiathuemuanhaxh?&trangthai=CB');
        }else
            return view('errors.notlogin');
    }

}
