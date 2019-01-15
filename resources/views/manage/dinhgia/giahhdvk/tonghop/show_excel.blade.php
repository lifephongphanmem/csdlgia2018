<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    <style type="text/css">
        body {
            font: normal 12px/14px time, serif;
        }

        tr > td {
            border: 1px solid;
        }
    </style>
</head>
<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">

    <tr>
        <th colspan="4">{{$model->ttbc}}</th>
    </tr>
</table>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <td>Mã số</th>
        <td>Mặt hàng</td>
        <td>Đơn vị tính</td>
        <td>Giá kỳ này</td>
    </tr>
    @foreach($modelct as $tt)
        <tr>
            <td>{{$tt->mahhdv}}</td>
            <td>{{$tt->tenhhdv}}</td>
            <td>{{$tt->dvt}}</td>
            <td>{{number_format($tt->gia)}}</td>
        </tr>
    @endforeach

</table>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="30%">

        </td>
        <td style="text-align: center;text-transform: uppercase; " width="70%">
            <b></b><br>
        </td>
    </tr>

</table>
</body>
</html>