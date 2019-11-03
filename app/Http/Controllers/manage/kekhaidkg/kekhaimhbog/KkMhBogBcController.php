<?php

namespace App\Http\Controllers\manage\kekhaidkg\kekhaimhbog;

use App\District;
use App\Model\manage\kekhaidkg\kehaimhbog\KkMhBog;
use App\Model\manage\kekhaidkg\kehaimhbog\KkMhBogCt;
use App\Model\system\dmnganhnghekd\DmNgheKd;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkMhBogBcController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modeldmnghe = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first();
            $m_donvi = Town::where('mahuyen',$modeldmnghe->mahuyen)->get();
            return view('manage.kkgia.dkg.kekhaimhbog.reports.index')
                ->with('m_donvi',$m_donvi)
                ->with('modeldmnghe',$modeldmnghe)
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Báo cáo tổng hợp kê khai '.$modeldmnghe->tennghe);
        }else
            return view('errors.notlogin');
    }

    public function bc1(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modeldmnghe = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first();
            $model =  KkMhBog::join('company','company.maxa','=','kkmhbog.maxa')
                ->where('kkmhbog.trangthai','DD')
                ->where('kkmhbog.phanloai',$inputs['manghe'])
                ->select('kkmhbog.*','company.tendn');
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('kkmhbog.mahuyen', $inputs['mahuyen']);
                $modeldvql = Town::where('maxa',$inputs['mahuyen'])
                    ->get();
            }else{

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
            return view('manage.kkgia.dkg.kekhaimhbog.reports.bc1')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('modeldvql',$modeldvql)
                ->with('modeldmnghe',$modeldmnghe)
                ->with('pageTitle', 'Báo cáo tổng hợp kê khai'.$modeldmnghe->tennghe);
        }else
            return view('errors.notlogin');
    }

    public function bc2(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modeldmnghe = DmNgheKd::where('manganh','BOG')
                ->where('manghe',$inputs['manghe'])
                ->first();
            $model =  KkMhBog::join('company','company.maxa','=','kkmhbog.maxa')
                ->where('kkmhbog.trangthai','DD')
                ->where('kkmhbog.phanloai',$inputs['manghe'])
                ->select('kkmhbog.*','company.tendn');
            if($inputs['mahuyen'] != 'all') {
                $model = $model->where('kkmhbog.mahuyen', $inputs['mahuyen']);
                $modeldvql = Town::where('maxa',$inputs['mahuyen'])
                    ->get();
            }else{

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
            $mahss = '';
            foreach($model as $ct){
                $mahss = $mahss.$ct->mahs.',';
            }
            $modelct = KkMhBogCt::whereIn('mahs',explode(',',$mahss))
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
            return view('manage.kkgia.dkg.kekhaimhbog.reports.bc2')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('modeldvql',$modeldvql)
                ->with('modeldmnghe',$modeldmnghe)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Báo cáo tổng hợp kê khai'.$modeldmnghe->tennghe);
        }else
            return view('errors.notlogin');
    }
}
