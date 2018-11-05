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
Route::post('lephitruocba/delete','LePhiTruocBaController@destroy');

Route::post('lephitruocba/hoanthanh','LePhiTruocBaController@hoanthanh');
Route::post('lephitruocba/huyhoanthanh','LePhiTruocBaController@huyhoanthanh');
Route::post('lephitruocba/congbo','LePhiTruocBaController@congbo');

Route::get('lephitruocbactdf/add','LePhiTruocBaCtDfController@store');
Route::get('lephitruocbactdf/show','LePhiTruocBaCtDfController@show');
Route::get('lephitruocbactdf/update','LePhiTruocBaCtDfController@update');
Route::get('lephitruocbactdf/del','LePhiTruocBaCtDfController@destroy');

Route::get('lephitruocbact/add','LePhiTruocBaCtController@store');
Route::get('lephitruocbact/show','LePhiTruocBaCtController@show');
Route::get('lephitruocbact/update','LePhiTruocBaCtController@update');
Route::get('lephitruocbact/del','LePhiTruocBaCtController@destroy');

Route::get('timkiemlephitruocba','LePhiTruocBaController@search');

//Giá thuê mặt đất-nước
Route::resource('giathuematdatmatnuoc','GiaThueDatNuocController');
Route::post('giathuematdatmatnuoc/hoanthanh','GiaThueDatNuocController@hoanthanh');
Route::post('giathuematdatmatnuoc/huyhoanthanh','GiaThueDatNuocController@huyhoanthanh');
Route::post('giathuematdatmatnuoc/congbo','GiaThueDatNuocController@congbo');

Route::get('timkiemgiathuematdatmatnuoc','GiaThueDatNuocController@search');

Route::get('giathuematdatmatnuocctdf/store','GiaThueDatNuocCtDfController@store');
Route::get('giathuematdatmatnuocctdf/edit','GiaThueDatNuocCtDfController@edit');
Route::get('giathuematdatmatnuocctdf/update','GiaThueDatNuocCtDfController@update');
Route::get('giathuematdatmatnuocctdf/del','GiaThueDatNuocCtDfController@destroy');

Route::get('giathuematdatmatnuocct/store','GiaThueDatNuocCtController@store');
Route::get('giathuematdatmatnuocct/edit','GiaThueDatNuocCtController@edit');
Route::get('giathuematdatmatnuocct/update','GiaThueDatNuocCtController@update');
Route::get('giathuematdatmatnuocct/del','GiaThueDatNuocCtController@destroy');

//Giá rừng
Route::resource('dmgiarung','DmGiaRungController');
Route::post('dmgiarung/update','DmGiaRungController@update');

Route::resource('giarung','GiaRungController');
Route::post('giarung/delete','GiaRungController@destroy');

Route::post('giarung/hoanthanh','GiaRungController@hoanthanh');
Route::post('giarung/huyhoanthanh','GiaRungController@huyhoanthanh');
Route::post('giarung/congbo','GiaRungController@congbo');

Route::get('giarungctdf/add','GiaRungCtDfController@store');
Route::get('giarungctdf/show','GiaRungCtDfController@show');
Route::get('giarungctdf/update','GiaRungCtDfController@update');
Route::get('giarungctdf/del','GiaRungCtDfController@destroy');

Route::get('giarungct/add','GiaRungCtController@store');
Route::get('giarungct/show','GiaRungCtController@show');
Route::get('giarungct/update','GiaRungCtController@update');
Route::get('giarungct/del','GiaRungCtController@destroy');

Route::get('timkiemgiarung','GiaRungController@search');

//Thuế tài nguyên
Route::resource('nhomthuetn','NhomThueTnController');
Route::get('nhomthuetn/show','NhomThueTnController@show');
Route::post('nhomthuetn/update','NhomThueTnController@update');
Route::resource('dmthuetn','DmThueTnController');
Route::get('dmthuetn/show','DmThueTnController@show');
Route::post('dmthuetn/update','DmThueTnController@update');

Route::resource('thuetainguyen','ThueTaiNguyenController');
Route::post('thuetainguyen/create','ThueTaiNguyenController@create');
Route::post('thuetainguyen/delete','ThueTaiNguyenController@destroy');
Route::post('thuetainguyen/hoanthanh','ThueTaiNguyenController@hoanthanh');
Route::post('thuetainguyen/huyhoanthanh','ThueTaiNguyenController@huyhoanthanh');
Route::post('thuetainguyen/congbo','ThueTaiNguyenController@congbo');
Route::get('timkiemthuetainguyen','ThueTaiNguyenController@search');

Route::get('/thuetainguyenctdf/edit','ThueTaiNguyenCtDfController@edit');
Route::get('/thuetainguyenctdf/update','ThueTaiNguyenCtDfController@update');

Route::get('/thuetainguyenct/edit','ThueTaiNguyenCtController@edit');
Route::get('/thuetainguyenct/update','ThueTaiNguyenCtController@update');

Route::get('reportsthuetainguyen','ReportsThueTNController@index');
Route::post('reportsthuetainguyen/bc1','ReportsThueTNController@BC1');

//DV Khám chữa bệnh
Route::resource('nhomdichvukcb','NhomDvKcbController');
Route::get('nhomdichvukcb/show','NhomDvKcbController@show');
Route::post('nhomdichvukcb/update','NhomDvKcbController@update');
Route::resource('dmdichvukcb','DmDvKcbController');
Route::get('dmdichvukcb/show','DmDvKcbController@show');
Route::post('dmdichvukcb/update','DmDvKcbController@update');

Route::resource('dichvukcb','DvKcbController');
Route::post('dichvukcb/create','DvKcbController@create');
Route::post('dichvukcb/delete','DvKcbController@destroy');
Route::post('dichvukcb/hoanthanh','DvKcbController@hoanthanh');
Route::post('dichvukcb/huyhoanthanh','DvKcbController@huyhoanthanh');
Route::post('dichvukcb/congbo','DvKcbController@congbo');
Route::get('timkiemdichvukcb','DvKcbController@search');

Route::get('/dichvukcbctdf/edit','DvKcbCtDfController@edit');
Route::get('/dichvukcbctdf/update','DvKcbCtDfController@update');

Route::get('/dichvukcbct/edit','DvKcbCtController@edit');
Route::get('/dichvukcbct/update','DvKcbCtController@update');

//Giá HH-DV khác
Route::resource('nhomhanghoadichvu','NhomHhDvKController');
Route::get('nhomhanghoadichvu/show','NhomHhDvKController@show');
Route::post('nhomhanghoadichvu/update','NhomHhDvKController@update');
Route::resource('dmhanghoadichvu','DmHhDvKController');
Route::get('dmhanghoadichvu/show','DmHhDvKController@show');
Route::post('dmhanghoadichvu/update','DmHhDvKController@update');

Route::resource('giahhdvkhac','GiaHhDvKController');
Route::post('giahhdvkhac/create','GiaHhDvKController@create');
Route::post('giahhdvkhac/delete','GiaHhDvKController@destroy');
Route::post('giahhdvkhac/hoanthanh','GiaHhDvKController@hoanthanh');
Route::post('giahhdvkhac/huyhoanthanh','GiaHhDvKController@huyhoanthanh');
Route::post('giahhdvkhac/congbo','GiaHhDvKController@congbo');
Route::get('timkiemgiahhdvkhac','GiaHhDvKController@search');

Route::get('/giahhdvkhacctdf/edit','GiaHhDvKCtDfController@edit');
Route::get('/giahhdvkhacctdf/update','GiaHhDvKCtDfController@update');

Route::get('/giahhdvkhacct/edit','GiaHhDvKCtController@edit');
Route::get('/giahhdvkhacct/update','GiaHhDvKCtController@update');

//Phí Lệ phí
Route::resource('nhomphilephi','DmPhiLePhiController');
Route::post('nhomphilephi/update','DmPhiLePhiController@update');

Route::resource('philephi','PhiLePhiController');
Route::post('philephi/delete','PhiLePhiController@destroy');

Route::post('philephi/hoanthanh','PhiLePhiController@hoanthanh');
Route::post('philephi/huyhoanthanh','PhiLePhiController@huyhoanthanh');
Route::post('philephi/congbo','PhiLePhiController@congbo');

Route::get('timkiemthongtinphilephi','PhiLePhiController@search');

Route::get('philephictdf/store','PhiLePhiCtDfController@store');
Route::get('philephictdf/show','PhiLePhiCtDfController@show');
Route::get('philephictdf/update','PhiLePhiCtDfController@update');
Route::get('philephictdf/del','PhiLePhiCtDfController@destroy');

Route::get('philephict/store','PhiLePhiCtController@store');
Route::get('philephict/show','PhiLePhiCtController@show');
Route::get('philephict/update','PhiLePhiCtController@update');
Route::get('philephict/del','PhiLePhiCtController@destroy');

//Đầu giá đất
Route::resource('thongtindaugiadat','DauGiaDatController');
Route::post('thongtindaugiadat/hoanthanh','DauGiaDatController@hoanthanh');
Route::post('thongtindaugiadat/huyhoanthanh','DauGiaDatController@huyhoanthanh');
Route::post('thongtindaugiadat/congbo','DauGiaDatController@congbo');
Route::get('timkiemthongtindaugiadat','DauGiaDatController@search');

Route::get('thongtindaugiadatctdf/store','DauGiaDatCtDfController@store');
Route::get('thongtindaugiadatctdf/show','DauGiaDatCtDfController@show');
Route::get('thongtindaugiadatctdf/update','DauGiaDatCtDfController@update');
Route::get('thongtindaugiadatctdf/del','DauGiaDatCtDfController@destroy');

Route::get('thongtindaugiadatct/store','DauGiaDatCtController@store');
Route::get('thongtindaugiadatct/show','DauGiaDatCtController@show');
Route::get('thongtindaugiadatct/update','DauGiaDatCtController@update');
Route::get('thongtindaugiadatct/del','DauGiaDatCtController@destroy');

?>