<?php
Route::resource('thamdinhgia','ThamDinhGiaController');
Route::post('thamdinhgia/delete','ThamDinhGiaController@destroy');
Route::get('timkiemthamdinhgia','ThamDinhGiaController@search');
Route::get('timkiemthamdinhgia/xemtttk','ThamDinhGiaController@xemtttk');

Route::post('thamdinhgia/hoanthanh','ThamDinhGiaController@hoanthanh');
Route::post('thamdinhgia/huyhoanthanh','ThamDinhGiaController@huyhoanthanh');
Route::post('thamdinhgia/congbo','ThamDinhGiaController@congbo');


Route::get('thamdinhgiactdf/store','ThamDinhGiaCtDfController@store');
Route::get('thamdinhgiactdf/edit','ThamDinhGiaCtDfController@edit');
Route::get('thamdinhgiactdf/update','ThamDinhGiaCtDfController@update');
Route::get('thamdinhgiactdf/del','ThamDinhGiaCtDfController@destroy');

Route::get('thamdinhgiact/store','ThamDinhGiaCtController@store');
Route::get('thamdinhgiact/edit','ThamDinhGiaCtController@edit');
Route::get('thamdinhgiact/update','ThamDinhGiaCtController@update');
Route::get('thamdinhgiact/del','ThamDinhGiaCtController@destroy');
?>
