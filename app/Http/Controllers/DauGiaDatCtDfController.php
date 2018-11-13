<?php

namespace App\Http\Controllers;

use App\DauGiaDatCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DauGiaDatCtDfController extends Controller
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
        if(isset($inputs['vitridiadiem'])){
            $inputs['mucgiasan'] = getMoneyToDb($inputs['mucgiasan']);
            $inputs['mucgiadaugia'] = getMoneyToDb($inputs['mucgiadaugia']);
            $modeladd = new DauGiaDatCtDf();
            $modeladd->create($inputs);

            $model = DauGiaDatCtDf::where('district',$inputs['district'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Vị trí, địa điểm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá sàn</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá đầu giá</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị đấu giá</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->vitridiadiem.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->mucgiasan).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->mucgiadaugia).'</td>';
                    $result['message'] .= '<td>'.$tents->donvidaugia.'</td>';
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

            $model = DauGiaDatCtDf::where('id',$inputs['id'])
                ->first();
            //dd($model);
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Vị trí,địa điểm<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="vitridiadiemedit" id="vitridiadiemedit" class="form-control" value="'.$model->vitridiadiem.'"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';



            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Mức giá sàn<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="mucgiasanedit" id="mucgiasanedit" class="form-control" data-mask="fdecimal" value="'.$model->mucgiasan.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Mức giá đấu giá<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="mucgiadaugiaedit" id="mucgiadaugiaedit" class="form-control" data-mask="fdecimal" value="'.$model->mucgiadaugia.'" style="text-align: right;font-weight: bold"></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị đấu thầu<span class="require">*</span></label>';
            $result['message'] .= '<div><input type="text" name="donvidaugiaedit" id="donvidaugiaedit" class="form-control" value="'.$model->donvidaugia.'"></div>';
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
            $modelupdate = DauGiaDatCtDf::where('id',$inputs['id'])->first();
            $inputs['mucgiasan'] = getMoneyToDb($inputs['mucgiasan']);
            $inputs['mucgiadaugia'] = getMoneyToDb($inputs['mucgiadaugia']);
            $modelupdate->update($inputs);

            $model = DauGiaDatCtDf::where('district',$inputs['district'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Vị trí, địa điểm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá sàn</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá đầu giá</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị đấu giá</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->vitridiadiem.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->mucgiasan).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->mucgiadaugia).'</td>';
                    $result['message'] .= '<td>'.$tents->donvidaugia.'</td>';
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
            $modelts = DauGiaDatCtDf::where('id',$inputs['id'])->delete();

            $model = DauGiaDatCtDf::where('district',$inputs['district'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Vị trí, địa điểm</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá sàn</th>';
            $result['message'] .= '<th style="text-align: center" width="10%">Mức giá đầu giá</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị đấu giá</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody id="ttts">';
            if(count($model) > 0){
                foreach($model as $key=>$tents){
                    $result['message'] .= '<tr id="'.$tents->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$tents->vitridiadiem.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->mucgiasan).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold">'.number_format($tents->mucgiadaugia).'</td>';
                    $result['message'] .= '<td>'.$tents->donvidaugia.'</td>';
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
