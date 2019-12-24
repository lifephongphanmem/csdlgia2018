<?php
Route::get('thongtingiagocvlxd','GiaGocVlXdController@index');
Route::get('kkgiagocvlxd/checkhs','GiaGocVlXdController@checkhs');
Route::post('thongtingiagocvlxd/create','GiaGocVlXdController@create');
Route::post('thongtingiagocvlxd','GiaGocVlXdController@store');
Route::get('thongtingiagocvlxd/{id}','GiaGocVlXdController@show');
Route::get('thongtingiagocvlxd/{id}/edit','GiaGocVlXdController@edit');
Route::patch('thongtingiagocvlxd/{id}','GiaGocVlXdController@update');
Route::post('thongtingiagocvlxd/delete','GiaGocVlXdController@destroy');
Route::post('thongtingiagocvlxd/hoanthanh','GiaGocVlXdController@hoanthanh');
Route::post('thongtingiagocvlxd/huyhoanthanh','GiaGocVlXdController@huyhoanthanh');
Route::post('thongtingiagocvlxd/congbo','GiaGocVlXdController@congbo');

Route::post('thongtingiagocvlxd/importex','GiaGocVlXdController@importex');

Route::get('giagocvlxdctdf/storett','GiaGocVlXdCtDfController@store');
Route::get('giagocvlxdctdf/edittt','GiaGocVlXdCtDfController@edit');
Route::get('giagocvlxdctdf/updatett','GiaGocVlXdCtDfController@update');
Route::get('giagocvlxdctdf/deletett','GiaGocVlXdCtDfController@destroy');

Route::post('giagocvlxdct/storett','GiaGocVlXdCtController@store');
Route::get('giagocvlxdct/edittt','GiaGocVlXdCtController@edit');
Route::post('giagocvlxdct/updatett','GiaGocVlXdCtController@update');
Route::get('giagocvlxdct/deletett','GiaGocVlXdCtController@destroy');

Route::get('tonghopgiagocvlxd','ThGiaGocVlXdController@index');
Route::post('tonghopgiagocvlxd/create','ThGiaGocVlXdController@create');
Route::get('tonghopgiagocvlxd/{id}','ThGiaGocVlXdController@show');
Route::get('tonghopgiagocvlxd/{id}/edit','ThGiaGocVlXdController@edit');
Route::patch('tonghopgiagocvlxd/{id}','ThGiaGocVlXdController@update');
Route::post('tonghopgiagocvlxd/delete','ThGiaGocVlXdController@destroy');
Route::post('tonghopgiagocvlxd/hoanthanh','ThGiaGocVlXdController@hoanthanh');
Route::post('tonghopgiagocvlxd/huyhoanthanh','ThGiaGocVlXdController@huyhoanthanh');
Route::post('tonghopgiagocvlxd/congbo','ThGiaGocVlXdController@congbo');
?>