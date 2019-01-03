<?php
Route::resource('danhmucvatlieuxaydung','DmVlXdController');
Route::post('danhmucvatlieuxaydung/update','DmVlXdController@update');

Route::get('thongtindnkkgiavlxd','KkGiaVlXdController@ttdn');
Route::resource('thongtinkekhaigiavatlieuxaydung','KkGiaVlXdController');
?>