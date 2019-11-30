<?php

namespace App\Http\Controllers\manage\giaspdvci;

use App\Model\manage\dinhgia\giaspdvci\GiaSpDvCiCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaSpDvCiCtController extends Controller
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
        if(isset($inputs['mota'])){
            $inputs['gia'] = getMoneyToDb($inputs['gia']);
            $inputs['trangthai'] = 'CXD';
            $modelkkgia = new GiaSpDvCiCt();
            $modelkkgia->create($inputs);

            $model = GiaSpDvCiCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn vị tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="success">'.$tt->mota.'</td>';
                    $result['message'] .= '<td>'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.dinhdangsothapphan($tt->gia,5).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#edit-modal" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="edittt('.$tt->id.')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'
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
        $model = GiaSpDvCiCt::findOrFail($id);

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
        if(isset($inputs['id'])){
            $inputs['gia'] = getMoneyToDb($inputs['gia']);
            $modelkkgia = GiaSpDvCiCt::where('id',$inputs['id'])->first();
            $modelkkgia->update($inputs);


            $model = GiaSpDvCiCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn vị tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="success">'.$tt->mota.'</td>';
                    $result['message'] .= '<td>'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.dinhdangsothapphan($tt->gia,5).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#edit-modal" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="edittt('.$tt->id.')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'
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
