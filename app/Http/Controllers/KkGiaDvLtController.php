<?php

namespace App\Http\Controllers;

use App\CsKdDvLt;
use App\KkGiaDvLt;
use App\Company;
use App\KkGiaDvLtCt;
use App\KkGiaDvLtCtDf;
use App\Town;
use App\TtNgayNghiLe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KkGiaDvLtController extends Controller
{
    public function ttcskd(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $model = CsKdDvLt::join('company','company.maxa','=','cskddvlt.maxa')
                    ->where('company.level','DVLT')
                    ->select('cskddvlt.*','company.tendn');

                if(session('admin')->level == 'T' || session('admin')->level == 'H') {
                    if(session('admin')->level == 'H')
                        $modeldv = Town::where('mahuyen',session('admin')->mahuyen)->get();
                }elseif(session('admin')->level == 'X') {
                    $model = $model->where('cskddvlt.mahuyen', session('admin')->mahuyen);
                }else {
                    $model = $model->where('cskddvlt.mahuyen', session('admin')->mahuyen)
                        ->where('cskddvlt.maxa', session('admin')->maxa);
                }
                $model = $model->get();
                return view('manage.kkgia.dvlt.kkgia.kkgiadv.ttcskd')
                    ->with('model', $model)
                    ->with('pageTitle', 'Danh sách cơ sở kinh doanh dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function index(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['macskd'] = isset($inputs['macskd']) ? $inputs['macskd'] : '';
                $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');

                $model = KkGiaDvLt::where('macskd',$inputs['macskd'])
                    ->whereYear('ngaynhap', $inputs['nam'])
                    ->orderBy('id','desc')
                    ->get();
                $modelcskd = CsKdDvLt::where('macskd',$inputs['macskd'])->first();
                $modeldn = Company::where('maxa',$modelcskd->maxa)
                    ->where('level','DVLT')->first();
                return view('manage.kkgia.dvlt.kkgia.kkgiadv.index')
                    ->with('model', $model)
                    ->with('modelcskd',$modelcskd)
                    ->with('modeldn',$modeldn)
                    ->with('nam',$inputs['nam'])
                    ->with('macskd',$inputs['macskd'])
                    ->with('pageTitle', 'Danh sách hồ sơ kê khai dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelcskd = CsKdDvLt::where('macskd', $inputs['macskd'])->first();
            $modeldn = Company::where('maxa', $inputs['masothue'])
                ->where('level', 'DVLT')->first();
            $datenow = date('Y-m-d');
            $ngayhieuluc = date('d/m/Y', strtotime(getNgayHieuLuc($datenow,'DVLT')));
            $ngaynhap = date('d/m/Y', strtotime($datenow));
            $modelct =  KkGiaDvLtCtDf::where('kkgiadvltctdf.maxa',$inputs['masothue'])
                ->leftJoin('dtapdungdvlt','dtapdungdvlt.madtad','=','kkgiadvltctdf.madtad')
                ->select('kkgiadvltctdf.*','dtapdungdvlt.tendtad')
                ->get();
            return view('manage.kkgia.dvlt.kkgia.kkgiadv.create')
                ->with('modelcskd', $modelcskd)
                ->with('modeldn', $modeldn)
                ->with('macskd', $inputs['macskd'])
                ->with('maxa', $inputs['masothue'])
                ->with('ngaynhap', $ngaynhap)
                ->with('ngayhieuluc', $ngayhieuluc)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function store(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H'|| session('admin')->level == 'X') {
                $inputs = $request->all();
                $inputs['mahs'] = $inputs['macskd'].getdate()[0];
                $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $inputs['trangthai'] = 'CC';
                $model = new KkGiaDvLt();
                if($model->create($inputs)){
                    $modelctdf = KkGiaDvLtCtDf::where('maxa',$inputs['maxa'])->get();
                    foreach($modelctdf as $ctdf){
                        $modelct = new KkGiaDvLtCt();
                        $modelct->mahs = $inputs['mahs'];
                        $modelct->madtad = $ctdf->madtad;
                        $modelct->loaip = $ctdf->loaip;
                        $modelct->qccl = $ctdf->qccl;
                        $modelct->sohieu = $ctdf->sohieu;
                        $modelct->ghichu = $ctdf->ghichu;
                        $modelct->mucgialk = $ctdf->mucgialk;
                        $modelct->mucgiakk = $ctdf->mucgiakk;
                        $modelct->save();
                    }

                }
                return redirect('kekhaigiadvlt?&macskd='.$inputs['macskd']);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();
            $mahs = $input['mahs'];
            $modelkk = KkGiaDvLt::where('mahs',$mahs)->first();
            $modeldn = Company::where('maxa',$modelkk->maxa)
                ->where('level','DVLT')
                ->first();
            $modelcskd = CsKdDvLt::where('macskd',$modelkk->macskd)
                ->first();
            $modelkkct = KkGiaDvLtCt::leftjoin('dtapdungdvlt','dtapdungdvlt.madtad','=','kkgiadvltct.madtad')
                ->select('kkgiadvltct.*','dtapdungdvlt.tendtad')
                ->where('kkgiadvltct.mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('reports.kkgdvlt.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelcskd',$modelcskd)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Kê khai giá dịch vụ lưu trú');

        }else
            return view('errors.notlogin');
    }

    public function edit($id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = KkGiaDvLt::findOrFail($id);
                $modelcskd = CsKdDvLt::where('macskd',$model->macskd)->first();
                $modeldn = Company::where('maxa',$model->maxa)
                    ->where('level', 'DVLT')->first();
                $modelct = KkGiaDvLtCt::where('mahs',$model->mahs)
                    ->leftJoin('dtapdungdvlt','dtapdungdvlt.madtad','=','kkgiadvltct.madtad')
                    ->select('kkgiadvltct.*','dtapdungdvlt.tendtad')
                    ->get();
                return view('manage.kkgia.dvlt.kkgia.kkgiadv.edit')
                    ->with('model', $model)
                    ->with('modelcskd',$modelcskd)
                    ->with('modeldn',$modeldn)
                    ->with('modelct',$modelct)
                    ->with('pageTitle', 'Chỉnh sửa hồ sơ kê khai giá dịch vụ lưu trú');
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function update(Request $request,$id){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $model = KkGiaDvLt::findOrFail($id);
                $inputs = $request->all();
                unset($inputs['ngaynhap']);
                $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
                if($inputs['ngaycvlk'] != '')
                    $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
                else
                    unset($inputs['ngaycvlk']);
                $model->update($inputs);
                return redirect('kekhaigiadvlt?&macskd='.$model->macskd);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function ktchuyendvlt(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => '"Ngày thực hiện mức giá kê khai không thể sử dụng được! Bạn cần chỉnh sửa lại thông tin trước khi chuyển", "Lỗi!!!"',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => '"Bạn cần đăng nhập tài khoản để chuyển hồ so", "Lỗi!!!"',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();
        $ngaychuyen = Carbon::now()->toDateTimeString();
        if(isset($inputs['id'])){
            $model = KkGiaDvLt::where('id',$inputs['id'])
                ->first();
            $date = date_create($ngaychuyen);
            $datenew = date_modify($date, "+1 days");
            $ngaychuyen = date_format($datenew, "Y-m-d");
            $ngayduyet = $model->ngayhieuluc;
            $ngaylv = 0;
            while (strtotime($ngaychuyen) <= strtotime($ngayduyet)) {
                $checkngay = TtNgayNghiLe::where('ngaytu', '<=', $ngaychuyen)
                    ->where('ngayden', '>=', $ngaychuyen)->first();
                if (count($checkngay) > 0)
                    $ngaylv = $ngaylv;
                elseif (date('D', strtotime($ngaychuyen)) == 'Sat')
                    $ngaylv = $ngaylv;
                elseif (date('D', strtotime($ngaychuyen)) == 'Sun')
                    $ngaylv = $ngaylv;
                else
                    $ngaylv = $ngaylv + 1;
                $datestart = date_create($ngaychuyen);
                $datestartnew = date_modify($datestart, "+1 days");
                $ngaychuyen = date_format($datestartnew, "Y-m-d");

            }
            if ($ngaylv >= (isset(getGeneralConfigs()['thoihan_lt']) ? getGeneralConfigs()['thoihan_lt'] : 2)) {
                $result['message'] = '<div class="form-group" id="tthschuyen">';
                $result['message'] .= '<label style="text-align: center;font-weight: bold;color: blue" > Số CV: '.$model->socv.'- Ngày áp dụng: '.getDayVn($model->ngayhieuluc).'</label>';
                $result['message'] .= '</div>';
                $result['status'] = 'success';
            }else{
                $result['status'] = 'fail';
                $result['message'] = '"Ngày áp dụng hồ sơ không đủ điều kiện xét duyệt", "Lỗi!!!"';
            }

        }
        //dd($result);
        die(json_encode($result));
    }

    public function chuyen(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H' ) {
                $inputs = $request->all();
                $model = KkGiaDvLt::where('id',$inputs['idchuyen'])
                    ->first();
                $inputs['trangthai'] = 'CD';
                $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                if($model->update($inputs)){
                    $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                    $dn = Company::where('maxa',$model->maxa)->first();
                    $data=[];
                    $data['tendn'] = $dn->tendn;
                    $data['masothue'] = $model->masothue;
                    $data['tg'] = $inputs['ngaychuyen'];
                    $data['tencqcq'] = $tencqcq->tendv;
                    $data['ttnguoinop'] = $inputs['ttnguoinop'];
                    $maildn = $dn->email;
                    $tendn = $dn->tendn;
                    $mailql = $tencqcq->emailql;
                    $tenql = $tencqcq->tendv;

                    Mail::send('mail.kkgia',$data, function ($message) use($maildn,$tendn,$mailql,$tenql) {
                        $message->to($maildn,$tendn)
                            ->to($mailql,$tenql)
                            ->subject('Thông báo nhận hồ sơ kê khai giá dịch vụ');
                        $message->from('phanmemcsdlgia@gmail.com','Phần mềm CSDL giá');
                    });
                }
                return redirect('kekhaigiadvlt?&macskd='.$model->macskd);
            }else{
                return view('errors.perm');
            }

        }else
            return view('errors.notlogin');
    }

    public function showlydo(Request $request){
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if(!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if(isset($inputs['id'])){
            $model = KkGiaDvLt::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="showlydo">';
            $result['message'] = '<label style="font-weight: bold;color: blue">'.$model->lydo.'</lable>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';

        }
        die(json_encode($result));
    }

    public function delete(Request $request){
        if (Session::has('admin')) {
            if (session('admin')->level == 'DVLT' || session('admin')->level == 'T' || session('admin')->level == 'H') {
                $inputs = $request->all();
                $model = KkGiaDvLt::where('id',$inputs['iddelete'])
                    ->first();
                if($model->delete()){
                    $modelct = KkGiaDvLtCt::where('mahs',$model->mahs)
                        ->delete();
                }
                return redirect('kekhaigiadvlt?&macskd='.$model->macskd);
            }else{
                return view('errors.perm');
            }
        }else
            return view('errors.notlogin');
    }
}
