<?php
Route::get('thongtindnvtxb','KkGiaVtXbController@ttdn');
Route::resource('kekhaivantaixebuyt','KkGiaVtXbController');
Route::get('kkvtxb/kiemtra','KkGiaVtXbController@kiemtra');
Route::post('kekhaivantaixebuyt/chuyen','KkGiaVtXbController@chuyen');
Route::get('/kkvtxb/showlydo','KkGiaVtXbController@showlydo');
Route::post('kekhaivantaixebuyt/delete','KkGiaVtXbController@delete');
Route::get('kekhaivantaixebuyt/prints','KkGiaVtXbController@prints');

Route::get('giavtxbctdf/storett','KkGiaVtXbCtDfController@store');
Route::get('giavtxbctdf/edittt','KkGiaVtXbCtDfController@edit');
Route::get('giavtxbctdf/updatett','KkGiaVtXbCtDfController@update');
Route::get('giavtxbctdf/deletett','KkGiaVtXbCtDfController@destroy');

Route::get('giavtxbct/storett','KkGiaVtXbCtController@store');
Route::get('giavtxbct/edittt','KkGiaVtXbCtController@edit');
Route::get('giavtxbct/updatett','KkGiaVtXbCtController@update');
Route::get('giavtxbct/deletett','KkGiaVtXbCtController@destroy');

Route::get('xetduyetkekhaigiavtxb','KkGiaVtXbXdController@index');
Route::get('ttdnkkvtxb','KkGiaVtXbXdController@ttdn');
Route::post('xetduyetkekhaigiavtxb/tralai','KkGiaVtXbXdController@tralai');
Route::get('xetduyetkekhaigiavtxb/ttnhanhs','KkGiaVtXbXdController@ttnhanhs');
Route::post('xetduyetkekhaigiavtxb/nhanhs','KkGiaVtXbXdController@nhanhs');
Route::get('timkiemgiavantaixebuyt','KkGiaVtXbXdController@search');