<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThongTinDonViController extends Controller
{
    public function index(){
        if(session('admin')->level == 'H'){
            $model = District::where('mahuyen',session('admin')->mahuyen)
                ->first();
            $modeldvcq = (object) [
                'tendv' => 'UBND Tỉnh Cao Bằng',
            ];
            $modeldb = (object) [
                'diaban' => 'Tỉnh Cao Bằng',
            ];
        }else{
            $model = Town::where('maxa',session('admin')->maxa)
                ->first();
            $modeldvcq = District::where('mahuyen',$model->mahuyen)
                ->first();
            $modeldb = DiaBanHd::where('district',$model->district)
                ->first();
        }
        return view('system.thongtindonvi.index')
            ->with('model',$model)
            ->with('modeldvcq',$modeldvcq)
            ->with('modeldb',$modeldb)
            ->with('pageTitle','Thông tin đơn vị');
    }
}
