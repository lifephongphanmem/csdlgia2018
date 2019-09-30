<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\DmHhDvK;
use App\GiaHhDvK;
use App\GiaHhDvKCt;
use App\NhomHhDvK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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
                $modelidlk = GiaHhDvK::where('manhom',$inputs['manhom'])
                    ->where('district',$diaban->district)
                    ->where('ngayapdung','<',getDateToDb($inputs['ngayapdunglk']))
                    ->where('trangthai','CB')
                    ->max('id');
                if($modelidlk != null)
                    $idlk = $idlk.$modelidlk.',';
                $modelid = GiaHhDvK::where('manhom',$inputs['manhom'])
                    ->where('district',$diaban->district)
                    ->where('ngayapdung','<',getDateToDb($inputs['ngayapdung']))
                    ->where('trangthai','CB')
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

            $modelct = DmHhDvK::where('manhom',$inputs['manhom'])
                ->where('theodoi','TD')
                ->geT();
            foreach($modelct as $ct){
                $ttgialk = $ttlk->where('mahhdv',$ct->mahhdv)->avg('gia');
                $ct->giathlk = $ttgialk;
                $ttgia = $tt->where('mahhdv',$ct->mahhdv)->avg('gia');
                $ct->giath = $ttgia;
            }

            $tennhom = NhomHhDvK::where('manhom',$inputs['manhom'])->first()->tennhom;
            return view('manage.dinhgia.giahhdvk.reports.bc1')
                ->with('tennhom',$tennhom)
                ->with('inputs',$inputs)
                ->with('modelct',$modelct)
                ->with('pageTitle','Báo cáo giá hàng hóa, dịch vụ');

        }else
            return view('errors.notlogin');
    }

    public function bc2(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DmHhDvK::where('manhom',$inputs['manhom'])
                ->where('theodoi','TD')
                ->get();
            $mahslk = GiaHhDvK::where('thang',$inputs['thang'])
                ->where('nam',$inputs['nam'])
                ->wherein('trangthai',['HT','CB'])
                ->select('mahs')
                ->get();

            $ttgiahh = GiaHhDvKCt::wherein('mahs',$mahslk->toArray())
                ->where('gia','<>',0)
                ->get();
            foreach($model as $ct){
                $ttgia = $ttgiahh->where('mahhdv',$ct->mahhdv)->avg('gia');
                $ct->gia = $ttgia;
            }
            $tennhom = NhomHhDvK::where('manhom',$inputs['manhom'])->first()->tennhom;
            return view('manage.dinhgia.giahhdvk.reports.bc2')
                ->with('tennhom',$tennhom)
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Báo cáo giá hàng hóa, dịch vụ theo tháng');
        }else
            return view('errors.notlogin');
    }
}
