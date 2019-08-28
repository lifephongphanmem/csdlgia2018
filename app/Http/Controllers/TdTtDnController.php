<?php

namespace App\Http\Controllers;

use App\District;
use App\GeneralConfigs;
use App\Jobs\SendMail;
use App\Jobs\SendMailTtDnTd;
use App\Town;
use App\TtDnTd;
use App\Model\system\company\Company;
use App\Model\system\company\CompanyLvCc;
use App\TtDnTdCt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TdTtDnController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T') {
                if (can('ttdn', 'approve')) {
                    $inputs = $request->all();
                    $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';
                    $model = TtDnTd::where('trangthai', $inputs['trangthai'])
                        ->get();
                    return view('system.xdtdttdn.index')
                        ->with('model', $model)
                        ->with('inputs', $inputs)
                        ->with('pageTitle', 'Xét duyệt thông tin doanh nghiệp thay đổi');
                } else
                    return view('errors.perm');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T') {
                if (can('ttdn', 'approve')) {

                    $modeltttd = TtDnTd::findOrFail($id);
                    $modeltttdct = TtDnTdCt::Leftjoin('town', 'town.maxa', '=', 'ttdntdct.mahuyen')
                        ->join('dmnganhkd', 'dmnganhkd.manganh', '=', 'ttdntdct.manganh')
                        ->join('dmnghekd', 'dmnghekd.manghe', '=', 'ttdntdct.manghe')
                        ->select('ttdntdct.*', 'town.tendv', 'dmnganhkd.tennganh', 'dmnghekd.tennghe')
                        ->where('ttdntdct.maxa', $modeltttd->maxa)
                        ->get();
                    $model = Company::where('maxa',$modeltttd->maxa)
                        ->first();
                    $modellvcc = CompanyLvCc::Leftjoin('town','town.maxa','=','companylvcc.mahuyen')
                        ->join('dmnganhkd','dmnganhkd.manganh','=','companylvcc.manganh')
                        ->join('dmnghekd','dmnghekd.manghe','=','companylvcc.manghe')
                        ->select('companylvcc.*','town.tendv','dmnganhkd.tennganh','dmnghekd.tennghe')
                        ->where('companylvcc.maxa',$modeltttd->maxa)
                        ->get();

                    return view('system.xdtdttdn.show')
                        ->with('model', $model)
                        ->with('modeltttd', $modeltttd)
                        ->with('modellvcc',$modellvcc)
                        ->with('modeltttdct',$modeltttdct)
                        ->with('pageTitle', 'Xét duyệt thông tin doanh nghiệp thay đổi');
                } else
                    return view('errors.perm');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T') {
                if (can('ttdn', 'approve')) {
                    $input = $request->all();
                    $model = TtDnTd::where('id', $input['idtralai'])->first();
                    $model->lydo = $input['lydo'];
                    $model->trangthai = 'BTL';
                    $model->save();
                    if ($model->save()) {
                        $modeldn = Company::where('maxa', $model->maxa)
                            ->first();
                        $modeldv = GeneralConfigs::first();
                        $tg = getDateTime(Carbon::now()->toDateTimeString());
                        $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại yêu cầu thay đổi thông tin doanh nghiệp !!!';
                        $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã trả lại yêu cầu thay đổi thông tin doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.'. Lý do trả lại:'.$input['lydo'].' !!!';
                        $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                        $run->handle();
                        //dispatch($run);
                    };
                    return redirect('xetduyettdttdn?&trangthai=BTL');
                } else
                    return view('errors.perm');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function duyet($id){
        if (Session::has('admin')) {
            if(session('admin')->level == 'T') {
                if (can('ttdn', 'approve')) {
                    $model = TtDnTd::findOrFail($id);
                    $inputs = $model->toArray();
                    unset($inputs['id']);
                    $modeldn = Company::where('maxa', $model->maxa)
                        ->first();
                    if($modeldn->update($inputs)){
                        $modelctdel = CompanyLvCc::where('maxa',$model->maxa)->delete();
                        $modelctdf = TtDnTdCt::where('maxa',$model->maxa);
                        foreach($modelctdf->get() as $ctdf){
                            $modelct = new CompanyLvCc();
                            $modelct->maxa = $ctdf->maxa;
                            $modelct->manganh = $ctdf->manganh;
                            $modelct->manghe = $ctdf->manghe;
                            $modelct->mahuyen = $ctdf->mahuyen;
                            $modelct->trangthai = 'XD';
                            $modelct->save();
                        }
                        $modelctdf->delete();
                    }
                    $model->delete();
                    //send mail
                    $modeldv = GeneralConfigs::first();
                    $tg = getDateTime(Carbon::now()->toDateTimeString());
                    $contentdn = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã duyệt yêu cầu thay đổi thông tin doanh nghiệp !!!';
                    $contentht = 'Vào lúc: '.$tg.', hệ thống CSDL giá đã duyệt yêu cầu thay đổi thông tin doanh nghiệp '.$modeldn->tendn.' - mã số thuế '.$modeldn->maxa.' !!!';
                    $run = new SendMail($modeldn,$contentdn,$modeldv,$contentht);
                    $run->handle();
                    //dispatch($run);
                    return redirect('xetduyettdttdn');
                } else
                    return view('errors.perm');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }
}
