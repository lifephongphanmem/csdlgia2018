
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    <title>{{$pageTitle}}</title>
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
<table cellspacing="0" cellpadding="0" border="0">
    <tr>
        <td style="text-align: center; text-transform: uppercase;" width="30%">
            <b>{{$modeldn->tendn}}</b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; ">
            <b>Độc lập - Tự do - Hạnh phúc</b>
        </td>
    </tr>
    </table>
<table cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>BẢNG ĐĂNG KÝ MỨC GIÁ BÁN CỤ THỂ</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Kèm theo công văn số {{$model->congvanso}} )
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: left; font-size: 14px;">
            Doanh nghiệp là đơn vị (sản xuất hay dịch vụ)
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: left; font-size: 14px;">
            Đăng ký giá (nhập khẩu, bán buôn, bán lẻ): {{$model->phanloaidkg}} cụ thể như sau:
        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Tên hàng <br> hóa, dịch <br> vụ</th>
        <th>Quy cách,<br>chất<br>lượng</th>
        <th>Đơn vị<br>tính</th>
        <th>Mức giá<br>đăng ký<br>hiện hành</th>
        <th>Mức giá<br>đăng ký<br>mới</th>
        <th>Mức<br>tăng/<br>giảm</th>
        <th>Tỷ lệ %<br>tăng/<br>giảm</th>
    </tr>
    @foreach($modelct as $key=>$ts)
        <tr>
            <th>{{$key + 1}}</th>
            <th style="text-align: left">{{$ts->tenhhdv}}</th>
            <th style="text-align: left">{{$ts->quycach}}</th>
            <th style="text-align: left">{{$ts->donvitinh}}</th>
            <th style="text-align: right">{{number_format($ts->mucgiahienhanh)}}</th>
            <th style="text-align: right">{{number_format($ts->mucgiamoi)}}</th>
            <th style="text-align: right">{{number_format($ts->mucgiamoi-$ts->mucgiahienhanh)}}</th>
            <th style="text-align: right">{{($ts->mucgiamoi/$ts->mucgiahienhanh)*100}}</th>
        </tr>
    @endforeach
</table>
<table>
    <tr>
        <td colspan="2" style="text-align: left; font-size: 14px;">
            Mức giá đăng ký này thực hiện từ ngày {{getDayVn($model->ngaythuchien)}}
        </td>
    </tr>
</table>

</body>
</html>
