<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\DmQdGiaDat;
use App\GiaCacLoaiDat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Session;

class GiaCacLoaiDatController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            if(session('admin')->level == 'T' || session('admin') == 'H')
                $districtdf = DiaBanHd::where('level', 'H')->first()->district;
            else
                $districtdf = session('admin')->district;
            $inputs['district'] = isset($inputs['district'])? $inputs['district'] : $districtdf;

            $model = GiaCacLoaiDat::where('mahuyen',$inputs['district'])->get();
            $model_diaban = DiaBanHd::where('level','H')->get();
            $model_quyetdinh = DmQdGiaDat::all();
            foreach($model as $ct){
                $ct->b_xoa = true; //mặc định đc xóa
                //kiểm tra nếu mã số dc sử dụng thì ko dc xóa
                if($model->where('magoc',$ct->maso)->count() > 0)
                    $ct->b_xoa = false;
            }
            return view('manage.dinhgia.giacldat.thongtinql.index')
                ->with('model',$model)
                ->with('model_diaban',$model_diaban)
                ->with('model_quyetdinh',$model_quyetdinh)
                ->with('district',$inputs['district'])
                ->with('url','/giadat/vitri/')
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
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group">';
            $result['message'] .= '<label class="control-label">Giá đất<span class="require">*</span></label>';
            $result['message'] .= '<input type="text" name="edit_giadat" id="edit_giadat" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold" value="' . $model->giadat . '" ' . '/>';
            $result['message'] .= '<input type="hidden" name="idedit" id="idedit" class="form-control" value="' . $model->id . '"/>';
            $result['message'] .= '</div></div>';
            $result['message'] .= '</div>';
        }

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
        $inputs['giadat'] = getDbl($inputs['giadat']);
        $model->update($inputs);
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

        $inputs['macapdo'] = getDbl(GiaCacLoaiDat::where('mahuyen',$inputs['mahuyen'])->where('capdo',($model->capdo +1))->where('magoc',$model->maso)->max('macapdo')) + 1;
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
            $model->delete();
            return redirect('thongtingiacacloaidat');

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

}
