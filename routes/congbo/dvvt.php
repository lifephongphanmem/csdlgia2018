<?php
Route::resource('giavantaixekhach','CbKkVtXkController');
Route::get('giavantaixekhach/{maxa}/history','CbKkVtXkController@history');
Route::get('/ajax/showttkkvtxk','CbKkVtXkController@showttkk');

Route::resource('giavantaixebus','CbKkVtXbController');
Route::get('giavantaixebus/{maxa}/history','CbKkVtXbController@history');
Route::get('/ajax/showttkkvtxb','CbKkVtXbController@showttkk');

Route::resource('giavantaixetaxi','CbKkVtXTxController');
Route::get('giavantaixetaxi/{maxa}/history','CbKkVtXTxController@history');
Route::get('/ajax/showttkkvtxtx','CbKkVtXTxController@showttkk');

Route::resource('giavantaikhac','CbKkVtChController');
Route::get('giavantaikhac/{maxa}/history','CbKkVtChController@history');
Route::get('/ajax/showttkkvtch','CbKkVtChController@showttkk');
?>