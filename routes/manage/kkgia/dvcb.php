<?php
Route::get('thongtindndvcang','manage\kekhaigia\kkgiadvcang\GiaDvCangController@ttdn');
Route::resource('kekhaigiadvcang','manage\kekhaigia\kkgiadvcang\GiaDvCangController');

Route::get('giadvcang/kiemtra','manage\kekhaigia\kkgiadvcang\GiaDvCangController@kiemtra');
Route::post('kekhaigiadvcang/chuyen','manage\kekhaigia\kkgiadvcang\GiaDvCangController@chuyen');
Route::get('/giadvcang/showlydo','manage\kekhaigia\kkgiadvcang\GiaDvCangController@showlydo');
Route::post('kekhaigiadvcang/delete','manage\kekhaigia\kkgiadvcang\GiaDvCangController@delete');

Route::get('kekhaigiadvcang/prints','manage\kekhaigia\kkgiadvcang\GiaDvCangController@prints');

Route::get('giadvcangct/storett','manage\kekhaigia\kkgiadvcang\GiaDvCangCtController@store');
Route::get('giadvcangct/edittt','manage\kekhaigia\kkgiadvcang\GiaDvCangCtController@edit');
Route::get('giadvcangct/updatett','manage\kekhaigia\kkgiadvcang\GiaDvCangCtController@update');
Route::get('giadvcangct/deletett','manage\kekhaigia\kkgiadvcang\GiaDvCangCtController@destroy');


Route::get('xetduyetgiadvcang','manage\kekhaigia\kkgiadvcang\GiaDvCangXdController@index');
Route::get('ttdnkkgiadvcang','manage\kekhaigia\kkgiadvcang\GiaDvCangXdController@ttdn');
Route::post('xetduyetgiadvcang/tralai','manage\kekhaigia\kkgiadvcang\GiaDvCangXdController@tralai');
Route::get('xetduyetgiadvcang/ttnhanhs','manage\kekhaigia\kkgiadvcang\GiaDvCangXdController@ttnhanhs');
Route::post('xetduyetgiadvcang/nhanhs','manage\kekhaigia\kkgiadvcang\GiaDvCangXdController@nhanhs');
Route::get('timkiemgiadvcang','manage\kekhaigia\kkgiadvcang\GiaDvCangXdController@search');