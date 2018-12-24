<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
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
                ,'CHOCHUYEN'=>'Chưa chuyển dữ liệu','DACHUYEN'=>'Đã chuyển dữ liệu','TRALAI'=>'Trả lại dữ liệu');

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
            ,'CHOCHUYEN'=>'Chưa chuyển dữ liệu','DACHUYEN'=>'Đã chuyển dữ liệu','TRALAI'=>'Trả lại dữ liệu');

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
            ,'CHOCHUYEN'=>'Chưa chuyển dữ liệu','DACHUYEN'=>'Đã chuyển dữ liệu','TRALAI'=>'Trả lại dữ liệu');

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
                ->with('pageTitle', 'Danh sách tổng hợp lương tại đơn vị');
        } else
            return view('errors.notlogin');
    }
}
