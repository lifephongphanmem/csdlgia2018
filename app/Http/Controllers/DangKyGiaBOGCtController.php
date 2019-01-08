<?php

namespace App\Http\Controllers;

use App\dkghosoct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DangKyGiaBOGCtController extends Controller
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
        //dd($request);
        $inputs = $request->all();
        if(isset($inputs['tenhhdv'])){
            $inputs['mucgiahienhanh'] = getDouble($inputs['mucgiahienhanh']);
            $inputs['mucgiamoi'] = getDouble($inputs['mucgiamoi']);
            $modeladd = new dkghosoct();
            $modeladd->create($inputs);

            $model = dkghosoct::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhdkg">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên mặt hàng bog</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách, </br> chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị tính</th>';
            $result['message'] .= '<th style="text-align: center">Giá hiện hành</th>';
            $result['message'] .= '<th style="text-align: center">Giá đăng ký</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhhdv.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->donvitinh.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->mucgiahienhanh).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->mucgiamoi).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttmh->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttmh->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }
        }
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

            $model = dkghosoct::findOrFail($id);
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tên mặt hàng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tenhhdvedit" id="tenhhdvedit" class="form-control" value="'.$model->tenhhdv.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Quy cách, chất lượng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="quycachedit" id="quycachedit" value="'.$model->quycach.'" class="form-control"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá hiện hành</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right" id="mucgiahienhanhedit" name="mucgiahienhanhedit" class="form-control" data-mask="fdecimal" value="'.$model->mucgiahienhanh.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá đăng ký</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right" id="mucgiamoiedit" name="mucgiamoiedit" class="form-control" data-mask="fdecimal" value="'.$model->mucgiamoi.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="donvitinhedit" class="form-control" name="donvitinhedit" value="'.$model->donvitinh.'"></div>';
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
        //dd($request);
        $inputs = $request->all();
        if(isset($inputs['id'])){
            $inputs['mucgiahienhanh'] = getDouble($inputs['mucgiahienhanh']);
            $inputs['mucgiamoi'] = getDouble($inputs['mucgiamoi']);
            $modeladd = dkghosoct::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = dkghosoct::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhdkg">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên mặt hàng bog</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách, </br> chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị tính</th>';
            $result['message'] .= '<th style="text-align: center">Giá hiện hành</th>';
            $result['message'] .= '<th style="text-align: center">Giá đăng ký</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhhdv.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->donvitinh.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->mucgiahienhanh).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->mucgiamoi).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttmh->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttmh->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }
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
        //dd($request);
        $inputs = $request->all();
        if(isset($inputs['id'])){
            $modeldel = dkghosoct::where('id',$inputs['id'])->delete();

            $model = dkghosoct::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhdkg">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên mặt hàng bog</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách, </br> chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị tính</th>';
            $result['message'] .= '<th style="text-align: center">Giá hiện hành</th>';
            $result['message'] .= '<th style="text-align: center">Giá đăng ký</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhhdv.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->donvitinh.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->mucgiahienhanh).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->mucgiamoi).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttmh->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttmh->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        .'</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }
}
