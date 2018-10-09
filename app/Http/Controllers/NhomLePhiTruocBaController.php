<?php

namespace App\Http\Controllers;

use App\LePhiTruocBaCt;
use App\LePhiTruocBaCtDf;
use App\NhomLePhiTruocBa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NhomLePhiTruocBaController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){

            $model = NhomLePhiTruocBa::all();
            return view('manage.dinhgia.lephitruocba.danhmuc.index')
                ->with('model',$model)
                ->with('pageTitle','Thông tin nhóm xe tính thuế trước bạ');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = new NhomLePhiTruocBa();
            $model->create($inputs);
            return redirect('nhomlephitruocba');
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
        $model = NhomLePhiTruocBa::findOrFail($id);
        $check = LePhiTruocBaCtDf::where('manhom',$model->manhom)->count();
        $check1 = LePhiTruocBaCt::where('manhom',$model->manhom)->count();


        $result['message'] = '<div class="modal-body" id="edit-tt">';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên nhóm loại xe<span class="require">*</span></label>';
        if($check == 0 && $check1 == 0)
            $result['message'] .= '<input type="text" name="edit_manhom" id="edit_manhom" class="form-control" value="'.$model->manhom.'"/>';
        else
            $result['message'] .= '<label  class="form-control" style="color: #0000ff">'.$model->manhom.'</label>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên nhóm loại xe<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_nhomxe" id="edit_nhomxe" class="form-control" value="'.$model->nhomxe.'"/>';
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
            $inputs['nhomxe'] = $inputs['edit_nhomxe'];
            $model =  NhomLePhiTruocBa::findOrFail($id);
            $model->update($inputs);
            return redirect('nhomlephitruocba');
        }else
            return view('errors.notlogin');
    }
}
