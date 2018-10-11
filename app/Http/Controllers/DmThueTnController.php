<?php

namespace App\Http\Controllers;

use App\DmThueTn;
use App\NhomThueTn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmThueTnController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();

            $model = DmThueTn::where('dmthuetn.manhom',$inputs['manhom'])
                ->join('nhomthuetn','nhomthuetn.manhom','=','dmthuetn.manhom')
                ->select('dmthuetn.*','nhomthuetn.tennhom')
                ->get();
            return view('manage.dinhgia.thuetn.danhmuc.chitiet.index')
                ->with('model',$model)
                ->with('manhom',$inputs['manhom'])
                ->with('pageTitle','Thông tin chi tiết mặt hàng thuế tài nguyên');

        }else
            return view('errors.notlogin');

    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new DmThueTn();
            $model->create($inputs);
            return redirect('dmthuetn?&manhom='.$inputs['manhom']);
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
        $model = DmThueTn::findOrFail($id);
        $check = 0;
        $check1 = 0;

        $result['message'] = '<div class="modal-body" id="edit-tt">';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã gốc<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" id="edit_magoc" name="edit_magoc"  class="form-control" value="'.$model->magoc.'">';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Cấp độ<span class="require">*</span></label>';
        $result['message'] .= '<select id="edit_capdo" name="edit_capdo"  class="form-control">';
        for($i=1;$i<=6;$i++) {
            if($i == $model->capdo)
                $result['message'] .= '<option value="' . $i . '" selected>' . $i . '</option>';
            else
                $result['message'] .= '<option value="' . $i . '">' . $i . '</option>';
        }
        $result['message'] .= '</select>';

        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã hàng hóa<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" id="edit_mahh" name="edit_mahh"  class="form-control" value="'.$model->mahh.'">';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đơn vị tính<span class="require">*</span></label>';
        $result['message'] .= '<select id="edit_dvt" name="edit_dvt"  class="form-control">';
                        $result['message'] .= '<option value="">--Chọn đơn vị tính--</option>';
                        $result['message'] .= '<option value="tấn"'.(($model->dvt == "tấn") ? "selected" : "").'>Tấn</option>';
                        $result['message'] .= '<option value="m3"'.(($model->dvt == "m3") ? "selected" : "").' >m3</option>';
                        $result['message'] .= '<option value="cây"'.(($model->dvt == "cây") ? "selected" : "").'>cây</option>';
                        $result['message'] .= '<option value="kg"'.(($model->dvt == "kg") ? "selected" : "").'>kg</option>';
                        $result['message'] .= '<option value="m"'.(($model->dvt == "m") ? "selected" : "").'>m</option>';
                        $result['message'] .= '<option value="viên"'.(($model->dvt == "viên") ? "selected" : "").'>viên</option>';
        $result['message'] .= '</select>';

        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên hàng hóa <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tenhh" id="edit_tenhh" class="form-control" value="'.$model->tenhh.'"/>';
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
            $inputs['magoc'] = $inputs['edit_magoc'];
            $inputs['capdo'] = $inputs['edit_capdo'];
            $inputs['mahh'] = $inputs['edit_mahh'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $inputs['tenhh'] = $inputs['edit_tenhh'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmThueTn::findOrFail($id);
            $model->update($inputs);
            return redirect('dmthuetn?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }
}
