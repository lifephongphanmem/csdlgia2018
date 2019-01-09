<?php

namespace App\Http\Controllers;

use App\DmCtThamDinhGiaHh;
use App\DmThamDinhGiaHh;
use App\ThamDinhGiaHh;
use App\ThamDinhGiaHhCt;
use App\ThamDinhGiaHhCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThamDinhGiaHhController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

            if(session('admin')->level == 'X') {
                $modeldv = Town::where('maxa',session('admin')->maxa)->get();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
                $inputs['maxa'] = session('admin')->maxa;
            }else {
                if(session('admin')->level == 'T')
                    $modeldv = Town::all();
                else
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
            }


            $model = ThamDinhGiaHh::join('dmthamdinhgiahh','dmthamdinhgiahh.manhom','=','thamdinhgiahh.manhom')
                ->select('thamdinhgiahh.*','dmthamdinhgiahh.tennhom')
                ->whereYear('thamdinhgiahh.thoidiem',$inputs['nam'])
                ->where('thamdinhgiahh.maxa',$inputs['maxa']);
            if($inputs['trangthai'] != '')
                $model = $model->where('thamdinhgiahh.trangthai',$inputs['trangthai']);

            $model=$model->get();
            $m_nhomthamdinhgiahh = DmThamDinhGiaHh::where('theodoi','TD')
                ->get();
            return view('manage.thamdinhgiahh.index')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('inputs',$inputs)
                ->with('m_nhomthamdinhgiahh',$m_nhomthamdinhgiahh)
                ->with('pageTitle','Thông tin hồ sơ thẩm định giá hàng hóa');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(session('admin')->level == 'X')
                $inputs['getmaxa'] = session('admin')->maxa;

            $modelctcheck = ThamDinhGiaHhCtDf::where('maxa',$inputs['getmaxa'])
                ->where('manhom',$inputs['manhom'])
                ->get();
            if(count($modelctcheck)>0)
                $modelct = $modelctcheck;
            else{
                $modeldm = DmCtThamDinhGiaHh::where('manhom',$inputs['manhom'])
                    ->where('theodoi','TD')
                    ->get();
                foreach($modeldm as $dm){
                    $modelct = new ThamDinhGiaHhCtDf();
                    $modelct->manhom = $dm->manhom;
                    $modelct->nhomhh = $dm->nhomhh;
                    $modelct->tenhh = $dm->tenhh;
                    $modelct->qccl = $dm->qccl;
                    $modelct->dvt = $dm->dvt;
                    $modelct->maxa = $inputs['getmaxa'];

                    $modelct->save();
                }
            }
            $modelnhom = DmThamDinhGiaHh::where('manhom',$inputs['manhom'])->first();
            return view('manage.thamdinhgiahh.create')
                ->with('inputs',$inputs)
                ->with('modelct',$modelct)
                ->with('modelnhom',$modelnhom)
                ->with('pageTitle','Thêm mới hồ sơ thẩm định giá hàng hóa');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['thoidiem'] = getDateToDb($inputs['thoidiem']);
            $inputs['thoihan'] = getDateToDb($inputs['thoihan']);
            $inputs['quy'] = Thang2Quy(getMonth($inputs['thoidiem']));
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $inputs['trangthai'] = 'CHT';
            $model = new ThamDinhGiaHh();
            if($model->create($inputs)){
                $modelctdf = ThamDinhGiaHhCtDf::where('maxa',$inputs['maxa'])
                    ->where('manhom',$inputs['manhom']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new ThamDinhGiaHhCt();
                    $modelct->manhom = $ctdf->manhom;
                    $modelct->nhomhh= $ctdf->nhomhh;
                    $modelct->tenhh = $ctdf->tenhh;
                    $modelct->qccl = $ctdf->qccl;
                    $modelct->dvt = $ctdf->dvt;
                    $modelct->sl = $ctdf->sl;
                    $modelct->nguyengiadenghi = $ctdf->nguyengiadenghi;
                    $modelct->giadenghi = $ctdf->giadenghi;
                    $modelct->nguyengiathamdinh = $ctdf->nguyengiathamdinh;
                    $modelct->giaththamdinh = $ctdf->giaththamdinh;
                    $modelct->giakththamdinh = $ctdf->giakththamdinh;
                    $modelct->giatritstd = $ctdf->giatritstd;
                    $modelct->gc = $ctdf->gc;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('thamdinhgiahanghoa?&maxa='.$inputs['maxa'].'&trangthai='.$inputs['trangthai']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = ThamDinhGiaHh::findOrFail($id);
            $modelct = ThamDinhGiaHhCt::where('mahs',$model->mahs)->get();
            $modelnhom = DmThamDinhGiaHh::where('manhom',$model->manhom)
                ->first();
            return view('manage.thamdinhgiahh.edit')
                ->with('model',$model)
                ->with('modelnhom',$modelnhom)
                ->with('modelct',$modelct)
                ->with('pageTitle','Chỉnh sửa thông tin hồ sơ thẩm định giá hàng hóa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['thoidiem'] = getDateToDb($inputs['thoidiem']);
            $inputs['thoihan'] = getDateToDb($inputs['thoihan']);
            $inputs['quy'] = Thang2Quy(getMonth($inputs['thoidiem']));
            $model = ThamDinhGiaHh::findOrFail($id);
            $model->update($inputs);
            return redirect('thamdinhgiahanghoa?&maxa='.$model->maxa.'&trangthai='.$model->trangthai);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = ThamDinhGiaHh::findOrFail($id);
            $modelct = ThamDinhGiaHhCt::where('mahs',$model->mahs)->get();
            $modelnhom = DmThamDinhGiaHh::where('manhom',$model->manhom)
                ->first();
            return view('manage.thamdinhgiahh.show')
                ->with('model',$model)
                ->with('modelnhom',$modelnhom)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ thẩm định giá hàng hóa');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = ThamDinhGiaHh::findOrFail($id);
            $maxa = $model->maxa;
            $modelct = ThamDinhGiaHhCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thamdinhgiahanghoa?&maxa='.$maxa.'&trangthai=CHT');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = ThamDinhGiaHh::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thamdinhgiahanghoa?&trangthai=HT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = ThamDinhGiaHh::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thamdinhgiahanghoa?&trangthai=HHT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = ThamDinhGiaHh::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thamdinhgiahanghoa?&trangthai=CB&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : '';
            $model = ThamDinhGiaHhCt::join('thamdinhgiahh','thamdinhgiahhct.mahs','=','thamdinhgiahh.mahs')
                ->join('dmthamdinhgiahh','thamdinhgiahh.manhom','=','dmthamdinhgiahh.manhom')
                ->select('thamdinhgiahhct.*','thamdinhgiahh.thoidiem','thamdinhgiahh.thuevat','thamdinhgiahh.sotbkl',
                    'thamdinhgiahh.thoihan','thamdinhgiahh.ppthamdinh','dmthamdinhgiahh.tennhom')
                ->whereYear('thamdinhgiahh.thoidiem',$inputs['nam'])
                ->whereIn('thamdinhgiahh.trangthai',['HT','CB']);
            if($inputs['tenhh'] != '')
                $model = $model->where('thamdinhgiahhct.tenhh','like','%'.$inputs['tenhh'].'%');
            $model = $model->get();
            $modelnhom = DmThamDinhGiaHh::where('theodoi','TD')->get();
            return view('manage.thamdinhgiahh.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('modelnhom',$modelnhom)
                ->with('pageTitle','Tìm kiếm thông tin thẩm định giá hàng hóa');
        }else
            return view('errors.notlogin');
    }

    public function xemtttk(Request $request){
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

            $model = ThamDinhGiaHhCt::where('thamdinhgiahhct.id',$inputs['id'])
                ->join('thamdinhgiahh','thamdinhgiahhct.mahs','=','thamdinhgiahh.mahs')
                ->join('dmthamdinhgiahh','dmthamdinhgiahh.manhom','=','thamdinhgiahh.manhom')
                ->select('thamdinhgiahhct.*','thamdinhgiahh.thoidiem','thamdinhgiahh.thuevat','thamdinhgiahh.sotbkl',
                    'thamdinhgiahh.thoihan','thamdinhgiahh.ppthamdinh','dmthamdinhgiahh.tennhom')

                ->first();
            $result['message'] = '<div class="modal-body" id="tttsedit">';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nhóm hàng hóa<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="font-weight: bold;text-transform: uppercase;color: blue;">'.$model->tennhom.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Loại hàng hóa<span class="require">*</span></label>';
            $result['message'] .= '<div><p  style="font-weight: bold;text-transform: uppercase;color: blue;">'.$model->nhomhh.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tên hàng hóa<span class="require">*</span></label>';
            $result['message'] .= '<div><p  style="font-weight: bold;color: blue;">'.$model->tenhh.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị tính<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="font-weight: bold;text-align: center">'.$model->dvt.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số lượng<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="text-align: center;font-weight: bold;">'.$model->sl.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá đề nghị<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="text-align: right;font-weight: bold">'.number_format($model->nguyengiadenghi).'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị đề nghị<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="text-align: right;font-weight: bold">'.number_format($model->giadenghi).'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn giá thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="text-align: right;font-weight: bold">'.number_format($model->nguyengiathamdinh).'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Giá trị tài sản thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="text-align: right;font-weight: bold">'.number_format($model->giatritstd).'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-12">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Ghi chú<span class="require">*</span></label>';
            $result['message'] .= '<div><label>'.$model->gc.'</label></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thời điểm thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="font-weight: bold">'.getDayVn($model->thoidiem).'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thuế VAT<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="font-weight: bold">'.$model->thuevat.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số thông báo kết luận<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="font-weight: bold">'.$model->sotbkl.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Phương pháp thẩm định<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="font-weight: bold">'.$model->ppthamdinh.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thời hạn<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="font-weight: bold">'.getDayVn($model->thoihan).'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

}
