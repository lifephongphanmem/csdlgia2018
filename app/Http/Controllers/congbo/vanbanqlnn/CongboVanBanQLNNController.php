<?php

namespace App\Http\Controllers\congbo\vanbanqlnn;

use App\VanBanQlNn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboVanBanQLNNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : 'all';
        $inputs['loaivb'] = isset($inputs['loaivb']) ? $inputs['loaivb'] : 'all';
        $inputs['tieude'] = isset($inputs['tieude']) ? $inputs['tieude'] : '';
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : '5';
        $model = VanBanQlNn::orderBy('ngayapdung','desc');

        if($inputs['phanloai']!= 'all')
            $model = $model->where('phanloai',$inputs['phanloai']);
        if($inputs['loaivb'] != '' && $inputs['loaivb'] != 'all')
            $model = $model->where('loaivb',$inputs['loaivb']);
        if($inputs['tieude'] != '')
            $model = $model->where('tieude','like', '%'.$inputs['tieude'].'%');
        $model = $model->paginate($inputs['paginate']);
        return view('congbo.VanBanQLNN.index')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Văn bản quản lý nhà nước về giá');
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
