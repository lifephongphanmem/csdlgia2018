<?php
Route::get('thongtindngiay','manage\kekhaigia\kkgiay\KkGiaGiayController@ttdn');
Route::resource('kekhaigiagiay','manage\kekhaigia\kkgiay\KkGiaGiayController');
Route::get('giagiay/kiemtra','manage\kekhaigia\kkgiay\KkGiaGiayController@kiemtra');
Route::post('kekhaigiagiay/chuyen','manage\kekhaigia\kkgiay\KkGiaGiayController@chuyen');
Route::get('/giagiay/showlydo','manage\kekhaigia\kkgiay\KkGiaGiayController@showlydo');
Route::post('kekhaigiagiay/delete','manage\kekhaigia\kkgiay\KkGiaGiayController@delete');
Route::get('kekhaigiagiay/prints','manage\kekhaigia\kkgiay\KkGiaGiayController@prints');

Route::get('giagiayctdf/storett','manage\kekhaigia\kkgiay\KkGiaGiayCtDfController@store');
Route::get('giagiayctdf/edittt','manage\kekhaigia\kkgiay\KkGiaGiayCtDfController@edit');
Route::get('giagiayctdf/updatett','manage\kekhaigia\kkgiay\KkGiaGiayCtDfController@update');
Route::get('giagiayctdf/deletett','manage\kekhaigia\kkgiay\KkGiaGiayCtDfController@destroy');

Route::get('giagiayct/storett','manage\kekhaigia\kkgiay\KkGiaGiayCtController@store');
Route::get('giagiayct/edittt','manage\kekhaigia\kkgiay\KkGiaGiayCtController@edit');
Route::get('giagiayct/updatett','manage\kekhaigia\kkgiay\KkGiaGiayCtController@update');
Route::get('giagiayct/deletett','manage\kekhaigia\kkgiay\KkGiaGiayCtController@destroy');

Route::get('xetduyetgiagiay','manage\kekhaigia\kkgiay\KkGiaGiayXdController@index');
Route::get('ttdnkkgiay','manage\kekhaigia\kkgiay\KkGiaGiayXdController@ttdn');
Route::post('xetduyetgiagiay/tralai','manage\kekhaigia\kkgiay\KkGiaGiayXdController@tralai');
Route::get('xetduyetgiagiay/ttnhanhs','manage\kekhaigia\kkgiay\KkGiaGiayXdController@ttnhanhs');
Route::post('xetduyetgiagiay/nhanhs','manage\kekhaigia\kkgiay\KkGiaGiayXdController@nhanhs');
Route::get('timkiemgiagiay','manage\kekhaigia\kkgiay\KkGiaGiayXdController@search');

Route::get('baocaokkgiagiay','manage\kekhaigia\kkgiay\KkGiaGiayBcController@index');
Route::post('baocaokkgiagiay/bc1','manage\kekhaigia\kkgiay\KkGiaGiayBcController@bc1');
Route::post('baocaokkgiagiay/bc2','manage\kekhaigia\kkgiay\KkGiaGiayBcController@bc2');