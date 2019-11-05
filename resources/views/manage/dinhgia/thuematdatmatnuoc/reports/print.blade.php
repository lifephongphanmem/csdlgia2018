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
            font-size: 16px;
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
<p style="font-weight: bold;font-size: 16px;text-transform: uppercase;text-align: center">THÔNG TIN VỀ CHO THUÊ ĐẤT, MẶT NƯỚC</p>

<table width="96%" cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="text-align: center;width: 1%" rowspan="2" >STT</th>
        <th style="text-align: center" >Số quyết định</th>
        <th style="text-align: center">Ngày áp dụng</th>
        <th style="text-align: center">Vị trí</th>
        <th style="text-align: center">Mô tả</th>
        <th style="text-align: center">Diện tích</th>
        <th style="text-align: center">Giá tiền</th>
        <th style="text-align: center">Ghi chú</th>
    </tr>

    <tr>
        <th style="text-align: center">1</th>
        <th style="text-align: center">2</th>
        <th style="text-align: center">3</th>
        <th style="text-align: center">4</th>
        <th style="text-align: center">5</th>
        <th style="text-align: center">6</th>
        <th style="text-align: center">7</th>

    </tr>
    @foreach($huyens as $gr1=>$huyen)
        <?php
            $model = $model->where('district',$huyen->district);
            if (count($model) == 0) continue;
        ?>

        <tr>
            <td style="text-align: center;font-weight: bold;text-transform: uppercase">{{toAlpha($gr1+1)}}</td>
            <td colspan="30" style="font-weight: bold;">{{$huyen->diaban}}</td>
        </tr>

        @foreach($model as $gr2=>$tt)
            <tr style="font-weight: bold;font-style: italic;">
                <td>{{IntToRoman($gr2+1)}}</td>
                <td>{{$tt->soqd}}</td>
                <td>{{getDayVn($tt->ngayapdung)}}</td>
                <td>{{$tt->vitri}}</td>
                <td>{{$tt->mota}}</td>
                <td style="text-align: right">{{dinhdangso($tt->dientich)}}</td>
                <td style="text-align: right">{{dinhdangso($tt->dongia)}}</td>
                <td></td>
            </tr>
        @endforeach
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