<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\GiaGocVlXd;
use App\GiaGocVlXdCt;
use App\GiaGocVlXdCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaGocVlXdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldb = DiaBanHd::where('level','H')->get();
            if(session('admin')->level == 'X') {
                $inputs['district'] = session('admin')->district;
            }else {
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $modeldb->first()->district;
            }

            $model = GiaGocVlXd::join('diabanhd','diabanhd.district','=','giagocvlxd.district')
                ->select('giagocvlxd.*', 'diabanhd.diaban')
                ->where('giagocvlxd.district', $inputs['district'])
                ->where('giagocvlxd.nam',$inputs['nam']);

            $model = $model->get();
            $diaban = DiaBanHd::where('district',$inputs['district'])->first();
            $inputs['ngaybc'] = date('d/m/Y', strtotime(date('Y-m-d')));
            return view('manage.dinhgia.giagocvlxd.kekhai.index')
                ->with('model', $model)
                ->with('modeldb', $modeldb)
                ->with('inputs',$inputs)
                ->with('diaban',$diaban)
                ->with('pageTitle', 'Thông tin giá gốc vật liệu xây dựng');

        } else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelct = GiaGocVlXdCtDf::where('district',$inputs['diaban'])
                ->get();
            $diaban = DiaBanHd::where('district',$inputs['diaban'])
                ->first();
            return view('manage.dinhgia.giagocvlxd.kekhai.create')
                ->with('inputs',$inputs)
                ->with('diaban',$diaban)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Thông tin giá gốc vật liệu xây dựng thêm mới');


        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybc'] = getDateToDb($inputs['ngaybc']);
            $inputs['mahs'] = $inputs['district'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $inputs['ttthaotac'] = session('admin')->name.'('.session('admin')->username.') thêm mới';
            $model = new GiaGocVlXd();
            if($model->create($inputs)){
                $modelctdf = GiaGocVlXdCtDf::where('district',$inputs['district']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new GiaGocVlXdCt();
                    $modelct->tenhhdv = $ctdf->tenhhdv;
                    $modelct->qccl = $ctdf->qccl;
                    $modelct->dvt = $ctdf->dvt;
                    $modelct->giagoc = $ctdf->giagoc;
                    $modelct->qcad = $ctdf->qcad;
                    $modelct->ghichu = $ctdf->ghichu;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('thongtingiagocvlxd?&nam='.$inputs['nam'].'&district='.$inputs['district']);


        } else
            return view('errors.notlogin');
    }

    public function checkhs(Request $request){
        $result = array(
            'status' => 'fail',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
            $model = GiaGocVlXd::where('district',$inputs['district'])
                ->where('quy',$inputs['quy'])
                ->where('nam',$inputs['nam'])
                ->first();
            if (count($model)>0)
                $result['status'] = 'fail';
            else
                $result['status'] = 'success';


        //dd($result);
        die(json_encode($result));
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = GiaGocVlXd::findOrFail($id);
            $modelct = GiaGocVlXdCt::where('mahs',$model->mahs)
                ->get();
            $diaban = DiaBanHd::where('district',$model->district)
                ->first();
            return view('manage.dinhgia.giagocvlxd.report.prints')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('diaban',$diaban)
                ->with('pageTitle','Công bố giá gốc vật liệu xây dựng');

        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = GiaGocVlXd::findOrFail($id);
            $modelct = GiaGocVlXdCt::where('mahs',$model->mahs)
                ->get();
            $diaban = DiaBanHd::where('district',$model->district)
                ->first();
            return view('manage.dinhgia.giagocvlxd.kekhai.edit')
                ->with('model',$model)
                ->with('diaban',$diaban)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Thông tin giá gốc vật liệu xây dựng chỉnh sửa');


        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybc'] = getDateToDb($inputs['ngaybc']);
            $inputs['ttthaotac'] = session('admin')->name.'('.session('admin')->username.') chỉnh sửa';
            $model = GiaGocVlXd::findOrFail($id);
            $model->update($inputs);
            return redirect('thongtingiagocvlxd?&nam='.$model->nam.'&district='.$model->district);


        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaGocVlXd::where('id',$inputs['iddelete'])->first();;
            if($model->delete())
                $modelct = GiaGocVlXdCt::where('mahs',$model->mahs)
                    ->delete();
            return redirect('thongtingiagocvlxd?&nam='.$model->nam.'&district='.$model->district);


        } else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaGocVlXd::where('id',$inputs['idhoanthanh'])->first();;
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtingiagocvlxd?&nam='.$model->nam.'&district='.$model->district);
        } else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaGocVlXd::where('id',$inputs['idhuyhoanthanh'])->first();;
            $model->trangthai = 'HHT';
            $model->congbo = 'CCB';
            $model->save();
            return redirect('thongtingiagocvlxd?&nam='.$model->nam.'&district='.$model->district);
        } else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaGocVlXd::where('id',$inputs['idcongbo'])->first();;
            $model->congbo = 'CB';
            $model->save();
            return redirect('thongtingiagocvlxd?&nam='.$model->nam.'&district='.$model->district);
        } else
            return view('errors.notlogin');
    }
}
