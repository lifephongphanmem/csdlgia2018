<?php
Route::resource('dmthamdinhgiahh','DmThamDinhGiaHhController');
Route::post('dmthamdinhgiahh/update','DmThamDinhGiaHhController@update');

Route::resource('dmctthamdinhgiahh','DmCtThamDinhGiaHhController');
Route::post('dmctthamdinhgiahh/update','DmCtThamDinhGiaHhController@update');


Route::resource('thamdinhgiahanghoa','ThamDinhGiaHhController');
Route::post('thamdinhgiahanghoa/create','ThamDinhGiaHhController@create');


Route::post('thamdinhgiahanghoa/delete','ThamDinhGiaHhController@destroy');
Route::get('timkiemthamdinhgiahanghoa','ThamDinhGiaHhController@search');
Route::get('timkiemthamdinhgiahh/xemtttk','ThamDinhGiaHhController@xemtttk');

Route::post('thamdinhgiahanghoa/hoanthanh','ThamDinhGiaHhController@hoanthanh');
Route::post('thamdinhgiahanghoa/huyhoanthanh','ThamDinhGiaHhController@huyhoanthanh');
Route::post('thamdinhgiahanghoa/congbo','ThamDinhGiaHhController@congbo');


Route::get('thamdinhgiahhctdf/edit','ThamDinhGiaHhCtDfController@edit');
Route::get('thamdinhgiahhctdf/update','ThamDinhGiaHhCtDfController@update');

Route::get('thamdinhgiahhct/edit','ThamDinhGiaHhCtController@edit');
Route::get('thamdinhgiahhct/update','ThamDinhGiaHhCtController@update');


Route::get('baocaoththamdinhgia','ReportsThamDinhGiaController@index');
Route::post('baocaoththamdinhgia/BC1','ReportsThamDinhGiaController@Bc1');
?>
