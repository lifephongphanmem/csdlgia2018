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
                ->with('pageTitle', 'Báo cáo tổng hợp tài sản thẩm định giá');
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
}
