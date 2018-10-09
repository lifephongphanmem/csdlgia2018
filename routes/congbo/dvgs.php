<?php
Route::resource('giamathangsua','CbKkGsController');
Route::get('giamathangsua/{maxa}/history','CbKkGsController@history');
Route::get('/ajax/showttkkdvgs','CbKkGsController@showttkk');
?>