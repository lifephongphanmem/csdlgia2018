<?php

namespace App\Http\Controllers;

use App\CsKdDvLt;
use App\Company;
use App\DiaBanHd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CsKdDvLtController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT') {
                $model = CsKdDvLt::where('maxa',session('admin')->maxa)
                    ->get();
                $tendn = Company::where('maxa',session('admin')->maxa)->first()->tendn;
                return view('manage.kkgia.dvlt.cskd.index')
                    ->with('model', $model)
                    ->with('tendn',$tendn)
                    ->with('pageTitle', 'Danh sách cơ sở kinh doanh dịch vụ lưu trú');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT') {
                $tendn = Company::where('maxa',session('admin')->maxa)
                ->where('level','DVLT')->first()->tendn;
                $districts = DiaBanHd::where('level','H')
                    ->get();
                return view('manage.kkgia.dvlt.cskd.create')
                    ->with('tendn',$tendn)
                    ->with('districts',$districts)
                    ->with('pageTitle', 'Thêm mới cơ sở kinh doanh dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT') {
                $inputs = $request->all();
                $inputs['macskd'] = session('admin')->maxa .getdate()[0];
                $inputs['maxa'] = session('admin')->maxa;
                $inputs['mahuyen'] = session('admin')->mahuyen;
                if(isset($inputs['avatar'])){
                    $avatar = $request->file('avatar');
                    $inputs['avatar'] = $inputs['macskd'] .'.'.$avatar->getClientOriginalExtension();
                    $avatar->move(public_path() . '/images/avatar/', $inputs['avatar']);
                }else{
                    $inputs['avatar'] = 'no-image-available.jpg';
                }
                $model = new CsKdDvLt();
                $model->create($inputs);
                return redirect('thongtincskd');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT') {
                $model = CsKdDvLt::findOrFail($id);
                $tendn = Company::where('maxa',session('admin')->maxa)->first()->tendn;
                $districts = DiaBanHd::where('level','H')
                    ->get();
                if($model->district != '')
                    $towns = DiaBanHd::where('district',$model->district)
                        ->where('level','X')
                        ->get();
                else
                    $towns = '';
                return view('manage.kkgia.dvlt.cskd.edit')
                    ->with('model',$model)
                    ->with('tendn',$tendn)
                    ->with('districts',$districts)
                    ->with('towns',$towns)
                    ->with('pageTitle', 'Chỉnh sửa cơ sở kinh doanh dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT') {
                $inputs = $request->all();
                $model = CsKdDvLt::findOrFail($id);
                if(isset($inputs['avatar'])) {
                    $avatar = $request->file('avatar');
                    $inputs['avatar'] = $model->macskd . '.' . $avatar->getClientOriginalExtension();
                    $avatar->move(public_path() . '/images/avatar/', $inputs['avatar']);
                }
                $model->update($inputs);
                return redirect('thongtincskd');
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }
}
