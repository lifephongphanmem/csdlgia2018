<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\DmQdGiaDat;
use App\GiaCacLoaiDat;
use App\GiaCacLoaiDatH;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Session;

class GiaCacLoaiDatController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model_diaban = DiaBanHd::where('level','H')->get();
            /*if(session('admin')->level == 'X')
                $inputs['district'] = session('admin')->district;
            else*/
                $inputs['district'] = isset($inputs['district']) ? $inputs['district'] : $model_diaban->first()->district;

            $model = GiaCacLoaiDat::where('mahuyen',$inputs['district'])->get();

            $model_quyetdinh = DmQdGiaDat::all();
            /*foreach($model as $ct){
                $ct->b_xoa = true; //mặc định đc xóa
                //kiểm tra nếu mã số dc sử dụng thì ko dc xóa
                if($model->where('magoc',$ct->maso)->count() > 0)
                    $ct->b_xoa = false;
            }*/

            return view('manage.dinhgia.giacldat.thongtinql.index')
                ->with('model',$model)
                ->with('model_diaban',$model_diaban)
                ->with('model_quyetdinh',$model_quyetdinh)
                ->with('district',$inputs['district'])
                ->with('pageTitle','Thông tin quản lý giá các loại đất');

        }else
            return view('errors.notlogin');
    }

    public function addlv1(Request $request){
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
        $inputs['macapdo'] = getDbl(GiaCacLoaiDat::where('mahuyen',$inputs['mahuyen'])->max('macapdo')) + 1;
        $inputs['capdo'] = 1;
        $inputs['maso'] = $inputs['macapdo'];
        $model = new GiaCacLoaiDat();
        $model->create($inputs);
        $result['message'] = 'Thêm mới thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function editvitri(Request $request){
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
        $model = GiaCacLoaiDat::findOrFail($id);
        $modelqd = DmQdGiaDat::all();

        $sub_node = GiaCacLoaiDat::where('magoc',$model->maso)->count()>0? true:false;

        $result['message'] = '<div class="modal-body" id="edit_node">';
        $result['message'] .= '<div class="row">';
        $result['message'] .= '<div class="col-md-12">';
        $result['message'] .= '<div class="form-group">';
        $result['message'] .= '<label class="control-label">Tên khu vực / vị trí<span class="require">*</span></label>';
        $result['message'] .= '<textarea name="edit_vitri" id="edit_vitri" class="form-control">'.$model->vitri;
        $result['message'] .= '</textarea></div></div>';
        $result['message'] .= '</div>';
        if($sub_node == false) {
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
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Căn cứ quyết định</label>';
            $result['message'] .= '<select name="edit_soquyetdinh" id="edit_soquyetdinh" class="form-control">';
            $result['message'] .= '<option value="">--Chọn quyết định thay đổi giá--</option>';
            foreach($modelqd as $ct){
                $result['message'] .= '<option value="'.$ct->soquyetdinh.'"'.($ct->soquyetdinh==$model->soqd?' selected':'').'>'. $ct->mota.'</option>';
            }
            $result['message'] .= '</select></div></div>';
            $result['message'] .= '</div>';
        }
        $result['message'] .= '<input type="hidden" name="idedit" id="idedit" class="form-control" value="' . $model->id . '"/>';




        $result['message'] .= '</div>';
        $result['status'] = 'success';


        die(json_encode($result));
    }

    public function updatevitri(Request $request){
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
        $id = $inputs['id'];
        $model = GiaCacLoaiDat::findOrFail($id);
        $inputs['giavt1'] = isset($inputs['giavt1']) ? getDoubleToDb($inputs['giavt1']) : 0;
        $inputs['giavt2'] = isset($inputs['giavt2']) ? getDoubleToDb($inputs['giavt2']) : 0;
        $inputs['giavt3'] = isset($inputs['giavt3']) ? getDoubleToDb($inputs['giavt3']) : 0;
        $inputs['giavt4'] = isset($inputs['giavt4']) ? getDoubleToDb($inputs['giavt4']) : 0;
        $inputs['username'] = session('admin')->name.'('.session('admin')->username.')' ;
        $inputs['thaotac'] = 'Cập nhật giá đất';
        $model->update($inputs);
        $arrayh = $model->toArray();
        unset($arrayh['id']);
        $modelh = GiaCacLoaiDatH::create($arrayh);
        $result['message'] = 'Cập nhật thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function storechirld(Request $request){
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
        $id = $inputs['id'];
        $model = GiaCacLoaiDat::findOrFail($id);
        $inputs['capdo'] = $model->capdo+1;

        $inputs['macapdo'] = getDbl(GiaCacLoaiDat::where('mahuyen',$inputs['mahuyen'])->where('capdo',($model->capdo +1))->where('magoc',$model->maso)->get()->max('macapdo'))+ 1;
        if($model->capdo == 1)
            $inputs['hienthi'] = $model->vitri;
        else
            $inputs['hienthi'] = $model->hienthi.' - '.$model->vitri;

        $inputs['maso'] = $model->maso.'.'.$inputs['macapdo'];
        $inputs['magoc'] = $model->maso;
        //$inputs['macapdo'] = $model
        unset($inputs['id']);
        $model->create($inputs);
        $result['message'] = 'Cập nhật thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaCacLoaiDat::findOrFail($id);
            $modelct = GiaCacLoaiDat::where('maso','like',$model->maso.'%')->where('mahuyen',$model->mahuyen)->delete();
            //$model->delete();
            return redirect('thongtingiacacloaidat?&district='.$model->mahuyen);

        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['soqd'] = isset($inputs['soqd']) ? $inputs['soqd'] : '';
            $modelqdgiadat = DmQdGiaDat::all();

            $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : DiaBanHd::where('level','H')->first()->district;
            $modeldiaban = DiaBanHd::where('level','H')->get();

            $inputs['vitri'] = isset($inputs['vitri']) ? $inputs['vitri'] : '';

            $model = new GiaCacLoaiDat();
            if($inputs['mahuyen']!= '')
                $model = $model->where('mahuyen',$inputs['mahuyen']);
            if($inputs['soqd'] != '')
                $model = $model->where('soqd',$inputs['soqd']);

            if($inputs['vitri'] != '')
                $model = $model->where('vitri','like','%'.$inputs['vitri'].'%');
            $model = $model->get();
            return view('manage.dinhgia.giacldat.timkiem.index')
                ->with('modelqdgiadat',$modelqdgiadat)
                ->with('soqd',$inputs['soqd'])
                ->with('mahuyen',$inputs['mahuyen'])
                ->with('modeldiaban',$modeldiaban)
                ->with('vitri',$inputs['vitri'])
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin giá các loại đất');

        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model_diaban = DiaBanHd::where('level','H')
                ->where('district',$inputs['district'])
                ->first();

            $model = GiaCacLoaiDat::where('mahuyen',$inputs['district'])->get();

            return view('manage.dinhgia.giacldat.reports.print')
                ->with('model',$model)
                ->with('model_diaban',$model_diaban)
                ->with('pageTitle','Thông tin quản lý giá các loại đất');

        }else
            return view('errors.notlogin');
    }

    public function upgrade(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaCacLoaiDat::where('mahuyen',$inputs['district'])
                ->where('capdo',$inputs['capdo'])->get();
            foreach($model as $tt){
                $m_search = GiaCacLoaiDat::where('maso',$tt->magoc)->first();
                $m_up = GiaCacLoaiDat::where('id',$tt->id)
                    ->update(['hienthi' => $m_search->vitri]);
            }

            return redirect('hongtingiacacloaidat?&&district='.$inputs['district']);

        }else
            return view('errors.notlogin');
    }

    public function edithesok(Request $request){
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
        $model = GiaCacLoaiDat::findOrFail($id);
        $modelqd = DmQdGiaDat::all();
        $sub_node = GiaCacLoaiDat::where('magoc',$model->maso)->count()>0? true:false;
        if($sub_node == false) {
            $result['message'] = '<div class="modal-body" id="edit_hesok">';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Tên khu vực / vị trí: </label>';
            $result['message'] .= '<label class="control-label">'.$model->vitri.'</label>';
            $result['message'] .= '</div></div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Giá vị trí I: </label>';
            $result['message'] .= '<label class="control-label" style="font-weight: bold">&nbsp;'.$model->giavt1.'</label>';

            $result['message'] .= '</div></div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Giá vị trí II: </label>';
            $result['message'] .= '<label class="control-label" style="font-weight: bold">&nbsp;'.$model->giavt2.'</label>';
            $result['message'] .= '</div></div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Giá vị trí III: </label>';
            $result['message'] .= '<label class="control-label" style="font-weight: bold">&nbsp;'.$model->giavt3.'</label>';

            $result['message'] .= '</div></div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Giá vị trí IV: </label>';
            $result['message'] .= '<label class="control-label" style="font-weight: bold">&nbsp;'.$model->giavt4.'</label>';
            $result['message'] .= '</div></div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Hệ số K<span class="require">*</span></label>';
            $result['message'] .= '<input type="text" name="editvl_hesok" id="editvl_hesok" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" maxlength="2" value="' . $model->hesok . '" ' . '/>';
            $result['message'] .= '</div></div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Căn cứ quyết định</label>';
            $result['message'] .= '<select name="edit_soquyetdinh" id="edit_soquyetdinh" class="form-control">';
            $result['message'] .= '<option value="">--Chọn quyết định thay đổi giá--</option>';
            foreach($modelqd as $ct){
                $result['message'] .= '<option value="'.$ct->soquyetdinh.'"'.($ct->soquyetdinh==$model->soqd?' selected':'').'>'. $ct->mota.'</option>';
            }
            $result['message'] .= '</select></div></div>';
            $result['message'] .= '</div>';
        }else{
            $result['message'] = '<div class="modal-body" id="edit_hesok">';
            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Không có giá trị nhập hệ số K<span class="require">*</span></label>';
            $result['message'] .= '</div></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
        }
        $result['message'] .= '<input type="hidden" name="idedithesok" id="idedithesok" class="form-control" value="' . $model->id . '"/>';




        $result['message'] .= '</div>';
        $result['status'] = 'success';


        die(json_encode($result));
    }

    public function updatehesok(Request $request){
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
        if(isset($inputs['hesok'])) {
            $id = $inputs['id'];
            $model = GiaCacLoaiDat::findOrFail($id);
            $inputs['hesok'] = str_replace(',', '', $inputs['hesok']);
            $inputs['giavt1'] = $model->giavt1/$model->hesok * $inputs['hesok'];
            $inputs['giavt2'] = $model->giavt2/$model->hesok * $inputs['hesok'];
            $inputs['giavt3'] = $model->giavt3/$model->hesok * $inputs['hesok'];
            $inputs['giavt4'] = $model->giavt4/$model->hesok * $inputs['hesok'];
            $inputs['username'] = session('admin')->name.'('.session('admin')->username.')';
            $inputs['thaotac'] = 'Điều chỉnh hệ số K giá đất';
            $model->update($inputs);
            $arrayh = $model->toArray();
            unset($arrayh['id']);
            $modelh = GiaCacLoaiDatH::create($arrayh);
            $result['message'] = 'Cập nhật thành công.';
            $result['status'] = 'success';
        }else{
            $result = array(
                'status' => 'fail',
                'message' => 'Không tồn tại giá trị hệ số K',
            );
        }
        die(json_encode($result));
    }

    public function showhis(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelh = GiaCacLoaiDatH::join('diabanhd','giacacloaidath.mahuyen','=','diabanhd.district')
                ->where('diabanhd.level','H')
                ->where('giacacloaidath.maso',$inputs['maso'])
                ->select('giacacloaidath.*','diabanhd.diaban')
                ->get();
            $model = GiaCacLoaiDat::where('maso',$inputs['maso'])
                ->first();

            return view('manage.dinhgia.giacldat.history.index')
                ->with('model',$model)
                ->with('modelh',$modelh)
                ->with('pageTitle','Thông tin quản lý giá các loại đất lịch sử');

        }else
            return view('errors.notlogin');
    }

}
