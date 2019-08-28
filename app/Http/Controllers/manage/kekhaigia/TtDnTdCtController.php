<?php

namespace App\Http\Controllers\manage\kekhaigia;

use App\Town;
use App\TtDnTdCt;
use App\Model\system\dmnganhnghekd\DmNganhKd;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TtDnTdCtController extends Controller
{
    public function store(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        $check = TtDnTdCt::where('maxa', $inputs['maxa'])
            ->where('manganh', $inputs['manganh'])
            ->where('manghe', $inputs['manghe'])
            ->get()->count();
        if($check  == 0) {
            $inputs['trangthai'] = 'CXD';
            $modelkkgia = new TtDnTdCt();
            $modelkkgia->create($inputs);

            $model = TtDnTdCt::Leftjoin('town', 'town.maxa', '=', 'ttdntdct.mahuyen')
                ->join('dmnganhkd', 'dmnganhkd.manganh', '=', 'ttdntdct.manganh')
                ->join('dmnghekd', 'dmnghekd.manghe', '=', 'ttdntdct.manghe')
                ->select('ttdntdct.*', 'town.tendv', 'dmnganhkd.tennganh', 'dmnghekd.tennghe')
                ->where('ttdntdct.maxa', $inputs['maxa'])
                ->get();
            $result['message'] = '<div class="row" id="dsts">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
            $result['message'] .= '<thead>';
            $result['message'] .= '<tr>';
            $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
            $result['message'] .= '<th style="text-align: center">Mã ngành</th>';
            $result['message'] .= '<th style="text-align: center">Tên ngành</th>';
            $result['message'] .= '<th style="text-align: center">Mã nghề</th>';
            $result['message'] .= '<th style="text-align: center">Tên nghề</th>';
            $result['message'] .= '<th style="text-align: center">Đơn vị quản lý</th>';
            $result['message'] .= '<th style="text-align: center">Thao tác</th>';
            $result['message'] .= '</thead>';
            $result['message'] .= '<tbody>';
            if (count($model) > 0) {
                foreach ($model as $key => $tt) {
                    $result['message'] .= '<tr id="' . $tt->id . '">';
                    $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                    $result['message'] .= '<td class="active">' . $tt->manganh . '</td>';
                    $result['message'] .= '<td style="text-align: left">' . $tt->tennganh . '</td>';
                    $result['message'] .= '<td style="text-align: center">' . $tt->manghe . '</td>';
                    $result['message'] .= '<td style="text-align: left">' . $tt->tennghe . '</td>';
                    $result['message'] .= '<td style="text-align: left">' . $tt->tendv . '</td>';
                    $result['message'] .= '<td>' .
                        '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getidedit(' . $tt->id . ');" ><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                        '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $tt->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'
                        . '</td>';
                    $result['message'] .= '</tr>';
                }
                $result['message'] .= '</tbody>';
                $result['message'] .= '</table>';
                $result['message'] .= '</div>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }
        }else
            $result = array(
                'status' => 'fail',
                'message' => 'error',
            );

        die(json_encode($result));
    }

    public function delete(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        $modelkkgia = TtDnTdCt::where('id', $inputs['id'])->delete();

        $model = TtDnTdCt::join('town', 'town.maxa', '=', 'ttdntdct.mahuyen')
            ->join('dmnganhkd', 'dmnganhkd.manganh', '=', 'ttdntdct.manganh')
            ->join('dmnghekd', 'dmnghekd.manghe', '=', 'ttdntdct.manghe')
            ->select('ttdntdct.*', 'town.tendv', 'dmnganhkd.tennganh', 'dmnghekd.tennghe')
            ->where('ttdntdct.maxa', $inputs['maxa'])
            ->get();
        $result['message'] = '<div class="row" id="dsts">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
        $result['message'] .= '<thead>';
        $result['message'] .= '<tr>';
        $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
        $result['message'] .= '<th style="text-align: center">Mã ngành</th>';
        $result['message'] .= '<th style="text-align: center">Tên ngành</th>';
        $result['message'] .= '<th style="text-align: center">Mã nghề</th>';
        $result['message'] .= '<th style="text-align: center">Tên nghề</th>';
        $result['message'] .= '<th style="text-align: center">Đơn vị quản lý</th>';
        $result['message'] .= '<th style="text-align: center">Thao tác</th>';
        $result['message'] .= '</thead>';
        $result['message'] .= '<tbody>';
        if (count($model) > 0) {
            foreach ($model as $key => $tt) {
                $result['message'] .= '<tr id="' . $tt->id . '">';
                $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                $result['message'] .= '<td class="active">' . $tt->manganh . '</td>';
                $result['message'] .= '<td style="text-align: left">' . $tt->tennganh . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $tt->manghe . '</td>';
                $result['message'] .= '<td style="text-align: left">' . $tt->tennghe . '</td>';
                $result['message'] .= '<td style="text-align: left">' . $tt->tendv . '</td>';
                $result['message'] .= '<td>' .
                    '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getidedit(' . $tt->id . ');" ><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                    '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $tt->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                    . '</td>';
                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

    public function edit(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );

        $inputs = $request->all();
        $model = TtDnTdCt::where('id',$inputs['id'])
            ->first();
        $modelnghe = DmNgheKd::where('manganh',$model->manganh)->get();
        $modelnganh = DmNganhKd::all();
        $modeldm = DmNgheKd::where('manganh', $model->manganh)
            ->where('manghe', $model->manghe)
            ->first();
        $modeldv = Town::where('mahuyen', $modeldm->mahuyen)
            ->get();


        $result['message'] = '<div class="modal-body" id="edit_lvcc">';
        $result['message'] .= ' <div class="row"><div class="col-md-12"><div class="form-group">';
        $result['message'] .= ' <label class="control-label">Ngành</label>';
        $result['message'] .= '<select class="form-control" id="edit_manganh" name="edit_manganh" disabled>';
        $result['message'] .= '<option value="">--Chọn ngành--</option>';
        foreach ($modelnganh as $nganh) {
            $result['message'] .= '<option value="' . $nganh->manganh . '"'.($nganh->manganh == $model->manganh ? 'selected' : '').'>' . $nganh->tennganh . '</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div></div></div>';

        $result['message'] .= ' <div class="row"><div class="col-md-12"><div class="form-group">';
        $result['message'] .= ' <label class="control-label">Nghề</label>';
        $result['message'] .= '<select class="form-control" id="edit_manghe" name="edit_manghe" disabled>';
        $result['message'] .= '<option value="">--Chọn nghề--</option>';
        foreach ($modelnghe as $nghe) {
            $result['message'] .= '<option value="' . $nghe->manghe . '"'.($nghe->manghe == $model->manghe ? 'selected' : '').'>' . $nghe->tennghe . '</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div></div></div>';

        $result['message'] .= ' <div class="row"><div class="col-md-12"><div class="form-group">';
        $result['message'] .= ' <label class="control-label">Đơn vị nhận hồ sơ</label>';
        $result['message'] .= '<select class="form-control" id="edit_mahuyen" name="edit_mahuyen">';
        $result['message'] .= '<option value="">--Chọn đơn vị nhận hồ sơ--</option>';
        foreach ($modeldv as $dv) {
            $result['message'] .= '<option value="' . $dv->maxa . '"'.($dv->maxa == $model->mahuyen ? 'selected' : '').'>' . $dv->tendv . '</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div></div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<input type="hidden" id="edit_id" name="edit_id" value="'.$model->id.'">';

        $result['status'] = 'success';


        die(json_encode($result));
    }

    public function update(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        $inputs = $request->all();

        $modelkkgia = TtDnTdCt::where('id', $inputs['id'])
            ->first();
        $modelkkgia->mahuyen = $inputs['mahuyen'];
        $modelkkgia->save();

        $model = TtDnTdCt::Leftjoin('town', 'town.maxa', '=', 'ttdntdct.mahuyen')
            ->join('dmnganhkd', 'dmnganhkd.manganh', '=', 'ttdntdct.manganh')
            ->join('dmnghekd', 'dmnghekd.manghe', '=', 'ttdntdct.manghe')
            ->select('ttdntdct.*', 'town.tendv', 'dmnganhkd.tennganh', 'dmnghekd.tennghe')
            ->where('ttdntdct.maxa', $inputs['maxa'])
            ->get();

        $result['message'] = '<div class="row" id="dsts">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
        $result['message'] .= '<thead>';
        $result['message'] .= '<tr>';
        $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
        $result['message'] .= '<th style="text-align: center">Mã ngành</th>';
        $result['message'] .= '<th style="text-align: center">Tên ngành</th>';
        $result['message'] .= '<th style="text-align: center">Mã nghề</th>';
        $result['message'] .= '<th style="text-align: center">Tên nghề</th>';
        $result['message'] .= '<th style="text-align: center">Đơn vị quản lý</th>';
        $result['message'] .= '<th style="text-align: center">Thao tác</th>';
        $result['message'] .= '</thead>';
        $result['message'] .= '<tbody>';
        if (count($model) > 0) {
            foreach ($model as $key => $tt) {
                $result['message'] .= '<tr id="' . $tt->id . '">';
                $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                $result['message'] .= '<td class="active">' . $tt->manganh . '</td>';
                $result['message'] .= '<td style="text-align: left">' . $tt->tennganh . '</td>';
                $result['message'] .= '<td style="text-align: center">' . $tt->manghe . '</td>';
                $result['message'] .= '<td style="text-align: left">' . $tt->tennghe . '</td>';
                $result['message'] .= '<td style="text-align: left">' . $tt->tendv . '</td>';
                $result['message'] .= '<td>' .
                    '<button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getidedit(' . $tt->id . ');" ><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>'.
                    '<button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid(' . $tt->id . ');" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                    . '</td>';
                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }

        die(json_encode($result));
    }

}
