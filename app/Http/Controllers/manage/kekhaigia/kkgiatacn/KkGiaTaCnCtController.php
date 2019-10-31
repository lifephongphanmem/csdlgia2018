<?php

namespace App\Http\Controllers\manage\kekhaigia\kkgiatacn;

use App\Model\manage\kekhaigia\kkgiatacn\KkGiaTaCnCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkGiaTaCnCtController extends Controller
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
        $inputs['dongialk'] = getMoneyToDb($inputs['dongialk']);
        $inputs['dongia'] = getMoneyToDb($inputs['dongia']);
        $inputs['trangthai'] = 'CXD';
        if(isset($inputs['tenhh'])){
            $modelkkgia = new KkGiaTaCnCt();
            $modelkkgia->create($inputs);

            $model = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
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
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->dongialk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->dongia).'</td>';
                    $result['message'] .= '<td>'.
//                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
//                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
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

            $model = KkGiaTaCnCt::findOrFail($id);
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
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá liền kề</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dongialkedit" id="dongialkedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold" value="'.$model->dongialk.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Mức giá kê khai</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="dongiaedit" id="dongiaedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold" value="'.$model->dongia.'"></div>';
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
        $inputs['dongialk'] = getMoneyToDb($inputs['dongialk']);
        $inputs['dongia'] = getMoneyToDb($inputs['dongia']);
        if(isset($inputs['id'])){
            $modelkkgia = KkGiaTaCnCt::where('id',$inputs['id'])->first();
            $modelkkgia->update($inputs);

            $model = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
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
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->dongialk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->dongia).'</td>';
                    $result['message'] .= '<td>'.
//                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
//                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
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
            $modelkkgia = KkGiaTaCnCt::where('id',$inputs['id'])->first();
            $modelkkgia->delete();

            $model = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
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
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->dongialk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->dongia).'</td>';
                    $result['message'] .= '<td>'.
//                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
//                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
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

//    public function kkgialk(Request $request){
//        $result = array(
//            'status' => 'fail',
//            'message' => 'error',
//        );
//        if(!Session::has('admin')) {
//            $result = array(
//                'status' => 'fail',
//                'message' => 'permission denied',
//            );
//            die(json_encode($result));
//        }
//        //dd($request);
//        $inputs = $request->all();
//
//        if(isset($inputs['id'])){
//
//            $model = KkGiaTaCnCt::where('id',$inputs['id'])
//                ->first();
//            ($model->cpnvlttlk!= null)? $cpnvlttlk = $model->cpnvlttlk : $cpnvlttlk = 0;
//            ($model->cpncttlk!= null)? $cpncttlk = $model->cpncttlk : $cpncttlk = 0;
//            ($model->cpsxclk!= null)? $cpsxclk = $model->cpsxclk : $cpsxclk = 0;
//            ($model->cpnvpxlk!= null)? $cpnvpxlk = $model->cpnvpxlk : $cpnvpxlk = 0;
//            ($model->cpvllk!= null)? $cpvllk = $model->cpvllk : $cpvllk = 0;
//            ($model->cpdcsxlk!= null)? $cpdcsxlk = $model->cpdcsxlk : $cpdcsxlk = 0;
//            ($model->cpkhtscdlk!= null)? $cpkhtscdlk = $model->cpkhtscdlk : $cpkhtscdlk = 0;
//            ($model->cpdvmnlk!= null)? $cpdvmnlk = $model->cpdvmnlk : $cpdvmnlk = 0;
//            ($model->cpbtklk!= null)? $cpbtklk = $model->cpbtklk : $cpbtklk = 0;
//            ($model->cpklk!= null)? $cpklk = $model->cpklk : $cpklk = 0;
//            ($model->tcpsxlk!= null)? $tcpsxlk = $model->tcpsxlk : $tcpsxlk = 0;
//            ($model->cpbhlk!= null)? $cpbhlk = $model->cpbhlk : $cpbhlk = 0;
//            ($model->cpqldnlk!= null)? $cpqldnlk = $model->cpqldnlk : $cpqldnlk = 0;
//            ($model->cptclk!= null)? $cptclk = $model->cptclk : $cptclk = 0;
//            ($model->tgttblk!= null)? $tgttblk = $model->tgttblk : $tgttblk = 0;
//            ($model->lndklk!= null)? $lndklk = $model->lndklk : $lndklk = 0;
//            ($model->gbctlk!= null)? $gbctlk = $model->gbctlk : $gbctlk = 0;
//            ($model->thuettdblk!= null)? $thuettdblk = $model->thuettdblk : $thuettdblk = 0;
//            ($model->thuegtgtlk!= null)? $thuegtgtlk = $model->thuegtgtlk : $thuegtgtlk = 0;
//            ($model->gbdctlk!= null)? $gbdctlk = $model->gbdctlk : $gbdctlk = 0;
//
//
//            $result['message'] = '<div class="form-horizontal" id="ttkkgialk">';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>1. Chi phí sản xuất</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.1. Chi phí nguyên liệu, vật liệu trực tiếp</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpnvlttlk" name="cpnvlttlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpnvlttlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.2. Chi phí nhân công trực tiếp</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpncttlk" name="cpncttlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpncttlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1. 3. Chi phí sản xuất chung:</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            //$result['message'] .= '<input type="text" id="cpsxclk" name="cpsxclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpsxclk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>a. Chi phí nhân viên phân xưởng </i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpnvpxlk" name="cpnvpxlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpnvpxlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>b. Chi phí vật liệu</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpvllk" name="cpvllk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpvllk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>c. Chi phí dụng cụ sản xuất</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpdcsxlk" name="cpdcsxlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpdcsxlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>d. Chi phí khấu hao TSCĐ</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpkhtscdlk" name="cpkhtscdlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpkhtscdlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>đ. Chi phí dịch vụ mua ngoài</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpdvmnlk" name="cpdvmnlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpdvmnlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>e. Chi phí bằng tiền khác</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpbtklk" name="cpbtklk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpbtklk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.4. Chi phí khác</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpklk" name="cpklk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpklk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>2. Chi phí bán hàng</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpbhlk" name="cpbhlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpbhlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>3.Chi phí quản lý doanh nghiệp</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpqldnlk" name="cpqldnlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpqldnlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>4. Chi phí tài chính</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cptclk" name="cptclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cptclk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>5. Lợi nhuận dự kiến</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="lndklk" name="lndklk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$lndklk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Giá bán chưa thuế</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="gbctlk" name="gbctlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$gbctlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>6. Thuế tiêu thụ đặc biêt (nếu có)</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="thuettdblk" name="thuettdblk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$thuettdblk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>7. Thuế giá trị gia tăng (nếu có)</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="thuegtgtlk" name="thuegtgtlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$thuegtgtlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Giá bán (đã có thuế)</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="gbdctlk" name="gbdctlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$gbdctlk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<input type="hidden" id="idkkgialk" name="idkkgialk" value="'.$model->id.'">';
//            $result['status'] = 'success';
//        }
//        die(json_encode($result));
//    }
//
//    public function upkkgialk(Request $request){
//        $result = array(
//            'status' => 'fail',
//            'message' => 'error',
//        );
//        if(!Session::has('admin')) {
//            $result = array(
//                'status' => 'fail',
//                'message' => 'permission denied',
//            );
//            die(json_encode($result));
//        }
//        //dd($request);
//        $inputs = $request->all();
//
//        if(isset($inputs['id'])){
//            $modelkkgia = KkGiaTaCnCt::where('id',$inputs['id'])->first();
//            $inputs['cpnvlttlk'] = getMoneyToDb($inputs['cpnvlttlk']);
//            $inputs['cpncttlk'] = getMoneyToDb($inputs['cpncttlk']);
//            //$inputs['cpsxclk'] = getMoneyToDb($inputs['cpsxclk']);
//            $inputs['cpnvpxlk'] = getMoneyToDb($inputs['cpnvpxlk']);
//            $inputs['cpvllk'] = getMoneyToDb($inputs['cpvllk']);
//            $inputs['cpdcsxlk'] = getMoneyToDb($inputs['cpdcsxlk']);
//            $inputs['cpkhtscdlk'] = getMoneyToDb($inputs['cpkhtscdlk']);
//            $inputs['cpdvmnlk'] = getMoneyToDb($inputs['cpdvmnlk']);
//            $inputs['cpbtklk'] = getMoneyToDb($inputs['cpbtklk']);
//            $inputs['cpklk'] = getMoneyToDb($inputs['cpklk']);
//            $inputs['tcpsxlk'] = $inputs['cpnvlttlk'] + $inputs['cpncttlk']
//                + $inputs['cpnvpxlk'] + $inputs['cpvllk']
//                + $inputs['cpdcsxlk'] + $inputs['cpkhtscdlk'] + $inputs['cpdvmnlk']
//                + $inputs['cpbtklk'] + $inputs['cpklk'];
//            $inputs['cpbhlk'] = getMoneyToDb($inputs['cpbhlk']);
//            $inputs['cpqldnlk'] = getMoneyToDb($inputs['cpqldnlk']);
//            $inputs['cptclk'] = getMoneyToDb($inputs['cptclk']);
//            $inputs['tgttblk'] = $inputs['tcpsxlk'] + $inputs['cpbhlk'] + $inputs['cpqldnlk']  + $inputs['cptclk'];
//            $inputs['lndklk'] = getMoneyToDb($inputs['lndklk']);
//            $inputs['gbctlk'] = getMoneyToDb($inputs['gbctlk']);
//            $inputs['thuettdblk'] = getMoneyToDb($inputs['thuettdblk']);
//            $inputs['thuegtgtlk'] = getMoneyToDb($inputs['thuegtgtlk']);
//            $inputs['gbdctlk'] = getMoneyToDb($inputs['gbdctlk']);
//
//            $modelkkgia->update($inputs);
//
//            $model = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
//                ->get();
//            $result['message'] = '<div class="row" id="dsts">';
//            $result['message'] .= '<div class="col-md-12">';
//            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
//            $result['message'] .= '<thead>';
//            $result['message'] .= '<tr>';
//            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
//            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
//            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
//            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
//            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
//            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
//            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
//            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
//            $result['message'] .= '</tr>';
//            $result['message'] .= '</thead>';
//
//            $result['message'] .= '<tbody>';
//            if(count($model) > 0){
//                foreach($model as $key=>$tt){
//                    $result['message'] .= '<tr id="'.$tt->id.'">';
//                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
//                    $result['message'] .= '<td class="active">'.$tt->tenhh.'</td>';
//                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
//                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
//                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
//                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->gbdctlk).'</td>';
//                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->gbdct).'</td>';
//                    $result['message'] .= '<td>'.
//                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
//                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
//                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
//                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tt->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
//
//                        .'</td>';
//                    $result['message'] .= '</tr>';
//                }
//                $result['message'] .= '</tbody>';
//                $result['message'] .= '</table>';
//                $result['message'] .= '</div>';
//                $result['message'] .= '</div>';
//                $result['status'] = 'success';
//            }
//        }
//        die(json_encode($result));
//    }
//
//    public function kkgia(Request $request){
//        $result = array(
//            'status' => 'fail',
//            'message' => 'error',
//        );
//        if(!Session::has('admin')) {
//            $result = array(
//                'status' => 'fail',
//                'message' => 'permission denied',
//            );
//            die(json_encode($result));
//        }
//        //dd($request);
//        $inputs = $request->all();
//
//        if(isset($inputs['id'])){
//
//            $model = KkGiaTaCnCt::where('id',$inputs['id'])
//                ->first();
//            ($model->cpnvltt!= null)? $cpnvltt = $model->cpnvltt : $cpnvltt = 0;
//            ($model->cpnctt!= null)? $cpnctt = $model->cpnctt : $cpnctt = 0;
//            ($model->cpsxc!= null)? $cpsxc = $model->cpsxc : $cpsxc = 0;
//            ($model->cpnvpx!= null)? $cpnvpx = $model->cpnvpx : $cpnvpx = 0;
//            ($model->cpvl!= null)? $cpvl = $model->cpvl : $cpvl = 0;
//            ($model->cpdcsx!= null)? $cpdcsx = $model->cpdcsx : $cpdcsx = 0;
//            ($model->cpkhtscd!= null)? $cpkhtscd = $model->cpkhtscd : $cpkhtscd = 0;
//            ($model->cpdvmn!= null)? $cpdvmn = $model->cpdvmn : $cpdvmn = 0;
//            ($model->cpbtk!= null)? $cpbtk = $model->cpbtk : $cpbtk = 0;
//            ($model->cpk!= null)? $cpk = $model->cpk : $cpk = 0;
//            ($model->tcpsx!= null)? $tcpsx = $model->tcpsx : $tcpsx = 0;
//            ($model->cpbh!= null)? $cpbh = $model->cpbh : $cpbh = 0;
//            ($model->cpqldn!= null)? $cpqldn = $model->cpqldn : $cpqldn = 0;
//            ($model->cptc!= null)? $cptc = $model->cptc : $cptc = 0;
//            ($model->tgttb!= null)? $tgttb = $model->tgttb : $tgttb = 0;
//            ($model->lndk!= null)? $lndk = $model->lndk : $lndk = 0;
//            ($model->gbct!= null)? $gbct = $model->gbct : $gbct = 0;
//            ($model->thuettdb!= null)? $thuettdb = $model->thuettdb : $thuettdb = 0;
//            ($model->thuegtgt!= null)? $thuegtgt = $model->thuegtgt : $thuegtgt = 0;
//            ($model->gbdct!= null)? $gbdct = $model->gbdct : $gbdct = 0;
//
//
//            $result['message'] = '<div class="form-horizontal" id="ttkkgia">';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>1. Chi phí sản xuất</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.1. Chi phí nguyên liệu, vật liệu trực tiếp</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpnvltt" name="cpnvltt" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpnvltt.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.2. Chi phí nhân công trực tiếp</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpnctt" name="cpnctt" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpnctt.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1. 3. Chi phí sản xuất chung:</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            //$result['message'] .= '<input type="text" id="cpsxc" name="cpsxc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpsxc.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>a. Chi phí nhân viên phân xưởng </i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpnvpx" name="cpnvpx" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpnvpx.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>b. Chi phí vật liệu</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpvl" name="cpvl" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpvl.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>c. Chi phí dụng cụ sản xuất</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpdcsx" name="cpdcsx" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpdcsx.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>d. Chi phí khấu hao TSCĐ</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpkhtscd" name="cpkhtscd" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpkhtscd.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>đ. Chi phí dịch vụ mua ngoài</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpdvmn" name="cpdvmn" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpdvmn.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><i>e. Chi phí bằng tiền khác</i></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpbtk" name="cpbtk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpbtk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.4. Chi phí khác</label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpk" name="cpk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>2. Chi phí bán hàng</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpbh" name="cpbh" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpbh.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>3.Chi phí quản lý doanh nghiệp</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cpqldn" name="cpqldn" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cpqldn.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>4. Chi phí tài chính</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="cptc" name="cptc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$cptc.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>5. Lợi nhuận dự kiến</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="lndk" name="lndk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$lndk.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Giá bán chưa thuế</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="gbct" name="gbct" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$gbct.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>6. Thuế tiêu thụ đặc biêt (nếu có)</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="thuettdb" name="thuettdb" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$thuettdb.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>7. Thuế giá trị gia tăng (nếu có)</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="thuegtgt" name="thuegtgt" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$thuegtgt.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="form-group">';
//            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Giá bán (đã có thuế)</b></label>';
//            $result['message'] .= '<div class="col-md-3">';
//            $result['message'] .= '<input type="text" id="gbdct" name="gbdct" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$gbdct.'">';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<input type="hidden" id="idkkgia" name="idkkgia" value="'.$model->id.'">';
//            $result['status'] = 'success';
//        }
//        die(json_encode($result));
//    }
//
//    public function upkkgia(Request $request){
//        $result = array(
//            'status' => 'fail',
//            'message' => 'error',
//        );
//        if(!Session::has('admin')) {
//            $result = array(
//                'status' => 'fail',
//                'message' => 'permission denied',
//            );
//            die(json_encode($result));
//        }
//        //dd($request);
//        $inputs = $request->all();
//
//        if(isset($inputs['id'])){
//            $modelkkgia = KkGiaTaCnCt::where('id',$inputs['id'])->first();
//            $inputs['cpnvltt'] = getMoneyToDb($inputs['cpnvltt']);
//            $inputs['cpnctt'] = getMoneyToDb($inputs['cpnctt']);
//            //$inputs['cpsxc'] = getMoneyToDb($inputs['cpsxc']);
//            $inputs['cpnvpx'] = getMoneyToDb($inputs['cpnvpx']);
//            $inputs['cpvl'] = getMoneyToDb($inputs['cpvl']);
//            $inputs['cpdcsx'] = getMoneyToDb($inputs['cpdcsx']);
//            $inputs['cpkhtscd'] = getMoneyToDb($inputs['cpkhtscd']);
//            $inputs['cpdvmn'] = getMoneyToDb($inputs['cpdvmn']);
//            $inputs['cpbtk'] = getMoneyToDb($inputs['cpbtk']);
//            $inputs['cpk'] = getMoneyToDb($inputs['cpk']);
//            $inputs['tcpsx'] = $inputs['cpnvltt'] + $inputs['cpnctt']
//                + $inputs['cpnvpx'] + $inputs['cpvl'] + $inputs['cpdcsx']
//                + $inputs['cpkhtscd'] + $inputs['cpdvmn'] + $inputs['cpbtk'] + $inputs['cpk'];
//            $inputs['cpbh'] = getMoneyToDb($inputs['cpbh']);
//            $inputs['cpqldn'] = getMoneyToDb($inputs['cpqldn']);
//            $inputs['cptc'] = getMoneyToDb($inputs['cptc']);
//            $inputs['tgttb'] = $inputs['tcpsx']  + $inputs['cpbh'] + $inputs['cpqldn'] + $inputs['cptc'];
//            $inputs['lndk'] = getMoneyToDb($inputs['lndk']);
//            $inputs['gbct'] = getMoneyToDb($inputs['gbct']);
//            $inputs['thuettdb'] = getMoneyToDb($inputs['thuettdb']);
//            $inputs['thuegtgt'] = getMoneyToDb($inputs['thuegtgt']);
//            $inputs['gbdct'] = getMoneyToDb($inputs['gbdct']);
//            $modelkkgia->update($inputs);
//
//            $model = KkGiaTaCnCt::where('mahs',$inputs['mahs'])
//                ->get();
//            $result['message'] = '<div class="row" id="dsts">';
//            $result['message'] .= '<div class="col-md-12">';
//            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
//            $result['message'] .= '<thead>';
//            $result['message'] .= '<tr>';
//            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
//            $result['message'] .= '<th style="text-align: center">Tên hoàng hoá<br>dịch vụ</th>';
//            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
//            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
//            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
//            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
//            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
//            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
//            $result['message'] .= '</tr>';
//            $result['message'] .= '</thead>';
//
//            $result['message'] .= '<tbody>';
//            if(count($model) > 0){
//                foreach($model as $key=>$tt){
//                    $result['message'] .= '<tr id="'.$tt->id.'">';
//                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
//                    $result['message'] .= '<td class="active">'.$tt->tenhh.'</td>';
//                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
//                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
//                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
//                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->gbdctlk).'</td>';
//                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->gbdct).'</td>';
//                    $result['message'] .= '<td>'.
//                        '<button type="button" data-target="#modal-kkgialk" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgialk('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá liền kề</button>'.
//                        '<button type="button" data-target="#modal-kkgia" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="kkgia('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Kê khai giá</button>'.
//                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$tt->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
//                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$tt->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
//
//                        .'</td>';
//                    $result['message'] .= '</tr>';
//                }
//                $result['message'] .= '</tbody>';
//                $result['message'] .= '</table>';
//                $result['message'] .= '</div>';
//                $result['message'] .= '</div>';
//                $result['status'] = 'success';
//            }
//        }
//        die(json_encode($result));
//    }
}
