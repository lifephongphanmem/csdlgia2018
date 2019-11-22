<?php

namespace App\Http\Controllers\manage\thuetn;

use App\District;
use App\Model\manage\dinhgia\thuetn\DmThueTn;
use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyen;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyenCt;
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
            $modellk = ThueTaiNguyen::where('nam',$inputs['namlk'])
                ->where('manhom',$inputs['manhom'])
                ->first();
            $modelbc =  ThueTaiNguyen::where('nam',$inputs['nambc'])
                ->where('manhom',$inputs['manhom'])
                ->first();
            foreach($model as $tn){
                if($tn->level == 1) {
                    if(isset($modellk))
                        $modelctlk = ThueTaiNguyenCt::where('mahs', $modellk->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('level', 1)
                            ->first();
                    if(isset($modelbc))
                        $modelctbc = ThueTaiNguyenCt::where('mahs', $modelbc->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('level', 1)
                            ->first();
                }elseif($tn->level == 2){
                    if(isset($modellk))
                        $modelctlk = ThueTaiNguyenCt::where('mahs', $modellk->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('level', 2)
                            ->first();
                    if(isset($modelbc))
                        $modelctbc = ThueTaiNguyenCt::where('mahs', $modelbc->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('level', 2)
                            ->first();
                }elseif($tn->level == 3){
                    if(isset($modellk))
                        $modelctlk = ThueTaiNguyenCt::where('mahs', $modellk->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('cap3', $tn->cap3)
                            ->where('level', 3)
                            ->first();
                    if(isset($modelbc))
                        $modelctbc = ThueTaiNguyenCt::where('mahs', $modelbc->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('cap3', $tn->cap3)
                            ->where('level', 3)
                            ->first();
                }elseif($tn->level == 4){
                    if(isset($modellk))
                        $modelctlk = ThueTaiNguyenCt::where('mahs', $modellk->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('cap3', $tn->cap3)
                            ->where('cap4', $tn->cap4)
                            ->where('level', 4)
                            ->first();
                    if(isset($modelbc))
                        $modelctbc = ThueTaiNguyenCt::where('mahs', $modelbc->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('cap3', $tn->cap3)
                            ->where('cap4', $tn->cap4)
                            ->where('level', 4)
                            ->first();
                }elseif($tn->level == 5){
                    if(isset($modellk))
                        $modelctlk = ThueTaiNguyenCt::where('mahs', $modellk->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('cap3', $tn->cap3)
                            ->where('cap4', $tn->cap4)
                            ->where('cap5', $tn->cap5)
                            ->where('level', 5)
                            ->first();
                    if(isset($modelbc))
                        $modelctbc = ThueTaiNguyenCt::where('mahs', $modelbc->mahs)
                            ->where('cap1', $tn->cap1)
                            ->where('cap2', $tn->cap2)
                            ->where('cap3', $tn->cap3)
                            ->where('cap4', $tn->cap4)
                            ->where('cap5', $tn->cap5)
                            ->where('level', 5)
                            ->first();
                }

                $tn->dongialk = isset($modelctlk) && isset($modellk) ? $modelctlk->gia : 0;

                $tn->dongiabc = isset($modelctbc)&& isset($modelbc) ? $modelctbc->gia : 0;
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
//                ->with('group1',$group2)
                ->with('pageTitle','Báo cáo tổng hợp thuế tài nguyên');

        }else
            return view('errors.notlogin');
    }
}
