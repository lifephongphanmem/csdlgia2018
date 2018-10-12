<?php

namespace App\Http\Controllers;

use App\DmDvKcb;
use App\DvKcb;
use App\DvKcbCt;
use App\DvKcbCtDf;
use App\NhomDvKcb;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DvKcbController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            if(session('admin')->level == 'T') {
                $modeldv = Town::all();
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
            }elseif(session('admin')->level == 'H') {
                $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
            }else {
                $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->where('maxa',session('admin')->maxa)->get();
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : session('admin')->maxa;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
            }


            $model = DvKcb::join('nhomdvkcb','nhomdvkcb.manhom','=','dvkcb.manhom')
                ->select('dvkcb.*','nhomdvkcb.tennhom')
                ->where('dvkcb.maxa',$inputs['maxa']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);

            $model=$model->get();
            $m_nhomdvkcb = NhomDvKcb::where('theodoi','TD')
                ->get();
            return view('manage.dinhgia.dvkcb.kekhai.index')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('nam',$inputs['nam'])
                ->with('maxa',$inputs['maxa'])
                ->with('trangthai',$inputs['trangthai'])
                ->with('m_nhomdvkcb',$m_nhomdvkcb)
                ->with('pageTitle','Thông tin hồ sơ thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(isset($inputs['manhom']) && isset($inputs['getmaxa'])) {
                $tennhom = NhomDvKcb::where('manhom', $inputs['manhom'])->first()->tennhom;
                $dv = Town::where('maxa', $inputs['getmaxa'])->first()->tendv;
                $checkct = DvKcbCtDf::where('maxa',$inputs['getmaxa'])
                    ->where('manhom',$inputs['manhom'])->count();
                if($checkct == 0){

                    $modeldm = DmDvKcb::where('manhom', $inputs['manhom'])->get();
                    foreach ($modeldm as $dm) {
                        $modelctnew = new DvKcbCtDf();
                        $modelctnew->maxa = $inputs['getmaxa'];
                        $modelctnew->manhom = $dm->manhom;
                        $modelctnew->magoc = $dm->magoc;
                        $modelctnew->madv = $dm->madv;
                        $modelctnew->capdo = $dm->capdo;
                        $modelctnew->tendichvu = $dm->tendichvu;
                        $modelctnew->dvt = $dm->dvt;
                        $modelctnew->save();
                    }
                }
                $modelct = DvKcbCtDf::where('maxa',$inputs['getmaxa'])
                    ->where('manhom',$inputs['manhom'])->get();
                return view('manage.dinhgia.dvkcb.kekhai.create')
                    ->with('maxa', $inputs['getmaxa'])
                    ->with('dv', $dv)
                    ->with('manhom', $inputs['manhom'])
                    ->with('tennhom', $tennhom)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Kê khai giá dịch vụ khám chữa bệnh thêm mới');
            }else
                dd('Lỗi!Bạn cần xem lại thao tác!');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new DvKcb();
            if($model->create($inputs)){
                $modelctdf = DvKcbCtDf::where('maxa',$inputs['maxa'])
                    ->where('manhom',$inputs['manhom']);

                foreach($modelctdf->get() as $ctdf){
                    $modelct = new DvKcbCt();
                    $modelct->manhom = $ctdf->manhom;
                    $modelct->magoc = $ctdf->magoc;
                    $modelct->madv = $ctdf->madv;
                    $modelct->capdo = $ctdf->capdo;
                    $modelct->tendichvu = $ctdf->tendichvu;
                    $modelct->dvt = $ctdf->dvt;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->giadv = $ctdf->giadv;
                    $model->ghichu = $ctdf->ghichu;
                    $model->sapxep = $ctdf->sapxep;
                    $modelct->save();
                }
            }
            $modelctdf->delete();
            return redirect('dichvukcb?&maxa='.$inputs['maxa'].'&trangthai='.$inputs['trangthai']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = DvKcb::findOrFail($id);
            $modelct = DvKcbCt::where('mahs',$model->mahs)
                    ->get();
            $tennhom = NhomDvKcb::where('manhom', $model->manhom)->first()->tennhom;
            $dv = Town::where('maxa',$model->maxa)->first()->tendv;
            return view('manage.dinhgia.dvkcb.kekhai.edit')
                ->with('dv', $dv)
                ->with('tennhom', $tennhom)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Kê khai giá dịch vụ khám chữa bệnh chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = DvKcb::findOrFail($id);
            $model->update($inputs);
            return redirect('dichvukcb?&maxa='.$model->maxa.'&trangthai='.$model->trangthai);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = DvKcb::findOrFail($id);
            $maxa = $model->maxa;
            $modelct = DvKcbCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('dichvukcb?&maxa='.$maxa);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = DvKcb::findOrFail($id);
            $modelct = DvKcbCt::where('mahs',$model->mahs)->get();
            $tennhom = NhomDvKcb::where('manhom', $model->manhom)->first()->tennhom;
            $dv = Town::where('maxa',$model->maxa)->first()->tendv;
            return view('manage.dinhgia.dvkcb.kekhai.show')
                ->with('dv', $dv)
                ->with('tennhom', $tennhom)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ dịch vụ khám chữa bệnh chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tendichvu'] = isset($inputs['tendichvu']) ? $inputs['tendichvu'] : '';
            $inputs['maxa'] =  isset($inputs['maxa']) ? $inputs['maxa'] : '';
            $inputs['manhom'] =  isset($inputs['manhom']) ? $inputs['manhom'] : '';
            $modelnhomtn = NhomDvKcb::where('theodoi','TD')->get();
            $model = DvKcbCt::join('dvkcb','dvkcb.mahs','=','dvkcbct.mahs')
                ->join('nhomdvkcb','nhomdvkcb.manhom','=','dvkcb.manhom')
                ->join('town','town.maxa','=','dvkcb.maxa')
                ->select('dvkcbct.*','dvkcb.soqd','dvkcb.ngayapdung','town.tendv',
                    'nhomdvkcb.tennhom')
                ->where('dvkcb.trangthai','HT')
                ->OrWhere('dvkcb.trangthai','CB');
            if($inputs['nam'] != '')
                $model = $model->whereYear('dvkcb.ngayapdung',$inputs['nam']);
            if($inputs['manhom'] != '')
                $model = $model->where('dvkcb.manhom','=',$inputs['manhom']);
            if($inputs['tendichvu'] != '')
                $model = $model->where('dvkcbct.tendichvu','like','%'.$inputs['tendichvu'].'%');

            $model = $model->get();
            return view('manage.dinhgia.dvkcb.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('tendichvu',$inputs['tendichvu'])
                ->with('manhom',$inputs['manhom'])
                ->with('model',$model)
                ->with('modelnhomtn',$modelnhomtn)
                ->with('pageTitle','Tìm kiếm thông tin dịch vụ khám chữa bệnh');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = DvKcb::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('dichvukcb?&trangthai=HT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = DvKcb::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('dichvukcb?&trangthai=HHT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = DvKcb::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('dichvukcb?&trangthai=CB&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

}
