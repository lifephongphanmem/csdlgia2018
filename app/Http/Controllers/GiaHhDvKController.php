<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\DmHhDvK;
use App\GiaHhDvK;
use App\GiaHhDvKCt;
use App\GiaHhDvKCtDf;
use App\GiaRungCt;
use App\GiaRungCtDf;
use App\NhomHhDvK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaHhDvKController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            if (session('admin')->level == 'T') {
                $modeldb = DiaBanHd::where('level', 'H')->get();
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $modeldb->first()->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
            } elseif (session('admin')->level == 'H') {
                $modeldb = DiaBanHd::where('level', 'H')->get();
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $modeldb->first()->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
            } else {
                $modeldb = DiaBanHd::where('level', 'H')->where('district', session('admin')->district)->get();
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : session('admin')->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
            }


            $model = GiaHhDvK::join('nhomhhdvk','nhomhhdvk.manhom','=','giahhdvk.manhom')
                ->select('giahhdvk.*', 'nhomhhdvk.tennhom')
                ->where('giahhdvk.district', $inputs['district']);
            if ($inputs['trangthai'] != '')
                $model = $model->where('trangthai', $inputs['trangthai']);

            $model = $model->get();
            $m_nhom = NhomHhDvK::where('theodoi', 'TD')
                ->get();
            return view('manage.dinhgia.giahhdvk.kekhai.index')
                ->with('model', $model)
                ->with('modeldb', $modeldb)
                ->with('nam', $inputs['nam'])
                ->with('district', $inputs['district'])
                ->with('trangthai', $inputs['trangthai'])
                ->with('m_nhom', $m_nhom)
                ->with('pageTitle', 'Thông tin hồ sơ giá hàng hóa dịch vụ');

        } else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(isset($inputs['manhom']) && isset($inputs['getdistrict'])) {
                $tennhom = NhomHhDvK::where('manhom', $inputs['manhom'])->first()->tennhom;
                $diaban = DiaBanHd::where('district', $inputs['getdistrict'])->where('level', 'H')->first()->diaban;
                $checkct = GiaHhDvKCtDf::where('district',$inputs['getdistrict'])
                    ->where('manhom',$inputs['manhom'])->count();
                if($checkct == 0){

                    $modeldm = DmHhDvK::where('manhom', $inputs['manhom'])->get();
                    foreach ($modeldm as $dm) {
                        $modelctnew = new GiaHhDvKCtDf();
                        $modelctnew->district = $inputs['getdistrict'];
                        $modelctnew->manhom = $dm->manhom;
                        $modelctnew->mahhdv = $dm->mahhdv;
                        $modelctnew->tenhhdv = $dm->tenhhdv;
                        $modelctnew->dacdiemkt = $dm->dacdiemkt;
                        $modelctnew->dvt = $dm->dvt;
                        $modelctnew->save();
                    }
                }
                $modelct = GiaHhDvKCtDf::where('district',$inputs['getdistrict'])
                    ->where('manhom',$inputs['manhom'])->get();
                return view('manage.dinhgia.giahhdvk.kekhai.create')
                    ->with('district', $inputs['getdistrict'])
                    ->with('diaban', $diaban)
                    ->with('manhom', $inputs['manhom'])
                    ->with('tennhom', $tennhom)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Kê khai giá hàng hóa dịch vụ thêm mới');
            }else
                dd('Lỗi!Bạn cần xem lại thao tác!');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['mahs'] = $inputs['district'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new GiaHhDvK();
            if($model->create($inputs)){
                $modelctdf = GiaHhDvKCtDf::where('district',$inputs['district'])
                    ->where('manhom',$inputs['manhom']);

                foreach($modelctdf->get() as $ctdf){
                    $modelct = new GiaHhDvKCt();
                    $modelct->manhom = $ctdf->manhom;
                    $modelct->mahhdv = $ctdf->mahhdv;
                    $modelct->tenhhdv = $ctdf->tenhhdv;
                    $modelct->dacdiemkt = $ctdf->dacdiemkt;
                    $modelct->dvt = $ctdf->dvt;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->giatoithieu = $ctdf->giatoithieu;
                    $modelct->giatoida = $ctdf->giatoida;
                    $modelct->save();
                }
            }
            $modelctdf->delete();
            return redirect('giahhdvkhac?&district='.$inputs['district'].'&trangthai='.$inputs['trangthai']);

        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = GiaHhDvK::findOrFail($id);
                $tennhom = NhomHhDvK::where('manhom', $model->manhom)->first()->tennhom;
                $diaban = DiaBanHd::where('district',$model->district)->where('level', 'H')->first()->diaban;
                $modelct = GiaHhDvKCt::where('mahs',$model->mahs)
                    ->get();
                return view('manage.dinhgia.giahhdvk.kekhai.show')
                    ->with('diaban', $diaban)
                    ->with('tennhom', $tennhom)
                    ->with('modelct',$modelct)
                    ->with('model',$model)
                    ->with('pageTitle', 'Kê khai giá hàng hóa dịch vụ chi tiết');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = GiaHhDvK::findOrFail($id);
            $tennhom = NhomHhDvK::where('manhom', $model->manhom)->first()->tennhom;
            $diaban = DiaBanHd::where('district',$model->district)->where('level', 'H')->first()->diaban;
            $modelct = GiaHhDvKCt::where('mahs',$model->mahs)
                ->get();
            return view('manage.dinhgia.giahhdvk.kekhai.edit')
                ->with('diaban', $diaban)
                ->with('tennhom', $tennhom)
                ->with('modelct',$modelct)
                ->with('model',$model)
                ->with('pageTitle', 'Kê khai giá hàng hóa dịch vụ chỉnh sửa');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = GiaHhDvK::findOrFail($id);
            $model->update($inputs);
            return redirect('giahhdvkhac?&district='.$model->district.'&trangthai='.$model->trangthai);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaHhDvK::findOrFail($id);
            $district = $model->district;
            $modelct = GiaHhDvKCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('giahhdvkhac?&district='.$district);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhhdv'] = isset($inputs['tenhhdv']) ? $inputs['tenhhdv'] : '';
            $inputs['district'] =  isset($inputs['district']) ? $inputs['district'] : '';
            $inputs['manhom'] =  isset($inputs['manhom']) ? $inputs['manhom'] : '';
            $modeldb = DiaBanHd::where('level','H')->get();
            $modelnhomtn = NhomHhDvK::where('theodoi','TD')->get();
            $model = GiaHhDvKCt::join('giahhdvk','giahhdvk.mahs','=','giahhdvkct.mahs')
                ->join('nhomhhdvk','nhomhhdvk.manhom','=','giahhdvkct.manhom')
                ->join('diabanhd','diabanhd.district','=','giahhdvk.district')
                ->select('giahhdvkct.*','giahhdvk.soqd','giahhdvk.ngayapdung','diabanhd.diaban',
                    'nhomhhdvk.tennhom')
                ->where('giahhdvk.trangthai','HT')
                ->OrWhere('giahhdvk.trangthai','CB');
            if($inputs['nam'] != '')
                $model = $model->whereYear('giahhdvk.ngayapdung',$inputs['nam']);
            if($inputs['district'] != '')
                $model = $model->where('giahhdvk.district','=',$inputs['district']);
            if($inputs['manhom'] != '')
                $model = $model->where('giahhdvk.manhom','=',$inputs['manhom']);
            if($inputs['tenhhdv'] != '')
                $model = $model->where('giahhdvkct.tenhhdv','like','%'.$inputs['tenhhdv'].'%');

            $model = $model->get();
            return view('manage.dinhgia.giahhdvk.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('tenhhdv',$inputs['tenhhdv'])
                ->with('district',$inputs['district'])
                ->with('manhom',$inputs['manhom'])
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('modelnhomtn',$modelnhomtn)
                ->with('pageTitle','Tìm kiếm thông tin giá hàng hóa dịch vụ khác');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaHhDvK::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('giahhdvkhac?&trangthai=HT&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaHhDvK::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('giahhdvkhac?&trangthai=HHT&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaHhDvK::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('giahhdvkhac?&trangthai=CB&district='.$model->district);
        }else
            return view('errors.notlogin');
    }
}
