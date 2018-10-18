<?php

namespace App\Http\Controllers;

use App\NhomThueTn;
use App\ThueTaiNguyen;
use App\ThueTaiNguyenCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsThueTnController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $m_nhomthuetn = NhomThueTn::where('theodoi','TD')
                ->get();

            return view('manage.dinhgia.thuetn.reports.index')
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('pageTitle', 'Báo cáo tổng hợp thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }

    public function Bc1(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ThueTaiNguyenCt::join('thuetainguyen','thuetainguyenct.mahs','=','thuetainguyen.mahs')
                ->whereBetween('thuetainguyen.ngayapdung',[$inputs['ngaytu'], $inputs['ngayden']])
                ->where('thuetainguyen.manhom',$inputs['manhom'])
                ->select('thuetainguyenct.*','thuetainguyen.ngayapdung','thuetainguyen.soqd')
                ->get();
            $modelgr = ThueTaiNguyen::join('diabanhd','diabanhd.district','=','thuetainguyen.district')
                ->whereBetween('thuetainguyen.ngayapdung',[$inputs['ngaytu'], $inputs['ngayden']])
                ->where('thuetainguyen.manhom',$inputs['manhom'])
                ->select('diabanhd.diaban','thuetainguyen.ngayapdung','thuetainguyen.soqd','thuetainguyen.mahs')
                ->get();
            $inputs['tennhom'] = NhomThueTn::where('manhom',$inputs['manhom'])->first()->tennhom;
            return view('manage.dinhgia.thuetn.reports.Bc1')
                ->with('model',$model)
                ->with('modelgr',$modelgr)
                ->with('inputs',$inputs)
                ->with('pageTitle','Báo cáo tổng hợp thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }
}
