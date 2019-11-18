<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\Model\manage\dinhgia\gianuocsachsh\GiaNuocSh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaNuocSinhHoatController extends Controller
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
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = GiaNuocSh::join('gianuocshct','gianuocshct.mahs','GiaNuocSh.mahs')
            ->where('GiaNuocSh.trangthai','CB');
        if($inputs['nam'] != 'all')
            $model = $model->whereYear('ngayapdung',$inputs['nam']);
        $model = $model->paginate($inputs['paginate']);
        return view('congbo.DinhGia.GiaNuocSinhHoat.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Thông tin hồ sơ giá nước sạch sinh hoạt');
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
