<?php

namespace App\Http\Controllers;

use App\DmCtThamDinhGiaHh;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmCtThamDinhGiaHhController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DmCtThamDinhGiaHh::join('dmthamdinhgiahh','dmthamdinhgiahh.manhom','=','dmctthamdinhgiahh.manhom')
                ->select('dmctthamdinhgiahh.*','dmthamdinhgiahh.tennhom')
                ->where('dmctthamdinhgiahh.manhom',$inputs['manhom'])
                ->get();
            return view('manage.thamdinhgiahh.danhmuc.chitiet.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Danh mục hàng hóa thẩm định giá');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new DmCtThamDinhGiaHh();
            $model->create($inputs);
            return redirect('dmctthamdinhgiahh?&manhom='.$inputs['manhom']);
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
        $model = DmCtThamDinhGiaHh::findOrFail($id);
        $check = 0;
        $check1 = 0;

        $result['message'] = '<div class="modal-body" id="edit-tt">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Nhóm hàng hóa<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" id="edit_nhomhh" name="edit_nhomhh"  class="form-control" value="'.$model->nhomhh.'">';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên hàng hóa<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tenhh" id="edit_tenhh" class="form-control" value="'.$model->tenhh.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Quy cách<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_qccl" id="edit_qccl" class="form-control" value="'.$model->qccl.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đơn vị tính<span class="require">*</span></label>';
        $result['message'] .= '<select id="edit_dvt" name="edit_dvt"  class="form-control">';
        $result['message'] .= '<option value="kg"'.(($model->dvt == "kg") ? "selected" : "").'>kg</option>';
        $result['message'] .= '<option value="cái"'.(($model->dvt == "cái") ? "selected" : "").'>cái</option>';
        $result['message'] .= '</select>';

        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
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
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $inputs['nhomhh'] = $inputs['edit_nhomhh'];
            $inputs['tenhh'] = $inputs['edit_tenhh'];
            $inputs['qccl'] = $inputs['edit_qccl'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmCtThamDinhGiaHh::findOrFail($id);
            $model->update($inputs);
            return redirect('dmctthamdinhgiahh?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }
}
