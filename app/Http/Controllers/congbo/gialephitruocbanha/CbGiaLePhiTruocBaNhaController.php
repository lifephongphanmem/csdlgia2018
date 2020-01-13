<?php

namespace App\Http\Controllers\congbo\gialephitruocbanha;

use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNha;
use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNhaCtClcl;
use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNhaCtXdm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CbGiaLePhiTruocBaNhaController extends Controller
{
    public function index(Request $request){
        $inputs = $request->all();
        $model = GiaLpTbNha::where('trangthai','CB')
            ->get();
        return view('congbo.GiaThueTruocBaNha.index')
            ->with('model',$model)
            ->with('pageTitle', 'Công bố giá lệ phí trước bạ nhà');
    }

    public function show($id){
        $model = GiaLpTbNha::findOrFail($id);
        $modelctxdm = GiaLpTbNhaCtXdm::where('mahs',$model->mahs)
            ->get();
        $modelctclcl = GiaLpTbNhaCtClcl::where('mahs',$model->mahs)
            ->get();
        $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
        return view('manage.gialephitruocbanha.kekhai.show')
            ->with('model',$model)
            ->with('modelctxdm',$modelctxdm)
            ->with('modelctclcl',$modelctclcl)
            ->with('inputs',$inputs)
            ->with('pageTitle', 'Thông tin giá tính lệ phí trước bạ đối với nhà');
    }
}
