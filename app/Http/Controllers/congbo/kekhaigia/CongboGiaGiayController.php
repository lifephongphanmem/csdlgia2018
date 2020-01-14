<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\Model\manage\kekhaigia\kkgiay\KkGiaGiay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaGiayController extends Controller
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
        $inputs['tthhdv'] = isset($inputs['tthhdv']) ? $inputs['tthhdv'] : '';
        $inputs['tendn'] = isset($inputs['tendn']) ? $inputs['tendn'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = KkGiaGiay::leftJoin('kkgiagiayct','kkgiagiayct.mahs','=','kkgiagiay.mahs')
            ->leftjoin('company','company.maxa','=','kkgiagiay.maxa')
            ->whereYear('kkgiagiay.ngayhieuluc',$inputs['nam'])
            ->select('kkgiagiayct.*','company.tendn','kkgiagiay.ngayhieuluc','kkgiagiay.maxa')
            ->where('kkgiagiay.trangthai','DD')
            ->where('kkgiagiay.congbo','CB');
        if($inputs['tendn'] != '')
            $model = $model->where('company.tendn','like','%'.$inputs['tendn'].'%');
        if($inputs['tthhdv'] != '')
            $model = $model->where('kkgiagiayct.tthhdv','like','%'.$inputs['tthhdv'].'%');
        $model = $model->paginate($inputs['paginate']);

        return view('congbo.KeKhaiGia.GiaGiay.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Thông tin kê khai giá giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước');
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
