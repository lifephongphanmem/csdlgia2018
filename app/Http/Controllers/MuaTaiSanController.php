<?php

namespace App\Http\Controllers;

use App\District;
use App\MuaTaiSan;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MuaTaiSanController extends Controller
{
    public function index(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $modeldvql = District::all();
            if (session('admin')->level == 'X') {
                $modeldv = Town::where('maxa', session('admin')->maxa)->get();
                $inputs['maxa'] = session('admin')->maxa;
                $inputs['mahuyen'] = session('admin')->mahuyen;
            } else {
                if (session('admin')->level == 'T') {
                    $inputs['mahuyen'] = isset($inputs['mahuyen']) ? $inputs['mahuyen'] : $modeldvql->first()->mahuyen;
                    $modeldv = Town::where('mahuyen', $inputs['mahuyen'])->get();
                } else {
                    $inputs['mahuyen'] = session('admin')->mahuyen;
                    $modeldv = Town::where('mahuyen', session('admin')->mahuyen)->get();
                }
                $inputs['maxa'] = isset($inputs['maxa']) ? $inputs['maxa'] : (count($modeldv) > 0 ? $modeldv->first()->maxa : '');
            }
            $ttdv = Town::where('maxa', $inputs['maxa'])->first();

            $model = MuaTaiSan::whereYear('ngayapdung', $inputs['nam'])
                ->where('maxa', $inputs['maxa'])
                ->get();
            return view('manage.muataisan.index')
                ->with('model', $model)
                ->with('modeldvql', $modeldvql)
                ->with('modeldv', $modeldv)
                ->with('inputs', $inputs)
                ->with('ttdv', $ttdv)
                ->with('pageTitle', 'Thông tin hồ sơ giá trúng thầu của HH-DV được mua sắm theo QĐ của PL về đấu thầu');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if(Session::has('admin')) {
            $inputs = $request->all();

        }else
            return view('errors.notlogin');
    }
}
