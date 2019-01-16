<?php
Route::resource('dmnhomhanghoa','DmNhomHangHoaController');
Route::post('dmnhomhanghoa/update','DmNhomHangHoaController@update');

Route::resource('dmhanghoa','DmHangHoaController');
Route::post('dmhanghoa/update','DmHangHoaController@update');