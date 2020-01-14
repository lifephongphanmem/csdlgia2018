<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\Model\manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaXMTXDController extends Controller
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
        $inputs['tenhhdv'] = isset($inputs['tenhhdv']) ? $inputs['tenhhdv'] : '';
        $inputs['tendn'] = isset($inputs['tendn']) ? $inputs['tendn'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = KkGiaXmTxdCt::leftJoin('kkgiaxmtxd','kkgiaxmtxd.mahs','=','kkgiaxmtxdct.mahs')
            ->leftjoin('company','company.maxa','=','kkgiaxmtxd.maxa')
            ->select('kkgiaxmtxdct.*','company.tendn','company.maxa','kkgiaxmtxd.ngayhieuluc')
            ->where('kkgiaxmtxd.trangthai','DD')
            ->where('kkgiaxmtxd.congbo','CB');
        if($inputs['nam'] != 'all')
            $model = $model->whereYear('kkgiaxmtxd.ngayhieuluc',$inputs['nam']);
        if($inputs['tenhhdv'] != '')
            $model = $model->where('kkgiaxmtxdct.tenhhdv','like','%'.$inputs['tenhhdv'].'%');
        if($inputs['tendn'] != '')
            $model = $model->where('company.tendn','like','%'.$inputs['tendn'].'%');
        $model = $model->paginate($inputs['paginate']);
        return view('congbo.KeKhaiGia.XiMangTXD.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Tìm kiếm thông tin kê khai giá xi măng, thép xây dựng');
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
