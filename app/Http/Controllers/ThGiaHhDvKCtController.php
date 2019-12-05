<?php

namespace App\Http\Controllers;

use App\ThGiaHhDvKCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThGiaHhDvKCtController extends Controller
{
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
        $model = ThGiaHhDvKCt::findOrFail($id);

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
        //dd($request);
        $inputs = $request->all();
//        dd($inputs);
        if(isset($inputs['id'])){
            $modelupdate = ThGiaHhDvKCt::where('id',$inputs['id'])->first();
            $inputs['gialk'] = getDoubleToDb($inputs['gialk']);
            $inputs['gia'] = getDoubleToDb($inputs['gia']);
            $modelupdate->update($inputs);

            $model = ThGiaHhDvKCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mã nhóm<br> hàng hóa<br> dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Tên nhóm<br> hàng hóa<br> dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Mã <br>hàng hóa<br> dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hóa dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Đặc điểm kỹ thuật</th>';
            $result['message'] .= '<th style="text-align: center">Đơn <br>vị<br> tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá kỳ trước</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Giá kỳ này</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->manhom.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tents->nhom.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->mahhdv.'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->tenhhdv.'</td>';
                    $result['message'] .= '<td>'.$tents->dacdiemkt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. dinhdangsothapphan($tents->gialk,5).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. dinhdangsothapphan($tents->gia,5).'</td>';
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
