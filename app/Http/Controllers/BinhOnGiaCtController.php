<?php

namespace App\Http\Controllers;

use App\BinhOnGiaCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BinhOnGiaCtController extends Controller
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
        if(isset($inputs['tenhh'])){
            $inputs['giatoithieu'] = getMoneyToDb($inputs['giatoithieu']);
            $inputs['giatoida'] = getMoneyToDb($inputs['giatoida']);
            $modeladd = new BinhOnGiaCt();
            $modeladd->create($inputs);

            $model = BinhOnGiaCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên mặt hàng bog</th>';
            $result['message'] .= '<th style="text-align: center">Giá tối thiểu</th>';
            $result['message'] .= '<th style="text-align: center">Giá tối đa</th>';
            $result['message'] .= '<th style="text-align: center">Thời hạn <br> áp dụng</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttbog){
                    $result['message'] .= '<tr id="'.$ttbog->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttbog->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttbog->giatoithieu).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttbog->giatoida).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ttbog->thapdung.' tháng </td>';
                    $result['message'] .= '<td>'.$ttbog->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttbog->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttbog->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

            $model = BinhOnGiaCt::findOrFail($id);
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tên mặt hàng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tenhhedit" id="tenhhedit" class="form-control" value="'.$model->tenhh.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Thời hạn áp dụng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><select name="thapdungedit" id="thapdungedit" class="form-control">';

            for($i = 1; $i <= 6; $i++){
                if($i == $model->thapdung)
                    $result['message'] .= '<option value="'.$i.'" selected>'.$i.' tháng </option>';
                else
                    $result['message'] .= '<option value="'.$i.'" >'.$i.' tháng </option>';
            }
            $result['message'] .= '</select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá tối thiểu</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right" id="giatoithieuedit" name="giatoithieuedit" class="form-control" data-mask="fdecimal" value="'.$model->giatoithieu.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá tối đa</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right" id="giatoidaedit" name="giatoidaedit" class="form-control" data-mask="fdecimal" value="'.$model->giatoida.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Ghi chú</b><span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="ghichuedit" class="form-control" name="ghichuedit" cols="30" rows="3">'.$model->ghichu.'</textarea></div>';
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
            $inputs['giatoithieu'] = getMoneyToDb($inputs['giatoithieu']);
            $inputs['giatoida'] = getMoneyToDb($inputs['giatoida']);
            $modeladd = BinhOnGiaCt::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = BinhOnGiaCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên mặt hàng bog</th>';
            $result['message'] .= '<th style="text-align: center">Giá tối thiểu</th>';
            $result['message'] .= '<th style="text-align: center">Giá tối đa</th>';
            $result['message'] .= '<th style="text-align: center">Thời hạn <br> áp dụng</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttbog){
                    $result['message'] .= '<tr id="'.$ttbog->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttbog->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttbog->giatoithieu).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttbog->giatoida).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ttbog->thapdung.' tháng </td>';
                    $result['message'] .= '<td>'.$ttbog->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttbog->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttbog->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
            $modeldel = BinhOnGiaCt::where('id',$inputs['id'])->delete();

            $model = BinhOnGiaCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên mặt hàng bog</th>';
            $result['message'] .= '<th style="text-align: center">Giá tối thiểu</th>';
            $result['message'] .= '<th style="text-align: center">Giá tối đa</th>';
            $result['message'] .= '<th style="text-align: center">Thời hạn <br> áp dụng</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttbog){
                    $result['message'] .= '<tr id="'.$ttbog->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttbog->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttbog->giatoithieu).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.number_format($ttbog->giatoida).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$ttbog->thapdung.' tháng </td>';
                    $result['message'] .= '<td>'.$ttbog->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttbog->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttbog->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
