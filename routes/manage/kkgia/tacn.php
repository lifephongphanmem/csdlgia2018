<?php
Route::get('thontindntacn','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@ttdn');
Route::get('kekhaigiathucanchannuoi','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@index');
Route::get('kekhaigiathucanchannuoi/create','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@create');
Route::post('kekhaigiathucanchannuoi','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@store');
Route::get('kekhaigiathucanchannuoi/{id}/edit','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@edit');
Route::patch('kekhaigiathucanchannuoi/{id}','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@update');

Route::post('kekhaigiathucanchannuoi/chuyen','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@chuyen');
Route::get('/kktacn/showlydo','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@showlydo');
Route::post('kekhaigiathucanchannuoi/delete','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@delete');
Route::get('kekhaigiathucanchannuoi/prints','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@show');
Route::get('kekhaigiathucanchannuoi/nhandulieutuexcel','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@nhandulieutuexcel');
Route::post('kekhaigiathucanchannuoi/import_excel','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@importexcel');


//Ajax chuyen
Route::get('/kktacn/kiemtra','manage\kekhaigia\kkgiatacn\KkGiaTaCnController@kiemtra');
//End Ajax chuyển

Route::get('/kkgdvtacnctdf/storett','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@store');
Route::get('/kkgdvtacnctdf/edittt','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@edit');
Route::get('/kkgdvtacnctdf/updatett','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@update');
Route::get('/kkgdvtacnctdf/deletett','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@delete');
Route::get('/kkgdvtacnctdf/kkgiahh','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@kkgia');
Route::get('/kkgdvtacnctdf/upkkgia','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@upkkgia');

Route::get('/kkgdvtacnctdf/kkgiahhlk','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@kkgialk');
Route::get('/kkgdvtacnctdf/upkkgialk','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtDfController@upkkgialk');
//End Ajax create

//Ajax edit
Route::get('/kkgdvtacnct/boxungtt','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@store');
Route::get('/kkgdvtacnct/chinhsuatt','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@edit');
Route::get('/kkgdvtacnct/capnhattt','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@update');
Route::get('/kkgdvtacnct/xoatt','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@delete');
Route::get('/kkgdvtacnct/kkgiahhedit','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@kkgia');
Route::get('/kkgdvtacnct/upkkgiaedit','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@upkkgia');
Route::get('/kkgdvtacnct/kkgiahhlkedit','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@kkgialk');
Route::get('/kkgdvtacnct/upkkgialkedit','manage\kekhaigia\kkgiatacn\KkGiaTaCnCtController@upkkgialk');
//End Ajax edit

//Xét duyệt kk tacn
Route::get('xetduyetkekhaigiatacn','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@index');
Route::post('xetduyetkekhaigiatacn/tralai','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@tralai');
Route::get('xetduyetkekhaigiatacn/ttnhanhs','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@ttnhanhs');
Route::post('xetduyetkekhaigiatacn/nhanhs','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@nhanhs');
Route::post('xetduyetkekhaigiatacn/congbo','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@congbo');
Route::post('xetduyetkekhaigiatacn/huycongbo','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@huycongbo');
//End xét duyệt kk TACN
Route::get('timkiemkekhaigiatacn','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@search');

//Ajax
Route::get('/ttdnkktacn','manage\kekhaigia\kkgiatacn\KkGiaTaCnXdController@ttdnkktacn');

Route::get('baocaokekhaitacn','manage\kekhaigia\kkgiatacn\KkGiaTaCnBcController@index');
Route::post('baocaokekhaitacn/bc1','manage\kekhaigia\kkgiatacn\KkGiaTaCnBcController@bc1');
Route::post('baocaokekhaitacn/bc2','manage\kekhaigia\kkgiatacn\KkGiaTaCnBcController@bc2');


?>