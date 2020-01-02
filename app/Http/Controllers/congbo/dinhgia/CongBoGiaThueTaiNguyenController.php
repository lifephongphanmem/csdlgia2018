<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyen;
use App\Model\manage\dinhgia\thuetn\ThueTaiNguyenCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongBoGiaThueTaiNguyenController extends Controller
{
    public function index(Request $request){
        $inputs = $request->all();
        $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
        $modeldm = NhomThueTn::where('theodoi','TD')->get();
        $model = ThueTaiNguyen::join('nhomthuetn','nhomthuetn.manhom','=','thuetainguyen.manhom')
            ->select('thuetainguyen.*','nhomthuetn.tennhom')
            ->where('thuetainguyen.trangthai','CB');
        if($inputs['manhom'] != 'all')
            $model = $model->where('thuetainguyen.manhom',$inputs['manhom']);
        $model = $model->get();
        return view('congbo.DinhGia.GiaThueTn.index')
            ->with('model',$model)
            ->with('modeldm',$modeldm)
            ->with('inputs',$inputs)
            ->with('pageTitle','Thông tin giá thuế tài nguyên');

    }

    public function show($id){
        $model = ThueTaiNguyen::findOrFail($id);
        $modelct = ThueTaiNguyenCt::where('mahs',$model->mahs)
            ->get();
        $modelnhom = NhomThueTn::where('manhom',$model->manhom)
            ->first();
            $inputs['dvcaptren'] = getGeneralConfigs()['tendvcqhienthi'];
            $inputs['dv'] = getGeneralConfigs()['tendvhienthi'];
            $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
        return view('congbo.DinhGia.GiaThueTn.show')
            ->with('modelct',$modelct)
            ->with('modelnhom',$modelnhom)
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Bảng giá tính thuế tài nguyên');
    }
}
