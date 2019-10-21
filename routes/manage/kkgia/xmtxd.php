<?php
Route::get('thongtindnkkgiaxmtxd','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdController@ttdn');
Route::resource('thongtinkekhaiximangthepxaydung','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdController');
Route::post('thongtinkekhaiximangthepxaydung/delete','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdController@delete');
Route::post('thongtinkekhaiximangthepxaydung/chuyen','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdController@chuyen');

Route::get('kkxmtxd/kiemtra','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdController@kiemtra');
Route::get('kkxmtxd/showlydo','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdController@showlydo');

Route::get('/kkgiaxmtxdctdf/storett','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtDfController@store');
Route::get('/kkgiaxmtxdctdf/edittt','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtDfController@edit');
Route::get('/kkgiaxmtxdctdf/updatett','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtDfController@update');
Route::get('/kkgiaxmtxdctdf/deletett','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtDfController@delete');

Route::get('/kkgiaxmtxdct/storett','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtController@store');
Route::get('/kkgiaxmtxdct/edittt','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtController@edit');
Route::get('/kkgiaxmtxdct/updatett','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtController@update');
Route::get('/kkgiaxmtxdct/deletett','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdCtController@delete');

Route::get('xetduyetkkgiaxmtxd','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdXdController@index');
Route::post('xetduyetkkgiaxmtxd/tralai','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdXdController@tralai');
Route::get('ttdnkkxmtxd','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdXdController@ttdnkkxmtxd');
Route::get('/xetduyetkkgiaxmtxd/ttnhanhs','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdXdController@ttnhanhs');
Route::post('/xetduyetkkgiaxmtxd/nhanhs','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdXdController@nhanhs');

Route::get('timkiemgiaxmtxd','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdXdController@search');

Route::get('baocaokekhaigiaxmtxd','manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdBcController@index');
Route::post('baocaokekhaigiaxmtxd/bc1', 'manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdBcController@bc1');
Route::post('baocaokekhaigiaxmtxd/bc2', 'manage\kekhaigia\kkgiaxmtxd\KkGiaXmTxdBcController@bc2');
?>