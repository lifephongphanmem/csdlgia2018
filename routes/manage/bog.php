<?php
Route::resource('dmmhbinhongia','DmMhBinhOnGiaController');
Route::get('dmmhbinhongia/edittt','DmMhBinhOnGiaController@show');
Route::post('dmmhbinhongia/update','DmMhBinhOnGiaController@update');
Route::post('dmmhbinhongia/delete','DmMhBinhOnGiaController@destroy');


Route::resource('binhongia','BinhOnGiaController');
Route::post('binhongia/delete','BinhOnGiaController@destroy');

Route::post('binhongia/hoanthanh','BinhOnGiaController@hoanthanh');
Route::post('binhongia/huyhoanthanh','BinhOnGiaController@huyhoanthanh');
Route::post('binhongia/congbo','BinhOnGiaController@congbo');

Route::get('timkiemthongtinbog','BinhOnGiaController@search');

Route::get('binhongiactdf/add','BinhOnGiaCtDfController@add');
Route::get('binhongiactdf/show','BinhOnGiaCtDfController@show');
Route::get('binhongiactdf/update','BinhOnGiaCtDfController@update');
Route::get('binhongiactdf/del','BinhOnGiaCtDfController@destroy');

Route::get('/binhongiact/store','BinhOnGiaCtController@store');
Route::get('/binhongiact/show','BinhOnGiaCtController@show');
Route::get('/binhongiact/update','BinhOnGiaCtController@update');
Route::get('/binhongiact/del','BinhOnGiaCtController@destroy');



?>