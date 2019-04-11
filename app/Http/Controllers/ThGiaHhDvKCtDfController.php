<?php

namespace App\Http\Controllers;

use App\ThGiaHhDvKCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThGiaHhDvKCtDfController extends Controller
{
    public function show(Request $request)
    {
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

            $model = ThGiaHhDvKCtDf::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tên hàng hóa, dịch vụ<span class="require">*</span></label>';
            $result['message'] .= '<div><label style="color: blue">'.$model->tenhhdv.'</label></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đặc điểm kinh tế, kỹ thuật, quy cách<span class="require">*</span></label>';
            $result['message'] .= '<div><label style="color: blue">'.$model->dacdiemkt.'</label></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị tính<span class="require">*</span></label>';
            $result['message'] .= '<div><label style="color:blue;">'.$model->dvt.'</label></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá liền lề<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="gialkedit" id="gialkedit" class="form-control" data-mask="fdecimal" value="'.$model->gialk.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giaedit" id="giaedit" class="form-control" data-mask="fdecimal" value="'.$model->gia.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguồn thông tin<span class="require">*</span></label>';
            $result['message'] .= '<input type="text" name="nguonttedit" id="nguonttedit" class="form-control" value="'.$model->nguontt.'"/>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ghi chú<span class="require">*</span></label>';
            $result['message'] .= '<input type="text" name="ghichuedit" id="ghichuedit" class="form-control" value="'.$model->ghichu.'"/>';
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
            $modelupdate = ThGiaHhDvKCtDf::where('id',$inputs['id'])->first();
            $inputs['gia'] = getDbl($inputs['gia']);
            $inputs['gialk'] = getDbl($inputs['gialk']);
            $modelupdate->update($inputs);

            $model = ThGiaHhDvKCtDf::where('manhom',$inputs['manhom'])
                //->where('ngaychotbc',$inputs['ngaychotbc'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center" width="25%">Hàng hóa, dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Đặc điểm kinh tế,<br>kỹ thuật, quy cách</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn vị</br>tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá liền kề</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.$tents->mahhdv.'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tenhhdv.'</td>';
                    $result['message'] .= '<td class="active">'.$tents->dacdiemkt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->gialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->gia).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai</button>'.
                        '</td>';
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
