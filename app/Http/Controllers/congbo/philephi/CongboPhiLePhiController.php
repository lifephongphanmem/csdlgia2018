<?php

namespace App\Http\Controllers\congbo\philephi;

use App\DmPhiLePhi;
use App\PhiLePhi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboPhiLePhiController extends Controller
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
        $model = PhiLePhi::join('dmphilephi','dmphilephi.manhom','=','philephi.manhom')
            ->join('philephict','philephict.mahs','PhiLePhi.mahs')
            ->whereYear('philephi.ngayapdung',$inputs['nam'])
            ->select('philephi.*','philephict.*','dmphilephi.tennhom','dmphilephi.dvt')
            ->where('trangthai','CB')->get();
        $m_nhomphilephi = DmPhiLePhi::all();
        return view('congbo.PhiLePhi.index')
            ->with('model',$model)
            ->with('nam',$inputs['nam'])
            ->with('m_nhomphilephi',$m_nhomphilephi)
            ->with('pageTitle','Thông tin hồ sơ phí, lệ phí');
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
