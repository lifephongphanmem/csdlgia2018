<?php
Route::get('thongtindnvchk','KkCuocVcHkController@ttdn');
Route::resource('kekhaicuocvchk','KkCuocVcHkController');
Route::get('kkvchk/kiemtra','KkCuocVcHkController@kiemtra');
Route::post('kekhaicuocvchk/chuyen','KkCuocVcHkController@chuyen');
Route::get('/kkvchk/showlydo','KkCuocVcHkController@showlydo');
Route::post('kekhaicuocvchk/delete','KkCuocVcHkController@delete');
Route::get('kekhaicuocvchk/prints','KkCuocVcHkController@prints');

Route::get('giavchkctdf/storett','KkCuocVcHkCtDfController@store');
Route::get('giavchkctdf/edittt','KkCuocVcHkCtDfController@edit');
Route::get('giavchkctdf/updatett','KkCuocVcHkCtDfController@update');
Route::get('giavchkctdf/deletett','KkCuocVcHkCtDfController@destroy');

Route::get('giacuocvchkct/storett','KkCuocVcHkCtController@store');
Route::get('giacuocvchkct/edittt','KkCuocVcHkCtController@edit');
Route::get('giacuocvchkct/updatett','KkCuocVcHkCtController@update');
Route::get('giacuocvchkct/deletett','KkCuocVcHkCtController@destroy');

Route::get('xetduyetkekhaigiavtxb','KkGiaVtXbXdController@index');
Route::get('ttdnkkvtxb','KkGiaVtXbXdController@ttdn');
Route::post('xetduyetkekhaigiavtxb/tralai','KkGiaVtXbXdController@tralai');
Route::get('xetduyetkekhaigiavtxb/ttnhanhs','KkGiaVtXbXdController@ttnhanhs');
Route::post('xetduyetkekhaigiavtxb/nhanhs','KkGiaVtXbXdController@nhanhs');