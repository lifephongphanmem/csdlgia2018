<?php

namespace App\Http\Controllers\manage\thamdinhgia;

use App\DiaBanHd;
use App\District;
use App\DmHangHoa;
use App\Model\manage\thamdinhgia\ThamDinhGia;
use App\Model\manage\thamdinhgia\ThamDinhGiaCt;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class ThamDinhGiaController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldvql = District::all();
            if(session('admin')->level == 'X') {
                $modeldv = Town::where('maxa',session('admin')->maxa)->get();
                $inputs['maxa'] = session('admin')->maxa;
                $inputs['mahuyen'] = session('admin')->mahuyen;
            }else {
                if(session('admin')->level == 'T') {
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldvql->first()->mahuyen;
                    $modeldv = Town::where('mahuyen',$inputs['mahuyen'])->get();
                }else {
                    $inputs['mahuyen'] = session('admin')->mahuyen;
                    $modeldv = Town::where('mahuyen', session('admin')->mahuyen)->get();
                }
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : (count($modeldv)> 0 ? $modeldv->first()->maxa : '');
            }

            $model = ThamDinhGia::whereYear('thoidiem',$inputs['nam'])
                ->where('maxa',$inputs['maxa']);
            /*if($inputs['trangthai'] != '')
                $model = $model->where('trangthai',$inputs['trangthai']);*/

            $model=$model->get();
            return view('manage.thamdinhgia.index')
                ->with('model',$model)
                ->with('modeldvql',$modeldvql)
                ->with('modeldv',$modeldv)
                ->with('inputs',$inputs)
                //->with('maxa',$inputs['maxa'])
                //->with('trangthai',$inputs['trangthai'])
                ->with('pageTitle','Thông tin hồ sơ thẩm định giá');

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $del = ThamDinhGiaCt::where('trangthai','CXD')->delete();
            if(session('admin')->level == 'X')
                $inputs['maxa'] = session('admin')->maxa;
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $modelct = ThamDinhGiaCt::where('mahs',$inputs['mahs'])
                ->get();
            $modeldv = Town::where('maxa',$inputs['maxa'])
                ->first();
            $modeldb = DiaBanHd::where('district',$modeldv->district)
                ->where('level','H')
                ->first();
            return view('manage.thamdinhgia.create')
                ->with('modeldv',$modeldv)
                ->with('modelct',$modelct)
                ->with('modeldb',$modeldb)
                ->with('inputs',$inputs)
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
            $inputs['trangthai'] = 'CHT';
            $inputs['congbo'] = 'CCB';
            $inputs['thaotac'] = session('admin')->username.' thêm mới - ' . getDateTime(Carbon::now()->toDateTimeString());
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/thamdinhgia/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2'])){
                $ipf2 = $request->file('ipf2');
                $inputs['ipt2'] = $inputs['mahs'] .'&2.'.$ipf2->getClientOriginalExtension();
                $ipf2->move(public_path() . '/data/thamdinhgia/', $inputs['ipt2']);
                $inputs['ipf2']= $inputs['ipt2'];
            }
            if(isset($inputs['ipf3'])){
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/thamdinhgia/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4'])){
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'].'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/thamdinhgia/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5'])){
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/thamdinhgia/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }
            $model = new ThamDinhGia();
            if($model->create($inputs)){
                $modelct = ThamDinhGiaCt::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('thamdinhgia?&maxa='.$inputs['maxa']);

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = ThamDinhGia::findOrFail($id);
            $modelct = ThamDinhGiaCt::where('mahs',$model->mahs)->get();
            $modeldv = Town::where('maxa',$model->maxa)
                ->first();
            return view('manage.thamdinhgia.edit')
                ->with('model',$model)
                ->with('modeldv',$modeldv)
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
            $inputs['thaotac'] = session('admin')->username.' chỉnh sửa - ' . getDateTime(Carbon::now()->toDateTimeString());
            $model = ThamDinhGia::findOrFail($id);
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/thamdinhgia/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2'])){
                $ipf2 = $request->file('ipf2');
                $inputs['ipt2'] = $inputs['mahs'] .'&2.'.$ipf2->getClientOriginalExtension();
                $ipf2->move(public_path() . '/data/thamdinhgia/', $inputs['ipt2']);
                $inputs['ipf2']= $inputs['ipt2'];
            }
            if(isset($inputs['ipf3'])){
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/thamdinhgia/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4'])){
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'].'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/thamdinhgia/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5'])){
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/thamdinhgia/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }
            if($model->update($inputs))
                $modelct = ThamDinhGiaCt::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            return redirect('thamdinhgia?&maxa='.$inputs['maxa']);

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
            return redirect('thamdinhgia?&maxa='.$maxa);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if(Session::has('admin')){
            $model = ThamDinhGia::findOrFail($id);
            $modelct = ThamDinhGiaCt::where('mahs',$model->mahs)->get();
            $modeldv = Town::where('maxa',$model->maxa)->first();
            return view('manage.thamdinhgia.show')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modeldv',$modeldv)
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
                ->join('town','thamdinhgia.maxa','=','town.maxa')
                ->select('thamdinhgiact.*','thamdinhgia.thoidiem','thamdinhgia.thuevat','thamdinhgia.sotbkl','thamdinhgia.thaotac','thamdinhgia.dvyeucau',
                'thamdinhgia.thoihan','thamdinhgia.ppthamdinh','town.tendv')
                ->whereYear('thamdinhgia.thoidiem',$inputs['nam']);
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
            $model->congbo = 'CCB';
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
            $model->trangthai = 'CHT';
            $model->congbo = 'CCB';
            $model->save();
            return redirect('thamdinhgia?&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = ThamDinhGia::findOrFail($id);
            $model->congbo = 'CB';
            $model->save();
            return redirect('thamdinhgia?&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }
    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuycongbo'];
            $model = ThamDinhGia::findOrFail($id);
            $model->congbo = 'HCB';
            $model->save();
            return redirect('thamdinhgia?&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }
    public function filedk(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );

        $inputs = $request->all();

        $model = ThamDinhGia::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        if (isset($model->ipt1)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 1 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thamdinhgia/' . $model->ipf1) . '">' . $model->ipt1 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt2)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 2 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thamdinhgia/' . $model->ipf2) . '">' . $model->ipt2 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt3)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 3 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thamdinhgia/' . $model->ipf3) . '">' . $model->ipt3 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt4)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 4 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thamdinhgia/' . $model->ipf4) . '">' . $model->ipt4 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }
        if (isset($model->ipt5)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 5 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/thamdinhgia/' . $model->ipf5) . '">' . $model->ipt5 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }

        $result['status'] = 'success';

        die(json_encode($result));
    }

    function gettthanghoa(Request $request){
        if(Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        $model = DmHangHoa::where('mahanghoa',$inputs['mahanghoa'])->first();
        if(count($model) == 0){
            $result['status'] = 'fail';
        }else{
            $result['status'] = 'success';
            $result['tenhanghoa'] = $model->tenhanghoa;
            $result['thongsokt'] = $model->thongsokt;
            $result['xuatxu'] = $model->xuatxu;
            $result['dvt'] = $model->dvt;

        }
        die(json_encode($result));
    }

    public function nhanexcel(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            if(session('admin')->level == 'X')
                $inputs['maxa'] = session('admin')->maxa;
            $modeldv = Town::where('maxa',$inputs['maxa'])
                ->first();

            return view('manage.thamdinhgia.excel.information')
                ->with('inputs',$inputs)
                ->with('modeldv',$modeldv)
                ->with('pageTitle', 'Nhận dữ liệu thẩm định giá từ file Excel');
        }else
            return view('errors.notlogin');
    }

    function import_excel(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $filename = $inputs['maxa'] . '_' . getdate()[0];
            $request->file('fexcel')->move(public_path() . '/data/uploads/excels/', $filename . '.xls');
            $path = public_path() . '/data/uploads/excels/' . $filename . '.xls';
            $data = [];

            Excel::load($path, function ($reader) use (&$data, $inputs) {
                $obj = $reader->getExcel();
                $sheet = $obj->getSheet(0);
                $data = $sheet->toArray(null, true, true, true);// giữ lại tiêu đề A=>'val';
            });
            //dd($data);

            for ($i = getDbl($inputs['tudong']); $i <= ( getDbl($inputs['sodong'])); $i++) {
                //dd($data[$i]);
                if (!isset($data[$i][$inputs['mats']]) || $data[$i][$inputs['tents']] == '') {
                    continue;//Tên cán bộ rỗng => thoát
                }
                $modelctnew = new ThamDinhGiaCt();
                $modelctnew->mahs = $inputs['mahs'];
//                $modelctnew->mats = $data[$i][$inputs['mats']];
                $modelctnew->tents = $data[$i][$inputs['tents']];
                $modelctnew->dacdiempl = $data[$i][$inputs['dacdiempl']];
                $modelctnew->thongsokt = $data[$i][$inputs['thongsokt']];
                $modelctnew->nguongoc = $data[$i][$inputs['nguongoc']];
                $modelctnew->dvt = $data[$i][$inputs['dvt']];
                $modelctnew->sl = getDbl($data[$i][$inputs['sl']]);
                $modelctnew->nguyengiadenghi = getDbl($data[$i][$inputs['nguyengiadenghi']]);
                $modelctnew->giadenghi = getDbl($data[$i][$inputs['giadenghi']]);
                $modelctnew->nguyengiathamdinh = getDbl($data[$i][$inputs['nguyengiathamdinh']]);
                $modelctnew->giatritstd = getDbl($data[$i][$inputs['giatritstd']]);
                $modelctnew->gc = $data[$i][$inputs['gc']];
                $modelctnew->save();
            }
            File::Delete($path);
            $modelct = ThamDinhGiaCt::where('mahs',$inputs['mahs'])
                ->get();
            $modeldv = Town::where('maxa',$inputs['maxa'])
                ->first();
            return view('manage.thamdinhgia.create')
                ->with('modeldv',$modeldv)
                ->with('maxa',$inputs['maxa'])
                ->with('modelct',$modelct)
                ->with('pageTitle','Thêm mới hồ sơ thẩm định giá');

        }else
            return view('errors.notlogin');
    }
}
