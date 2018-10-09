
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <style type="text/css">
        body {
            font: normal 12px/16px time, serif;
        }

        table, p {
            width: 98%;
            margin: auto;
        }

        table tr td:first-child {
            text-align: center;
        }

        td, th {
            padding: 2px;
        }
    </style>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td style="text-align: center; text-transform: uppercase;" width="30%">
            <b>SỞ TÀI CHÍNH TỈNH, THÀNH PHỐ</b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>BẢNG GIÁ THỊ TRƯỜNG {{$thongtin['thitruong'].' '.$thongtin['nam']}}</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Ban hành kèm thông tư số 55/2011/TT-BTC ngày 29/4/2011 của Bộ tài chính hướng dẫn chế độ báo cáo giá cả thị trường dùng cho báo cáo giá thị trường tuần, tháng, quý, năm)
        </td>
    </tr>
</table>
<?php $stt =1; ?>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>Mã số</th>
        <th>Mặt hàng</th>
        <th>ĐVT</th>
        <th>Giá hàng hóa</th>
        @foreach($model_pb as $ct)
            <th>{{$ct->tendv}}</th>
            <?php $stt++; ?>
        @endforeach

    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        @for($tt = 1; $tt < $stt; $tt++)
            <th>{{4 + $tt}}</th>
        @endfor


    </tr>
        @foreach($model as $key=>$tt)
            <tr>
                <td>{{$tt->mahh}}</td>
                <td style="text-align: left">{{$tt->tenhh}}</td>
                <td>{{$tt->dvt}}</td>
                <td style="text-align: right">{{number_format($tt->giahh)}}</td>
                @foreach($model_pb as $ct)
                    <?php $ma = $ct->mahuyen; ?>
                    <td style="text-align: right">{{number_format($tt->$ma)}}</td>
                @endforeach

            </tr>
        @endforeach
</table>
</body>
</html>
