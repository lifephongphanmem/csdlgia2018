<?php
Route::get('','HomeController@index');
Route::get('/ajax/checkngay','AjaxController@checkngay');
Route::get('/ajax/checkngaykk','AjaxController@checkngaykk');
Route::get('/ajax/checkusername','AjaxController@checkusername');
Route::get('/ajax/checkmaqhns','AjaxController@checkmaqhns');
Route::get('/ajax/checkmasothue','AjaxController@checkmasothue');
Route::get('/ajax/registerthongtin','AjaxController@registerthongtin');
Route::get('/ajax/getTown','AjaxController@getTown');

// <editor-fold defaultstate="collapsed" desc="--Đăng ký tài khoản--">
Route::get('/ajax/registercheckmasothue','RegisterController@checkmasothue');
Route::get('/ajax/registercheckuser','RegisterController@checkuser');
Route::resource('register','RegisterController');
Route::post('register/tralai','RegisterController@tralai');
Route::post('register/createtk','RegisterController@createtk');
Route::post('register/delete','RegisterController@delete');

Route::get('searchtkdangky','RegisterController@searchregister');
Route::post('searchtkdangky','RegisterController@checksearchregister');
Route::get('searchtkdangky/show','RegisterController@showttdktk');
Route::post('searchtkdangky/show','RegisterController@chinhsuadktk');

Route::get('dangkytaikhoan','RegisterController@dangkytaikhoan');
Route::post('dangkytaikhoan','RegisterController@dangkytaikhoanstore');
Route::patch('dangkytaikhoan/id={id}','RegisterController@dangkytaikhoanupdate');

// </editor-fold>//End Hệ thống- Đăng ký

// <editor-fold defaultstate="collapsed" desc="--Setting--">
Route::resource('general','GeneralConfigsController');
Route::get('setting','GeneralConfigsController@setting');
Route::post('setting','GeneralConfigsController@updatesetting');

Route::resource('district','DistrictController');
Route::resource('town','TownController');
Route::resource('company','CompanyController');

Route::resource('xetduyet_thaydoi_ttdoanhnghiep','XdTdTtDnController');
Route::post('xetduyet_thaydoi_ttdoanhnghiep/tralai','XdTdTtDnController@tralai');
Route::get('xetduyet_thaydoi_ttdoanhnghiep/{id}/duyet','XdTdTtDnController@duyet');

Route::resource('danhmucdiadanh','DiaBanHdController');
Route::post('danhmucdiadanh/delete','DiaBanHdController@destroy');

//Users
Route::get('login','UsersController@login');
Route::post('signin','UsersController@signin');
Route::get('/change-password','UsersController@cp');
Route::post('/change-password','UsersController@cpw');
Route::get('/user_setting','UsersController@settinguser');
Route::post('/user_setting','UsersController@settinguserw');
Route::get('/checkpass','UsersController@checkpass');
Route::get('/checkuser','UsersController@checkuser');
Route::get('/checkmasothue','UsersController@checkmasothue');
Route::get('logout','UsersController@logout');
Route::get('users','UsersController@index');
Route::get('users/{id}/edit','UsersController@edit');
Route::patch('users/{id}','UsersController@update');
Route::get('users/{id}/phan-quyen','UsersController@permission');
Route::post('users/phan-quyen','UsersController@uppermission');
Route::post('users/delete','UsersController@destroy');
Route::get('users/lock/{id}/{pl}','UsersController@lockuser');
Route::get('users/unlock/{id}/{pl}','UsersController@unlockuser');
Route::get('users/create','UsersController@create');
Route::post('users','UsersController@store');

//EndUsers
// </editor-fold>//End Setting

// <editor-fold defaultstate="collapsed" desc="--Báo cáo--">

// </editor-fold>//End Reports

// <editor-fold defaultstate="collapsed" desc="--Quản lý--">
include('manage/bog.php');
include('manage/dinhgia.php');
include('manage/thamdinhgia.php');




// </editor-fold>//End Manage

include('congbo/congbo.php');
Route::get('ghichuct','HomeController@ghichuct');



