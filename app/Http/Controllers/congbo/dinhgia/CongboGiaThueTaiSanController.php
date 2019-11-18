<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\GiaThueTsCong;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaThueTaiSanController extends Controller
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

        $modeldv = Town::all();
        $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
        $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;


        $model = GiaThueTsCong::join('giathuetscongct','giathuetscongct.mahs','GiaThueTsCong.mahs')
        ->where('nam',$inputs['nam'])
        ->where('trangthai','CB');
        if($inputs['maxa']!= '')
            $model = $model->where('maxa',$inputs['maxa']);
        $model=$model->get();
        return view('congbo.DinhGia.GiaThueTaiSan.index')
            ->with('model',$model)
            ->with('modeldv',$modeldv)
            ->with('inputs',$inputs)
            ->with('pageTitle','Thông tin giá thuê tài sản công');
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
