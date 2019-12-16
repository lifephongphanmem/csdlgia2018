<?php

namespace App\Http\Controllers;

use App\Model\system\company\Company;
use App\Town;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DsDnCungCapGiaCOntroller extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $inputs = $request->all();
                if(session('admin')->level == 'T'){
                    $towns = Town::all();
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $towns->first()->maxa;
                    $tttown = Town::where('maxa',$inputs['mahuyen'])->first();
                }elseif(session('admin')->level == 'H'){
                    $towns = Town::where('mahuyen',session('admin')->mahuyen)->get();
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $towns->first()->maxa;
                    $tttown = Town::where('maxa',$inputs['mahuyen'])->first();
                }else{
                    $towns = Town::where('mahuyen',session('admin')->mahuyen)
                        ->where('maxa',session('admin')->maxa)
                        ->get();
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $towns->first()->maxa;
                    $tttown = Town::where('maxa',$inputs['mahuyen'])->first();
                }


                $model = Company::where('level', 'CCG')
                    ->where('mahuyen',$inputs['mahuyen'])
                    ->get();


                return view('manage.dncungcapgia.company.index')
                    ->with('model', $model)
                    ->with('inputs', $inputs)
                    ->with('towns',$towns)
                    ->with('tttown',$tttown)
                    ->with('pageTitle', 'Thông tin doanh nghiệp cung cấp dịch vụ');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $inputs = $request->all();
                $modeldv = Town::where('maxa',$inputs['mahuyen'])->first();
                return view('manage.dncungcapgia.company.create')
                    ->with('inputs',$inputs)
                    ->with('modeldv',$modeldv)
                    ->with('pageTitle', 'Thông tin doanh nghiệp cung cấp dịch vụ thêm mới');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $inputs = $request->all();
                $modelcheckuser = User::where('username',$inputs['username'])
                    ->count();
                $modelcheckcom = Company::where('maxa',$inputs['maxa'])
                    ->where('level',$inputs['level'])
                    ->count();
                if($modelcheckuser == 0 && $modelcheckcom == 0){
                    $model = new Company();
                    if($model->create($inputs)){
                        $modeluser = new User();
                        $modeluser->username = $inputs['username'];
                        $modeluser->password = md5($inputs['password']);
                        $modeluser->level = $inputs['level'];
                        $modeluser->name = $inputs['tendn'];
                        $modeluser->email = $inputs['email'];
                        $modeluser->mahuyen = $inputs['mahuyen'];
                        $modeluser->maxa = $inputs['maxa'];
                        $modeluser->status = 'Kích hoạt';
                        $modeluser->save();
                    }
                    return redirect('dsdncungcapgia');
                }
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $model = Company::findOrFail($id);
                $modeldv = Town::where('maxa',$model->mahuyen)->first();
                $modeluser = User::where('maxa',$model->maxa)
                    ->where('mahuyen',$model->mahuyen)
                    ->where('level','CCG')
                    ->first();
                //dd($modeluser);
                return view('manage.dncungcapgia.company.edit')
                    ->with('model',$model)
                    ->with('modeldv',$modeldv)
                    ->with('modeluser',$modeluser)
                    ->with('pageTitle', 'Thông tin doanh nghiệp cung cấp dịch vụ chỉnh sửa');

            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level =='X') {
                $inputs = $request->all();
                $model = Company::findOrFail($id);
                if($inputs['password'] != ''){
                    $modeluser = User::where('maxa',$model->maxa)
                        ->where('mahuyen',$model->mahuyen)
                        ->where('level',$model->level)
                        ->first();
                    $modeluser->password = md5($inputs['password']);
                    $modeluser->save();
                }
                $model->update($inputs);
                return redirect('dsdncungcapgia');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }
}
