<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\DiaBanHd;
use App\GiaThueDatNuoc;
use App\GiaThueDatNuocCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaThueDatNuocController extends Controller
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
        $inputs['vitri'] = isset($inputs['vitri']) ? $inputs['vitri'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
        $model = GiaThueDatNuocCt::join('giathuedatnuoc','giathuedatnuoc.mahs','=','giathuedatnuocct.mahs')
            ->select('giathuedatnuocct.*','giathuedatnuoc.soqd','giathuedatnuoc.ngayapdung','giathuedatnuoc.trangthai','giathuedatnuoc.ghichu')
            ->where('giathuedatnuoc.trangthai','CB');
        if($inputs['nam']!= '')
            $model = $model->whereYear('giathuedatnuoc.ngayapdung',$inputs['nam']);
        if($inputs['vitri'] != '')
            $model = $model->where('giathuedatnuocct.vitri','like','%'.$inputs['vitri'].'%');
        if($inputs['district'] != 'all')
            $model = $model->where('giathuedatnuoc.district',$inputs['district']);
        $model = $model->paginate($inputs['paginate']);

        $modeldb = DiaBanHd::where('level','H')
            ->get();
        return view('congbo.DinhGia.GiaThueDatNuoc.index')
            ->with('model',$model)
            ->with('modeldb',$modeldb)
            ->with('inputs',$inputs)
            ->with('pageTitle','Thông tin hồ sơ thuê mặt đất, mặt nước');
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
