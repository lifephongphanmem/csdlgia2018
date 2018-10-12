<?php

namespace App\Http\Controllers;

use App\DvKcbCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DvKcbCtDfController extends Controller
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

            $model = DvKcbCtDf::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá dịch vụ<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="edit_giadv" id="edit_giadv" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold" value="'.$model->giadv.'"></div>';
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
            $modelupdate = DvKcbCtDf::where('id',$inputs['id'])->first();
            $inputs['giadv'] = getDbl($inputs['giadv']);
            $modelupdate->update($inputs);

            $model = DvKcbCtDf::where('maxa',$inputs['maxa'])
                ->where('manhom',$inputs['manhom'])->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Cấp độ</th>';
            $result['message'] .= '<th style="text-align: center">Mã dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Tên dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->capdo.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->madv.'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->tendichvu.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.($tents->dvt != '' ? number_format($tents->giadv) : '').'</td>';
                    $result['message'] .= '<td>';
                    if($tents->dvt != '')
                        $result['message'] .= '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai</button>';

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
