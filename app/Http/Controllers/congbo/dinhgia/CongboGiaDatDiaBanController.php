<?php

namespace App\Http\Controllers\congbo\dinhgia;

use App\DiaBanHd;
use App\GiaDatDiaBan;
use App\GiaDatDiaBanDm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CongboGiaDatDiaBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'All';
            $inputs['maloaidat'] = isset($inputs['maloaidat']) ? $inputs['maloaidat'] : 'All';
            $inputs['khuvuc'] = isset($inputs['khuvuc']) ? $inputs['khuvuc'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $diabans = DiaBanHd::where('level','H')
                ->get();
            $loaidats = GiaDatDiaBanDm::all();

            $model  = GiaDatDiaBan::join('diabanhd','diabanhd.district','=','giadatdiaban.district')
                ->join('giadatdiabandm','giadatdiaban.maloaidat','=','giadatdiabandm.maloaidat')
                ->select('giadatdiaban.*','diabanhd.diaban','giadatdiabandm.loaidat');

            if($inputs['nam'] != 'all')
                $model = $model->where('giadatdiaban.nam',$inputs['nam']);
            if($inputs['district'] !='All')
                $model = $model->where('giadatdiaban.district',$inputs['district']);
            if($inputs['maloaidat'] != 'All')
                $model = $model->where('giadatdiaban.maloaidat',$inputs['maloaidat']);
            if($inputs['khuvuc'] != '')
                $model = $model->where('giadatdiaban.khuvuc','like', '%'.$inputs['khuvuc'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('giadatdiaban.mota','like', '%'.$inputs['mota'].'%');
            $model = $model->where('trangthai','CB');
            $model = $model->paginate($inputs['paginate']);
        return view('congbo.DinhGia.GiaDatDiaBan.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('diabans',$diabans)
                ->with('loaidats',$loaidats)
                ->with('pageTitle','Thông tin gia đất theo địa bàn');

        //} else
        //      return view('errors.notlogin');
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
