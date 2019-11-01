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
<p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">GIÁ CHO THUÊ MÔI TRƯỜNG RỪNG @if($inputs['district'] != 'all'){{$districts->diaban}}@endif</p>
@if($inputs['nam'] != 'all')
<p style="text-align: center;font-weight: bold;font-size: 16px">Năm {{$inputs['nam']}}</p>
@endif
@if($inputs['manhom'] != 'all')
    <p style="text-align: center;font-weight: bold;font-size: 16px">Loại rừng: {{$loairungs->tennhom}}</p>
@endif
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <thead>
    <tr>
        <th style="text-align: center" width="2%">STT</th>
        <th style="text-align: center">Thời điểm</th>
        <th style="text-align: center">Địa bàn</th>
        <th style="text-align: center">Loại rừng</th>
        <th style="text-align: center">Tên dự án</th>
        <th style="text-align: center" >Đơn giá</th>
        <th style="text-align: center" >Thông tin quyết định</th>
        <th style="text-align: center" >Ghi chú</th>
    </tr>
    </thead>
    <tbody>
    @if($model->count() != 0)
        @foreach($model as $key => $tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td><b>{{getDayVn($tt->thoidiem)}}</b></td>
                <td><b>{{$tt->diaban}}</b></td>
                <td style="text-align: left;"><b>{{$tt->tennhom}}</b></td>
                <td style="text-align: left" class="active">{{$tt->tenduan}}</td>
                <td style="text-align: center">{{dinhdangsothapphan($tt->dongia,2)}}</td>
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