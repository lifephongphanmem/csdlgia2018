<?php
//Giá các loại đất
Route::resource('dmqdgiadat','DmQdGiaDatController');
Route::post('dmqdgiadat/delete','DmQdGiaDatController@destroy');

Route::get('thongtingiacacloaidat','GiaCacLoaiDatController@index');
Route::get('thongtingiacacloaidat/addlv1','GiaCacLoaiDatController@addlv1');
Route::get('thongtingiacacloaidat/editvitri','GiaCacLoaiDatController@editvitri');
Route::get('thongtingiacacloaidat/updatevitri','GiaCacLoaiDatController@updatevitri');
Route::get('thongtingiacacloaidat/storechirld','GiaCacLoaiDatController@storechirld');
Route::post('thongtingiacacloaidat/delete','GiaCacLoaiDatController@destroy');

Route::get('timkiemthongtingiacacloaidat','GiaCacLoaiDatController@search');


//Lệ phí trước bạ
Route::resource('nhomlephitruocba','NhomLePhiTruocBaController');
Route::get('nhomlephitruocba/edit','NhomLePhiTruocBaController@edit');
Route::post('nhomlephitruocba/update','NhomLePhiTruocBaController@update');

Route::resource('lephitruocba','LePhiTruocBaController');

Route::get('lephitruocbactdf/add','LePhiTruocBaCtDfController@store');
Route::get('lephitruocbactdf/show','LePhiTruocBaCtDfController@show');
?>