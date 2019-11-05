
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    <style type="text/css">
        body {
            font: normal 12px/16px time, serif;
        }

        table, p {
            width: 98%;
            margin: auto;
        }

        table tr td:first-child {
            text-align: center;
        }

        td, th {
            padding: 2px;
        }
    </style>
</head>
<body>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
<tr>
    <td width="40%" style="text-transform: uppercase;">
        <b>{{$model->dvcq}}</b><br>
        {{$model->dvbc}}<br>
        --------<br>
    </td>
    <td>
        <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
        <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
    </td>
</tr>
<tr>
    <td>Số: {{$model->sobc}}</td>
    <td>
        <i>{{$model->diadanh}}, ngày..{{ date("d",strtotime($model->ngaybc))}}..tháng..{{ date("m",strtotime($model->ngaybc))}}..năm..{{ date("Y",strtotime($model->ngaybc))}}..</i>
    </td>
</tr>
</table>
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
<p style="text-align: center; font-weight: bold;font-size: 20px"> <b>CÔNG BỐ</b></p>
<bR>
<p style="text-align: center; font-weight: bold;font-size: 20px">Giá gốc vật liệu xây dựng {{$model->tendiaban}}</p>
<br>
<p style="text-align: center;font-size: 16px; font-weight: bold" ><u>Thời điểm: Quý {{romanNumerals($model->quy)}} / {{$model->nam}}</u></p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <p style="padding-left: 50px;font-weight: bold">Bảng giá gốc vật liệu xây dựng Quý {{romanNumerals($model->quy)}} / {{$model->nam}}</p>
    <thead>
    <tr height="40px">
        <th style="text-align: center" width="2%">STT</th>
        <th style="text-align: center">Tên vật liệu - quy cách</th>
        <th style="text-align: center">ĐVT</th>
        <th style="text-align: center">Giá vật liệu <br>gốc (đ)</th>
        <th style="text-align: center">Tiêu chuẩn, Quy<br> chuẩn áp dụng</th>
        <th style="text-align: center">Ghi chú</th>
    </tr>
    </thead>
    <tbody>
    @foreach($diabans as $diaban)
        <tr>
            <td></td>
            <td colspan="5" style="text-align: left; font-weight: bold" >{{$diaban->diaban}}</td>
        </tr>
        <?php $modelctv = $modelct->where('district',$diaban->district);
            ?>
        @foreach($modelctv as $key=>$tt)
            <tr>
                <td style="text-align: center">{{($key +1)}}</td>
                <td class="active">{{$tt->tenhhdv}} - {{$tt->qccl}}</td>
                <td style="text-align: center">{{$tt->dvt}}</td>
                <td style="text-align: right;font-weight: bold">{{number_format($tt->giagoc)}}</td>
                <td style="text-align: left">{{$tt->qcad}}</td>
                <td style="text-align: left">{{$tt->ghichu}}</td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
</body>
</html>
