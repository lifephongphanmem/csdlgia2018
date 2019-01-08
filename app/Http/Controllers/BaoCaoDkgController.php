<?php

namespace App\Http\Controllers;

use App\DkgDoanhnghiep;
use App\dkghoso;
use App\dkghosoct;
use App\DmMhBinhOnGia;
use App\Town;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BaoCaoDkgController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $m_dv = DkgDoanhnghiep::where('phanloai',$inputs['ma'])->get();
            $tenhh = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
            return view('manage.bog.dangky.reports.index')
                ->with('m_dv',$m_dv)
                ->with('nam', $inputs['nam'])
                ->with('tenhh',$tenhh)
                ->with('phanloai',$inputs['ma'])
                ->with('pageTitle', 'Báo cáo mặt hàng đăng ký giá');
        }else
            return view('errors.notlogin');
    }

    public function Bc1($id){
        if (Session::has('admin')) {
            $model = dkghoso::where('id',$id)->first();
            $modeldn = Company::where('maxa',$model->maxa)
                ->where('pl',$model->phanloai)
                ->where('level','DKG')
                ->first();
            $modelct = dkghosoct::where('mahs',$model->mahs)->get();
            return view('manage.bog.dangky.reports.BC1')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modeldn',$modeldn)
                ->with('pageTitle', 'BẢNG ĐĂNG KÝ MỨC GIÁ BÁN CỤ THỂ');

        }else
            return view('errors.notlogin');
    }
    public function BcMhBog(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            //dd($inputs);
            $donvi =DkgDoanhnghiep::where('maxa',$inputs['maxa'])->get();
            $model = dkghosoct::join('dkghoso','dkghoso.mahs','dkghosoct.mahs')
                ->select('dkghosoct.tenhhdv','dkghoso.ngaythuchien','dkghoso.maxa')
                ->where('dkghoso.maxa',$inputs['maxa'])->get();
            if(count($model)>0) {
                $m_dkg = dkghosoct::join('dkghoso', 'dkghoso.mahs', 'dkghosoct.mahs')
                    ->select('dkghosoct.tenhhdv', 'dkghosoct.mucgiamoi', 'dkghoso.ngaythuchien','dkghoso.maxa')
                    ->where('dkghoso.maxa', $inputs['maxa'])->get();
                foreach ($model as $chitiet) {
                    $chitiet->t12 = 0;
                }
                $a_t1 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '1')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t2 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '2')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t3 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '3')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t4 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '4')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t5 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '5')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t6 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '6')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t7 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '7')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t8 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '8')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t9 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '9')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t10 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '10')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t11 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '11')->distinct()->get()->toarray(), 'ngaythuchien');
                $a_t12 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')
                    ->select('ngaythuchien')
                    ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '12')->distinct()->get()->toarray(), 'ngaythuchien');
                $mh = DmMhBinhOnGia::where('phanloai', $inputs['phanloai'])->first()->hienthi;
                //dd($model->toarray());
                //dd($t11);
                return view('manage.bog.dangky.reports.BcMhBog')
                    ->with('model', $model)
                    ->with('mh', $mh)
                    ->with('donvi', $donvi)
                    ->with('m_dkg', $m_dkg)
                    ->with('nam', $inputs['namhs'])
                    ->with('a_t12', $a_t12)
                    ->with('a_t1', $a_t1)
                    ->with('a_t2', $a_t2)
                    ->with('a_t3', $a_t3)
                    ->with('a_t4', $a_t4)
                    ->with('a_t5', $a_t5)
                    ->with('a_t6', $a_t6)
                    ->with('a_t7', $a_t7)
                    ->with('a_t8', $a_t8)
                    ->with('a_t9', $a_t9)
                    ->with('a_t10', $a_t10)
                    ->with('a_t11', $a_t11)
                    ->with('pageTitle', 'BẢNG ĐĂNG KÝ MỨC GIÁ BÁN CỤ THỂ');
            }
            else
                return view('errors.nodata');
        }else
            return view('errors.notlogin');
    }
}
