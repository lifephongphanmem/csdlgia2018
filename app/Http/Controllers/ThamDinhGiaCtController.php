<?php

namespace App\Http\Controllers;

use App\ThamDinhGiaCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThamDinhGiaCtController extends Controller
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['tents']) &&  $inputs['tents']!=''){
            $inputs['sl'] = getDbl($inputs['sl']);
            $inputs['nguyengiadenghi'] = getDbl($inputs['nguyengiadenghi']);
            $inputs['giadenghi'] = getDbl( $inputs['giadenghi']);
            $inputs['nguyengiathamdinh']= getDbl($inputs['nguyengiathamdinh']);
            $inputs['giatritstd'] = getDbl($inputs['giatritstd']);
            if($inputs['giatritstd'] == 0) {
                $inputs['giakththamdinh'] = getDbl($inputs['giadenghi']);
                $inputs['giaththamdinh'] = 0;
            }else {
                $inputs['giakththamdinh'] = 0;
                $inputs['giaththamdinh'] = getDbl($inputs['giadenghi']);
            }
            $modelts = new ThamDinhGiaCt();
            $modelts->create($inputs);

            $model = ThamDinhGiaCt::where('mahs',$inputs['mahs'])
                ->get();


            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản-<br>Thông số kỹ thuật</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị</br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'-'.$tents->thongsokt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->giatritstd).'</td>';
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

    public function edit(Request $request)
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

            $model = ThamDinhGiaCt::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tên tài sản<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tentsedit" id="tentsedit" class="form-control" value="'.$model->tents.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đặc điểm pháp lý<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dacdiempledit" id="dacdiempledit" class="form-control" value="'.$model->dacdiempl.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thông số kỹ thuật<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="thongsoktedit" id="thongsoktedit" class="form-control" value="'.$model->thongsokt.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguồn gốc<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguongocedit" id="nguongocedit" class="form-control" value="'.$model->nguongoc.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị tính<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dvtedit" id="dvtedit" class="form-control" value="'.$model->dvt.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số lượng<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="sledit" id="sledit" class="form-control" data-mask="fdecimal" value="'.$model->sl.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá đề nghị<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguyengiadenghiedit" id="nguyengiadenghiedit" class="form-control"  data-mask="fdecimal" value="'.$model->nguyengiadenghi.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị đề nghị<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giadenghiedit" id="giadenghiedit" class="form-control"  data-mask="fdecimal" value="'.$model->giadenghi.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="nguyengiathamdinhedit" id="nguyengiathamdinhedit" class="form-control"  data-mask="fdecimal" value="'.$model->nguyengiathamdinh.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị tài sản thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="giatritstdedit" id="giatritstdedit" class="form-control" data-mask="fdecimal" value="'.$model->giatritstd.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ghi chú<span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="gcedit" class="form-control" name="gcedit" cols="30" rows="3">'.$model->gc.'</textarea></div>';
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
            $modelupdate = ThamDinhGiaCt::where('id',$inputs['id'])->first();
            $inputs['sl'] = getDbl($inputs['sl']);
            $inputs['nguyengiadenghi'] = getDbl($inputs['nguyengiadenghi']);
            $inputs['giadenghi'] = getDbl( $inputs['giadenghi']);
            $inputs['nguyengiathamdinh']= getDbl($inputs['nguyengiathamdinh']);
            $inputs['giatritstd'] = getDbl($inputs['giatritstd']);
            if($inputs['giatritstd'] == 0) {
                $inputs['giakththamdinh'] = getDbl($inputs['giadenghi']);
                $inputs['giaththamdinh'] = 0;
            }else {
                $inputs['giakththamdinh'] = 0;
                $inputs['giaththamdinh'] = getDbl($inputs['giadenghi']);
            }
            $modelupdate->update($inputs);

            $model = ThamDinhGiaCt::where('mahs',$inputs['mahs'])->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản-<br>Thông số kỹ thuật</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị</br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'-'.$tents->thongsokt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->giatritstd).'</td>';
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
            $modelts = ThamDinhGiaCt::where('id',$inputs['id'])->delete();

            $model = ThamDinhGiaCt::where('mahs',$inputs['mahs'])
                ->get();


            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên tài sản-<br>Thông số kỹ thuật</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị</br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Số lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>đề nghị</th>';
            $result['message'] .= '<th style="text-align: center">Đơn giá</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Giá trị</br>thẩm định</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->tents.'-'.$tents->thongsokt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tents->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.number_format($tents->sl).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->nguyengiadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->giadenghi).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->nguyengiathamdinh).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->giatritstd).'</td>';
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
