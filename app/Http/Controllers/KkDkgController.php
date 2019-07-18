<?php

namespace App\Http\Controllers;

use App\Company;
use App\DmMhBinhOnGia;
use App\kkdkg;
use App\kkdkgct;
use App\kkdkgctdf;
use App\Town;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class KkDkgController extends Controller
{
    public function checktt($ma)
    {
        switch ($ma) {
            case "dkgxangdau":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.xangdau','1');
                break;
            case "dkgdien":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.dien','1');
                break;
            case "dkgkhidau":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.khidau','1');
                break;
            case "dkgphan":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.phan','1');
                break;
            case "dkgthuocbvtv":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.thuocbvtv','1');
                break;
            case "dkgvacxingsgc":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.vacxingsgc','1');
                break;
            case "dkgmuoi":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.muoi','1');
                break;
            case "dkgsuate6t":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.suate6t','1');
                break;
            case "dkgduong":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.duong','1');
                break;
            case "dkgthocgao":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.thocgao','1');
                break;
            case "dkgthuocpcb":
                $m_dn = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.thuocpcb','1');
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
                //$model = $this->checktt($inputs['ma']); Viết khó hiểu vcl
                $model = Company::join('town','town.maxa','=','company.mahuyen')
                    ->select('company.*','town.tendv')
                    ->where('company.pl',$inputs['ma']);
                $model= $model->where('company.mahuyen',$inputs['maxa'])->get();

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
    public function index(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mh'] = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
            if(session('admin')->level == 'T' || session('admin')->level == 'H' || session('admin')->level == 'X')
                $inputs['masothue'] = isset($inputs['masothue']) ? $inputs['masothue'] : '';
            else
                $inputs['masothue'] = session('admin')->maxa;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['trangthai'] = isset($inputs['trangthai']) ? $inputs['trangthai'] : 'CC';

            $model = kkdkg::where('maxa', $inputs['masothue'])
                ->whereYear('ngaynhap', $inputs['nam'])
                ->where('trangthai', $inputs['trangthai'])
                ->orderBy('id', 'desc')
                ->get();
            $modeldn = Company::where('level','DKG')
                ->where('pl',$inputs['ma'])
                ->where('maxa',$inputs['masothue'])
                ->first();
            //dd($modeldn);
            //$modeldn= $modeldn->where('company.maxa', $inputs['masothue'])->first();
            return view('manage.kkgia.dkg.dangkygia.index')
                ->with('model', $model)
                ->with('modeldn', $modeldn)
                ->with('nam', $inputs['nam'])
                ->with('trangthai', $inputs['trangthai'])
                ->with('masothue', $inputs['masothue'])
                ->with('inputs',$inputs)
                ->with('pageTitle', 'Danh sách hồ sơ kê khai mặt hàng BOG');

        }else
            return view('errors.notlogin');
    }
    public function create(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelct = kkdkgctdf::where('maxa',$inputs['masothue'])->get();

            //$modeldn = $this->checktt($inputs['ma']);
            //$modeldn= $modeldn->where('company.maxa', $inputs['masothue'])->first();
            $modeldn = Company::where('level','DKG')
                ->where('pl',$inputs['ma'])
                ->where('maxa',$inputs['masothue'])
                ->first();
            $datenow = date('Y-m-d');
            $ngayhieuluc = date('d/m/Y', strtotime(getNgayHieuLuc($datenow,'TPCNTE6T')));
            $ngaynhap = date('d/m/Y', strtotime($datenow));

            return view('manage.kkgia.dkg.dangkygia.create')
                ->with('modeldn', $modeldn)
                ->with('maxa', $inputs['masothue'])
                ->with('ma', $inputs['ma'])
                ->with('ngaynhap', $ngaynhap)
                ->with('ngayhieuluc', $ngayhieuluc)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Kê khai giá mặt hàng BOG');


        }else
            return view('errors.notlogin');
    }
    public function store(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mahs'] = $inputs['maxa'].getdate()[0];
            $inputs['ngaynhap'] = getDateToDb($inputs['ngaynhap']);
            $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
            if($inputs['ngaycvlk'] != '')
                $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
            else
                unset($inputs['ngaycvlk']);
            $inputs['trangthai'] = 'CC';
            if(isset($inputs['ipf1']) && $inputs['ipf1'] !='' ) {
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/kkdkg/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = new kkdkg();
            if($model->create($inputs)){
                $modelctdf = kkdkgctdf::where('maxa',$inputs['maxa']);
                foreach($modelctdf->get() as $ctdf){
                    $modelct = new kkdkgct();
                    $modelct->maxa = $inputs['maxa'];
                    $modelct->mahuyen = $inputs['mahuyen'];
                    $modelct->mahs = $inputs['mahs'];
                    $modelct->tenhh= $ctdf->tenhh;
                    $modelct->quycach= $ctdf->quycach;
                    $modelct->dvt= $ctdf->dvt;
                    $modelct->gialk= $ctdf->gialk;
                    $modelct->giakk= $ctdf->giakk;
                    $modelct->ghichu= $ctdf->ghichu;
                    $modelct->save();
                }
                $modelctdf->delete();
            }
            return redirect('hosokkdkg/?&ma='.$inputs['ma'].'&masothue='.$inputs['maxa']);

        }else
            return view('errors.notlogin');
    }
    public function edit($id){
        if (Session::has('admin')) {
            //Kiểm tra có thuộc sự quản lý hay k

            $model = kkdkg::findOrFail($id);
            //$modeldn = $this->checktt($model->phanloai);
            //$modeldn= $modeldn->where('company.maxa', $model->maxa)->first();
            $modeldn = Company::where('level','DKG')
                ->where('pl',$model->phanloai)
                ->where('maxa',$model->maxa)
                ->first();
            $modelct = kkdkgct::where('mahs',$model->mahs)
                ->get();

            return view('manage.kkgia.dkg.dangkygia.edit')
                ->with('modeldn', $modeldn)
                ->with('model',$model)
                ->with('modelct',$modelct)
                ->with('pageTitle', 'Chỉnh sửa hồ sơ kê khai giá mật hàng BOG');
        }else
            return view('errors.notlogin');
    }
    public function update(Request $request,$id){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['ngayhieuluc'] = getDateToDb($inputs['ngayhieuluc']);
            if($inputs['ngaycvlk'] != '')
                $inputs['ngaycvlk']= getDateToDb($inputs['ngaycvlk']);
            else
                unset($inputs['ngaycvlk']);
            if(isset($inputs['ipf1']) && $inputs['ipf1'] !='' ) {
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/kkdkg/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            $model = kkdkg::findOrFail($id);
            $model->update($inputs);
            return redirect('kkdkg/?&ma='.$inputs['ma'].'&masothue='.$inputs['maxa']);
        }else
            return view('errors.notlogin');
    }
    public function delete(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = kkdkg::where('id',$inputs['iddelete'])
                ->first();
            if($model->delete()){
                $modelct = kkdkgct::where('mahs',$model->mahs)
                    ->delete();
            }
            return redirect('kkdkg/?&ma='.$model->phanloai.'&masothue='.$model->maxa);
        }else
            return view('errors.notlogin');
    }

    public function kiemtra(Request $request){
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
            $model = kkdkg::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="tthschuyen">';
            $result['message'] .= '<label> Số CV: '.$model->socv.'- Ngày áp dụng: '.getDayVn($model->ngayhieuluc).'</label>';
            $result['message'] .= '</div>';
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function show(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $modelkk = kkdkg::where('mahs',$inputs['mahs'])->first();
            //$modeldn = $this->checktt($modelkk->phanloai);
            //$modeldn= $modeldn->where('company.maxa', $modelkk->maxa)->first();
            $modeldn = Company::where('level','DKG')
                ->where('pl',$modelkk->phanloai)
                ->where('maxa',$modelkk->maxa)
                ->first();
            $modelkkct = kkdkgct::where('mahs',$modelkk->mahs)
                ->get();
            $modelcqcq = Town::where('maxa',$modeldn->mahuyen)
                ->first();
            return view('manage.kkgia.dkg.reports.print')
                ->with('modelkk',$modelkk)
                ->with('modeldn',$modeldn)
                ->with('modelkkct',$modelkkct)
                ->with('modelcqcq',$modelcqcq)
                ->with('pageTitle','Hồ sơ kê khai giá');

        }else
            return view('errors.notlogin');
    }

    public function chuyen(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = kkdkg::where('id',$inputs['idchuyen'])
                ->first();
            $inputs['trangthai'] = 'CD';
            $inputs['ngaychuyen'] = Carbon::now()->toDateTimeString();
                $model->update($inputs);
            /*
            if($model->update($inputs)){
                $tencqcq = Town::where('maxa',$model->mahuyen)->first();
                $dn = Company::where('maxa',$model->maxa)
                    ->where('level','TPCNTE6T')
                    ->first();
                $data=[];
                $data['tendn'] = $dn->tendn;
                $data['masothue'] = $model->maxa;
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
             */
            return redirect('hosokkdkg/?&ma='.$model->phanloai.'&masothue='.$model->maxa.'&trangthai='.$model->trangthai);

        }else
            return view('errors.notlogin');
    }

    public function search(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $inputs['mh'] = DmMhBinhOnGia::where('phanloai',$inputs['ma'])->first()->hienthi;
            $inputs['nam'] = isset($inputs['nam']) ? $inputs['nam'] : date('Y');
            $inputs['tenhh'] = isset($inputs['tenhh']) ? $inputs['tenhh'] : '';
            $model = kkdkgct::leftJoin('kkdkg','kkdkg.mahs','=','kkdkgct.mahs')
                ->leftjoin('company','company.maxa','=','kkdkg.maxa')
                ->whereYear('kkdkg.ngayhieuluc',$inputs['nam'])
                ->select('kkdkgct.*','company.tendn','kkdkg.ngayhieuluc')
                ->where('phanloai',$inputs['ma'])
                ->wherein('kkdkg.trangthai',['DD','CB']);
            if($inputs['tenhh'] != '')
                $model = $model->where('kkdkgct.tenhh','like','%'.$inputs['tenhh'].'%');
            $model = $model->get();

            return view('manage.kkgia.dkg.timkiem.index')
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Tìm kiếm thông tin kê khai giá ' .$inputs['mh']);
        }else
            return view('errors.notlogin');
    }

}
