<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\Model\manage\kekhaigia\kkgiasach\KkGiaSach;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaSachController extends Controller
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
        $model = KkGiaSach::leftJoin('kkgiasachct','kkgiasachct.mahs','=','kkgiasach.mahs')
            ->leftjoin('company','company.maxa','=','kkgiasach.maxa')
            ->whereYear('kkgiasach.ngayhieuluc',$inputs['nam'])
            ->select('kkgiasachct.*','company.tendn','kkgiasach.ngayhieuluc','kkgiasach.maxa')
            ->where('kkgiasach.trangthai','DD')
            ->where('kkgiasach.congbo','CB');
        if($inputs['tendn'] != '')
            $model = $model->where('company.tendn','like','%'.$inputs['tendn'].'%');
        if($inputs['tthhdv'] != '')
            $model = $model->where('kkgiasachct.tthhdv','like','%'.$inputs['tthhdv'].'%');
        $model = $model->paginate($inputs['paginate']);

        return view('congbo.KeKhaiGia.GiaSach.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Tìm kiếm thông tin kê khai giá sách giáo khoa');
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
