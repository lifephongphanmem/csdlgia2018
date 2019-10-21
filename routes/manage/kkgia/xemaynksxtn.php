<?php
Route::get('thongtindnxemaynksx','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxController@ttdn');
Route::resource('kekhaigiaxemaynksx','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxController');

Route::get('giaxemaynksx/kiemtra','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxController@kiemtra');
Route::post('kekhaigiaxemaynksx/chuyen','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxController@chuyen');
Route::get('/giaxemaynksx/showlydo','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxController@showlydo');
Route::post('kekhaigiaxemaynksx/delete','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxController@delete');

Route::get('kekhaigiaxemaynksx/prints','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxController@prints');

Route::get('giaxemaynksxct/storett','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxCtController@store');
Route::get('giaxemaynksxct/edittt','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxCtController@edit');
Route::get('giaxemaynksxct/updatett','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxCtController@update');
Route::get('giaxemaynksxct/deletett','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxCtController@destroy');


Route::get('xetduyetgiaxemaynksx','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxXdController@index');
Route::get('ttdnkkgiaxemaynksx','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxXdController@ttdn');
Route::post('xetduyetgiaxemaynksx/tralai','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxXdController@tralai');
Route::get('xetduyetgiaxemaynksx/ttnhanhs','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxXdController@ttnhanhs');
Route::post('xetduyetgiaxemaynksx/nhanhs','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxXdController@nhanhs');
Route::get('timkiemgiaxemaynksx','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxXdController@search');

Route::get('baocaokkgiaxemaynksx','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxBcController@index');
Route::post('baocaokkgiaxemaynksx/bc1','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxBcController@bc1');
Route::post('baocaokkgiaxemaynksx/bc2','manage\kekhaigia\kkgiaxemaynksx\GiaXeMayNkSxBcController@bc2');