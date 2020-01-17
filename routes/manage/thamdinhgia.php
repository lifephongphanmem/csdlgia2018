<?php
//Excel
Route::get('thamdinhgia/nhanexcel','manage\thamdinhgia\ThamDinhGiaController@nhanexcel');
Route::post('thamdinhgia/import_excel','manage\thamdinhgia\ThamDinhGiaController@import_excel');

Route::get('thamdinhgia','manage\thamdinhgia\ThamDinhGiaController@index');
Route::get('thamdinhgia/create','manage\thamdinhgia\ThamDinhGiaController@create');
Route::post('thamdinhgia','manage\thamdinhgia\ThamDinhGiaController@store');
Route::get('thamdinhgia/{id}/edit','manage\thamdinhgia\ThamDinhGiaController@edit');
Route::patch('thamdinhgia/{id}','manage\thamdinhgia\ThamDinhGiaController@update');
Route::get('thamdinhgia/{id}','manage\thamdinhgia\ThamDinhGiaController@show');

Route::post('thamdinhgiact/store','manage\thamdinhgia\ThamDinhGiaCtController@store');
Route::get('thamdinhgiact/edit','manage\thamdinhgia\ThamDinhGiaCtController@edit');
Route::post('thamdinhgiact/update','manage\thamdinhgia\ThamDinhGiaCtController@update');
Route::get('thamdinhgiact/del','manage\thamdinhgia\ThamDinhGiaCtController@destroy');


Route::post('thamdinhgia/delete','manage\thamdinhgia\ThamDinhGiaController@destroy');
Route::get('timkiemthamdinhgia','manage\thamdinhgia\ThamDinhGiaController@search');
Route::get('timkiemthamdinhgia/xemtttk','manage\thamdinhgia\ThamDinhGiaController@xemtttk');
Route::get('filethamdinhgia/dinhkem','manage\thamdinhgia\ThamDinhGiaController@filedk');

Route::post('thamdinhgia/hoanthanh','manage\thamdinhgia\ThamDinhGiaController@hoanthanh');
Route::post('thamdinhgia/huyhoanthanh','manage\thamdinhgia\ThamDinhGiaController@huyhoanthanh');
Route::post('thamdinhgia/congbo','manage\thamdinhgia\ThamDinhGiaController@congbo');
Route::post('thamdinhgia/huycongbo','manage\thamdinhgia\ThamDinhGiaController@huycongbo');
//
//Route::get('thamdinhgiactdf/store','ThamDinhGiaCtDfController@store');
//Route::get('thamdinhgiactdf/edit','ThamDinhGiaCtDfController@edit');
//Route::get('thamdinhgiactdf/update','ThamDinhGiaCtDfController@update');
//Route::get('thamdinhgiactdf/del','ThamDinhGiaCtDfController@destroy');
//Route::get('thamdinhgiactdf/search','ThamDinhGiaCtDfController@search');
//
//Route::get('thamdinhgiact/store','ThamDinhGiaCtController@store');
//Route::get('thamdinhgiact/edit','ThamDinhGiaCtController@edit');
//Route::get('thamdinhgiact/update','ThamDinhGiaCtController@update');
//Route::get('thamdinhgiact/del','ThamDinhGiaCtController@destroy');
//
//Route::get('addtthanghoa','ThamDinhGiaController@gettthanghoa');
//Route::get('addtthanghoaedit','ThamDinhGiaController@gettthanghoa');
//
Route::get('baocaoththamdinhgia','manage\thamdinhgia\ReportsThamDinhGiaController@index');
Route::post('baocaoththamdinhgia/BC1','manage\thamdinhgia\ReportsThamDinhGiaController@Bc1');


?>
