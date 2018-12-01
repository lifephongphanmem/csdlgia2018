<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ReportsHhDvKController extends Controller
{
    public function index(){
        if (Session::has('admin')) {
                return view('manage.dinhgia.giahhdvk.reports.index')
                    ->with('pageTitle','Báo cáo tổng hợp giá hàng hóa dịch vụ khác');
        }else
            return view('errors.notlogin');
    }
}
