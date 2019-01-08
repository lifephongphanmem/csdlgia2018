<?php
Route::resource('dmmhbinhongia','DmMhBinhOnGiaController');
Route::get('dmmhbinhongia/edittt','DmMhBinhOnGiaController@show');
Route::post('dmmhbinhongia/update','DmMhBinhOnGiaController@update');
Route::post('dmmhbinhongia/delete','DmMhBinhOnGiaController@destroy');


Route::resource('binhongia','BinhOnGiaController');
Route::post('binhongia/delete','BinhOnGiaController@destroy');

Route::post('binhongia/hoanthanh','BinhOnGiaController@hoanthanh');
Route::post('binhongia/huyhoanthanh','BinhOnGiaController@huyhoanthanh');
Route::post('binhongia/congbo','BinhOnGiaController@congbo');

Route::get('timkiemthongtinbog','BinhOnGiaController@search');

Route::get('binhongiactdf/add','BinhOnGiaCtDfController@add');
Route::get('binhongiactdf/show','BinhOnGiaCtDfController@show');
Route::get('binhongiactdf/update','BinhOnGiaCtDfController@update');
Route::get('binhongiactdf/del','BinhOnGiaCtDfController@destroy');

Route::get('/binhongiact/store','BinhOnGiaCtController@store');
Route::get('/binhongiact/show','BinhOnGiaCtController@show');
Route::get('/binhongiact/update','BinhOnGiaCtController@update');
Route::get('/binhongiact/del','BinhOnGiaCtController@destroy');

//Doanh nghiệp
Route::resource('dsthongtindn','DangKyGiaBOGController@indexdnbog');
Route::get('createdn/create','DangKyGiaBOGController@creatednbog');
Route::post('storednbog','DangKyGiaBOGController@storednbog');
Route::get('editdnbog/{id}/edit','DangKyGiaBOGController@showdnbog');
Route::post('updatednbog','DangKyGiaBOGController@updatednbog');
Route::post('deletednbog','DangKyGiaBOGController@destroydnbog');
Route::get('adduser','DangKyGiaBOGController@createuser');
Route::post('storeuser','DangKyGiaBOGController@storeuser');

//Đăng ký giá
Route::resource('dangkygia','DangKyGiaBOGController@indexdkbog');
Route::resource('dsdangkygia','DangKyGiaBOGController@indexdkgbog');
Route::get('createdkg/create','DangKyGiaBOGController@createdkgbog');
Route::post('storedkgbog','DangKyGiaBOGController@storedkgbog');
Route::get('editdkgbog/{id}/edit','DangKyGiaBOGController@showdkgbog');
Route::post('updatedkgbog','DangKyGiaBOGController@updatedkgbog');
Route::post('deletedkgbog','DangKyGiaBOGController@destroydkgbog');
Route::post('chuyen','DangKyGiaBOGController@chuyen');


//Nhập mặt hàng nháp
Route::get('createdkg/add','DangKyGiaBOGDfController@add');
Route::get('createdkg/show','DangKyGiaBOGDfController@show');
Route::get('createdkg/update','DangKyGiaBOGDfController@update');
Route::get('createdkg/del','DangKyGiaBOGDfController@destroy');
//Nhập mặt hàng chi tiết
Route::get('/createdkgct/add','DangKyGiaBOGCtController@store');
Route::get('/createdkgct/show','DangKyGiaBOGCtController@show');
Route::get('/createdkgct/update','DangKyGiaBOGCtController@update');
Route::get('/createdkgct/del','DangKyGiaBOGCtController@destroy');
//Tìm kiếm
Route::resource('timkiem','DangKyGiaBOGController@indexdkgtk');
//Báo cáo
Route::resource('baocaodkg','BaoCaoDkgController@index');
Route::resource('baocaodkg/BcMhBog','BaoCaoDkgController@BcMhBog');
Route::get('baocao/{id}/Bc1','BaoCaoDkgController@BC1');
?>