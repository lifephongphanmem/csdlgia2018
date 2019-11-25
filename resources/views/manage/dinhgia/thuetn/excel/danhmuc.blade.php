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
            <th colspan="9" style="text-align: center; font-weight: bold; font-size: 20px;">
                {{$model_nhom->tennhom}}
            </th>
        </tr>
    </table>
    <table>
        <tr>
            <td>Level</td>
            <td>Mã nhóm loại tài nguyên cấp I</td>
            <td>Mã nhóm loại tài nguyên cấp II</td>
            <td>Mã nhóm loại tài nguyên cấp III</td>
            <td>Mã nhóm loại tài nguyên cấp IV</td>
            <td>Mã nhóm loại tài nguyên cấp V</td>
            <td>Tên nhóm loại tài nguyên </td>
            <td>Đơn vị tính</td>
            <td>Đơn giá</td>
        </tr>
        @foreach($model as $ct)
            <tr>
                <td>{{$ct->level}}</td>
                <td>{{$ct->cap1}}</td>
                <td>{{$ct->cap2}}</td>
                <td>{{$ct->cap3}}</td>
                <td>{{$ct->cap4}}</td>
                <td>{{$ct->cap5}}</td>
                <td>{{$ct->ten}}</td>
                <td>{{$ct->dvt}}</td>
                <td>{{$ct->gia}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>