<?php
Route::get('thongtingiadatduan/print','GiaDatDuAnController@prints');
Route::get('baocaogiadatduan','GiaDatDuAnController@baocaotonghop');
Route::post('baocaogiadatduan/phuluc08','GiaDatDuAnController@phuluc08');
Route::get('timkiemgiadatduan','GiaDatDuAnController@search');
Route::resource('thongtingiadatduan','GiaDatDuAnController');

?>