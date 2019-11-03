<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\DiaBanHd;
use App\Model\manage\dinhgia\DvKcb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaDvKhamChuaBenhController extends Controller
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
        $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
        $inputs['tenbv'] = isset($inputs['tenbv']) ? $inputs['tenbv'] : '';
        $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $districts = DiaBanHd::where('level','H')
            ->get();
        $model  = DvKcb::join('diabanhd','diabanhd.district','=','dvkcb.district')
            ->where('diabanhd.level','H')
            ->select('dvkcb.*','diabanhd.diaban');
        if($inputs['nam'] != 'all')
            $model = $model->whereYear('dvkcb.thoidiem',$inputs['nam']);
        if($inputs['district'] !='all')
            $model = $model->where('dvkcb.district',$inputs['district']);
        if($inputs['tenbv'] != '')
            $model = $model->where('dvkcb.tenbv','like', '%'.$inputs['tenbv'].'%');
        if($inputs['mota'] != '')
            $model = $model->where('dvkcb.mota','like', '%'.$inputs['mota'].'%');
        $model = $model->where('trangthai','CB');
        $model = $model->paginate($inputs['paginate']);
        return view('congbo.DinhGia.GiaDvKhamChuaBenh.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('districts',$districts)
            ->with('pageTitle','Thông tin giá dịch vụ khám chữa bệnh');
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
