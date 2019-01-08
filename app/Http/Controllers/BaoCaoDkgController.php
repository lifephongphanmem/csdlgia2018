<?php

namespace App\Http\Controllers;

use App\DkgDoanhnghiep;
use App\dkghoso;
use App\dkghosoct;
use App\DmMhBinhOnGia;
use App\Town;
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
            $maxa = $m_dv->first()->maxa;
            $tenhh = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
            return view('manage.bog.dangky.reports.index')
                ->with('m_dv',$m_dv)
                ->with('maxa',$maxa)
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
            $phanloaidn = DkgDoanhnghiep::where('maxa',$model->maxa)->first()->phanloaidn;
            $tendn = DkgDoanhnghiep::where('maxa',$model->maxa)->first()->tendn;
            $modelct = dkghosoct::where('mahs',$model->mahs)->get();
            return view('manage.bog.dangky.reports.BC1')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('phanloaidn',$phanloaidn)
                ->with('tendn',$tendn)
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
                $a_t2 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '2')->get()->toarray(), 'ngaythuchien');
                $a_t3 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '3')->get()->toarray(), 'ngaythuchien');
                $a_t4 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '4')->get()->toarray(), 'ngaythuchien');
                $a_t5 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '5')->get()->toarray(), 'ngaythuchien');
                $a_t6 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '6')->get()->toarray(), 'ngaythuchien');
                $a_t7 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '7')->get()->toarray(), 'ngaythuchien');
                $a_t8 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '8')->get()->toarray(), 'ngaythuchien');
                $a_t9 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '9')->get()->toarray(), 'ngaythuchien');
                $a_t10 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '10')->get()->toarray(), 'ngaythuchien');
                $a_t11 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '11')->get()->toarray(), 'ngaythuchien');
                $a_t12 = array_column(dkghoso::join('dkghosoct','dkghoso.mahs','dkghosoct.mahs')                     ->where('maxa', $inputs['maxa'])
                    ->whereMonth('ngaythuchien', '12')->get()->toarray(), 'ngaythuchien');
                    $t1 = count($a_t1);
                    $t2 = count($a_t2);


                    $t3 = count($a_t3);

                    $t4 = count($a_t4);

                    $t5 = count($a_t5);

                    $t6 = count($a_t6);

                    $t7 = count($a_t7);

                    $t8 = count($a_t8);

                    $t9 = count($a_t9);

                    $t10 = count($a_t10);

                    $t11 = count($a_t11);

                    $t12 = count($a_t12);

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
                    ->with('t1', $t1)
                    ->with('t2', $t2)
                    ->with('t3', $t3)
                    ->with('t4', $t4)
                    ->with('t5', $t5)
                    ->with('t6', $t6)
                    ->with('t7', $t7)
                    ->with('t8', $t8)
                    ->with('t9', $t9)
                    ->with('t10', $t10)
                    ->with('t11', $t11)
                    ->with('t12', $t12)
                    ->with('pageTitle', 'BẢNG ĐĂNG KÝ MỨC GIÁ BÁN CỤ THỂ');
            }
            else
                return view('errors.nodata');
        }else
            return view('errors.notlogin');
    }
}
