<?php

namespace App\Http\Controllers\manage\kekhaigia\kkgiatpcnte6t;

use App\Model\manage\kekhaigia\kkgiatpcnte6t\KkGsCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkGsCtDfController extends Controller
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

        if(isset($inputs['tenhh'])){
            $modelkkgia = new KkGsCtDf();
            $modelkkgia->create($inputs);

            $model = KkGsCtDf::where('maxa',$inputs['maxa'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdvlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdv).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tt->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

            $model = KkGsCtDf::findOrFail($id);
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttpedit">';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tên hàng hoá</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="tenhhedit" id="tenhhedit" class="form-control" value="'.$model->tenhh.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dvtedit" id="dvtedit" class="form-control" value="'.$model->dvt.'"></div>';
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
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $modelkkgia = KkGsCtDf::where('id',$inputs['id'])->first();
            $modelkkgia->update($inputs);

            $model = KkGsCtDf::where('maxa',$inputs['maxa'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giazdvlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giazdv).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tt->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

    public function delete(Request $request){
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
            $modelkkgia = KkGsCtDf::where('id',$inputs['id'])->first();
            $modelkkgia->delete();

            $model = KkGsCtDf::where('maxa',$inputs['maxa'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdvlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdv).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tt->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

    public function kkgialk(Request $request){
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

            $model = KkGsCtDf::where('id',$inputs['id'])
                ->first();
            ($model->giaQlk != null)? $giaQlk = $model->giaQlk : $giaQlk = 0;
            ($model->giaClk != null)? $giaClk = $model->giaClk : $giaClk = 0;
            ($model->giaCttlk != null)? $giaCttlk = $model->giaCttlk : $giaCttlk = 0;
            ($model->giaCvtlk != null)? $giaCvtlk = $model->giaCvtlk : $giaCvtlk = 0;
            ($model->giaCnclk != null)? $giaCnclk = $model->giaCnclk : $giaCnclk = 0;
            ($model->giaCkhlk != null)? $giaCkhlk = $model->giaCkhlk : $giaCkhlk = 0;
            ($model->giaCklk != null)? $giaCklk = $model->giaCklk : $giaCklk = 0;
            ($model->giaCclk != null)? $giaCclk = $model->giaCclk : $giaCclk = 0;
            ($model->giaCcmlk != null)? $giaCcmlk = $model->giaCcmlk : $giaCcmlk = 0;
            ($model->giaCtclk != null)? $giaCtclk = $model->giaCtclk : $giaCtclk = 0;
            ($model->giaCbhlk != null)? $giaCbhlk = $model->giaCbhlk : $giaCbhlk = 0;
            ($model->giaCqllk != null)? $giaCqllk = $model->giaCqllk : $giaCqllk = 0;
            ($model->giaTClk != null)? $giaTClk = $model->giaTClk : $giaTClk = 0;
            ($model->giaCPlk != null)? $giaCPlk = $model->giaCPlk : $giaCPlk = 0;
            ($model->giaZlk != null)? $giaZlk = $model->giaZlk : $giaZlk = 0;
            ($model->giaZdvlk != null)? $giaZdvlk = $model->giaZdvlk : $giaZdvlk = 0;

            $result['message'] = '<div class="form-horizontal" id="ttkkgialk">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>A.Sản lượng tính giá (Q)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaQlk" name="giaQlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaQlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>B.Chi phí sản xuất, kinh doanh (C)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaClk" name="giaClk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaClk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b><i>I.Chi phí trực tiếp: (Ctt)</i></b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCttlk" name="giaCttlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCttlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp (Cvt)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCvtlk" name="giaCvtlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCvtlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">2.Chi phí nhân công trực tiếp (Cnc)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCnclk" name="giaCnclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCnclk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">3.Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao) (Ckh)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCkhlk" name="giaCkhlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCkhlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">4.Chi phí sản xuất, kinh doanh (chưa tính ở trên) theo đặc thù của từng ngành, lĩnh vực (Ck)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCklk" name="giaCklk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCklk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b><i>II.Chi phí chung (Cc)</i></b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCclk" name="giaCclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCclk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">5.Chi phí sản xuất chung (đối với doanh nghiệp) (Ccm)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCcmlk" name="giaCcmlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCcmlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">6.Chi phí tài chính (nếu có) (Ctc)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCtclk" name="giaCtclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCtclk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">7.Chi phí bán hàng (Cbh)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCbhlk" name="giaCbhlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCbhlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">8.Chi phí quản lý (Cql)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCqllk" name="giaCqllk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCqllk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b><i>Tổng chi phí sản xuất kinh doanh (TC)</i></b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaTClk" name="giaTClk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaTClk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>C.Chi phí phân bổ cho sản phẩm phụ (nếu có) (CP)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCPlk" name="giaCPlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCPlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>D.Giá thành toàn bộ (TC-CP) (Z)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaZlk" name="giaZlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaZlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Đ.Giá thành toàn bộ 01 (một) đơn vị sản phẩm (TC-CP)/Q (Zđv)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaZdvlk" name="giaZdvlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaZdvlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<input type="hidden" id="idkkgialk" name="idkkgialk" value="'.$model->id.'">';
            $result['status'] = 'success';


        }
        die(json_encode($result));
    }

    public function upkkgialk(Request $request){
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
            $modelkkgia = KkGsCtDf::where('id',$inputs['id'])->first();
            $inputs['giaQlk'] = getMoneyToDb($inputs['giaQlk']);
            $inputs['giaClk'] = getMoneyToDb($inputs['giaClk']);
            $inputs['giaCttlk'] = getMoneyToDb($inputs['giaCttlk']);
            $inputs['giaCvtlk'] = getMoneyToDb($inputs['giaCvtlk']);
            $inputs['giaCnclk'] = getMoneyToDb($inputs['giaCnclk']);
            $inputs['giaCkhlk'] = getMoneyToDb($inputs['giaCkhlk']);
            $inputs['giaCklk'] = getMoneyToDb($inputs['giaCklk']);
            $inputs['giaCclk'] = getMoneyToDb($inputs['giaCclk']);
            $inputs['giaCcmlk'] = getMoneyToDb($inputs['giaCcmlk']);
            $inputs['giaCtclk'] = getMoneyToDb($inputs['giaCtclk']);
            $inputs['giaCbhlk'] = getMoneyToDb($inputs['giaCbhlk']);
            $inputs['giaCqllk'] = getMoneyToDb($inputs['giaCqllk']);
            $inputs['giaTClk'] = getMoneyToDb($inputs['giaTClk']);
            $inputs['giaCPlk'] = getMoneyToDb($inputs['giaCPlk']);
            $inputs['giaZlk'] = getMoneyToDb($inputs['giaZlk']);
            $inputs['giaZdvlk'] = getMoneyToDb($inputs['giaZdvlk']);

            $modelkkgia->update($inputs);

            $model = KkGsCtDf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdvlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdv).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tt->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

    public function kkgia(Request $request){
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

            $model = KkGsCtDf::where('id',$inputs['id'])
                ->first();
            ($model->giaQ != null)? $giaQ = $model->giaQ : $giaQ = 0;
            ($model->giaC != null)? $giaC = $model->giaC : $giaC = 0;
            ($model->giaCtt != null)? $giaCtt = $model->giaCtt : $giaCtt = 0;
            ($model->giaCvt != null)? $giaCvt = $model->giaCvt : $giaCvt = 0;
            ($model->giaCnc != null)? $giaCnc = $model->giaCnc : $giaCnc = 0;
            ($model->giaCkh != null)? $giaCkh = $model->giaCkh : $giaCkh = 0;
            ($model->giaCk != null)? $giaCk = $model->giaCk : $giaCk = 0;
            ($model->giaCc != null)? $giaCc = $model->giaCc : $giaCc = 0;
            ($model->giaCcm != null)? $giaCcm = $model->giaCcm : $giaCcm = 0;
            ($model->giaCtc != null)? $giaCtc = $model->giaCtc : $giaCtc = 0;
            ($model->giaCbh != null)? $giaCbh = $model->giaCbh : $giaCbh = 0;
            ($model->giaCql != null)? $giaCql = $model->giaCql : $giaCql = 0;
            ($model->giaTC != null)? $giaTC = $model->giaTC : $giaTC = 0;
            ($model->giaCP != null)? $giaCP = $model->giaCP : $giaCP = 0;
            ($model->giaZ != null)? $giaZ = $model->giaZ : $giaZ = 0;
            ($model->giaZdv != null)? $giaZdv = $model->giaZdv : $giaZdv = 0;

            $result['message'] = '<div class="form-horizontal" id="ttkkgia">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>A.Sản lượng tính giá (Q)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaQ" name="giaQ" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaQ.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>B.Chi phí sản xuất, kinh doanh (C)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaC" name="giaC" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaC.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b><i>I.Chi phí trực tiếp: (Ctt)</i></b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCtt" name="giaCtt" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCtt.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp (Cvt)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCvt" name="giaCvt" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCvt.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">2.Chi phí nhân công trực tiếp (Cnc)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCnc" name="giaCnc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCnc.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">3.Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao) (Ckh)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCkh" name="giaCkh" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCkh.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">4.Chi phí sản xuất, kinh doanh (chưa tính ở trên) theo đặc thù của từng ngành, lĩnh vực (Ck)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCk" name="giaCk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b><i>II.Chi phí chung (Cc)</i></b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCc" name="giaCc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCc.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">5.Chi phí sản xuất chung (đối với doanh nghiệp) (Ccm)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCcm" name="giaCcm" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCcm.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">6.Chi phí tài chính (nếu có) (Ctc)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCtc" name="giaCtc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCtc.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">7.Chi phí bán hàng (Cbh)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCbh" name="giaCbh" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCbh.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">8.Chi phí quản lý (Cql)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCql" name="giaCql" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCql.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b><i>Tổng chi phí sản xuất kinh doanh (TC)</i></b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaTC" name="giaTC" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaTC.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>C.Chi phí phân bổ cho sản phẩm phụ (nếu có) (CP)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaCP" name="giaCP" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaCP.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>D.Giá thành toàn bộ (TC-CP) (Z)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaZ" name="giaZ" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaZ.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Đ.Giá thành toàn bộ 01 (một) đơn vị sản phẩm (TC-CP)/Q (Zđv)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giaZdv" name="giaZdv" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giaZdv.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<input type="hidden" id="idkkgia" name="idkkgia" value="'.$model->id.'">';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function upkkgia(Request $request){
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
            $modelkkgia = KkGsCtDf::where('id',$inputs['id'])->first();
            $inputs['giaQ'] = getMoneyToDb($inputs['giaQ']);
            $inputs['giaC'] = getMoneyToDb($inputs['giaC']);
            $inputs['giaCtt'] = getMoneyToDb($inputs['giaCtt']);
            $inputs['giaCvt'] = getMoneyToDb($inputs['giaCvt']);
            $inputs['giaCnc'] = getMoneyToDb($inputs['giaCnc']);
            $inputs['giaCkh'] = getMoneyToDb($inputs['giaCkh']);
            $inputs['giaCk'] = getMoneyToDb($inputs['giaCk']);
            $inputs['giaCc'] = getMoneyToDb($inputs['giaCc']);
            $inputs['giaCcm'] = getMoneyToDb($inputs['giaCcm']);
            $inputs['giaCtc'] = getMoneyToDb($inputs['giaCtc']);
            $inputs['giaCbh'] = getMoneyToDb($inputs['giaCbh']);
            $inputs['giaCql'] = getMoneyToDb($inputs['giaCql']);
            $inputs['giaTC'] = getMoneyToDb($inputs['giaTC']);
            $inputs['giaCP'] = getMoneyToDb($inputs['giaCP']);
            $inputs['giaZ'] = getMoneyToDb($inputs['giaZ']);
            $inputs['giaZdv'] = getMoneyToDb($inputs['giaZdv']);


            $modelkkgia->update($inputs);

            $model = KkGsCtDf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';

            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->tenhh.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdvlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giaZdv).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tt->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
