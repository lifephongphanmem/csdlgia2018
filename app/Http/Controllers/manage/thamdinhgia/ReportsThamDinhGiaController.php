<?php

namespace App\Http\Controllers\manage\thamdinhgia;

use App\DiaBanHd;
use App\Model\manage\thamdinhgia\ThamDinhGiaCt;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsThamDinhGiaController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $m_dv = Town::all();
            $maxa = $m_dv->first()->maxa;

            return view('manage.thamdinhgia.reports.index')
                ->with('m_dv',$m_dv)
                ->with('maxa',$maxa)
                ->with('pageTitle', 'Báo cáo tổng hợp tài sản thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function Bc1(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ThamDinhGiaCt::join('thamdinhgia','thamdinhgia.mahs','=','thamdinhgiact.mahs')
                ->whereBetween('thamdinhgia.thoidiem',[$inputs['ngaytu'], $inputs['ngayden']])
                ->select('thamdinhgiact.*','thamdinhgia.diadiem','thamdinhgia.thoidiem','thamdinhgia.ppthamdinh','thamdinhgia.mucdich'
                ,'thamdinhgia.dvyeucau','thamdinhgia.thoihan');
            if($inputs['maxa'] != '')
                $model = $model->where('thamdinhgia.maxa',$inputs['maxa']);
            $model = $model->get();
            return view('manage.thamdinhgia.reports.BC1')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Phụ lục 5-TT142/2015/BTC');

        }else
            return view('errors.notlogin');
    }

}
