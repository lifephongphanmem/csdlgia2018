<?php

namespace App\Http\Controllers;

use App\BinhOnGia;
use App\DkgDoanhnghiep;
use App\dkghoso;
use App\dkghosoct;
use App\dkghosoctdf;
use App\DmMhBinhOnGia;
use App\Town;

use App\Users;
use Carbon\Carbon;
use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DNDangKyBOGController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DkgDoanhnghiep::where('phanloai',$inputs['ma'])->get();
            return view('manage.bog.dangky.thongtindn.index')
                ->with('model', $model)
                ->with('ma', $inputs['ma'])
                ->with('pageTitle', 'Danh sách doanh nghiệp đăng ký giá');
        }else
            return view('errors.notlogin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = Town::all();
            return view('manage.bog.dangky.thongtindn.create')
                ->with('ma', $inputs['ma'])
                ->with('model', $model)
                ->with('pageTitle', 'Tạo mới doanh nghiệp đăng ký giá');
        }else
            return view('errors.notlogin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = new DkgDoanhnghiep();
            $model->create($inputs);
            return redirect('dsthongtindn?ma='.$inputs['phanloai']);
        }else
            return view('errors.notlogin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Session::has('admin')) {
            $model = Town::all();
            $modeldn = DkgDoanhnghiep::findOrFail($id);
            $ma = DkgDoanhnghiep::where('id',$id)->first()->phanloai;
            return view('manage.bog.dangky.thongtindn.edit')
                ->with('model',$model)
                ->with('modeldn',$modeldn)
                ->with('ma',$ma)
                ->with('pageTitle','Thông tin doanh nghiệp đăng ký giá');
        }else
            return view('errors.notlogin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DkgDoanhnghiep::findOrFail($inputs['id']);
            $model->update($inputs);
            return redirect('dsthongtindn?ma='.$inputs['phanloai']);
        }else
            return view('errors.notlogin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $id = $inputs['iddelete'];
            $phanloai = DkgDoanhnghiep::where('id',$id)->first()->phanloai;
            $model = DkgDoanhnghiep::findOrFail($id);
            $model->delete();
            return redirect('dsthongtindn?ma='.$phanloai);
        }else
            return view('errors.notlogin');
    }
    public function createuser(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $m_dn = DkgDoanhnghiep::where('id',$inputs['ma'])->first();
            return view('manage.bog.dangky.thongtindn.user')
                ->with('m_dn', $m_dn)
                ->with('pageTitle', 'Tạo mới thông tin tài khoản');
        } else {
            return view('errors.notlogin');
        }
    }
    public function storeuser(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = DkgDoanhnghiep::findOrFail($inputs['id']);
            if($model->username != "") {
                $m_user = Users::where('username',$model->username)->first();
                $inputs['password'] = md5($inputs['password']);
                $m_user->update($inputs);
            }
            else {
                $m_user = new Users();
                $inputs['ttnguoitao'] = session('admin')->name . '(' . session('admin')->username . ')' . getDateTime(Carbon::now()->toDateTimeString());
                $inputs['password'] = md5($inputs['password']);
                $inputs['level'] = 'DKG';
                $m_user->create($inputs);
            }
            $model->update($inputs);
            return redirect('dsthongtindn?ma='.$inputs['phanloai']);
        } else {
            return view('errors.notlogin');
        }
    }
}

