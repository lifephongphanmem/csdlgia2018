<?php
Route::resource('thongtingiabantaisan','ThanhLyTaiSanController');
Route::post('thongtingiabantaisan/hoanthanh','ThanhLyTaiSanController@hoanthanh');
Route::post('thongtingiabantaisan/huyhoanthanh','ThanhLyTaiSanController@huyhoanthanh');
Route::post('thongtingiabantaisan/congbo','ThanhLyTaiSanController@congbo');
Route::get('giabantaisan/dinhkem','ThanhLyTaiSanController@show');

Route::geT('timkiemttgiabantaisan','ThanhLyTaiSanController@search');
?>