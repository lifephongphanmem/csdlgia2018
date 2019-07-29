<?php

namespace App\Http\Controllers\manage\thuetn;

use App\Model\manage\dinhgia\thuetn\NhomThueTn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NhomThueTnController extends Controller
{
    public function index(){
        if(Session::has('admin')){
            $model = NhomThueTn::all();
            return view('manage.dinhgia.thuetn.danhmuc.nhom.index')
                ->with('model',$model)
                ->with('pageTitle','Nhóm tài nguyên tính thuế tài nguyên');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new NhomThueTn();
            $model->create($inputs);
            return redirect('nhomthuetn');
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
        $model = NhomThueTn::findOrFail($id);
        $check = 0;
        $check1 = 0;

        $result['message'] = '<div class="modal-body" id="edit-tt">';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã nhóm<span class="require">*</span></label>';
        if($check == 0 && $check1 == 0)
            $result['message'] .= '<input type="text" name="edit_manhom" id="edit_manhom" class="form-control" value="'.$model->manhom.'"/>';
        else
            $result['message'] .= '<label  class="form-control" style="color: #0000ff">'.$model->manhom.'</label>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên nhóm <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tennhom" id="edit_tennhom" class="form-control" value="'.$model->tennhom.'"/>';
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
            $inputs['manhom']= $inputs['edit_manhom'];
            $inputs['tennhom'] = $inputs['edit_tennhom'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = NhomThueTn::findOrFail($id);
            $model->update($inputs);
            return redirect('nhomthuetn');
        }else
            return view('errors.notlogin');
    }
}
