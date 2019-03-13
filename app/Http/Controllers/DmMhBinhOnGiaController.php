<?php

namespace App\Http\Controllers;

use App\DmMhBinhOnGia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmMhBinhOnGiaController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = DmMhBinhOnGia::all();
            return view('manage.bog.danhmuc.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục mặt hàng bình ổn giá');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new DmMhBinhOnGia();
            $model->create($inputs);
            return redirect('dmmhbinhongia');
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
        $model = DmMhBinhOnGia::findOrFail($id);


        $result['message'] = '<div class="modal-body" id="edit-tt">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã mặt hàng<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_mamh" id="edit_mamh" class="form-control" value="'.$model->mamh.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên mặt hàng<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tenmh" id="edit_tenmh" class="form-control" value="'.$model->tenmh.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Hiển thị<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_hienthi" id="edit_hienthi" class="form-control" value="'.$model->hienthi.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đăng ký/Kê khai<span class="require">*</span></label>';
        $result['message'] .= '<select class="form-control" id="edit_dangkykekhai" name="edit_dangkykekhai">';
        if($model->dangkykekhai == 'dangky') {
            $result['message'] .= '<option value="dangky" selected>Đăng ký</option>';
            $result['message'] .= '<option value="kekhai">Kê khai</option>';
        }else {
            $result['message'] .= '<option value="dangky">Đăng ký</option>';
            $result['message'] .= '<option value="kekhai" selected>Kê khai</option>';
        }
        $result['message'] .= '</select';
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
            $model = DmMhBinhOnGia::findOrFail($id);
            $model->mamh = $inputs['edit_mamh'];
            $model->tenmh = $inputs['edit_tenmh'];
            $model->hienthi = $inputs['edit_hienthi'];
            $model->dangkykekhai = $inputs['edit_dangkykekhai'];
            $model->save();
            return redirect('dmmhbinhongia');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = DmMhBinhOnGia::findOrFail($id)->delete();
            return redirect('dmmhbinhongia');
        }else
            return view('errors.notlogin');
    }
}
