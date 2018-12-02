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
            $mahslk = GiaHhDvK::wherein('id',[explode(',',$idlk)])
                ->select('mahs')
                ->get();

            $ttlk = GiaHhDvKCt::wherein('mahs',$mahslk->toArray());

            $mahs = GiaHhDvK::wherein('id',[explode(',',$id)])
                ->select('mahs')
                ->get();
            $tt  = GiaHhDvKCt::wherein('mahs',$mahs->toArray());

            $modelct = DmHhDvK::where('manhom',$inputs['manhom'])
                ->where('theodoi','TD')
                ->geT();
            foreach($modelct as $ct){
                $ttgialk = $ttlk->where('mahhdv',$ct->mahhdv)->get();
                $slgialk = count($ttlk);
                $tonggialk = 0;
                foreach($ttgialk as $gialk){
                    $tonggialk = $tonggialk + $gialk->gia;
                }
                $ct->giathlk = $slgialk == 0 ? 0 : $tonggialk/$slgialk;
                $ttgia = $tt->where('mahhdv',$ct->mahhdv)->get();
                $slgia = count($tt);
                $tonggia = 0;
                foreach($ttgia as $gia){
                    $tonggia = $tonggia + $gia->gia;
                }
                $ct->giath = $slgia == 0 ? 0 : $tonggia/$slgialk;
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
}
