<?php

namespace App\Http\Controllers;

use App\dmhanghoa_cpi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class dmhanghoa_cpiController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = dmhanghoa_cpi::where('theodoi', 1)->get();
            $a_nhomhh = array_column($model->where('capdo', 1)->toarray(),'tenhh', 'mahh');
            //dd($a_nhomhh);
            foreach($model as $ct){
                $ct->b_xoa = true; //mặc định đc xóa
                //kiểm tra nếu mã số dc sử dụng thì ko dc xóa
                if($model->where('magoc',$ct->mahh)->count() > 0)
                    $ct->b_xoa = false;
            }

            return view('manage.vanbanqlnn.giatieudung.danhmuc.index')
                ->with('model', $model)
                ->with('a_nhomhh', $a_nhomhh)
                //->with('manhom', $inputs['manhom'])
                ->with('pageTitle', 'Danh mục hàng hóa');
        }else
            return view('errors.notlogin');
    }

    public function addnhomhh(Request $request){
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

        $inputs = $request->all();
        //dd($inputs);
        //kiểm tra mã tồn tại =>lỗi
        $inputs['capdo'] = 1;
        $inputs['macapdo'] = $inputs['mahh'];
        //kiểm tra mã hàng nếu tồn tại =>update
        $chk = dmhanghoa_cpi::where('mahh',$inputs['mahh'])->first();
        if(count($chk)>0){
            $chk->mahh = $inputs['mahh'];
            $chk->tenhh = $inputs['tenhh'];
            $chk->quyenso = $inputs['quyenso'];
            $chk->save();
        }else{
            dmhanghoa_cpi::create($inputs);
        }


        $result['message'] = 'Thêm mới thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function addhanghoa(Request $request){
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

        $inputs = $request->all();
        //dd($inputs);
        //kiểm tra mã tồn tại =>lỗi
        $inputs['macapdo'] = $inputs['mahh'];
        //kiểm tra mã hàng nếu tồn tại =>update
        $chk = dmhanghoa_cpi::where('mahh',$inputs['mahh'])->first();
        if(count($chk)>0){
            $chk->capdo = $inputs['capdo'];
            $chk->magoc = $inputs['magoc'];
            $chk->mahh = $inputs['mahh'];
            $chk->tenhh = $inputs['tenhh'];
            $chk->quyenso = $inputs['quyenso'];
            $chk->save();
        }else{
            dmhanghoa_cpi::create($inputs);
        }


        $result['message'] = 'Thêm mới thành công.';
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function editnhomhh(Request $request)
    {
        $inputs = $request->all();
        $model = dmhanghoa_cpi::find($inputs['id']);
        die(json_encode($model));

    }

    public function destroy(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            dmhanghoa_cpi::where('id',$inputs['iddelete'])->delete();
            return redirect('/dmhanghoacpi/danhsach');
        }else
            return view('errors.notlogin');
    }
}
