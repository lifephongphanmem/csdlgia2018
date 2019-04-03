<?php
Route::get('thongtindnetanol','KkGiaEtanolController@ttdn');
Route::resource('kekhaigiaetanol','KkGiaEtanolController');
Route::get('giaetanol/kiemtra','KkGiaEtanolController@kiemtra');
Route::post('kekhaigiaetanol/chuyen','KkGiaEtanolController@chuyen');
Route::get('/giaetanol/showlydo','KkGiaEtanolController@showlydo');
Route::post('kekhaigiaetanol/delete','KkGiaEtanolController@delete');
Route::get('kekhaigiaetanol/prints','KkGiaEtanolController@prints');

Route::get('giaetanolctdf/storett','KkGiaEtanolCtDfController@store');
Route::get('giaetanolctdf/edittt','KkGiaEtanolCtDfController@edit');
Route::get('giaetanolctdf/updatett','KkGiaEtanolCtDfController@update');
Route::get('giaetanolctdf/deletett','KkGiaEtanolCtDfController@destroy');

Route::get('giaetanolct/storett','KkGiaEtanolCtController@store');
Route::get('giaetanolct/edittt','KkGiaEtanolCtController@edit');
Route::get('giaetanolct/updatett','KkGiaEtanolCtController@update');
Route::get('giaetanolct/deletett','KkGiaEtanolCtController@destroy');

Route::get('xetduyetgiaetanol','KkGiaEtanolXdController@index');
Route::get('ttdnkketanol','KkGiaEtanolXdController@ttdn');
Route::post('xetduyetgiaetanol/tralai','KkGiaEtanolXdController@tralai');
Route::get('xetduyetgiaetanol/ttnhanhs','KkGiaEtanolXdController@ttnhanhs');
Route::post('xetduyetgiaetanol/nhanhs','KkGiaEtanolXdController@nhanhs');
Route::get('timkiemgiaetanol','KkGiaEtanolXdController@search');