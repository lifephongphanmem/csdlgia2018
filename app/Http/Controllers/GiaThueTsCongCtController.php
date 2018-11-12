<?php

namespace App\Http\Controllers;

use App\GiaThueTsCongCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaThueTsCongCtController extends Controller
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
        if(isset($inputs['tents'])){
            $inputs['soluong'] = getMoneyToDb($inputs['soluong']);
            $inputs['dongiathue'] = getMoneyToDb($inputs['dongiathue']);
            $inputs['sotienthuenam'] = getMoneyToDb($inputs['sotienthuenam']);
            $modeladd = new GiaThueTsCongCt();
            $modeladd->create($inputs);

            $model = GiaThueTsCongCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Số lượng/<br>diện tích</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá<br> thuê</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị thuê</th>';
            $result['message'] .= '<th style="text-align: center">Hợp đồng số</th>';
            $result['message'] .= '<th style="text-align: center">Thời hạn</th>';
            $result['message'] .= '<th style="text-align: center">Thành tiền</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: center;">'.number_format($tents->soluong).'</td>';
                    $result['message'] .= '<td style="text-align: center;">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->dongiathue).'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->dvthue.'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->hdthue.'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->ththue.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->sotienthuenam).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tents->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

            $model = GiaThueTsCongCt::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Vị trí<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tentsedit" id="tentseidt" class="form-control" value="'.$model->tents.'" style="font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số lượng/diện tích<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="soluongedit" id="soluongedit" class="form-control" data-mask="fdecimal" value="'.$model->soluong.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị tính<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dvtedit" id="dvtedit" class="form-control" value="'.$model->dvt.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá thuê<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dongiathueedit" id="dongiathueedit" class="form-control" data-mask="fdecimal" value="'.$model->dongiathue.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Hợp đồng số<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="hdthueedit" id="hdthueedit" class="form-control" data-mask="fdecimal" value="'.$model->hdthue.'" style="font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị thuê<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dvthueedit" id="dvthueedit" class="form-control" value="'.$model->dvthue.'" style="font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thời hạn<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="ththueedit" id="ththueedit" class="form-control" value="'.$model->ththue.'" style="font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thành tiền<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="sotienthuenamedit" id="sotienthuenamedit" class="form-control" data-mask="fdecimal" value="'.$model->sotienthuenam.'" style="text-align: right;font-weight: bold"></div>';
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
            $modelupdate = GiaThueTsCongCt::where('id',$inputs['id'])->first();
            $inputs['soluong'] = getMoneyToDb($inputs['soluong']);
            $inputs['dongiathue'] = getMoneyToDb($inputs['dongiathue']);
            $inputs['sotienthuenam'] = getMoneyToDb($inputs['sotienthuenam']);
            $modelupdate->update($inputs);


            $model = GiaThueTsCongCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Số lượng/<br>diện tích</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá<br> thuê</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị thuê</th>';
            $result['message'] .= '<th style="text-align: center">Hợp đồng số</th>';
            $result['message'] .= '<th style="text-align: center">Thời hạn</th>';
            $result['message'] .= '<th style="text-align: center">Thành tiền</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: center;">'.number_format($tents->soluong).'</td>';
                    $result['message'] .= '<td style="text-align: center;">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->dongiathue).'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->dvthue.'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->hdthue.'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->ththue.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->sotienthuenam).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tents->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
            $modelts = GiaThueTsCongCt::where('id',$inputs['id'])->delete();

            $model = GiaThueTsCongCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Số lượng/<br>diện tích</th>';
            $result['message'] .= '<th style="text-align: center" width="5%">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá<br> thuê</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị thuê</th>';
            $result['message'] .= '<th style="text-align: center">Hợp đồng số</th>';
            $result['message'] .= '<th style="text-align: center">Thời hạn</th>';
            $result['message'] .= '<th style="text-align: center">Thành tiền</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active" style="font-weight: bold">'.$tents->tents.'</td>';
                    $result['message'] .= '<td style="text-align: center;">'.number_format($tents->soluong).'</td>';
                    $result['message'] .= '<td style="text-align: center;">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->dongiathue).'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->dvthue.'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->hdthue.'</td>';
                    $result['message'] .= '<td style="text-align: left;">'.$tents->ththue.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->sotienthuenam).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem('.$tents->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tents->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
