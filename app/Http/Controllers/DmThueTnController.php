<?php

namespace App\Http\Controllers;

use App\NhomThueTn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class DmThueTnController extends Controller
{
    public function index(Request $request){
        $model = NhomThueTn::all();
        return view('manage.dinhgia.thuetn.danhmuc.index');

    }
}
