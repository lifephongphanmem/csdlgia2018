<?php

namespace App\Http\Controllers;

use App\DiaBanHd;
use App\District;
use App\Register;
use App\Town;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AjaxController extends Controller
{
    public function checkngay(Request $request)
    {
        $result = array(
            'message' => 'error',
            'status' => 'fail',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if (isset($inputs['ngayhieuluc'])) {
            $ngaynhap = date('Y-m-d', strtotime(str_replace('/', '-', $inputs['ngaynhap'])));
            $ngayhieuluc = date('Y-m-d', strtotime(str_replace('/', '-', $inputs['ngayhieuluc'])));

            if($inputs['plhs'] == 'GG'){
                if($ngaynhap <=$ngayhieuluc ) {
                    //dd($ngaynhap<$ngayhieuluc);
                    $result['status'] = 'success';
                }
            }else {
                $thungaynhap = date('D', strtotime($ngaynhap));
                if ($thungaynhap == 'Thu') {
                    $ngaysosanh = date('Y-m-d', mktime( 0,0,0, date('m', strtotime($ngaynhap)), date('d', strtotime($ngaynhap)) + 5, date('Y', strtotime($ngaynhap))));
                } elseif ($thungaynhap == 'Fri') {
                    $ngaysosanh = date('Y-m-d', mktime( 0,0,0, date('m', strtotime($ngaynhap)), date('d', strtotime($ngaynhap)) + 5, date('Y', strtotime($ngaynhap))));
                } elseif ($thungaynhap == 'Sat') {
                    $ngaysosanh = date('Y-m-d', mktime( 0,0,0, date('m', strtotime($ngaynhap)), date('d', strtotime($ngaynhap)) + 4, date('Y', strtotime($ngaynhap))));
                } else {
                    $ngaysosanh = date('Y-m-d', mktime( 0,0,0, date('m', strtotime($ngaynhap)), date('d', strtotime($ngaynhap)) + 3, date('Y', strtotime($ngaynhap))));
                }

                if ($ngayhieuluc >= $ngaysosanh){
                    $result['status'] = 'success';
                }
            }
        }
        die(json_encode($result));
    }

    public function checkngaykk(Request $request){
        $result = array(
            'message' => 'error',
            'status' => 'fail',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if (isset($inputs['ngaynhap'])) {

            $ngaynhap = date('Y-m-d', strtotime(str_replace('/', '-', $inputs['ngaynhap'])));
            $ngayht = date('Y-m-d');
            if ($ngaynhap >= $ngayht) {
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }

    public function checkusername(Request $request){
        $result = array(
            'message' => 'error',
            'status' => 'fail',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
            );
            die(json_encode($result));
        }
        //dd($request);
        $inputs = $request->all();

        if (isset($inputs['username'])) {
            $model = Users::where('username',$inputs['username'])->count();
            if ($model == 0) {
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }

    public function checkmaqhns(Request $request){
        $result = array(
            'message' => 'error',
            'status' => 'fail',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        if (isset($inputs['maqhns'])) {
            if($inputs['pl'] == 'district')
                $model = District::where('mahuyen',$inputs['maqhns'])->count();
            elseif($inputs['pl'] == 'town')
                $model = Town::where('maxa',$inputs['maqhns'])->count();
            else
                $model = 0;
            if ($model == 0) {
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }

    public function checkmasothue(Request $request){
        $result = array(
            'message' => 'error',
            'status' => 'fail',
        );
        if (!Session::has('admin')) {
            $result = array(
                'status' => 'fail',
            );
            die(json_encode($result));
        }
        $inputs = $request->all();
        if (isset($inputs['maqhns'])) {
            if($inputs['pl'] == 'district')
                $model = District::where('mahuyen',$inputs['maqhns'])->count();
            elseif($inputs['pl'] == 'town')
                $model = Town::where('maxa',$inputs['maqhns'])->count();
            else
                $model = 0;
            if ($model == 0) {
                $result['status'] = 'success';
            }
        }
        die(json_encode($result));
    }

    public function registerthongtin(Request $request){
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

            $modelhs = Register::where('id',$inputs['id'])
                ->first();

            $result['message'] = '<div class="form-group" id="tttralai"> ';
            $result['message'] .= '<label style="color: blue"><b>'.$modelhs->tendn.'</b> - Mã số thuế: <b>'.$modelhs->maxa.'</b></label>';
            $result['message'] .= '<input type="hidden" id="idhs" name="idhs" value="'.$inputs['id'].'">';
            $result['message'] .= '</div>';

            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function getTown(Request $request){
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

            $model = DiaBanHd::where('district',$inputs['district'])
                ->where('level','X')
                ->get();

            $result['message'] = '<select name="town" id="town" class="form-control"> ';
            if(count($model) > 0) {
                foreach($model as $tt) {
                    $result['message'] .= '<option value="'.$tt->town.'">'.$tt->diaban.'</option>';
                }
            }else
                $result['message'] .= '<option value="">--Chọn xã/phường--</option>';
            $result['message'] .= '</select>';

            $result['status'] = 'success';

        die(json_encode($result));
    }
}
