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
        <td width="40%">
            <span style="text-transform: uppercase">{{$inputs['dvcaptren']}}</span><br>
            <span style="text-transform: uppercase;font-weight: bold">{{$inputs['dv']}}</span><br>
            <hr style="width: 10%"> <br>
            Số: ..............
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b><br>
            <hr style="width: 15%"><br>
            <i>{{$inputs['diadanh']}}, ngày .... tháng .... năm ....</i>
        </td>
    </tr>
</table>
<p style="text-align: center;font-weight: bold;font-size: 20px">HỒ SƠ GIÁ RỪNG</p>
<p style="text-align: center"><i >({{$model->soqd}})</i></p>
<p style="text-align: center"><i >Ngày áp dụng({{getDayVn($model->ngayapdung)}})</i></p>
<p style="text-align: center"><i >Địa bàn: {{$districts->diaban}}</i></p>


<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Nhóm rừng</th>
        <th style="text-align: center">Loại rừng</th>
        <th style="text-align: center" width="10%">Mức độ</th>
        <th style="text-align: center" width="10%">Đơn giá <br>sử dụng</th>
        <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>50 năm</th>
        <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>1 năm</th>
        <th style="text-align: center" width="10%">Đơn giá<br> xử phạt <br>vi phạm<br> về rừng</th>
    </tr>
    @foreach($modelct as $key=>$tt)
        <tr>
            <td style="text-align: center">{{$key + 1}}</td>
            <td>{{$tt->tennhom}}</td>
            <td class="active">{{$tt->loairung}}</td>
            <td>{{$tt->mucdo}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiasd)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiat50)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiat1)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiaxp)}}</td>
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
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-align: left">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - UBND tỉnh;<br>
            - Bộ tài chính;<br>
            - Lưu: VT, QLGCS.
        </td>
        <td>
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i><br><br><br><br><br><br><br>
        </td>
    </tr>
</table>