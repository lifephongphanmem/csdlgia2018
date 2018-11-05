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
<p style="text-align: center;font-weight: bold;font-size: 20px">
    HỒ SƠ ĐẤU GIÁ ĐẤT
</p>
<p><b>Số quyết định: </b>{{$model->soqd}}</p>
<p><b>Địa điểm đấu giá: </b>{{$model->diadiem}}</p>
<p><b>Đơn vị đấu giá: </b>{{$model->donvi}}</p>
<p><b>Thời gian đấu giá: </b>{{$model->tgdaugia}}</p>
<p><b>Thời gian địa điểm bán hồ sơ đấu giá: </b>{{$model->tgddbanhsdaugia}}</p>
<p><b>Điều kiện đấu giá: </b>{{$model->dkdaugia}}</p>
<p><b>Hình thức đấu giá: </b>{{$model->htdaugia}}</p>
<p><b>Thời hạn đấu giá: </b>{{$model->thdaugia}}</p>
<p><b>Ghi chú: </b>{{$model->ghichu}}</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Vị trí, địa điểm</th>
        <th style="text-align: center" width="10%">Mức giá sàn</th>
        <th style="text-align: center" width="10%">Mức giá đầu giá</th>
        <th style="text-align: center">Đơn vị đấu giá</th>
    </tr>
    @foreach($modelct as $key=>$tt)
    <tr id={{$tt->id}}>
        <td style="text-align: center">{{($key +1)}}</td>
        <td class="active">{{$tt->vitridiadiem}}</td>
        <td style="text-align: center;font-weight: bold" >{{number_format($tt->mucgiasan)}}</td>
        <td style="text-align: right;font-weight: bold">{{number_format($tt->mucgiadaugia)}}</td>
        <td style="text-align: right;font-weight: bold">{{$tt->donvidaugia}}</td>
    </tr>
    @endforeach

</table>
</table>
</body>
</html>
