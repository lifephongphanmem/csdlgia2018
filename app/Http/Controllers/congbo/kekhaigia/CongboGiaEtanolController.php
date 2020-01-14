<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\Model\manage\kekhaigia\kkgiaetanol\KkGiaEtanol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaEtanolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
        $inputs['tendn'] = isset($inputs['tendn']) ? $inputs['tendn'] : '';
        $inputs['tthhdv'] = isset($inputs['tthhdv']) ? $inputs['tthhdv'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : '';
        $model = KkGiaEtanol::leftJoin('kkgiaetanolct','kkgiaetanolct.mahs','=','kkgiaetanol.mahs')
            ->leftjoin('company','company.maxa','=','kkgiaetanol.maxa')
            ->whereYear('kkgiaetanol.ngayhieuluc',$inputs['nam'])
            ->select('kkgiaetanolct.*','company.tendn','kkgiaetanol.ngayhieuluc','kkgiaetanol.maxa')
            ->where('kkgiaetanol.trangthai','DD')
            ->where('kkgiaetanol.congbo','CB');
        if($inputs['tendn'] != '')
            $model = $model->where('company.tendn','like','%'.$inputs['tendn'].'%');
        if($inputs['tthhdv'] != '')
            $model = $model->where('kkgiaetanolct.tthhdv','like','%'.$inputs['tthhdv'].'%');
        $model = $model->paginate($inputs['paginate']);

        return view('congbo.KeKhaiGia.GiaEtanol.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Tìm kiếm thông tin kê khai giá Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
