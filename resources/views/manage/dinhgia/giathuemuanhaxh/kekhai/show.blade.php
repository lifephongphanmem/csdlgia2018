
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
            <b></b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>BẢNG GIÁ TỐI THIỂU TÍNH THUẾ TRUỚC BẠ <br>
                TRÊN ĐỊA BẠN TỈNH</b>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 14px;">
            (Ban hành kèm theo Quyết định số ..{{$model->soqd}}..)
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right; font-size: 14px;">
            <i>Đơn vị tính: Đồng</i>
        </td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Nhãn hiệu</th>
        <th width="40%">Tên hiệu</th>
        <th>Dung tích</th>
        <th>Giá tính<br> lệ phí trước bạ</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
    </tr>
    @foreach($modelgr as $gr)
    <tr style=" font-size: 15px; line-height: 15px;">
        <td colspan="5" style="font-weight: bold; text-align: left"> &emsp;{{$gr->nhomxe}}</td>
    </tr>
        @foreach($modelct as $key => $value)
            @if($value->nhomxe == $gr->nhomxe)
            <tr>
                <td style="text-align: center">{{$key + 1}}</td>
                <td>{{$value->nhanhieu}}</td>
                <td>{{$value->tentm}}</td>
                <td style="text-align: center">{{$value->ttlv}}</td>
                <td style="text-align: right;font-weight: bold">{{number_format($value->giatinhlptb)}}</td>

            </tr>
            @endif
        @endforeach
    @endforeach
</table>
</body>
</html>
