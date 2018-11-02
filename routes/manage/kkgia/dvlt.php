<?php
Route::resource('thongtincskd','CsKdDvLtController');
Route::get('thongtincskdkkdvlt','KkGiaDvLtController@ttcskd');
Route::resource('kekhaigiadvlt','KkGiaDvLtController');
Route::get('kkgdvlt/ktchuyendvlt','KkGiaDvLtController@ktchuyendvlt');
Route::post('kekhaigiadvlt/chuyen','KkGiaDvLtController@chuyen');
Route::get('/kkgdvlt/showlydo','KkGiaDvLtController@showlydo');
Route::post('kekhaigiadvlt/delete','KkGiaDvLtController@delete');


Route::get('/kekhaigiadvltctdf/store','KkGiaDvLtCtDfController@store');
Route::get('/kekhaigiadvltctdf/edit','KkGiaDvLtCtDfController@edit');
Route::get('/kekhaigiadvltctdf/update','KkGiaDvLtCtDfController@update');
Route::get('/kekhaigiadvltctdf/delete','KkGiaDvLtCtDfController@destroy');

Route::get('/kekhaigiadvltct/store','KkGiaDvLtCtController@store');
Route::get('/kekhaigiadvltct/edit','KkGiaDvLtCtController@edit');
Route::get('/kekhaigiadvltct/update','KkGiaDvLtCtController@update');
Route::get('/kekhaigiadvltct/delete','KkGiaDvLtCtController@destroy');

Route::get('xetduyetkkgiadvlt','KkGiaDvLtXdController@index');
Route::post('xetduyetkkgiadvlt/tralai','KkGiaDvLtXdController@tralai');
Route::get('xetduyetkkgiadvlt/ttnhanhs','KkGiaDvLtXdController@ttnhanhs');
Route::post('xetduyetkkgiadvlt/nhanhs','KkGiaDvLtXdController@nhanhs');
//Ajax xd
Route::get('xetduyetkkgiadvlt/ttdnkkdvlt','KkGiaDvLtXdController@ttdnkkdvlt');

Route::get('timkiemkkgiadvlt','KkGiaDvLtXdController@search');

Route::get('baocaokekhaidvlt','ReportsKkDvLtController@index');
Route::post('reports/kekhaidvlt/BC5','ReportsKkDvLtController@dvltbc5');
Route::post('reports/kekhaidvlt/BC6','ReportsKkDvLtController@dvltbc6');
?>