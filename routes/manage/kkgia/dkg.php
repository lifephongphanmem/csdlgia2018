<?php
Route::resource('kkdkg','KkDkgController');
Route::get('thongtindnkkgdk','KkDkgController@ttdn');
Route::post('storekkdkg','KkDkgController@store');
Route::post('kkdkg/delete','KkDkgController@delete');
Route::post('kkdkg/chuyen','KkDkgController@chuyen');
Route::get('kkdkg/prints','KkDkgController@prints');


//Ajax chuyen
Route::get('/kkdg/kiemtra','KkDkgController@kiemtra');
//End Ajax chuyển

//Ajax create
Route::get('kkkgctdf/add','KkDkgCtDfController@add');
Route::get('kkkgctdf/show','KkDkgCtDfController@show');
Route::get('kkkgctdf/update','KkDkgCtDfController@update');
Route::get('kkkgctdf/del','KkDkgCtDfController@destroy');
//End Ajax create

//Ajax edit
Route::get('kkkgct/add','KkDkgCtController@add');
Route::get('kkkgct/show','KkDkgCtController@show');
Route::get('kkkgct/update','KkDkgCtController@update');
Route::get('kkkgct/del','KkDkgCtController@destroy');
//End Ajax edit

//Xét duyệt kê khai giá
Route::get('xetduyetkkdkg','KkDkgXdController@index');
Route::post('xetduyetkkdkg/tralai','KkDkgXdController@tralai');
Route::get('xetduyetkkdkg/ttnhanhs','KkDkgXdController@ttnhanhs');
Route::post('xetduyetkkdkg/nhanhs','KkDkgXdController@nhanhs');
Route::get('xetduyetkkdkg/lydo','KkDkgXdController@lydo');
Route::get('xetduyetkkdkg/download','KkDkgXdController@download');

//End xét duyệt kk giá sữa
Route::get('timkiemkkdkg','KkDkgController@search');

//Ajax nhận trả
Route::get('/ttdnkkdkg','KkDkgXdController@ttdnkkdkg');

?>