<?php
Route::get('thongtindoanhnghiep','CompanyController@ttdn');
Route::get('thongtindoanhnghiep/{id}/edit','CompanyController@ttdnedit');
Route::patch('thongtindoanhnghiep/{id}','CompanyController@ttdnupdate');
Route::get('thongtindoanhnghiep/{id}/chinhsua','CompanyController@ttdnchinhsua');
Route::patch('thongtindoanhnghiep/df/{id}','CompanyController@ttdncapnhat');
Route::get('thongtindoanhnghiep/{id}/chuyen','CompanyController@ttdnchuyen');
Route::post('thongtindoanhnghiep/upavatar','CompanyController@upavatar');

//DVLT
include('kkgia/dvlt.php');


//DVGS
include('kkgia/tpcnte6t.php');

//TACN
include('kkgia/tacn.php');

//VTXK
include('kkgia/vtxk.php');


?>