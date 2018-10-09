<?php

namespace App\Http\Controllers;

use App\LePhiTruocBaCt;
use App\NhomLePhiTruocBa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LePhiTruocBaCtController extends Controller
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
        if(isset($inputs['nhanhieu'])){
            $inputs['giatinhlptb'] = getMoneyToDb($inputs['giatinhlptb']);
            $modeladd = new LePhiTruocBaCt();
            $modeladd->create($inputs);

            $model = LePhiTruocBaCt::where('mahs',$inputs['mahs'])
                ->join('nhomlephitruocba','nhomlephitruocba.manhom','=','lephitruocbact.manhom')
                ->select('lephitruocbact.*','nhomlephitruocba.nhomxe')->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Nhóm xe</th>';
            $result['message'] .= '<th style="text-align: center">Nhãn hiệu</th>';
            $result['message'] .= '<th style="text-align: center">Tên thương mại</th>';
            $result['message'] .= '<th style="text-align: center">Thể tích làm việc</th>';
            $result['message'] .= '<th style="text-align: center">Số chỗ ngồi</th>';
            $result['message'] .= '<th style="text-align: center">Giá tính LPTB</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->nhomxe . '</td>';
                    $result['message'] .= '<td>' . $ttbog->nhanhieu . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->tentm . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $ttbog->ttlv . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $ttbog->socho . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giatinhlptb) . '</td>';
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

            $model = LePhiTruocBaCt::findOrFail($id);
            $modelnhomxe = NhomLePhiTruocBa::all();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Nhóm xe</b><span class="require">*</span></label>';
            $result['message'] .= '<div><select name="thapdungedit" id="thapdungedit" class="form-control">';
            foreach($modelnhomxe as $nhomxe){
                if($nhomxe->manhom == $model->manhom)
                    $result['message'] .= '<option value="'.$nhomxe->manhom.'" selected>'.$nhomxe->nhomxe.' </option>';
                else
                    $result['message'] .= '<option value="'.$nhomxe->manhom.'">'.$nhomxe->nhomxe.' </option>';
            }
            $result['message'] .= '</select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Nhãn hiệu</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="nhanhieuedit" name="nhanhieuedit" class="form-control" value="'.$model->nhanhieu.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tên thương mại</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="tentmedit" name="tentmedit" class="form-control" value="'.$model->tentm.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Thể tích làm việc</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="ttlvedit" name="ttlvedit" class="form-control" value="'.$model->ttlv.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Số chỗ ngồi</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="sochoedit" name="sochoedit" class="form-control" value="'.$model->socho.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá tính LPTB</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right" id="giatinhlptbedit" name="giatinhlptbedit" class="form-control" data-mask="fdecimal" value="'.$model->giatinhlptb.'"></div>';
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
        if(isset($inputs['nhanhieu'])){
            $inputs['giatinhlptb'] = getMoneyToDb($inputs['giatinhlptb']);
            $modeladd = LePhiTruocBaCt::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = LePhiTruocBaCt::where('mahs',$inputs['mahs'])
                ->join('nhomlephitruocba','nhomlephitruocba.manhom','=','lephitruocbact.manhom')
                ->select('lephitruocbact.*','nhomlephitruocba.nhomxe')->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Nhóm xe</th>';
            $result['message'] .= '<th style="text-align: center">Nhãn hiệu</th>';
            $result['message'] .= '<th style="text-align: center">Tên thương mại</th>';
            $result['message'] .= '<th style="text-align: center">Thể tích làm việc</th>';
            $result['message'] .= '<th style="text-align: center">Số chỗ ngồi</th>';
            $result['message'] .= '<th style="text-align: center">Giá tính LPTB</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->nhomxe . '</td>';
                    $result['message'] .= '<td>' . $ttbog->nhanhieu . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->tentm . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $ttbog->ttlv . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $ttbog->socho . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giatinhlptb) . '</td>';
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
            $modeladd = LePhiTruocBaCt::where('id',$inputs['id'])->first();
            $modeladd->delete();


            $model = LePhiTruocBaCt::where('mahs',$inputs['mahs'])
                ->join('nhomlephitruocba','nhomlephitruocba.manhom','=','lephitruocbact.manhom')
                ->select('lephitruocbact.*','nhomlephitruocba.nhomxe')->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Nhóm xe</th>';
            $result['message'] .= '<th style="text-align: center">Nhãn hiệu</th>';
            $result['message'] .= '<th style="text-align: center">Tên thương mại</th>';
            $result['message'] .= '<th style="text-align: center">Thể tích làm việc</th>';
            $result['message'] .= '<th style="text-align: center">Số chỗ ngồi</th>';
            $result['message'] .= '<th style="text-align: center">Giá tính LPTB</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->nhomxe . '</td>';
                    $result['message'] .= '<td>' . $ttbog->nhanhieu . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->tentm . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $ttbog->ttlv . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $ttbog->socho . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giatinhlptb) . '</td>';
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
