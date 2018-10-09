<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
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
            <b>{{(session('admin')->sadmin == 'ssa') ? '' : getGeneralConfigs()['tendonvi']}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;">DANH SÁCH DOANH NGHIỆP CUNG CẤP {{$dv}}</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Tên doanh nghiệp</th>
        <th>Mã số thuế</th>
        <th>Số điện thoại</th>
        <th>Số fax</th>
        <th>Địa chỉ trụ sở</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($model as $key => $tt)
        <tr>
            <th style="text-align: center">{{$key + 1}}</th>
            <th style="text-align: left">{{($pl == 'DVLT' || $pl == 'DVGS')?$tt->tendn:$tt->tendonvi}}</th>
            <th style="text-align: left">{{$tt->masothue}}</th>
            <th style="text-align: center">{{($pl == 'DVLT' || $pl == 'DVGS')?$tt->teldn:$tt->dienthoai}}</th>
            <th style="text-align: center">{{($pl == 'DVLT' || $pl == 'DVGS')?$tt->faxdn:$tt->fax}}</th>
            <th style="text-align: left">{{($pl == 'DVLT' || $pl == 'DVGS')?$tt->diachidn:$tt->diachi}}</th>
            <th style="text-align: center"></th>
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