<?php

namespace App\Http\Controllers;

use App\DmHhDvK;
use App\NhomHhDvK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmHhDvKController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelnhom = NhomHhDvK::where('manhom',$inputs['manhom'])->first();
            $model = DmHhDvK::where('dmhhdvk.manhom',$inputs['manhom'])
                ->join('nhomhhdvk','nhomhhdvk.manhom','=','dmhhdvk.manhom')
                ->select('dmhhdvk.*','nhomhhdvk.tennhom')
                ->get();
            return view('manage.dinhgia.giahhdvk.danhmuc.chitiet.index')
                ->with('model',$model)
                ->with('manhom',$inputs['manhom'])
                ->with('modelnhom',$modelnhom)
                ->with('pageTitle','Thông tin chi tiết hàng hóa dịch vụ');

        }else
            return view('errors.notlogin');

    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new DmHhDvK();
            $model->create($inputs);
            return redirect('dmhanghoadichvu?&manhom='.$inputs['manhom']);
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
        $model = DmHhDvK::findOrFail($id);
        $check = 0;
        $check1 = 0;

        $result['message'] = '<div class="modal-body" id="edit-tt">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã hàng hóa dịch vụ<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" id="edit_mahhdv" name="edit_mahhdv"  class="form-control" value="'.$model->mahhdv.'">';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đơn vị tính<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_dvt" id="edit_dvt" class="form-control" value="'.$model->dvt.'"/>';

        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên hàng hóa dịch vụ <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tenhhdv" id="edit_tenhhdv" class="form-control" value="'.$model->tenhhdv.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đặc điểm kỹ thuật</label>';
        $result['message'] .= '<input type="text" name="edit_dacdiemkt" id="edit_dacdiemkt" class="form-control" value="'.$model->dacdiemkt.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Nguồn gốc / Xuất xứ</label>';
        $result['message'] .= '<input type="text" name="edit_xuatxu" id="edit_xuatxu" class="form-control" value="'.$model->xuatxu.'"/>';
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
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $inputs['mahhdv'] = $inputs['edit_mahhdv'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $inputs['tenhhdv'] = $inputs['edit_tenhhdv'];
            $inputs['dacdiemkt'] = $inputs['edit_dacdiemkt'];
            $inputs['xuatxu'] = $inputs['edit_xuatxu'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmHhDvK::findOrFail($id);
            $model->update($inputs);
            return redirect('dmhanghoadichvu?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }
}
