<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\DmHhDvK;
use App\GiaHhDvK;
use App\GiaHhDvKCt;
use App\NhomHhDvK;
use App\ThGiaHhDvK;
use App\ThGiaHhDvKCt;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpWord\PhpWord;

class ReportsHhDvKController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $modelnhomhhdvk = NhomHhDvK::all();
                return view('manage.dinhgia.giahhdvk.reports.index')
                    ->with('modelnhomhhdvk',$modelnhomhhdvk)
                    ->with('pageTitle','Báo cáo tổng hợp giá hàng hóa dịch vụ khác');
        }else
            return view('errors.notlogin');
    }

    public function bc1(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modeldiaban = DiaBanHd::where('level','H')
                ->get();
            $idlk = '';
            $id = '';
            foreach($modeldiaban as $diaban){
                $modelidlk = GiaHhDvK::where('matt',$inputs['matt'])
                    ->where('district',$diaban->district)
                    ->where('ngayapdung','<',getDateToDb($inputs['ngayapdunglk']))
                    ->where('trangthai','HT')
                    ->max('id');
                if($modelidlk != null)
                    $idlk = $idlk.$modelidlk.',';
                $modelid = GiaHhDvK::where('matt',$inputs['matt'])
                    ->where('district',$diaban->district)
                    ->where('ngayapdung','<',getDateToDb($inputs['ngayapdung']))
                    ->where('trangthai','HT')
                    ->max('id');
                if($modelid != null)
                    $id = $id.$modelid.',';
            }
            $mahslk = GiaHhDvK::wherein('id',explode(',',$idlk))
                ->select('mahs')
                ->get();

            $ttlk = GiaHhDvKCt::wherein('mahs',$mahslk->toArray())
                ->where('gia','<>',0)
                ->get();

            $mahs = GiaHhDvK::wherein('id',explode(',',$id))
                ->select('mahs')
                ->get();
            $tt  = GiaHhDvKCt::wherein('mahs',$mahs->toArray())
                ->where('gia','<>',0)
                ->get();

            $modelct = DmHhDvK::where('matt',$inputs['matt'])
                ->where('theodoi','TD')
                ->geT();
            foreach($modelct as $ct){
                $ttgialk = $ttlk->where('mahhdv',$ct->mahhdv)->avg('gia');
                $ct->giathlk = $ttgialk;
                $ttgia = $tt->where('mahhdv',$ct->mahhdv)->avg('gia');
                $ct->giath = $ttgia;
            }
            $modelgr = DmHhDvK::where('theodoi','TD')
                ->select('manhom','nhom')
                ->groupBy('manhom','nhom')
                ->get();
            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = getGeneralConfigs()['tendvcqhienthi'];
                $inputs['dv'] = getGeneralConfigs()['tendvhienthi'];
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }elseif(session('admin')->level == 'H'){
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }else{
                $modeldv = Town::where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }
            return view('manage.dinhgia.giahhdvk.reports.bc1')
                ->with('modelgr',$modelgr)
                ->with('inputs',$inputs)
                ->with('modelct',$modelct)
                ->with('pageTitle','Báo cáo giá hàng hóa, dịch vụ');

        }else
            return view('errors.notlogin');
    }

    public function bc2(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DmHhDvK::where('matt',$inputs['matt'])
                ->where('theodoi','TD')
                ->get();
            $mahs = ThGiaHhDvK::where('thang',$inputs['thang'])
                ->where('matt',$inputs['matt'])
                ->where('nam',$inputs['nam'])
                ->wherein('trangthai',['HT','CB'])
                ->first();
            $mahslk = ThGiaHhDvK::where('thang',$inputs['thanglk'])
                ->where('matt',$inputs['matt'])
                ->where('nam',$inputs['namlk'])
                ->wherein('trangthai',['HT','CB'])
                ->first();
            foreach($model as $ct){
                if(isset($mahs)) {
                    $ttgia = ThGiaHhDvKCt::where('mahs',$mahslk->mahs)
                        ->where('mahhdv', $ct->mahhdv)
                        ->first();
                    $ct->gia = $ttgia->gia;
                    $ct->loaigia = $ttgia->loaigia;
                    $ct->nguontt = $ttgia->nguontt;
                    $ct->ghichu = $ttgia->ghichu;
                }
                if(isset($mahslk)) {
                    $ttgialk = ThGiaHhDvKCt::where('mahs',$mahslk->mahs)
                        ->where('mahhdv',$ct->mahhdv)
                        ->first();
                    $ct->gialk = $ttgialk->gia;
                }
            }
            $modelgr = DmHhDvK::where('theodoi','TD')
                ->select('manhom','nhom')
                ->groupBy('manhom','nhom')
                ->get();
            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = getGeneralConfigs()['tendvcqhienthi'];
                $inputs['dv'] = getGeneralConfigs()['tendvhienthi'];
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }elseif(session('admin')->level == 'H'){
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }else{
                $modeldv = Town::where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }
            return view('manage.dinhgia.giahhdvk.reports.bc2')
                ->with('modelgr',$modelgr)
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Báo cáo giá hàng hóa, dịch vụ theo tháng');
        }else
            return view('errors.notlogin');
    }
}
