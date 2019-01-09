<?php
Route::resource('thongtinthanhlytaisan','ThanhLyTaiSanController');
Route::post('thongtinthanhlytaisan/hoanthanh','ThanhLyTaiSanController@hoanthanh');
Route::post('thongtinthanhlytaisan/huyhoanthanh','ThanhLyTaiSanController@huyhoanthanh');
Route::post('thongtinthanhlytaisan/congbo','ThanhLyTaiSanController@congbo');

Route::geT('timkiemthongtinthanhly','ThanhLyTaiSanController@search');
?>