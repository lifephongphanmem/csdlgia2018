<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\DiaBanHd;
use App\GiaThueDatNuoc;
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
        $modeldb = DiaBanHd::where('level','H')->get();
        $inputs['diaban'] = isset($inputs['diaban']) ? $inputs['diaban'] : $modeldb->first()->district;
        $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
        $model = GiaThueDatNuoc::join('giathuedatnuocct','giathuedatnuocct.mahs','GiaThueDatNuoc.mahs')
            ->whereYear('ngayapdung',$inputs['nam']);
        if($inputs['diaban'] != '')
            $model = $model->where('district',$inputs['diaban']);

        $model=$model->where('trangthai','CB')->get();
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
