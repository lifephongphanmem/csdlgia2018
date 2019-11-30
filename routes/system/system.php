<?php
Route::resource('general','GeneralConfigsController');
Route::get('setting','GeneralConfigsController@setting');
Route::post('setting','GeneralConfigsController@updatesetting');

Route::resource('district','DistrictController');
Route::resource('town','TownController');

Route::get('company','system\company\CompanyController@index');
Route::get('company/create','system\company\CompanyController@create');
Route::post('company','system\company\CompanyController@store');
Route::get('company/{id}/edit','system\company\CompanyController@edit');
Route::patch('company/{id}','system\company\CompanyController@update');

Route::get('companylvcc/getmanghe','system\company\CompanyLvCcController@getmanghe');
Route::get('companylvcc/getdvql','system\company\CompanyLvCcController@getdvql');
Route::get('companylvcc/edit','system\company\CompanyLvCcController@edit');
Route::get('companylvcc/update','system\company\CompanyLvCcController@update');
Route::get('companylvcc/store','system\company\CompanyLvCcController@store');
Route::get('companylvcc/delete','system\company\CompanyLvCcController@delete');


//Route::resource('xetduyet_thaydoi_ttdoanhnghiep','XdTdTtDnController');
//Route::post('xetduyet_thaydoi_ttdoanhnghiep/tralai','XdTdTtDnController@tralai');
//Route::get('xetduyet_thaydoi_ttdoanhnghiep/{id}/duyet','XdTdTtDnController@duyet');

Route::resource('danhmucdiadanh','DiaBanHdController');
Route::post('danhmucdiadanh/delete','DiaBanHdController@destroy');

//Users
Route::get('login','UsersController@login');
Route::post('signin','UsersController@signin');
Route::get('/change-password','UsersController@cp');
Route::post('/change-password','UsersController@cpw');
Route::get('/user_setting','UsersController@settinguser');
Route::post('/user_setting','UsersController@settinguserw');
Route::get('/checkpass','UsersController@checkpass');
Route::get('/checkuser','UsersController@checkuser');
Route::get('/checkmasothue','UsersController@checkmasothue');
Route::get('logout','UsersController@logout');
Route::get('users','UsersController@index');
Route::get('users/{id}/edit','UsersController@edit');
Route::patch('users/{id}','UsersController@update');
Route::get('users/{id}/phan-quyen','UsersController@permission');
Route::post('users/phan-quyen','UsersController@uppermission');
Route::post('users/delete','UsersController@destroy');
Route::get('users/lock/{id}/{pl}','UsersController@lockuser');
Route::get('users/unlock/{id}/{pl}','UsersController@unlockuser');
Route::get('users/create','UsersController@create');
Route::post('users','UsersController@store');
Route::get('users/{id}/copy','UsersController@copy');

Route::get('users/print','UsersController@prints');

Route::resource('xetduyettdttdn','TdTtDnController');
Route::post('xetduyettdttdn/tralai','TdTtDnController@tralai');
Route::get('xetduyettdttdn/{id}/duyet','TdTtDnController@duyet');

Route::resource('thongtinngaynghile','NgayNghiLeController');
Route::post('thongtinngaynghile/delete','NgayNghiLeController@destroy');

Route::resource('userscompany','UsersCompanyController');
Route::get('userscompany/{id}/permission','UsersCompanyController@permission');
Route::post('userscompany/phan-quyen','UsersCompanyController@uppermission');
//EndUsers
Route::get('thongtindonvi','ThongTinDonViController@index');
Route::get('thongtindonvi/edit','ThongTinDonViController@edit');
Route::post('thongtindonvi','ThongTinDonViController@update');

//Danh mục ngành nghề
Route::get('danhmucnganhkd','system\dmnganhnghekd\DmNganhKdController@index');
Route::get('danhmucnganhkd/edit','system\dmnganhnghekd\DmNganhKdController@edit');
Route::post('danhmucnganhkd/update','system\dmnganhnghekd\DmNganhKdController@update');

Route::get('danhmucnghekd','system\dmnganhnghekd\DmNgheKdController@index');
Route::get('danhmucnghekd/edit','system\dmnganhnghekd\DmNgheKdController@edit');
Route::post('danhmucnghekd/update','system\dmnganhnghekd\DmNgheKdController@update');

//Đăng ký tài khoản
Route::get('dangkytaikhoantruycap','Auth\RegisterController@create');
Route::post('dangkytaikhoantruycap','Auth\RegisterController@store');
Route::patch('dangkytaikhoantruycap/{id}/update','Auth\RegisterController@update');
Route::get('ajax/checkuser','AjaxController@checkusername');
Route::get('ajax/checkmasothue','AjaxController@checkmasothue');
Route::get('searchtkdangky','Auth\RegisterController@searchindex');
Route::post('searchtkdangky','Auth\RegisterController@search');

Route::get('dangkytaikhoantruycap/checkmadangky','Auth\RegisterController@checkmadk');
Route::post('dangkytaikhoantruycap/checkmadangky','Auth\RegisterController@submitcheckmadk');

Route::get('register','Auth\RegisterController@index');
Route::get('register/{id}','Auth\RegisterController@show');
Route::post('register/tralai','Auth\RegisterController@tralai');
Route::post('register/kichhoat','Auth\RegisterController@kichhoat');


?>