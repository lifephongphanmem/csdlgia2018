<?php
Route::get('thongtindnetanol','manage\kekhaigia\kkgiaetanol\KkGiaEtanolController@ttdn');
Route::resource('kekhaigiaetanol','manage\kekhaigia\kkgiaetanol\KkGiaEtanolController');
Route::get('giaetanol/kiemtra','manage\kekhaigia\kkgiaetanol\KkGiaEtanolController@kiemtra');
Route::post('kekhaigiaetanol/chuyen','manage\kekhaigia\kkgiaetanol\KkGiaEtanolController@chuyen');
Route::get('/giaetanol/showlydo','manage\kekhaigia\kkgiaetanol\KkGiaEtanolController@showlydo');
Route::post('kekhaigiaetanol/delete','manage\kekhaigia\kkgiaetanol\KkGiaEtanolController@delete');
Route::get('kekhaigiaetanol/prints','manage\kekhaigia\kkgiaetanol\KkGiaEtanolController@prints');

Route::get('giaetanolctdf/storett','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtDfController@store');
Route::get('giaetanolctdf/edittt','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtDfController@edit');
Route::get('giaetanolctdf/updatett','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtDfController@update');
Route::get('giaetanolctdf/deletett','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtDfController@destroy');

Route::get('giaetanolct/storett','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtController@store');
Route::get('giaetanolct/edittt','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtController@edit');
Route::get('giaetanolct/updatett','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtController@update');
Route::get('giaetanolct/deletett','manage\kekhaigia\kkgiaetanol\KkGiaEtanolCtController@destroy');

Route::get('xetduyetgiaetanol','manage\kekhaigia\kkgiaetanol\KkGiaEtanolXdController@index');
Route::get('ttdnkketanol','manage\kekhaigia\kkgiaetanol\KkGiaEtanolXdController@ttdn');
Route::post('xetduyetgiaetanol/tralai','manage\kekhaigia\kkgiaetanol\KkGiaEtanolXdController@tralai');
Route::get('xetduyetgiaetanol/ttnhanhs','manage\kekhaigia\kkgiaetanol\KkGiaEtanolXdController@ttnhanhs');
Route::post('xetduyetgiaetanol/nhanhs','manage\kekhaigia\kkgiaetanol\KkGiaEtanolXdController@nhanhs');
Route::get('timkiemgiaetanol','manage\kekhaigia\kkgiaetanol\KkGiaEtanolXdController@search');

Route::get('baocaokkgiaetanol','manage\kekhaigia\kkgiaetanol\KkGiaEtanolBcController@index');
Route::post('baocaokkgiaetanol/bc1','manage\kekhaigia\kkgiaetanol\KkGiaEtanolBcController@bc1');
Route::post('baocaokkgiaetanol/bc2','manage\kekhaigia\kkgiaetanol\KkGiaEtanolBcController@bc2');