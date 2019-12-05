<?php

namespace App\Http\Controllers;

use App\DmHhDvK;
use App\NhomHhDvK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NhomHhDvKController extends Controller
{
    public function index(){
        if(Session::has('admin')){
            $model = NhomHhDvK::all();
            return view('manage.dinhgia.giahhdvk.danhmuc.nhom.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin nhóm hàng hóa dịch vụ');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new NhomHhDvK();
            $model->create($inputs);
            return redirect('nhomhanghoadichvu');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();
        $id = $inputs['id'];
        $model = NhomHhDvK::findOrFail($id);
        $modelct = DmHhDvK::where('matt',$model->matt)
            ->count();

        $result['message'] = '<div class="modal-body" id="edit-tt">';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã thông tư<span class="require">*</span></label>';
        if($modelct == 0)
            $result['message'] .= '<input type="text" name="edit_matt" id="edit_matt" class="form-control" value="'.$model->matt.'"/>';
        else
            $result['message'] .= '<label  class="form-control" style="color: #0000ff">'.$model->matt.'</label>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Thông tin thông tư <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tentt" id="edit_tentt" class="form-control" value="'.$model->tentt.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Theo dõi <span class="require">*</span></label>';
        $result['message'] .= '<select name="edit_theodoi" id="edit_theodoi" class="form-control">';
        if($model->theodoi == 'TD') {
            $result['message'] .= '<option value="TD" selected>Theo dõi</option>';
            $result['message'] .= '<option value="KTD">Bỏ theo dõi</option>';
        }else {
            $result['message'] .= '<option value="TD" >Theo dõi</option>';
            $result['message'] .= '<option value="KTD" selected>Bỏ theo dõi</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<input type="hidden" name="edit_id" id="edit_id" class="form-control" value="'.$model->id.'"/>';

        $result['message'] .= '</div>';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $inputs['matt']= $inputs['edit_matt'];
            $inputs['tentt'] = $inputs['edit_tentt'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = NhomHhDvK::findOrFail($id);
            $model->update($inputs);
            return redirect('nhomhanghoadichvu');
        }else
            return view('errors.notlogin');
    }
}
