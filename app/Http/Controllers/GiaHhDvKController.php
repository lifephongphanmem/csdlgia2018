<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\DmHhDvK;
use App\GiaHhDvK;
use App\GiaHhDvKCt;
use App\GiaHhDvKCtDf;
use App\NhomHhDvK;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaHhDvKController extends Controller
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

            $model = GiaHhDvK::join('nhomhhdvk','nhomhhdvk.matt','=','giahhdvk.matt')
                ->select('giahhdvk.*', 'nhomhhdvk.tentt')
                ->where('giahhdvk.district', $inputs['district'])
                ->where('giahhdvk.nam',$inputs['nam']);
                //->where('giahhdvk.thang',$inputs['thang']);

            $model = $model->get();
            $m_nhom =array_column(NhomHhDvK::where('theodoi', 'TD')
                ->get()->toarray(), 'tentt','matt');
            $diaban = DiaBanHd::where('district',$inputs['district'])->first();
            return view('manage.dinhgia.giahhdvk.kekhai.index')
                ->with('model', $model)
                ->with('modeldb', $modeldb)
                ->with('inputs',$inputs)
                ->with('a_nhom', $m_nhom)
                ->with('diaban',$diaban)
                //->with('a_nhom',array_merge(array('ALL'=>'Tất cả hàng hóa'), $m_nhom))
                ->with('pageTitle', 'Thông tin báo cáo giá hàng hóa dịch vụ');

        } else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(isset($inputs['mattbc']) && isset($inputs['districtbc'])) {
                $modelkt = GiaHhDvK::where('matt',$inputs['mattbc'])
                    ->where('thang',$inputs['thangbc'])
                    ->where('nam',$inputs['nambc'])
                    //->where('phanloai',$inputs['phanloaibc'])
                    ->where('district',$inputs['districtbc'])
                    ->count();
                if($modelkt > 0){
                    dd('Bạn đã tạo báo cáo!Nếu thay đổi số liệu bạn cần xóa báo cáo của thời điểm đó rồi tạo lại báo cáo');
                }else {
                    $tennhom = NhomHhDvK::where('matt', $inputs['mattbc'])->first()->tentt;
                    $diaban = DiaBanHd::where('district', $inputs['districtbc'])->where('level', 'H')->first()->diaban;
                    $idlk = GiaHhDvK::where('trangthai', 'HT')
                        ->where('matt', $inputs['mattbc'])
                        ->where('district', $inputs['districtbc'])
                        ->max('id');
                    if($idlk != null){
                        $modellk = GiaHhDvK::where('id',$idlk)
                            ->first();
                        $inputs['soqdlk'] = $modellk->soqd;
                        $inputs['ngayapdunglk'] = $modellk->ngayapdung;
                    }
                    $inputs['mahs'] = $inputs['districtbc'].getdate()[0];
                    $del = GiaHhDvKCt::where('district',$inputs['districtbc'])
                        ->where('trangthai','CXD')->delete();
                    $modeldm = DmHhDvK::where('matt',$inputs['mattbc'])
                        ->get();
                    foreach($modeldm as $dm){
                        $modelctadd = new GiaHhDvKCt();
                        $modelctadd->mahs = $inputs['mahs'];
                        $modelctadd->trangthai = 'CXD';
                        $modelctadd->district = $inputs['districtbc'];
                        $modelctadd->manhom = $dm->manhom;
                        $modelctadd->nhom = $dm->nhom;
                        $modelctadd->mahhdv = $dm->mahhdv;
                        $modelctadd->tenhhdv = $dm->tenhhdv;
                        $modelctadd->dacdiemkt = $dm->dacdiemkt;
                        $modelctadd->dacdiemkt = $dm->dacdiemkt;
                        $modelctadd->loaigia = 'Giá bán lẻ';
                        $modelctadd->nguontt = 'Do cơ quan/đơn vị quản lý nhà nước có liên quan cung cấp/báo cáo theo quy định';
                        $modelctadd->dvt = $dm->dvt;
                        if($idlk != null){
                            $modelctlk = GiaHhDvKCt::where('mahs',$modellk->mahs)
                                ->where('mahhdv',$dm->mahhdv)
                                ->first();
                            $modelctadd->gialk = $modelctlk->gia;
                        }
                        $modelctadd->save();
                    }
                    $modelct = GiaHhDvKCt::where('mahs',$inputs['mahs'])
                        ->get();
                    return view('manage.dinhgia.giahhdvk.kekhai.create')
                        ->with('diaban', $diaban)
                        ->with('tennhom', $tennhom)
                        ->with('modelct',$modelct)
                        ->with('inputs',$inputs)
                        ->with('pageTitle', 'Báo cáo giá hàng hóa dịch vụ thêm mới');
                }
//                    if ($modelidlk != null) {
//                        $modellk = GiaHhDvK::where('id', $modelidlk)
//                            ->first();
////                        $modelctlk = GiaHhDvKCt::where('mahs', $modellk->mahs)
////                            ->get();
//                        $modeldel = GiaHhDvKCt::where('district', $inputs['districtbc'])
//                            ->where('matt', $inputs['matt'])
//                            ->where('trangthai','CXD')
//                            ->delete();
//                        $modeldm = DmHhDvK::where('matt', $inputs[',matt'])->get();
//                        foreach ($modeldm as $ct) {
//                            $gialk = GiaHhDvKCt::where('matt',$ct->matt)
//                                ->where('mahhdv',$ct->mahhdv)
//                                ->where('mahs',$modellk->mahs)
//                                ->first();
//                            $modelctnew = new GiaHhDvKCtDf();
//                            $modelctnew->district = $inputs['districtbc'];
//                            $modelctnew->matt = $ct->matt;
//                            $modelctnew->manhom = $ct->manhom;
//                            $modelctnew->nhom = $ct->nhom;
//                            $modelctnew->mahhdv = $ct->mahhdv;
//                            $modelctnew->tenhhdv = $ct->tenhhdv;
//                            $modelctnew->dacdiemkt = $ct->dacdiemkt;
//                            $modelctnew->dvt = $ct->dvt;
//                            $modelctnew->gialk = isset($gialk) ? $gialk->gia : 0;
//                            $modelctnew->save();
//                        }
//                    } else {
//                        $modellk = '';
//                        $checkct = GiaHhDvKCtDf::where('district', $inputs['districtbc'])
//                            ->where('manhom', $inputs['manhombc'])->count();
//                        if ($checkct == 0) {
//                            $modeldm = DmHhDvK::where('manhom', $inputs['manhombc'])->get();
//                            foreach ($modeldm as $dm) {
//                                $modelctnew = new GiaHhDvKCtDf();
//                                $modelctnew->district = $inputs['districtbc'];
//                                $modelctnew->manhom = $dm->manhom;
//                                $modelctnew->mahhdv = $dm->mahhdv;
//                                $modelctnew->tenhhdv = $dm->tenhhdv;
//                                $modelctnew->dacdiemkt = $dm->dacdiemkt;
//                                $modelctnew->dvt = $dm->dvt;
//                                $modelctnew->save();
//                            }
//                        }
//                    }
//                }

//                $modelct = GiaHhDvKCtDf::where('district',$inputs['districtbc'])
//                    ->where('manhom',$inputs['manhombc'])->get();

            }else
                dd('Lỗi!Bạn cần xem lại thao tác!');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['trangthai'] = 'CHT';
            if($inputs['ngayapdunglk'] != '')
                $inputs['ngayapdunglk'] = getDateToDb($inputs['ngayapdunglk']);
            else
                unset($inputs['ngayapdunglk']);

            $model = new GiaHhDvK();
            if($model->create($inputs)){
                $modelct = GiaHhDvKCt::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('giahhdvkhac?&district='.$inputs['district'].'&thang='.$inputs['thang'].'&nam='.$inputs['nam']);

        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = GiaHhDvK::findOrFail($id);
            $tennhom = NhomHhDvK::where('matt', $model->matt)->first()->tentt;
            $diaban = DiaBanHd::where('district',$model->district)->where('level', 'H')->first()->diaban;
            $modelct = GiaHhDvKCt::where('mahs',$model->mahs)
                ->get();
            $modelgr = GiaHhDvKCt::where('mahs',$model->mahs)
                ->select('manhom','nhom')
                ->groupBy('manhom','nhom')
                ->get();
            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = getGeneralConfigs()['tendvcqhienthi'];
                $inputs['dv'] = getGeneralConfigs()['tendvhienthi'];
                $inputs['diadanh'] = $diaban;
            }elseif(session('admin')->level == 'H'){
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = $diaban;
            }else{
                $modeldv = Town::where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = $diaban;
            }
            return view('manage.dinhgia.giahhdvk.reports.prints')
                ->with('diaban', $diaban)
                ->with('tennhom', $tennhom)
                ->with('modelct',$modelct)
                ->with('model',$model)
                ->with('modelgr',$modelgr)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Kê khai giá hàng hóa dịch vụ chi tiết');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = GiaHhDvK::findOrFail($id);
            $tennhom = NhomHhDvK::where('matt', $model->matt)->first()->tentt;
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
            if($inputs['ngayapdunglk'] != '')
                $inputs['ngayapdunglk'] = getDateToDb($inputs['ngayapdunglk']);
            else
                unset($inputs['ngayapdunglk']);
            $model = GiaHhDvK::findOrFail($id);
            $model->update($inputs);
            return redirect('giahhdvkhac?&district='.$model->district.'&thang='.$model->thang.'&nam='.$model->nam);

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
            return redirect('giahhdvkhac?&district='.$model->district.'&thang='.$model->thang.'&nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            $inputs['tenhhdv'] = isset($inputs['tenhhdv']) ? $inputs['tenhhdv'] : '';
            $inputs['district'] =  isset($inputs['district']) ? $inputs['district'] : '';
            $inputs['matt'] =  isset($inputs['matt']) ? $inputs['matt'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;

            $modeldb = DiaBanHd::where('level','H')->get();
            $modelnhomtn = NhomHhDvK::where('theodoi','TD')->get();
            $model = GiaHhDvKCt::join('giahhdvk','giahhdvk.mahs','=','giahhdvkct.mahs')
                ->join('nhomhhdvk','nhomhhdvk.matt','=','giahhdvk.matt')
                ->join('diabanhd','diabanhd.district','=','giahhdvk.district')
                ->select('giahhdvkct.*','giahhdvk.soqd','giahhdvk.ngayapdung','diabanhd.diaban',
                    'nhomhhdvk.tentt', 'giahhdvk.thang','giahhdvk.nam')
                ->whereIn('giahhdvk.trangthai',['HT','CB']);
            if($inputs['thang'] != 'all')
                $model = $model->where('giahhdvk.thang',$inputs['thang']);
            if($inputs['nam'] != 'all')
                $model = $model->where('giahhdvk.nam',$inputs['nam']);
            if($inputs['district'] != '')
                $model = $model->where('giahhdvk.district','=',$inputs['district']);
            if($inputs['matt'] != '')
                $model = $model->where('giahhdvk.matt','=',$inputs['matt']);
            if($inputs['tenhhdv'] != '')
                $model = $model->where('giahhdvkct.tenhhdv','like','%'.$inputs['tenhhdv'].'%');

            $model = $model->paginate($inputs['paginate']);

            return view('manage.dinhgia.giahhdvk.timkiem.index')
                ->with('inputs',$inputs)
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
            return redirect('giahhdvkhac?&district='.$model->district.'&thang='.$model->thang.'&nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaHhDvK::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            return redirect('giahhdvkhac?&district='.$model->district.'&thang='.$model->thang.'&nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaHhDvK::findOrFail($id);
            $model->congbo = 'CB';
            $model->save();
            return redirect('giahhdvkhac?&district='.$model->district.'&thang='.$model->thang.'&nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    function filemau(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
//                dd($inputs);
                if ($inputs['phanloai'] == 'HS') {
                    $model_nhom = NhomHhDvK::where('matt', $inputs['matt'])->first();
//                    dd($model_nhom);
                    if (session('admin')->level == 'T' || session('admin')->level == 'H')
                        $inputs['district'] = $inputs['diaban'];
                    else
                        $inputs['district'] = session('admin')->district;
//                    dd($inputs['district']);
                    //$diaban = DiaBanHd::where('district', $inputs['getdistrict'])->where('level', 'H')->first()->diaban;
                    $modelidlk = GiaHhDvK::where('trangthai', 'HT')
                        ->where('matt', $inputs['matt'])
                        ->where('district', $inputs['district'])
                        ->max('id');
                    if ($modelidlk != null) {
                        $modellk = GiaHhDvK::where('id', $modelidlk)->first();

                        $model = DmHhDvK::where('matt',$inputs['matt'])
                            ->where('theodoi','TD')
                            ->get();
                        foreach ($model as $ct) {
                            $modelctlk = GiaHhDvKCt::where('mahs', $modellk->mahs)
                                ->where('mahhdv',$ct->mahhdv)->first();
                            $ct->gialk = $modelctlk->gia;
                            $ct->loaigia = $modelctlk->loaigia;
                            $ct->nguontt = $modelctlk->nguontt;
                        }
                        Excel::create('DMHANGHOA', function ($excel) use ($model_nhom, $model) {
                            $excel->sheet('DMHANGHOA', function ($sheet) use ($model_nhom, $model) {
                                $sheet->loadView('manage.dinhgia.giahhdvk.excel.danhmuc')
                                    ->with('model_nhom', $model_nhom)
                                    ->with('model', $model)
                                    ->with('pageTitle', 'Danh mục hàng hóa');
                                //$sheet->setPageMargin(0.25);
                                $sheet->setAutoSize(false);
                                $sheet->setFontFamily('Tahoma');
                                $sheet->setFontBold(false);

                                //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                            });
                        })->download('xls');
                    } else
                        goto danhmuc;
                } else {
                    danhmuc:
                    $model_nhom = NhomHhDvK::where('matt',$inputs['matt'])->first();
                    $model = DmHhDvK::where('matt',$inputs['matt'])->where('theodoi','TD')->get();
//                    dd($inputs);
                    foreach ($model as $ct) {
                        $ct->loaigia = 'Giá bán lẻ';
                        $ct->nguontt = 'Do cơ quan/đơn vị quản lý nhà nước có liên quan cung cấp/báo cáo theo quy định';
                        $ct->gia = 0;
                        $ct->gialk = 0;
                    }
                    Excel::create('DMHANGHOA', function ($excel) use ($model_nhom, $model) {
                        $excel->sheet('DMHANGHOA', function ($sheet) use ($model_nhom, $model) {
                            $sheet->loadView('manage.dinhgia.giahhdvk.excel.danhmuc')
                                ->with('model_nhom', $model_nhom->sortBy('manhom'))
                                ->with('model', $model)
                                ->with('pageTitle', 'Danh mục hàng hóa');
                            //$sheet->setPageMargin(0.25);
                            $sheet->setAutoSize(false);
                            $sheet->setFontFamily('Tahoma');
                            $sheet->setFontBold(false);

                            //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                        });
                    })->download('xls');
                }
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function nhanexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $m_nhom =array_column(NhomHhDvK::where('theodoi', 'TD')
                ->get()->toarray(), 'tentt','matt');
            if(session('admin')->level == 'X')
                $inputs['district'] = session('admin')->district;

            return view('manage.dinhgia.giahhdvk.excel.information')
                ->with('a_nhom', $m_nhom)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Nhận dữ liệu hàng hóa từ file Excel');
        }else
            return view('errors.notlogin');
    }

    function import_excel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            //$inputs['phanloaibc'] = $inputs['phanloai'];
            $inputs['thangbc'] = $inputs['thang'];
            $inputs['nambc'] = $inputs['nam'];
            $inputs['districtbc'] = $inputs['district'];
            $inputs['mattbc'] = $inputs['matt'];
            //dd($inputs);
            $dels = GiaHhDvKCt::where('district',$inputs['district'])
                ->where('trangthai','CXD')->delete();
            $modelkt = GiaHhDvK::where('matt',$inputs['matt'])
                ->where('thang',$inputs['thang'])
                ->where('nam',$inputs['nam'])
                ->where('district',$inputs['district'])
                //->where('phanloai',$inputs['phanloai'])
                ->count();

            if($modelkt > 0)
                dd('Báo cáo đã tồn tại, bạn cần kiểm tra lại! Nếu thay đổi thông tin bạn cần xóa báo cáo và nhận lại file');
            else {
                $filename = $inputs['district'] . '_' . getdate()[0];
                $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
                $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
                $data = [];

                Excel::load($path, function ($reader) use (&$data, $inputs) {
                    $obj = $reader->getExcel();
                    $sheet = $obj->getSheet(0);
                    $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
                });
                //dd($data);
                $modeldel = GiaHhDvKCt::where('district', $inputs['district'])->where('trangthai', 'CXD')->delete();
                $inputs['mahs'] = $inputs['districtbc'].getdate()[0];
                for ($i = $inputs['tudong']; $i < ($inputs['tudong'] + $inputs['sodong']); $i++) {
                    //dd($data[$i]);
                    if (!isset($data[$i][$inputs['mahhdv']]) || $data[$i][$inputs['tenhhdv']] == '') {
                        continue;//Tên cán bộ rỗng => thoát
                    }
                    $modelctnew = new GiaHhDvKCt();
                    $modelctnew->mahs = $inputs['mahs'];
                    $modelctnew->district = $inputs['district'];
//                    $modelctnew->matt = $inputs['matt'];
                    $modelctnew->trangthai = 'CXD';
                    $modelctnew->manhom = $data[$i][$inputs['manhom']];
                    $modelctnew->nhom = $data[$i][$inputs['nhom']];
                    $modelctnew->mahhdv = $data[$i][$inputs['mahhdv']];
                    $modelctnew->tenhhdv = $data[$i][$inputs['tenhhdv']];
                    $modelctnew->dacdiemkt = $data[$i][$inputs['dacdiemkt']];
                    $modelctnew->dvt = $data[$i][$inputs['dvt']];
                    $modelctnew->loaigia = $data[$i][$inputs['loaigia']];
                    $modelctnew->gia = $data[$i][$inputs['gia']];
                    $modelctnew->gialk = $data[$i][$inputs['gialk']];
                    $modelctnew->nguontt = $data[$i][$inputs['nguontt']];
                    $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                    $modelctnew->save();
                }
                File::Delete($path);
                $tennhom = NhomHhDvK::where('matt', $inputs['matt'])->first()->tentt;
                $diaban = DiaBanHd::where('district', $inputs['district'])->where('level', 'H')->first()->diaban;
                $modelidlk = GiaHhDvK::where('trangthai', 'HT')
                    ->where('matt', $inputs['matt'])
                    ->where('district', $inputs['district'])
                    ->max('id');
                if ($modelidlk != null) {
                    $modellk = GiaHhDvK::where('id',$modelidlk)
                        ->first();
                    $inputs['soqdlk'] = $modellk->soqd;
                    $inputs['ngayapdunglk'] = $modellk->ngayapdung;
                }
                $modelct = GiaHhDvKCt::where('mahs', $inputs['mahs'])
                   ->get();
                return view('manage.dinhgia.giahhdvk.kekhai.create')
                    ->with('diaban', $diaban)
                    ->with('tennhom', $tennhom)
                    ->with('modelct', $modelct)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Kê khai giá hàng hóa dịch vụ thêm mới');
            }
        }else
            return view('errors.notlogin');
    }
}
