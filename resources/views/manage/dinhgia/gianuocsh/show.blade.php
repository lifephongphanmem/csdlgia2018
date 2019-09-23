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
        tr{
            padding: 20px;
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

<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="0" style="  border-collapse: collapse;font:normal 16px Times, serif;" >
            <tr>
                <th width="50%">  </td>
                <th width="" style="text-align: center">Cộng hòa xã hội chủ nghĩa Việt Nam </td>
            </tr>
            <tr>
                <th style="padding-top: 1px">Số quyết định: {{$model->soqd}} </td>
                <th style="padding-top: 1px">Độc lập - Tự do - Hạnh phúc</td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="0" style="margin: 10px auto; border-collapse: collapse;font:normal 16px Times, serif;" >
            <tr>
                <th style="text-transform: uppercase">GIÁ NƯỚC SINH HOẠT {{$model->diaban}} </td>
            </tr>
            <tr>
                <td>Ngày áp dụng: {{getDayVn($model->ngayapdung)}} </td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
            <tr>
                <th width="2%" style="text-align: center">STT</th>
                <th style="text-align: center">Đối tượng</th>
                <th style="text-align: center">Đơn giá (đồng/m3)</th>
            </tr>
            @foreach($modelct as $key=>$ct)
                <tr>
                    <td style="text-align: center">{{$key + 1}}</td>
                    <td class="active">{{$ct->doituongsd}}</td>
                    <td style="text-align: right;font-weight: bold">{{number_format($ct->giachuathue)}}</td>
            @endforeach
        </table>
    </div>
</div>