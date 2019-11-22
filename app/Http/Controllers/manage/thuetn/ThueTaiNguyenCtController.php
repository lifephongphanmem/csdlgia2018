<?php

namespace App\Http\Controllers\manage\thuetn;

use App\Model\manage\dinhgia\thuetn\ThueTaiNguyenCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThueTaiNguyenCtController extends Controller
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
        $model = ThueTaiNguyenCt::findOrFail($id);
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
            $modelupdate = ThueTaiNguyenCt::where('id',$inputs['id'])->first();
            $inputs['gia'] = getDoubleToDb($inputs['gia']);
            $modelupdate->update($inputs);

            $model = ThueTaiNguyenCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 1</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 2</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 3</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br>cấp 4</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Mã nhóm,<br> loại tài nguyên<br> cấp 5</th>';
            $result['message'] .= '<th style="text-align: center">Tên nhóm, loại<br> tài nguyên</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Đơn <br>vị<br> tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%" >Giá tính <br>thuế tài nguyên<br> (đồng)</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->cap1.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->cap2.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->cap3.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->cap4.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->cap5.'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->ten.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'. dinhdangsothapphan($tents->gia,5).'</td>';
                    $result['message'] .= '<td>';
                    $result['message'] .= '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Nhập giá</button>';
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
