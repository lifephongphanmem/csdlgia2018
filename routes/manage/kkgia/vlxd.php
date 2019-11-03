<?php
    Route::resource('danhmucvatlieuxaydung', 'manage\kekhaigia\kkgiavlxd\DmVlXdController');
    Route::post('danhmucvatlieuxaydung/update', 'manage\kekhaigia\kkgiavlxd\DmVlXdController@update');

    Route::get('thongtindnkkgiavlxd', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdController@ttdn');
    Route::resource('thongtinkekhaigiavatlieuxaydung', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdController');
    Route::post('thongtinkekhaigiavatlieuxaydung/delete', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdController@delete');
    Route::post('thongtinkekhaigiavatlieuxaydung/chuyen', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdController@chuyen');

    Route::get('kkvlxd/kiemtra', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdController@kiemtra');
    Route::get('kkvlxd/showlydo', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdController@showlydo');


    Route::get('/kkgiavlxdctdf/storett', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtDfController@store');
    Route::get('/kkgiavlxdctdf/edittt', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtDfController@edit');
    Route::get('/kkgiavlxdctdf/updatett', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtDfController@update');
    Route::get('/kkgiavlxdctdf/deletett', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtDfController@delete');

    Route::get('/kkgiavlxdct/storett', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtController@store');
    Route::get('/kkgiavlxdct/edittt', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtController@edit');
    Route::get('/kkgiavlxdct/updatett', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtController@update');
    Route::get('/kkgiavlxdct/deletett', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdCtController@delete');

//End Ajax create

    Route::get('xetduyetkkgiavlxd', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@index');
    Route::post('xetduyetkkgiavlxd/tralai', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@tralai');
    Route::get('ttdnkkvlxd', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@ttdnkkvlxd');
    Route::get('/xetduyetkkgiavlxd/ttnhanhs', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@ttnhanhs');
    Route::post('/xetduyetkkgiavlxd/nhanhs', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@nhanhs');
    Route::post('/xetduyetkkgiavlxd/congbo', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@congbo');
    Route::post('/xetduyetkkgiavlxd/huycongbo', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@huycongbo');
    Route::get('timkiemkkgiavlxd', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdXdController@search');

    Route::get('baocaokekhaigiavlxd', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdBcController@index');
    Route::post('baocaokekhaigiavlxd/bc1', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdBcController@bc1');
    Route::post('baocaokekhaigiavlxd/bc2', 'manage\kekhaigia\kkgiavlxd\KkGiaVlXdBcController@bc2');

?>