<?php

namespace App\Http\Controllers;

use App\ThamDinhGia;
use App\ThamDinhGiaCt;
use App\ThamDinhGiaCtDf;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThamDinhGiaController extends Controller
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
                    $modeldv = Town::where('mahuyen',$mahuyen)->get();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
            }


            $model = ThamDinhGia::whereYear('thoidiem',$inputs['nam'])
                ->where('maxa',$inputs['maxa']);
            if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);

            $model=$model->get();
            return view('manage.thamdinhgia.index')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
                ->with('nam',$inputs['nam'])
                ->with('maxa',$inputs['maxa'])
                ->with('trangthai',$inputs['trangthai'])
                ->with('pageTitle','Thông tin hồ sơ thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();

            if(session('admin')->level == 'X')
                $inputs['maxa'] = session('admin')->maxa;
            $modelct = ThamDinhGiaCtDf::where('maxa',$inputs['maxa'])
                ->get();
            return view('manage.thamdinhgia.create')
                ->with('maxa',$inputs['maxa'])
                ->with('modelct',$modelct)
                ->with('pageTitle','Thêm mới hồ sơ thẩm định giá');

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
            $model = new ThamDinhGia();
            if($model->create($inputs)){
                $modelctdf = ThamDinhGiaCtDf::where('maxa',$inputs['maxa']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new ThamDinhGiaCt();
                    $modelct->tents = $ctdf->tents;
                    $modelct->dacdiempl= $ctdf->dacdiempl;
                    $modelct->thongsokt = $ctdf->thongsokt;
                    $modelct->nguongoc = $ctdf->nguongoc;
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
            return redirect('thamdinhgia?&maxa='.$inputs['maxa'].'&trangthai='.$inputs['trangthai']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = ThamDinhGia::findOrFail($id);
            $modelct = ThamDinhGiaCt::where('mahs',$model->mahs)->get();
            return view('manage.thamdinhgia.edit')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Chỉnh sửa thông tin hồ sơ thẩm định giá');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['thoidiem'] = getDateToDb($inputs['thoidiem']);
            $inputs['thoihan'] = getDateToDb($inputs['thoihan']);
            $inputs['quy'] = Thang2Quy(getMonth($inputs['thoidiem']));
            $model = ThamDinhGia::findOrFail($id);
            $model->update($inputs);
            return redirect('thamdinhgia?&maxa='.$inputs['maxa'].'&trangthai='.$model->trangthai);

        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = ThamDinhGia::findOrFail($id);
            $maxa = $model->maxa;
            $modelct = ThamDinhGiaCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thamdinhgia?&maxa='.$maxa.'&trangthai=CHT');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = ThamDinhGia::findOrFail($id);
            $modelct = ThamDinhGiaCt::where('mahs',$model->mahs)->get();
            return view('manage.thamdinhgia.show')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Thông tin hồ sơ thẩm định giá chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tents'] = isset($inputs['tents']) ? $inputs['tents'] : '';
            $model = ThamDinhGiaCt::join('thamdinhgia','thamdinhgiact.mahs','=','thamdinhgia.mahs')
                ->select('thamdinhgiact.*','thamdinhgia.thoidiem','thamdinhgia.thuevat','thamdinhgia.sotbkl',
                'thamdinhgia.thoihan','thamdinhgia.ppthamdinh')
                ->whereYear('thamdinhgia.thoidiem',$inputs['nam'])
                ->whereIn('thamdinhgia.trangthai',['HT','CB']);
            if($inputs['tents'] != '')
                $model = $model->where('thamdinhgiact.tents','like','%'.$inputs['tents'].'%');
            $model = $model->get();
            return view('manage.thamdinhgia.timkiem.index')
                ->with('nam',$inputs['nam'])
                ->with('tents',$inputs['tents'])
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin thẩm định giá tài sản NN');
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


            $model = ThamDinhGiaCt::where('thamdinhgiact.id',$inputs['id'])
                ->join('thamdinhgia','thamdinhgiact.mahs','=','thamdinhgia.mahs')
                ->select('thamdinhgiact.*','thamdinhgia.thoidiem','thamdinhgia.thuevat','thamdinhgia.sotbkl',
                    'thamdinhgia.thoihan','thamdinhgia.ppthamdinh')

                ->first();
            $result['message'] = '<div class="modal-body" id="tttsedit">';


            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Tên tài sản<span class="require">*</span></label>';
            $result['message'] .= '<div><p>'.$model->tents.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đặc điểm pháp lý<span class="require">*</span></label>';
            $result['message'] .= '<div><p>'.$model->dacdiempl.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Thông số kỹ thuật<span class="require">*</span></label>';
            $result['message'] .= '<div><p>'.$model->thongsokt.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Nguồn gốc<span class="require">*</span></label>';
            $result['message'] .= '<div><p>'.$model->nguongoc.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';

            $result['message'] .= '<div class="row">';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Đơn vị tính<span class="require">*</span></label>';
            $result['message'] .= '<div><p>'.$model->dvt.'</p></div>';
            $result['message'] .= '</div>';
            $result['message'] .= '</div>';
            $result['message'] .= '<div class="col-md-6">';
            $result['message'] .= '<div class="form-group"><label for="selGender" class="control-label">Số lượng<span class="require">*</span></label>';
            $result['message'] .= '<div><p style="text-align: right;font-weight: bold">'.$model->sl.'</p></div>';
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

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = ThamDinhGia::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thamdinhgia?&trangthai=HT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = ThamDinhGia::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thamdinhgia?&trangthai=HHT&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = ThamDinhGia::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thamdinhgia?&trangthai=CB&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }
}
