<?php
Route::get('thongtindnthan','KkGiaThanController@ttdn');
Route::resource('kekhaigiathan','KkGiaThanController');
Route::get('giathan/kiemtra','KkGiaThanController@kiemtra');
Route::post('kekhaigiathan/chuyen','KkGiaThanController@chuyen');
Route::get('/giathan/showlydo','KkGiaThanController@showlydo');
Route::post('kekhaigiathan/delete','KkGiaThanController@delete');
Route::get('kekhaigiathan/prints','KkGiaThanController@prints');

Route::get('giathanctdf/storett','KkGiaThanCtDfController@store');
Route::get('giathanctdf/edittt','KkGiaThanCtDfController@edit');
Route::get('giathanctdf/updatett','KkGiaThanCtDfController@update');
Route::get('giathanctdf/deletett','KkGiaThanCtDfController@destroy');

Route::get('giathanct/storett','KkGiaThanCtController@store');
Route::get('giathanct/edittt','KkGiaThanCtController@edit');
Route::get('giathanct/updatett','KkGiaThanCtController@update');
Route::get('giathanct/deletett','KkGiaThanCtController@destroy');

Route::get('xetduyetgiathan','KkGiaThanXdController@index');
Route::get('ttdnkkthan','KkGiaThanXdController@ttdn');
Route::post('xetduyetgiathan/tralai','KkGiaThanXdController@tralai');
Route::get('xetduyetgiathan/ttnhanhs','KkGiaThanXdController@ttnhanhs');
Route::post('xetduyetgiathan/nhanhs','KkGiaThanXdController@nhanhs');
Route::get('timkiemgiathan','KkGiaThanXdController@search');