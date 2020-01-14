<?php

namespace App\Http\Controllers\congbo\kekhaigia\mhBOG;

use App\Model\manage\kekhaidkg\kehaimhbog\KkMhBogCt;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongBoKkMhBogController extends Controller
{
    public function index(Request $request){
        $inputs = $request->all();
        $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : 'all';
        $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
        $inputs['tendn'] = isset($inputs['tendn']) ? $inputs['tendn'] : '';
        $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = KkMhBogCt::leftJoin('kkmhbog','kkmhbog.mahs','=','kkmhbogct.mahs')
            ->leftjoin('company','company.maxa','=','kkmhbog.maxa')
            ->select('kkmhbogct.*','company.tendn','kkmhbog.ngayhieuluc')
            ->where('kkmhbog.trangthai','DD')
            ->where('kkmhbog.congbo','CB')
            ->where('company.trangthai','Kích hoạt');
        if($inputs['nam'] != 'all')
            $model = $model->whereYear('kkmhbog.ngayhieuluc',$inputs['nam']);
        if($inputs['phanloai'] != 'all')
            $model = $model->where('phanloai',$inputs['phanloai']);
        if($inputs['tendn'] != '')
            $model = $model->where('company.tendn','like','%'.$inputs['tendn'].'%');
        if($inputs['tenhh'] != '')
            $model = $model->where('kkmhbogct.tenhh','like','%'.$inputs['tenhh'].'%');
        $model = $model->paginate($inputs['paginate']);
        $dmnghe = DmNgheKd::where('manganh','BOG')
            ->where('theodoi','TD')
            ->where('congbo','CB')
            ->get();

        return view('congbo.KeKhaiGia.mhBOG.kekhai.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('dmnghe',$dmnghe)
            ->with('pageTitle','Thông tin kê khai giá mặt hàng trong danh mục BOG');
    }
}
