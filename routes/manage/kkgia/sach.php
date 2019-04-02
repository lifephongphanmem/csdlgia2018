<?php
Route::get('thongtindnsach','KkGiaSachController@ttdn');
Route::resource('kekhaigiasach','KkGiaSachController');
Route::get('giasach/kiemtra','KkGiaSachController@kiemtra');
Route::post('kekhaigiasach/chuyen','KkGiaSachController@chuyen');
Route::get('/giasach/showlydo','KkGiaSachController@showlydo');
Route::post('kekhaigiasach/delete','KkGiaSachController@delete');
Route::get('kekhaigiasach/prints','KkGiaSachController@prints');

Route::get('giasachctdf/storett','KkGiaSachCtDfController@store');
Route::get('giasachctdf/edittt','KkGiaSachCtDfController@edit');
Route::get('giasachctdf/updatett','KkGiaSachCtDfController@update');
Route::get('giasachctdf/deletett','KkGiaSachCtDfController@destroy');

Route::get('giasachct/storett','KkGiaSachCtController@store');
Route::get('giasachct/edittt','KkGiaSachCtController@edit');
Route::get('giasachct/updatett','KkGiaSachCtController@update');
Route::get('giasachct/deletett','KkGiaSachCtController@destroy');

Route::get('xetduyetgiasach','KkGiaSachXdController@index');
Route::get('ttdnkksach','KkGiaSachXdController@ttdn');
Route::post('xetduyetgiasach/tralai','KkGiaSachXdController@tralai');
Route::get('xetduyetgiasach/ttnhanhs','KkGiaSachXdController@ttnhanhs');
Route::post('xetduyetgiasach/nhanhs','KkGiaSachXdController@nhanhs');
Route::get('timkiemgiasach','KkGiaSachXdController@search');