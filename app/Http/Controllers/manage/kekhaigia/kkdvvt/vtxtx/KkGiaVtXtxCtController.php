<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvvt\vtxtx;

use App\Model\manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkGiaVtXtxCtController extends Controller
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
        if(isset($inputs['loaixe'])){
            $inputs['dongialk'] = getMoneyToDb($inputs['dongialk']);
            $inputs['sllk'] = getDecimalToDb($inputs['sllk']);
            $inputs['dongia'] = getMoneyToDb($inputs['dongia']);
            $inputs['sl'] = getDecimalToDb($inputs['sl']);
            $modeladd = new KkGiaVtXtxCt();
            $modeladd->create($inputs);

            $model = KkGiaVtXtxCt::where('mahs',$inputs['mahs'])->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá </th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->loaixe . '</td>';
                    $result['message'] .= '<td>' . $ttbog->qccl . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->mota . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongialk) .'đ/ '.$ttbog->sllk.' '.$ttbog->dvtlk. '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongia) .'đ/ '.$ttbog->sl.' '.$ttbog->dvt. '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>' .
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
            $id = $inputs['id'];

            $model = KkGiaVtXtxCt::findOrFail($id);
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttpedit">';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Loại xe</b><span class="require">*</span></label>';
            $result['message'] .= '<div><select name="loaixeedit" id="loaixeedit" class="form-control">
                                <option value="Xe 4 chỗ"'.(($model->loaixe == "Xe 4 chỗ") ? "selected" : "").'>Xe 4 chỗ</option>
                                <option value="Xe 5 chỗ"'.(($model->loaixe == "Xe 5 chỗ") ? "selected" : "").'>Xe 5 chỗ</option>
                                <option value="Xe 7 chỗ"'.(($model->loaixe == "Xe 7 chỗ") ? "selected" : "").'>Xe 7 chỗ</option>
                                <option value="Loại xe khác"'.(($model->loaixe == "Loại xe khác") ? "selected" : "").'>Loại xe khác</option>
                                </select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Mô tả</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="motaedit" id="motaedit" class="form-control" value="'.$model->mota.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Quy cách chất lượng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="qccledit" class="form-control" name="qccledit" cols="30" rows="3">'.$model->qccl.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá liền kề</b><span class="require">*</span></label>';
            $result['message'] .= '<div> <input type="text" style="text-align: right; font-weight: bold" id="dongialkedit" name="dongialkedit" class="form-control" data-mask="fdecimal" value="'.$model->dongialk.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính liền kề</b><span class="require">*</span></label>';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6"><input type="text" style="text-align: right; font-weight: bold" id="sllkedit" name="sllkedit" class="form-control" data-mask="fdecimal" value="'.$model->sllk.'"></div>';
            $result['message'] .= '<div class="col-md-6"><select name="dvtlkedit" id="dvtlkedit" class="form-control">
                                    <option value="km"'.(($model->dvtlk == "km") ? "selected" : "").'>km</option>
                                    <option value="giờ"'.(($model->dvtlk == "giờ") ? "selected" : "").'>giờ</option>
                                    </select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá</b><span class="require">*</span></label>';
            $result['message'] .= '<div> <input type="text" style="text-align: right; font-weight: bold" id="dongiaedit" name="dongiaedit" class="form-control" data-mask="fdecimal" value="'.$model->dongia.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6"><input type="text" style="text-align: right; font-weight: bold" id="sledit" name="sledit" class="form-control" data-mask="fdecimal" value="'.$model->sl.'"></div>';
            $result['message'] .= '<div class="col-md-6"><select name="dvtedit" id="dvtedit" class="form-control">
                                    <option value="km"'.(($model->dvt == "km") ? "selected" : "").'>km</option>
                                    <option value="giờ"'.(($model->dvt == "giờ") ? "selected" : "").'>giờ</option>
                                    </select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Ghi chú</b><span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="ghichuedit" class="form-control" name="ghichuedit" cols="30" rows="3">'.$model->ghichu.'</textarea></div>';
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
        if(isset($inputs['loaixe'])){
            $inputs['dongialk'] = getMoneyToDb($inputs['dongialk']);
            $inputs['sllk'] = getDecimalToDb($inputs['sllk']);
            $inputs['dongia'] = getMoneyToDb($inputs['dongia']);
            $inputs['sl'] = getDecimalToDb($inputs['sl']);
            $modeladd = KkGiaVtXtxCt::where('id',$inputs['id'])->first();
            $modeladd->update($inputs);

            $model = KkGiaVtXtxCt::where('mahs',$inputs['mahs'])->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá </th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->loaixe . '</td>';
                    $result['message'] .= '<td>' . $ttbog->qccl . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->mota . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongialk) .'đ/ '.$ttbog->sllk.' '.$ttbog->dvtlk. '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongia) .'đ/ '.$ttbog->sl.' '.$ttbog->dvt. '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>' .
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
            $modeladd = KkGiaVtXtxCt::where('id',$inputs['id'])->first();
            $modeladd->delete();


            $model = KkGiaVtXtxCt::where('mahs',$inputs['mahs'])->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá </th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $ttbog) {
                    $result['message'] .= '<tr id="' . $ttbog->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td>' . $ttbog->loaixe . '</td>';
                    $result['message'] .= '<td>' . $ttbog->qccl . '</td>';
                    $result['message'] .= '<td class="active">' . $ttbog->mota . '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongialk) .'đ/ '.$ttbog->sllk.' '.$ttbog->dvtlk. '</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">' . number_format($ttbog->dongia) .'đ/ '.$ttbog->sl.' '.$ttbog->dvt. '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh(' . $ttbog->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>' .
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
