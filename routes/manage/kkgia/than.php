<?php
Route::get('thongtindnthan','manage\kekhaigia\kkgiathan\KkGiaThanController@ttdn');
Route::resource('kekhaigiathan','manage\kekhaigia\kkgiathan\KkGiaThanController');
Route::get('giathan/kiemtra','manage\kekhaigia\kkgiathan\KkGiaThanController@kiemtra');
Route::post('kekhaigiathan/chuyen','manage\kekhaigia\kkgiathan\KkGiaThanController@chuyen');
Route::get('/giathan/showlydo','manage\kekhaigia\kkgiathan\KkGiaThanController@showlydo');
Route::post('kekhaigiathan/delete','manage\kekhaigia\kkgiathan\KkGiaThanController@delete');
Route::get('kekhaigiathan/prints','manage\kekhaigia\kkgiathan\KkGiaThanController@prints');

Route::get('giathanctdf/storett','manage\kekhaigia\kkgiathan\KkGiaThanCtDfController@store');
Route::get('giathanctdf/edittt','manage\kekhaigia\kkgiathan\KkGiaThanCtDfController@edit');
Route::get('giathanctdf/updatett','manage\kekhaigia\kkgiathan\KkGiaThanCtDfController@update');
Route::get('giathanctdf/deletett','manage\kekhaigia\kkgiathan\KkGiaThanCtDfController@destroy');

Route::get('giathanct/storett','manage\kekhaigia\kkgiathan\KkGiaThanCtController@store');
Route::get('giathanct/edittt','manage\kekhaigia\kkgiathan\KkGiaThanCtController@edit');
Route::get('giathanct/updatett','manage\kekhaigia\kkgiathan\KkGiaThanCtController@update');
Route::get('giathanct/deletett','manage\kekhaigia\kkgiathan\KkGiaThanCtController@destroy');

Route::get('xetduyetgiathan','manage\kekhaigia\kkgiathan\KkGiaThanXdController@index');
Route::get('ttdnkkthan','manage\kekhaigia\kkgiathan\KkGiaThanXdController@ttdn');
Route::post('xetduyetgiathan/tralai','manage\kekhaigia\kkgiathan\KkGiaThanXdController@tralai');
Route::get('xetduyetgiathan/ttnhanhs','manage\kekhaigia\kkgiathan\KkGiaThanXdController@ttnhanhs');
Route::post('xetduyetgiathan/nhanhs','manage\kekhaigia\kkgiathan\KkGiaThanXdController@nhanhs');
Route::get('timkiemgiathan','manage\kekhaigia\kkgiathan\KkGiaThanXdController@search');


Route::get('baocaokkgiathan','manage\kekhaigia\kkgiathan\KkGiaThanBcController@index');
Route::post('baocaokkgiathan/bc1','manage\kekhaigia\kkgiathan\KkGiaThanBcController@bc1');
Route::post('baocaokkgiathan/bc2','manage\kekhaigia\kkgiathan\KkGiaThanBcController@bc2');