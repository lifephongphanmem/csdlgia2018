<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\DiaBanHd;
use App\DmGiaRung;
use App\Model\manage\dinhgia\GiaRung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaRungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $inputs = $request->all();
        $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
        $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
        $inputs['tenduan'] = isset($inputs['tenduan']) ? $inputs['tenduan'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $districts = DiaBanHd::where('level','H')
            ->get();
        $loairungs = DmGiaRung::all();
        $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'all';
        $model  = GiaRung::join('diabanhd','diabanhd.district','=','giarung.district')
            ->where('diabanhd.level','H')
            ->join('dmgiarung','dmgiarung.manhom','=','giarung.manhom')
            ->select('giarung.*','diabanhd.diaban','dmgiarung.tennhom');
        if($inputs['nam'] != 'all')
            $model = $model->whereYear('giarung.thoidiem',$inputs['nam']);
        if($inputs['district'] !='all')
            $model = $model->where('giarung.district',$inputs['district']);
        if($inputs['manhom'] != 'all')
            $model = $model->where('giarung.manhom',$inputs['manhom']);
        if($inputs['tenduan'] != '')
            $model = $model->where('giarung.tenduan','like', '%'.$inputs['tenduan'].'%');
        $model = $model->where('giarung.trangthai','CB');
        $model = $model->paginate($inputs['paginate']);
        return view('congbo.DinhGia.GiaRung.index')
            ->with('model',$model)
            ->with('inputs',$inputs)
            ->with('districts',$districts)
            ->with('loairungs',$loairungs)
            ->with('pageTitle','Thông tin giá rừng');
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
