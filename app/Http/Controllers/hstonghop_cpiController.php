<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\dmhanghoa_cpi;
use App\hsgia_cpi;
use App\hsgia_cpi_chitiet;
use App\hstonghop_cpi;
use App\hstonghop_cpi_chitiet;
use App\Town;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class hstonghop_cpiController extends Controller
{
    function index(Request $requests)
    {
        if (Session::has('admin')) {
            //text-danger; text-warning; text-success
            $a_data = array(array('thang' => '01', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '02', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '03', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '04', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '05', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '06', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '07', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '08', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '09', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '10', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '11', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '12', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
            );
            $a_trangthai=array('CHUAHS'=>'Chưa tạo hồ sơ','CHUATH'=>'Chưa tổng hợp dữ liệu'
                ,'CHOCHUYEN'=>'Chưa chuyển dữ liệu','DACHUYEN'=>'Đã chuyển dữ liệu','TRALAI'=>'Trả lại dữ liệu','DANHAN'=>'Đã nhận hồ sơ');

            $inputs = $requests->all();
            $model_hs = hsgia_cpi::where('maxa', session('admin')->maxa)->where('nam', $inputs['nam'])->get();
            $model_th = hstonghop_cpi::where('maxa', session('admin')->maxa)->where('nam', $inputs['nam'])->get();
            $a_dv =array_column(District::all()->toArray(),'tendv','mahuyen');
            //$model_bangluong = bangluong::where('madv', session('admin')->madv)->where('nam', $inputs['nam'])->get();
            for ($i = 0; $i < count($a_data); $i++) {
                $a_data[$i]['ngaygui'] = '';
                $a_data[$i]['mahuyen'] = '';
                $a_data[$i]['tenhuyen'] = '';
                //có hồ sơ chưa
                $hoso = $model_hs->where('thang', $a_data[$i]['thang'])->first();

                //chk tổng hợp
                $tonghop = $model_th->where('thang', $a_data[$i]['thang'])->first();
                if(count($hoso) > 0){
                    if (count($tonghop) > 0) {
                        $a_data[$i]['mahs'] = $tonghop->mahs;
                        $a_data[$i]['trangthai'] = $tonghop->trangthai;
                        $a_data[$i]['ngaychuyen'] = $tonghop->ngaychuyen;
                        $a_data[$i]['mahuyen'] = $tonghop->mahuyen;
                        $a_data[$i]['tenhuyen'] = $tonghop->mahuyen;
                    }else{
                        $a_data[$i]['trangthai'] = 'CHUATH';
                    }
                }

                $a_data[$i]['tentrangthai'] = isset($a_trangthai[$a_data[$i]['trangthai']]) ? $a_trangthai[$a_data[$i]['trangthai']] : '';
                $a_data[$i]['tenhuyen'] = isset($a_dv[$a_data[$i]['mahuyen']]) ? $a_dv[$a_data[$i]['mahuyen']] : '';
            }
            //dd($model);
            //dd($a_data);
            return view('manage.vanbanqlnn.giatieudung.tonghop.index')
                //->with('furl', '/chuc_nang/tong_hop_luong/don_vi/')
                ->with('nam', $inputs['nam'])
                ->with('model', $a_data)
                //->with('a_trangthai', $a_trangthai)
                //->with('model_dv', $model_dv)
                ->with('pageTitle', 'Danh sách tổng hợp lương tại đơn vị');
        } else
            return view('errors.notlogin');
    }

    function tonghop(Request $requests)
    {//tổng hợp chỉ số cho 1 huyện
        if (Session::has('admin')) {
            $inputs = $requests->all();
            //$model = dmhanghoa_cpi::all();
            //lấy hồ sơ cuối cùng trong tháng
            $model_hs = hsgia_cpi::where('thang',$inputs['thang'])->where('nam',$inputs['nam'])
                ->where('maxa',session('admin')->maxa)->first();
            $model_hs_ct = hsgia_cpi_chitiet::where('mahs',$model_hs->mahs)->get();
            $mahs = getdate()[0];
            $a_data = array();
            //lấy nhóm 4
            $m_nhom4 = $model_hs_ct->where('capdo', 4);
            foreach($m_nhom4 as $ct){
                $ct->chiso =round(($ct->giaden/$ct->giatu)*100,2);
                $ct->mahs = $mahs;
                $ct->giahh = $ct->giaden;
                $a_data[] = $ct->toarray();
            }

            //lấy nhóm 3
            $m_nhom3 = $model_hs_ct->where('capdo', 3);
            foreach($m_nhom3 as $ct){
                $nhom4 = $m_nhom4->where('magoc', $ct->mahh);
                $phantu = $tong = 0;
                foreach($nhom4 as $pt){
                    if($pt->chiso > 0){
                        $phantu += 1;
                        $tong += $pt->chiso;
                    }
                }
                $ct->chiso = $phantu > 0 ? $tong/$phantu: 0;
                $ct->mahs = $mahs;
                $ct->giahh = $ct->giaden;
                $a_data[] = $ct->toarray();
            }

            //lấy nhóm 2
            $m_nhom2 = $model_hs_ct->where('capdo', 2);
            foreach($m_nhom2 as $ct){
                $nhom3 = $m_nhom3->where('magoc', $ct->mahh);
                $quyenso = $tong = 0;
                foreach($nhom3 as $pt){
                    if($pt->chiso > 0){
                        $quyenso += $pt->quyenso;
                        $tong += $pt->chiso * $pt->quyenso;
                    }
                }
                $ct->chiso = $quyenso > 0 ? $tong/$quyenso: 0;
                $ct->mahs = $mahs;
                $ct->giahh = $ct->giaden;
                $a_data[] = $ct->toarray();
            }

            //lấy nhóm 1
            $m_nhom1 = $model_hs_ct->where('capdo', 1);
            foreach($m_nhom1 as $ct){
                $nhom2 = $m_nhom2->where('magoc', $ct->mahh);
                $quyenso = $tong = 0;
                foreach($nhom2 as $pt){
                    if($pt->chiso > 0){
                        $quyenso += $pt->quyenso;
                        $tong += $pt->chiso * $pt->quyenso;
                    }
                }
                $ct->chiso = $quyenso > 0 ? $tong/$quyenso: 0;
                $ct->mahs = $mahs;
                $ct->giahh = $ct->giaden;
                $a_data[] = $ct->toarray();
            }


            $a_col_cb = array('id','created_at','updated_at', 'giaden', 'giatu');
            $a_data = unset_key($a_data,$a_col_cb);

            $model = new hstonghop_cpi();
            $model->mahs = $mahs;
            $model->thang = $inputs['thang'];
            $model->nam = $inputs['nam'];
            $model->maxa = session('admin')->maxa;
            $model->district = session('admin')->district;
            $model->trangthai = 'CHOCHUYEN';
            $model->tgnhap = date('Y-m-d');
            $model->save();


            $model_hs->trangthai = 'TONGHOP';
            $model_hs->save();
            foreach(array_chunk($a_data, 100)  as $data){
                hstonghop_cpi_chitiet::insert($data);
            }

            return redirect('hstonghopcpi/show?hoso='.$mahs);
        } else
            return view('errors.notlogin');
    }

    function show(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model_hs = hstonghop_cpi::where('mahs',$inputs['hoso'])->first();
            $model = hstonghop_cpi_chitiet::where('mahs',$inputs['hoso'])->get();
            //dd($model_hh);
            return view('manage.vanbanqlnn.giatieudung.tonghop.show')
                ->with('model',$model)
                ->with('model_hs',$model_hs)
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa tiêu dùng');
        }else
            return view('errors.notlogin');
    }

    function chuyen(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = hstonghop_cpi::where('mahs',$inputs['mahs_chuyen'])->first();
            $model->trangthai = 'DACHUYEN';
            $model->ngaychuyen = date('Y-m-d');
            $model->mahuyen = session('admin')->mahuyen;
            $model->ttnguoinop = $inputs['ttnguoinop_chuyen'];
            $model->save();
            /*Lịch sử
            if($model->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->mahs = $model->mahs;
                $modelh->thaotac = 'Hoàn tất hồ sơ';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }
            */
            return redirect('hstonghopcpi/danhsach?nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    function destroy(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = hstonghop_cpi::where('mahs',$inputs['mahs_delete'])->first();
            $model->delete();
            return redirect('hstonghopcpi/danhsach?nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    function view(Request $requests)
    {
        if (Session::has('admin')) {
            $a_data = array(array('thang' => '01', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '02', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '03', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '04', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '05', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '06', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '07', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '08', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '09', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '10', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '11', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '12', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
            );
            $a_trangthai=array('CHUAHS'=>'Chưa tạo hồ sơ','CHUATH'=>'Chưa tổng hợp dữ liệu'
            ,'CHOCHUYEN'=>'Chưa chuyển dữ liệu','DACHUYEN'=>'Đã chuyển dữ liệu','TRALAI'=>'Trả lại dữ liệu','DANHAN'=>'Đã nhận hồ sơ');


            $inputs = $requests->all();
            $model_diaban = DiaBanHd::all();
            $a_dv = array_column(District::all()->toArray(),'tendv','mahuyen');
            //$model_diaban = array_column(DiaBanHd::all()->toArray(),'diaban','district');
            //dd($model_diaban);
            $district = '';
            if(isset($inputs['diaban'])){
                $district = $inputs['diaban'];
            }else{
                $district = count($model_diaban) > 0? $model_diaban->first()->district : '';
            }

            $model_th = hstonghop_cpi::where('district', $district)->where('nam', $inputs['nam'])->get();

            //$model_bangluong = bangluong::where('madv', session('admin')->madv)->where('nam', $inputs['nam'])->get();
            for ($i = 0; $i < count($a_data); $i++) {
                $a_data[$i]['mahuyen'] = '';
                $hoso = $model_th->where('thang', $a_data[$i]['thang'])->first();
                if(count($hoso) > 0){
                    $a_data[$i]['mahs'] = $hoso->mahs;
                    $a_data[$i]['trangthai'] = $hoso->trangthai;
                    $a_data[$i]['mahuyen'] = $hoso->mahuyen;
                }
                $a_data[$i]['tentrangthai'] = isset($a_trangthai[$a_data[$i]['trangthai']]) ? $a_trangthai[$a_data[$i]['trangthai']] : '';
                $a_data[$i]['tenhuyen'] = isset($a_dv[$a_data[$i]['mahuyen']]) ? $a_dv[$a_data[$i]['mahuyen']] : '';
            }
            //dd($model);
            //dd($a_data);
            return view('manage.vanbanqlnn.giatieudung.thongtin.index')
                //->with('furl', '/chuc_nang/tong_hop_luong/don_vi/')
                ->with('nam', $inputs['nam'])
                ->with('district', $district)
                ->with('model', $a_data)
                ->with('a_trangthai', $a_trangthai)
                ->with('a_diaban', array_column($model_diaban->toArray(),'diaban','district'))
                ->with('pageTitle', 'Danh sách tổng hợp lương tại đơn vị');
        } else
            return view('errors.notlogin');
    }

    function detail(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model_hs = hstonghop_cpi::where('mahs',$inputs['hoso'])->first();
            $model = hstonghop_cpi_chitiet::where('mahs',$inputs['hoso'])->get();
            //dd($model_hh);
            return view('manage.vanbanqlnn.giatieudung.thongtin.show')
                ->with('model',$model)
                ->with('model_hs',$model_hs)
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa tiêu dùng');
        }else
            return view('errors.notlogin');
    }

    function xetduyet(Request $requests)
    {
        if (Session::has('admin')) {
            $a_data = array(array('thang' => '01', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '02', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '03', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '04', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '05', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '06', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '07', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '08', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '09', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '10', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '11', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
                array('thang' => '12', 'mahs' => null, 'trangthai'=> 'CHUAHS'),
            );
            $a_trangthai=array('CHUAHS'=>'Chưa tạo hồ sơ','CHUATH'=>'Chưa tổng hợp dữ liệu'
            ,'CHOCHUYEN'=>'Chưa chuyển dữ liệu','DACHUYEN'=>'Đã chuyển dữ liệu','TRALAI'=>'Trả lại dữ liệu','DANHAN'=>'Đã nhận hồ sơ');


            $inputs = $requests->all();
            $model_diaban = DiaBanHd::all();
            $a_dv = array_column(District::all()->toArray(),'tendv','mahuyen');
            //$model_diaban = array_column(DiaBanHd::all()->toArray(),'diaban','district');
            //dd($model_diaban);
            $district = '';
            if(isset($inputs['diaban'])){
                $district = $inputs['diaban'];
            }else{
                $district = count($model_diaban) > 0? $model_diaban->first()->district : '';
            }

            $model_th = hstonghop_cpi::where('district', $district)->where('nam', $inputs['nam'])->get();

            //$model_bangluong = bangluong::where('madv', session('admin')->madv)->where('nam', $inputs['nam'])->get();
            for ($i = 0; $i < count($a_data); $i++) {
                $a_data[$i]['mahuyen'] = '';
                $hoso = $model_th->where('thang', $a_data[$i]['thang'])->first();
                if(count($hoso) > 0){
                    $a_data[$i]['mahs'] = $hoso->mahs;
                    $a_data[$i]['trangthai'] = $hoso->trangthai;
                    $a_data[$i]['mahuyen'] = $hoso->mahuyen;
                }
                $a_data[$i]['tentrangthai'] = isset($a_trangthai[$a_data[$i]['trangthai']]) ? $a_trangthai[$a_data[$i]['trangthai']] : '';
                $a_data[$i]['tenhuyen'] = isset($a_dv[$a_data[$i]['mahuyen']]) ? $a_dv[$a_data[$i]['mahuyen']] : '';
            }
            //dd($model);
            //dd($a_data);
            return view('manage.vanbanqlnn.giatieudung.xetduyet.index')
                //->with('furl', '/chuc_nang/tong_hop_luong/don_vi/')
                ->with('nam', $inputs['nam'])
                ->with('district', $district)
                ->with('model', $a_data)
                ->with('a_trangthai', $a_trangthai)
                ->with('a_diaban', array_column($model_diaban->toArray(),'diaban','district'))
                ->with('pageTitle', 'Danh sách tổng hợp chỉ số giá');
        } else
            return view('errors.notlogin');
    }

    function baocao(Request $requests)
    {
        if (Session::has('admin')) {

            $model_diaban = DiaBanHd::all();
            //dd($a_data);
            return view('manage.vanbanqlnn.giatieudung.baocao.index')
                //->with('furl', '/chuc_nang/tong_hop_luong/don_vi/')
                ->with('a_diaban', array_column($model_diaban->toArray(),'diaban','district'))
                ->with('pageTitle', 'Báo cáo chỉ số giá tiêu dùng');
        } else
            return view('errors.notlogin');
    }

    function nhanhs(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            //dd($inputs);
            $model = hstonghop_cpi::where('mahs',$inputs['mahs_nhan'])->first();
            $model->trangthai = 'DANHAN';
            $model->ngaynhan = date('Y-m-d');
            //$model->mahuyen = session('admin')->mahuyen;
            //$model->ttnguoinop = $inputs['ttnguoinop_chuyen'];
            $model->save();
            /*Lịch sử
            if($model->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->mahs = $model->mahs;
                $modelh->thaotac = 'Hoàn tất hồ sơ';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }
            */
            return redirect('xetduyetcpi/danhsach?nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    function tralai(Request $request){
        if(Session::has('admin')){
            $inputs = $request->all();
            //dd($inputs);
            $model = hstonghop_cpi::where('mahs',$inputs['mahs_tralai'])->first();
            $model->trangthai = 'TRALAI';
            //$model->ngaynhan = date('Y-m-d');
            $model->lydo = $inputs['lydo'];
            //$model->mahuyen = session('admin')->mahuyen;
            //$model->ttnguoinop = $inputs['ttnguoinop_chuyen'];
            $model->save();
            /*Lịch sử
            if($model->save()){
                $modelh = new ThamDinhGiaH();
                $modelh->mahs = $model->mahs;
                $modelh->thaotac = 'Hoàn tất hồ sơ';
                $modelh->name = session('admin')->name;
                $modelh->username = session('admin')->username;
                $modelh->save();
            }
            */
            return redirect('xetduyetcpi/danhsach?nam='.$model->nam);
        }else
            return view('errors.notlogin');
    }

    function get_lydo(Request $request)
    {
        $inputs = $request->all();
        $model = hstonghop_cpi::where('mahs',$inputs['mahs'])->first();
        die(json_encode($model));

    }

    public function bctonghop(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model_hs = hstonghop_cpi::where('thang',$inputs['thang'])
                ->where('nam',$inputs['nam'])
                //->where("trangthai" , "DAGUI")
                ->get();

            $model_ct = hstonghop_cpi_chitiet::wherein('mahs',array_column($model_hs->toarray(),'mahs'))
                ->get();

            $model = dmhanghoa_cpi::where('capdo','<=',$inputs['capdo'])->get();
            foreach($model as $ct) {
                $chiso = $i = 0;
                $chitiet = $model_ct->where('mahh', $ct->mahh);
                foreach ($chitiet as $gia) {
                    $chiso += $gia->chiso;
                    $i++;
                }
                $ct->chiso = $i > 0 ? round($chiso / $i, 2) : 0;
            }

            return view('manage.vanbanqlnn.giatieudung.baocao.tonghop')
                //->with('thongtin',$thongtin)
                ->with('model',$model)
                ->with('inputs',$inputs)
                ->with('pageTitle','Phụ lục 1');
        }else
            return view('errors.notlogin');
    }

    /*
     *
     public function PL1_th(Request $request){
        if (Session::has('admin')) {
            $inputs=$request->all();

            $model_hs = HsGiaHhTt::select('mahs','mahuyen','tgnhap')
                ->wherebetween('tgnhap',[$inputs['ngaytu'],$inputs['ngayden']])

                ->where('thitruong',$inputs['thitruong'])
                ->where("trangthai" , "Hoàn tất")
                ->where('phanloai' , 'CHITIET')
                ->get();

            $model_max = HsGiaHhTt::select('mahuyen',DB::raw('Max(tgnhap) as tgnhap') )
                ->where('thitruong',$inputs['thitruong'])
                ->wherebetween('tgnhap',[$inputs['ngaytu'],$inputs['ngayden']])
                ->where("trangthai" , "Hoàn tất")
                ->where('phanloai' , 'CHITIET')
                ->groupby('mahuyen')->get();;
            $a_hoso = array();
            $a_huyen = array();
            foreach($model_max as $ct){
                //dd($model->where('mahuyen',$ct->mahuyen)->where('tgnhap',$ct->tgnhap)->first()->mahs);
                $hoso = $model_hs->where('mahuyen',$ct->mahuyen)
                    ->where('tgnhap',$ct->tgnhap)
                    ->first();
                $ct->mahs= $hoso->mahs;
                $a_hoso[] = $hoso->mahs;
                $a_huyen[] = $hoso->mahuyen;
            }
            $model_ct = GiaHhTt::select('mahh','giatu','giaden','giatulk','giadenlk','mahs')->wherein('mahs',$a_hoso)->get();
            $model = DmHhTn55::select('mahh','tenhh','dvt')->get();
            $sodv = count($model_max) == 0? 1: count($model_max);
            foreach ($model as $ct) {
                $hh = $model_ct->where('mahh', $ct->mahh);
                foreach ($model_max as $huyen) {
                    $mahuyen = $huyen->mahuyen;
                    $hh_huyen = $hh->where('mahs', $huyen->mahs);
                    $ct->$mahuyen = ($hh_huyen->avg('giatu') + $hh_huyen->avg('giaden')) / 2;
                    //dùng đc hàm avg vì 1 huyện chỉ có 1 báo cáo
                }
                $ct->giahh = ($hh->sum('giatu') + $hh->sum('giaden')) / (2 * $sodv);
                //$ct->giahhlk = ($hh->avg('giatulk') + $hh->avg('giadenlk')) / 2;
            }
            //dd($model);
            //$model=$this->getDataPL1($inputs);
            //dd($model->toarray());
            $thongtin=array('thitruong'=>$inputs['thitruong'],
                'nam'=>'Từ ngày '.getDayVn($inputs['ngaytu']).' đến ngày '.getDayVn($inputs['ngayden']));
            $model_pb = District::wherein('mahuyen',$a_huyen)->get();

            return view('reports.hhdv.TT55-2011-BTC.PL1')
                ->with('thongtin',$thongtin)
                ->with('model',$model)
                ->with('model_pb',$model_pb)
                ->with('pageTitle','Phụ lục 1');
        }else
            return view('errors.notlogin');
    }

    public function index()
    {
        if (Session::has('admin')) {
            $donvi = District::wherein('mahuyen',function($query){
                $query->select('mahuyen')->from('HsGiaHhTt')
                    ->where("trangthai" , "Hoàn tất")->distinct()->get();
            })->get();
            //dd($donvi);
            $thitruong=DmThiTruong::all();
            $thoidiem=DmThoiDiem::where('plbc','Hàng hóa thị trường')->get();
            return view('reports.hhdv.TT55-2011-BTC.index')
                ->with('thitruong',$thitruong)
                ->with('thoidiem',$thoidiem)
                ->with('donvi',$donvi)
                ->with('pageTitle','Thông tư 55/2011-TT-BTC');
        }else
            return view('errors.notlogin');
    }
    */
}
