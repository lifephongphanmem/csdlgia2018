<?php

namespace App\Http\Controllers;

use App\Company;
use App\DmMhBinhOnGia;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDkgController extends Controller
{
    function checktt($ma)
    {
        switch ($ma) {
            case "dkgxangdau":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.xangdau','1')->get();
                break;
            case "dkgdien":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.dien','1')->get();
                break;
            case "dkgkhidau":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.khidau','1')->get();
                break;
            case "dkgphan":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.phan','1')->get();
                break;
            case "dkgthuocbvtv":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.thuocbvtv','1')->get();
                break;
            case "dkgvacxingsgc":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.vacxingsgc','1')->get();
                break;
            case "dkgmuoi":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.muoi','1')->get();
                break;
            case "dkgsuate6t":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.suate6t','1')->get();
                break;
            case "dkgduong":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.duong','1')->get();
                break;
            case "dkgthocgao":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.thocgao','1')->get();
                break;
            case "dkgthuocpcb":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.thuocpcb','1')->get();
                break;
            default:
                $m_dn = Company::all();
                break;
        }
        return $m_dn;
    }
    public function ttdn(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['mh'] = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
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

                $model = $this->checktt($inputs['ma']);
                $model= $model->where('mahuyen',$inputs['maxa']);

                return view('manage.kkgia.dkg.dangkygia.ttdn')
                    ->with('model', $model)
                    ->with('modeldv',$modeldv)
                    ->with('inputs',$inputs)
                    ->with('pageTitle', 'Danh sách thông tin kê khai giá');
            } else {
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }
}
