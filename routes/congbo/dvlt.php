<?php
Route::resource('giadichvuluutru','CbKkGDvLtController');
Route::get('giadichvuluutru/{macskd}/history','CbKkGDvLtController@history');
Route::get('/ajax/showttkkdvlt','CbKkGDvLtController@showttkk');
?>