<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvlt;

use App\DiaBanHd;
use App\Model\manage\kekhaigia\kkdvlt\CsKdDvLt;
use App\Model\system\company\Company;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CsKdDvLtController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN') {

                $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                        ->where('companylvcc.manghe','DVLT')
                        ->where('company.maxa',session('admin')->maxa)
                        ->first();
                if(isset($modeldn)) {
                    $model = CsKdDvLt::join('town','town.maxa','=','cskddvlt.mahuyen')
                        ->select('cskddvlt.*','town.tendv')
                        ->where('cskddvlt.maxa',session('admin')->maxa)
                        ->get();
                    return view('manage.kkgia.dvlt.cskd.index')
                        ->with('model', $model)
                        ->with('modeldn', $modeldn)
                        ->with('pageTitle', 'Danh sách cơ sở kinh doanh dịch vụ lưu trú');
                }else
                    return view('errors.perm');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN') {
                $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                    ->where('companylvcc.manghe','DVLT')
                    ->where('company.maxa',session('admin')->maxa)
                    ->first();
                $dmnghe = DmNgheKd::where('manganh','DVLT')
                    ->where('manghe','DVLT')
                    ->first();
                $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)
                    ->get();

//                $districts = DiaBanHd::where('level','H')
//                    ->get();
                return view('manage.kkgia.dvlt.cskd.create')
                    ->with('modeldn',$modeldn)
                    ->with('modeldv',$modeldv)
//                    ->with('districts',$districts)
                    ->with('pageTitle', 'Thêm mới cơ sở kinh doanh dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN') {
                $inputs = $request->all();
                $inputs['macskd'] = session('admin')->maxa .getdate()[0];
                $inputs['maxa'] = session('admin')->maxa;
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
            if (session('admin')->level == 'DN') {
                $model = CsKdDvLt::findOrFail($id);
                $modeldn = Company::join('companylvcc','companylvcc.maxa','=','company.maxa')
                    ->where('companylvcc.manghe','DVLT')
                    ->where('company.maxa',$model->maxa)
                    ->first();
                $dmnghe = DmNgheKd::where('manganh','DVLT')
                    ->where('manghe','DVLT')
                    ->first();
                $modeldv = Town::where('mahuyen',$dmnghe->mahuyen)
                    ->get();
                return view('manage.kkgia.dvlt.cskd.edit')
                    ->with('model',$model)
                    ->with('modeldn',$modeldn)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle', 'Chỉnh sửa cơ sở kinh doanh dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DN') {
                $inputs = $request->all();
                $model = CsKdDvLt::findOrFail($id);
                if(isset($inputs['avatar'])) {
                    $avatar = $request->file('avatar');
                    $inputs['avatar'] = $model->macskd . '.' . $avatar->getClientOriginalExtension();
                    $avatar->move(public_path() . '/images/avatar/', $inputs['avatar']);
                }
                $model->update($inputs);
                return redirect('thongtincskd');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }
}
