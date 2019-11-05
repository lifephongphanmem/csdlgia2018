<?php

namespace App\Http\Controllers\manage\kekhaigia\kkdvlt;

use App\District;
use App\Model\manage\kekhaigia\kkdvlt\CsKdDvLt;
use App\Model\manage\kekhaigia\kkdvlt\KkGiaDvLt;
use App\Model\system\company\Company;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsKkDvLtController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = Town::all();
                $model_donvi = Company::where('level','DVLT')->select('tendn','maxa')->get();
                $model_cskd = CsKdDvLt::select('tencskd','macskd')->get();

            return view('manage.kkgia.dvlt.reports.bcth.index')
                ->with('model',$model)
                ->with('model_donvi',$model_donvi)
                ->with('model_cskd',$model_cskd)
                ->with('pageTitle', 'Báo cáo tổng hợp dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function kkgdvlt($mahs){
        if (Session::has('admin')) {
            //dd($id);
            $modelkk = KkGiaDvLt::where('mahs',$mahs)->first();
            //dd($modelkk);
            $modeldn = DnDvLt::where('masothue',$modelkk->masothue)
                ->first();
            //dd($modeldn);
            //dd($modelkk->masothue);
            $modelcskd = CsKdDvLt::where('macskd',$modelkk->macskd)
                ->first();
            $modelkkct = KkGDvLtCt::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = DmDvQl::where('maqhns',$modeldn->cqcq)
                ->first();
            return view('reports.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelcskd',$modelcskd)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function kkgdvltks($mahs){
        if (Session::has('admin')) {
            //dd($id);
            $modelkk = KkGDvLt::where('mahs',$mahs)->first();
            //dd($modelkk);
            $modeldn = DnDvLt::where('masothue',$modelkk->masothue)
                ->first();
            //dd($modeldn);
            //dd($modelkk->masothue);
            $modelcskd = CsKdDvLt::where('macskd',$modelkk->macskd)
                ->first();
            $modelkkct = KkGDvLtCt::where('mahs',$modelkk->mahs)
                ->orderBy('loaip', 'asc')
                ->orderBy('id', 'asc')
                ->get();
            $modelcqcq = DmDvQl::where('maqhns',$modeldn->cqcq)
                ->first();
            return view('reports.reports.printks')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelcskd',$modelcskd)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function kkgdgs($mahs){
        if (Session::has('admin')) {
            $modelkk = KkGDvGs::where('mahs',$mahs)->first();
            $modeldn = DnDvGs::where('masothue',$modelkk->masothue)->first();
            $modelcqcq = DmDvQl::where('maqhns',$modelkk->cqcq)->first();
            $modelkkct = KkGDvGsCt::where('mahs',$mahs)->get();
            //dd($modelcqcq);
            return view('reports.kkgdvgs.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelcqcq',$modelcqcq)
                ->with('modelkkct',$modelkkct)
                ->with('pageTitle','Kê khai giá mặt hàng sữa');

        }else
            return view('errors.notlogin');
    }

    public function kkgdvtacn($mahs){
        if (Session::has('admin')) {
            $modelkk = KkGDvTaCn::where('mahs',$mahs)->first();
            $modeldn = DnTaCn::where('masothue',$modelkk->masothue)->first();
            $modelcqcq = DmDvQl::where('maqhns',$modelkk->cqcq)->first();
            $modelkkct = KkGDvTaCnCt::where('mahs',$mahs)->get();
            //dd($modelcqcq);
            return view('reports.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelcqcq',$modelcqcq)
                ->with('modelkkct',$modelkkct)
                ->with('pageTitle','Kê khai giá thức ăn chăn nuôi');

        }else
            return view('errors.notlogin');
    }

    public function getttp($maloaip){


    }

    public function dvltbc1(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            if(session('admin')->level == 'T'){
                if($input['cqcq']=='all') {
                    $m_cqcq = DmDvQl::where('plql','TC')->get();
                    $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
                } else {
                    $m_cqcq = DmDvQl::where('maqhns',$input['cqcq'])->get();
                    $modelcqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
                }
            }else{
                $m_cqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->get();
                $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
            }

            $model=$this->get_KKG_TH($input);

            return view('reports.reports.bcth.BC1')
                ->with('modelcqcq',$modelcqcq)
                ->with('input',$input)
                ->with('model',$model)
                ->with('m_cqcq',$m_cqcq)
                ->with('pageTitle','Báo cáo thống kê các đơn vị kê khai giá trong khoảng thời gian');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc1_excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            if(session('admin')->level == 'T'){
                if($input['cqcq']=='all') {
                    $m_cqcq = DmDvQl::where('plql','TC')->get();
                    $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
                } else {
                    $m_cqcq = DmDvQl::where('maqhns',$input['cqcq'])->get();
                    $modelcqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
                }
            }else{
                $m_cqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->get();
                $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
            }

            $model=$this->get_KKG_TH($input);
            Excel::create('BaoCao1',function($excel) use($modelcqcq,$input,$model,$m_cqcq){
                $excel->sheet('New sheet', function($sheet) use($modelcqcq,$input,$model,$m_cqcq){
                    $sheet->loadView('reports.reports.bcth.BC1')
                        ->with('modelcqcq',$modelcqcq)
                        ->with('input',$input)
                        ->with('model',$model)
                        ->with('m_cqcq',$m_cqcq)
                        ->with('pageTitle','Báo cáo thống kê');
                    //$sheet->setPageMargin(0.25);
                    $sheet->setAutoSize(false);
                    $sheet->setFontFamily('Tahoma');
                    $sheet->setFontBold(false);

                    $sheet->setWidth('C', 10);
                    $sheet->setWidth('D', 30);
                    $sheet->setWidth('E', 15);
                    $sheet->setWidth('F', 15);
                    $sheet->setWidth('G', 15);
                    $sheet->setWidth('H', 15);
                    $sheet->setWidth('I', 15);
                    //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                });
            })->download('xls');

        }else
            return view('errors.notlogin');
    }

    public function dvltbc2(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            //dd($input);
            if(session('admin')->level == 'T'){
                if($input['cqcq']=='all') {
                    $m_cqcq = DmDvQl::where('plql','TC')->get();
                    $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
                } else {
                    $m_cqcq = DmDvQl::where('maqhns',$input['cqcq'])->get();
                    $modelcqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
                }
            }else{
                $m_cqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->get();
                $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
            }
            //$model=$this->get_KKG_TH($input);

            if(session('admin')->level == 'T'){//Kết xuất báo cáo quyền Tỉnh
                if($input['cqcq']=='all'&&$input['loaihang']=='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }elseif($input['cqcq']=='all'&&$input['loaihang']!='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cskddvlt.loaihang', $input['loaihang'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }elseif($input['cqcq']!='all'&&$input['loaihang']=='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',$input['cqcq'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }else{
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',$input['cqcq'])
                        ->where('loaihang', $input['loaihang'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }
            }else{//Kết xuất báo cáo quyền Huyện
                if($input['loaihang']=='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',session('admin')->cqcq)
                        ->orderBy('ngaychuyen')
                        ->get();
                }else{
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',session('admin')->cqcq)
                        ->where('loaihang', $input['loaihang'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }
            }

            $mahss = '';
            foreach($model as $kk){
                $mahss = $mahss.$kk->mahs.',';
            }
            $modelctkk = KkGDvLtCt::whereIn('mahs',explode(',',$mahss))->get();

            foreach($modelctkk as $ttct){
                if($ttct->mucgialk>0) {
                    if ($ttct->mucgialk > $ttct->mucgiakk) {
                        $ttct->muctg = '-' . ($ttct->mucgialk - $ttct->mucgiakk);
                        $ttct->muctgpt = '-' . round(($ttct->mucgialk - $ttct->mucgiakk) / $ttct->mucgialk * 100, 2) . '%';
                    }else {
                        $ttct->muctg = $ttct->mucgiakk - $ttct->mucgialk;
                        $ttct->muctgpt = round(($ttct->mucgiakk - $ttct->mucgialk) / $ttct->mucgiakk * 100, 2) . '%';
                    }
                }
            }

            return view('reports.reports.bcth.BC2')
                ->with('modelcqcq',$modelcqcq)
                ->with('input',$input)
                ->with('model',$model)
                ->with('modelctkk',$modelctkk)
                ->with('m_cqcq',$m_cqcq)
                ->with('pageTitle','Báo cáo thống kê các đơn vị kê khai giá trong khoảng thời gian');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc2_excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            //dd($input);
            if(session('admin')->level == 'T'){
                if($input['cqcq']=='all') {
                    $m_cqcq = DmDvQl::where('plql','TC')->get();
                    $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
                } else {
                    $m_cqcq = DmDvQl::where('maqhns',$input['cqcq'])->get();
                    $modelcqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
                }
            }else{
                $m_cqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->get();
                $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
            }
            //$model=$this->get_KKG_TH($input);
            if(session('admin')->level == 'T'){//Kết xuất báo cáo quyền Tỉnh
                if($input['cqcq']=='all'&&$input['loaihang']=='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }elseif($input['cqcq']=='all'&&$input['loaihang']!='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('loaihang', $input['loaihang'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }elseif($input['cqcq']!='all'&&$input['loaihang']=='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',$input['cqcq'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }else{
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',$input['cqcq'])
                        ->where('loaihang', $input['loaihang'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }
            }else{//Kết xuất báo cáo quyền Huyện
                if($input['loaihang']=='all'){
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',session('admin')->cqcq)
                        ->orderBy('ngaychuyen')
                        ->get();
                }else{
                    $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                        ->OrWhere('trangthai', 'Duyệt')
                        ->whereMonth('ngaychuyen',$input['thang'])
                        ->whereYear('ngaychuyen',$input['nam'])
                        ->where('cqcq',session('admin')->cqcq)
                        ->where('loaihang', $input['loaihang'])
                        ->orderBy('ngaychuyen')
                        ->get();
                }
            }

            $mahss = '';
            foreach($model as $kk){
                $mahss = $mahss.$kk->mahs.',';
            }
            $modelctkk = KkGDvLtCt::whereIn('mahs',explode(',',$mahss))->get();

            foreach($modelctkk as $ttct){
                if($ttct->mucgialk>0) {
                    if ($ttct->mucgialk > $ttct->mucgiakk) {
                        $ttct->muctg = '-' . ($ttct->mucgialk - $ttct->mucgiakk);
                        $ttct->muctgpt = '-' . round(($ttct->mucgialk - $ttct->mucgiakk) / $ttct->mucgialk * 100, 2) . '%';
                    }else {
                        $ttct->muctg = $ttct->mucgiakk - $ttct->mucgialk;
                        $ttct->muctgpt = round(($ttct->mucgiakk - $ttct->mucgialk) / $ttct->mucgiakk * 100, 2) . '%';
                    }
                }
            }

            Excel::create('BaoCao2',function($excel) use($modelcqcq,$input,$model,$m_cqcq,$modelctkk){
                $excel->sheet('New sheet', function($sheet) use($modelcqcq,$input,$model,$m_cqcq,$modelctkk){
                    $sheet->loadView('reports.reports.bcth.BC2')
                        ->with('modelcqcq',$modelcqcq)
                        ->with('input',$input)
                        ->with('model',$model)
                        ->with('m_cqcq',$m_cqcq)
                        ->with('modelctkk',$modelctkk)
                        ->with('pageTitle','Báo cáo');
                    //$sheet->setPageMargin(0.25);
                    $sheet->setAutoSize(false);
                    $sheet->setFontFamily('Tahoma');
                    $sheet->setFontBold(false);

                    //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                });
            })->download('xls');

        }else
            return view('errors.notlogin');
    }

    public function dvltbc3(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            $m_donvi = DnDvLt::where('masothue',$input['masothue'])->first();
            $modelcqcq = DmDvQl::where('maqhns',$m_donvi->cqcq)->first();
            $model=$this->get_KKG_CT($input);

            return view('reports.reports.bcth.BC3')
                ->with('modelcqcq',$modelcqcq)
                ->with('input',$input)
                ->with('model',$model)
                ->with('m_donvi',$m_donvi)
                ->with('pageTitle','Báo cáo tổng hợp hồ sơ kê khai giá');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc3_excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $m_donvi = DnDvLt::where('masothue',$input['masothue'])->first();
            $modelcqcq = DmDvQl::where('maqhns',$m_donvi->cqcq)->first();
            $model=$this->get_KKG_CT($input);

            Excel::create('BaoCao3',function($excel) use($modelcqcq,$input,$model,$m_donvi){
                $excel->sheet('New sheet', function($sheet) use($modelcqcq,$input,$model,$m_donvi){
                    $sheet->loadView('reports.reports.bcth.BC3')
                        ->with('modelcqcq',$modelcqcq)
                        ->with('input',$input)
                        ->with('model',$model)
                        ->with('m_donvi',$m_donvi)
                        ->with('pageTitle','Báo cáo');
                    //$sheet->setPageMargin(0.25);
                    $sheet->setAutoSize(false);
                    $sheet->setFontFamily('Tahoma');
                    $sheet->setFontBold(false);

                    //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                });
            })->download('xls');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc4(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            $m_donvi = DnDvLt::where('masothue',$input['masothue'])->first();
            $modelcqcq = DmDvQl::where('maqhns',$m_donvi->cqcq)->first();
            $model=$this->get_KKG_CT($input);

            $mahss = '';
            foreach($model as $kk){
                $mahss = $mahss.$kk->mahs.',';
            }
            $modelctkk = KkGDvLtCt::whereIn('mahs',explode(',',$mahss))->get();

            return view('reports.reports.bcth.BC4')
                ->with('modelcqcq',$modelcqcq)
                ->with('input',$input)
                ->with('model',$model)
                ->with('modelctkk',$modelctkk)
                ->with('m_donvi',$m_donvi)
                ->with('pageTitle','Báo cáo chi tiết hồ sơ kê khai giá');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc4_excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
            $m_donvi = DnDvLt::where('masothue',$input['masothue'])->first();
            $model=$this->get_KKG_CT($input);

            $mahss = '';
            foreach($model as $kk){
                $mahss = $mahss.$kk->mahs.',';
            }
            $modelctkk = KkGDvLtCt::whereIn('mahs',explode(',',$mahss))->get();

            Excel::create('BaoCao4',function($excel) use($modelcqcq,$input,$model,$m_donvi,$modelctkk){
                $excel->sheet('New sheet', function($sheet) use($modelcqcq,$input,$model,$m_donvi,$modelctkk){
                    $sheet->loadView('reports.reports.bcth.BC4')
                        ->with('modelcqcq',$modelcqcq)
                        ->with('input',$input)
                        ->with('model',$model)
                        ->with('modelctkk',$modelctkk)
                        ->with('m_donvi',$m_donvi)
                        ->with('pageTitle','Báo cáo');
                    //$sheet->setPageMargin(0.25);
                    $sheet->setAutoSize(false);
                    $sheet->setFontFamily('Tahoma');
                    $sheet->setFontBold(false);

                    //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                });
            })->download('xls');

        }else
            return view('errors.notlogin');
    }

    public function dvltbc5(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $model = KkGiaDvLt::whereBetween('kkgiadvlt.ngaynhan',[$input['ngaytu'], $input['ngayden']])
                ->leftjoin('cskddvlt','cskddvlt.macskd','=','kkgiadvlt.macskd')
                ->select('kkgiadvlt.*','cskddvlt.tencskd','cskddvlt.loaihang','cskddvlt.diachikd','cskddvlt.telkd')
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
            return view('manage.kkgia.dvlt.reports.bcth.BC5')
                ->with('input',$input)
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Báo cáo thống kê các đơn vị kê khai giá trong khoảng thời gian');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc5_excel(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            if(session('admin')->level == 'T'){
                if($input['cqcq']=='all') {
                    $m_cqcq = DmDvQl::where('plql','TC')->get();
                    $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
                } else {
                    $m_cqcq = DmDvQl::where('maqhns',$input['cqcq'])->get();
                    $modelcqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
                }
            }else{
                $m_cqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->get();
                $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
            }

            $model=$this->get_KKG_TH($input);

            /*if($input['trangthai']!='all'){
                $model=$model->where('trangthai', $input['trangthai']);
            }*/
            if($input['thoihan']!='all'){
                $model=$model->where('thoihan', $input['thoihan']);
            }


            Excel::create('BaoCao5',function($excel) use($modelcqcq,$input,$model,$m_cqcq){
                $excel->sheet('New sheet', function($sheet) use($modelcqcq,$input,$model,$m_cqcq){
                    $sheet->loadView('reports.reports.bcth.BC5')
                        ->with('modelcqcq',$modelcqcq)
                        ->with('input',$input)
                        ->with('model',$model)
                        ->with('m_cqcq',$m_cqcq)
                        ->with('pageTitle','Báo cáo thống kê');
                    //$sheet->setPageMargin(0.25);
                    $sheet->setAutoSize(false);
                    $sheet->setFontFamily('Tahoma');
                    $sheet->setFontBold(false);

                    $sheet->setWidth('C', 10);
                    $sheet->setWidth('D', 30);
                    $sheet->setWidth('E', 15);
                    $sheet->setWidth('F', 15);
                    $sheet->setWidth('G', 15);
                    $sheet->setWidth('H', 15);
                    $sheet->setWidth('I', 15);
                    //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                });
            })->download('xls');

        }else
            return view('errors.notlogin');
    }

    //Lấy dữ liệu kê khai giá theo đơn vị chủ quản
    function get_KKG_TH($input){
        if(session('admin')->level == 'T'){//Kết xuất báo cáo quyền Tỉnh
            if($input['cqcq']=='all'&&$input['loaihang']=='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->where('reports.trangthai', 'Chờ duyệt')
                    ->OrWhere('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }elseif($input['cqcq']=='all'&&$input['loaihang']!='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->where('trangthai', 'Chờ duyệt')
                    ->OrWhere('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('cskddvlt.loaihang', $input['loaihang'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }elseif($input['cqcq']!='all'&&$input['loaihang']=='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->where('trangthai', 'Chờ duyệt')
                    ->OrWhere('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('reports.cqcq',$input['cqcq'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }else{
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->where('trangthai', 'Chờ duyệt')
                    ->OrWhere('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('reports.cqcq',$input['cqcq'])
                    ->where('cskddvlt.loaihang', $input['loaihang'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }
        }else{//Kết xuất báo cáo quyền Huyện
            if($input['loaihang']=='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->where('reports.trangthai', 'Chờ duyệt')
                    ->OrWhere('reports.trangthai', 'Duyệt')
                    ->where('reports.cqcq',session('admin')->cqcq)
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }else{
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->where('trangthai', 'Chờ duyệt')
                    ->OrWhere('reports.trangthai', 'Duyệt')
                    ->where('reports.cqcq',session('admin')->cqcq)
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('cskddvlt.loaihang', $input['loaihang'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }
        }

        return $model;
    }

    //Lấy dữ liệu kê khai giá theo đơn vị kê khai giá
    function get_KKG_CT($input){
        if($input['loaihang']=='all'){
            $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                ->where('reports.trangthai', 'Chờ duyệt')
                ->OrWhere('reports.trangthai', 'Duyệt')
                ->where('reports.masothue',$input['masothue'])
                ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                ->orderBy('reports.ngaychuyen')
                ->get();
        }else{
            $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                ->where('trangthai', 'Chờ duyệt')
                ->OrWhere('reports.trangthai', 'Duyệt')
                ->where('reports.masothue',$input['masothue'])
                ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                ->where('cskddvlt.loaihang', $input['loaihang'])
                ->orderBy('reports.ngaychuyen')
                ->get();
        }

        return $model;
    }

    //dữ liệu hồ sơ giải quyết
    function get_KKG_GQ($input){
        if(session('admin')->level == 'T'){//Kết xuất báo cáo quyền Tỉnh
            if($input['cqcq']=='all'&&$input['loaihang']=='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->Where('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }elseif($input['cqcq']=='all'&&$input['loaihang']!='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->Where('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('cskddvlt.loaihang', $input['loaihang'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }elseif($input['cqcq']!='all'&&$input['loaihang']=='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->Where('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('reports.cqcq',$input['cqcq'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }else{
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->Where('reports.trangthai', 'Duyệt')
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('reports.cqcq',$input['cqcq'])
                    ->where('cskddvlt.loaihang', $input['loaihang'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }
        }else{//Kết xuất báo cáo quyền Huyện
            if($input['loaihang']=='all'){
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->Where('reports.trangthai', 'Duyệt')
                    ->where('reports.cqcq',session('admin')->cqcq)
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }else{
                $model = KkGDvLt::join('cskddvlt','cskddvlt.macskd','=','reports.macskd')
                    ->select('cskddvlt.tencskd','cskddvlt.diachikd','cskddvlt.telkd','cskddvlt.loaihang','reports.*')
                    ->Where('reports.trangthai', 'Duyệt')
                    ->where('reports.cqcq',session('admin')->cqcq)
                    ->whereBetween('reports.ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                    ->where('cskddvlt.loaihang', $input['loaihang'])
                    ->orderBy('reports.ngaychuyen')
                    ->get();
            }
        }

        return $model;
    }

    public function dvltbc6(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = CsKdDvLt::all();
            foreach($model as $tt){
                $modelkk = KkGiaDvLt::where('macskd',$tt->macskd)->where('trangthai','DD')->whereBetween('ngaynhan',[$inputs['ngaytu'],$inputs['ngayden']])->count();
                $tt->lankk = $modelkk;
                if($modelkk>0) {
                    $modelkkgn = KkGiaDvLt::where('macskd',$tt->macskd)->where('trangthai','DD')->whereBetween('ngaynhan',[$inputs['ngaytu'],$inputs['ngayden']])->max('id');
                    $modelgn = KkGiaDvLt::where('id',$modelkkgn)->first();
                    $tt->kklc = 'Số CV:'.$modelgn['socv'].', ngày hiệu lực: '. getDayVn($modelgn['ngayhieuluc']);
                }
            }
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

            return view('manage.kkgia.dvlt.reports.bcth.BC6')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Báo cáo đơn vị kê khai giá dịch vụ lưu trú');
        }else
            return view('errors.notlogin');
    }

    public function getvalBc6($inputs){
        /*if($inputs['phanloai'] == 'DKK'){
            $model = KkGDvLt::where('trangthai','Duyệt')
                ->where('ngayduyet',[$inputs['ngaytu'],$inputs['ngayden']])
                ->where('')

        }elseif($inputs['phanloai'] == 'CKK'){

        }else{*/
        $model = CsKdDvLt::where('cqcq',$inputs['cqcq'])->get();
        foreach($model as $ttks){
            $modelkk = KkGDvLt::where('trangthai','Duyệt')
                ->whereBetween('ngaynhan',[$inputs['ngaytu'],$inputs['ngayden']])
                ->where('masothue',$ttks->masothue)
                ->count();
            $modelkkmn = CbKkGDvLt::whereBetween('ngaynhan',[$inputs['ngaytu'],$inputs['ngayden']])
                ->where('masothue',$ttks->masothue)
                ->first();
            $ttks->lankk = $modelkk;
            if($modelkk == 0)
                $ttks->kklc = 'Chưa kê khai';
            else
                $ttks->kklc = $modelkkmn['socv'].', ngày hiệu lực: '. getDayVn($modelkkmn['ngayhieuluc']);
        }
        //}

        return $model;
    }

    public function dvltbc6_excel(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelcqcq = DmDvQl::where('maqhns',$inputs['cqcq'])->first();
            $model=$this->getvalBc6($inputs);

            Excel::create('BaoCao6',function($excel) use($modelcqcq,$inputs,$model){
                $excel->sheet('New sheet', function($sheet) use($modelcqcq,$inputs,$model){
                    $sheet->loadView('reports.reports.bcth.BC6')
                        ->with('modelcqcq',$modelcqcq)
                        ->with('inputs',$inputs)
                        ->with('model',$model)
                        ->with('pageTitle','BcDvKkGDvlt');
                    //$sheet->setPageMargin(0.25);
                    $sheet->setAutoSize(false);
                    $sheet->setFontFamily('Tahoma');
                    $sheet->setFontBold(false);

                    $sheet->setWidth('C', 10);
                    $sheet->setWidth('D', 30);
                    $sheet->setWidth('E', 15);
                    $sheet->setWidth('F', 15);
                    $sheet->setWidth('G', 15);
                    $sheet->setWidth('H', 15);
                    $sheet->setWidth('I', 15);
                    //$sheet->setColumnFormat(array('D' => '#,##0.00'));
                });
            })->download('xls');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc7(Request $request){
        if (Session::has('admin')) {

            $input = $request->all();
            $modelcqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
            $modelgr = KkGDvLtH::where('cqcq',$input['cqcq'])
                ->where('action','Nhận hồ sơ')
                ->whereMonth('ngaynhan',$input['thang'])
                ->whereYear('ngaynhan',$input['nam'])
                ->select('username')
                ->GroupBy('username')
                ->get();
            foreach($modelgr as $gr){
                $name = Users::where('username',$gr->username)
                    ->first();
                $gr->name = $name->name;
            }
            $model = KkGDvLtH::where('cqcq',$input['cqcq'])
                ->where('action','Nhận hồ sơ')
                ->whereMonth('ngaynhan',$input['thang'])
                ->whereYear('ngaynhan',$input['nam'])
                ->get();

            return view('reports.reports.bcth.BC7')
                ->with('modelcqcq',$modelcqcq)
                ->with('input',$input)
                ->with('model',$model)
                ->with('modelgr',$modelgr)
                ->with('pageTitle','Báo cáo xét duyệt hồ sơ kê khai giá dịch vụ lưu trú');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc8(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            if(session('admin')->level == 'T'){
                if($input['cqcq']=='all') {
                    $m_cqcq = DmDvQl::where('plql','TC')->get();
                    $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
                } else {
                    $m_cqcq = DmDvQl::where('maqhns',$input['cqcq'])->get();
                    $modelcqcq = DmDvQl::where('maqhns',$input['cqcq'])->first();
                }
            }else{
                $m_cqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->get();
                $modelcqcq = DmDvQl::where('maqhns',session('admin')->cqcq)->first();
            }

            $model=$this->get_KKG_TH($input);

            return view('reports.reports.bcth.BC8')
                ->with('modelcqcq',$modelcqcq)
                ->with('input',$input)
                ->with('model',$model)
                ->with('m_cqcq',$m_cqcq)
                ->with('pageTitle','Báo cáo thống kê các đơn vị kê khai giá trong khoảng thời gian');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc9(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $m_cskd = CsKdDvLt::where('macskd',$input['macskd'])->first();
            $cqcq = DnDvLt::where('masothue',$m_cskd->masothue)->first();

            $modelcqcq = DmDvQl::where('maqhns',$cqcq->cqcq)->first();

            $model = KkGDvLt::where('trangthai', 'Chờ duyệt')
                ->OrWhere('trangthai', 'Duyệt')
                ->where('macskd',$input['macskd'])
                ->whereBetween('ngaychuyen', [$input['ngaytu'], $input['ngayden']])
                ->orderBy('ngaychuyen')
                ->get();

            $mahss = '';
            foreach($model as $kk){
                $mahss = $mahss.$kk->mahs.',';
            }
            $modelctkk = KkGDvLtCt::whereIn('mahs',explode(',',$mahss))->get();
            return view('reports.reports.bcth.BC9')
                ->with('modelcqcq',$modelcqcq)
                ->with('input',$input)
                ->with('model',$model)
                ->with('modelctkk',$modelctkk)
                ->with('m_cskd',$m_cskd)
                ->with('pageTitle','Báo cáo chi tiết hồ sơ kê khai giá');
        }else
            return view('errors.notlogin');
    }
}
