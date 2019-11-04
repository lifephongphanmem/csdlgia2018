<?php

namespace App\Http\Controllers;

use App\KkGs;
use App\KkGsCt;
use App\Town;
use App\Company;
use App\DiaBanHd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsKkGsController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
            $model = Town::all();
            $model_donvi = Company::where('level','DVGS')->select('tendn','maxa')->get();

            return view('manage.kkgia.dvgs.reports.index')
                ->with('model',$model)
                ->with('model_donvi',$model_donvi)
                ->with('pageTitle', 'Báo cáo tổng hợp kê khai giá thực phẩm chức năng cho trẻ em dưới 6 tuổi');

        }else
            return view('errors.notlogin');
    }

    public function dvltbc5(Request $request){
        if (Session::has('admin')) {
            $input = $request->all();

            $model = KkGs::whereBetween('kkgs.ngaynhan',[$input['ngaytu'], $input['ngayden']])
                ->leftjoin('company','company.maxa','=','kkgs.maxa')
                ->select('kkgs.*','company.tendn','company.diachi','company.tel');
            if(session('admin')->level == 'T' || session('admin')->level == 'H')
                $input['mahuyen'] = isset($input['mahuyen']) ? $input['mahuyen'] : '';
            else
                $input['mahuyen'] = session('admin')->maxa;
            if($input['mahuyen'] !='')
                $model = $model->where('kkgs.mahuyen',$input['mahuyen']);
            $model = $model->get();
            return view('manage.kkgia.dvgs.reports.BC5')
                ->with('input',$input)
                ->with('model',$model)
                ->with('pageTitle','Báo cáo thống kê các đơn vị kê khai giá trong khoảng thời gian');
        }else
            return view('errors.notlogin');
    }

    public function dvltbc6(Request $request){
        if (Session::has('admin')) {
            $inputs = $request->all();
            $model = Company::where('level','DVGS')->get();
            foreach($model as $tt){
                $modelkk = KkGs::where('maxa',$tt->maxa)->where('trangthai','DD')->whereBetween('ngaynhan',[$inputs['ngaytu'],$inputs['ngayden']])->count();
                $tt->lankk = $modelkk;
                if($modelkk>0) {
                    $modelkkgn = KkGs::where('maxa',$tt->maxa)->where('trangthai','DD')->whereBetween('ngaynhan',[$inputs['ngaytu'],$inputs['ngayden']])->max('id');
                    $modelgn = KkGs::where('id',$modelkkgn)->first();
                    $tt->kklc = 'Số CV:'.$modelgn['socv'].', ngày hiệu lực: '. getDayVn($modelgn['ngayhieuluc']);
                }
            }

            return view('manage.kkgia.dvgs.reports.BC6')
                ->with('inputs',$inputs)
                ->with('model',$model)
                ->with('pageTitle','Báo cáo đơn vị kê khai giá thực phẩm chức năng cho trẻ em dưới 6 tuổi');
        }else
            return view('errors.notlogin');
    }

}
