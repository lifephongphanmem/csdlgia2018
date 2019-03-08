@extends('main')

@section('custom-style')
    <style type="text/css">
        table, p {
        }
        table tr td:first-child {
            text-align: center;
        }
        td, th {
            padding: 10px;
        }
    </style>
@stop


@section('custom-script')

@stop

@section('content')
    <!-- BEGIN CONTENT -->
    <h3 class="page-title">
        Thông tin hỗ trợ<small></small>
    </h3>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <div class="note note-success">
                <p>Công ty LifeSoft chân thành cảm ơn quý khách hàng đã tin tưởng sử dụng phần mềm của công ty.
                    Thay mặt toàn bộ cán bộ nhân viên trong công ty gửi đến khách hàng lời chúc sức khỏe- thành công</p>
                <p>Nhằm chăm sóc, hỗ trợ khách hàng nhanh chóng và tiện dụng nhất công ty xin cung cấp thông tin các cán bộ hỗ trợ khách hàng trong quá trình sử dụng.
                    Mọi vấn đề khúc mắc khách hàng có thể liên hệ trực tiếp cho cán bộ để được hỗ trợ!</p>
                <!--p>Số điện thoại công ty: <b>024 3634 3951</b></p-->
                <p>Phụ trách khối kỹ thuật:<b> Phó giám đốc:  Trần Ngọc Hiếu </b>- tel: <b>096 8206844</b></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <p style="font-weight: bold;font-size: 18px;color: blue">Phòng TKBT I - quản lý địa bàn các tỉnh phía Nam</p>
            <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" >
                <tr>
                    <th width="2%">STT</th>
                    <th width="50%">Họ và tên <br>cán bộ</th>
                    <th>Chức vụ</th>
                    <th width="20%">Số điện thoại liên lạc</th>
                </tr>
                <tr>
                    <td style="text-align: center">1</td>
                    <td style="font-weight: bold;">Nguyễn Xuân Trường</td>
                    <td>Trưởng phòng</td>
                    <td>0917 737456</td>
                </tr>
                <tr>
                    <td style="text-align: center">2</td>
                    <td style="font-weight: bold">Hoàng Ngọc Long</td>
                    <td>Phó phòng</td>
                    <td>0985 365683</td>
                </tr>
                <tr>
                    <td style="text-align: center">3</td>
                    <td style="font-weight: bold">Triệu Hồng Đạt</td>
                    <td>Nhân viên</td>
                    <td>093 6368122</td>
                </tr>
                <tr>
                    <td style="text-align: center">4</td>
                    <td style="font-weight: bold">Nguyễn Văn Hiển</td>
                    <td>Nhân viên</td>
                    <td>0975 500274</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <p style="font-weight: bold;font-size: 18px;color: blue">Phòng TKBT II - quản lý địa bàn các tỉnh phía Bắc </p>
            <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
                <tr>
                    <th width="2%">STT</th>
                    <th width="50%">Họ và tên <br>cán bộ</th>
                    <th>Chức vụ</th>
                    <th width="20%">Số điện thoại liên lạc</th>
                </tr>
                <tr>
                    <td style="text-align: center">1</td>
                    <td style="font-weight: bold">Nguyễn Văn Nguyên</td>
                    <td>Trưởng phòng</td>
                    <td>0979 785068</td>
                </tr>
                <tr>
                    <td style="text-align: center">2</td>
                    <td style="font-weight: bold">Hoàng Văn Sáng</td>
                    <td>Phó phòng</td>
                    <td>0974 090556</td>
                </tr>
                <tr>
                    <td style="text-align: center">3</td>
                    <td style="font-weight: bold">Nguyễn Văn Dũng</td>
                    <td>Nhân viên</td>
                    <td>0986 012094</td>
                </tr>
                <tr>
                    <td style="text-align: center">4</td>
                    <td style="font-weight: bold">Nguyễn Văn Đạt</td>
                    <td>Nhân viên</td>
                    <td>0966 305 359</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clearfix">
    </div>
@stop