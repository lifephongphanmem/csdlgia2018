<?php

namespace App\Http\Controllers\congbo\kekhaigia;

use App\Model\manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTm;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CongboGiaHDTMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $inputs['ten'] = isset($inputs['ten']) ? $inputs['ten'] : '';
        $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
        $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
        $modeldmnghe = DmNgheKd::where('manganh','DVHDTMCK')
            ->where('manghe','DVHDTMCK')
            ->first();
        $modeldv = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
        $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldv->first()->maxa;
        $model = KkGiaDvHdTm::join('kkgiadvhdtmct','kkgiadvhdtmct.mahs','KkGiaDvHdTm.mahs')
            ->join('company','company.maxa','=','kkgiadvhdtm.maxa')
            ->where('kkgiadvhdtm.mahuyen',$inputs['mahuyen'])
            ->select('kkgiadvhdtm.*','kkgiadvhdtmct.*','company.tendn')
            ->where('KkGiaDvHdTm.trangthai','CB');
            $model = $model->paginate($inputs['paginate']);
        return view('congbo.KeKhaiGia.GiaHDTM.index')
            ->with('model', $model)
            ->with('inputs',$inputs)
            ->with('modeldv',$modeldv)
            ->with('pageTitle', 'Xét duyệt hồ sơ kê khai giá dịch vụ hỗ trợ hoạt động thương mại');
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
