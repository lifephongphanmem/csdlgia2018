<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\GiaDatDiaBan;
use App\GiaDatDiaBanDm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaDatDiaBanController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['maloaidat'] = isset($inputs['maloaidat']) ? $inputs['maloaidat'] : 'All';
            $inputs['khuvuc'] = isset($inputs['khuvuc']) ? $inputs['khuvuc'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $inputs['paginate'] = isset($inputs['paginate']) ? $inputs['paginate'] : 5;
            $diabans = DiaBanHd::where('level','H')
                ->get();
            $loaidats = GiaDatDiaBanDm::all();
            if(session('admin')->level == 'T' || session('admin')->level == 'H')
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'All';
            else
                $inputs['district'] = session('admin')->districts;

            $model  = GiaDatDiaBan::join('diabanhd','diabanhd.district','=','giadatdiaban.district')
                ->where('diabanhd.level','H')
                ->join('giadatdiabandm','giadatdiaban.maloaidat','=','giadatdiabandm.maloaidat')
                ->select('giadatdiaban.*','diabanhd.diaban','giadatdiabandm.loaidat');
            if($inputs['nam'] != 'all')
                $model = $model->where('giadatdiaban.nam',$inputs['nam']);
            if($inputs['district'] !='All')
                $model = $model->where('giadatdiaban.district',$inputs['district']);
            if($inputs['maloaidat'] != 'All')
                $model = $model->where('giadatdiaban.maloaidat',$inputs['maloaidat']);
            if($inputs['khuvuc'] != '')
                $model = $model->where('giadatdiaban.khuvuc','like', '%'.$inputs['khuvuc'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('giadatdiaban.mota','like', '%'.$inputs['mota'].'%');
            $model = $model->paginate($inputs['paginate']);
            return view('manage.dinhgia.giadatdiaban.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('diabans',$diabans)
                ->with('loaidats',$loaidats)
                ->with('pageTitle','Thông tin gia đất theo địa bàn');

        } else
            return view('errors.notlogin');
    }

    public function nhandulieutuexcel(){
        if (Session::has('admin')) {
            $districts =DiaBanHd::where('level','H')
                ->get();
            $loaidats = GiaDatDiaBanDm::all();
            return view('manage.dinhgia.giadatdiaban.importexcel')
                ->with('districts',$districts)
                ->with('loaidats',$loaidats)
                ->with('pageTitle','Nhận dữ liệu giá đất trên địa bàn file Excel');

        } else
            return view('errors.notlogin');
    }

    public function importexcel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $filename = $inputs['district'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });

            for ($i = $inputs['tudong']; $i <= $inputs['dendong']; $i++) {

                $modelctnew = new GiaDatDiaBan();
                $modelctnew->nam = $inputs['nam'];
                $modelctnew->district = $inputs['district'];
                $modelctnew->maloaidat = $inputs['maloaidat'];
                $modelctnew->khuvuc = $data[$i][$inputs['khuvuc']];
                $modelctnew->mota = $data[$i][$inputs['mota']];
                $modelctnew->mdsd = $data[$i][$inputs['mdsd']];
                $modelctnew->giavt1 = (isset($data[$i][$inputs['giavt1']]) && $data[$i][$inputs['giavt1']] != '' ? chkDbl($data[$i][$inputs['giavt1']]) : 0);
                $modelctnew->giavt2 = (isset($data[$i][$inputs['giavt2']]) && $data[$i][$inputs['giavt2']] != '' ? chkDbl($data[$i][$inputs['giavt2']]) : 0);
                $modelctnew->giavt3 = (isset($data[$i][$inputs['giavt3']]) && $data[$i][$inputs['giavt3']] != '' ? chkDbl($data[$i][$inputs['giavt3']]) : 0);
                $modelctnew->giavt4 = (isset($data[$i][$inputs['giavt4']]) && $data[$i][$inputs['giavt4']] != '' ? chkDbl($data[$i][$inputs['giavt4']]) : 0);
                $modelctnew->giavt5 = (isset($data[$i][$inputs['giavt5']]) && $data[$i][$inputs['giavt5']] != '' ? chkDbl($data[$i][$inputs['giavt5']]) : 0);
                $modelctnew->hesok = (isset($data[$i][$inputs['hesok']]) && $data[$i][$inputs['hesok']] != '' ? chkDbl($data[$i][$inputs['hesok']]) : 1);
                $modelctnew->soqd = $inputs['soqd'];
                $modelctnew->username = session('admin')->name.'('.session('admin')->username.')' ;
                $modelctnew->thaotac = 'Import';
                $modelctnew->trangthai = 'CHT';
                $modelctnew->save();
            }
            File::Delete($path);
            return redirect('giadatdiaban?&nam='.$inputs['nam'].'&district='.$inputs['district'].'&maloaidat='.$inputs['maloaidat']);
        }else
            return view('errors.notlogin');
    }

    public function multidelete(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaDatDiaBan::where('district',$inputs['districtdel'])
                ->where('nam',$inputs['namdel']);
            if($inputs['maloaidatdel'] != 'All')
                $model = $model->where('maloaidat',$inputs['maloaidatdel']);

            $model = $model->delete();

            return redirect('giadatdiaban?&nam='.$inputs['namdel'].'&district='.$inputs['districtdel'].'&maloaidat='.$inputs['maloaidatdel']);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['destroy_id'];
            $model = GiaDatDiaBan::findOrFail($id);
            $model->delete();

            return redirect('giadatdiaban?&nam='.$model->nam.'&district='.$model->district.'&maloaidat='.$model->maloaidat);
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
        $model = GiaDatDiaBan::findOrFail($id);
        $diabans = DiaBanHd::where('level','H')->get();
        $loaidats = GiaDatDiaBanDm::all();


        $result['message'] = '<div class="modal-body" id="edit_node">';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Năm<span class="require">*</span></label>';
        $result['message'] .= '<select class="form-control" id="edit_nam" name="edit_nam">';
        $nam_start = 2015;
        $nam_stop = intval(date('Y')) + 1;
        for($i = $nam_start; $i <= $nam_stop; $i++) {
            $result['message'] .= '<option value="'.$i.'"'.($i == $model->nam ? 'selected' : '').'>Năm '.$i.'</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Địa bàn<span class="require">*</span></label>';
        $result['message'] .= '<select class="form-control" id="edit_district" name="edit_district">';
        foreach($diabans as $diaban){
            $result['message'] .= '<option value="'.$diaban->district.'"'.($diaban->district == $model->district ? 'selected' : '').'>'.$diaban->diaban.'</option>';
        }
        $result['message'] .= '</select>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Loại đất<span class="require">*</span></label>';
        $result['message'] .= '<select class="form-control" id="edit_maloaidat" name="edit_maloaidat">';
        foreach($loaidats as $loaidat){
            $result['message'] .= '<option value="'.$loaidat->maloaidat.'" '.($loaidat->maloaidat == $model->maloaidat ? 'selected' : '').'>'.$loaidat->loaidat.'</option>';
        }
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
        $result['message'] .= '<label class="control-label">Giá vị trí I<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_giavt1" id="edit_giavt1" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->giavt1 . '" ' . '/>';

        $result['message'] .= '</div></div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Giá vị trí II<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_giavt2" id="edit_giavt2" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->giavt2 . '" ' . '/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Giá vị trí III<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_giavt3" id="edit_giavt3" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->giavt3 . '" ' . '/>';

        $result['message'] .= '</div></div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Giá vị trí IV<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_giavt4" id="edit_giavt4" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->giavt4 . '" ' . '/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Giá vị trí V<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_giavt5" id="edit_giavt5" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->giavt5 . '" ' . '/>';
        $result['message'] .= '</div></div>';
        $result['message'] .= '<div class="col-md-6">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Hệ số K<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_hesok" id="edit_hesok" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->hesok . '" ' . '/>';

        $result['message'] .= '</div></div>';
        $result['message'] .= '</div>';

        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Số quyết định<span class="require">*</span></label>';
        $result['message'] .= '<input type="text" name="edit_soqd" id="edit_soqd" class="form-control" value="'.$model->soqd.'">';
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
            $model = GiaDatDiaBan::where('id',$inputs['edit_id'])->first();
            $model->district = $inputs['edit_district'];
            $model->nam = $inputs['edit_nam'];
            $model->maloaidat = $inputs['edit_maloaidat'];
            $model->khuvuc = $inputs['edit_khuvuc'];
            $model->mota = $inputs['edit_mota'];
            $model->giavt1 = chkDbl($inputs['edit_giavt1']);
            $model->giavt2 = chkDbl($inputs['edit_giavt2']);
            $model->giavt3 = chkDbl($inputs['edit_giavt3']);
            $model->giavt4 = chkDbl($inputs['edit_giavt4']);
            $model->giavt5 = chkDbl($inputs['edit_giavt5']);
            $model->hesok = chkDbl($inputs['edit_hesok']);
            $model->soqd = $inputs['edit_soqd'];
            $model->save();


            return redirect('giadatdiaban?&nam='.$inputs['edit_nam'].'&district='.$inputs['edit_district'].'&maloaidat='.$inputs['edit_maloaidat']);
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = new GiaDatDiaBan();
            $model->district = $inputs['add_district'];
            $model->nam = $inputs['add_nam'];
            $model->maloaidat = $inputs['add_maloaidat'];
            $model->khuvuc = $inputs['add_khuvuc'];
            $model->mota = $inputs['add_mota'];
            $model->giavt1 = chkDbl($inputs['add_giavt1']);
            $model->giavt2 = chkDbl($inputs['add_giavt2']);
            $model->giavt3 = chkDbl($inputs['add_giavt3']);
            $model->giavt4 = chkDbl($inputs['add_giavt4']);
            $model->giavt5 = chkDbl($inputs['add_giavt5']);
            $model->hesok = chkDbl($inputs['add_hesok']);
            $model->soqd = $inputs['add_soqd'];
            $model->trangthai = 'CHT';
            $model->save();

            return redirect('giadatdiaban?&nam='.$inputs['add_nam'].'&district='.$inputs['add_district'].'&maloaidat='.$inputs['add_maloaidat']);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['congbo_id'];
            $model = GiaDatDiaBan::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();

            return redirect('giadatdiaban?&nam='.$model->nam.'&district='.$model->district.'&maloaidat='.$model->maloaidat);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huycongbo_id'];
            $model = GiaDatDiaBan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('giadatdiaban?&nam='.$model->nam.'&district='.$model->district.'&maloaidat='.$model->maloaidat);
        }else
            return view('errors.notlogin');
    }
    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['hoanthanh_id'];
            $model = GiaDatDiaBan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('giadatdiaban?&nam='.$model->nam.'&district='.$model->district.'&maloaidat='.$model->maloaidat);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['huyhoanthanh_id'];
            $model = GiaDatDiaBan::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();

            return redirect('giadatdiaban?&nam='.$model->nam.'&district='.$model->district.'&maloaidat='.$model->maloaidat);
        }else
            return view('errors.notlogin');
    }

    function checkmulti(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $model = GiaDatDiaBan::where('district',$inputs['districtcheck'])
                ->where('nam',$inputs['namcheck']);
            if($inputs['maloaidatcheck'] != 'All')
                $model = $model->where('maloaidat',$inputs['maloaidatcheck']);

            $model = $model->update(['trangthai' => $inputs['trangthaicheck']]);

            return redirect('giadatdiaban?&nam='.$inputs['namcheck'].'&district='.$inputs['districtcheck'].'&maloaidat='.$inputs['maloaidatcheck']);
        }else
            return view('errors.notlogin');
    }

    function bcgiadatdiaban(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : 'All';
            $inputs['maloaidat'] = isset($inputs['maloaidat']) ? $inputs['maloaidat'] : 'All';
            $inputs['khuvuc'] = isset($inputs['khuvuc']) ? $inputs['khuvuc'] : '';
            $inputs['mota'] = isset($inputs['mota']) ? $inputs['mota'] : '';
            $loaidats = GiaDatDiaBanDm::all();
            $diaban = DiaBanHd::all();

            $model  = GiaDatDiaBan::join('diabanhd','diabanhd.district','=','giadatdiaban.district')
                ->join('giadatdiabandm','giadatdiaban.maloaidat','=','giadatdiabandm.maloaidat')
                ->select('giadatdiaban.*','diabanhd.diaban','giadatdiabandm.loaidat');
            if($inputs['nam'] != 'all')
                $model = $model->where('giadatdiaban.nam',$inputs['nam']);
            if($inputs['district'] !='All') {
                $model = $model->where('giadatdiaban.district', $inputs['district']);
                $diaban = DiaBanHd::where('district',$inputs['district'])
                    ->where('level','H')
                    ->first();
            }
            if($inputs['maloaidat'] != 'All') {
                $model = $model->where('giadatdiaban.maloaidat', $inputs['maloaidat']);
                $loaidats = GiaDatDiaBanDm::where('maloaidat',$inputs['maloaidat'])
                    ->first();
            }
            if($inputs['khuvuc'] != '')
                $model = $model->where('giadatdiaban.khuvuc','like', '%'.$inputs['khuvuc'].'%');
            if($inputs['mota'] != '')
                $model = $model->where('giadatdiaban.mota','like', '%'.$inputs['mota'].'%');
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
            return view('manage.dinhgia.giadatdiaban.reports.BcGiaDatDiaBan')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('loaidats',$loaidats)
                ->with('diaban',$diaban)
                ->with('pageTitle','Báo cáo giá đất theo địa bàn');

        } else
            return view('errors.notlogin');
    }
}
