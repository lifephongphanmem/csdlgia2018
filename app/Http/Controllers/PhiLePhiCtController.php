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
            $inputs['trangthai'] = 'CXD';
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
        $model = PhiLePhiCt::findOrFail($id);
        die($model);
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
            $modeladd = PhiLePhiCt::where('id',$inputs['id'])->delete();

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
