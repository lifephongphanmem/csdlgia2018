<?php

namespace App\Http\Controllers;

use App\VanBanQlNn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class VanBanQlNnController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['phanloai'] = isset($inputs['phanloai']) ? $inputs['phanloai'] : 'gia';
            $inputs['loaivb'] = isset($inputs['loaivb']) ? $inputs['loaivb'] : '';
            $model = VanBanQlNn::where('phanloai',$inputs['phanloai']);
            if($inputs['loaivb'] != '')
                $model = $model->where('loaivb',$inputs['loaivb']);
            $model = $model->get();
            return view('manage.vanbanqlnn.qlnnvegia.index')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Văn bản quản lý nhà nước về giá');
        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            return view('manage.vanbanqlnn.qlnnvegia.create')
                ->with('pageTitle', 'Văn bản quản lý nhà nước về giá thêm mới');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahs'] = $inputs['phanloai'].$inputs['loaivb'].getdate()[0];
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['ngaybanhanh'] = getDateToDb($inputs['ngaybanhanh']);
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2'])){
                $ipf2 = $request->file('ipf2');
                $inputs['ipt2'] = $inputs['mahs'] .'&2.'.$ipf2->getClientOriginalExtension();
                $ipf2->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt2']);
                $inputs['ipf2']= $inputs['ipt2'];
            }
            if(isset($inputs['ipf3'])){
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4'])){
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'].'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5'])){
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }
            $model = new VanBanQlNn();
            $model->create($inputs);
            return redirect('vanbanqlnnvegia?&phanloai='.$inputs['phanloai'].'&loaivb='.$inputs['loaivb']);
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

        $model = VanBanQlNn::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        if (isset($model->ipt1)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 1 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/vbqlnnvegia/' . $model->ipf1) . '">' . $model->ipt1 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt2)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 2 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/vbqlnnvegia/' . $model->ipf2) . '">' . $model->ipt2 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt3)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 3 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/vbqlnnvegia/' . $model->ipf3) . '">' . $model->ipt3 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt4)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 4 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/vbqlnnvegia/' . $model->ipf4) . '">' . $model->ipt4 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt5)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 5 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/vbqlnnvegia/' . $model->ipf5) . '">' . $model->ipt5 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }

        $result['status'] = 'success';

        die(json_encode($result));
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = VanBanQlNn::where('id',$inputs['iddelete'])->delete();
            return redirect('vanbanqlnnvegia');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = VanBanQlNn::findOrFail($id);
            return view('manage.vanbanqlnn.qlnnvegia.edit')
                ->with('model', $model)
                ->with('pageTitle', 'Văn bản quản lý nhà nước về giá chỉnh sửa');
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
                $ipf1->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2']) && $inputs['ipf2'] !='' ) {
                $ipf2 = $request->file('ipf2');

                $inputs['ipt2'] = $inputs['mahs'] .'&2.'.$ipf2->getClientOriginalExtension();
                $ipf2->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt2']);
                $inputs['ipf2']= $inputs['ipt2'];
            }
            if(isset($inputs['ipf3']) && $inputs['ipf3'] !='' ) {
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4']) && $inputs['ipf4'] !='' ) {
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'] .'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5']) && $inputs['ipf5'] !='' ) {
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }
            $model = VanBanQlNn::findOrFail($id);
            $model->update($inputs);
            return redirect('vanbanqlnnvegia?&phanloai='.$inputs['phanloai'].'&loaivb='.$inputs['loaivb']);
        }else
            return view('errors.notlogin');
    }

}
