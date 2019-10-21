<?php
Route::get('thongtindnkcbtn','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnController@ttdn');
Route::resource('kekhaigiakcbtn','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnController');
Route::get('giakcbtn/kiemtra','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnController@kiemtra');
Route::post('kekhaigiakcbtn/chuyen','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnController@chuyen');
Route::get('/giakcbtn/showlydo','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnController@showlydo');
Route::post('kekhaigiakcbtn/delete','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnController@delete');
Route::get('kekhaigiakcbtn/prints','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnController@prints');

Route::get('giakcbtnctdf/storett','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtDfController@store');
Route::get('giakcbtnctdf/edittt','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtDfController@edit');
Route::get('giakcbtnctdf/updatett','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtDfController@update');
Route::get('giakcbtnctdf/deletett','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtDfController@destroy');

Route::get('giakcbtnct/storett','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtController@store');
Route::get('giakcbtnct/edittt','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtController@edit');
Route::get('giakcbtnct/updatett','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtController@update');
Route::get('giakcbtnct/deletett','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnCtController@destroy');

Route::get('xetduyetgiakcbtn','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnXdController@index');
Route::get('ttdnkkkcbtn','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnXdController@ttdn');
Route::post('xetduyetgiakcbtn/tralai','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnXdController@tralai');
Route::get('xetduyetgiakcbtn/ttnhanhs','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnXdController@ttnhanhs');
Route::post('xetduyetgiakcbtn/nhanhs','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnXdController@nhanhs');
Route::get('timkiemgiakcbtn','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnXdController@search');

Route::get('baocaogiakcbtn','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnBcController@index');
Route::post('baocaogiakcbtn/bc1','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnBcController@bc1');
Route::post('baocaogiakcbtn/bc2','manage\kekhaigia\kkgiakcbtn\KkGiaKcbTnBcController@bc2');