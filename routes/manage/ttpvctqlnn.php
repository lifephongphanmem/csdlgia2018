<?php
Route::get('dmttpvctqlnn','manage\ttpvctqlnn\TtPvCtQlNnDmController@index');
Route::post('dmttpvctqlnn','manage\ttpvctqlnn\TtPvCtQlNnDmController@store');
Route::get('dmttpvctqlnn/edit','manage\ttpvctqlnn\TtPvCtQlNnDmController@edit');
Route::post('dmttpvctqlnn/update','manage\ttpvctqlnn\TtPvCtQlNnDmController@update');

Route::get('ttpvctqlnn','manage\ttpvctqlnn\TtPvCtQlNnController@index');
Route::get('ttpvctqlnn/create','manage\ttpvctqlnn\TtPvCtQlNnController@create');
Route::post('ttpvctqlnn','manage\ttpvctqlnn\TtPvCtQlNnController@store');
Route::get('ttpvctqlnn/{id}/edit','manage\ttpvctqlnn\TtPvCtQlNnController@edit');
Route::patch('ttpvctqlnn/{id}','manage\ttpvctqlnn\TtPvCtQlNnController@update');
Route::get('ttpvctqlnn/dinhkem','manage\ttpvctqlnn\TtPvCtQlNnController@show');
?>