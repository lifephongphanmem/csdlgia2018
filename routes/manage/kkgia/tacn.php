<?php
Route::get('thontindntacn','KkGiaTaCnController@ttdn');
Route::resource('kekhaigiathucanchannuoi','KkGiaTaCnController');
Route::post('kekhaigiathucanchannuoi/chuyen','KkGiaTaCnController@chuyen');
Route::get('/kktacn/showlydo','KkGiaTaCnController@showlydo');
Route::post('kekhaigiathucanchannuoi/delete','KkGiaTaCnController@delete');
Route::get('kekhaigiathucanchannuoi/prints','KkGiaTaCnController@prints');


//Ajax chuyen
Route::get('/kktacn/kiemtra','KkGiaTaCnController@kiemtra');
//End Ajax chuyển

Route::get('/kkgdvtacnctdf/storett','KkGiaTaCnCtDfController@store');
Route::get('/kkgdvtacnctdf/edittt','KkGiaTaCnCtDfController@edit');
Route::get('/kkgdvtacnctdf/updatett','KkGiaTaCnCtDfController@update');
Route::get('/kkgdvtacnctdf/deletett','KkGiaTaCnCtDfController@delete');
Route::get('/kkgdvtacnctdf/kkgiahh','KkGiaTaCnCtDfController@kkgia');
Route::get('/kkgdvtacnctdf/upkkgia','KkGiaTaCnCtDfController@upkkgia');

Route::get('/kkgdvtacnctdf/kkgiahhlk','KkGiaTaCnCtDfController@kkgialk');
Route::get('/kkgdvtacnctdf/upkkgialk','KkGiaTaCnCtDfController@upkkgialk');
//End Ajax create

//Ajax edit
Route::get('/kkgdvtacnct/boxungtt','KkGiaTaCnCtController@store');
Route::get('/kkgdvtacnct/chinhsuatt','KkGiaTaCnCtController@edit');
Route::get('/kkgdvtacnct/capnhattt','KkGiaTaCnCtController@update');
Route::get('/kkgdvtacnct/xoatt','KkGiaTaCnCtController@delete');
Route::get('/kkgdvtacnct/kkgiahhedit','KkGiaTaCnCtController@kkgia');
Route::get('/kkgdvtacnct/upkkgiaedit','KkGiaTaCnCtController@upkkgia');
Route::get('/kkgdvtacnct/kkgiahhlkedit','KkGiaTaCnCtController@kkgialk');
Route::get('/kkgdvtacnct/upkkgialkedit','KkGiaTaCnCtController@upkkgialk');
//End Ajax edit

//Xét duyệt kk tacn
Route::get('xetduyetkekhaigiatacn','KkGiaTaCnXdController@index');
Route::post('xetduyetkekhaigiatacn/tralai','KkGiaTaCnXdController@tralai');
Route::get('xetduyetkekhaigiatacn/ttnhanhs','KkGiaTaCnXdController@ttnhanhs');
Route::post('xetduyetkekhaigiatacn/nhanhs','KkGiaTaCnXdController@nhanhs');
//End xét duyệt kk TACN
Route::get('timkiemkekhaigiatacn','KkGiaTaCnXdController@search');

//Ajax
Route::get('/ttdnkktacn','KkGiaTaCnXdController@ttdnkktacn');

/*Route::get('baocaokekhaigiatpcnte6t','ReportsKkGsController@index');
Route::post('reports/kekhaigiasua/BC5','ReportsKkGsController@dvltbc5');
Route::post('reports/kekhaigiasua/BC6','ReportsKkGsController@dvltbc6');*/

?>