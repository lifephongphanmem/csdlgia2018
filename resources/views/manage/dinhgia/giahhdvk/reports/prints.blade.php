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
            Số: {{$model->soqd}}
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br><br>
            <i>{{$diaban}}, Ngày {{date('d',strtotime($model->ngayapdung))}} tháng {{date('m',strtotime($model->ngayapdung))}}  năm {{date('Y',strtotime($model->ngayapdung))}}</i>
        </td>
    </tr>
</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;">BÁO CÁO<br>GIÁ THỊ TRƯỜNG HÀNG HÓA, DỊCH VỤ</p>
<p>Địa bàn: {{$diaban}}</p>
<p>Số quyết định liền kề: {{$model->soqdlk}}</p>
<p>Ngày báo cáo liền kề: {{getDayVn($model->ngayapdunglk)}}</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <thead>
        <tr>
            <th width="2%" style="text-align: center" rowspan="2">STT</th>
            <th style="text-align: center" rowspan="2">Mã hàng hóa<br> dịch vụ</th>
            <th style="text-align: center" rowspan="2">Tên hàng hóa dịch vụ</th>
            <th style="text-align: center" rowspan="2">Đặc điểm kỹ thuật</th>
            <th style="text-align: center" rowspan="2">Đơn vị tính</th>
            <th style="text-align: center" width="10%" rowspan="2">Giá liền kề<br>({{getDayVn($model->ngayapdunglk)}})</th>
            <th style="text-align: center" width="10%" rowspan="2">Giá<br>({{getDayVn($model->ngayapdung)}})</th>
            <th style="text-align: center" width="10%" colspan="2">Tăng, giảm</th>
            <th style="text-align: center" width="10%" rowspan="2">Ghi chú</th>
        </tr>
        <tr>
            <th>Mức</th>
            <th>%</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8=7-6</th>
            <th>9=7/6</th>
            <th>10</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td colspan="9" style="font-weight: bold; text-align: left">{{$tennhom}}</td>
        </tr>
        @foreach($modelct as $key=>$tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td style="text-align: center">{{$tt->mahhdv}}</td>
                <td class="active" style="font-weight: bold">{{$tt->tenhhdv}}</td>
                <td style="text-align: center">{{$tt->dacdiemkt}}</td>
                <td style="text-align: center">{{$tt->dvt}}</td>
                <td style="text-align: right;font-weight: bold">{{number_format($tt->gialk)}}</td>
                <td style="text-align: right;font-weight: bold">{{number_format($tt->gia)}}</td>
                <td style="text-align: right;font-weight: bold">{{number_format($tt->gia - $tt->gialk)}}</td>
                <td style="text-align: right;font-weight: bold">{{number_format($tt->gialk) == 0 ? number_format($tt->gia) == 0 ? 0 : 100
                                : round(number_format($tt->gia)/number_format($tt->gialk),2)}}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>

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