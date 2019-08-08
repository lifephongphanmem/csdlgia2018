<?php

namespace App\Http\Controllers\manage\giathitruong;

use App\District;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruong;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongCt;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongDm;
use App\Model\manage\dinhgia\giathitruong\GiaThiTruongTt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;

class GiaThiTruongController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            if(can('thgiathitruong','tonghop'))
                $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : 'all';
            else
                $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : session('admin')->mahuyen;

            if($inputs['mahuyen'] == 'all')
                $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] : date('m');
            else
                $inputs['thang'] = isset($inputs['thang']) ? $inputs['thang'] :'all';
            $donvis  = GiaThiTruongDm::join('district','district.mahuyen','=','giathitruongdm.mahuyen')
                ->select('district.tendv','giathitruongdm.mahuyen')
                ->groupBy('mahuyen','tendv')
                ->get();

            $tthuyen = District::all();
            $ttqds = GiaThiTruongTt::where('theodoi','TD')
                ->get();

            $model = GiaThiTruong::join('district','district.mahuyen','=','giathitruong.mahuyen')
                ->join('giathitruongtt','giathitruongtt.matt','=','giathitruong.matt')
                ->select('giathitruong.*','district.tendv','giathitruongtt.ttqd')
                ->where('giathitruong.nam',$inputs['nam']);
            if($inputs['thang'] != 'all')
                $model = $model->where('thang',$inputs['thang']);
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('giathitruong.mahuyen', $inputs['mahuyen']);
                $tthuyen = District::where('mahuyen',$inputs['mahuyen'])
                    ->first();
            }
            $model = $model->get();

            return view('manage.giathitruong.kekhai.index')
                ->with('model',$model)
                ->with('donvis',$donvis)
                ->with('ttqds',$ttqds)
                ->with('tthuyen',$tthuyen)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Kê khai giá thị trường');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $check = GiaThiTruong::where('matt',$inputs['add_matt'])
                ->where('mahuyen',$inputs['add_mahuyen'])
                ->where('thang',$inputs['add_thang'])
                ->where('nam',$inputs['add_nam'])
                ->count();
            if($check>0){
                $modeldv = District::where('mahuyen',$inputs['add_mahuyen'])
                    ->first();
                return view('manage.giathitruong.kekhai.errors.create')
                    ->with('inputs',$inputs)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle','Lỗi');
            }else{
                $modeldel = GiaThiTruongCt::where('trangthai','CXD')->delete();
                $inputs['mahs'] = $inputs['add_mahuyen'].getdate()[0];
                $modeldm = GiaThiTruongDm::where('matt',$inputs['add_matt'])
                    ->where('mahuyen',$inputs['add_mahuyen'])
                    ->where('theodoi','TD')
                    ->select('manhom','tennhom','mahh','tenhh','dacdiemkt','dvt')
                    ->geT();
                foreach($modeldm as $dm){
                    $dm->mahs = $inputs['mahs'];
                    $dm->trangthai = 'CXD';
                    $dm->loaigia = 'Giá bán lẻ';
                    $dm->nguontt = 'Các nguồn thông tin khác';
                }
                $arrays = $modeldm->toArray();
                GiaThiTruongCt::insert($arrays);
                $modelct = GiaThiTruongCt::where('mahs',$inputs['mahs'])
                    ->get();
                $modeldv = District::where('mahuyen',$inputs['add_mahuyen'])
                    ->first();
                $modeltt = GiaThiTruongTt::where('matt',$inputs['add_matt'])
                    ->first();
                return view('manage.giathitruong.kekhai.create')
                    ->with('modeltt',$modeltt)
                    ->with('modeldv',$modeldv)
                    ->with('modelct',$modelct)
                    ->with('inputs',$inputs)
                    ->with('pageTitle','Thêm mới báo cáo giá thị trường');


            }
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybc'] = getDateToDb($inputs['ngaybc']);
            $inputs['trangthai'] = 'CHT';
            $model = new GiaThiTruong();
            $model->create($inputs);
            $modelct = GiaThiTruongCt::where('mahs',$inputs['mahs'])
                ->update(['trangthai' => 'XD']);
            return redirect('kekhaigiathitruong?&nam='.$inputs['nam'].'&mahuyen='.$inputs['mahuyen']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = GiaThiTruong::findOrFail($id);
            $modelct = GiaThiTruongCt::where('mahs',$model->mahs)
                ->get();
            $modeldv = District::where('mahuyen',$model->mahuyen)
                ->first();
            $modeltt = GiaThiTruongTt::where('matt',$model->matt)
                ->first();
            return view('manage.giathitruong.kekhai.edit')
                ->with('model',$model)
                ->with('modeltt',$modeltt)
                ->with('modeldv',$modeldv)
                ->with('modelct',$modelct)
                ->with('pageTitle','Chỉnh sửa báo cáo giá thị trường');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybc'] = getDateToDb($inputs['ngaybc']);
            $model = GiaThiTruong::findOrFail($id);
            $model->update($inputs);
            return redirect('kekhaigiathitruong?&nam='.$inputs['nam'].'&mahuyen='.$inputs['mahuyen']);
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = GiaThiTruong::findOrFail($id);
            $modelct = GiaThiTruongCt::where('mahs',$model->mahs)
                ->get();
            $modeldv = District::where('mahuyen',$model->mahuyen)
                ->first();
            $modeltt = GiaThiTruongTt::where('matt',$model->matt)
                ->first();
            $modelgr = GiaThiTruongCt::where('mahs',$model->mahs)
                ->select('manhom','tennhom')
                ->groupBy('manhom','tennhom')
                ->get();
            return view('manage.giathitruong.kekhai.reports.prints')
                ->with('model',$model)
                ->with('modelgr',$modelgr)
                ->with('modeltt',$modeltt)
                ->with('modeldv',$modeldv)
                ->with('modelct',$modelct)
                ->with('pageTitle','Báo cáo giá thị trường');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaThiTruong::where('id',$inputs['idhoanthanh'])
                ->first();
            $model->trangthai = 'HT';
            $model->save();
            return redirect('kekhaigiathitruong?&nam='.$model->nam.'&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = GiaThiTruong::where('id',$inputs['idhuyhoanthanh'])
                ->first();
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('kekhaigiathitruong?&nam='.$model->nam.'&mahuyen='.$model->mahuyen);
        }else
            return view('errors.notlogin');
    }
}