<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\DmGiaDvGdDt;
use App\DmHhDvK;
use App\GiaHhDvK;
use App\GiaHhDvKCt;
use App\NhomHhDvK;
use App\ThGiaHhDvK;
use App\ThGiaHhDvKCt;
use App\ThGiaHhDvKCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class ThGiaHhDvKController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                //$inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : 'thang';
                $inputs['phanloai'] = 'thang';
                $m_nhom = NhomHhDvK::where('theodoi','TD')
                    ->get();
                $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : $m_nhom->first()->manhom;
                $model = ThGiaHhDvK::join('nhomhhdvk','nhomhhdvk.manhom','=','thgiahhdvk.manhom')
                    ->select('thgiahhdvk.*','nhomhhdvk.tennhom')
                    ->whereYear('ngaybc',$inputs['nam']);
                if($inputs['manhom'] != '')
                    $model = $model->where('thgiahhdvk.manhom',$inputs['manhom']);
                if($inputs['phanloai']!= '')
                    $model = $model->where('thgiahhdvk.phanloai',$inputs['phanloai']);
                $model = $model->get();

                return view('manage.dinhgia.giahhdvk.tonghop.index')
                    ->with('model',$model)
                    ->with('m_nhom',$m_nhom)
                    ->with('inputs',$inputs)
                    ->with('pageTitle','Tổng hợp giá hàng hóa dịch vụ khác');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngaychotbc'] = getDateToDb($inputs['ngaychotbc']);
                $modelcheck = ThGiaHhDvK::where('manhom',$inputs['manhombc'])
                    ->where('thang',$inputs['thangbc'])
                    ->where('nam',$inputs['nambc'])
                    ->where('phanloai',$inputs['phanloaibc'])
                    ->count();
                //dd($inputs['phanloaibc']);
                if($modelcheck>0){
                    dd('Đã có báo cáo, bạn cần kiểm tra lại! Nếu số liệu không đúng bạn cần xóa báo cáo trước để tạo báo cáo mới');
                }else {
                    $checkdf = ThGiaHhDvKCtDf::where('manhom', $inputs['manhombc'])
                        //->where('ngaychotbc', $inputs['ngaychotbc'])
                        ->delete();

                    $modeldiaban = DiaBanHd::where('level', 'H')
                        ->get();
                    $id = '';
                    foreach ($modeldiaban as $diaban) {
                        $modelid = GiaHhDvK::where('manhom', $inputs['manhombc'])
                            ->where('district', $diaban->district)
                            ->where('thang', $inputs['thangbc'])
                            ->where('nam', $inputs['nambc'])
                            //->where('phanloai',$inputs['phanloaibc'])
                            ->where('trangthai', 'HT')
                            ->first();
                        if ($modelid != null)
                            $id = $id . $modelid->id . ',';
                    }
                    //Lấy ra mahs kê khai
                    $modelhskk = GiaHhDvK::wherein('id', explode(',', $id))
                        ->select('mahs')
                        ->get();
                    //Lấy ra chi tiết các hồ sơ kê khai
                    $modelcthskk = GiaHhDvKCt::wherein('mahs', $modelhskk->toArray())
                        ->where('gia', '<>', 0)
                        ->get();
                    //dd($modelcthskk->select('mahhdv','tenhhdv','gia')->get()->toArray());


                    $modeldm = DmHhDvK::where('theodoi', 'TD')
                        ->where('manhom', $inputs['manhombc'])
                        ->select('mahhdv', 'tenhhdv', 'dvt')
                        ->get();
                    //dd($modeldm);

                    foreach ($modeldm as $dm) {

                        $ttgia = $modelcthskk->where('mahhdv', $dm->mahhdv)->avg('gia');
                        $modelct = new ThGiaHhDvKCtDf();
                        $modelct->manhom = $inputs['manhombc'];
                        $modelct->ngaychotbc = $inputs['ngaychotbc'];
                        $modelct->mahhdv = $dm->mahhdv;
                        $modelct->tenhhdv = $dm->tenhhdv;
                        $modelct->dvt = $dm->dvt;
                        $modelct->gia = $ttgia;
                        $modelct->save();

                    }
                    $modelct = ThGiaHhDvKCtDf::where('manhom', $inputs['manhombc'])
                        ->where('ngaychotbc', $inputs['ngaychotbc'])
                        ->get();

                    //dd($modelct);
                    $modelnhom = NhomHhDvK::where('manhom', $inputs['manhombc'])->first();
                    return view('manage.dinhgia.giahhdvk.tonghop.create')
                        ->with('modelct', $modelct)
                        ->with('modelnhom', $modelnhom)
                        ->with('inputs', $inputs)
                        ->with('pageTitle', 'Tổng hợp giá hàng hóa dịch vụ khác');
                }
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngaybc'] = getDateToDb($inputs['ngaybc']);
                $inputs['mahs'] = $inputs['manhom'].getdate()[0];
                $inputs['trangthai'] = 'CHT';
                $model = new ThGiaHhDvK();
                if($model->create($inputs)){
                    $modelctdf = ThGiaHhDvKCtDf::where('manhom',$inputs['manhom'])
                        //->where('ngaychotbc',$inputs['ngaychotbc'])
                        ->get();
                    foreach($modelctdf as $ctdf){
                        $modelct = new ThGiaHhDvKCt();
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->manhom = $inputs['manhom'];
                        $modelct->ngaychotbc = $inputs['ngaychotbc'];
                        $modelct->mahhdv = $ctdf->mahhdv;
                        $modelct->tenhhdv = $ctdf->tenhhdv;
                        $modelct->dvt = $ctdf->dvt;
                        $modelct->gia = $ctdf->gia;
                        $modelct->save();
                    }
                }
                return redirect('tonghopgiahhdvk?&manhom='.$inputs['manhom'].'&thang='.$inputs['thang'].'&nam='.$inputs['nam'].'&phanloai='.$inputs['phanloai']);
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = ThGiaHhDvK::findOrFail($id);
                $modelct = ThGiaHhDvKCt::where('mahs',$model->mahs)
                    ->get();
                $modelnhom = NhomHhDvK::where('manhom',$model->manhom)->first();
                return view('manage.dinhgia.giahhdvk.tonghop.show')
                    ->with('modelct',$modelct)
                    ->with('modelnhom',$modelnhom)
                    ->with('model',$model)
                    ->with('pageTitle','Tổng hợp giá hàng hóa dịch vụ khác');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (session('admin')->level == 'T' || session('admin')->level == 'H') {
            $model = ThGiaHhDvK::findOrFail($id);
            $modelct = ThGiaHhDvKCt::where('mahs',$model->mahs)
                ->get();
            $modelnhom = NhomHhDvK::where('manhom',$model->manhom)->first();
            return view('manage.dinhgia.giahhdvk.tonghop.edit')
                ->with('modelct',$modelct)
                ->with('modelnhom',$modelnhom)
                ->with('model',$model)
                ->with('pageTitle','Tổng hợp giá hàng hóa dịch vụ khác chỉnh sửa');
        }else
            return view('errors.perm');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngaybc'] = getDateToDb($inputs['ngaybc']);
                $model = ThGiaHhDvK::findOrFail($id);
                $model->update($inputs);
                return redirect('tonghopgiahhdvk?&manhom='.$model->manhom.'&thang='.$model->thang.'&nam='.$model->nam.'&phanloai='.$model->phanloai);

            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = ThGiaHhDvK::where('id',$inputs['iddelete'])
                    ->first();
                $modelct = ThGiaHhDvKCt::where('mahs',$model->mahs)->delete();
                $model->delete();

                return redirect('tonghopgiahhdvk');

            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = ThGiaHhDvK::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('tonghopgiahhdvk?&manhom='.$model->manhom.'&thang='.$model->thang.'&nam='.$model->nam.'&phanloai='.$model->phanloai);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = ThGiaHhDvK::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('tonghopgiahhdvk?&manhom='.$model->manhom.'&thang='.$model->thang.'&nam='.$model->nam.'&phanloai='.$model->phanloai);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = ThGiaHhDvK::findOrFail($id);
            $model->congbo = 'CB';
            $model->save();
            return redirect('tonghopgiahhdvk?&manhom='.$model->manhom.'&thang='.$model->thang.'&nam='.$model->nam.'&phanloai='.$model->phanloai);
        }else
            return view('errors.notlogin');
    }

    public function exportXML($id){
        $model = ThGiaHhDvK::findOrFail($id);
        $modelct = ThGiaHhDvKCt::where('mahs',$model->mahs)
            ->geT();
        $modeldm = NhomHhDvK::where('manhom',$model->manhom)->first();
        //dd($modelct);
        $data = '<?xml version="1.0" encoding="UTF-8"?>';
        $data .= '<title>'.$model->ttbc.',ngày báo cáo: '.getDayVn($model->ngaybc);
        $data .= '<name>'.$modeldm->manhom.'. '.$modeldm->tennhom;
        $data .= '<data>';
        foreach($modelct as $ct){
            $data .='<row>';
            $data .='<stt>'.$ct->mahhdv.'</stt>';
            $data .='<tenhhdv>'.$ct->tenhhdv.'</tenhhdv>';
            $data .='<dacdiemkt>'.$ct->dacdiemkt.'</dacdiemkt>';
            $data .='<dvt>'.$ct->dvt.'</dvt>';
            $data .='<loaigia></loaigia>';
            $data .='<dongialk>'.$ct->gialk.'</dongialk>';
            $data .='<dongia>'.$ct->gia.'</dongia>';
            $data .='<muctg>'.(($ct->gia)-($ct->gialk)).'</muctg>';
            $data .='<tyle>'.(number_format($ct->gialk) == 0 ? number_format($ct->gia) == 0 ? 0 : 100
                : round(number_format($ct->gia)/number_format($ct->gialk),2)).'</tyle>';
            $data .='<nguontin>'.$ct->nguontin.'</nguontin>';
            $data .='<ghichu>'.$ct->ghichu.'</ghichu>';
            $data .='</row>';
        }
        $data .='</data>';
        $data .='</name>';
        $data .='</title>';

        $fp ='hhdvk'.$model->id.'.xml';

        File::put(public_path('/xml/'.$fp),$data);
        return Response::download(public_path('/xml/'.$fp));
    }

    function exportEx($id){
        if (Session::has('admin')) {
            $model = ThGiaHhDvK::findOrFail($id);
            $modelct = ThGiaHhDvKCt::where('mahs',$model->mahs)
                ->get();
            $modelnhom = NhomHhDvK::where('manhom',$model->manhom)->first();

            Excel::create('THHANGHOA',function($excel) use($model,$modelct,$modelnhom){
                $excel->sheet('THHANGHOA', function($sheet) use($model,$modelct,$modelnhom){
                    $sheet->loadView('manage.dinhgia.giahhdvk.tonghop.show_excel')
                        ->with('modelct',$modelct)
                        ->with('modelnhom',$modelnhom)
                        ->with('model',$model)
                        ->with('pageTitle','Danh mục hàng hóa');
                    //$sheet->setPageMargin(0.25);
                    $sheet->setAutoSize(false);
                    $sheet->setFontFamily('Tahoma');
                    $sheet->setFontBold(false);

                    //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                });
            })->download('xls');

        } else
            return view('errors.notlogin');
    }

    public function createthang(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                //$inputs['ngaychotbct'] = getDateToDb($inputs['ngaychotbct']);//dd($inputs['phanloaibct']);
                /*$modelcheck = ThGiaHhDvK::where('manhom',$inputs['manhombct'])
                    ->where('thang',$inputs['thangbct'])
                    ->where('nam',$inputs['nambct'])
                    ->where('phanloai',$inputs['phanloaibct'])
                    ->count();
                if($modelcheck>0){
                    dd('Đã có báo cáo, bạn cần kiểm tra lại! Nếu số liệu không đúng bạn cần xóa báo cáo trước để tạo báo cáo mới');
                }else {
                    $checkdf = ThGiaHhDvKCtDf::where('manhom', $inputs['manhombct'])
                        //->where('ngaychotbc', $inputs['ngaychotbc'])
                        ->delete();

                    $modelid = ThGiaHhDvK::where('manhom', $inputs['manhombct'])
                        ->where('thang', $inputs['thangbct'])
                        ->where('nam', $inputs['nambct'])
                        ->where('trangthai', 'HT')
                        ->select('mahs')
                        ->get();
                    //Ra 2 hồ sơ nưa đầu và nửa cuối tháng



                    //Lấy ra mahs kê khai
                    //Lấy ra chi tiết các hồ sơ kê khai
                    $modelcthskk = ThGiaHhDvKCt::wherein('mahs', $modelid->toArray())
                        ->where('gia', '<>', 0)
                        ->get();
                    //dd($modelcthskk->select('mahhdv','tenhhdv','gia')->get()->toArray());

                    $modeldm = DmHhDvK::where('theodoi', 'TD')
                        ->where('manhom', $inputs['manhombct'])
                        ->select('mahhdv', 'tenhhdv', 'dvt')
                        ->get();
                    //dd($modeldm);

                    foreach ($modeldm as $dm) {

                        $ttgia = $modelcthskk->where('mahhdv', $dm->mahhdv)->avg('gia');
                        $modelct = new ThGiaHhDvKCtDf();
                        $modelct->manhom = $inputs['manhombct'];
                        $modelct->ngaychotbc = $inputs['ngaychotbct'];
                        $modelct->mahhdv = $dm->mahhdv;
                        $modelct->tenhhdv = $dm->tenhhdv;
                        $modelct->dvt = $dm->dvt;
                        $modelct->gia = $ttgia;
                        $modelct->save();

                    }
                    $modelct = ThGiaHhDvKCtDf::where('manhom', $inputs['manhombct'])
                        ->where('ngaychotbc', $inputs['ngaychotbct'])
                        ->get();

                    //dd($modelct);
                    $modelnhom = NhomHhDvK::where('manhom', $inputs['manhombct'])->first();
                    return view('manage.dinhgia.giahhdvk.tonghop.createthang')
                        ->with('modelct', $modelct)
                        ->with('modelnhom', $modelnhom)
                        ->with('inputs', $inputs)
                        ->with('pageTitle', 'Tổng hợp giá hàng hóa dịch vụ khác');
                }*/
                $modelcheck = ThGiaHhDvK::where('manhom',$inputs['manhombct'])
                    ->where('thang',$inputs['thangbct'])
                    ->where('nam',$inputs['nambct'])
                    ->where('phanloai',$inputs['phanloaibct'])
                    ->count();
                //dd($inputs['phanloaibc']);
                if($modelcheck>0){
                    dd('Đã có báo cáo, bạn cần kiểm tra lại! Nếu số liệu không đúng bạn cần xóa báo cáo trước để tạo báo cáo mới');
                }else {
                    $checkdf = ThGiaHhDvKCtDf::where('manhom', $inputs['manhombct'])
                        //->where('ngaychotbc', $inputs['ngaychotbc'])
                        ->delete();

                    $modeldiaban = DiaBanHd::where('level', 'H')
                        ->get();
                    $id = '';
                    foreach ($modeldiaban as $diaban) {
                        $modelid = GiaHhDvK::where('manhom', $inputs['manhombct'])
                            ->where('district', $diaban->district)
                            ->where('thang', $inputs['thangbct'])
                            ->where('nam', $inputs['nambct'])
                            //->where('phanloai',$inputs['phanloaibc'])
                            ->where('trangthai', 'HT')
                            ->first();
                        if ($modelid != null)
                            $id = $id . $modelid->id . ',';
                    }
                    //Lấy ra mahs kê khai
                    $modelhskk = GiaHhDvK::wherein('id', explode(',', $id))
                        ->select('mahs')
                        ->get();
                    //Lấy ra chi tiết các hồ sơ kê khai
                    $modelcthskk = GiaHhDvKCt::wherein('mahs', $modelhskk->toArray())
                        ->where('gia', '<>', 0)
                        ->get();
                    //dd($modelcthskk->select('mahhdv','tenhhdv','gia')->get()->toArray());


                    $modeldm = DmHhDvK::where('theodoi', 'TD')
                        ->where('manhom', $inputs['manhombct'])
                        ->select('mahhdv', 'tenhhdv', 'dvt','dacdiemkt')
                        ->get();
                    //dd($modeldm);
                    $idlk = ThGiaHhDvK::where('manhom',$inputs['manhombct'])
                        ->where('trangthai','HT')
                        ->where('phanloai','thang')
                        ->max('id');
                    $mahslk = ThGiaHhDvK::where('id',$idlk)->first()->mahs;
                    foreach ($modeldm as $dm) {
                        $ttgia = $modelcthskk->where('mahhdv', $dm->mahhdv)->avg('gia');
                        if($mahslk != '') {
                            $modellk = ThGiaHhDvKCt::where('mahs', $mahslk)
                                ->where('mahhdv', $dm->mahhdv)
                                ->first();
                            if(count($modellk)>0)
                                $gialk = $modellk->gia;
                            else
                                $gialk = 0;
                        }else
                            $gialk = 0;

                        $modelct = new ThGiaHhDvKCtDf();
                        $modelct->manhom = $inputs['manhombct'];
                        //$modelct->ngaychotbc = $inputs['ngaychotbct'];
                        $modelct->mahhdv = $dm->mahhdv;
                        $modelct->tenhhdv = $dm->tenhhdv;
                        $modelct->dacdiemkt = $dm->dacdiemkt;
                        $modelct->dvt = $dm->dvt;
                        $modelct->gia = $ttgia;
                        $modelct->gialk = $gialk;
                        $modelct->save();

                    }
                    $modelct = ThGiaHhDvKCtDf::where('manhom', $inputs['manhombct'])
                       //->where('ngaychotbc', $inputs['ngaychotbct'])
                        ->get();

                    //dd($modelct);
                    $modelnhom = NhomHhDvK::where('manhom', $inputs['manhombct'])->first();
                    return view('manage.dinhgia.giahhdvk.tonghop.createthang')
                        ->with('modelct', $modelct)
                        ->with('modelnhom', $modelnhom)
                        ->with('inputs', $inputs)
                        ->with('pageTitle', 'Tổng hợp giá hàng hóa dịch vụ khác');
                }
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }
}
