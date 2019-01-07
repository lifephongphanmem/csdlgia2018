<?php

namespace App\Http\Controllers;

use App\dmhanghoa_cpi;
use App\hsgia_cpi;
use App\hsgia_cpi_chitiet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class hsgia_cpiController extends Controller
{
    function index(Request $request)
    {
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = hsgia_cpi::where('maxa', session('admin')->maxa)
                ->where('thang', $inputs['thang'])
                ->where('nam', $inputs['nam'])->get();
            foreach ($model as $bl) {
                $bl->thaotac = true;
            }
            //dd($model);
            //dd($inputs);
            return view('manage.vanbanqlnn.giatieudung.hoso.index')
                ->with('model', $model)
                ->with('inputs', $inputs)
                ->with('pageTitle', 'Danh sách hồ sơ giá hàng hóa tiêu dùng');
        } else
            return view('errors.notlogin');
    }

    function create(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            //$thang = $date['mon'];
            $mahs = getdate()[0];
            //$maxa = session('admin')->maxa;
            $model = new hsgia_cpi();
            $model->tgnhap = date('Y-m-d');
            $model->trangthai = 'Đang làm';
            $model->thang = $inputs['thang'];
            $model->nam = $inputs['nam'];
            $model->maxa = session('admin')->maxa;
            $model->district = session('admin')->district;
            $model->phanloai = 'CHITIET';
            $model->mahs = $mahs;
            $model->save();
            //chỉ nhập giá hàng hóa cấp 4
            $model_danhmuc = dmhanghoa_cpi::where('theodoi',1)->get();
            foreach($model_danhmuc as $ct){
                $ct->maxa = session('admin')->maxa;
                $ct->mahs = $mahs;
                $a = $ct->toarray();
                unset($a['id']);
                hsgia_cpi_chitiet::create($a);
            }
            return redirect(url('/hsgiacpi/edit?mahs='.$mahs));
        }else
            return view('errors.notlogin');
    }

    function create_dk(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            //$thang = $date['mon'];
            $mahs = getdate()[0];
            //$maxa = session('admin')->maxa;
            $model = new hsgia_cpi();
            $model->tgnhap = date('Y-m-d');
            $model->trangthai = 'Đang làm';
            $model->thang = $inputs['thang'];
            $model->nam = $inputs['nam'];
            $model->maxa = session('admin')->maxa;
            $model->district = session('admin')->district;
            $model->mahs = $mahs;
            $model->phanloai = 'DK';
            $model->save();
            //chỉ nhập giá hàng hóa cấp 4

            return redirect(url('/hsgiacpi/edit_dk?mahs='.$mahs));
        }else
            return view('errors.notlogin');
    }

    function edit(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = hsgia_cpi::where('mahs',$inputs['mahs'])->first();
            $model_hh = hsgia_cpi_chitiet::where('mahs',$model->mahs)->where('capdo',4)->get();
            return view('manage.vanbanqlnn.giatieudung.hoso.edit')
                ->with('model',$model)
                ->with('model_hh',$model_hh)
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa tiêu dùng');
        }else
            return view('errors.notlogin');
    }

    function edit_dk(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            $model = hsgia_cpi::where('mahs',$inputs['mahs'])->first();
            //$model_hh = hsgia_cpi_chitiet::where('mahs',$model->mahs)->where('capdo',4)->get();
            return view('manage.vanbanqlnn.giatieudung.hoso.edit_dk')
                ->with('model',$model)
                //->with('model_hh',$model_hh)
                ->with('pageTitle','Thông tin hồ sơ giá hàng hóa tiêu dùng');
        }else
            return view('errors.notlogin');
    }

    function update(Request $request)
    {
        if(Session::has('admin')){
            $insert = $request->all();
            $model = hsgia_cpi::where('mahs',$insert['mahs'])->first();
            $model->tgnhap = getDateToDb($insert['tgnhap']);
            $model->soqd = $insert['soqd'];
            $model->noidung = $insert['noidung'];
            $model->save();

            return redirect('/hsgiacpi/danhsach?thang='.date('m').'&nam='.date('Y'));

        }else
            return view('errors.notlogin');
    }

    function update_dk(Request $request)
    {
        if(Session::has('admin')){
            $inputs = $request->all();
            //file dk
            if(isset($inputs['ipf1']) && $inputs['ipf1'] !='' ) {
                $ipf1 = $request->file('ipf1');
                $inputs['ipt1'] = $inputs['mahs'] .'&1.'.$ipf1->getClientOriginalExtension();
                $ipf1->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt1']);
                $inputs['ipf1']= $inputs['ipt1'];
            }
            if(isset($inputs['ipf2']) && $inputs['ipf2'] !='' ) {
                $ipf2 = $request->file('ipf2');

                $inputs['ipt2'] = $inputs['mahs'] .'&2.'.$ipf2->getClientOriginalExtension();
                $ipf2->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt2']);
                $inputs['ipf2']= $inputs['ipt2'];
            }
            if(isset($inputs['ipf3']) && $inputs['ipf3'] !='' ) {
                $ipf3 = $request->file('ipf3');
                $inputs['ipt3'] = $inputs['mahs'] .'&3.'.$ipf3->getClientOriginalExtension();
                $ipf3->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt3']);
                $inputs['ipf3']= $inputs['ipt3'];
            }
            if(isset($inputs['ipf4']) && $inputs['ipf4'] !='' ) {
                $ipf4 = $request->file('ipf4');
                $inputs['ipt4'] = $inputs['mahs'] .'&4.'.$ipf4->getClientOriginalExtension();
                $ipf4->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt4']);
                $inputs['ipf4']= $inputs['ipt4'];
            }
            if(isset($inputs['ipf5']) && $inputs['ipf5'] !='' ) {
                $ipf5 = $request->file('ipf5');
                $inputs['ipt5'] = $inputs['mahs'] .'&5.'.$ipf5->getClientOriginalExtension();
                $ipf5->move(public_path() . '/data/vbqlnnvegia/', $inputs['ipt5']);
                $inputs['ipf5']= $inputs['ipt5'];
            }

            $model = hsgia_cpi::where('mahs',$inputs['mahs'])->first();
            $inputs['tgnhap'] = getDateToDb($inputs['tgnhap']);
            $model->update($inputs);
            return redirect('/hsgiacpi/danhsach?thang='.date('m').'&nam='.date('Y'));

        }else
            return view('errors.notlogin');
    }


    function update_chitiet(Request $request)
    {
        $result = array(
            'status' => 'fail',
            'message' => 'error',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
                'message' => 'permission denied',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if (isset($inputs['id'])) {
            $inputs['giatu'] = getDbl($inputs['giatu']);
            $inputs['giaden'] = getDbl($inputs['giaden']);
            $model = hsgia_cpi_chitiet::where('id', $inputs['id'])->first();
            $model->update($inputs);
            $result['message'] = 'Thêm mới thành công.';
            $result['status'] = 'success';

             ;
            $result = $this->return_html($result, hsgia_cpi_chitiet::where('mahs', $model->mahs)->where('capdo',4)->get());
        }
        //chưa truyền mã hồ sơ vào get

        die(json_encode($result));
    }

    function get_chitiet(Request $request)
    {
        $inputs = $request->all();
        $model = hsgia_cpi_chitiet::find($inputs['id']);
        die(json_encode($model));

    }

    public function return_html($result, $model)
    {
        $result['message'] = '<div class="row" id="dsts">';
        $result['message'] .= '<div class="col-md-12">';
        //$result['message'] .= '<div class="table-responsive">';
        $result['message'] .= '<table class="table table-striped table-bordered table-hover" id="sample_3">';
        $result['message'] .= '<thead>';
        $result['message'] .= '<tr>';
        $result['message'] .= '<th width="2%" style="text-align: center">STT</th>';
        $result['message'] .= '<th style="text-align: center">Mã số</th>';
        $result['message'] .= '<th style="text-align: center">Tên hàng hóa</th>';
        $result['message'] .= '<th>Giá liền kề</th>';
        $result['message'] .= '<th>Giá hàng hóa</th>';
        $result['message'] .= '<th style="text-align: center" width="15%">Thao tác</th>';
        $result['message'] .= '</tr>';
        $result['message'] .= '</thead>';

        $result['message'] .= '<tbody id="ttts">';
        if (count($model) > 0) {
            foreach ($model as $key => $tents) {
                $result['message'] .= '<tr id="' . $tents->id . '">';
                $result['message'] .= '<td style="text-align: center">' . ($key + 1) . '</td>';
                $result['message'] .= '<td>' . $tents->mahh . '</td>';
                $result['message'] .= '<td class="active">' . $tents->tenhh . '</td>';
                $result['message'] .= '<td style="text-align: right">' . number_format($tents->giatu) . '</td>';
                $result['message'] .= '<td style="text-align: right">' . number_format($tents->giaden) . '</td>';

                $result['message'] .= '<td>' .
                    '<button type="button" data-target="#modal-wide-width" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem(' . $tents->id . ');"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>' .
                    //'<button type="button" class="btn btn-default btn-xs mbs" onclick="deleteRow(' . $tents->id . ')" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>'

                    '</td>';
                $result['message'] .= '</tr>';
            }
            $result['message'] .= '</tbody>';
            $result['message'] .= '</table>';
            $result['message'] .= '</div>';
            //$result['message'] .= '</div>';
            $result['status'] = 'success';
            return $result;

        }
        return $result;
    }
}
