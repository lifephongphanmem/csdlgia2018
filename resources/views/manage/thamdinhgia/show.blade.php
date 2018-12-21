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
<p style="text-align: center;font-weight: bold;font-size: 20px;text-transform: uppercase;">Thông tin thẩm định giá</p>
<p>Số hồ sơ thẩm định: {{$model->hosotdgia}}</p>
<p>Thời điểm thẩm định: {{getDayVn($model->thoidiem)}}</p>
<p>Địa điểm thẩm định: {{$model->diadiem}}</p>
<p>Phương pháp thẩm định: {{$model->ppthamdinh}}</p>
<p>Mục đích thẩm định: {{$model->mucdich}}</p>
<p>Đơn vị yêu cầu:{{$model->dvyeucau}}</p>
<p>Nguồn vốn: {{$model->nguonvon}}</p>
<p>Số thông báo kết luận: {{$model->sotbkl}}</p>
<p>Thời hạn sử dụng kết quả: {{getDayVn($model->thoihan)}}</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%" style="text-align: center" rowspan="2">STT</th>
        <th style="text-align: center" rowspan="2">Loại hàng hóa - Quy cách</th>
        <th style="text-align: center" rowspan="2">Đơn<br>vị<br>tính</th>
        <th style="text-align: center" rowspan="2">Số<br>lượng</th>
        <th style="text-align: center" colspan="2">Giá đề nghị<br>({{$model->thuevat}})</th>
        <th style="text-align: center" colspan="2">Giá thẩm định<br>({{$model->thuevat}})</th>
    </tr>
    <tr>
        <th style="text-align: center">Đơn giá</th>
        <th style="text-align: center">Thành tiền</th>
        <th style="text-align: center">Đơn giá</th>
        <th style="text-align: center">Thành tiền</th>
    </tr>
    <tr>
        <th style="text-align: center">0</th>
        <th style="text-align: center">1</th>
        <th style="text-align: center">2</th>
        <th style="text-align: center">3</th>
        <th style="text-align: center">4</th>
        <th style="text-align: center">5</th>
        <th style="text-align: center">6</th>
        <th style="text-align: center">7</th>
    </tr>
    @foreach($modelct as $key=>$tt)
        <tr>
            <td style="text-align: center">{{($key +1)}}</td>
            <td class="active">{{$tt->tents}}-{{$tt->thongsokt}}</td>
            <td style="text-align: center">{{$tt->dvt}}</td>
            <td style="text-align: center">{{number_format($tt->sl)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiadenghi)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->giadenghi)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiathamdinh)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->giatritstd)}}</td>
        </tr>
    @endforeach
</table>
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