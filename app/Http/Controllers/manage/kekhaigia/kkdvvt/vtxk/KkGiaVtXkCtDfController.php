<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvvt\vtxk;

use App\Model\manage\kekhaigia\kkdvvt\vtxk\GiaVtXkCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkGiaVtXkCtDfController extends Controller
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
        if(isset($inputs['mota'])){
            $modelkkgia = new GiaVtXkCtDf();
            $modelkkgia->create($inputs);
            $model = GiaVtXkCtDf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->loaixe.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->mota.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanhlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanh).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
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
            $model = GiaVtXkCtDf::findOrFail($id);
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttpedit">';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Loại xe</b><span class="require">*</span></label>';
            $result['message'] .= '<div><select  name="loaixeedit" id="loaixeedit" class="form-control">
                                <option value="Xe 4 chỗ"'.(($model->loaixe == "Xe 4 chỗ") ? "selected" : "").'>Xe 4 chỗ</option>
                                <option value="Xe 5 chỗ"'.(($model->loaixe == "Xe 5 chỗ") ? "selected" : "").'>Xe 5 chỗ</option>
                                <option value="Xe 7 chỗ"'.(($model->loaixe == "Xe 7 chỗ") ? "selected" : "").'>Xe 7 chỗ</option>
                                <option value="Xe 16 chỗ'.(($model->loaixe == "Xe 16 chỗ") ? "selected" : "").'">Xe 16 chỗ</option>
                                <option value="Xe 29 chỗ"'.(($model->loaixe == "Xe 29 chỗ") ? "selected" : "").'>Xe 29 chỗ</option>
                                <option value="Xe 35 chỗ"'.(($model->loaixe == "Xe 35 chỗ") ? "selected" : "").'>Xe 35 chỗ</option>
                                <option value="Xe 45 chỗ"'.(($model->loaixe == "Xe 45 chỗ") ? "selected" : "").'>Xe 45 chỗ</option>
                                <option value="Xe 47 chỗ"'.(($model->loaixe == "Xe 47 chỗ") ? "selected" : "").'>Xe 47 chỗ</option>
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
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Số km</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="sokmedit" id="sokmedit" class="form-control" value="'.$model->sokm.'"></div>';
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
            $modelkkgia = GiaVtXkCtDf::where('id',$inputs['id'])->first();
            $modelkkgia->update($inputs);
            $model = GiaVtXkCtDf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->loaixe.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->mota.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanhlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanh).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
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
            $modelkkgia = GiaVtXkCtDf::where('id',$inputs['id'])->first();
            $modelkkgia->delete();
            $model = GiaVtXkCtDf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->loaixe.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->mota.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanhlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanh).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
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
            $model = GiaVtXkCtDf::where('id',$inputs['id'])
                ->first();

            ($model->sltglk!= null)? $sltglk = $model->sltglk : $sltglk = 0;
            ($model->chiphisxkdlk!= null)? $chiphisxkdlk = $model->chiphisxkdlk : $chiphisxkdlk = 0;
            ($model->chiphittlk!= null)? $chiphittlk = $model->chiphittlk : $chiphittlk = 0;
            ($model->chiphinllk!= null)? $chiphinllk = $model->chiphinllk : $chiphinllk = 0;
            ($model->chiphinclk!= null)? $chiphinclk = $model->chiphinclk : $chiphinclk = 0;
            ($model->chiphikhlk!= null)? $chiphikhlk = $model->chiphikhlk : $chiphikhlk = 0;
            ($model->chiphisxkddtlk!= null)? $chiphisxkddtlk = $model->chiphisxkddtlk : $chiphisxkddtlk = 0;
            ($model->chiphiclk!= null)? $chiphiclk = $model->chiphiclk : $chiphiclk = 0;
            ($model->chiphisxclk!= null)? $chiphisxclk = $model->chiphisxclk : $chiphisxclk = 0;
            ($model->chiphitclk!= null)? $chiphitclk = $model->chiphitclk : $chiphitclk = 0;
            ($model->chiphibhlk!= null)? $chiphibhlk = $model->chiphibhlk : $chiphibhlk = 0;
            ($model->chiphiqllk!= null)? $chiphiqllk = $model->chiphiqllk : $chiphiqllk = 0;
            ($model->tchiphisxkdlk!= null)? $tchiphisxkdlk = $model->tchiphisxkdlk : $tchiphisxkdlk = 0;
            ($model->chiphidvklk!= null)? $chiphidvklk = $model->chiphidvklk : $chiphidvklk = 0;
            ($model->giathanhtblk!= null)? $giathanhtblk = $model->giathanhtblk : $giathanhtblk = 0;
            ($model->giathanhlk!= null)? $giathanhlk = $model->giathanhlk : $giathanhlk = 0;


            $result['message'] = '<div class="form-horizontal" id="ttkkgialk">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>A. Sản lượng tính giá(Q)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="sltglk" name="sltglk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$sltglk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>B. Chi phí sản xuất, kinh doanh</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphisxkdlk" name="chiphisxkdlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphisxkdlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>I. Chi phí trực tiếp:</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphittlk" name="chiphittlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphittlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphinllk" name="chiphinllk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphinllk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">2. Chi phí nhân công trực tiếp</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphinclk" name="chiphinclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphinclk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">3. Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphikhlk" name="chiphikhlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphikhlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">4. Chi phí sản xuất, kinh doanh (chưa tính ở mục 1,2,3) theo đặc thù</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphisxkddtlk" name="chiphisxkddtlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphisxkddtlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>II. Chi phí chung</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphiclk" name="chiphiclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphiclk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">5. Chi phí sản xuất chung</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphisxclk" name="chiphisxclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphisxclk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">6. Chi phí tài chính (nếu có)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphitclk" name="chiphitclk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphitclk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">7. Chi phí bán hàng</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphibhlk" name="chiphibhlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphibhlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">8. Chi phí quản lý</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphiqllk" name="chiphiqllk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphiqllk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Tổng chi phí sản xuất, kinh doanh (TC)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="tchiphisxkdlk" name="tchiphisxkdlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$tchiphisxkdlk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>C. Chi phí phân bổ cho dịch vụ khác (nếu có) (CP)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphidvklk" name="chiphidvklk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphidvklk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>D. Giá thành toàn bộ (TC-CP)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giathanhtblk" name="giathanhtblk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giathanhtblk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Đ. Giá thành toàn bộ 01 (một) đơn vị sản phẩm, dịch vụ (TC-CP)/Q</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giathanhlk" name="giathanhlk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giathanhlk.'">';
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
            $modelkkgia = GiaVtXkCtDf::where('id',$inputs['id'])->first();
            $inputs['sltglk'] = getMoneyToDb($inputs['sltglk']);
            $inputs['chiphisxkdlk'] = getMoneyToDb($inputs['chiphisxkdlk']);
            $inputs['chiphittlk'] = getMoneyToDb($inputs['chiphittlk']);
            $inputs['chiphinllk'] = getMoneyToDb($inputs['chiphinllk']);
            $inputs['chiphinclk'] = getMoneyToDb($inputs['chiphinclk']);
            $inputs['chiphikhlk'] = getMoneyToDb($inputs['chiphikhlk']);
            $inputs['chiphisxkddtlk'] = getMoneyToDb($inputs['chiphisxkddtlk']);
            $inputs['chiphiclk'] = getMoneyToDb($inputs['chiphiclk']);
            $inputs['chiphisxclk'] = getMoneyToDb($inputs['chiphisxclk']);
            $inputs['chiphitclk'] = getMoneyToDb($inputs['chiphitclk']);
            $inputs['chiphibhlk'] = getMoneyToDb($inputs['chiphibhlk']);
            $inputs['chiphiqllk'] = getMoneyToDb($inputs['chiphiqllk']);
            $inputs['tchiphisxkdlk'] = getMoneyToDb($inputs['tchiphisxkdlk']);
            $inputs['chiphidvklk'] = getMoneyToDb($inputs['chiphidvklk']);
            $inputs['giathanhtblk'] = getMoneyToDb($inputs['giathanhtblk']);
            $inputs['giathanhlk'] = getMoneyToDb($inputs['giathanhlk']);
            $modelkkgia->update($inputs);
            $model = GiaVtXkCtDf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->loaixe.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->mota.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanhlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanh).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
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
            $model = GiaVtXkCtDf::where('id',$inputs['id'])
                ->first();
            ($model->sltg!= null)? $sltg = $model->sltg : $sltg = 0;
            ($model->chiphisxkd!= null)? $chiphisxkd = $model->chiphisxkd : $chiphisxkd = 0;
            ($model->chiphitt!= null)? $chiphitt = $model->chiphitt : $chiphitt = 0;
            ($model->chiphinl!= null)? $chiphinl = $model->chiphinl : $chiphinl = 0;
            ($model->chiphinc!= null)? $chiphinc = $model->chiphinc : $chiphinc = 0;
            ($model->chiphikh!= null)? $chiphikh = $model->chiphikh : $chiphikh = 0;
            ($model->chiphisxkddt!= null)? $chiphisxkddt = $model->chiphisxkddt : $chiphisxkddt = 0;
            ($model->chiphic!= null)? $chiphic = $model->chiphic : $chiphic = 0;
            ($model->chiphisxc!= null)? $chiphisxc = $model->chiphisxc : $chiphisxc = 0;
            ($model->chiphitc!= null)? $chiphitc = $model->chiphitc : $chiphitc = 0;
            ($model->chiphibh!= null)? $chiphibh = $model->chiphibh : $chiphibh = 0;
            ($model->chiphiql!= null)? $chiphiql = $model->chiphiql : $chiphiql = 0;
            ($model->tchiphisxkd!= null)? $tchiphisxkd = $model->tchiphisxkd : $tchiphisxkd = 0;
            ($model->chiphidvk!= null)? $chiphidvk = $model->chiphidvk : $chiphidvk = 0;
            ($model->giathanhtb!= null)? $giathanhtb = $model->giathanhtb : $giathanhtb = 0;
            ($model->giathanh!= null)? $giathanh = $model->giathanh : $giathanh = 0;


            $result['message'] = '<div class="form-horizontal" id="ttkkgia">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>A. Sản lượng tính giá(Q)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="sltg" name="sltg" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$sltg.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>B. Chi phí sản xuất, kinh doanh</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphisxkd" name="chiphisxkd" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphisxkd.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>I. Chi phí trực tiếp:</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphitt" name="chiphitt" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphitt.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">1.Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphinl" name="chiphinl" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphinl.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">2. Chi phí nhân công trực tiếp</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphinc" name="chiphinc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphinc.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">3. Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphikh" name="chiphikh" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphikh.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">4. Chi phí sản xuất, kinh doanh (chưa tính ở mục 1,2,3) theo đặc thù</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphisxkddt" name="chiphisxkddt" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphisxkddt.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>II. Chi phí chung</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphic" name="chiphic" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphic.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">5. Chi phí sản xuất chung</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphisxc" name="chiphisxc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphisxc.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">6. Chi phí tài chính (nếu có)</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphitc" name="chiphitc" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphitc.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">7. Chi phí bán hàng</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphibh" name="chiphibh" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphibh.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left">8. Chi phí quản lý</label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphiql" name="chiphiql" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphiql.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Tổng chi phí sản xuất, kinh doanh (TC)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="tchiphisxkd" name="tchiphisxkd" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$tchiphisxkd.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>C. Chi phí phân bổ cho dịch vụ khác (nếu có) (CP)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="chiphidvk" name="chiphidvk" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$chiphidvk.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>D. Giá thành toàn bộ (TC-CP)</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giathanhtb" name="giathanhtb" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giathanhtb.'">';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="col-md-9 control-label" style="text-align: left"><b>Đ. Giá thành toàn bộ 01 (một) đơn vị sản phẩm, dịch vụ (TC-CP)/Q</b></label>';
            $result['message'] .= '<div class="col-md-3">';
            $result['message'] .= '<input type="text" id="giathanh" name="giathanh" class="form-control pag" data-mask="fdecimal" style="text-align: right" value="'.$giathanh.'">';
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
            $modelkkgia = GiaVtXkCtDf::where('id',$inputs['id'])->first();
            $inputs['sltg'] = getMoneyToDb($inputs['sltg']);
            $inputs['chiphisxkd'] = getMoneyToDb($inputs['chiphisxkd']);
            $inputs['chiphitt'] = getMoneyToDb($inputs['chiphitt']);
            $inputs['chiphinl'] = getMoneyToDb($inputs['chiphinl']);
            $inputs['chiphinc'] = getMoneyToDb($inputs['chiphinc']);
            $inputs['chiphikh'] = getMoneyToDb($inputs['chiphikh']);
            $inputs['chiphisxkddt'] = getMoneyToDb($inputs['chiphisxkddt']);
            $inputs['chiphic'] = getMoneyToDb($inputs['chiphic']);
            $inputs['chiphisxc'] = getMoneyToDb($inputs['chiphisxc']);
            $inputs['chiphitc'] = getMoneyToDb($inputs['chiphitc']);
            $inputs['chiphibh'] = getMoneyToDb($inputs['chiphibh']);
            $inputs['chiphiql'] = getMoneyToDb($inputs['chiphiql']);
            $inputs['tchiphisxkd'] = getMoneyToDb($inputs['tchiphisxkd']);
            $inputs['chiphidvk'] = getMoneyToDb($inputs['chiphidvk']);
            $inputs['giathanhtb'] = getMoneyToDb($inputs['giathanhtb']);
            $inputs['giathanh'] = getMoneyToDb($inputs['giathanh']);
            $modelkkgia->update($inputs);
            $model = GiaVtXkCtDf::where('maxa',$inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Loại xe</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Mô tả</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$tt){
                    $result['message'] .= '<tr id="'.$tt->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tt->loaixe.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->mota.'</td>';
                    $result['message'] .= '<td style="text-align: center">'.$tt->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanhlk).'</td>';
                    $result['message'] .= '<td style="text-align: right">'.number_format($tt->giathanh).'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$tt->ghichu.'</td>';
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
