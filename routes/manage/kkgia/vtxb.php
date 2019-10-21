<?php
Route::get('thongtindnvtxb','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbController@ttdn');
Route::resource('kekhaivantaixebuyt','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbController');
Route::get('kkvtxb/kiemtra','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbController@kiemtra');
Route::post('kekhaivantaixebuyt/chuyen','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbController@chuyen');
Route::get('/kkvtxb/showlydo','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbController@showlydo');
Route::post('kekhaivantaixebuyt/delete','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbController@delete');
Route::get('kekhaivantaixebuyt/prints','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbController@prints');

Route::get('giavtxbctdf/storett','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtDfController@store');
Route::get('giavtxbctdf/edittt','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtDfController@edit');
Route::get('giavtxbctdf/updatett','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtDfController@update');
Route::get('giavtxbctdf/deletett','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtDfController@destroy');

Route::get('giavtxbct/storett','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtController@store');
Route::get('giavtxbct/edittt','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtController@edit');
Route::get('giavtxbct/updatett','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtController@update');
Route::get('giavtxbct/deletett','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbCtController@destroy');

Route::get('xetduyetkekhaigiavtxb','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbXdController@index');
Route::get('ttdnkkvtxb','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbXdController@ttdn');
Route::post('xetduyetkekhaigiavtxb/tralai','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbXdController@tralai');
Route::get('xetduyetkekhaigiavtxb/ttnhanhs','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbXdController@ttnhanhs');
Route::post('xetduyetkekhaigiavtxb/nhanhs','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbXdController@nhanhs');
Route::get('timkiemgiavantaixebuyt','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbXdController@search');

Route::get('baocaogiavantaixebuyt','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbBcController@index');
Route::post('baocaogiavantaixebuyt/bc1','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbBcController@bc1');
Route::post('baocaogiavantaixebuyt/bc2','manage\kekhaigia\kkdvvt\vtxb\KkGiaVtXbBcController@bc2');