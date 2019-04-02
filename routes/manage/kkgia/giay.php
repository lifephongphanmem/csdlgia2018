<?php
Route::get('thongtindngiay','KkGiaGiayController@ttdn');
Route::resource('kekhaigiagiay','KkGiaGiayController');
Route::get('giagiay/kiemtra','KkGiaGiayController@kiemtra');
Route::post('kekhaigiagiay/chuyen','KkGiaGiayController@chuyen');
Route::get('/giagiay/showlydo','KkGiaGiayController@showlydo');
Route::post('kekhaigiagiay/delete','KkGiaGiayController@delete');
Route::get('kekhaigiagiay/prints','KkGiaGiayController@prints');

Route::get('giagiayctdf/storett','KkGiaGiayCtDfController@store');
Route::get('giagiayctdf/edittt','KkGiaGiayCtDfController@edit');
Route::get('giagiayctdf/updatett','KkGiaGiayCtDfController@update');
Route::get('giagiayctdf/deletett','KkGiaGiayCtDfController@destroy');

Route::get('giagiayct/storett','KkGiaGiayCtController@store');
Route::get('giagiayct/edittt','KkGiaGiayCtController@edit');
Route::get('giagiayct/updatett','KkGiaGiayCtController@update');
Route::get('giagiayct/deletett','KkGiaGiayCtController@destroy');

Route::get('xetduyetgiagiay','KkGiaGiayXdController@index');
Route::get('ttdnkkgiay','KkGiaGiayXdController@ttdn');
Route::post('xetduyetgiagiay/tralai','KkGiaGiayXdController@tralai');
Route::get('xetduyetgiagiay/ttnhanhs','KkGiaGiayXdController@ttnhanhs');
Route::post('xetduyetgiagiay/nhanhs','KkGiaGiayXdController@nhanhs');
Route::get('timkiemgiagiay','KkGiaGiayXdController@search');