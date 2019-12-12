<?php
Route::get('','HomeController@index');
Route::get('thongtinhotro',function(){
    return view('thongtinhotro')
        ->with('pageTitle','Thông tin hỗ trợ');
});
//Route::get('/testword', 'HomeController@testword');
//Route::get('/ajax/checkngay','AjaxController@checkngay');
//Route::get('/ajax/checkngaykk','AjaxController@checkngaykk');
//Route::get('/ajax/checkusername','AjaxController@checkusername');
//Route::get('/ajax/checkmaqhns','AjaxController@checkmaqhns');
//Route::get('/ajax/checkmasothue','AjaxController@checkmasothue');
//Route::get('/ajax/registerthongtin','AjaxController@registerthongtin');
//Route::get('/ajax/getTown','AjaxController@getTown');
//Route::get('ajax/reggetper','AjaxController@reggetper');

//Register
//include('system/register.php');
//End Register

//System
include('system/system.php');
//End System

//Manage
include('manage/bog.php');
include('manage/dangkygia.php');
include('manage/dinhgia.php');
include('manage/thamdinhgia.php');
include('manage/thamdinhgiahh.php');
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



