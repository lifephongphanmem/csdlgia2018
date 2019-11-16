<?php

namespace App\Http\Controllers\manage\gianuocsachsh;

use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocSh;
use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocShCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaNuocShTkController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : 'ALL';
            $inputs['soqd']= isset($inputs['soqd']) ? $inputs['soqd'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;

                $model = GiaNuocSh::join('gianuocshct','gianuocshct.mahs','=','gianuocsh.mahs')
                    ->select('gianuocsh.*','gianuocshct.doituongsd','gianuocshct.giachuathue')
                    ->whereIn('gianuocsh.trangthai',['HT','CB']);


                if($inputs['nam'] != 'All')
                    $model = $model->whereYear('gianuocsh.ngayapdung',$inputs['nam']);
                if($inputs['soqd'] != '')
                    $model = $model->where('gianuocsh.soqd','LIKE', "%{$inputs['soqd']}%");
                if($inputs['mota'] != '')
                    $model = $model->where('gianuocsh.mota','LIKE', "%{$inputs['mota']}%");

                $model = $model->paginate($inputs['paginate']);

            return view('manage.dinhgia.gianuocsh.timkiem.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Tìm kiểm giá nước sạch sinh hoạt');
        } else
            return view('errors.notlogin');
    }

    public function printf(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : 'ALL';
            $inputs['soqd']= isset($inputs['soqd']) ? $inputs['soqd'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            if( $inputs['nam'] == 'All' && $inputs['soqd'] == '' && $inputs['mota'] == '' ){
                $model = GiaNuocSh::whereIn('trangthai',['HT','CB'])
                    ->get();
            }else{
                $model =GiaNuocSh::whereIn('trangthai',['HT','CB']);

                if($inputs['nam'] != 'All')
                    $model = $model->whereYear('gianuocsh.ngayapdung',$inputs['nam']);
                if($inputs['soqd'] != '')
                    $model = $model->where('gianuocsh.soqd','LIKE', "%{$inputs['soqd']}%");
                if($inputs['mota'] != '')
                    $model = $model->where('gianuocsh.mota','LIKE', "%{$inputs['mota']}%");



                $model = $model->get();
            }
            /*dd($model);*/
            return view('manage.dinhgia.gianuocsh.timkiem.printf')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Danh sách tìm kiểm giá nước sinh hoạt');
        } else
            return view('errors.notlogin');
    }
}
