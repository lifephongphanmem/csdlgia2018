<?php
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
Route::get('users/{id}/copy','UsersController@copy');

Route::get('users/print','UsersController@prints');

Route::resource('xetduyettdttdn','TdTtDnController');
Route::post('xetduyettdttdn/tralai','TdTtDnController@tralai');
Route::get('xetduyettdttdn/{id}/duyet','TdTtDnController@duyet');

Route::resource('thongtinngaynghile','NgayNghiLeController');
Route::post('thongtinngaynghile/delete','NgayNghiLeController@destroy');

Route::resource('userscompany','UsersCompanyController');
Route::get('userscompany/{id}/permission','UsersCompanyController@permission')
//EndUsers
?>