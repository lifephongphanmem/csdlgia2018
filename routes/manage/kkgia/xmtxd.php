<?php
Route::get('thongtindnkkgiaxmtxd','KkGiaXmTxdController@ttdn');
Route::resource('thongtinkekhaiximangthepxaydung','KkGiaXmTxdController');
Route::post('thongtinkekhaiximangthepxaydung/delete','KkGiaXmTxdController@delete');
Route::post('thongtinkekhaiximangthepxaydung/chuyen','KkGiaXmTxdController@chuyen');

Route::get('kkxmtxd/kiemtra','KkGiaXmTxdController@kiemtra');
Route::get('kkxmtxd/showlydo','KkGiaXmTxdController@showlydo');

Route::get('/kkgiaxmtxdctdf/storett','KkGiaXmTxdCtDfController@store');
Route::get('/kkgiaxmtxdctdf/edittt','KkGiaXmTxdCtDfController@edit');
Route::get('/kkgiaxmtxdctdf/updatett','KkGiaXmTxdCtDfController@update');
Route::get('/kkgiaxmtxdctdf/deletett','KkGiaXmTxdCtDfController@delete');

Route::get('/kkgiaxmtxdct/storett','KkGiaXmTxdCtController@store');
Route::get('/kkgiaxmtxdct/edittt','KkGiaXmTxdCtController@edit');
Route::get('/kkgiaxmtxdct/updatett','KkGiaXmTxdCtController@update');
Route::get('/kkgiaxmtxdct/deletett','KkGiaXmTxdCtController@delete');

Route::get('xetduyetkkgiaxmtxd','KkGiaXmTxdXdController@index');
Route::post('xetduyetkkgiaxmtxd/tralai','KkGiaXmTxdXdController@tralai');
Route::get('ttdnkkxmtxd','KkGiaXmTxdXdController@ttdnkkxmtxd');
Route::get('/xetduyetkkgiaxmtxd/ttnhanhs','KkGiaXmTxdXdController@ttnhanhs');
Route::post('/xetduyetkkgiaxmtxd/nhanhs','KkGiaXmTxdXdController@nhanhs');

Route::get('timkiemgiaxmtxd','KkGiaXmTxdXdController@search');
?>