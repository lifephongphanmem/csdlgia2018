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
    $options[''] = '--Chọn địa bàn quản lý--';
    foreach ($diadanhhs as $diadanhh) {


        $options[$diadanhh->district] = $diadanhh->diaban;
    }
    return $options;
}

function getDtapdungdvlt(){
    $dtads = \App\DtAdDvLt::all();

    $options = array();
    $options['00'] = '--Chọn loại đối tượng áp dụng--';
    foreach ($dtads as $dtad) {
        $options[$dtad->madtad] = $dtad->tendtad;
    }
    return $options;
}

function getDvtDvLt(){
    $dvt = array(
        ''=>'--Chọn đơn vị tính--',
        'Đồng/giường/ngày đêm'=>'Đồng/giường/ngày đêm',
        'Đồng/phòng/ngày đêm'=>'Đồng/phòng/ngày đêm',
        'Đồng/phòng/tuần'=> 'Đồng/phòng/tuần',
        'Đồng/phòng/tháng'=> 'Đồng/phòng/tháng',
        'Đồng/căn hộ/ngày đêm'=>'Đồng/căn hộ/ngày đêm',
        'Đồng/căn hộ/tuần'=> 'Đồng/căn hộ/tuần' ,
        'Đồng/căn hộ/tháng'=>'Đồng/căn hộ/tháng',
    );
    return $dvt;
}

function getLoaiVbQlNn(){
    $vbqlnn = array(
        '' => '--Loại văn bản--',
        'luat' => 'Luật',
        'nghidinh'=>'Nghị định',
        'nghiquyet'=> 'Nghị quyết',
        'thongtu' => 'Thông tư',
        'quyetdinh' => 'Quyết định',
        'vbhd' => 'Văn bản hướng dẫn',
        'baocao' => 'Báo cáo tình hình giá trị trường',
        'tailieu' => 'Báo cáo, tài liệu học tập kinh nghiệm',
        'khoahoc' => 'Kết quả, đề tài nghiên cứu khoa học',
        'vbkhac' => 'Báo cáo, văn bản có liên quan khác',
    );
    return $vbqlnn;
}

function getThang(){
    return array('01' => '01','02' => '02','03' => '03',
        '04' => '04','05' => '05','06' => '06',
        '07' => '07','08' => '08','09' => '09',
        '10' => '10','11' => '11','12' => '12');
}

function getNam(){
    return array('2017' => '2017','2018' => '2018','2019' => '2019','2020' => '2020');
}
?>