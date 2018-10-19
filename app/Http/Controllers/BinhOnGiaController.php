<?php

namespace App\Http\Controllers;

use App\BinhOnGia;
use App\BinhOnGiaCt;
use App\BinhOnGiaCtDf;
use App\DmMhBinhOnGia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BinhOnGiaController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CHT';
            $model = BinhOnGia::where('mamh',$inputs['mamh'])
                ->whereYear('ngayapdung',$inputs['nam'])
                ->where('trangthai',$inputs['trangthai'])
                ->get();
            $modelmh = DmMhBinhOnGia::where('mamh',$inputs['mamh'])->first();
            return view('manage.bog.kekhai.index')
                ->with('model',$model)
                ->with('nam',$inputs['nam'])
                ->with('mamh',$inputs['mamh'])
                ->with('modelmh',$modelmh)
                ->with('trangthai',$inputs['trangthai'])
                ->with('pageTitle','Thông tin mặt hàng bình ổn giá');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelmh = DmMhBinhOnGia::where('mamh',$inputs['mamh'])->first();
            $mahuyen = session('admin')->mahuyen != '' ? session('admin')->mahuyen : 'T';
            $modeldel = BinhOnGiaCtDf::where('mahuyen',$mahuyen)->delete();
            return view('manage.bog.kekhai.create')
                ->with('mamh',$inputs['mamh'])
                ->with('modelmh',$modelmh)
                ->with('pageTitle','Thêm mới thông tin mặt hàng bình ổn giá');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mahuyen'] = session('admin')->mahuyen!= '' ? session('admin')->mahuyen : 'T';
            $inputs['mahs'] = $inputs['mahuyen'].getdate()[0];
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['trangthai'] = 'CHT';
            $model = new BinhOnGia();
            if($model->create($inputs)){
                $modelctdf = BinhOnGiaCtDf::where('mahuyen',$inputs['mahuyen'])->get();
                foreach($modelctdf as $ctdf){
                    $modelct = new BinhOnGiaCt();
                    $modelct->tenhh = $ctdf->tenhh;
                    $modelct->giatoithieu = $ctdf->giatoithieu;
                    $modelct->giatoida = $ctdf->giatoida;
                    $modelct->thapdung = $ctdf->thapdung;
                    $modelct->ghichu = $ctdf->ghichu;
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->save();
                }
            }
            return redirect('binhongia?&mamh='.$inputs['mamh']);
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = BinhOnGia::findOrFail($id);
            $modelct = BinhOnGiaCt::where('mahs',$model->mahs)->get();
            $modelmh = DmMhBinhOnGia::where('mamh',$model->mamh)->first();
            return view('manage.bog.kekhai.edit')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modelmh',$modelmh)
                ->with('pageTitle','Chỉnh sửa thông tin mặt hàng bình ổn giá');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $model = BinhOnGia::findOrFail($id);
            $model->update($inputs);
            return redirect('binhongia?&mamh='.$model->mamh);

        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = BinhOnGia::findOrFail($id);
            $modelct = BinhOnGiaCt::where('mahs',$model->mahs)->get();
            $modelmh = DmMhBinhOnGia::where('mamh',$model->mamh)->first();
            return view('manage.bog.kekhai.show')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('modelmh',$modelmh)
                ->with('pageTitle','Thông tin mặt hàng bình ổn giá chi tiết');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = BinhOnGia::findOrFail($id);
            $mamh = $model->mamh;
            $model->delete();

            return redirect('binhongia?&mamh='.$model->mamh);

        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
            $inputs['mamh'] = isset($inputs['mamh']) ? $inputs['mamh'] : '';
            $model = BinhOnGiaCt::join('binhongia','binhongiact.mahs','=','binhongia.mahs')
                ->join('dmmhbinhongia','binhongia.mamh','=','dmmhbinhongia.mamh')
                ->select('binhongiact.*','binhongia.soqd','binhongia.ngayapdung','binhongia.gioapdung','binhongia.mamh','dmmhbinhongia.tenmh')

                ->where('binhongia.trangthai','HT')
                ->OrWhere('binhongia.trangthai','CB');
            if($inputs['tenhh'] != '')
                $model = $model->where('binhongiact.tenhh','like','%'.$inputs['tenhh'].'%');
            if($inputs['nam'] != '')
                $model = $model->whereYear('binhongia.ngayapdung',$inputs['nam']);
            if($inputs['mamh'] != '')
                $model = $model->where('binhongia.mamh',$inputs['mamh']);

            $model = $model->get();
            $m_mhbog = DmMhBinhOnGia::all();


            return view('manage.bog.timkiem.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('m_mhbog',$m_mhbog)
                ->with('pageTitle','Tìm kiếm thông tin mặt hang bog');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = BinhOnGia::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('binhongia?&mamh='.$model->mamh.'&trangthai=HT');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = BinhOnGia::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('binhongia?&mamh='.$model->mamh.'&trangthai=HHT');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = BinhOnGia::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('binhongia?&mamh='.$model->mamh.'&trangthai=CB');
        }else
            return view('errors.notlogin');
    }
}
