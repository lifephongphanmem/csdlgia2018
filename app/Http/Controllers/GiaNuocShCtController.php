<?php

namespace App\Http\Controllers;

use App\GiaNuocShCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaNuocShCtController extends Controller
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
        if(isset($inputs['doituong'])){
            $inputs['giachuathue'] = getMoneyToDb($inputs['giachuathue']);
            $inputs['thuevat'] = getMoneyToDb($inputs['thuevat']);
            $inputs['giacothue'] = getMoneyToDb($inputs['giacothue']);
            $inputs['phibvmttyle'] = getMoneyToDb($inputs['phibvmttyle']);
            $inputs['phibvmt'] = getMoneyToDb($inputs['phibvmt']);
            $inputs['thanhtien'] = getMoneyToDb($inputs['thanhtien']);
            $modeladd = new GiaNuocShCt();
            $modeladd->create($inputs);

            $model = GiaNuocShCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Đối tượng</th>';
            $result['message'] .= '<th style="text-align: center">Giá chưa <br>thuế<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Thuế <br>VAT<bR>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Giá có<br> thuế</th>';
            $result['message'] .= '<th style="text-align: center">Phí BVMT <br>tỷ lệ (%)</th>';
            $result['message'] .= '<th style="text-align: center">Phí BVMT <br>tiền phí<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Tổng<br>cộng giá<br>tiêu thụ<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->doituong . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giachuathue) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->thuevat) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giacothue) . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold;">' . number_format($ttbog->phibvmttyle) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->phibvmt) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->thanhtien) . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $ttbog->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
        }
        $result['status'] = 'success';
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

            $model = GiaNuocShCt::findOrFail($id);

            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đối tượng sử dụng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="doituongedit" name="doituongedit" class="form-control" value="'.$model->doituong.'" style="font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá chưa thuế</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right;font-weight: bold" id="giachuathueedit" name="giachuathueedit" class="form-control" data-mask="fdecimal" value="'.$model->giachuathue.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Thuế VAT</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right;font-weight: bold" id="thuevatedit" name="thuevatedit" class="form-control" data-mask="fdecimal" value="'.$model->thuevat.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá có thuế</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right;font-weight: bold" id="giacothueedit" name="giacothueedit" class="form-control" data-mask="fdecimal" value="'.$model->giacothue.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Phí BVMT tỷ lệ(%)</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: center;font-weight: bold" id="phibvmttyleedit" name="phibvmttyleedit" class="form-control" data-mask="fdecimal" value="'.$model->phibvmttyle.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Phí BVMT</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right;font-weight: bold" id="phibvmtedit" name="phibvmtedit" class="form-control" data-mask="fdecimal" value="'.$model->phibvmt.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tổng cộng giá tiêu thụ</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right;font-weight: bold" id="thanhtienedit" name="thanhtienedit" class="form-control" data-mask="fdecimal" value="'.$model->thanhtien.'"></div>';
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
        $inputs = $request->all();
        if(isset($inputs['doituong'])){
            $inputs['giachuathue'] = getMoneyToDb($inputs['giachuathue']);
            $inputs['thuevat'] = getMoneyToDb($inputs['thuevat']);
            $inputs['giacothue'] = getMoneyToDb($inputs['giacothue']);
            $inputs['phibvmttyle'] = getMoneyToDb($inputs['phibvmttyle']);
            $inputs['phibvmt'] = getMoneyToDb($inputs['phibvmt']);
            $inputs['thanhtien'] = getMoneyToDb($inputs['thanhtien']);
            $modeladd = GiaNuocShCt::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = GiaNuocShCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Đối tượng</th>';
            $result['message'] .= '<th style="text-align: center">Giá chưa <br>thuế<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Thuế <br>VAT<bR>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Giá có<br> thuế</th>';
            $result['message'] .= '<th style="text-align: center">Phí BVMT <br>tỷ lệ (%)</th>';
            $result['message'] .= '<th style="text-align: center">Phí BVMT <br>tiền phí<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Tổng<br>cộng giá<br>tiêu thụ<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->doituong . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giachuathue) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->thuevat) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giacothue) . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold;">' . number_format($ttbog->phibvmttyle) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->phibvmt) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->thanhtien) . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $ttbog->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
        }
        $result['status'] = 'success';
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
        $inputs = $request->all();
        if(isset($inputs['id'])){
            $modeladd = GiaNuocShCt::where('id',$inputs['id'])->first();
            $modeladd->delete();


            $model = GiaNuocShCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Đối tượng</th>';
            $result['message'] .= '<th style="text-align: center">Giá chưa <br>thuế<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Thuế <br>VAT<bR>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Giá có<br> thuế</th>';
            $result['message'] .= '<th style="text-align: center">Phí BVMT <br>tỷ lệ (%)</th>';
            $result['message'] .= '<th style="text-align: center">Phí BVMT <br>tiền phí<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center">Tổng<br>cộng giá<br>tiêu thụ<br>(đ/m3)</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->doituong . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giachuathue) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->thuevat) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->giacothue) . '</td>';
                    $result['message'] .= '<td style="text-align: center;font-weight: bold;">' . number_format($ttbog->phibvmttyle) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->phibvmt) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->thanhtien) . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $ttbog->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
            }
        }
        $result['status'] = 'success';
        die(json_encode($result));
    }
}
