<?php

namespace App\Http\Controllers;

use App\kkdkgctdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDkgCtDfController extends Controller
{
    public function add(Request $request){
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
        //dd($inputs);
        if(isset($inputs['tenhh'])){
            $inputs['mahs'] = '123456';
            $inputs['gialk'] = getDouble($inputs['gialk']);
            $inputs['giakk'] = getDouble($inputs['giakk']);
            $modeladd = new kkdkgctdf();

            $modeladd->create($inputs);
            //dd($inputs);
            $model = kkdkgctdf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhh.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->gialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->giakk).'</td>';
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

            $model = kkdkgctdf::findOrFail($id);
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tên mặt hàng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tenhhedit" id="tenhhedit" class="form-control" value="'.$model->tenhh.'"></div>';
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
            $result['message'] .= '<div><input type="text" style="text-align: right" id="gialkedit" name="gialkedit" class="form-control" data-mask="fdecimal" value="'.$model->gialk.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá đăng ký</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right" id="giakkedit" name="giakkedit" class="form-control" data-mask="fdecimal" value="'.$model->giakk.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="dvtedit" class="form-control" name="dvtedit" >'.$model->dvt.'</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$model->id.'">';
            $result['message'] .= '<input type="hidden" id="maxa" name="maxa" value="'.$model->maxa.'">';
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
            $inputs['mahs'] = '123456' ;
            $inputs['gialk'] = getDouble($inputs['gialk']);
            $inputs['giakk'] = getDouble($inputs['giakk']);
            $modeladd = kkdkgctdf::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = kkdkgctdf::where('maxa',$inputs['maxa'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhh.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->gialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->giakk).'</td>';
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
            $inputs['mahs'] = '123456';
            $modeladd = kkdkgctdf::where('id',$inputs['id'])->delete();

            $model = kkdkgctdf::where('maxa',$inputs['maxa'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhh.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->gialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttmh->giakk).'</td>';
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
