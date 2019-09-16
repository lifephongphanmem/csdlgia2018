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
<p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">GIÁ CHO BÁN NHÀ TÁI ĐỊNH CƯ @if($inputs['district'] != 'all'){{$districts->diaban}}@endif</p>
@if($inputs['nam'] != 'all')
    <p style="text-align: center;font-weight: bold;font-size: 16px">Năm {{$inputs['nam']}}</p>
@endif
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <thead>
    <tr>
        <th style="text-align: center" width="2%">STT</th>
        <th style="text-align: center">Tên dự án</th>
        <th style="text-align: center">Địa bàn</th>
        <th style="text-align: center">Thời điểm khởi công</th>
        <th style="text-align: center">Thời điểm hoàn thành</th>
        <th style="text-align: center" >Đơn giá bán</th>
        <th style="text-align: center" >Đơn giá thuê mua</th>
        <th style="text-align: center" >Thông tin quyết định</th>
        <th style="text-align: center" >Ghi chú</th>
    </tr>
    </thead>
    <tbody>
    @if($model->count() != 0)
        @foreach($model as $key => $tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td style="text-align: left" class="active">{{$tt->tenduan}}</td>
                <td><b>{{$tt->diaban}}</b></td>
                <td style="text-align: center"><b>{{getDayVn($tt->thoidiemkc)}}</b></td>
                <td style="text-align: center"><b>{{getDayVn($tt->thoidiemht)}}</b></td>
                <td style="text-align: right">{{dinhdangsothapphan($tt->dongiaban,2)}}</td>
                <td style="text-align: right">{{dinhdangsothapphan($tt->dongiathuemua,2)}}</td>
                <td style="text-align: center">{{$tt->ttqd}}</td>
                <td style="text-align: center">{{$tt->ghichu}}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td style="text-align: center" colspan="8">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
        </tr>
    @endif
    </tbody>
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