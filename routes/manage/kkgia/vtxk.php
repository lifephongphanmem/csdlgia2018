<?php
Route::get('thongtindnvtxk','KkGiaVtXkController@ttdn');
Route::resource('kekhaigiavantaixekhach','KkGiaVtXkController');


Route::get('/giavtxkctdf/storett','KkGiaVtXkCtDfController@store');
Route::get('/giavtxkctdf/edittt','KkGiaVtXkCtDfController@edit');
Route::get('/giavtxkctdf/updatett','KkGiaVtXkCtDfController@update');
Route::get('/giavtxkctdf/deletett','KkGiaVtXkCtDfController@delete');
Route::get('/giavtxkctdf/kkgiahh','KkGiaVtXkCtDfController@kkgia');
Route::get('/giavtxkctdf/upkkgia','KkGiaVtXkCtDfController@upkkgia');
Route::get('/giavtxkctdf/kkgiahhlk','KkGiaVtXkCtDfController@kkgialk');
Route::get('/giavtxkctdf/upkkgialk','KkGiaVtXkCtDfController@upkkgialk');
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
?>