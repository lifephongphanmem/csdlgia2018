<?php
Route::get('thongtindntpcn6t','manage\kekhaigia\kkgiatpcnte6t\KkGsController@ttdn');
Route::resource('kekhaithucphamchucnangchote6t','manage\kekhaigia\kkgiatpcnte6t\KkGsController');
Route::post('kekhaithucphamchucnangchote6t/chuyen','manage\kekhaigia\kkgiatpcnte6t\KkGsController@chuyen');
Route::get('/kkgs/showlydo','manage\kekhaigia\kkgiatpcnte6t\KkGsController@showlydo');
Route::post('kekhaithucphamchucnangchote6t/delete','manage\kekhaigia\kkgiatpcnte6t\KkGsController@delete');
Route::get('kekhaithucphamchucnangchote6t/prints','manage\kekhaigia\kkgiatpcnte6t\KkGsController@prints');


//Ajax chuyen
Route::get('/kktpcn6t/kiemtra','manage\kekhaigia\kkgiatpcnte6t\KkGsController@kiemtra');
//End Ajax chuyển

//Ajax create
Route::get('/kkgdvgs/storett','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@store');
Route::get('/kkgdvgs/edittt','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@edit');
Route::get('/kkgdvgs/updatett','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@update');
Route::get('/kkgdvgs/deletett','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@delete');
Route::get('/kkgdvgs/kkgiahh','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@kkgia');
Route::get('/kkgdvgs/upkkgia','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@upkkgia');

Route::get('/kkgdvgs/kkgiahhlk','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@kkgialk');
Route::get('/kkgdvgs/upkkgialk','manage\kekhaigia\kkgiatpcnte6t\KkGsCtDfController@upkkgialk');
//End Ajax create

//Ajax edit
Route::get('/kkgdvgs/boxungtt','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@store');
Route::get('/kkgdvgs/chinhsuatt','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@edit');
Route::get('/kkgdvgs/capnhattt','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@update');
Route::get('/kkgdvgs/xoatt','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@delete');
Route::get('/kkgdvgs/kkgiahhedit','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@kkgia');
Route::get('/kkgdvgs/upkkgiaedit','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@upkkgia');
Route::get('/kkgdvgs/kkgiahhlkedit','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@kkgialk');
Route::get('/kkgdvgs/upkkgialkedit','manage\kekhaigia\kkgiatpcnte6t\KkGsCtController@upkkgialk');
//End Ajax edit

//Xét duyệt kk giá sữa
Route::get('xdkekhaigiatpcnte6t','manage\kekhaigia\kkgiatpcnte6t\KkGsXdController@index');
Route::post('xdkekhaigiatpcnte6t/tralai','manage\kekhaigia\kkgiatpcnte6t\KkGsXdController@tralai');
Route::get('xdkekhaigiatpcnte6t/ttnhanhs','manage\kekhaigia\kkgiatpcnte6t\KkGsXdController@ttnhanhs');
Route::post('xdkekhaigiatpcnte6t/nhanhs','manage\kekhaigia\kkgiatpcnte6t\KkGsXdController@nhanhs');
//End xét duyệt kk giá sữa
Route::get('timkiemkekhaigiatpcnte6t','manage\kekhaigia\kkgiatpcnte6t\KkGsXdController@search');

//Ajax
Route::get('/ttdnkkdvgs','manage\kekhaigia\kkgiatpcnte6t\KkGsXdController@ttdnkkdvgs');

//Route::get('baocaokekhaigiatpcnte6t','manage\kekhaigia\kkgiatpcnte6t\ReportsKkGsController@index');
//Route::post('reports/kekhaigiasua/BC5','manage\kekhaigia\kkgiatpcnte6t\ReportsKkGsController@dvltbc5');
//Route::post('reports/kekhaigiasua/BC6','manage\kekhaigia\kkgiatpcnte6t\ReportsKkGsController@dvltbc6');

Route::get('baocaokekhaigiatpcnte6t','manage\kekhaigia\kkgiatpcnte6t\KkGsBcController@index');
Route::post('baocaokekhaigiatpcnte6t/bc1','manage\kekhaigia\kkgiatpcnte6t\KkGsBcController@bc1');
Route::post('baocaokekhaigiatpcnte6t/bc2','manage\kekhaigia\kkgiatpcnte6t\KkGsBcController@bc2');
?>