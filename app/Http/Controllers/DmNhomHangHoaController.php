<?php

namespace App\Http\Controllers;

use App\DmHangHoa;
use App\DmNhomHangHoa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


class DmNhomHangHoaController extends Controller
{
    public function index(){
        if(Session::has('admin')){
            $model = DmNhomHangHoa::all();
            return view('manage.thamdinhgia.danhmuc.nhom.index')
                ->with('model',$model)
                ->with('pageTitle','Danh mục nhóm hàng hóa');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['theodoi'] = 'TD';
            $model = new DmNhomHangHoa();
            $model->create($inputs);
            return redirect('dmnhomhanghoa');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
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
        $model = DmNhomHangHoa::findOrFail($id);
        $check = 0;
        $check1 = 0;

        $result['message'] = '<div class="modal-body" id="edit-tt">';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mã nhóm<span class="require">*</span></label>';
        if($check == 0 && $check1 == 0)
            $result['message'] .= '<input type="text" name="edit_manhom" id="edit_manhom" class="form-control" value="'.$model->manhom.'"/>';
        else
            $result['message'] .= '<label  class="form-control" style="color: #0000ff">'.$model->manhom.'</label>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên nhóm <span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_tennhom" id="edit_tennhom" class="form-control" value="'.$model->tennhom.'"/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Theo dõi <span class="require">*</span></label>';
        $result['message'] .= '<select name="edit_theodoi" id="edit_theodoi" class="form-control">';
        if($model->theodoi == 'TD') {
            $result['message'] .= '<option value="TD" selected>Theo dõi</option>';
            $result['message'] .= '<option value="KTD">Bỏ theo dõi</option>';
        }else {
            $result['message'] .= '<option value="TD" >Theo dõi</option>';
            $result['message'] .= '<option value="KTD" selected>Bỏ theo dõi</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<input type="hidden" name="edit_id" id="edit_id" class="form-control" value="'.$model->id.'"/>';

        $result['message'] .= '</div>';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['edit_id'];
            $inputs['manhom']= $inputs['edit_manhom'];
            $inputs['tennhom'] = $inputs['edit_tennhom'];
            $inputs['theodoi'] = $inputs['edit_theodoi'];
            $model = DmNhomHangHoa::findOrFail($id);
            $model->update($inputs);
            return redirect('dmnhomhanghoa');
        }else
            return view('errors.notlogin');
    }

    function epExcel(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X' || session('admin')->level == 'CCG') {
                $inputs = $request->all();
                $model_nhom = DmNhomHangHoa::where('manhom', $inputs['manhom'])->first();
                $model = DmHangHoa::where('manhom',$inputs['manhom'])
                    ->get();
                //dd($model);
                    Excel::create('DMHANGHOA-'.$model_nhom->manhom, function ($excel) use ($model_nhom, $model) {
                        $excel->sheet('DMHANGHOA', function ($sheet) use ($model_nhom, $model) {
                            $sheet->loadView('manage.thamdinhgia.danhmuc.excel.danhmuc')
                                ->with('model_nhom', $model_nhom)
                                ->with('model', $model)
                                ->with('pageTitle', 'Danh sách hàng hóa');
                            //$sheet->setPageMargin(0.25);
                            $sheet->setAutoSize(false);
                            $sheet->setFontFamily('Tahoma');
                            $sheet->setFontBold(false);

                        });
                    })->download('xls');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }
}
