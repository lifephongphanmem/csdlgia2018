<?php

namespace App\Http\Controllers\manage\giagdbatdatsan;

use App\DiaBanHd;
use App\Model\manage\dinhgia\giagdbatdongsan\GiaGdBatDongSan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaGdBatDongSanController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
            $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : 'all';
            $huyens = DiaBanHd::where('level','H')->get();
            $xas = DiaBanHd::where('level','X')->get();

            $model = new GiaGdBatDongSan();
            if($inputs['nam'] != 'all')
                $model = $model->whereYear('ngaybanhanh',$inputs['nam']);
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('mahuyen', $inputs['mahuyen']);
                $xas = DiaBanHd::where('level','X')
                    ->where('district',$inputs['mahuyen'])
                    ->get();            }
            if($inputs['maxa'] != 'all')
                $model = $model->where('maxa',$inputs['maxa']);
            $model = $model->get();
            foreach($model as $diaban){
                $modelhuuyen = DiaBanHd::where('level','H')
                    ->where('district',$diaban->mahuyen)
                    ->first();
                $modelxa = DiaBanHd::where('level','X')
                    ->where('town',$diaban->maxa)
                    ->first();
                $diaban->tenhuyen = $modelhuuyen->diaban;
                $diaban->tenxa = $modelxa->diaban;
            }
            return view('manage.dinhgia.giagdbatdongsan.index')
                ->with('model', $model)
                ->with('huyens',$huyens)
                ->with('xas',$xas)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Giá giao dịch bất động sản');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $huyen = DiaBanHd::where('level','H')
                ->where('district',$inputs['mahuyen'])
                ->first();
            $xas = DiaBanHd::where('level','X')
                ->where('district',$inputs['mahuyen'])->get();
            return view('manage.dinhgia.giagdbatdongsan.create')
                ->with('inputs',$inputs)
                ->with('xas',$xas)
                ->with('huyen',$huyen)
                ->with('pageTitle', 'Giá giao dịch bất động sản thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahs'] = getdate()[0];
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['ngaybanhanh'] = getDateToDb($inputs['ngaybanhanh']);
            $inputs['trangthai'] = 'CHT';
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/giagdbatdongsan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = new GiaGdBatDongSan();
            $model->create($inputs);
            return redirect('giagiaodichbatdongsan?&mahuyen='.$inputs['mahuyen'].'&maxa='.$inputs['maxa']);
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );

        $inputs = $request->all();

        $model = GiaGdBatDongSan::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        if (isset($model->ipt1)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 1 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/giagdbatdongsan/' . $model->ipf1) . '">' . $model->ipt1 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }

        $result['status'] = 'success';

        die(json_encode($result));
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaGdBatDongSan::where('id',$inputs['iddelete'])->delete();
            return redirect('giagiaodichbatdongsan');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = GiaGdBatDongSan::findOrFail($id);
            $huyen = DiaBanHd::where('level','H')
                ->where('district',$model->mahuyen)
                ->first();
            $xas = DiaBanHd::where('level','X')
                ->where('district',$model->mahuyen)->get();
            return view('manage.dinhgia.giagdbatdongsan.edit')
                ->with('model', $model)
                ->with('huyen',$huyen)
                ->with('xas',$xas)
                ->with('pageTitle', 'Giá giao dịch bất động sản chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['ngaybanhanh'] = getDateToDb($inputs['ngaybanhanh']);
            if(isset($inputs['ipf1']) && $inputs['ipf1'] !='' ) {
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/giagdbatdongsan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = GiaGdBatDongSan::findOrFail($id);
            $model->update($inputs);
            return redirect('giagiaodichbatdongsan?&mahuyen='.$inputs['mahuyen'].'&maxa='.$inputs['maxa']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = GiaGdBatDongSan::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();

            return redirect('giagiaodichbatdongsan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = GiaGdBatDongSan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('giagiaodichbatdongsan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }
    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['hoanthanh_id'];
            $model = GiaGdBatDongSan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('giagiaodichbatdongsan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huyhoanthanh_id'];
            $model = GiaGdBatDongSan::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();

            return redirect('giagiaodichbatdongsan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }
}
