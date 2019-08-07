<?php

namespace App\Http\Controllers\manage\giathitruong;

use App\Model\manage\dinhgia\giathitruong\GiaThiTruongCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThiTruongCtController extends Controller
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
        $model = GiaThiTruongCt::findOrFail($id);
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

        if(isset($inputs['id'])){
            $modelupdate = GiaThiTruongCt::where('id',$inputs['id'])->first();
            $inputs['dongia'] = getDbl($inputs['dongia']);
            $modelupdate->update($inputs);

            $model = GiaThiTruongCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mã<br> nhóm</th>';
            $result['message'] .= '<th style="text-align: center">Tên nhóm</th>';
            $result['message'] .= '<th style="text-align: center">Mã<br> hàng hóa</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hóa dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Đặc điểm kỹ thuật</th>';
            $result['message'] .= '<th style="text-align: center">Đơn <br>vị<br> tính</th>';
            $result['message'] .= '<th style="text-align: center">Loại giá</th>';
            $result['message'] .= '<th style="text-align: center">Giá</th>';
            $result['message'] .= '<th style="text-align: center">Nguồn thông tin</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->manhom.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->tennhom.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->mahh.'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->tenhh.'</td>';
                    $result['message'] .= '<td>'.$tents->dacdiemkt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->loaigia.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. number_format($tents->dongia).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->nguontt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->ghichu.'</td>';
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
