<?php

namespace App\Http\Controllers;

use App\DmGiaRung;
use App\GiaRung;
use App\GiaRungCt;
use App\GiaRungCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaRungController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';


            $model = GiaRung::whereYear('ngayapdung',$inputs['nam']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);

            $model=$model->get();
            return view('manage.dinhgia.giarung.kekhai.index')
                ->with('model',$model)
                ->with('nam',$inputs['nam'])
                ->with('trangthai',$inputs['trangthai'])
                ->with('pageTitle','Thông tin hồ sơ giá rừng');

        }else
            return view('errors.notlogin');
    }

    public function create(){
        if(Session::has('admin')){
            $inputs['mahuyen'] = session('admin')->mahuyen != '' ? session('admin')->mahuyen : 'T' ;
            $modeldm = DmGiaRung::all();
            $modelct = GiaRungCtDf::where('mahuyen',$inputs['mahuyen'])
                ->join('dmgiarung','dmgiarung.manhom','=','giarungctdf.manhom')
                ->select('giarungctdf.*','dmgiarung.tennhom')
                ->get();
            return view('manage.dinhgia.giarung.kekhai.create')
                ->with('modeldm',$modeldm)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ giá rừng thêm mới');

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
            $model = new GiaRung();
            if($model->create($inputs)){
                $modelctdf = GiaRungCtDf::where('mahuyen',$inputs['mahuyen']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new GiaRungCt();
                    $modelct->manhom = $ctdf->manhom;
                    $modelct->loairung= $ctdf->loairung;
                    $modelct->mucdo = $ctdf->mucdo;
                    $modelct->dongiasd = $ctdf->dongiasd;
                    $modelct->dongiat50 = $ctdf->dongiat50;
                    $modelct->dongiat1 = $ctdf->dongiat1;
                    $modelct->dongiaxp = $ctdf->dongiaxp;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('giarung');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $modeldm = DmGiaRung::all();
            $model = GiaRung::findOrFail($id);
            $modelct =  GiaRungCt::where('mahs',$model->mahs)
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->select('giarungct.*','dmgiarung.tennhom')
                ->get();
            return view('manage.dinhgia.giarung.kekhai.edit')
                ->with('modeldm',$modeldm)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ giá rừng chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = GiaRung::findOrFail($id);
            $model->update($inputs);
            return redirect('giarung?&trangthai='.$model->trangthai);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaRung::findOrFail($id);
            $modelct = GiaRungCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('giarung');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('giarung?&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('giarung?&trangthai=HHT');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaRung::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('giarung?&trangthai=CB');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['loairung'] = isset($inputs['loairung']) ? $inputs['loairung'] : '';
            $model = GiaRungCt::join('giarung','giarung.mahs','=','giarungct.mahs')
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->select('giarungct.*','giarung.soqd','giarung.ngayapdung','giarung.trangthai','dmgiarung.tennhom')
                ->where('giarung.trangthai','HT')
                ->OrWhere('giarung.trangthai','CB');
            if($inputs['nam'] != '')
                $model = $model->whereYear('giarung.ngayapdung',$inputs['nam']);
            if($inputs['loairung'] != '')
                $model = $model->where('giarungct.loairung','like','%'.$inputs['loairung'].'%');
            $model = $model->get();
            return view('manage.dinhgia.giarung.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('loairung',$inputs['loairung'])
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin giá rừng');
        }else
            return view('errors.notlogin');
    }

}
