<?php
Route::get('thongtindnvtxtx','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxController@ttdn');
Route::resource('kekhaigiavantaixetaxi','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxController');
Route::post('kekhaigiavantaixetaxi/delete','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxController@destroy');

Route::post('kekhaigiavantaixetaxi/chuyen','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxController@chuyen');
Route::get('/kkvtxtx/showlydo','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxController@showlydo');

Route::get('kekhaigiavantaixetaxi/prints','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxController@prints');


//Ajax chuyen
Route::get('/kkvtxtx/kiemtra','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxController@kiemtra');
//End Ajax chuyển

Route::get('/kkvtxtxctdf/storett','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtDfController@store');
Route::get('/kkvtxtxctdf/edittt','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtDfController@edit');
Route::get('/kkvtxtxctdf/updatett','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtDfController@update');
Route::get('/kkvtxtxctdf/deletett','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtDfController@destroy');
//End Ajax create

//Ajax edit
Route::get('/kkvtxtxct/storett','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtController@store');
Route::get('/kkvtxtxct/edittt','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtController@edit');
Route::get('/kkvtxtxct/updatett','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtController@update');
Route::get('/kkvtxtxct/deletett','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxCtController@destroy');
//End Ajax edit

//Xét duyệt kk
Route::get('xetduyetkekhaigiavtxtx','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxXdController@index');
Route::post('xetduyetkekhaigiavtxtx/tralai','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxXdController@tralai');
Route::get('xetduyetkekhaigiavtxtx/ttnhanhs','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxXdController@ttnhanhs');
Route::post('xetduyetkekhaigiavtxtx/nhanhs','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxXdController@nhanhs');
//End xét duyệt kk
Route::get('timkiemgiavantaixetaxi','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxXdController@search');

//Ajax
Route::get('/ttdnkkvtxtx','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxXdController@ttdnkkvtxtx');

Route::get('baocaogiavantaixetaxi','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxBcController@index');
Route::post('baocaogiavantaixetaxi/bc1','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxBcController@bc1');
Route::post('baocaogiavantaixetaxi/bc2','manage\kekhaigia\kkdvvt\vtxtx\KkGiaVtXtxBcController@bc2');
?>