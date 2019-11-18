<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\District;
use App\Model\manage\kekhaigia\kkgiavlxd\KkGiaVlXd;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboVatLieuXayDungController extends Controller
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
        $model = KkGiaVlXd::join('kkgiavlxdct','kkgiavlxdct.mahs','KkGiaVlXd.mahs')
            ->join('company','company.maxa','KkGiaVlXd.maxa')
            ->whereYear('ngaynhap', $inputs['nam'])
            ->where('congbo','CB')
            ->paginate($inputs['paginate']);
        return view('congbo.KeKhaiGia.VatLieuXayDung.index')
            ->with('model', $model)
            ->with('inputs', $inputs)
            ->with('pageTitle', 'Danh sách hồ sơ kê khai giá vật liệu xây dựng');
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
