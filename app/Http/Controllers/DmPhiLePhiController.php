<?php

namespace App\Http\Controllers;

use App\DmPhiLePhi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmPhiLePhiController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = DmPhiLePhi::all();
            return view('manage.dinhgia.philephi.danhmuc.index')
                ->with('model',$model)
                ->with('pageTitle','Nhóm phí lệ phí');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new DmPhiLePhi();
            $model->create($inputs);
            return redirect('nhomphilephi');


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
        $model = DmPhiLePhi::findOrFail($id);
        //check xem có chưa thì mới cho sửa mã
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
        $result['message'] .= '<label class="control-label">Đơn vị tính <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_dvt" id="edit_dvt" class="form-control" value="'.$model->dvt.'"/>';
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
            $inputs['manhom'] = $inputs['edit_manhom'];
            $inputs['tennhom'] = $inputs['edit_tennhom'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $model = DmPhiLePhi::findOrFail($id);
            $model->update($inputs);
            return redirect('nhomphilephi');
        }else
            return view('errors.notlogin');
    }
}
