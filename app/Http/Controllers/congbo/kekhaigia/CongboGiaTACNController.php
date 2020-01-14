<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\Model\manage\kekhaigia\kkgiatacn\KkGiaTaCnCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaTACNController extends Controller
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
        $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
        $inputs['tendn'] = isset($inputs['tendn']) ? $inputs['tendn'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = KkGiaTaCnCt::Join('kkgiatacn','kkgiatacn.mahs','=','kkgiatacnct.mahs')
            ->join('company','company.maxa','=','kkgiatacn.maxa')
            ->whereYear('kkgiatacn.ngayhieuluc',$inputs['nam'])
            ->select('kkgiatacnct.*','company.tendn','kkgiatacn.ngayhieuluc')
            ->where('kkgiatacn.trangthai','DD')
            ->where('kkgiatacn.congbo','CB');
        if($inputs['tendn'] != '')
            $model = $model->where('company.tendn','like','%'.$inputs['tendn'].'%');
        if($inputs['tenhh'] != '')
            $model = $model->where('kkgiatacnct.tenhh','like','%'.$inputs['tenhh'].'%');
        $model = $model->paginate($inputs['paginate']);

        return view('congbo.KeKhaiGia.GiaTACN.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('pageTitle','Thông tin kê khai giá thức ăn chăn nuôi');
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
