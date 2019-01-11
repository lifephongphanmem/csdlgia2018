<?php

namespace App\Http\Controllers;

use App\GiaHhDvKCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaHhDvKCtDfController extends Controller
{
    public function edit(Request $request){
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

            $model = GiaHhDvKCtDf::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá liền kề<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="edit_gialk" id="edit_gialk" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold" value="'.$model->gialk.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="edit_gia" id="edit_gia" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold" value="'.$model->gia.'"></div>';
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
            $modelupdate = GiaHhDvKCtDf::where('id',$inputs['id'])->first();
            $inputs['gialk'] = getDbl($inputs['gialk']);
            $inputs['gia'] = getDbl($inputs['gia']);
            $modelupdate->update($inputs);

            $model = GiaHhDvKCtDf::where('district',$inputs['district'])
                ->where('manhom',$inputs['manhom'])->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mã hàng hóa<br> dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hóa dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Đặc điểm kỹ thuật</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá liền kề</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->mahhdv.'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->tenhhdv.'</td>';
                    $result['message'] .= '<td>'.$tents->dacdiemkt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. number_format($tents->gialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. number_format($tents->gia).'</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Nhập giá</button>';
                    $result['message'] .= '</td>';
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
