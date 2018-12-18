<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    <style type="text/css">
        body {
            font: normal 14px/16px time, serif;
        }

        table, p {
            width: 98%;
            margin: auto;
        }

        table tr td:first-child {
            text-align: center;
        }

        td, th {
            padding: 10px;
        }
        p{
            padding: 5px;
        }
        span{
            text-transform: uppercase;
            font-weight: bold;

        }
    </style>
</head>
<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            --------<br><br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br><br>
            <i> Ngày {{date('d',strtotime($model->ngaybc))}} tháng {{date('m',strtotime($model->ngaybc))}}  năm {{date('Y',strtotime($model->ngaybc))}}</i>
        </td>
    </tr>
</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;text-transform: uppercase;">{{$model->ttbc}}</p>
<p style="text-align: center; font-weight: bold; font-size: 16px;">Ngày chốt báo cáo: {{getDayVn($model->ngaychotbc)}}</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
<p style="text-transform: uppercase;font-weight: bold">{{$modelnhom->manhom}}. {{$modelnhom->tennhom}}</p>
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Tên hàng hóa, dịch vụ</th>
        <th style="text-align: center">Đơn vị tính</th>
        <th style="text-align: center" width="10%">Đơn giá</th>
    </tr>
    @foreach($modelct as $tt)
        <tr>
            <td style="text-align: center">{{$tt->mahhdv}}</td>
            <td class="active" style="font-weight: bold">{{$tt->tenhhdv}}</td>
            <td style="text-align: center">{{$tt->dvt}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->gia)}}</td>
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