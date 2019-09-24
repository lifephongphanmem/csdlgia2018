<?php

namespace App\Http\Controllers\manage\gianuocsachsh;

use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocSachShDm;
use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocSh;
use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocShCt;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiaNuocShBcController extends Controller
{
    public function index(){
        if(Session::has('admin')){
            $modelhs = GiaNuocSh::all();
            return view('manage.dinhgia.gianuocsh.reports.index')
                ->with('modelhs',$modelhs)
                ->with('pageTitle','Báo cáo giá nước sạch sinh hoạt');
        }else
            return view('errors.notlogin');
    }

    public function Bc1(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = GiaNuocSachShDm::all();
            foreach($model as $ct){
                $modellk = GiaNuocShCt::where('mahs',$inputs['mahslk'])
                    ->where('madoituong',$ct->madoituong)
                    ->first();
                $modelbc = GiaNuocShCt::where('mahs',$inputs['mahsbc'])
                    ->where('madoituong',$ct->madoituong)
                    ->first();
                $ct->gialk = $modellk->giachuathue;
                $ct->giabc = $modelbc->giachuathue;
            }
            $ttlk = GiaNuocSh::where('mahs',$inputs['mahslk'])->first();
            $ttbc = GiaNuocSh::where('mahs',$inputs['mahsbc'])->first();
            return view('manage.dinhgia.gianuocsh.reports.BcGiaNuocSh1')
                ->with('model',$model)
                ->with('ttlk',$ttlk)
                ->with('ttbc',$ttbc)
                ->with('pageTitle','Báo cáo giá nước sạch sinh hoạt');
        }else
            return view('errors.notlogin');
    }
}
