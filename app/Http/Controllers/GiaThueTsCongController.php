<?php

namespace App\Http\Controllers;

use App\GiaThueTsCong;
use App\GiaThueTsCongCt;
use App\GiaThueTsCongCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThueTsCongController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            if(session('admin')->level == 'X') {
                $modeldv = Town::where('maxa',session('admin')->maxa)->get();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
                $inputs['maxa'] = session('admin')->maxa;
            }else {
                if(session('admin')->level == 'T')
                    $modeldv = Town::all();
                else
                    $modeldv = Town::where('mahuyen',$mahuyen)->get();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
            }

            $model = GiaThueTsCong::where('nam',$inputs['nam']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);
            if($inputs['maxa']!= '')
                $model = $model->where('maxa',$inputs['maxa']);


            $model=$model->get();
            return view('manage.dinhgia.giathuetscong.kekhai.index')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin giá thuê tài sản công');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $modeldv = Town::where('maxa',$inputs['maxa'])->first();
            $modelct = GiaThueTsCongCtDf::where('maxa',$inputs['maxa'])
                ->get();
            return view('manage.dinhgia.giathuetscong.kekhai.create')
                ->with('modeldv',$modeldv)
                ->with('modelct',$modelct)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin giá thuê tài sản công thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = date('Y');
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new  GiaThueTsCong();
            if($model->create($inputs)){
                $modelctdf = GiaThueTsCongCtDf::where('maxa',$inputs['maxa']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new GiaThueTsCongCt();
                    $modelct->tents = $ctdf->tents;
                    $modelct->soluong= $ctdf->soluong;
                    $modelct->dvt = $ctdf->dvt;
                    $modelct->dongiathue = $ctdf->dongiathue;
                    $modelct->dvthue = $ctdf->dvthue;
                    $modelct->hdthue = $ctdf->hdthue;
                    $modelct->ththue = $ctdf->ththue;
                    $modelct->sotienthuenam = $ctdf->sotienthuenam;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }

            return redirect('thongtinthuetaisancong?&trangthai='.$inputs['trangthai'].'&maxa='.$inputs['maxa']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = GiaThueTsCong::findOrFail($id);
            $modeldv = Town::where('maxa',$model->maxa)->first();
            $modelct = GiaThueTsCongCt::where('mahs',$model->mahs)
                ->get();
            return view('manage.dinhgia.giathuetscong.kekhai.edit')
                ->with('modeldv',$modeldv)
                ->with('modelct',$modelct)
                ->with('model',$model)
                ->with('pageTitle','Thông tin giá thuê tài sản công chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = GiaThueTsCong::findOrFail($id);
            $model->update($inputs);
            return redirect('thongtinthuetaisancong?&trangthai='.$model->trangthai.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = GiaThueTsCong::where('id',$inputs['iddelete'])->first();
            $maxa = $model->maxa;
            $modelct = GiaThueTsCongCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thongtinthuetaisancong?&trangthai=CHT&maxa='.$maxa);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = GiaThueTsCong::findOrFail($id);
            $modeldv = Town::where('maxa',$model->maxa)->first();
            $modelct = GiaThueTsCongCt::where('mahs',$model->mahs)->get();
            return view('manage.dinhgia.giathuetscong.reports.print')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('modelct',$modelct)
                ->with('pageTitle','Hồ sơ thuê tài sản công chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaThueTsCong::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtinthuetaisancong?&trangthai=HT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaThueTsCong::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thongtinthuetaisancong?&trangthai=HHT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaThueTsCong::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtinthuetaisancong?&trangthai=CB&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldv = Town::all();

            $inputs['tents'] = isset($inputs['tents']) ? $inputs['tents'] : '';
            $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : '';

            $model = GiaThueTsCongCt::join('giathuetscong','giathuetscong.mahs','=','giathuetscongct.mahs')
                ->join('town','town.maxa','=','giathuetscong.maxa')
                ->select('giathuetscongct.*','giathuetscong.nam','giathuetscong.maxa','town.tendv','giathuetscong.trangthai')
                ->whereIn('giathuetscong.trangthai',['HT','CB']);

            if($inputs['nam']!= '')
                $model = $model->where('giathuetscong.nam',$inputs['nam']);
            if($inputs['tents'] != '')
                $model = $model->where('giathuetscongct.tents','like','%'.$inputs['tents'].'%');
            if($inputs['maxa'] != '')
                $model = $model->where('giathuetscong.maxa',$inputs['maxa']);
            $model = $model->get();
            return view('manage.dinhgia.giathuetscong.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('pageTitle','Tìm kiếm thông tin giá thuê tài sản công');
        }else
            return view('errors.notlogin');
    }

    public function ketxuat(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldv = Town::all();

            $inputs['tents'] = isset($inputs['tents']) ? $inputs['tents'] : '';
            $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : '';

            $model = GiaThueTsCongCt::join('giathuetscong','giathuetscong.mahs','=','giathuetscongct.mahs')
                ->join('town','town.maxa','=','giathuetscong.maxa')
                ->select('giathuetscongct.*','giathuetscong.nam','giathuetscong.maxa','town.tendv','giathuetscong.trangthai')
                ->whereIn('giathuetscong.trangthai',['HT','CB']);

            if($inputs['nam']!= '')
                $model = $model->where('giathuetscong.nam',$inputs['nam']);
            if($inputs['tents'] != '')
                $model = $model->where('giathuetscongct.tents','like','%'.$inputs['tents'].'%');
            if($inputs['maxa'] != '')
                $model = $model->where('giathuetscong.maxa',$inputs['maxa']);
            $modelct = $model->get();
            return view('manage.dinhgia.giathuetscong.reports.baocao')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('modelct',$modelct)
                ->with('pageTitle','Hồ sơ thuê tài sản công chi tiết');
        }else
            return view('errors.notlogin');
    }
}
