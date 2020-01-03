<?php

namespace App\Http\Controllers\manage\kekhaidkg\kekhaimhbog;

use App\Model\manage\kekhaidkg\kehaimhbog\KkMhBogCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkMhBogCtController extends Controller
{
    public function add(Request $request){
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
        //dd($inputs);
        if(isset($inputs['tenhh'])){
            $inputs['gialk'] = getDoubleToDb($inputs['gialk']);
            $inputs['giakk'] = getDoubleToDb($inputs['giakk']);
            $inputs['trangthai'] = 'CXD';
            $modeladd = new KkMhBogCt();

            $modeladd->create($inputs);
            //dd($inputs);
            $model = KkMhBogCt::where('mahs',$inputs['mahs'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhh.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->gialk,5).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->giakk,5).'</td>';
                    $result['message'] .= '<td>'.$ttmh->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttmh->id.');"><i class="fa fa-edit"></i>&nbsp;Mức giá mới</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttmh->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

    public function show(Request $request){
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
//            $id = $inputs['id'];
//
//            $model = KkMhBogCt::findOrFail($id);
//            //dd($model);
//            $result['message'] = '<div class="modal-body" id="ttmhbogedit">';
//
//            $result['message'] .= '<div class="row">';
//            $result['message'] .= '<div class="col-md-6">';
//            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Tên mặt hàng</b><span class="require">*</span></label>';
//            $result['message'] .= '<div><input type="text" name="tenhhedit" id="tenhhedit" class="form-control" value="'.$model->tenhh.'"></div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//
//            $result['message'] .= '<div class="col-md-6">';
//            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Quy cách, chất lượng1</b><span class="require">*</span></label>';
//            $result['message'] .= '<div><input type="text" name="quycachedit" id="quycachedit" value="'.$model->quycach.'" class="form-control"></div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//
//            $result['message'] .= '<div class="row">';
//            $result['message'] .= '<div class="col-md-6">';
//            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>';
//            $result['message'] .= '<div><input type="text" id="dvtedit" class="form-control" name="dvtedit" value='.$model->dvt.'></div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//
//            $result['message'] .= '<div class="row">';
//            $result['message'] .= '<div class="col-md-6">';
//            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá liền kề</b><span class="require">*</span></label>';
//            $result['message'] .= '<div><input type="text" style="text-align: right" id="gialkedit" name="gialkedit" class="form-control" data-mask="fdecimal" value="'.$model->gialk.'"></div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '<div class="col-md-6">';
//            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Giá kê khai</b><span class="require">*</span></label>';
//            $result['message'] .= '<div><input type="text" style="text-align: right" id="giakkedit" name="giakkedit" class="form-control" data-mask="fdecimal" value="'.$model->giakk.'"></div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//
//            $result['message'] .= '<div class="row">';
//            $result['message'] .= '<div class="col-md-12">';
//            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label"><b>Ghi chú</b><span class="require">*</span></label>';
//            $result['message'] .= '<div><input type="text" id="ghichuedit" class="form-control" name="ghichuedit" value='.$model->ghichu.'></div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//            $result['message'] .= '</div>';
//
//
//
//            $result['message'] .= '<input type="hidden" id="idedit" name="idedit" value="'.$model->id.'">';
//            $result['message'] .= '</div>';
//            $result['status'] = 'success';
//
//        }
//        die(json_encode($result));
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();
        $id = $inputs['id'];
        $model = KkMhBogCt::findOrFail($id);
        die($model);
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
            $inputs['gialk'] = getDoubleToDb($inputs['gialk']);
            $inputs['giakk'] = getDoubleToDb($inputs['giakk']);
            $modeladd = KkMhBogCt::where('id',$inputs['id'])->first();
            unset($inputs['id']);
            $modeladd->update($inputs);

            $model = KkMhBogCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhh.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->gialk,5).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->giakk,5).'</td>';
                    $result['message'] .= '<td>'.$ttmh->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttmh->id.');"><i class="fa fa-edit"></i>&nbsp;Mức giá mới</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttmh->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
            $modeladd = KkMhBogCt::where('id',$inputs['id'])->delete();

            $model = KkMhBogCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhh.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->gialk,5).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->giakk,5).'</td>';
                    $result['message'] .= '<td>'.$ttmh->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttmh->id.');"><i class="fa fa-edit"></i>&nbsp;Mức giá mới</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttmh->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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

    public function editnhapkhau(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }

        $inputs = $request->all();
        $id = $inputs['id'];
        $model = KkMhBogCt::findOrFail($id);

        die($model);
    }

    public function updatenhapkhau(Request $request){
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
            $inputs['nksanluongtt'] = getDoubleToDb($inputs['nksanluongtt']);
            $inputs['nkgiamuacktt'] = getDoubleToDb($inputs['nkgiamuacktt']);
            $inputs['nkthuett'] = getDoubleToDb($inputs['nkthuett']);
            $inputs['nkthuettdbtt'] = getDoubleToDb($inputs['nkthuettdbtt']);
            $inputs['nkthuephiktt'] = getDoubleToDb($inputs['nkthuephiktt']);
            $inputs['nktienktt'] = getDoubleToDb($inputs['nktienktt']);
            $inputs['nkchiphitctt'] = getDoubleToDb($inputs['nkchiphitctt']);
            $inputs['nkchiphibhtt'] = getDoubleToDb($inputs['nkchiphibhtt']);
            $inputs['nkchiphiqltt'] = getDoubleToDb($inputs['nkchiphiqltt']);
            $inputs['nkgiathanh1sptt'] = getDoubleToDb($inputs['nkgiathanh1sptt']);
            $inputs['nkloinhuandktt'] = getDoubleToDb($inputs['nkloinhuandktt']);
            $inputs['nkthuegtgtktt'] = getDoubleToDb($inputs['nkthuegtgtktt']);
            $inputs['nkgiabandktt'] = getDoubleToDb($inputs['nkgiabandktt']);
            $modelup = KkMhBogCt::where('id',$inputs['id'])->first()->update($inputs);

            $model = KkMhBogCt::where('mahs',$inputs['mahs'])
                ->get();

            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Tên hàng hoá<br>dịch vụ</th>';
            $result['message'] .= '<th style="text-align: center">Quy cách<br>Chất lượng</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị<br>tính</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>liền kề</th>';
            $result['message'] .= '<th style="text-align: center">Mức giá <br>kê khai</th>';
            $result['message'] .= '<th style="text-align: center">Ghi chú</th>';
            $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
            $result['message'] .= '</tr>';
            $result['message'] .= '</thead>';


            $result['message'] .= '<tbody>';
            if(count($model) > 0){
                foreach($model as $key=>$ttmh){
                    $result['message'] .= '<tr id="'.$ttmh->id.'">';
                    $result['message'] .= '<td style="text-align: center">'.($key +1).'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->tenhh.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->quycach.'</td>';
                    $result['message'] .= '<td class="active">'.$ttmh->dvt.'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->gialk,5).'</td>';
                    $result['message'] .= '<td style="text-align: right;font-weight: bold;">'.dinhdangsothapphan($ttmh->giakk,5).'</td>';
                    $result['message'] .= '<td>'.$ttmh->ghichu.'</td>';
                    $result['message'] .= '<td>'.
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog('.$ttmh->id.');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid('.$ttmh->id.');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

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
