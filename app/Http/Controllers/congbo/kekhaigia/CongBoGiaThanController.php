<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\Model\manage\kekhaigia\kkgiathan\KkGiaThan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongBoGiaThanController extends Controller
{
    public function index(Request $request){
        $inputs = $request->all();
        $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
        $inputs['tenhhdv'] = isset($inputs['tenhhdv']) ? $inputs['tenhhdv'] : '';
        $inputs['tendn'] = isset($inputs['tendn']) ? $inputs['tendn'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : '5';
        $model = KkGiaThan::leftJoin('kkgiathanct','kkgiathanct.mahs','=','kkgiathan.mahs')
            ->leftjoin('company','company.maxa','=','kkgiathan.maxa')
            ->whereYear('kkgiathan.ngayhieuluc',$inputs['nam'])
            ->select('kkgiathanct.*','company.tendn','kkgiathan.ngayhieuluc','kkgiathan.maxa')
            ->where('kkgiathan.trangthai','DD')
            ->where('kkgiathan.congbo','CB');
        if($inputs['tendn'] != '')
            $model = $model->where('company.tendn','like','%'.$inputs['tendn'].'%');
        if($inputs['tenhhdv'] != '')
            $model = $model->where('kkgiathanct.tenhhdv','like','%'.$inputs['tenhhdv'].'%');
        $model = $model->paginate($inputs['paginate']);

        return view('congbo.KeKhaiGia.GiaThan.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Thông tin kê khai giá than');
    }
}
