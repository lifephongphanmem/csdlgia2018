<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>

    <style type="text/css">
        body {
            font: normal 12px/14px time, serif;
        }

        tr > td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th colspan="11" style="text-align: center; font-weight: bold; font-size: 20px;">
                BẢNG GIÁ THỊ TRƯỜNG {{$model_nhom->tentt}}
            </th>
        </tr>
    </table>

    <table>
        <tr>
            <td>Mã nhóm</td>
            <td>Tên nhóm</td>
            <td>Mã hàng</td>
            <td>Tên hàng</td>
            <td>Đặc điểm kỹ thuật</td>
            <td>Đơn vị tính</td>
            <td>Loại giá</td>
            <td>Giá kỳ trước</td>
            <td>Giá kỳ này</td>
            <td>Nguồn thông tin</td>
            <td>Ghi chú</td>
        </tr>

        @foreach($model as $ct)
            <tr>
                <td>{{$ct->manhom}}</td>
                <td>{{$ct->nhom}}</td>
                <td>{{$ct->mahhdv}}</td>
                <td>{{$ct->tenhhdv}}</td>
                <td>{{$ct->dacdiemkt}}</td>
                <td>{{$ct->dvt}}</td>
                <td>{{$ct->loaigia}}</td>
                <td>{{$ct->gialk}}</td>
                <td>{{$ct->gia}}</td>
                <td>{{$ct->nguontt}}</td>
                <td>{{$ct->ghichu}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>