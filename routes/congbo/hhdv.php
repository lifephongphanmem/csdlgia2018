<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/10/2018
 * Time: 2:22 PM
 */
//Hàng hóa thị trường
//Route::resource('hanghoathitruong','CbHHTTController');
Route::get('hanghoathitruong','CbHHTTController@showthoidiem');
Route::get('hanghoathitruong/index','CbHHTTController@index');
Route::get('hanghoathitruong/detail','CbHHTTController@detail');


//Hàng hóa TW quy định
Route::get('hanghoatw','CbHHTWController@showthoidiem');
Route::get('hanghoatw/index','CbHHTWController@index');
Route::get('hanghoatw/detail','CbHHTWController@detail');

//Hàng hóa ĐP quy định
Route::get('hanghoadp','CbHHDPController@showthoidiem');
Route::get('hanghoadp/index','CbHHDPController@index');
Route::get('hanghoadp/detail','CbHHDPController@detail');

//Thuế trước bạ
Route::get('thuetb','CbThueTBController@index');
Route::get('thuetb/detail','CbThueTBController@detail');

//Thuế tài nguyên
Route::get('thuetn','CbThueTNController@index');
Route::get('thuetn/detail','CbThueTNController@detail');

//Thẩm định giá
Route::get('thamdg','CbTDGController@index');
Route::get('thamdg/detail','CbTDGController@detail');

//Công bố giá
Route::get('congbg','CbCBGController@index');
Route::get('congbg/detail','CbCBGController@detail');

//Vị trí đất
Route::get('vtdat','CbVTDatController@index');

//Văn bản QLNN
Route::get('vbpl','CbVBNNController@index');
Route::get('vbpl/detail','CbVBNNController@detail');
?>