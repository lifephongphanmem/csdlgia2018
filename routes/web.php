<?php
Route::get('','HomeController@index');
Route::get('thongtinhotro',function(){
    return view('thongtinhotro')
        ->with('pageTitle','Thông tin hỗ trợ');
});
//System
include('system/system.php');
//End System

//Manage
include('manage/bog.php');
include('manage/dangkygia.php');
include('manage/dinhgia.php');
include('manage/thamdinhgia.php');
//include('manage/thamdinhgiahh.php');
include('manage/kekhaigia.php');
include('manage/vbqlnn.php');
include('manage/thanhlytaisan.php');
include('manage/cungcapgiahh.php');
include('manage/muataisan.php');
include('manage/chisogiatieudung.php');
include('manage/giagocvlxd.php');
include('manage/giadatduan.php');
include('manage/ttpvctqlnn.php');

//End Manage

//View
include('congbo/congbo.php');

//End view



