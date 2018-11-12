<?php

namespace App\Http\Controllers;

use App\GiaNuocSh;
use App\GiaNuocShCt;
use App\GiaNuocShCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaNuocShController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';

            $model = GiaNuocSh::whereYear('ngayapdung',$inputs['nam']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);

            $model=$model->get();

            return view('manage.dinhgia.gianuocsh.kekhai.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin hồ sơ giá nước sạch sinh hoạt');

        }else
            return view('errors.notlogin');
    }

    public function create(){
        if(Session::has('admin')){
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                if (session('admin')->level == 'H')
                    $inputs['mahuyen'] = session('admin')->mahuyen;
                else
                    $inputs['mahuyen'] = 'T';
                $modelct = GiaNuocShCtDf::where('mahuyen',$inputs['mahuyen'])
                    ->get();
                return view('manage.dinhgia.gianuocsh.kekhai.create')
                    ->with('modelct', $modelct)
                    ->with('inputs', $inputs)
                    ->with('pageTitle', 'Thông tin hồ sơ giá nước sạch sinh hoạt');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
                $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
                $inputs['trangthai'] = 'CHT';
                $model = new GiaNuocSh();
                if($model->create($inputs)){
                    $modelctdf = GiaNuocShCtDf::where('mahuyen',$inputs['mahuyen']);
                    foreach($modelctdf->get() as $ctdf){
                        $modelct = new GiaNuocShCt();
                        $modelct->doituong = $ctdf->doituong;
                        $modelct->giachuathue = $ctdf->giachuathue;
                        $modelct->thuevat = $ctdf->thuevat;
                        $modelct->giacothue = $ctdf->giacothue;
                        $modelct->phibvmttyle = $ctdf->phibvmttyle;
                        $modelct->phibvmt = $ctdf->phibvmt;
                        $modelct->thanhtien = $ctdf->thanhtien;
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->save();
                    }
                    $modelctdf->delete();
                }
                return redirect('thongtingianuocsinhhoat');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = GiaNuocSh::findOrFail($id);
            $modelct = GiaNuocShCt::where('mahs',$model->mahs)
                ->get();
            return view('manage.dinhgia.gianuocsh.reports.print')
                ->with('modelct', $modelct)
                ->with('model', $model)
                ->with('pageTitle', 'Thông tin hồ sơ giá nước sạch sinh hoạt');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = GiaNuocSh::findOrFail($id);
                $modelct = GiaNuocShCt::where('mahs',$model->mahs)
                    ->get();
                return view('manage.dinhgia.gianuocsh.kekhai.edit')
                    ->with('modelct', $modelct)
                    ->with('model', $model)
                    ->with('pageTitle', 'Thông tin hồ sơ giá nước sạch sinh hoạt chỉnh sửa');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
                $model = GiaNuocSh::findOrFail($id);
                $model->update($inputs);
                return redirect('thongtingianuocsinhhoat');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtingianuocsinhhoat?&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thongtingianuocsinhhoat?&trangthai=HHT');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaNuocSh::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtingianuocsinhhoat?&trangthai=CB');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            //dd($inputs);
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['doituong'] = isset($inputs['doituong']) ? $inputs['doituong'] : '';
            $model = GiaNuocShCt::join('gianuocsh','gianuocshct.mahs','=','gianuocsh.mahs')
                ->select('gianuocshct.*','gianuocsh.ngayapdung','gianuocsh.soqd','gianuocsh.trangthai','gianuocsh.ghichu')
                ->whereIn('gianuocsh.trangthai',['HT','CB']);
            if($inputs['nam'] != '')
                $model = $model ->whereYear('gianuocsh.ngayapdung',$inputs['nam']);
            if($inputs['doituong'] != '')
                $model = $model->where('gianuocshct.doituong','like','%'.$inputs['doituong'].'%');
            $model = $model->get();

            //dd($model);

            return view('manage.dinhgia.gianuocsh.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin giá nước sạch sinh hoạt');
        }else
            return view('errors.notlogin');
    }
}
