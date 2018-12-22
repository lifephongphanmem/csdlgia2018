<?php
Route::resource('vanbanqlnnvegia','VanBanQlNnController');
Route::post('vanbanqlnnvegia/delete','VanBanQlNnController@destroy');

Route::get('dmhanghoacpi/danhsach','dmhanghoa_cpiController@index');
Route::get('dmhanghoacpi/addnhomhh','dmhanghoa_cpiController@addnhomhh');
Route::get('dmhanghoacpi/addhanghoa','dmhanghoa_cpiController@addhanghoa');
Route::get('dmhanghoacpi/editnhomhh','dmhanghoa_cpiController@editnhomhh');
Route::post('dmhanghoacpi/delete','dmhanghoa_cpiController@destroy');

Route::get('hsgiacpi/danhsach','hsgia_cpiController@index');
Route::get('hsgiacpi/create','hsgia_cpiController@create');
Route::get('hsgiacpi/edit','hsgia_cpiController@edit');
Route::get('hsgiacpi/show','hsgia_cpiController@show');
Route::post('hsgiacpi/delete','hsgia_cpiController@destroy');
Route::get('hsgiacpi/store','hsgia_cpiController@store');
Route::post('hsgiacpi/update','hsgia_cpiController@update');
Route::get('hsgiacpi/get_chitiet','hsgia_cpiController@get_chitiet');
Route::get('hsgiacpi/update_chitiet','hsgia_cpiController@update_chitiet');

Route::get('hstonghopcpi/danhsach','hstonghop_cpiController@index');
Route::get('hstonghopcpi/tonghop','hstonghop_cpiController@tonghop');
Route::get('hstonghopcpi/show','hstonghop_cpiController@show');
Route::post('hstonghopcpi/chuyen','hstonghop_cpiController@chuyen');
Route::post('hstonghopcpi/delete','hstonghop_cpiController@destroy');

Route::get('chisocpi/danhsach','hstonghop_cpiController@view');
Route::get('chisocpi/chitiet','hstonghop_cpiController@detail');

Route::get('xetduyetcpi/danhsach','hstonghop_cpiController@xetduyet');
Route::get('xetduyetcpi/tralai','hstonghop_cpiController@tralai');
Route::get('xetduyetcpi/nhanhs','hstonghop_cpiController@nhanhs');

?>