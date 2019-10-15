<?php
Route::get('thongtindoanhnghiep','system\company\CompanyController@ttdn');
Route::get('thongtindoanhnghiep/{id}/edit','system\company\CompanyController@ttdnedit');
Route::patch('thongtindoanhnghiep/{id}','system\company\CompanyController@ttdnupdate');
Route::get('thongtindoanhnghiep/{id}/chinhsua','system\company\CompanyController@ttdnchinhsua');
Route::patch('thongtindoanhnghiep/df/{id}','system\company\CompanyController@ttdncapnhat');
Route::get('thongtindoanhnghiep/{id}/chuyen','system\company\CompanyController@ttdnchuyen');
Route::post('thongtindoanhnghiep/upavatar','system\company\CompanyController@upavatar');

Route::get('ttdntdct/edit','manage\kekhaigia\TtDnTdCtController@edit');
Route::get('ttdntdct/update','manage\kekhaigia\TtDnTdCtController@update');
Route::get('ttdntdct/store','manage\kekhaigia\TtDnTdCtController@store');
Route::get('ttdntdct/delete','manage\kekhaigia\TtDnTdCtController@delete');


//DVLT
include('kkgia/dvlt.php');

//DVGS
include('kkgia/tpcnte6t.php');

//TACN
include('kkgia/tacn.php');

//VTXK
include('kkgia/vtxk.php');

//VTXTX
include('kkgia/vtxtx.php');

//VTXB
include('kkgia/vtxb.php');

//VLXD
include('kkgia/vlxd.php');

//Cước vận chuyển hành khách
include('kkgia/cuocvchk.php');

//Đăng ký giá
include('kkgia/dkg.php');

//XMTXD
include('kkgia/xmtxd.php');

//dvhdtm
include('kkgia/dvhdtm.php');

//Than
include('kkgia/than.php');

//Giấy in, viết
include('kkgia/giay.php');

//Sách giáo khoa
include('kkgia/sach.php');

//Etanol
include('kkgia/etanol.php');

//Khám chữa bệnh tư nhân
include('kkgia/kcbtn.php');

//Dịch vụ cảng biển
include('kkgia/dvcb.php');

//Oto nhập khẩu, sx trong nước
include('kkgia/otonksxtn.php');

//Xe gắn máy nhập khẩu, sx trong nước
include('kkgia/xemaynksxtn.php');

//Dịch vụ du lịch bãi biển
include('kkgia/dvdlbb.php');

//Vé tham quan tại khu du lịch
include('kkgia/vetqkdl.php');
?>