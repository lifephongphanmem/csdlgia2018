<?php
Route::get('dmnhomhanghoa/epExcel','DmNhomHangHoaController@epExcel');
Route::resource('dmnhomhanghoa','DmNhomHangHoaController');
Route::post('dmnhomhanghoa/update','DmNhomHangHoaController@update');


Route::resource('dmhanghoa','DmHangHoaController');
Route::post('dmhanghoa/update','DmHangHoaController@update');


Route::resource('dsdncungcapgia','DsDnCungCapGiaController');

Route::get('hosocungcapgia/nhanexcel','CungCapGiaController@nhanexcel');
Route::post('hosocungcapgia/import_excel','CungCapGiaController@import_excel');
Route::get('filecungcapgia/dinhkem','CungCapGiaController@dinhkem');

Route::resource('hosocungcapgia','CungCapGiaController');
Route::post('hosocungcapgia/hoanthanh','CungCapGiaController@hoanthanh');
Route::post('hosocungcapgia/delete','CungCapGiaController@destroy');
Route::get('timkiemgiahanghoacungcap','CungCapGiaController@search');

Route::get('thongtingiahanghoa','CungCapGiaXdController@index');
Route::post('thongtingiahanghoa/huyhoanthanh','CungCapGiaXdController@huyhoanthanh');





Route::get('cungcapgiactdf/store','CungCapGiaCtDfController@store');
Route::get('cungcapgiactdf/edit','CungCapGiaCtDfController@edit');
Route::get('cungcapgiactdf/update','CungCapGiaCtDfController@update');
Route::get('cungcapgiactdf/del','CungCapGiaCtDfController@destroy');

Route::get('cungcapgiact/store','CungCapGiaCtController@store');
Route::get('cungcapgiact/edit','CungCapGiaCtController@edit');
Route::get('cungcapgiact/update','CungCapGiaCtController@update');
Route::get('cungcapgiact/del','CungCapGiaCtController@destroy');


