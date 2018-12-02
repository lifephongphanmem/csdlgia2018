<?php

namespace App\Http\Controllers;

use App\DmGiaDvGdDt;
use App\GiaDvGdDt;
use App\GiaDvGdDtCt;
use App\GiaDvGdDtCtDf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaDvGdDtController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';

            $model = GiaDvGdDt::Leftjoin('dmgiadvgddt','giadvgddt.manhom','=','dmgiadvgddt.manhom')
                ->select('giadvgddt.*', 'dmgiadvgddt.tennhom');
            if($inputs['nam'] != '')
                $model = $model->whereYear('giadvgddt.ngayapdung',$inputs['nam']);
            if ($inputs['trangthai'] != '')
                $model = $model->where('giadvgddt.trangthai', $inputs['trangthai']);

            $model = $model->get();
            $m_nhom = DmGiaDvGdDt::all();
            return view('manage.dinhgia.giadvgddt.kekhai.index')
                ->with('model', $model)
                ->with('inputs',$inputs)
                ->with('m_nhom', $m_nhom)
                ->with('pageTitle', 'Thông tin hồ sơ giá dịch vụ giáo dục đào tạo');

        } else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                if (session('admin')->level == 'T')
                    $inputs['mahuyen'] = 'T';
                else
                    $inputs['mahuyen'] = session('admin')->mahuyen;
                $modeldm = DmGiaDvGdDt::where('manhom', $inputs['manhom'])->first();
                $modelct = GiaDvGdDtCtDf::where('mahuyen', $inputs['mahuyen'])
                    ->get();
                return view('manage.dinhgia.giadvgddt.kekhai.create')
                    ->with('modelct', $modelct)
                    ->with('inputs', $inputs)
                    ->with('modeldm', $modeldm)
                    ->with('pageTitle', 'Thông tin hồ sơ giá dịch vụ giáo dục đào tạo thêm mới');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                if (session('admin')->level == 'T')
                    $inputs['mahuyen'] = 'T';
                else
                    $inputs['mahuyen'] = session('admin')->mahuyen;
                $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
                $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
                $inputs['trangthai'] = 'CHT';
                $model = new GiaDvGdDt();
                if($model->create($inputs)){
                    $modelctdf = GiaDvGdDtCtDf::where('mahuyen', $inputs['mahuyen']);
                    foreach($modelctdf->get() as $ctdf){
                        $modelct = new GiaDvGdDtCt();
                        $modelct->mota = $ctdf->mota;
                        $modelct->giadv = $ctdf->giadv;
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->save();
                    }
                    $modelctdf->delete();
                }

                return redirect('thongtingiadvgddt?&trangthai=CHT');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = GiaDvGdDt::findOrFail($id);
            $modelct = GiaDvGdDtCt::where('mahs',$model->mahs)
                ->get();
            return view('manage.dinhgia.giadvgddt.reports.print')
                ->with('modelct', $modelct)
                ->with('model', $model)
                ->with('pageTitle', 'Thông tin hồ sơ giá dịch vụ giáo dục đào tạo');
        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = GiaDvGdDt::findOrFail($id);
                $modeldm = DmGiaDvGdDt::where('manhom', $model->manhom)->first();
                $modelct = GiaDvGdDtCt::where('mahs', $model->mahs)
                    ->get();
                return view('manage.dinhgia.giadvgddt.kekhai.edit')
                    ->with('modelct', $modelct)
                    ->with('model', $model)
                    ->with('modeldm', $modeldm)
                    ->with('pageTitle', 'Thông tin hồ sơ giá dịch vụ giáo dục đào tạo chỉnh sửa');
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
                $model = GiaDvGdDt::findOrFail($id);
                $model->update($inputs);

                return redirect('thongtingiadvgddt?&trangthai='.$model->trangthai);
            }else
                return view('errors.perm');
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaDvGdDt::findOrFail($id);
            $modelct = GiaDvGdDtCt::where('mahs',$model->mahs)->delete();
            $model->delete();
            return redirect('thongtingiadvgddt?&trangthai=CHT');
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['manhom'] =  isset($inputs['manhom']) ? $inputs['manhom'] : '';
            $inputs['mota'] =  isset($inputs['mota']) ? $inputs['mota'] : '';
            $m_nhom = DmGiaDvGdDt::all();
            $model = GiaDvGdDtCt::join('giadvgddt','giadvgddt.mahs','=','giadvgddtct.mahs')
                ->join('dmgiadvgddt','giadvgddt.manhom','=','dmgiadvgddt.manhom')
                ->select('giadvgddtct.*','giadvgddt.soqd','giadvgddt.ngayapdung','giadvgddt.ghichu',
                    'dmgiadvgddt.tennhom')
                ->whereIn('giadvgddt.trangthai',['HT','CB']);
            if($inputs['nam'] != '')
                $model = $model->whereYear('giadvgddt.ngayapdung',$inputs['nam']);
            if($inputs['manhom'] != '')
                $model = $model->where('giadvgddt.manhom','=',$inputs['manhom']);
            if($inputs['mota'] != '')
                $model = $model->where('giadvgddtct.mota','like','%'.$inputs['mota'].'%');
            $model = $model->get();
            return view('manage.dinhgia.giadvgddt.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('m_nhom',$m_nhom)
                ->with('pageTitle','Tìm kiếm thông tin giá dịch vụ giáo dục đào tạo');
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
            return redirect('thongtingiadvgddt?&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaDvGdDt::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thongtingiadvgddt?&trangthai=HHT');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = GiaDvGdDt::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtingiadvgddt?&trangthai=CB');
        }else
            return view('errors.notlogin');
    }
}