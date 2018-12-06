<?php
Route::get('thongtindnvtxtx','KkGiaVtXtxController@ttdn');
Route::resource('kekhaigiavantaixetaxi','KkGiaVtXtxController');
Route::post('kekhaigiavantaixetaxi/delete','KkGiaVtXtxController@destroy');

Route::post('kekhaigiavantaixetaxi/chuyen','KkGiaVtXtxController@chuyen');
Route::get('/kkvtxtx/showlydo','KkGiaVtXtxController@showlydo');

Route::get('kekhaigiavantaixetaxi/prints','KkGiaVtXtxController@prints');


//Ajax chuyen
Route::get('/kkvtxtx/kiemtra','KkGiaVtXtxController@kiemtra');
//End Ajax chuyển

Route::get('/kkvtxtxctdf/storett','KkGiaVtXtxCtDfController@store');
Route::get('/kkvtxtxctdf/edittt','KkGiaVtXtxCtDfController@edit');
Route::get('/kkvtxtxctdf/updatett','KkGiaVtXtxCtDfController@update');
Route::get('/kkvtxtxctdf/deletett','KkGiaVtXtxCtDfController@destroy');
//End Ajax create

//Ajax edit
Route::get('/kkvtxtxct/storett','KkGiaVtXtxCtController@store');
Route::get('/kkvtxtxct/edittt','KkGiaVtXtxCtController@edit');
Route::get('/kkvtxtxct/updatett','KkGiaVtXtxCtController@update');
Route::get('/kkvtxtxct/deletett','KkGiaVtXtxCtController@destroy');
//End Ajax edit

//Xét duyệt kk
Route::get('xetduyetkekhaigiavtxtx','KkGiaVtXtxXdController@index');
Route::post('xetduyetkekhaigiavtxtx/tralai','KkGiaVtXtxXdController@tralai');
Route::get('xetduyetkekhaigiavtxtx/ttnhanhs','KkGiaVtXtxXdController@ttnhanhs');
Route::post('xetduyetkekhaigiavtxtx/nhanhs','KkGiaVtXtxXdController@nhanhs');
//End xét duyệt kk
Route::get('timkiemgiavantaixetaxi','KkGiaVtXtxXdController@search');

//Ajax
Route::get('/ttdnkkvtxtx','KkGiaVtXtxXdController@ttdnkkvtxtx');
?>