<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\DiaBanHd;
use App\Model\manage\dinhgia\GiaDvGdDt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaDvGiaoDucDaoTaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : (date('Y').'-'.(date('Y')+1));
        $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'All';
        $inputs['khuvuc'] = isset($inputs['khuvuc']) ? $inputs['khuvuc'] : '';
        $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = GiaDvGdDt::join('diabanhd','diabanhd.district','=','giadvgddt.district')
            ->where('diabanhd.level','H')
            ->select('giadvgddt.*','diabanhd.diaban');
        if($inputs['nam'] != 'all')
            $model = $model->where('giadvgddt.nam',$inputs['nam']);
        if($inputs['district'] != 'All')
            $model = $model ->where('giadvgddt.district',$inputs['district']);
        if($inputs['khuvuc'] != '')
            $model = $model->where('giadvgddt.khuvuc','like', '%'.$inputs['khuvuc'].'%');
        if($inputs['mota'] != '')
            $model = $model->where('giadvgddt.mota','like', '%'.$inputs['mota'].'%');
        $model = $model->where('trangthai','CB');
        $model = $model->paginate($inputs['paginate']);
        $diabans = DiaBanHd::where('level','H')
            ->get();
        return view('congbo.DinhGia.GiaDvGDDT.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('diabans',$diabans)
            ->with('pageTitle', 'Giá dịch vụ giáo dục đào tạo');
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
