<?php

namespace App\Http\Controllers\congbo\thamdinhgia;

use App\Model\manage\thamdinhgia\ThamDinhGiaCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboThamDinhGiaController extends Controller
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
        $inputs['tents'] = isset($inputs['tents']) ? $inputs['tents'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = ThamDinhGiaCt::join('thamdinhgia','thamdinhgiact.mahs','=','thamdinhgia.mahs')
            ->join('town','thamdinhgia.maxa','=','town.maxa')
            ->select('thamdinhgiact.*','thamdinhgia.thoidiem','thamdinhgia.thuevat','thamdinhgia.sotbkl','thamdinhgia.thaotac','thamdinhgia.dvyeucau',
                'thamdinhgia.thoihan','thamdinhgia.ppthamdinh','town.tendv')
            ->where('thamdinhgia.trangthai','HT')
            ->where('thamdinhgia.congbo','CB');
        if($inputs['nam'] != 'all')
            $model = $model->whereYear('thamdinhgia.thoidiem',$inputs['nam']);
        if($inputs['tents'] != '')
            $model = $model->where('thamdinhgiact.tents','like','%'.$inputs['tents'].'%');
        $model = $model->paginate($inputs['paginate']);

        return view('congbo.ThamDinhGia.index')
            ->with('inputs',$inputs)
            ->with('model',$model)
            ->with('pageTitle','Thông tin thẩm định giá tại địa phương');
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
