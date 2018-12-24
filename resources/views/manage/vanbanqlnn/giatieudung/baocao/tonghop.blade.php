
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
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
            <b>BÁO CÁO CHỈ SỐ GIÁ TIÊU DÙNG (CPI)</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">

        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style=" width:5%">STT</th>
        <th style=" width:15%">Mã hàng hóa</th>
        <th>Tên hàng hóa</th>
        <th style=" width:15%">Quyền số</th>
        <th style=" width:15%">Chỉ số</th>
        <th style=" width:15%">Ghi chú</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>(1)</th>
        <th>(2)</th>
        <th>(3)</th>
        <th>(4)</th>
        <th>(5)</th>
        <th>(6)</th>
    </tr>
    <!-- chua lọc theo thứ tự -->
    <?php $i= 0; ?>
    @foreach($model as $key=>$ts)
        <tr>
            <th>{{$i++}}</th>
            <th style="text-align: left">{{$ts->mahh}}</th>
            <th style="text-align: left">{{$ts->tenhh}}</th>
            <th style="text-align: left">{{$ts->quyenso}}</th>
            <th style="text-align: left">{{$ts->chiso}}</th>
            <th style="text-align: left"></th>
        </tr>
    @endforeach



</table>
</body>
</html>
