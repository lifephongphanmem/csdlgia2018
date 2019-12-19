<?php

namespace App\Http\Controllers\manage\gialephitruocbanha;

use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNhaCtClcl;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaLpTbNhaCtClclController extends Controller
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

        if(isset($inputs['capnha'])){
            $modeladd = new GiaLpTbNhaCtClcl();
            $inputs['thoigiansd'] = getDoubleToDb($inputs['thoigiansd']);
            $inputs['tylehm'] = getDoubleToDb($inputs['tylehm']);
            $inputs['trangthai'] = 'CXD';
            $modeladd->create($inputs);

            $model = GiaLpTbNhaCtClcl::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="bangclcl">';
            $result['message'] .= '<div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th style="text-align: center">Cấp nhà</th>
                    <th style="text-align: center" width="10%">Thời gian sử dụng (năm)</th>
                    <th style="text-align: center" width="10%">Tỷ lệ hao mòn (%/năm)</th>
                    <th width="15%" style="text-align: center">Thao tác</th>
                </tr>
                </thead>
            <tbody>';
            if(count($model) > 0) {
                foreach ($model as $tents) {
                    $result['message'] .= '<tr id="' . $tents->id . '">';
                    $result['message'] .= '<td style="text-align: left">' . $tents->capnha . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold">' . dinhdangsothapphan($tents->thoigiansd, 5) . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold">' . dinhdangsothapphan($tents->tylehm, 5) . '</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditClcl(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>';
                    $result['message'] .= '<button type="button" data-target="#modal-delete-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdClcl(' . $tents->id . ');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>';
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
        $model = GiaLpTbNhaCtClcl::findOrFail($id);
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

        if(isset($inputs['capnha'])){
            $modelupdate = GiaLpTbNhaCtClcl::where('id',$inputs['id'])->first();
            $inputs['thoigiansd'] = getDoubleToDb($inputs['thoigiansd']);
            $inputs['tylehm'] = getDoubleToDb($inputs['tylehm']);
            $modelupdate->update($inputs);

            $model = GiaLpTbNhaCtClcl::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="bangclcl">';
            $result['message'] .= '<div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th style="text-align: center">Cấp nhà</th>
                    <th style="text-align: center" width="10%">Thời gian sử dụng (năm)</th>
                    <th style="text-align: center" width="10%">Tỷ lệ hao mòn (%/năm)</th>
                    <th width="15%" style="text-align: center">Thao tác</th>
                </tr>
                </thead>
            <tbody>';
            if(count($model) > 0) {
                foreach ($model as $tents) {
                    $result['message'] .= '<tr id="' . $tents->id . '">';
                    $result['message'] .= '<td style="text-align: left">' . $tents->capnha . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold">' . dinhdangsothapphan($tents->thoigiansd, 5) . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold">' . dinhdangsothapphan($tents->tylehm, 5) . '</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditClcl(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>';
                    $result['message'] .= '<button type="button" data-target="#modal-delete-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdClcl(' . $tents->id . ');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>';
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
            $modeldel = GiaLpTbNhaCtClcl::where('id',$inputs['id'])->delete();

            $model = GiaLpTbNhaCtClcl::where('mahs',$inputs['mahs'])
                ->get();

            $$result['message'] = '<div class="row" id="bangclcl">';
            $result['message'] .= '<div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th style="text-align: center">Cấp nhà</th>
                    <th style="text-align: center" width="10%">Thời gian sử dụng (năm)</th>
                    <th style="text-align: center" width="10%">Tỷ lệ hao mòn (%/năm)</th>
                    <th width="15%" style="text-align: center">Thao tác</th>
                </tr>
                </thead>
            <tbody>';
            if(count($model) > 0) {
                foreach ($model as $tents) {
                    $result['message'] .= '<tr id="' . $tents->id . '">';
                    $result['message'] .= '<td style="text-align: left">' . $tents->capnha . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold">' . dinhdangsothapphan($tents->thoigiansd, 5) . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold">' . dinhdangsothapphan($tents->tylehm, 5) . '</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditClcl(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>';
                    $result['message'] .= '<button type="button" data-target="#modal-delete-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdClcl(' . $tents->id . ');"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>';
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
