<?php
Route::get('thongtindnkkgiadvhdtm','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmController@ttdn');
Route::resource('thongtinkkdvhoatdongthuongmai','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmController');
Route::post('thongtinkkdvhoatdongthuongmai/delete','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmController@delete');
Route::post('thongtinkkdvhoatdongthuongmai/chuyen','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmController@chuyen');

Route::get('kkdvhdtm/kiemtra','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmController@kiemtra');
Route::get('kkdvhdtm/showlydo','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmController@showlydo');

Route::get('/kkgiadvhdtmctdf/storett','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtDfController@store');
Route::get('/kkgiadvhdtmctdf/edittt','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtDfController@edit');
Route::get('/kkgiadvhdtmctdf/updatett','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtDfController@update');
Route::get('/kkgiadvhdtmctdf/deletett','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtDfController@delete');

Route::get('/kkgiadvhdtmct/storett','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtController@store');
Route::get('/kkgiadvhdtmct/edittt','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtController@edit');
Route::get('/kkgiadvhdtmct/updatett','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtController@update');
Route::get('/kkgiadvhdtmct/deletett','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmCtController@delete');

Route::get('xetduyetkkgiadvhdtm','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmXdController@index');
Route::post('xetduyetkkgiadvhdtm/tralai','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmXdController@tralai');
Route::get('ttdndvhdtm','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmXdController@ttdn');
Route::get('/xetduyetkkgiadvhdtm/ttnhanhs','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmXdController@ttnhanhs');
Route::post('/xetduyetkkgiadvhdtm/nhanhs','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmXdController@nhanhs');

Route::get('timkiemgiadvhdtm','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmXdController@search');


Route::get('baocaokkgiadvhdtm','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmBcController@index');
Route::post('baocaokkgiadvhdtm/bc1','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmBcController@bc1');
Route::post('baocaokkgiadvhdtm/bc2','manage\kekhaigia\kkdvhdtmck\KkGiaDvHdTmBcController@bc2');

?>