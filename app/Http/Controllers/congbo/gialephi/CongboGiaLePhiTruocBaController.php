<?php

namespace App\Http\Controllers\congbo\gialephi;

use App\LePhiTruocBa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaLePhiTruocBaController extends Controller
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
        $model = LePhiTruocBa::join('lephitruocbact','lephitruocbact.mahs','LePhiTruocBa.mahs')
            ->whereYear('ngayapdung',$inputs['nam'])
            ->where('trangthai','CB')->get();
        return view('congbo.GiaLePhi.index')
            ->with('model',$model)
            ->with('nam',$inputs['nam'])
            ->with('pageTitle','Thông tin hồ sơ lệ phí trước bạ');
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
