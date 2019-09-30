<?php

namespace App\Http\Controllers\manage\giadatdiaban;

use App\Model\manage\dinhgia\giadatdiaban\TtGiaDatDiaBan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class TtGiaDatDiaBanController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            if(can('dmgiacldat','index')) {
                $model = TtGiaDatDiaBan::all();
                return view('manage.dinhgia.giadatdiaban.thongtuquyetdinh.index')
                    ->with('model',$model)
                    ->with('pageTitle','Thông tư giá đất theo địa bàn');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            if(can('dmgiacldat','create')) {
                return view('manage.dinhgia.giadatdiaban.thongtuquyetdinh.create')
                    ->with('pageTitle','Thông tư giá đất theo địa bàn');
            }else
                return view('errors.noperm');

        } else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $inputs['mahs'] = getdate()[0];
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['ngaybanhanh'] = getDateToDb($inputs['ngaybanhanh']);
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/giadatdiaban/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = new TtGiaDatDiaBan();
            $model->create($inputs);
            return redirect('thongtugiadatdiaban');
        } else
            return view('errors.notlogin');
    }

    public function edit($id){
        if(Session::has('admin')){
            $model = TtGiaDatDiaBan::findOrFail($id);
            return view('manage.dinhgia.giadatdiaban.thongtuquyetdinh.edit')
                ->with('model',$model)
                ->with('pageTitle','Thông tư giá đất theo địa bàn chỉnh sửa');
        } else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = TtGiaDatDiaBan::findOrFail($id);
            $inputs['ngayapdung'] = getDateToDb($inputs['ngayapdung']);
            $inputs['ngaybanhanh'] = getDateToDb($inputs['ngaybanhanh']);
            if(isset($inputs['ipf1'])){
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $model->mahs .'.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/giadatdiaban/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }

            $model->update($inputs);
            return redirect('thongtugiadatdiaban');
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = TtGiaDatDiaBan::where('id',$inputs['iddelete'])
                ->delete();
            return redirect('thongtugiadatdiaban');
        } else
            return view('errors.notlogin');
    }
}
