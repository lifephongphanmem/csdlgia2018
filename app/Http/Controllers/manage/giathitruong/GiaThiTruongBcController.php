<?php

namespace App\Http\Controllers\manage\giathitruong;

use App\District;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruong;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongDm;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongTt;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThiTruongBcController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $modeltt = GiaThiTruongTt::where('theodoi','TD')
                ->get();
            $donvis  = GiaThiTruongDm::join('district','district.mahuyen','=','giathitruongdm.mahuyen')
                ->select('district.tendv','giathitruongdm.mahuyen')
                ->groupBy('mahuyen','tendv')
                ->get();
            return view('manage.giathitruong.baocaoth.index')
                ->with('modeltt',$modeltt)
                ->with('donvis',$donvis)
                ->with('pageTitle','Báo cáo tổng hợp giá thị trường');
        }else
            return view('errors.notlogin');
    }
    public function baocaotonghop1(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelgr = GiaThiTruongDm::where('matt',$inputs['matt'])
                ->select('manhom','tennhom')
                ->groupBy('manhom','tennhom');
            if($inputs['mahuyen']!= 'all')
                $modelgr = $modelgr->where('mahuyen',$inputs['mahuyen']);
            $modelgr = $modelgr->get();

            $model = GiaThiTruongDm::where('matt',$inputs['matt'])
                ->where('theodoi','TD');
            if($inputs['mahuyen']!= 'all')
               $model = $model->where('mahuyen',$inputs['mahuyen']);
            $model = $model->get();
            foreach($model as $tt){
                $modelgialk = GiaThiTruong::join('giathitruongct','giathitruongct.mahs','=','giathitruong.mahs')
                    ->where('giathitruong.thang',$inputs['thanglk'])
                    ->where('giathitruong.nam',$inputs['namlk'])
                    ->where('giathitruong.trangthai','HT')
                    ->where('giathitruong.matt',$inputs['matt'])
                    ->where('giathitruongct.mahh',$tt->mahh);
                if($inputs['mahuyen']!= 'all')
                    $modelgialk = $modelgialk->where('giathitruong.mahuyen',$inputs['mahuyen']);
                $modelgialk = $modelgialk->first();

                $modelgia = GiaThiTruong::join('giathitruongct','giathitruongct.mahs','=','giathitruong.mahs')
                    ->where('giathitruong.thang',$inputs['thang'])
                    ->where('giathitruong.nam',$inputs['nam'])
                    ->where('giathitruong.trangthai','HT')
                    ->where('giathitruong.matt',$inputs['matt'])
                    ->where('giathitruongct.mahh',$tt->mahh);
                if($inputs['mahuyen']!= 'all')
                     $modelgia = $modelgia->where('giathitruong.mahuyen',$inputs['mahuyen']);
                $modelgia = $modelgia->first();

                $tt->dongialk = count($modelgialk)>0 ? $modelgialk->dongia : 0;
                $tt->dongia = count($modelgia)>0 ? $modelgia->dongia : 0;
                $tt->loaigiakt = (count($modelgialk)>0 ? $modelgialk->loaigia : '');
                $tt->loaigia = (count($modelgia)>0 ? $modelgia->loaigia : '');
                $tt->nguonttkt = (count($modelgialk)>0 ? $modelgialk->nguontt : '');
                $tt->nguontt = (count($modelgia)>0 ? $modelgia->nguontt : '');
                $tt->ghichukt = (count($modelgialk)>0 ? $modelgialk->ghichu : '');
                $tt->ghichu = (count($modelgia)>0 ? $modelgia->ghichu : '');
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
            return view('manage.giathitruong.baocaoth.baocaotonghop1')
                ->with('modelgr',$modelgr)
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Báo cáo tổng hợp giá thị trường');
        }else
            return view('errors.notlogin');
    }
}
