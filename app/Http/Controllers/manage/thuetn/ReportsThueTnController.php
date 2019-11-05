<?php

namespace App\Http\Controllers\manage\thuetn;

use App\District;
use App\Model\manage\dinhgia\thuetn\DmThueTn;
use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyen;
use App\Town;
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
                    ->where('nam',$inputs['namlk'])
                    ->first();
                $modelbc = ThueTaiNguyen::where('manhom',$inputs['manhom'])
                    ->where('matn',$tn->matn)
                    ->where('nam',$inputs['nambc'])
                    ->first();
                $tn->dongialk = isset($modellk) ? $modellk->dongia : 0;
                $tn->dongiabc = isset($modelbc) ? $modelbc->dongia : 0;
            }


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
            return view('manage.dinhgia.thuetn.reports.Bc1')
                ->with('model',$model)
                ->with('m_nhomthuetn',$m_nhomthuetn)
                ->with('inputs',$inputs)
                ->with('pageTitle','Báo cáo tổng hợp thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }
}
