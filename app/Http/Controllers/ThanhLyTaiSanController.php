<?php

namespace App\Http\Controllers;

use App\District;
use App\ThanhLyTaiSan;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThanhLyTaiSanController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $model = ThanhLyTaiSan::whereYear('ngayhd',$inputs['nam'])
                    ->get();
                return view('manage.thanhlyts.hoso.index')
                    ->with('model',$model)
                    ->with('inputs',$inputs)
                    ->with('pageTitle','Thông tin giá đấu thầu bán tài sản');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'H' && can('kkthanhlytaisan','create')) {
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                return view('manage.thanhlyts.hoso.create')
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle','Thông tin giá đấu thầu bán tài sản');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayhd'] = getDateToDb($inputs['ngayhd']);
            $inputs['giakhoidiem'] = getMoneyToDb($inputs['giakhoidiem']);
            $inputs['giaban'] = getMoneyToDb($inputs['giaban']);
            $inputs['trangthai'] = 'CHT';
            $inputs['mahuyen']= session('admin')->mahuyen;
            $inputs['mahs'] = getdate()[0];

            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2'])){
                $ipf1 = $request->file('ipf2');
                $inputs['ipt1'] = $inputs['mahs']  .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf3'])){
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4'])){
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'].'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5'])){
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }
            $model = new ThanhLyTaiSan();
            $model->create($inputs);
            return redirect('thongtingiabantaisan');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' && can('kkthanhlytaisan','edit')) {
                $model = ThanhLyTaiSan::findOrFail($id);
                $modeldv = District::where('mahuyen',$model->mahuyen)->first();
                return view('manage.thanhlyts.hoso.edit')
                    ->with('model',$model)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle','Thông tin giá đấu thầu bán tài sản chỉnh sửa');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayhd'] = getDateToDb($inputs['ngayhd']);
            $inputs['giakhoidiem'] = getMoneyToDb($inputs['giakhoidiem']);
            $inputs['giaban'] = getMoneyToDb($inputs['giaban']);
            if(isset($inputs['ipf1']) && $inputs['ipf1'] !='' ) {
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2']) && $inputs['ipf2'] !='' ) {
                $ipf2 = $request->file('ipf2');

                $inputs['ipt2'] = $inputs['mahs'] .'&2.'.$ipf2->getClientOriginalExtension();
                $ipf2->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt2']);
                $inputs['ipf2']= $inputs['ipt2'];
            }
            if(isset($inputs['ipf3']) && $inputs['ipf3'] !='' ) {
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4']) && $inputs['ipf4'] !='' ) {
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'] .'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5']) && $inputs['ipf5'] !='' ) {
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->update($inputs);
            return redirect('thongtingiabantaisan');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->delete();
            return redirect('thongtingiabantaisan');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtingiabantaisan');
        }else
            return view('errors.notlogin');
    }
    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thongtingiabantaisan');
        }else
            return view('errors.notlogin');
    }
    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtingiabantaisan');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tents'] = isset($inputs['tents']) ? $inputs['tents'] : '';
            $model = ThanhLyTaiSan::whereYear('ngayhd',$inputs['nam'])
                ->whereIn('trangthai',['CB','HT']);
            if($inputs['tents'] != '')
                $model = $model->where('tents','like','%'.$inputs['tents'].'%');
            $model = $model->get();
            return view('manage.thanhlyts.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin giá đấu thầu bán tài sản');
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

        $model = ThanhLyTaiSan::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        if (isset($model->ipt1)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 1 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thanhlytaisan/' . $model->ipf1) . '">' . $model->ipt1 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt2)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 2 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thanhlytaisan/' . $model->ipf2) . '">' . $model->ipt2 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt3)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 3 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thanhlytaisan/' . $model->ipf3) . '">' . $model->ipt3 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt4)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 4 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thanhlytaisan/' . $model->ipf4) . '">' . $model->ipt4 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt5)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 5 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thanhlytaisan/' . $model->ipf5) . '">' . $model->ipt5 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }

        $result['status'] = 'success';

        die(json_encode($result));
    }
}
