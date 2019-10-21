<?php
Route::get('thongtindnotonksx','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxController@ttdn');
Route::resource('kekhaigiaotonksx','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxController');

Route::get('giaotonksx/kiemtra','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxController@kiemtra');
Route::post('kekhaigiaotonksx/chuyen','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxController@chuyen');
Route::get('/giaotonksx/showlydo','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxController@showlydo');
Route::post('kekhaigiaotonksx/delete','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxController@delete');

Route::get('kekhaigiaotonksx/prints','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxController@prints');

Route::get('giaotonksxct/storett','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxCtController@store');
Route::get('giaotonksxct/edittt','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxCtController@edit');
Route::get('giaotonksxct/updatett','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxCtController@update');
Route::get('giaotonksxct/deletett','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxCtController@destroy');


Route::get('xetduyetgiaotonksx','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxXdController@index');
Route::get('ttdnkkgiaotonksx','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxXdController@ttdn');
Route::post('xetduyetgiaotonksx/tralai','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxXdController@tralai');
Route::get('xetduyetgiaotonksx/ttnhanhs','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxXdController@ttnhanhs');
Route::post('xetduyetgiaotonksx/nhanhs','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxXdController@nhanhs');
Route::get('timkiemgiaotonksx','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxXdController@search');

Route::get('baocaokkgiaotonksx','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxBcController@index');
Route::post('baocaokkgiaotonksx/bc1','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxBcController@bc1');
Route::post('baocaokkgiaotonksx/bc2','manage\kekhaigia\kkgiaotonksx\GiaOtoNkSxBcController@bc2');