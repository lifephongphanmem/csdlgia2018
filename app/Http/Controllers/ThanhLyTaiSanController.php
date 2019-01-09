<?php

namespace App\Http\Controllers;

use App\ThanhLyTaiSan;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThanhLyTaiSanController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
                if(session('admin')->level == 'T'){
                    $modeldv = Town::all();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                }elseif(session('admin')->level == 'H'){
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : $modeldv->first()->maxa;
                }else{
                    $modeldv = Town::where('mahuyen',session('admin')->mahuyen)
                        ->where('maxa',session('admin')->maxa)
                        ->get();
                    $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : session('admin')->maxa;
                }
                $model = ThanhLyTaiSan::whereYear('ngayqd',$inputs['nam'])
                    ->where('maxa',$inputs['maxa'])
                    ->get();
                return view('manage.thanhlyts.hoso.index')
                    ->with('model',$model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle','Thông tin thanh lý tài sản');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                if(session('admin')->level == 'X')
                    $inputs['maxa'] = session('admin')->maxa;
                $modeldv = Town::where('maxa',$inputs['maxa'])->first();
                return view('manage.thanhlyts.hoso.create')
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle','Thông tin thanh lý tài sản');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayqd'] = getDateToDb($inputs['ngayqd']);
            $inputs['thoidiemhm'] = getDateToDb($inputs['thoidiemhm']);
            $inputs['nguyengia'] = getMoneyToDb($inputs['nguyengia']);
            $inputs['trangthai'] = 'CHT';
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = getvbpl($inputs['soqd']) .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = new ThanhLyTaiSan();
            $model->create($inputs);
            return redirect('thongtinthanhlytaisan');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $model = ThanhLyTaiSan::findOrFail($id);
                return view('manage.thanhlyts.hoso.edit')
                    ->with('model',$model)
                    ->with('pageTitle','Thông tin thanh lý tài sản chỉnh sửa');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['ngayqd'] = getDateToDb($inputs['ngayqd']);
            $inputs['thoidiemhm'] = getDateToDb($inputs['thoidiemhm']);
            $inputs['nguyengia'] = getMoneyToDb($inputs['nguyengia']);
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = getvbpl($inputs['soqd']) .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/thanhlytaisan/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->update($inputs);
            return redirect('thongtinthanhlytaisan?&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $maxa = $model->maxa;
            $model->delete();
            return redirect('thongtinthanhlytaisan?&maxa='.$maxa);
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhoanthanh'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('thongtinthanhlytaisan?&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }
    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->trangthai = 'HHT';
            $model->save();
            return redirect('thongtinthanhlytaisan?&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }
    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $id = $inputs['idcongbo'];
            $model = ThanhLyTaiSan::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('thongtinthanhlytaisan?&maxa='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tents'] = isset($inputs['tents']) ? $inputs['tents'] : '';
            $model = ThanhLyTaiSan::whereYear('ngayqd',$inputs['nam']);
            if($inputs['tents'] != '')
                $model = $model->where('tents','like','%'.$inputs['tents'].'%');
            $model = $model->get();
            return view('manage.thanhlyts.timkiem.index')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Tìm kiếm thông tin thanh lý tài sản');
        }else
            return view('errors.notlogin');
    }
}