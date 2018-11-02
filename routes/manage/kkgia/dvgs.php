<?php
//Route::get('thongtindnkkgs','KkGsController@ttdn');
Route::resource('kekhaigiasua','KkGsController');
Route::post('kekhaigiasua/chuyen','KkGsController@chuyen');
Route::get('/kkgdvgs/showlydo','KkGsController@showlydo');
Route::post('kekhaigiasua/delete','KkGsController@delete');
Route::get('kekhaigiasua/prints','KkGsController@prints');


//Ajax chuyen
Route::get('/kkgdvgs/kiemtra','KkGsController@kiemtra');
//End Ajax chuyển

//Ajax create
Route::get('/kkgdvgs/storett','KkGsCtDfController@store');
Route::get('/kkgdvgs/edittt','KkGsCtDfController@edit');
Route::get('/kkgdvgs/updatett','KkGsCtDfController@update');
Route::get('/kkgdvgs/deletett','KkGsCtDfController@delete');
Route::get('/kkgdvgs/kkgiahh','KkGsCtDfController@kkgia');
Route::get('/kkgdvgs/upkkgia','KkGsCtDfController@upkkgia');

Route::get('/kkgdvgs/kkgiahhlk','KkGsCtDfController@kkgialk');
Route::get('/kkgdvgs/upkkgialk','KkGsCtDfController@upkkgialk');
//End Ajax create

//Ajax edit
Route::get('/kkgdvgs/boxungtt','KkGsCtController@store');
Route::get('/kkgdvgs/chinhsuatt','KkGsCtController@edit');
Route::get('/kkgdvgs/capnhattt','KkGsCtController@update');
Route::get('/kkgdvgs/xoatt','KkGsCtController@delete');
Route::get('/kkgdvgs/kkgiahhedit','KkGsCtController@kkgia');
Route::get('/kkgdvgs/upkkgiaedit','KkGsCtController@upkkgia');
Route::get('/kkgdvgs/kkgiahhlkedit','KkGsCtController@kkgialk');
Route::get('/kkgdvgs/upkkgialkedit','KkGsCtController@upkkgialk');
//End Ajax edit

//Xét duyệt kk giá sữa
Route::get('xdkekhaigiasua','KkGsXdController@index');
Route::post('xdkekhaigiasua/tralai','KkGsXdController@tralai');
Route::get('xdkekhaigiasua/ttnhanhs','KkGsXdController@ttnhanhs');
Route::post('xdkekhaigiasua/nhanhs','KkGsXdController@nhanhs');
//End xét duyệt kk giá sữa
Route::get('timkiemkekhaigiasua','KkGsXdController@search');

//Ajax
Route::get('/ttdnkkdvgs','KkGsXdController@ttdnkkdvgs');

Route::get('baocaokekhaigiasua','ReportsKkGsController@index');
Route::post('reports/kekhaigiasua/BC5','ReportsKkGsController@dvltbc5');
Route::post('reports/kekhaigiasua/BC6','ReportsKkGsController@dvltbc6');

?>