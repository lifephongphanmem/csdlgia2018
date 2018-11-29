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
        $result['message'] .= '<select id="edit_dvt" name="edit_dvt"  class="form-control">';
        $result['message'] .= '<option value="">--Chọn đơn vị tính--</option>';
        $result['message'] .= '<option value="lần"'.(($model->dvt == "lần") ? "selected" : "").'>Lần</option>';
        $result['message'] .= '<option value="ngày"'.(($model->dvt == "ngày") ? "selected" : "").'>Ngày</option>';
        $result['message'] .= '<option value="đ/kg"'.(($model->dvt == "đ/kg") ? "selected" : "").'>đ/kg</option>';
        $result['message'] .= '<option value="đ/lít"'.(($model->dvt == "đ/lít") ? "selected" : "").'>đ/lít</option>';
        $result['message'] .= '<option value="đ/két (24 chai)"'.(($model->dvt == "đ/két (24 chai)") ? "selected" : "").'>đ/két (24 chai)</option>';
        $result['message'] .= '<option value="đ/thùng (24 lon)"'.(($model->dvt == "đ/thùng (24 lon)") ? "selected" : "").'>đ/thùng (24 lon)</option>';
        $result['message'] .= '<option value="đ/chai 750ml"'.(($model->dvt == "đ/chai 750ml") ? "selected" : "").'>đ/chai 750ml</option>';
        $result['message'] .= '<option value="đ/lọ 100 viên"'.(($model->dvt == "đ/lọ 100 viên") ? "selected" : "").'>đ/lọ 100 viên</option>';
        $result['message'] .= '<option value="đ/chai"'.(($model->dvt == "đ/chai") ? "selected" : "").'>đ/chai</option>';
        $result['message'] .= '<option value="đ/chiếc"'.(($model->dvt == "đ/chiếc") ? "selected" : "").'>đ/chiếc</option>';
        $result['message'] .= '<option value="đ/kg-đ/bao"'.(($model->dvt == "đ/kg-đ/bao") ? "selected" : "").'>đ/kg-đ/bao</option>';
        $result['message'] .= '<option value="đ/mét"'.(($model->dvt == "đ/mét") ? "selected" : "").'>đ/mét</option>';
        $result['message'] .= '<option value="đ/b/13kg"'.(($model->dvt == "đ/b/13kg") ? "selected" : "").'>đ/b/13kg</option>';
        $result['message'] .= '<option value="đ/vé"'.(($model->dvt == "đ/vé") ? "selected" : "").'>đ/vé</option>';
        $result['message'] .= '<option value="đ/km"'.(($model->dvt == "đ/km") ? "selected" : "").'>đ/km</option>';
        $result['message'] .= '<option value="đ/lần/chiếc"'.(($model->dvt == "đ/lần/chiếc") ? "selected" : "").'>đ/lần/chiếc</option>';
        $result['message'] .= '<option value="triệu đồng/chỉ"'.(($model->dvt == "triệu đồng/chỉ") ? "selected" : "").'>triệu đồng/chỉ</option>';
        $result['message'] .= '<option value="đ/USD"'.(($model->dvt == "đ/USD") ? "selected" : "").'>đ/USD</option>';
        $result['message'] .= '<option value="đ/Euro"'.(($model->dvt == "đ/Euro") ? "selected" : "").'>đ/Euro</option>';
        $result['message'] .= '<option value="đ/NDT"'.(($model->dvt == "đ/NDT") ? "selected" : "").'>đ/NDT</option>';
        $result['message'] .= '</select>';

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
        $result['message'] .= '<label class="control-label">Đặc điểm kỹ thuật<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_dacdiemkt" id="edit_dacdiemkt" class="form-control" value="'.$model->dacdiemkt.'"/>';
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
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmHhDvK::findOrFail($id);
            $model->update($inputs);
            return redirect('dmhanghoadichvu?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }
}
