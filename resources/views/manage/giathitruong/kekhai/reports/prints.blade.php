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
    </style>
</head>
<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%">
            <span style="text-transform: uppercase">{{$modeldv->tendvcqhienthi}}</span><br>
            <span style="text-transform: uppercase;font-weight: bold">{{$modeldv->tendvhienthi}}</span><br>
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

<p style="text-align: center; font-weight: bold; font-size: 20px;">BÁO CÁO GIÁ THỊ TRƯỜNG THÁNG {{$model->thang}} NĂM {{$model->nam}}</p>
<p style="text-align: center; font-size: 16px;font-style: italic">(Đính kèm báo cáo số {{$model->sobc}}, ngày {{getDayVn($model->ngaybc)}} của {{$modeldv->tendv}})</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <thead>
    <thead>
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Mã<br> hàng hóa</th>
        <th style="text-align: center">Tên hàng hóa dịch vụ</th>
        <th style="text-align: center">Đặc điểm kỹ thuật</th>
        <th style="text-align: center">Đơn <br>vị<br> tính</th>
        <th style="text-align: center">Loại giá</th>
        <th style="text-align: center">Giá</th>
        <th style="text-align: center">Nguồn thông tin</th>
        <th style="text-align: center">Ghi chú</th>
    </tr>
    <tr>
        <th>(1)</th>
        <th>(2)</th>
        <th>(3)</th>
        <th>(4)</th>
        <th>(5)</th>
        <th>(6)</th>
        <th>(7)</th>
        <th>(8)</th>
        <th>(9)</th>
    </tr>
    </thead>
    <tbody id="ttts">
    @foreach($modelgr as $sttgr=>$gr)
    <tr>
        <td>{{romanNumerals($sttgr + 1)}}</td>
        <td style="text-align: center">{{$gr->manhom}}</td>
        <td colspan="7" style="font-weight: bold">{{$gr->tennhom}}</td>
    </tr>
        @if($ttct = $modelct->where('manhom',$gr->manhom))@endif
        @foreach($ttct as $key=>$tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td style="text-align: center">{{$tt->mahh}}</td>
                <td class="active" style="font-weight: bold">{{$tt->tenhh}}</td>
                <td>{{$tt->dacdiemkt}}</td>
                <td style="text-align: center">{{$tt->dvt}}</td>
                <td style="text-align: center">{{$tt->loaigia}}</td>
                <td style="text-align: right;font-weight: bold">{{number_format($tt->dongia)}}</td>
                <td>{{$tt->nguontt}}</td>
                <td>{{$tt->ghichu}}</td>
            </tr>
        @endforeach
    @endforeach


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
</body>
</html>