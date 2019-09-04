<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvlt;

use App\DtAdDvLt;
use App\Model\manage\kekhaigia\kkdvlt\KkGiaDvLtCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkGiaDvLtCtDfController extends Controller
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
        if(isset($inputs['loaip'])){
            $inputs['mucgialk'] = getMoneyToDb($inputs['mucgialk']);
            $inputs['mucgiakk'] = getMoneyToDb($inputs['mucgiakk']);
            $modelkkgia = new KkGiaDvLtCtDf();
            $modelkkgia->create($inputs);

            $model = KkGiaDvLtCtDf::where('kkgiadvltctdf.maxa',$inputs['maxa'])
                ->leftJoin('dtapdungdvlt','dtapdungdvlt.madtad','=','kkgiadvltctdf.madtad')
                ->select('kkgiadvltctdf.*','dtapdungdvlt.tendtad')

                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Đối tượng áp dụng</th>';
            $result['message'] .= '<th style="text-align: center">Loại phòng<br> Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Số hiệu phòng</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttphong){
                    $result['message'] .= '<tr id="'.$ttphong->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="success">'.$ttphong->tendtad.'</td>';
                    $result['message'] .= '<td class="active">'.$ttphong->loaip.'-'.$ttphong->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$ttphong->sohieu.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$ttphong->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($ttphong->mucgialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($ttphong->mucgiakk).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$ttphong->id.')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttphong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

            $model = KkGiaDvLtCtDf::findOrFail($id);
            $modeldtad = DtAdDvLt::all();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="ttpedit">';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đối tượng áp dụng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><select name="madtadedit" id="madtadedit" class="form-control">';
            $result['message'] .= '<option value="00">--Chọn đối tượng áp dụng--</option>';
            foreach($modeldtad as $tt){
                $result['message'] .= '<option value="'.$tt->madtad.'"'.(($model->madtad == $tt->madtad) ? "selected" : "").'>'.$tt->tendtad.'</option>';
            }
            $result['message'] .= '</select></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Loại phòng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="loaipedit" id="loaipedit" class="form-control" value="'.$model->loaip.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Quy cách chất lượng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="qccledit" class="form-control" name="qccledit" cols="30" rows="3">'.$model->qccl.'</textarea></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Số hiệu phòng</b><span class="require">*</span></label>';
            $result['message'] .= '<div><textarea id="sohieuedit" class="form-control" name="sohieuedit" cols="30" rows="3">'.$model->sohieu.'</textarea></div>';
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

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Mức giá liền kề</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="mucgialkedit" id="mucgialkedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold" value="'.$model->mucgialk.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Mức giá kê khai</b><span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="mucgiakkedit" id="mucgiakkedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold" value="'.$model->mucgiakk.'"></div>';
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
        if(isset($inputs['loaip'])){
            $inputs['mucgialk'] = getMoneyToDb($inputs['mucgialk']);
            $inputs['mucgiakk'] = getMoneyToDb($inputs['mucgiakk']);
            $modelkkgia = KkGiaDvLtCtDf::where('id',$inputs['id'])->first();
            $modelkkgia->update($inputs);

            $model = KkGiaDvLtCtDf::where('kkgiadvltctdf.maxa',$inputs['maxa'])
                ->leftJoin('dtapdungdvlt','dtapdungdvlt.madtad','=','kkgiadvltctdf.madtad')
                ->select('kkgiadvltctdf.*','dtapdungdvlt.tendtad')

                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Đối tượng áp dụng</th>';
            $result['message'] .= '<th style="text-align: center">Loại phòng<br> Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Số hiệu phòng</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttphong){
                    $result['message'] .= '<tr id="'.$ttphong->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="success">'.$ttphong->tendtad.'</td>';
                    $result['message'] .= '<td class="active">'.$ttphong->loaip.'-'.$ttphong->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$ttphong->sohieu.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$ttphong->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($ttphong->mucgialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($ttphong->mucgiakk).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$ttphong->id.')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttphong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

        $inputs = $request->all();
        if(isset($inputs['id'])){
            $modelkkgia = KkGiaDvLtCtDf::where('id',$inputs['id'])->first();
            $modelkkgia->delete();

            $model = KkGiaDvLtCtDf::where('kkgiadvltctdf.maxa',$inputs['maxa'])
                ->leftJoin('dtapdungdvlt','dtapdungdvlt.madtad','=','kkgiadvltctdf.madtad')
                ->select('kkgiadvltctdf.*','dtapdungdvlt.tendtad')
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Đối tượng áp dụng</th>';
            $result['message'] .= '<th style="text-align: center">Loại phòng<br> Quy cách chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Số hiệu phòng</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá<br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center" width="20%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttphong){
                    $result['message'] .= '<tr id="'.$ttphong->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="success">'.$ttphong->tendtad.'</td>';
                    $result['message'] .= '<td class="active">'.$ttphong->loaip.'-'.$ttphong->qccl.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$ttphong->sohieu.'</td>';
                    $result['message'] .= '<td style="text-align: left">'.$ttphong->ghichu.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($ttphong->mucgialk).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($ttphong->mucgiakk).'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editTtPh('.$ttphong->id.')"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa thông tin</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttphong->id.')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
