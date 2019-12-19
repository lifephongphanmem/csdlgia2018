<?php

namespace App\Http\Controllers\manage\gialephitruocbanha;

use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNha;
use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNhaCtClcl;
use App\Model\manage\dinhgia\gialephitruocbanha\GiaLpTbNhaCtXdm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaLpTbNhaController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = GiaLpTbNha::all();
            return view('manage.gialephitruocbanha.kekhai.index')
                ->with('model',$model)
                ->with('pageTitle', 'Thông tin giá tính lệ phí trước bạ đối với nhà');
        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            $inputs['mahs'] = getdate()[0];
            $modeldelctxdm  = GiaLpTbNhaCtXdm::where('trangthai','CXD')->delete();
            $modeldelctclcl = GiaLpTbNhaCtClcl::where('trangthai','CXD')->delete();
            $modelctxdm = GiaLpTbNhaCtXdm::where('mahs',$inputs['mahs'])
                ->get();
            $modelctclcl = GiaLpTbNhaCtClcl::where('mahs',$inputs['mahs'])
                ->get();
            return view('manage.gialephitruocbanha.kekhai.create')
                ->with('inputs',$inputs)
                ->with('modelctxdm',$modelctxdm)
                ->with('modelctclcl',$modelctclcl)
                ->with('pageTitle', 'Thông tin giá tính lệ phí trước bạ đối với nhà');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybh'] = getDateToDb($inputs['ngaybh']);
            $inputs['ngayad'] = getDateToDb($inputs['ngayad']);
            $inputs['trangthai'] = 'CHT';
            $model = new GiaLpTbNha();
            if($model->create($inputs)){
                $modelctxdm = GiaLpTbNhaCtXdm::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
                $modelctclcl = GiaLpTbNhaCtClcl::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('lephitruocbanha');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = GiaLpTbNha::findOrFail($id);
            $modelctxdm = GiaLpTbNhaCtXdm::where('mahs',$model->mahs)
                ->get();
            $modelctclcl = GiaLpTbNhaCtClcl::where('mahs',$model->mahs)
                ->get();
            return view('manage.gialephitruocbanha.kekhai.edit')
                ->with('model',$model)
                ->with('modelctxdm',$modelctxdm)
                ->with('modelctclcl',$modelctclcl)
                ->with('pageTitle', 'Thông tin giá tính lệ phí trước bạ đối với nhà chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update($id,Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybh'] = getDateToDb($inputs['ngaybh']);
            $inputs['ngayad'] = getDateToDb($inputs['ngayad']);
            $model = GiaLpTbNha::findOrFail($id);
            if($model->update($inputs)){
                $modelctxdm = GiaLpTbNhaCtXdm::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
                $modelctclcl = GiaLpTbNhaCtClcl::where('mahs',$inputs['mahs'])
                    ->update(['trangthai' => 'XD']);
            }
            return redirect('lephitruocbanha');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = GiaLpTbNha::findOrFail($id);
            $modelctxdm = GiaLpTbNhaCtXdm::where('mahs',$model->mahs)
                ->get();
            $modelctclcl = GiaLpTbNhaCtClcl::where('mahs',$model->mahs)
                ->get();
            $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            return view('manage.gialephitruocbanha.kekhai.show')
                ->with('model',$model)
                ->with('modelctxdm',$modelctxdm)
                ->with('modelctclcl',$modelctclcl)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Thông tin giá tính lệ phí trước bạ đối với nhà');
        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhoanthanh'];
            $model = GiaLpTbNha::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('lephitruocbanha');
        }else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhuyhoanthanh'];
            $model = GiaLpTbNha::findOrFail($id);
            $model->trangthai = 'CHT';
            $model->save();
            return redirect('lephitruocbanha');
        }else
            return view('errors.notlogin');
    }

    public function congbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idcongbo'];
            $model = GiaLpTbNha::findOrFail($id);
            $model->trangthai = 'CB';
            $model->save();
            return redirect('lephitruocbanha');
        }else
            return view('errors.notlogin');
    }

    public function huycongbo(Request $request){
        if(Session::has('admin')){
            $inputs=$request->all();
            $id = $inputs['idhuycongbo'];
            $model = GiaLpTbNha::findOrFail($id);
            $model->trangthai = 'HT';
            $model->save();
            return redirect('lephitruocbanha');
        }else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $model = GiaLpTbNha::findOrFail($id);
            if($model->delete()){
                $modelctxdm = GiaLpTbNhaCtXdm::where('mahs',$model->mahs)
                    ->delete();
                $modelctclcl = GiaLpTbNhaCtClcl::where('mahs',$model->mahs)
                    ->delete();
            }
            return redirect('lephitruocbanha');
        }else
            return view('errors.notlogin');
    }

}
