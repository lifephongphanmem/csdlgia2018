<?php

namespace App\Http\Controllers\manage\thuetn;

use App\Model\manage\dinhgia\thuetn\DmThueTn;
use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyen;
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
            $m_nhomthuetn = NhomThueTn::where('manhom',$inputs['manhom'])
                ->first();
            $model = DmThueTn::where('manhom',$inputs['manhom'])
                ->get();
            foreach($model as $tn){
                $modellk = ThueTaiNguyen::where('manhom',$inputs['manhom'])
                    ->where('matn',$tn->matn)
                    ->where('nam','namlk')
                    ->firsT();
                $modelbc = ThueTaiNguyen::where('manhom',$inputs['manhom'])
                    ->where('matn',$tn->matn)
                    ->where('nam','nambc')
                    ->firsT();
                $tn->dongialk = isset($modellk) ? $modellk->dongia : 0;
                $tn->dongiabc = isset($modelbc) ?$modelbc->dongia : 0;
            }
            return view('manage.dinhgia.thuetn.reports.Bc1')
                ->with('model',$model)
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('inputs',$inputs)
                ->with('pageTitle','Báo cáo tổng hợp thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }
}
