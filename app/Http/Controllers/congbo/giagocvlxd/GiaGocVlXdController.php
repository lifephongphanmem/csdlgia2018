<?php

namespace App\Http\Controllers\congbo\giagocvlxd;

use App\DiaBanHd;
use App\District;
use App\GiaGocVlXd;
use App\GiaGocVlXdCt;
use App\GiaGocVlXdCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GiaGocVlXdController extends Controller
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
        $modeldb = DiaBanHd::where('level','H')->get();
        $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $modeldb->first()->district;
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $model = GiaGocVlXd::join('diabanhd','diabanhd.district','=','giagocvlxd.district')
            ->select('giagocvlxd.*', 'diabanhd.diaban')
            ->where('giagocvlxd.district', $inputs['district'])
            ->where('giagocvlxd.nam',$inputs['nam'])
            ->where('giagocvlxd.congbo','CB');

        $model = $model->paginate($inputs['paginate']);
        //dd($model->toarray());
        $diaban = DiaBanHd::where('district',$inputs['district'])->first();
        $inputs['ngaybc'] = date('d/m/Y', strtotime(date('Y-m-d')));
        return view('congbo.GiaGocVlXd.index')
            ->with('model', $model)
            ->with('modeldb', $modeldb)
            ->with('inputs',$inputs)
            ->with('diaban',$diaban)
            ->with('pageTitle', 'Thông tin giá gốc vật liệu xây dựng');
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
