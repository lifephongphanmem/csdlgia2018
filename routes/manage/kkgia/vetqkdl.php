<?php
Route::get('thongtindntqkdl','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlController@ttdn');
Route::resource('kekhaigiavetqkdl','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlController');

Route::get('giavektqkdl/kiemtra','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlController@kiemtra');
Route::post('kekhaigiavetqkdl/chuyen','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlController@chuyen');
Route::get('/giavektqkdl/showlydo','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlController@showlydo');
Route::post('kekhaigiavetqkdl/delete','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlController@delete');

Route::get('kekhaigiavetqkdl/prints','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlController@prints');

Route::get('giavektqkdlct/storett','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlCtController@store');
Route::get('giavektqkdlct/edittt','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlCtController@edit');
Route::get('giavektqkdlct/updatett','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlCtController@update');
Route::get('giavektqkdlct/deletett','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlCtController@destroy');


Route::get('xetduyetgiavetqkdl','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlXdController@index');
Route::get('ttdnkkgiavetqkdl','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlXdController@ttdn');
Route::post('xetduyetgiavetqkdl/tralai','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlXdController@tralai');
Route::get('xetduyetgiavetqkdl/ttnhanhs','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlXdController@ttnhanhs');
Route::post('xetduyetgiavetqkdl/nhanhs','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlXdController@nhanhs');
Route::get('timkiemgiavetqkdl','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlXdController@search');

Route::get('baocaokekhaigiavetqkdl','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlBcController@index');
Route::post('baocaokekhaigiavetqkdl/bc1','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlBcController@bc1');
Route::post('baocaokekhaigiavetqkdl/bc2','manage\kekhaigia\kkgiavetqkdl\GiaVeTqKdlBcController@bc2');