<?php
Route::get('thongtindnkcbtn','KkGiaKcbTnController@ttdn');
Route::resource('kekhaigiakcbtn','KkGiaKcbTnController');
Route::get('giakcbtn/kiemtra','KkGiaKcbTnController@kiemtra');
Route::post('kekhaigiakcbtn/chuyen','KkGiaKcbTnController@chuyen');
Route::get('/giakcbtn/showlydo','KkGiaKcbTnController@showlydo');
Route::post('kekhaigiakcbtn/delete','KkGiaKcbTnController@delete');
Route::get('kekhaigiakcbtn/prints','KkGiaKcbTnController@prints');

Route::get('giakcbtnctdf/storett','KkGiaKcbTnCtDfController@store');
Route::get('giakcbtnctdf/edittt','KkGiaKcbTnCtDfController@edit');
Route::get('giakcbtnctdf/updatett','KkGiaKcbTnCtDfController@update');
Route::get('giakcbtnctdf/deletett','KkGiaKcbTnCtDfController@destroy');

Route::get('giakcbtnct/storett','KkGiaKcbTnCtController@store');
Route::get('giakcbtnct/edittt','KkGiaKcbTnCtController@edit');
Route::get('giakcbtnct/updatett','KkGiaKcbTnCtController@update');
Route::get('giakcbtnct/deletett','KkGiaKcbTnCtController@destroy');

Route::get('xetduyetgiakcbtn','KkGiaKcbTnXdController@index');
Route::get('ttdnkkkcbtn','KkGiaKcbTnXdController@ttdn');
Route::post('xetduyetgiakcbtn/tralai','KkGiaKcbTnXdController@tralai');
Route::get('xetduyetgiakcbtn/ttnhanhs','KkGiaKcbTnXdController@ttnhanhs');
Route::post('xetduyetgiakcbtn/nhanhs','KkGiaKcbTnXdController@nhanhs');
Route::get('timkiemgiakcbtn','KkGiaKcbTnXdController@search');