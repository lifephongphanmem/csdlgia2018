<?php
Route::get('thongtingiadatduan/nhandulieutuexcel','manage\giadatduan\GiaDatDuAnController@nhandulieutuexcel');
Route::post('thongtingiadatduan/import_excel','manage\giadatduan\GiaDatDuAnController@import_excel');
Route::get('thongtingiadatduan/print','manage\giadatduan\GiaDatDuAnController@prints');
Route::get('baocaogiadatduan','manage\giadatduan\GiaDatDuAnController@baocaotonghop');
Route::post('baocaogiadatduan/phuluc08','manage\giadatduan\GiaDatDuAnController@phuluc08');
Route::get('timkiemgiadatduan','manage\giadatduan\GiaDatDuAnController@search');
Route::get('thongtingiadatduan/export','manage\giadatduan\GiaDatDuAnController@export');

Route::resource('thongtingiadatduan','manage\giadatduan\GiaDatDuAnController');


?>