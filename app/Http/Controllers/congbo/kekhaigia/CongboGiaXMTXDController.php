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
        $inputs['ten'] = isset($inputs['ten']) ? $inputs['ten'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = KkGiaXmTxdCt::leftJoin('kkgiaxmtxd','kkgiaxmtxd.mahs','=','kkgiaxmtxdct.mahs')
            ->leftjoin('company','company.maxa','=','kkgiaxmtxd.maxa')
            ->whereYear('kkgiaxmtxd.ngayhieuluc',$inputs['nam'])
            ->select('kkgiaxmtxdct.*','company.tendn','company.maxa','kkgiaxmtxd.ngayhieuluc')
            ->where('kkgiaxmtxd.trangthai','CB');
        if($inputs['ten'] != '')
            $model = $model->where('kkgiaxmtxdct.ten','like','%'.$inputs['ten'].'%');
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
