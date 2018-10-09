<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 4/5/2018
 * Time: 3:05 PM
 */

function NhomQuanLy()
{
    $a_kq = array(
        'TC' => 'Tài Chính',
        'VT' => 'Vận Tải',
        'CT' => 'Công Thương',
        'KHAC' => 'Khác'
    );
    //dd($a_kq);
    return $a_kq;
}


function getLoaiXe(){
    $a_loaixe = array(
        'Xe 4 chỗ' => 'Xe 4 chỗ',
        'Xe 5 chỗ' => 'Xe 5 chỗ',
        'Xe 7 chỗ' => 'Xe 7 chỗ',
        'Xe 16 chỗ' => 'Xe 16 chỗ',
        'Xe 29 chỗ' => 'Xe 29 chỗ',
        'Xe 35 chỗ' => 'Xe 35 chỗ',
        'Xe 45 chỗ' => 'Xe 45 chỗ',
        'Xe 47 chỗ' => 'Xe 47 chỗ',
        'Loại xe khác' => 'Loại xe khác'
    );
    return $a_loaixe ;
}

function getDiaDanhH(){
    $diadanhhs = \App\DiaBanHd::where('level','H')
        ->get();

    $options = array();

    foreach ($diadanhhs as $diadanhh) {

        $options[$diadanhh->district] = $diadanhh->diaban;
    }
    return $options;
}

?>