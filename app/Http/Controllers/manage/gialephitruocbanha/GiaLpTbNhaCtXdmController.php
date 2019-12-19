<?php

namespace App\Http\Controllers\manage\gialephitruocbanha;

use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNhaCtXdm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaLpTbNhaCtXdmController extends Controller
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
//        dd($inputs);

        if(isset($inputs['loaict'])){
            $modeladd = new GiaLpTbNhaCtXdm();
            $inputs['dongia'] = getDoubleToDb($inputs['dongia']);
            $inputs['trangthai'] = 'CXD';
            $modeladd->create($inputs);

            $model = GiaLpTbNhaCtXdm::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="banggiaxdm">';
            $result['message'] .= '<div class="col-md-12">
            <table class="table table-striped table-bordered table-hover" id="sample_3">
                <thead>
                <tr>
                    <th width="2%" style="text-align: center">STT</th>
                    <th style="text-align: center">Loại công trình</th>
                    <th style="text-align: center" width="5%">Cấp nhà</th>
                    <th style="text-align: center" width="10%">Đơn vị tính</th>
                    <th style="text-align: center" width="10%">Đơn giá</th>
                    <th width="15%" style="text-align: center">Thao tác</th>
                </tr>
                </thead>
            <tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tents->loaict.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->capnha.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. dinhdangsothapphan($tents->dongia,5).'</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditXdm(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>';
                    $result['message'] .= '<button type="button" data-target="#modal-delete-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdXdm(' . $tents->id . ');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>';
                    $result['message'] .= '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
            $result['status'] = 'success';
        }
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
        $model = GiaLpTbNhaCtXdm::findOrFail($id);
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
//        dd($inputs);

        if(isset($inputs['loaict'])){
            $modelupdate = GiaLpTbNhaCtXdm::where('id',$inputs['id'])->first();
            $inputs['dongia'] = getDoubleToDb($inputs['dongia']);
            $modelupdate->update($inputs);

            $model = GiaLpTbNhaCtXdm::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="banggiaxdm">';
            $result['message'] .= '<div class="col-md-12">
            <table class="table table-striped table-bordered table-hover" id="sample_3">
                <thead>
                <tr>
                    <th width="2%" style="text-align: center">STT</th>
                    <th style="text-align: center">Loại công trình</th>
                    <th style="text-align: center" width="5%">Cấp nhà</th>
                    <th style="text-align: center" width="10%">Đơn vị tính</th>
                    <th style="text-align: center" width="10%">Đơn giá</th>
                    <th width="15%" style="text-align: center">Thao tác</th>
                </tr>
                </thead>
            <tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tents->loaict.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->capnha.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. dinhdangsothapphan($tents->dongia,5).'</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditXdm(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>';
                    $result['message'] .= '<button type="button" data-target="#modal-delete-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdXdm(' . $tents->id . ');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>';
                    $result['message'] .= '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
            $result['status'] = 'success';

        }
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
            $modeldel = GiaLpTbNhaCtXdm::where('id',$inputs['id'])->delete();

            $model = GiaLpTbNhaCtXdm::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="banggiaxdm">';
            $result['message'] .= '<div class="col-md-12">
            <table class="table table-striped table-bordered table-hover" id="sample_3">
                <thead>
                <tr>
                    <th width="2%" style="text-align: center">STT</th>
                    <th style="text-align: center">Loại công trình</th>
                    <th style="text-align: center" width="5%">Cấp nhà</th>
                    <th style="text-align: center" width="10%">Đơn vị tính</th>
                    <th style="text-align: center" width="10%">Đơn giá</th>
                    <th width="15%" style="text-align: center">Thao tác</th>
                </tr>
                </thead>
            <tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tents->loaict.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->capnha.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. dinhdangsothapphan($tents->dongia,5).'</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditXdm(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>';
                    $result['message'] .= '<button type="button" data-target="#modal-delete-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdXdm(' . $tents->id . ');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>';
                    $result['message'] .= '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }
}

