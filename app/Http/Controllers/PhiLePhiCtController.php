<?php

namespace App\Http\Controllers;

use App\PhiLePhiCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PhiLePhiCtController extends Controller
{
    public function store(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        if(isset($inputs['ptcp'])){
            $inputs['mucthuphi'] = getMoneyToDb($inputs['mucthuphi']);
            $modeladd = new PhiLePhiCt();
            $modeladd->create($inputs);

            $model = PhiLePhiCt::where('mahs',$inputs['mahs'])->get();
            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên phí</th>';
            $result['message'] .= '<th style="text-align: center">Mức thu phí</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->ptcp . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->mucthuphi) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->ghichu . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $ttbog->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
        }
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function show(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $id = $inputs['id'];

            $model = PhiLePhiCt::findOrFail($id);
            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tên phí</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="ptcpedit" name="ptcpedit" class="form-control" value="'.$model->ptcp.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Mức thu phí</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right; font-weight: bold" id="mucthuphiedit" name="mucthuphiedit" class="form-control" data-mask="fdecimal" value="'.$model->mucthuphi.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Ghi chú</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="ghichuctedit" name="ghichuctedit" class="form-control" value="'.$model->ghichu.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$model->id.'">';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function update(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        if(isset($inputs['ptcp'])){
            $inputs['mucthuphi'] = getMoneyToDb($inputs['mucthuphi']);
            $modeladd = PhiLePhiCt::where('id',$inputs['id'])->first();
            $modeladd->update($inputs);

            $model = PhiLePhiCt::where('mahs',$inputs['mahs'])->get();
            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên phí</th>';
            $result['message'] .= '<th style="text-align: center">Mức thu phí</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->ptcp . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->mucthuphi) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->ghichu . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $ttbog->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
        }
        $result['status'] = 'success';
        die(json_encode($result));
    }


    public function destroy(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        if(isset($inputs['id'])){
            $modeladd = PhiLePhiCt::where('id',$inputs['id'])->first();
            $modeladd->delete();

            $model = PhiLePhiCt::where('mahs',$inputs['mahs'])->get();
            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên phí</th>';
            $result['message'] .= '<th style="text-align: center">Mức thu phí</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->ptcp . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->mucthuphi) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->ghichu . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $ttbog->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
        }
        $result['status'] = 'success';
        die(json_encode($result));
    }
}
