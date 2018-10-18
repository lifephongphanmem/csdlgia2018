<?php

namespace App\Http\Controllers;

use App\Town;
use App\TtDnTd;
use App\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class TdTtDnController extends Controller
{
    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa'){
                $inputs = $request->all();
                $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CD';
                $model = TtDnTd::where('trangthai', $inputs['trangthai'])
                    ->get();
                return view('system.xdtdttdn.index')
                    ->with('model', $model)
                    ->with('trangthai', $inputs['trangthai'])
                    ->with('pageTitle', 'Xét duyệt thông tin doanh nghiệp thay đổi');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function show($id){
        if (Session::has('admin')) {
            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa'){
                $modeltttd = TtDnTd::findOrFail($id);
                $settingdvvttd = !empty($modeltttd->settingdvvt) ? json_decode($modeltttd->settingdvvt) : '';
                $model = Company::where('maxa', $modeltttd->maxa)
                    ->where('level', $modeltttd->level)
                    ->first();
                $settingdvvt = !empty($model->settingdvvt) ? json_decode($model->settingdvvt) : '';
                $model_cqcq = Town::where('maxa', $modeltttd->mahuyen)
                    ->first();
                $model->tencqcq = $model_cqcq->tendv;
                $modeltttd->tencqcq = $model_cqcq->tendv;

                return view('system.xdtdttdn.show')
                    ->with('model', $model)
                    ->with('modeltttd', $modeltttd)
                    ->with('settingdvvt', $settingdvvt)
                    ->with('settingdvvttd', $settingdvvttd)
                    ->with('pageTitle', 'Xét duyệt thông tin doanh nghiệp thay đổi');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function tralai(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {
                $input = $request->all();
                $model = TtDnTd::where('id', $input['idtralai'])->first();
                $model->lydo = $input['lydo'];
                $model->trangthai = 'BTL';
                if ($model->save()) {
                    $tencqcq = Town::where('maxa', $model->mahuyen)->first();
                    $dn = Company::where('maxa', $model->maxa)
                        ->where('level', $model->level)
                        ->first();
                    $data = [];
                    $data['tendn'] = $dn->tendn;
                    $data['tg'] = Carbon::now()->toDateTimeString();
                    $data['tencqcq'] = $tencqcq->tendv;
                    $data['lydo'] = $input['lydo'];
                    $a = $dn->email;
                    $b = $dn->tendn;
                    Mail::send('mail.replychangettdn', $data, function ($message) use ($a, $b) {
                        $message->to($a, $b)
                            ->subject('Thông báo không xét duyệt thay đổi thông tin doanh nghiệp');
                        $message->from('phanmemcsdlgia@gmail.com', 'Phần mềm CSDL giá');
                    });
                };
                return redirect('xetduyettdttdn');
            }else
                return view('errors.perm');
        }else
            return view('errors.notlogin');
    }

    public function duyet($id){
        if (Session::has('admin')) {
            if (session('admin')->sadmin == 'ssa' || session('admin')->sadmin == 'sa') {

                $model = TtDnTd::findOrFail($id);
                $inputs = $model->toArray();
                unset($inputs['id']);
                $modeldn = Company::where('level',$model->level)
                    ->where('maxa',$model->maxa)
                    ->where('mahuyen',$model->mahuyen)
                    ->first();
                $modeldn->update($inputs);
                $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                $data=[];
                $data['tendn'] = $modeldn->tendn;
                $data['tg'] = Carbon::now()->toDateTimeString();
                $data['tencqcq'] = $tencqcq->tendv;
                $a = $model->email;
                $b = $model->tendn;
                Mail::send('mail.successchangettdn',$data, function ($message) use($a,$b) {
                    $message->to($a,$b )
                        ->subject('Thông báo duyệt thay đổi thông tin doanh nghiệp');
                    $message->from('phanmemcsdlgia@gmail.com','Phần mềm CSDL giá');
                });
                $model->delete();
                return redirect('xetduyettdttdn');
            }else
                return view('errors.perm');

        }else
            return view('errors.notlogin');
    }
}
