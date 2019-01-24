<?php

namespace App\Http\Controllers;

use App\DmHangHoa;
use App\DmNhomHangHoa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmHangHoaController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = DmHangHoa::where('manhom',$inputs['manhom'])
                ->get();
            $modelnhom = DmNhomHangHoa::where('manhom',$inputs['manhom'])
                ->first();
            return view('manage.thamdinhgia.danhmuc.chitiet.index')
                ->with('model',$model)
                ->with('modelnhom',$modelnhom)
                ->with('inputs',$inputs)
                ->with('pageTitle','Danh mục hàng hóa');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new DmHangHoa();
            $model->create($inputs);
            return redirect('dmhanghoa?manhom='.$inputs['manhom']);
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
        $model = DmHangHoa::findOrFail($id);
        $modelnhom = DmNhomHangHoa::where('manhom',$model->manhom)->first();
        $check = 0;
        $check1 = 0;

        $result['message'] = '<div class="modal-body" id="edit-tt">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên nhóm: <b style="color: blue">'.$modelnhom->tennhom.'</b></label>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã hàng hóa <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_mahanghoa" id="edit_mahanghoa" class="form-control" value="'.$model->mahanghoa.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên hàng hóa <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tenhanghoa" id="edit_tenhanghoa" class="form-control" value="'.$model->tenhanghoa.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Thông số kỹ thuật<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_thongsokt" id="edit_thongsokt" class="form-control" value="'.$model->thongsokt.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Xuất xứ<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_xuatxu" id="edit_xuatxu" class="form-control" value="'.$model->xuatxu.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đơn vị tính<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_dvt" id="edit_dvt" class="form-control" value="'.$model->dvt.'"/>';
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
            $inputs['mahanghoa']= $inputs['edit_mahanghoa'];
            $inputs['tenhanghoa'] = $inputs['edit_tenhanghoa'];
            $inputs['thongsokt'] = $inputs['edit_thongsokt'];
            $inputs['xuatxu'] = $inputs['edit_xuatxu'];
            $inputs['dvt'] = $inputs['edit_dvt'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmHangHoa::findOrFail($id);
            $model->update($inputs);
            return redirect('dmhanghoa?&manhom='.$model->manhom);
        }else
            return view('errors.notlogin');
    }
}
