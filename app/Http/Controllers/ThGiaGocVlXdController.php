<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\GiaGocVlXdCt;
use App\ThGiaGocVlXd;
use App\ThGiaGocVlXdCt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ThGiaGocVlXdController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['quy'] = isset($inputs['quy']) ? $inputs['quy'] : quy();
            $model = ThGiaGocVlXd::where('quy',$inputs['quy'])
                ->where('nam',$inputs['nam'])
                ->get();
            foreach($model as $tt) {
                $diabans = DiaBanHd::whereIn('district', explode(',', $tt->diabanbc))
                    ->get();
                $tendiaban  = '';
                foreach($diabans as $diaban){
                    $tendiaban .= $diaban->diaban.', ';
                }
                $tt->tendiaban = $tendiaban;
            }
            $m_diaban = DiaBanHd::all();
            return view('manage.dinhgia.giagocvlxd.tonghop.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('m_diaban',$m_diaban)
                ->with('pageTitle', 'Tổng hợp giá gốc vật liệu xây dựng');
        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();

            $inputs['mahs'] = 'Q'.$inputs['quybc'].'N'.$inputs['nambc'].getdate()[0];
            $inputs['ngaybc'] = date("Y-m-d");
            $inputs['diadanh'] = getGeneralConfigs()['diadanh'];
            $inputs['dvcq'] = getGeneralConfigs()['tendonvi'];
            $inputs['dvbc'] = 'LIÊN SỞ TÀI CHÍNH - XÂY DỰNG';
            $inputs['ttthaotac'] = session('admin')->name.'('.session('admin')->username.') thêm mới';
            $inputs['quy'] = $inputs['quybc'];
            $inputs['nam'] = $inputs['nambc'];
            $inputs['diabanbc'] = implode(',',$inputs['diabanbc']);
            $inputs['trangthai'] = 'CHT';
            $model = new ThGiaGocVlXd();
            if($model->create($inputs)){
                $modelct = GiaGocVlXdCt::join('giagocvlxd','giagocvlxd.mahs','=','giagocvlxdct.mahs')
                    ->where('giagocvlxd.quy',$inputs['quybc'])
                    ->where('giagocvlxd.nam',$inputs['nambc'])
                    ->where('giagocvlxd.trangthai','HT')
                    ->whereIn('giagocvlxd.district',explode(',',$inputs['diabanbc']))
                    ->select('giagocvlxdct.tenhhdv','giagocvlxdct.qccl','giagocvlxdct.dvt','giagocvlxdct.giagoc','giagocvlxdct.qcad','giagocvlxd.district')
                    ->get();
                foreach($modelct as $ct){
                    $modelthct = new ThGiaGocVlXdCt();
                    $modelthct->tenhhdv = $ct->tenhhdv;
                    $modelthct->qccl = $ct->qccl;
                    $modelthct->dvt = $ct->dvt;
                    $modelthct->giagoc = $ct->giagoc;
                    $modelthct->qcad = $ct->qcad;
                    $modelthct->district = $ct->district;
                    $modelthct->mahs = $inputs['mahs'];
                    $modelthct->save();
                }
            }
            return redirect('tonghopgiagocvlxd?&quy='.$inputs['quybc'].'&nam='.$inputs['nambc']);

        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            $model = ThGiaGocVlXd::findOrFail($id);
            $diabans = DiaBanHd::whereIn('district', explode(',', $model->diabanbc))
                ->get();
            $tendiaban  = '';
            foreach($diabans as $diaban){
                $tendiaban .= $diaban->diaban.', ';
            }
            $model->tendiaban = $tendiaban;
            $modelct = ThGiaGocVlXdCt::where('mahs',$model->mahs)
                ->get();
            if(session('admin')->level == 'T'){
                $inputs['dvcaptren'] = getGeneralConfigs()['tendvcqhienthi'];
                $inputs['dv'] = getGeneralConfigs()['tendvhienthi'];
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
            return view('manage.dinhgia.giagocvlxd.report.printth')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('diabans',$diabans)
                ->with('inputs',$inputs)
                ->with('pageTitle','Tổng hợp giá gốc vật liệu xây dựng');
        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            $model = ThGiaGocVlXd::findOrFail($id);
            $diabans = DiaBanHd::whereIn('district', explode(',', $model->diabanbc))
                ->get();
            $tendiaban  = '';
            foreach($diabans as $diaban){
                $tendiaban .= $diaban->diaban.', ';
            }
            $model->tendiaban = $tendiaban;
            $modelct = ThGiaGocVlXdCt::join('diabanhd','diabanhd.district','=','thgiagocvlxdct.district')
                ->where('thgiagocvlxdct.mahs',$model->mahs)
                ->select('thgiagocvlxdct.*','diabanhd.diaban')
                ->get();

            return view('manage.dinhgia.giagocvlxd.tonghop.edit')
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle','Tổng hợp giá gốc vật liệu xây dựng chỉnh sửa');
        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngaybc'] = getDateToDb($inputs['ngaybc']);
            $model = ThGiaGocVlXd::findOrFail($id);
            $model->update();
            return redirect('tonghopgiagocvlxd?&quy='.$inputs['quy'].'&nam='.$inputs['nam']);

        }else
            return view('errors.notlogin');
    }

    public function hoanthanh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ThGiaGocVlXd::where('id',$inputs['idhoanthanh'])->first();
            $model->trangthai = 'HT';
            $model->save();
            return redirect('tonghopgiagocvlxd?&quy='.$model->quy.'&nam='.$model->nam);
        } else
            return view('errors.notlogin');
    }

    public function huyhoanthanh(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ThGiaGocVlXd::where('id',$inputs['idhuyhoanthanh'])->first();
            $model->trangthai = 'HHT';
            $model->congbo = 'CCB';
            $model->save();
            return redirect('tonghopgiagocvlxd?&quy='.$model->quy.'&nam='.$model->nam);
        } else
            return view('errors.notlogin');
    }

    public function congbo(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ThGiaGocVlXd::where('id', $inputs['idcongbo'])->first();
            $model->congbo = 'CB';
            $model->save();
            return redirect('tonghopgiagocvlxd?&quy='.$model->quy.'&nam='.$model->nam);
        } else
            return view('errors.notlogin');
    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = ThGiaGocVlXd::where('id', $inputs['iddelete'])->first();
            if($model->delete()){
                $modelct = ThGiaGocVlXdCt::where('mahs',$model->mahs)
                    ->delete();
            }
            return redirect('tonghopgiagocvlxd');
        } else
            return view('errors.notlogin');
    }

}