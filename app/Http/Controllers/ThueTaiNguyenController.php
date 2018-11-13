<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\DmThueTn;
use App\NhomThueTn;
use App\ThueTaiNguyen;
use App\ThueTaiNguyenCt;
use App\ThueTaiNguyenCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThueTaiNguyenController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldb = DiaBanHd::where('level','H')->get();
            if(session('admin')->level == 'X') {
                $inputs['district'] = session('admin')->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
            }else {
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $modeldb->first()->district;
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
            }

            $model = ThueTaiNguyen::join('nhomthuetn','nhomthuetn.manhom','=','thuetainguyen.manhom')
                ->select('thuetainguyen.*','nhomthuetn.tennhom')
                ->where('thuetainguyen.district',$inputs['district']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);

            $model=$model->get();
            $m_nhomthuetn = NhomThueTn::where('theodoi','TD')
                ->get();
            return view('manage.dinhgia.thuetn.kekhai.index')
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('nam',$inputs['nam'])
                ->with('district',$inputs['district'])
                ->with('trangthai',$inputs['trangthai'])
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('pageTitle','Thông tin hồ sơ thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(isset($inputs['manhom']) && isset($inputs['getdistrict'])) {
                $tennhom = NhomThueTn::where('manhom', $inputs['manhom'])->first()->tennhom;
                $diaban = DiaBanHd::where('district', $inputs['getdistrict'])->where('level', 'H')->first()->diaban;
                $checkct = ThueTaiNguyenCtDf::where('district',$inputs['getdistrict'])
                    ->where('manhom',$inputs['manhom'])->count();
                if($checkct == 0){

                    $modeldm = DmThueTn::where('manhom', $inputs['manhom'])->get();
                    foreach ($modeldm as $dm) {
                        $modelctnew = new ThueTaiNguyenCtDf();
                        $modelctnew->district = $inputs['getdistrict'];
                        $modelctnew->manhom = $dm->manhom;
                        $modelctnew->magoc = $dm->magoc;
                        $modelctnew->mahh = $dm->mahh;
                        $modelctnew->capdo = $dm->capdo;
                        $modelctnew->tenhh = $dm->tenhh;
                        $modelctnew->dvt = $dm->dvt;
                        $modelctnew->save();
                    }
                }
                $modelct = ThueTaiNguyenCtDf::where('district',$inputs['getdistrict'])
                    ->where('manhom',$inputs['manhom'])->get();
                return view('manage.dinhgia.thuetn.kekhai.create')
                    ->with('district', $inputs['getdistrict'])
                    ->with('diaban', $diaban)
                    ->with('manhom', $inputs['manhom'])
                    ->with('tennhom', $tennhom)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Kê khai thuê tài nguyên thêm mới');
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
            $model = new ThueTaiNguyen();
            if($model->create($inputs)){
                $modelctdf = ThueTaiNguyenCtDf::where('district',$inputs['district'])
                    ->where('manhom',$inputs['manhom']);

                foreach($modelctdf->get() as $ctdf){
                    $modelct = new ThueTaiNguyenCt();
                    $modelct->manhom = $ctdf->manhom;
                    $modelct->magoc = $ctdf->magoc;
                    $modelct->mahh = $ctdf->mahh;
                    $modelct->capdo = $ctdf->capdo;
                    $modelct->tenhh = $ctdf->tenhh;
                    $modelct->dvt = $ctdf->dvt;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->giatttn = $ctdf->giatttn;
                    $modelct->save();
                }
            }
            $modelctdf->delete();
            return redirect('thuetainguyen?&district='.$inputs['district'].'&trangthai='.$inputs['trangthai']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = ThueTaiNguyen::findOrFail($id);
            $modelct = ThueTaiNguyenCt::where('mahs',$model->mahs)->get();
            $tennhom = NhomThueTn::where('manhom', $model->manhom)->first()->tennhom;
            $diaban = DiaBanHd::where('district', $model->district)->where('level', 'H')->first()->diaban;
            return view('manage.dinhgia.thuetn.kekhai.edit')
                ->with('diaban', $diaban)
                ->with('tennhom', $tennhom)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Kê khai thuê tài nguyên chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = ThueTaiNguyen::findOrFail($id);
            $model->update($inputs);
            return redirect('thuetainguyen?&district='.$model->district.'&trangthai='.$model->trangthai);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = ThueTaiNguyen::findOrFail($id);
            $district = $model->district;
            $modelct = ThueTaiNguyenCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thuetainguyen?&district='.$district.'&trangthai=CHT');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = ThueTaiNguyen::findOrFail($id);
            $modelct = ThueTaiNguyenCt::where('mahs',$model->mahs)->get();
            $tennhom = NhomThueTn::where('manhom', $model->manhom)->first()->tennhom;
            $diaban = DiaBanHd::where('district', $model->district)->where('level', 'H')->first()->diaban;
            return view('manage.dinhgia.thuetn.kekhai.show')
                ->with('diaban', $diaban)
                ->with('tennhom', $tennhom)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ thuế tài nguyên chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
            $inputs['district'] =  isset($inputs['district']) ? $inputs['district'] : '';
            $inputs['manhom'] =  isset($inputs['manhom']) ? $inputs['manhom'] : '';
            $modeldb = DiaBanHd::where('level','H')->get();
            $modelnhomtn = NhomThueTn::where('theodoi','TD')->get();
            $model = ThueTaiNguyenCt::join('thuetainguyen','thuetainguyen.mahs','=','thuetainguyenct.mahs')
                ->join('nhomthuetn','nhomthuetn.manhom','=','thuetainguyen.manhom')
                ->join('diabanhd','diabanhd.district','=','thuetainguyen.district')
                ->select('thuetainguyenct.*','thuetainguyen.soqd','thuetainguyen.ngayapdung','diabanhd.diaban',
                    'nhomthuetn.tennhom')
                ->whereIn('thuetainguyen.trangthai',['HT','CB']);
            if($inputs['nam'] != '')
                $model = $model->whereYear('thuetainguyen.ngayapdung',$inputs['nam']);
            if($inputs['district'] != '')
                $model = $model->where('thuetainguyen.district','=',$inputs['district']);
            if($inputs['manhom'] != '')
                $model = $model->where('thuetainguyen.manhom','=',$inputs['manhom']);
            if($inputs['tenhh'] != '')
                $model = $model->where('thuetainguyenct.tenhh','like','%'.$inputs['tenhh'].'%');

            $model = $model->get();
            return view('manage.dinhgia.thuetn.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('tenhh',$inputs['tenhh'])
                ->with('district',$inputs['district'])
                ->with('manhom',$inputs['manhom'])
                ->with('model',$model)
                ->with('modeldb',$modeldb)
                ->with('modelnhomtn',$modelnhomtn)
                ->with('pageTitle','Tìm kiếm thông tin thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thuetainguyen?&trangthai=HT&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thuetainguyen?&trangthai=HHT&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = ThueTaiNguyen::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thuetainguyen?&trangthai=CB&district='.$model->district);
        }else
            return view('errors.notlogin');
    }
}
