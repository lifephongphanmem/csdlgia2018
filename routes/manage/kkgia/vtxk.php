<?php
Route::get('thongtindnvtxk','KkGiaVtXkController@ttdn');
Route::resource('kekhaigiavantaixekhach','KkGiaVtXkController');
Route::post('kekhaigiavantaixekhach/chuyen','KkGiaVtXkController@chuyen');
Route::get('/kkvtxk/showlydo','KkGiaVtXkController@showlydo');
Route::post('kekhaigiavantaixekhach/delete','KkGiaVtXkController@delete');
Route::get('kekhaigiavantaixekhach/prints','KkGiaVtXkController@prints');


//Ajax chuyen
Route::get('/kkvtxk/kiemtra','KkGiaVtXkController@kiemtra');
//End Ajax chuyển

Route::get('/giavtxkctdf/storett','KkGiaVtXkCtDfController@store');
Route::get('/giavtxkctdf/edittt','KkGiaVtXkCtDfController@edit');
Route::get('/giavtxkctdf/updatett','KkGiaVtXkCtDfController@update');
Route::get('/giavtxkctdf/deletett','KkGiaVtXkCtDfController@delete');
Route::get('/giavtxkctdf/kkgiahh','KkGiaVtXkCtDfController@kkgia');
Route::get('/giavtxkctdf/upkkgia','KkGiaVtXkCtDfController@upkkgia');
Route::get('/giavtxkctdf/kkgiahhlk','KkGiaVtXkCtDfController@kkgialk');
Route::get('/giavtxkctdf/upkkgialk','KkGiaVtXkCtDfController@upkkgialk');
//End Ajax create

//Ajax edit
Route::get('/giavtxkct/storett','KkGiaVtXkCtController@store');
Route::get('/giavtxkct/edittt','KkGiaVtXkCtController@edit');
Route::get('/giavtxkct/updatett','KkGiaVtXkCtController@update');
Route::get('/giavtxkct/deletett','KkGiaVtXkCtController@delete');
Route::get('/giavtxkct/kkgiahh','KkGiaVtXkCtController@kkgia');
Route::get('/giavtxkct/upkkgia','KkGiaVtXkCtController@upkkgia');
Route::get('/giavtxkct/kkgiahhlk','KkGiaVtXkCtController@kkgialk');
Route::get('/giavtxkct/upkkgialk','KkGiaVtXkCtController@upkkgialk');
//End Ajax edit

//Xét duyệt kk
Route::get('xetduyetkekhaigiavtxk','KkGiaVtXkXdController@index');
Route::post('xetduyetkekhaigiavtxk/tralai','KkGiaVtXkXdController@tralai');
Route::get('xetduyetkekhaigiavtxk/ttnhanhs','KkGiaVtXkXdController@ttnhanhs');
Route::post('xetduyetkekhaigiavtxk/nhanhs','KkGiaVtXkXdController@nhanhs');
//End xét duyệt kk TACN
Route::get('timkiemgiavantaixekhach','KkGiaVtXkXdController@search');

//Ajax
Route::get('/ttdnkkvtxk','KkGiaVtXkXdController@ttdnkkvtxk');
?>