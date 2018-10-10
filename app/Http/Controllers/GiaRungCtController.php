<?php

namespace App\Http\Controllers;

use App\DmGiaRung;
use App\GiaRungCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaRungCtController extends Controller
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
        if(isset($inputs['loairung'])){
            $inputs['dongiasd'] = getMoneyToDb($inputs['dongiasd']);
            $inputs['dongiat50'] = getMoneyToDb($inputs['dongiat50']);
            $inputs['dongiat1'] = getMoneyToDb($inputs['dongiat1']);
            $inputs['dongiaxp'] = getMoneyToDb($inputs['dongiaxp']);
            $inputs['mahuyen'] = session('admin')->mahuyen != '' ? session('admin')->mahuyen : 'T' ;
            $modeladd = new GiaRungCt();
            $modeladd->create($inputs);

            $model = GiaRungCt::where('mahs',$inputs['mahs'])
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->select('giarungct.*','dmgiarung.tennhom')->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Nhóm rừng</th>';
            $result['message'] .= '<th style="text-align: center">Loại rừng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức độ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>sử dụng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>thuê <br>50 năm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>thuê <br>1 năm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá<br> xử phạt <br>vi phạm<br> về rừng</th>';
            $result['message'] .= '<th width="15%" style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->tennhom . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->loairung . '</td>';
                    $result['message'] .= '<td>' . $ttbog->mucdo . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiasd) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiat50) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiat1) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiaxp) . '</td>';
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

            $model = GiaRungCt::findOrFail($id);
            $modelnhom = DmGiaRung::all();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Nhóm rừng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><select name="thapdungedit" id="thapdungedit" class="form-control">';
            foreach($modelnhom as $nhom){
                if($nhom->manhom == $model->manhom)
                    $result['message'] .= '<option value="'.$nhom->manhom.'" selected>'.$nhom->tennhom.' </option>';
                else
                    $result['message'] .= '<option value="'.$nhom->manhom.'">'.$nhom->tennhom.' </option>';
            }
            $result['message'] .= '</select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Loại rừng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="loairungedit" name="loairungedit" class="form-control" value="'.$model->loairung.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Mức độ</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="mucdoedit" name="mucdoedit" class="form-control" value="'.$model->mucdo.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá sử dụng rừng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="dongiasdedit" name="dongiasdedit" class="form-control" value="'.$model->dongiasd.'" data-mask="fdecimal"  style="text-align: right; font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá thuê rừng 50 năm</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" id="dongiat50edit" name="dongiat50edit" class="form-control" value="'.$model->dongiat50.'" data-mask="fdecimal" style="text-align: right; font-weight: bold" ></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá thuê rừng 1 năm</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right; font-weight: bold" id="dongiat1edit" name="dongiat1edit" class="form-control" data-mask="fdecimal" value="'.$model->dongiat1.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá xử phạt vị phạm về rừng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" style="text-align: right; font-weight: bold" id="dongiaxpedit" name="dongiaxpedit" class="form-control" data-mask="fdecimal" value="'.$model->dongiaxp.'"></div>';
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
        if(isset($inputs['loairung'])){
            $inputs['dongiasd'] = getMoneyToDb($inputs['dongiasd']);
            $inputs['dongiat50'] = getMoneyToDb($inputs['dongiat50']);
            $inputs['dongiat1'] = getMoneyToDb($inputs['dongiat1']);
            $inputs['dongiaxp'] = getMoneyToDb($inputs['dongiaxp']);
            $inputs['mahuyen'] = session('admin')->mahuyen != '' ? session('admin')->mahuyen : 'T' ;
            $modeladd = GiaRungCt::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = GiaRungCt::where('mahs',$inputs['mahs'])
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->select('giarungct.*','dmgiarung.tennhom')->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Nhóm rừng</th>';
            $result['message'] .= '<th style="text-align: center">Loại rừng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức độ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>sử dụng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>thuê <br>50 năm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>thuê <br>1 năm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá<br> xử phạt <br>vi phạm<br> về rừng</th>';
            $result['message'] .= '<th width="15%" style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->tennhom . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->loairung . '</td>';
                    $result['message'] .= '<td>' . $ttbog->mucdo . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiasd) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiat50) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiat1) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiaxp) . '</td>';
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
            $inputs['mahuyen'] = session('admin')->mahuyen != '' ? session('admin')->mahuyen : 'T' ;
            $modeladd = GiaRungCt::where('id',$inputs['id'])->first();
            $modeladd->delete();

            $model = GiaRungCt::where('mahs',$inputs['mahs'])
                ->join('dmgiarung','dmgiarung.manhom','=','giarungct.manhom')
                ->select('giarungct.*','dmgiarung.tennhom')->get();

            $result['message'] = '<div class="row" id="dsmhbog">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Nhóm rừng</th>';
            $result['message'] .= '<th style="text-align: center">Loại rừng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức độ</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>sử dụng</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>thuê <br>50 năm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá <br>thuê <br>1 năm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Đơn giá<br> xử phạt <br>vi phạm<br> về rừng</th>';
            $result['message'] .= '<th width="15%" style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->tennhom . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->loairung . '</td>';
                    $result['message'] .= '<td>' . $ttbog->mucdo . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiasd) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiat50) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiat1) . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongiaxp) . '</td>';
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
