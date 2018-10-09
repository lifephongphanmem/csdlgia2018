<?php
Route::resource('giathucanchannuoi','CbKkTaCnController');
Route::get('giathucanchannuoi/{maxa}/history','CbKkTaCnController@history');
Route::get('/ajax/showttkkdvtacn','CbKkTaCnController@showttkk');
?>