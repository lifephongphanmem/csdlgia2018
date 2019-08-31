<?php
//Route::resource('hosokkdkg','manage\kekhaidkg\KkDkgController');
Route::get('hosokkdkg','manage\kekhaidkg\KkDkgController@index');
Route::get('hosokkdkg/create','manage\kekhaidkg\KkDkgController@create');
Route::post('hosokkdkg/store','manage\kekhaidkg\KkDkgController@store');
Route::get('hosokkdkg/{id}/edit','manage\kekhaidkg\KkDkgController@edit');
Route::patch('hosokkdkg/{id}','manage\kekhaidkg\KkDkgController@update');
Route::get('hosokkdkg/show','manage\kekhaidkg\KkDkgController@show');



Route::get('thongtindnkkgdk','manage\kekhaidkg\KkDkgController@ttdn');
Route::post('storekkdkg','manage\kekhaidkg\KkDkgController@store');
Route::post('hosokkdkg/delete','manage\kekhaidkg\KkDkgController@delete');
Route::post('hosokkdkg/chuyen','manage\kekhaidkg\KkDkgController@chuyen');


//Ajax chuyen
Route::get('/hosokkdkg/kiemtra','manage\kekhaidkg\KkDkgController@kiemtra');
//End Ajax chuyển

//Ajax create
Route::get('kkkgctdf/add','manage\kekhaidkg\KkDkgCtDfController@add');
Route::get('kkkgctdf/show','manage\kekhaidkg\KkDkgCtDfController@show');
Route::get('kkkgctdf/update','manage\kekhaidkg\KkDkgCtDfController@update');
Route::get('kkkgctdf/del','manage\kekhaidkg\KkDkgCtDfController@destroy');
//End Ajax create

//Ajax edit
Route::get('kkkgct/add','manage\kekhaidkg\KkDkgCtController@add');
Route::get('kkkgct/show','manage\kekhaidkg\KkDkgCtController@show');
Route::get('kkkgct/update','manage\kekhaidkg\KkDkgCtController@update');
Route::get('kkkgct/del','manage\kekhaidkg\KkDkgCtController@destroy');
//End Ajax edit

//Xét duyệt kê khai giá
Route::get('xetduyetkkdkg','manage\kekhaidkg\KkDkgXdController@index');
Route::post('xetduyetkkdkg/tralai','manage\kekhaidkg\KkDkgXdController@tralai');
Route::get('xetduyetkkdkg/ttnhanhs','manage\kekhaidkg\KkDkgXdController@ttnhanhs');
Route::post('xetduyetkkdkg/nhanhs','manage\kekhaidkg\KkDkgXdController@nhanhs');
Route::get('xetduyetkkdkg/lydo','manage\kekhaidkg\KkDkgXdController@lydo');
Route::get('xetduyetkkdkg/download','manage\kekhaidkg\KkDkgXdController@download');

//End xét duyệt
Route::get('timkiemkkdkg','manage\kekhaidkg\KkDkgController@search');

//Ajax nhận trả
Route::get('/ttdnkkdkg','manage\kekhaidkg\KkDkgXdController@ttdnkkdkg');


?>