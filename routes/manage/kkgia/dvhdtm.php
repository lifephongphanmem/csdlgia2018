<?php
Route::get('thongtindnkkgiadvhdtm','KkGiaDvHdTmController@ttdn');
Route::resource('thongtinkkdvhoatdongthuongmai','KkGiaDvHdTmController');
Route::post('thongtinkkdvhoatdongthuongmai/delete','KkGiaDvHdTmController@delete');
Route::post('thongtinkkdvhoatdongthuongmai/chuyen','KkGiaDvHdTmController@chuyen');

Route::get('kkdvhdtm/kiemtra','KkGiaDvHdTmController@kiemtra');
Route::get('kkdvhdtm/showlydo','KkGiaDvHdTmController@showlydo');

Route::get('/kkgiadvhdtmctdf/storett','KkGiaDvHdTmCtDfController@store');
Route::get('/kkgiadvhdtmctdf/edittt','KkGiaDvHdTmCtDfController@edit');
Route::get('/kkgiadvhdtmctdf/updatett','KkGiaDvHdTmCtDfController@update');
Route::get('/kkgiadvhdtmctdf/deletett','KkGiaDvHdTmCtDfController@delete');

Route::get('/kkgiadvhdtmct/storett','KkGiaDvHdTmCtController@store');
Route::get('/kkgiadvhdtmct/edittt','KkGiaDvHdTmCtController@edit');
Route::get('/kkgiadvhdtmct/updatett','KkGiaDvHdTmCtController@update');
Route::get('/kkgiadvhdtmct/deletett','KkGiaDvHdTmCtController@delete');

Route::get('xetduyetkkgiadvhdtm','KkGiaDvHdTmXdController@index');
Route::post('xetduyetkkgiadvhdtm/tralai','KkGiaDvHdTmXdController@tralai');
Route::get('ttdndvhdtm','KkGiaDvHdTmXdController@ttdn');
Route::get('/xetduyetkkgiadvhdtm/ttnhanhs','KkGiaDvHdTmXdController@ttnhanhs');
Route::post('/xetduyetkkgiadvhdtm/nhanhs','KkGiaDvHdTmXdController@nhanhs');

Route::get('timkiemgiadvhdtm','KkGiaDvHdTmXdController@search');
?>