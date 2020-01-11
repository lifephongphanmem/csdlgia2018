<?php

namespace App\Http\Controllers\congbo\philephi;

use App\DmPhiLePhi;
use App\PhiLePhi;
use App\PhiLePhiCt;
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
        $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
        $inputs['ptcp'] = isset($inputs['ptcp']) ? $inputs['ptcp'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = PhiLePhiCt::Leftjoin('philephi','philephi.mahs','=','philephict.mahs')
            ->Leftjoin('dmphilephi','dmphilephi.manhom','=','philephi.manhom')
            ->where('philephi.trangthai','CB')
            ->select('philephict.*','philephi.soqd','philephi.ngayapdung','philephi.trangthai','dmphilephi.tennhom','philephi.manhom');
        if($inputs['nam'] != 'all')
            $model = $model->whereYear('philephi.ngayapdung',$inputs['nam']);
        if($inputs['manhom'] != 'all')
            $model = $model->where('philephi.manhom',$inputs['manhom']);
        if($inputs['ptcp'] != '')
            $model = $model->where('philephict.ptcp','like','%'.$inputs['ptcp'].'%');
        $model = $model->paginate($inputs['paginate']);

        $m_nhomphilephi = DmPhiLePhi::all();
        return view('congbo.PhiLePhi.index')
            ->with('model',$model)
            ->with('m_nhomphilephi',$m_nhomphilephi)
            ->with('inputs',$inputs)
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
