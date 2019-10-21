<?php
Route::get('thongtindndlbb','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbController@ttdn');
Route::resource('kekhaigiadvdlbb','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbController');

Route::get('giadvdlbb/kiemtra','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbController@kiemtra');
Route::post('kekhaigiadvdlbb/chuyen','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbController@chuyen');
Route::get('/giadvdlbb/showlydo','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbController@showlydo');
Route::post('kekhaigiadvdlbb/delete','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbController@delete');

Route::get('kekhaigiadvdlbb/prints','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbController@prints');

Route::get('giadvdlbbct/storett','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbCtController@store');
Route::get('giadvdlbbct/edittt','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbCtController@edit');
Route::get('giadvdlbbct/updatett','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbCtController@update');
Route::get('giadvdlbbct/deletett','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbCtController@destroy');


Route::get('xetduyetgiadvdlbb','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbXdController@index');
Route::get('ttdnkkgiadvdlbb','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbXdController@ttdn');
Route::post('xetduyetgiadvdlbb/tralai','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbXdController@tralai');
Route::get('xetduyetgiadvdlbb/ttnhanhs','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbXdController@ttnhanhs');
Route::post('xetduyetgiadvdlbb/nhanhs','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbXdController@nhanhs');
Route::get('timkiemgiadvdlbb','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbXdController@search');

Route::get('baocaokekhaidvdlbb','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbBcController@index');
Route::post('baocaokekhaidvdlbb/bc1','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbBcController@bc1');
Route::post('baocaokekhaidvdlbb/bc2','manage\kekhaigia\kkgiadvdlbb\GiaDvDlBbBcController@bc2');