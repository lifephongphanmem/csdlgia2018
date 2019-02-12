<?php
Route::resource('baocaochisogiatieudung','ChiSoGiaTieuDungController');
Route::post('baocaochisogiatieudung/delete','ChiSoGiaTieuDungController@destroy');
Route::post('baocaochisogiatieudung/hoanthanh','ChiSoGiaTieuDungController@hoanthanh');
Route::post('baocaochisogiatieudung/congbo','ChiSoGiaTieuDungController@congbo');
Route::post('baocaochisogiatieudung/huyhoanthanh','ChiSoGiaTieuDungController@huyhoanthanh');
?>