<?php

namespace App\Http\Controllers;

use App\GiaThueMuaNhaXhCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThueMuaNhaXhCtDfController extends Controller
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
        if(isset($inputs['loainha'])){
            if($inputs['loainha'] != '') {
                $inputs['dongia'] = getMoneyToDb($inputs['dongia']);
                $modeladd = new GiaThueMuaNhaXhCtDf();
                $modeladd->create($inputs);
            }

            $model = GiaThueMuaNhaXhCtDf::where('mahuyen',$inputs['mahuyen'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại nhà</th>';
            $result['message'] .= '<th style="text-align: center">Thời gian</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Hệ số điều chỉnh</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->loainha . '</td>';
                    $result['message'] .= '<td>' . $ttbog->thoigian . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongia) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->hesodc . '</td>';
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

            $model = GiaThueMuaNhaXhCtDf::findOrFail($id);
            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Loại nhà</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="loainhaedit" name="loainhaedit" class="form-control" value="'.$model->loainha.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Thời gian</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="thoigianedit" name="thoigianedit" class="form-control" value="'.$model->thoigian.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right;font-weight: bold" id="dongiaedit" name="dongiaedit" class="form-control" data-mask="fdecimal" value="'.$model->dongia.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Hệ số điều chỉnh</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="hesodcedit" name="hesodcedit" class="form-control" value="'.$model->hesodc.'"></div>';
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
        if(isset($inputs['loainha'])){
            $inputs['dongia'] = getMoneyToDb($inputs['dongia']);
            $modeladd = GiaThueMuaNhaXhCtDf::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = GiaThueMuaNhaXhCtDf::where('mahuyen',$inputs['mahuyen'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại nhà</th>';
            $result['message'] .= '<th style="text-align: center">Thời gian</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Hệ số điều chỉnh</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->loainha . '</td>';
                    $result['message'] .= '<td>' . $ttbog->thoigian . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongia) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->hesodc . '</td>';
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
            $modeladd = GiaThueMuaNhaXhCtDf::where('id',$inputs['id'])->first();
            $modeladd->delete();

            $model = GiaThueMuaNhaXhCtDf::where('mahuyen',$inputs['mahuyen'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại nhà</th>';
            $result['message'] .= '<th style="text-align: center">Thời gian</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Hệ số điều chỉnh</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->loainha . '</td>';
                    $result['message'] .= '<td>' . $ttbog->thoigian . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongia) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->hesodc . '</td>';
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
