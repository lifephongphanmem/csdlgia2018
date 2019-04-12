<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>

    <style type="text/css">
        body {
            font: normal 12px/14px time, serif;
        }

        tr > td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th colspan="8" style="text-align: center; font-weight: bold; font-size: 20px;">
                {{$model_nhom->tennhom}} - Mã nhóm : {{$model_nhom->manhom}}
            </th>
        </tr>
    </table>

    <table>
        <tr>
            <td>Mã hàng hóa</td>
            <td>Tên hàng hóa</td>
            <td>Đặc điểm kỹ thuật</td>
            <td>Xuất xứ</td>
            <td>Đơn vị tính</td>
            <td>Đơn giá</td>
            <td>Ghi chú</td>
        </tr>

            @foreach($model as $key=> $tt)
                <tr>
                    <td>{{$tt->mahanghoa}}</td>
                    <td>{{$tt->tenhanghoa}}</td>
                    <td>{{$tt->thongsokt}}</td>
                    <td>{{$tt->xuatxu}}</td>
                    <td>{{$tt->dvt}}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
    </table>
</body>
</html>