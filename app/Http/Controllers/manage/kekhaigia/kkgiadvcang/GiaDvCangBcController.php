<?php

namespace App\Http\Controllers\manage\kekhaigia\kkgiadvcang;

use App\District;
use App\Model\manage\kekhaigia\kkgiadvcang\GiaDvCang;
use App\Model\manage\kekhaigia\kkgiadvcang\GiaDvCangCt;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GiaDvCangBcController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $modeldmnghe = DmNgheKd::where('manganh','DVCB')
                ->where('manghe','DVCB')
                ->first();
            $m_donvi = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
            return view('manage.kkgia.dvcang.reports.index')
                ->with('m_donvi',$m_donvi)
                ->with('pageTitle', 'Báo cáo tổng hợp kê khai Giá dv tại cảng biển, cảng hàng không');
        }else
            return view('errors.notlogin');
    }

    public function bc1(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
//            dd($inputs);
            $model =  GiaDvCang::join('company','company.maxa','=','giadvcang.maxa')
                ->where('giadvcang.trangthai','DD')
                ->select('giadvcang.*','company.tendn');
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('giadvcang.mahuyen', $inputs['mahuyen']);
                $modeldvql = Town::where('maxa',$inputs['mahuyen'])
                    ->get();
            }else{
                $modeldmnghe = DmNgheKd::where('manganh','DVCB')
                    ->where('manghe','DVCB')
                    ->first();
                $modeldvql = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
            }
            if($inputs['phanloai'] == 'ngaychuyen'){
                if($inputs['time'] == 'ngay')
                    $model = $model->whereBetween('ngaychuyen',[getDateToDb($inputs['tungay']), getDateToDb($inputs['denngay'])]);
                elseif($inputs['time'] == 'thang')
                    $model = $model->whereMonth('ngaychuyen',$inputs['thang'])
                        ->whereYear('ngaychuyen',$inputs['nam']);
                else{
                    if ($inputs['quy'] == 1) {
                        $ngaytu = $inputs['nam'] . '-01-01';
                        $ngayden = $inputs['nam'] . '-03-31';
                    } elseif ($inputs['quy'] == 2) {
                        $ngaytu = $inputs['nam'] . '-04-01';
                        $ngayden = $inputs['nam'] . '-06-30';
                    } elseif ($inputs['quy'] == 3) {
                        $ngaytu = $inputs['nam'] . '-07-01';
                        $ngayden = $inputs['nam'] . '-09-31';
                    } else {
                        $ngaytu = $inputs['nam'] . '-10-01';
                        $ngayden = $inputs['nam'] . '-12-31';
                    }
                    $model = $model->whereBetween('ngaychuyen', [$ngaytu, $ngayden]);
                }
            }else{
                if($inputs['time'] == 'ngay')
                    $model = $model->whereBetween('ngaynhan',[getDateToDb($inputs['tungay']), getDateToDb($inputs['denngay'])]);
                elseif($inputs['time'] == 'thang')
                    $model = $model->whereMonth('ngaynhan',$inputs['thang'])
                        ->whereYear('ngaynhan',$inputs['nam']);
                else{
                    if ($inputs['quy'] == 1) {
                        $ngaytu = $inputs['nam'] . '-01-01';
                        $ngayden = $inputs['nam'] . '-03-31';
                    } elseif ($inputs['quy'] == 2) {
                        $ngaytu = $inputs['nam'] . '-04-01';
                        $ngayden = $inputs['nam'] . '-06-30';
                    } elseif ($inputs['quy'] == 3) {
                        $ngaytu = $inputs['nam'] . '-07-01';
                        $ngayden = $inputs['nam'] . '-09-31';
                    } else {
                        $ngaytu = $inputs['nam'] . '-10-01';
                        $ngayden = $inputs['nam'] . '-12-31';
                    }
                    $model = $model->whereBetween('ngaynhan', [$ngaytu, $ngayden]);
                }
            }
            $model = $model->get();
//            dd($model);
            $inputs['counths'] = count($model);
            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = '';
                $inputs['dv'] = getGeneralConfigs()['tendonvi'];
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }elseif(session('admin')->level == 'H'){
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }else{
                $modeldv = Town::where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }

            return view('manage.kkgia.dvcang.reports.bc1')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('modeldvql',$modeldvql)
                ->with('pageTitle', 'Báo cáo tổng hợp kê khai Giá dv tại cảng biển, cảng hàng không');
        }else
            return view('errors.notlogin');
    }

    public function bc2(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
//            dd($inputs);
            $model =  GiaDvCang::join('company','company.maxa','=','giadvcang.maxa')
                ->where('giadvcang.trangthai','DD')
                ->select('giadvcang.*','company.tendn');
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('giadvcang.mahuyen', $inputs['mahuyen']);
                $modeldvql = Town::where('maxa',$inputs['mahuyen'])
                    ->get();
            }else{
                $modeldmnghe = DmNgheKd::where('manganh','DVCB')
                    ->where('manghe','DVCB')
                    ->first();
                $modeldvql = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
            }
            if($inputs['phanloai'] == 'ngaychuyen'){
                if($inputs['time'] == 'ngay')
                    $model = $model->whereBetween('ngaychuyen',[getDateToDb($inputs['tungay']), getDateToDb($inputs['denngay'])]);
                elseif($inputs['time'] == 'thang')
                    $model = $model->whereMonth('ngaychuyen',$inputs['thang'])
                        ->whereYear('ngaychuyen',$inputs['nam']);
                else{
                    if ($inputs['quy'] == 1) {
                        $ngaytu = $inputs['nam'] . '-01-01';
                        $ngayden = $inputs['nam'] . '-03-31';
                    } elseif ($inputs['quy'] == 2) {
                        $ngaytu = $inputs['nam'] . '-04-01';
                        $ngayden = $inputs['nam'] . '-06-30';
                    } elseif ($inputs['quy'] == 3) {
                        $ngaytu = $inputs['nam'] . '-07-01';
                        $ngayden = $inputs['nam'] . '-09-31';
                    } else {
                        $ngaytu = $inputs['nam'] . '-10-01';
                        $ngayden = $inputs['nam'] . '-12-31';
                    }
                    $model = $model->whereBetween('ngaychuyen', [$ngaytu, $ngayden]);
                }
            }else{
                if($inputs['time'] == 'ngay')
                    $model = $model->whereBetween('ngaynhan',[getDateToDb($inputs['tungay']), getDateToDb($inputs['denngay'])]);
                elseif($inputs['time'] == 'thang')
                    $model = $model->whereMonth('ngaynhan',$inputs['thang'])
                        ->whereYear('ngaynhan',$inputs['nam']);
                else{
                    if ($inputs['quy'] == 1) {
                        $ngaytu = $inputs['nam'] . '-01-01';
                        $ngayden = $inputs['nam'] . '-03-31';
                    } elseif ($inputs['quy'] == 2) {
                        $ngaytu = $inputs['nam'] . '-04-01';
                        $ngayden = $inputs['nam'] . '-06-30';
                    } elseif ($inputs['quy'] == 3) {
                        $ngaytu = $inputs['nam'] . '-07-01';
                        $ngayden = $inputs['nam'] . '-09-31';
                    } else {
                        $ngaytu = $inputs['nam'] . '-10-01';
                        $ngayden = $inputs['nam'] . '-12-31';
                    }
                    $model = $model->whereBetween('ngaynhan', [$ngaytu, $ngayden]);
                }
            }
            $model = $model->get();
            $mahss = '';
            foreach($model as $ct){
                $mahss = $mahss.$ct->mahs.',';
            }
            $modelct = GiaDvCangCt::whereIn('mahs',explode(',',$mahss))
                ->get();
            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = '';
                $inputs['dv'] = getGeneralConfigs()['tendonvi'];
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }elseif(session('admin')->level == 'H'){
                $modeldv = District::where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }else{
                $modeldv = Town::where('maxa',session('admin')->maxa)
                    ->where('mahuyen',session('admin')->mahuyen)->first();
                $inputs['dvcaptren'] = $modeldv->tendvcqhienthi;
                $inputs['dv'] = $modeldv->tendvhienthi;
                $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            }

            return view('manage.kkgia.dvcang.reports.bc2')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('modeldvql',$modeldvql)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Báo cáo tổng hợp kê khai Giá dv tại cảng biển, cảng hàng không');
        }else
            return view('errors.notlogin');
    }
}
