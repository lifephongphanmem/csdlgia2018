<?php
//Định giá
Route::get('giahanghoadichvu','HomeController@congbo');
Route::get('coming','HomeController@coming');
Route::get('cbgiadatdiaban','congbo\dinhgia\CongboGiaDatDiaBanController@index');

Route::get('cbgiadaugiadat','congbo\dinhgia\CongboGiaDauGiaDatController@index');
Route::get('cbgiadaugiadat/{id}','congbo\dinhgia\CongboGiaDauGiaDatController@show');

Route::get('cbgialephitruocbanha','congbo\gialephitruocbanha\CbGiaLePhiTruocBaNhaController@index');
Route::get('cbgialephitruocbanha/{id}','congbo\gialephitruocbanha\CbGiaLePhiTruocBaNhaController@show');

Route::get('cbgiathuetainguyen','congbo\dinhgia\CongBoGiaThueTaiNguyenController@index');
Route::get('cbgiathuedatnuoc','congbo\dinhgia\CongboGiaThueDatNuocController@index');
Route::get('cbgiarung','congbo\dinhgia\CongboGiaRungController@index');
Route::get('cbthuemuanhaxh','congbo\dinhgia\CongboThueMuaNhaXHController@index');
Route::get('cbgiathuenhacongvu','congbo\dinhgia\CongboGiaThueNhaCongVuController@index');
Route::get('cbgianuocsachsinhhoat','congbo\dinhgia\CongboGiaNuocSinhHoatController@index');
Route::get('cbgiathuetaisan','congbo\dinhgia\CongboGiaThueTaiSanController@index');
Route::get('cbgiadvgiaoducdaotao','congbo\dinhgia\CongboGiaDvGiaoDucDaoTaoController@index');
Route::get('cbdichvukcb','congbo\dinhgia\CongboGiaDvKhamChuaBenhController@index');
Route::get('cbgialephitruocba','congbo\gialephi\CongboGiaLePhiTruocBaController@index');
Route::get('cbphilephi','congbo\philephi\CongboPhiLePhiController@index');
Route::get('cbgiagocvlxd','congbo\giagocvlxd\GiaGocVlXdController@index');

//Kê khai giá
Route::get('cbkkgiavlxd','congbo\kekhaigia\CongboVatLieuXayDungController@index');
Route::get('cbkkgiaxmtxd','congbo\kekhaigia\CongboGiaXMTXDController@index');
Route::get('cbgiathan','congbo\kekhaigia\CongBoGiaThanController@index');
Route::get('cbkkgiadvhdtm','congbo\kekhaigia\CongboGiaHDTMController@index');
Route::get('cbkkgiatacn','congbo\kekhaigia\CongboGiaTACNController@index');
Route::get('cbgiagiay','congbo\kekhaigia\CongboGiaGiayController@index');
Route::get('cbgiasach','congbo\kekhaigia\CongboGiaSachController@index');
Route::get('cbgiaetanol','congbo\kekhaigia\CongboGiaEtanolController@index');
Route::get('cbthamdinhgia','congbo\thamdinhgia\CongboThamDinhGiaController@index');
Route::get('cbvanbanqlnnvegia','congbo\vanbanqlnn\CongboVanBanQLNNController@index');
Route::get('danhsachusertaphuan','congbo\taphuan\DanhSachUserTapHuanController@index');
Route::get('cbgiakkmhbog','congbo\kekhaigia\mhBOG\CongBoKkMhBogController@index');
Route::get('cbgiadkmhbog','congbo\kekhaigia\mhBOG\CongBoDkMhBogController@index');



?>