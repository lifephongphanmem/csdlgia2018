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
        <td width="40%" style="vertical-align: top;">
            <span style="text-transform: uppercase">{{$inputs['dvcaptren']}}</span><br>
            <span style="text-transform: uppercase;font-weight: bold">{{$inputs['dv']}}</span>
            <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

        </td>
        <td style="vertical-align: top;">
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b>
            <hr style="width: 15%;vertical-align: top; margin-top: 2px">

        </td>
    </tr>
    <tr>
        <td>Số: ..............</td>
        <td style="text-align: right"><i style="margin-right: 25%;">{{$inputs['diadanh']}}, ngày .... tháng .... năm ....</i></td>
    </tr>
</table>
<p style="text-align: center;font-weight: bold;font-size: 20px">
    HỒ SƠ THUÊ TÀI SẢN CÔNG
</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Tên tài sản</th>
        <th style="text-align: center" width="10%">Số lượng/<br>diện tích</th>
        <th style="text-align: center" width="5%">Đơn vị<br>tính</th>
        <th style="text-align: center" width="10%">Đơn giá<br> thuê</th>
        <th style="text-align: center">Đơn vị thuê</th>
        <th style="text-align: center">Hợp đồng số</th>
        <th style="text-align: center">Thời hạn</th>
        <th style="text-align: center">Thành tiền</th>
    </tr>
    @foreach($modelct as $key=>$tt)
    <tr id={{$tt->id}}>
        <td style="text-align: center">{{($key +1)}}</td>
        <td class="active" style="font-weight: bold">{{$tt->tents}}</td>
        <td style="text-align: center;" >{{number_format($tt->soluong)}}</td>
        <td style="text-align: center;" >{{$tt->dvt}}</td>
        <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiathue)}}</td>
        <td style="text-align: left;">{{$tt->dvthue}}</td>
        <td style="text-align: left;">{{$tt->hdthue}}</td>
        <td style="text-align: left;">{{$tt->ththue}}</td>
        <td style="text-align: right;font-weight: bold">{{number_format($tt->sotienthuenam)}}</td>
    </tr>
    @endforeach

</table>
<table width="96%" border="0" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
    <tr>
        <td width="40%" style="text-align: left; vertical-align: top;">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - UBND tỉnh;<br>
            - Bộ tài chính;<br>
            - Lưu: VT, QLGCS.
        </td>
        <td style="vertical-align: top;">
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i>
        </td>
    </tr>
</table>
</body>
</html>
