<?php

namespace App\Http\Controllers\manage\muataisan;

use App\District;
use App\DmNhomHangHoa;
use App\Model\manage\dinhgia\muataisan\MuaTaiSan;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MuaTaiSanController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] = isset($inputs['manhom']) ? $inputs['manhom'] : 'all';
            $modeldvql = District::all();
            $modelnhomhh = DmNhomHangHoa::all();
            if (session('admin')->level == 'X') {
                $modeldv = Town::where('maxa', session('admin')->maxa)->get();
                $inputs['maxa'] = session('admin')->maxa;
                $inputs['mahuyen'] = session('admin')->mahuyen;
            } else {
                if (session('admin')->level == 'T') {
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldvql->first()->mahuyen;
                    $modeldv = Town::where('mahuyen', $inputs['mahuyen'])->get();
                } else {
                    $inputs['mahuyen'] = session('admin')->mahuyen;
                    $modeldv = Town::where('mahuyen', session('admin')->mahuyen)->get();
                }
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : (count($modeldv) > 0 ? $modeldv->first()->maxa : '');
            }
            $ttdv = Town::where('maxa', $inputs['maxa'])->first();

            $model = MuaTaiSan::join('dmnhomhanghoa','dmnhomhanghoa.manhom','=','muataisan.manhom')

                ->whereYear('muataisan.ngayqd', $inputs['nam'])
                ->where('muataisan.maxa', $inputs['maxa'])
                ->select('muataisan.*','dmnhomhanghoa.tennhom');
            if($inputs['manhom'] != 'all')
                $model = $model->where('muataisan.manhom',$inputs['manhom']);

            $model = $model->get();
            return view('manage.muataisan.index')
                ->with('model', $model)
                ->with('modeldvql', $modeldvql)
                ->with('modeldv', $modeldv)
                ->with('modelnhomhh',$modelnhomhh)
                ->with('inputs', $inputs)
                ->with('ttdv', $ttdv)
                ->with('pageTitle', 'Thông tin hồ sơ giá trúng thầu của HH-DV được mua sắm theo QĐ của PL về đấu thầu');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $modeldvcq = District::where('mahuyen',$inputs['mahuyen'])
                ->first();
            $modeldv = Town::where('maxa',$inputs['maxa'])
                ->where('mahuyen',$inputs['mahuyen'])
                ->first();
            $modelnhomhh = DmNhomHangHoa::all();

            return view('manage.muataisan.create')
                ->with('modeldvcq',$modeldvcq)
                ->with('modeldv',$modeldv)
                ->with('modelnhomhh',$modelnhomhh)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Thông tin hồ sơ giá trúng thầu của HH-DV được mua sắm theo QĐ của PL về đấu thầu thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mahs'] = getdate()[0];
            $inputs['ngayqd'] = getDateToDb($inputs['ngayqd']);
            $inputs['trangthai'] = 'CHT';
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/muataisan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = new MuaTaiSan();
            $model->create($inputs);
            return redirect('thongtinmuataisan');
        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );

        $inputs = $request->all();

        $model = MuaTaiSan::find($inputs['id']);

        $result['message'] ='<div class="modal-body" id = "dinh_kem" >';
        if (isset($model->ipt1)) {
            $result['message'] .= '<div class="row" ><div class="col-md-6" ><div class="form-group" >';
            $result['message'] .= '<label class="control-label" > File đính kèm 1 </label >';
            $result['message'] .= '<p ><a target = "_blank" href = "' . url('/data/muataisan/' . $model->ipf1) . '">' . $model->ipt1 . '</a ></p >';
            $result['message'] .= '</div ></div ></div >';
        }

        $result['status'] = 'success';

        die(json_encode($result));
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = MuaTaiSan::where('id',$inputs['iddelete'])->delete();
            return redirect('thongtinmuataisan');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')) {

            $modelnhomhh = DmNhomHangHoa::all();
            $model = MuaTaiSan::findOrFail($id);
            $modeldvcq = District::where('mahuyen',$model->mahuyen)
                ->first();
            $modeldv = Town::where('maxa',$model->maxa)
                ->where('mahuyen',$model->mahuyen)
                ->first();

            return view('manage.muataisan.edit')
                ->with('model',$model)
                ->with('modeldvcq',$modeldvcq)
                ->with('modeldv',$modeldv)
                ->with('modelnhomhh',$modelnhomhh)
                ->with('pageTitle', 'Thông tin hồ sơ giá trúng thầu của HH-DV được mua sắm theo QĐ của PL về đấu thầu thêm mới');

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngayqd'] = getDateToDb($inputs['ngayqd']);
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/muataisan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = MuaTaiSan::findOrFail($id);
            $model->update($inputs);
            return redirect('thongtinmuataisan');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhoanthanh'];
            $model = MuaTaiSan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('thongtinmuataisan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = MuaTaiSan::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();

            return redirect('thongtinmuataisan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idcongbo'];
            $model = MuaTaiSan::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();

            return redirect('thongtinmuataisan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhuycongbo'];
            $model = MuaTaiSan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();

            return redirect('thongtinmuataisan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

}
