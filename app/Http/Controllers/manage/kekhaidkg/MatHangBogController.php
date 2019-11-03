<?php

namespace App\Http\Controllers\manage\kekhaidkg;

use App\Model\system\dmnganhnghekd\DmNgheKd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MatHangBogController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mh'] = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first()->tennghe;
            $modeldmnghe = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first();

            return view('manage.kkgia.dkg.danhmuc.index')
                ->with('modeldmnghe',$modeldmnghe)
                ->with('inputs',$inputs)
                ->with('pageTitle','Thông tin ' .$inputs['mh']);
        }else
            return view('errors.notlogin');
    }

    public function edit(Request $request){
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
        $model = DmNgheKd::findOrFail($id);


        $result['message'] = '<div class="modal-body" id="edit-tt">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã mặt hàng<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" class="form-control" value="'.$model->tennghe.'" disabled/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đăng ký/Kê khai<span class="require">*</span></label>';
        $result['message'] .= '<select class="form-control" id="phanloai" name="phanloai">';
        if($model->phanloai == 'DK') {
            $result['message'] .= '<option value="DK" selected>Đăng ký</option>';
            $result['message'] .= '<option value="KK">Kê khai</option>';
        }else {
            $result['message'] .= '<option value="DK">Đăng ký</option>';
            $result['message'] .= '<option value="KK" selected>Kê khai</option>';
        }
        $result['message'] .= '</select';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<input type="hidden" name="id" id="id" class="form-control" value="'.$model->id.'"/>';
        $result['message'] .= '<input type="hidden" name="manghe" id="manghe" class="form-control" value="'.$model->manghe.'"/>';

        $result['message'] .= '</div>';
        $result['status'] = 'success';


        die(json_encode($result));
    }

    public function update(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modeldmnghe = DmNgheKd::where('id',$inputs['id'])
                ->where('manghe',$inputs['manghe'])
                ->first();
            $modeldmnghe->phanloai = $inputs['phanloai'];
            $modeldmnghe->save();

            return redirect('thongtinmathangbog?manghe='.$inputs['manghe']);
        }else
            return view('errors.notlogin');
    }
}
