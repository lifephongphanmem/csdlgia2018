<?php

namespace App\Http\Controllers\manage;

use App\DiaBanHd;
use App\District;
use App\Model\manage\dinhgia\GiaDvGdDt;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaDvGdDtController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : (date('Y').'-'.(date('Y')+1));
            $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'All';
            $inputs['khuvuc'] = isset($inputs['khuvuc']) ? $inputs['khuvuc'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $model = GiaDvGdDt::join('diabanhd','diabanhd.district','=','giadvgddt.district')
                ->where('diabanhd.level','H')
                ->select('giadvgddt.*','diabanhd.diaban');
            if($inputs['nam'] != 'all')
                $model = $model->where('giadvgddt.nam',$inputs['nam']);
            if($inputs['district'] != 'All')
                $model = $model ->where('giadvgddt.district',$inputs['district']);
            if($inputs['khuvuc'] != '')
                $model = $model->where('giadvgddt.khuvuc','like', '%'.$inputs['khuvuc'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('giadvgddt.mota','like', '%'.$inputs['mota'].'%');

            $model = $model->paginate($inputs['paginate']);
            $diabans = DiaBanHd::where('level','H')
                ->get();
            return view('manage.dinhgia.giadvgddt.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('diabans',$diabans)
                ->with('pageTitle', 'Giá dịch vụ giáo dục đào tạo');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new GiaDvGdDt();
            $model->nam = $inputs['add_nam'];
            $model->district = $inputs['add_district'];
            $model->khuvuc = $inputs['add_khuvuc'];
            $model->mota = $inputs['add_mota'];
            $model->dongia = chkDbl($inputs['add_dongia']);
            $model->ttqd = $inputs['add_ttqd'];
            $model->ghichu = $inputs['add_ghichu'];
            $model->trangthai = 'CHT';
            $model->save();
            return redirect('giadvgiaoducdaotao?&nam='.$inputs['add_nam'].'&district='.$inputs['add_district']);
        }else
            return view('errors.notlogin');
    }

    public function edit(Request $request){
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
        $model = GiaDvGdDt::findOrFail($id);
        $diabans = DiaBanHd::where('level','H')
            ->geT();

        $result['message'] = '<div class="modal-body" id="edit_node">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Năm<span class="require">*</span></label>';
        $result['message'] .= '<select class="form-control" id="edit_nam" name="edit_nam">';
        $nam_start = 2015;
        $nam_stop = intval(date('Y')) + 1;
        for($i = $nam_start; $i <= $nam_stop; $i++) {
            $result['message'] .= '<option value="'.$i.'-'.($i+1).'"'.($i.'-'.($i+1) == $model->nam ? 'selected' : '').'>Năm '.$i.'-'.($i+1).'</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Địa bàn<span class="require">*</span></label>';
        $result['message'] .= '<select class="form-control" id="edit_district" name="edit_district">';
        foreach($diabans as $diaban){
            $result['message'] .= '<option value="'.$diaban->district.'"'.($model->district == $diaban->district ? "selected" : "") .'>'.$diaban->diaban.'</option>';
        }
//        $result['message'] .= '<option value="Nông thôn"'.($model->diaban == "Nông thôn" ? "selected" : "") .'>Nông thôn</option>';
//        $result['message'] .= '<option value="Miền núi"'.($model->diaban == "Miền núi" ? "selected" : "") .'>Miền núi</option>';
//        $result['message'] .= '<option value="Hải đảo"'.($model->diaban == "Hải đảo" ? "selected" : "") .'>Hải đảo</option>';
        $result['message'] .= '</select>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Khu vực<span class="require">*</span></label>';
        $result['message'] .= '<textarea name="edit_khuvuc" id="edit_khuvuc" class="form-control">'.$model->khuvuc;
        $result['message'] .= '</textarea></div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Mô tả<span class="require">*</span></label>';
        $result['message'] .= '<textarea name="edit_mota" id="edit_mota" class="form-control">'.$model->mota;
        $result['message'] .= '</textarea></div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Đơn giá<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_dongia" id="edit_dongia" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->dongia . '" ' . '/>';

        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Thông tư quyết định<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_ttqd" id="edit_ttqd" class="form-control" value="' . $model->ttqd . '" ' . '/>';

        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Ghi chú<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_ghichu" id="edit_ghichu" class="form-control" value="' . $model->ghichu . '" ' . '/>';

        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<input type="hidden" name="edit_id" id="edit_id" class="form-control" value="' . $model->id . '"/>';
        $result['message'] .= '</div>';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function update(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaDvGdDt::where('id',$inputs['edit_id'])->first();
            $model->nam = $inputs['edit_nam'];
            $model->district = $inputs['edit_district'];
            $model->khuvuc = $inputs['edit_khuvuc'];
            $model->mota = $inputs['edit_mota'];
            $model->dongia = chkDbl($inputs['edit_dongia']);
            $model->ttqd = $inputs['edit_ttqd'];
            $model->ghichu = $inputs['edit_ghichu'];
            $model->save();
            return redirect('giadvgiaoducdaotao?&nam='.$inputs['edit_nam'].'&district='.$inputs['edit_district']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['destroy_id'];
            $model = GiaDvGdDt::findOrFail($id);
            $model->delete();

            return redirect('giadvgiaoducdaotao?&nam='.$model->nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function multidelete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaDvGdDt::where('nam',$inputs['namdel'])
                ->where('trangthai','CHT');
            if($inputs['districtdel'] != 'All')
                $model = $model->where('district',$inputs['districtdel']);

            $model = $model->delete();

            return redirect('giadvgiaoducdaotao?&nam='.$inputs['namdel'].'&district='.$inputs['districtdel']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = GiaDvGdDt::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();

            return redirect('giadvgiaoducdaotao?&nam='.$model->nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = GiaDvGdDt::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('giadvgiaoducdaotao?&nam='.$model->nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    function checkmulti(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaDvGdDt::where('nam',$inputs['namcheck']);
            if($inputs['districtcheck'] != 'All')
                $model = $model->where('district',$inputs['districtcheck'])
                    ->whereIn('trangthai',['HT','CB']);

            $model = $model->update(['trangthai' => $inputs['trangthaicheck']]);

            return redirect('giadvgiaoducdaotao?&nam='.$inputs['namcheck'].'&district='.$inputs['districtcheck']);
        }else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $diabans = DiaBanHd::where('level','H')
                ->get();
            return view('manage.dinhgia.giadvgddt.importexcel')
                ->with('diabans',$diabans)
                ->with('pageTitle','Nhận dữ liệu giá dịch vụ giáo dục đào tạo từ file Excel');

        } else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $filename = $inputs['nam'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];


            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });

            for ($i = $inputs['tudong']; $i <= $inputs['dendong']; $i++) {

                $modelctnew = new GiaDvGdDt();
                $modelctnew->nam = $inputs['nam'];
                $modelctnew->district = $inputs['district'];
                $modelctnew->khuvuc = $data[$i][$inputs['khuvuc']];
                $modelctnew->mota = $data[$i][$inputs['mota']];
                $modelctnew->dongia = (isset($data[$i][$inputs['dongia']]) && $data[$i][$inputs['dongia']] != '' ? chkDbl($data[$i][$inputs['dongia']]) : 0);
                $modelctnew->ttqd = $data[$i][$inputs['ttqd']];
                $modelctnew->ghichu = $data[$i][$inputs['ghichu']];
                $modelctnew->username = session('admin')->name.'('.session('admin')->username.')' ;
                $modelctnew->thaotac = 'Import';
                $modelctnew->trangthai = 'CHT';
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('giadvgiaoducdaotao?&nam='.$inputs['nam'].'&district='.$inputs['district']);
        }else
            return view('errors.notlogin');
    }

    public function BcGiaDvGdDt(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : (date('Y').'-'.(date('Y')+1));
            $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'All';
            $inputs['khuvuc'] = isset($inputs['khuvuc']) ? $inputs['khuvuc'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $diabans = DiaBanHd::where('level','H')
                ->get();
            $model = GiaDvGdDt::join('diabanhd','diabanhd.district','=','giadvgddt.district')
                ->where('diabanhd.level','H')
                ->select('giadvgddt.*','diabanhd.diaban');
            if($inputs['nam'] != 'all')
                $model = $model->where('giadvgddt.nam',$inputs['nam']);
            if($inputs['district'] != 'All') {
                $model = $model->where('giadvgddt.district', $inputs['district']);
                $diabans = DiaBanHd::where('level','H')
                    ->where('district',$inputs['district'])
                    ->first();
            }
            if($inputs['khuvuc'] != '')
                $model = $model->where('giadvgddt.khuvuc','like', '%'.$inputs['khuvuc'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('giadvgddt.mota','like', '%'.$inputs['mota'].'%');

            $model = $model->get();

            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = '';
                $inputs['dv'] = getGeneralConfigs()['tendonvi'];
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }elseif(session('admin')->level == 'H'){
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }else{
                $modeldv = Town::where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }
            return view('manage.dinhgia.giadvgddt.reports.BcGiaDvGdDt')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('diabans',$diabans)
                ->with('pageTitle', 'Giá dịch vụ giáo dục đào tạo');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaDvGdDt::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('giadvgiaoducdaotao?&nam='.$model->nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaDvGdDt::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();

            return redirect('giadvgiaoducdaotao?&nam='.$model->nam.'&district='.$model->district);
        }else
            return view('errors.notlogin');
    }
}
