<?php
Route::resource('danhmucvatlieuxaydung','DmVlXdController');
Route::post('danhmucvatlieuxaydung/update','DmVlXdController@update');

Route::get('thongtindnkkgiavlxd','KkGiaVlXdController@ttdn');
Route::resource('thongtinkekhaigiavatlieuxaydung','KkGiaVlXdController');
Route::post('thongtinkekhaigiavatlieuxaydung/delete','KkGiaVlXdController@delete');
Route::post('thongtinkekhaigiavatlieuxaydung/chuyen','KkGiaVlXdController@chuyen');

Route::get('kkvlxd/kiemtra','KkGiaVlXdController@kiemtra');
Route::get('kkvlxd/showlydo','KkGiaVlXdController@showlydo');


Route::get('/kkgiavlxdctdf/storett','KkGiaVlXdCtDfController@store');
Route::get('/kkgiavlxdctdf/edittt','KkGiaVlXdCtDfController@edit');
Route::get('/kkgiavlxdctdf/updatett','KkGiaVlXdCtDfController@update');
Route::get('/kkgiavlxdctdf/deletett','KkGiaVlXdCtDfController@delete');

Route::get('/kkgiavlxdct/storett','KkGiaVlXdCtController@store');
Route::get('/kkgiavlxdct/edittt','KkGiaVlXdCtController@edit');
Route::get('/kkgiavlxdct/updatett','KkGiaVlXdCtController@update');
Route::get('/kkgiavlxdct/deletett','KkGiaVlXdCtController@delete');

//End Ajax create

Route::get('xetduyetkkgiavlxd','KkGiaVlXdXdController@index');
Route::post('xetduyetkkgiavlxd/tralai','KkGiaVlXdXdController@tralai');
Route::get('ttdnkkvlxd','KkGiaVlXdXdController@ttdnkkvlxd');
Route::get('/xetduyetkkgiavlxd/ttnhanhs','KkGiaVlXdXdController@ttnhanhs');
Route::post('/xetduyetkkgiavlxd/nhanhs','KkGiaVlXdXdController@nhanhs');
Route::get('timkiemkkgiavlxd','KkGiaVlXdXdController@search');

?>