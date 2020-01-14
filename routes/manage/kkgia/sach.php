<?php
Route::get('thongtindnsach','manage\kekhaigia\kkgiasach\KkGiaSachController@ttdn');
Route::get('kekhaigiasach','manage\kekhaigia\kkgiasach\KkGiaSachController@index');
Route::get('kekhaigiasach/create','manage\kekhaigia\kkgiasach\KkGiaSachController@create');
Route::post('kekhaigiasach','manage\kekhaigia\kkgiasach\KkGiaSachController@store');
Route::get('kekhaigiasach/{id}/edit','manage\kekhaigia\kkgiasach\KkGiaSachController@edit');
Route::patch('kekhaigiasach/{id}','manage\kekhaigia\kkgiasach\KkGiaSachController@update');


Route::get('giasach/kiemtra','manage\kekhaigia\kkgiasach\KkGiaSachController@kiemtra');
Route::post('kekhaigiasach/chuyen','manage\kekhaigia\kkgiasach\KkGiaSachController@chuyen');
Route::get('/giasach/showlydo','manage\kekhaigia\kkgiasach\KkGiaSachController@showlydo');
Route::post('kekhaigiasach/delete','manage\kekhaigia\kkgiasach\KkGiaSachController@delete');
Route::get('kekhaigiasach/prints','manage\kekhaigia\kkgiasach\KkGiaSachController@show');
Route::get('kekhaigiasach/nhandulieutuexcel','manage\kekhaigia\kkgiasach\KkGiaSachController@nhandulieutuexcel');
Route::post('kekhaigiasach/import_excel','manage\kekhaigia\kkgiasach\KkGiaSachController@importexcel');

Route::get('giasachctdf/storett','manage\kekhaigia\kkgiasach\KkGiaSachCtDfController@store');
Route::get('giasachctdf/edittt','manage\kekhaigia\kkgiasach\KkGiaSachCtDfController@edit');
Route::get('giasachctdf/updatett','manage\kekhaigia\kkgiasach\KkGiaSachCtDfController@update');
Route::get('giasachctdf/deletett','manage\kekhaigia\kkgiasach\KkGiaSachCtDfController@destroy');

Route::get('giasachct/storett','manage\kekhaigia\kkgiasach\KkGiaSachCtController@store');
Route::get('giasachct/edittt','manage\kekhaigia\kkgiasach\KkGiaSachCtController@edit');
Route::get('giasachct/updatett','manage\kekhaigia\kkgiasach\KkGiaSachCtController@update');
Route::get('giasachct/deletett','manage\kekhaigia\kkgiasach\KkGiaSachCtController@destroy');

Route::get('xetduyetgiasach','manage\kekhaigia\kkgiasach\KkGiaSachXdController@index');
Route::get('ttdnkksach','manage\kekhaigia\kkgiasach\KkGiaSachXdController@ttdn');
Route::post('xetduyetgiasach/tralai','manage\kekhaigia\kkgiasach\KkGiaSachXdController@tralai');
Route::get('xetduyetgiasach/ttnhanhs','manage\kekhaigia\kkgiasach\KkGiaSachXdController@ttnhanhs');
Route::post('xetduyetgiasach/nhanhs','manage\kekhaigia\kkgiasach\KkGiaSachXdController@nhanhs');
Route::post('xetduyetgiasach/congbo','manage\kekhaigia\kkgiasach\KkGiaSachXdController@congbo');
Route::post('xetduyetgiasach/huycongbo','manage\kekhaigia\kkgiasach\KkGiaSachXdController@huycongbo');
Route::get('timkiemgiasach','manage\kekhaigia\kkgiasach\KkGiaSachXdController@search');

Route::get('baocaokkgiasach','manage\kekhaigia\kkgiasach\KkGiaSachBcController@index');
Route::post('baocaokkgiasach/bc1','manage\kekhaigia\kkgiasach\KkGiaSachBcController@bc1');
Route::post('baocaokkgiasach/bc2','manage\kekhaigia\kkgiasach\KkGiaSachBcController@bc2');