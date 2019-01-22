<?php

namespace App\Http\Controllers;

use App\CungCapGia;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CungCapGiaXdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
                if(session('admin')->level == 'X') {
                    $modeldv = Town::where('maxa',session('admin')->maxa)->get();
                    $inputs['maxa'] = session('admin')->maxa;
                }else {
                    if(session('admin')->level == 'T')
                        $modeldv = Town::all();
                    else
                        $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                    $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'HT';
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                }

                $model = CungCapGia::join('company','company.maxa','=','cungcapgia.maxa')
                    ->where('company.level','CCG')
                    ->where('cungcapgia.trangthai',$inputs['trangthai'])
                    ->whereYear('cungcapgia.ngayapdung',$inputs['nam'])
                    ->where('cungcapgia.mahuyen',$inputs['maxa'])
                    ->select('cungcapgia.*','company.tendn')
                    ->get();

                return view('manage.dncungcapgia.xetduyet.index')
                    ->with('inputs',$inputs)
                    ->with('model',$model)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle', 'Thông tin  cung cấp giá hàng hóa');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $inputs = $request->all();
                $model = CungCapGia::where('id',$inputs['idhuyhoanthanh'])
                    ->first();
                $model->trangthai = 'HHT';
                $model->congbo = 'DCB';
                $model->save();
                return redirect('thongtingiahanghoa?&maxa='.$model->mahuyen.'&trangthai=HHT');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }
}
