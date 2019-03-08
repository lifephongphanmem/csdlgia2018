<?php
//Excel
Route::get('thamdinhgia/nhanexcel','ThamDinhGiaController@nhanexcel');
Route::post('thamdinhgia/import_excel','ThamDinhGiaController@import_excel');

Route::resource('thamdinhgia','ThamDinhGiaController');
Route::post('thamdinhgia/delete','ThamDinhGiaController@destroy');
Route::get('timkiemthamdinhgia','ThamDinhGiaController@search');
Route::get('timkiemthamdinhgia/xemtttk','ThamDinhGiaController@xemtttk');
Route::get('filethamdinhgia/dinhkem','ThamDinhGiaController@filedk');



Route::post('thamdinhgia/hoanthanh','ThamDinhGiaController@hoanthanh');
Route::post('thamdinhgia/huyhoanthanh','ThamDinhGiaController@huyhoanthanh');
Route::post('thamdinhgia/congbo','ThamDinhGiaController@congbo');

Route::get('thamdinhgiactdf/store','ThamDinhGiaCtDfController@store');
Route::get('thamdinhgiactdf/edit','ThamDinhGiaCtDfController@edit');
Route::get('thamdinhgiactdf/update','ThamDinhGiaCtDfController@update');
Route::get('thamdinhgiactdf/del','ThamDinhGiaCtDfController@destroy');
Route::get('thamdinhgiactdf/search','ThamDinhGiaCtDfController@search');

Route::get('thamdinhgiact/store','ThamDinhGiaCtController@store');
Route::get('thamdinhgiact/edit','ThamDinhGiaCtController@edit');
Route::get('thamdinhgiact/update','ThamDinhGiaCtController@update');
Route::get('thamdinhgiact/del','ThamDinhGiaCtController@destroy');

Route::get('addtthanghoa','ThamDinhGiaController@gettthanghoa');
Route::get('addtthanghoaedit','ThamDinhGiaController@gettthanghoa');

Route::get('baocaoththamdinhgia','ReportsThamDinhGiaController@index');
Route::post('baocaoththamdinhgia/BC1','ReportsThamDinhGiaController@Bc1');


?>
