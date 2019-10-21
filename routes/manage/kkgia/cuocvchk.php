<?php
Route::get('thongtindnvchk','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkController@ttdn');
Route::resource('kekhaicuocvchk','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkController');
Route::get('kkvchk/kiemtra','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkController@kiemtra');
Route::post('kekhaicuocvchk/chuyen','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkController@chuyen');
Route::get('/kkvchk/showlydo','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkController@showlydo');
Route::post('kekhaicuocvchk/delete','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkController@delete');
Route::get('kekhaicuocvchk/prints','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkController@prints');

Route::get('giavchkctdf/storett','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtDfController@store');
Route::get('giavchkctdf/edittt','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtDfController@edit');
Route::get('giavchkctdf/updatett','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtDfController@update');
Route::get('giavchkctdf/deletett','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtDfController@destroy');

Route::get('giacuocvchkct/storett','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtController@store');
Route::get('giacuocvchkct/edittt','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtController@edit');
Route::get('giacuocvchkct/updatett','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtController@update');
Route::get('giacuocvchkct/deletett','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkCtController@destroy');

Route::get('xetduyetkekhaicuocvchk','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkXdController@index');
Route::get('ttdnkkcuocvchk','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkXdController@ttdn');
Route::post('xetduyetkekhaicuocvchk/tralai','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkXdController@tralai');
Route::get('xetduyetkekhaicuocvchk/ttnhanhs','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkXdController@ttnhanhs');
Route::post('xetduyetkekhaicuocvchk/nhanhs','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkXdController@nhanhs');
Route::get('timkiemcuocvchk','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkXdController@search');

Route::get('baocaogiacuocvchk','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkBcController@index');
Route::post('baocaogiacuocvchk/bc1','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkBcController@bc1');
Route::post('baocaogiacuocvchk/bc2','manage\kekhaigia\kkdvvt\vchk\KkCuocVcHkBcController@bc2');