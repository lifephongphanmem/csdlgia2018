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
        span {
            text-transform: uppercase;
            font-weight: bold;
        }
        @media print {
            .in{
                display: none !important;
            }
        }
    </style>
</head>

<div class="in" style="margin-left: 20px;">
    <input type="submit" onclick=" window.print()" value="In kê khai"  />
</div>

<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b></b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>
<p style="text-align: center;font-weight: bold;font-size: 20px">HỒ SƠ GIÁ NƯỚC SẠCH SINH HOẠT</p>
<p style="text-align: center"><i >({{$model->soqd}})</i></p>
<p style="text-align: center"><i >Ngày áp dụng: {{getDayVn($model->ngayapdung)}}</i></p>
<p style="text-align: center"><i >Ghi chú: {{$model->ghichu}}</i></p>


<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Đối tượng</th>
        <th style="text-align: center">Giá chưa <br>thuế<br>(đ/m3)</th>
        <th style="text-align: center">Thuế <br>VAT<bR>(đ/m3)</th>
        <th style="text-align: center">Giá có<br> thuế</th>
        <th style="text-align: center">Phí BVMT <br>tỷ lệ (%)</th>
        <th style="text-align: center">Phí BVMT <br>tiền phí<br>(đ/m3)</th>
        <th style="text-align: center">Tổng<br>cộng giá<br>tiêu thụ<br>(đ/m3)</th>
    </tr>
    @foreach($modelct as $key=>$ct)
        <tr>
            <td style="text-align: center">{{$key + 1}}</td>
            <td class="active">{{$ct->doituong}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($ct->giachuathue)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($ct->thuevat)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($ct->giacothue)}}</td>
            <td style="text-align: center;font-weight: bold">{{number_format($ct->phibvmttyle)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($ct->phibvmt)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($ct->thanhtien)}}</td>
    @endforeach
</table>
<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align: center;">
    <tr>
        <td></td>
        <td style="text-align: center;text-transform: uppercase; " width="60%">
            <b></b><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <b style="text-transform: uppercase;"></b>

        </td>
    </tr>
</table>