<?php

namespace App\Http\Controllers;

use App\DmDvKcb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmDvKcbController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();

            $model = DmDvKcb::where('dmdvkcb.manhom',$inputs['manhom'])
                ->join('nhomdvkcb','dmdvkcb.manhom','=','nhomdvkcb.manhom')
                ->select('dmdvkcb.*','nhomdvkcb.tennhom')
                ->get();
            return view('manage.dinhgia.dvkcb.danhmuc.chitiet.index')
                ->with('model',$model)
                ->with('manhom',$inputs['manhom'])
                ->with('pageTitle','Thông tin chi tiết dịch vụ khám chữa bệnh');

        }else
            return view('errors.notlogin');

    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new DmDvKcb();
            $model->create($inputs);
            return redirect('dmdichvukcb?&manhom='.$inputs['manhom']);
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
        $model = DmDvKcb::findOrFail($id);
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
        for($i=1;$i<=4;$i++) {
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
        $result['message'] .= '<label class="control-label">Mã dịch vụ<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" id="edit_madv" name="edit_madv"  class="form-control" value="'.$model->madv.'">';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đơn vị tính<span class="require">*</span></label>';
        $result['message'] .= '<select id="edit_dvt" name="edit_dvt"  class="form-control">';
        $result['message'] .= '<option value="">--Chọn đơn vị tính--</option>';
        $result['message'] .= '<option value="lần"'.(($model->dvt == "lần") ? "selected" : "").'>Lần</option>';
        $result['message'] .= '<option value="ngày"'.(($model->dvt == "ngày") ? "selected" : "").'>Ngày</option>';
        $result['message'] .= '</select>';

        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên dịch vụ <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tendichvu" id="edit_tendichvu" class="form-control" value="'.$model->tendichvu.'"/>';
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
            $inputs['madv'] = $inputs['edit_madv'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $inputs['tendichvu'] = $inputs['edit_tendichvu'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmDvKcb::findOrFail($id);
            $model->update($inputs);
            return redirect('dmdichvukcb?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }
}
