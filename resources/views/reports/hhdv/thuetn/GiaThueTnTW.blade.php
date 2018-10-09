
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
            <b>SỞ TÀI CHÍNH TỈNH, THÀNH PHỐ</b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>THÔNG TIN VỀ GIÁ THUẾ TÀI NGUYÊN NĂM {{$thongtin['nam']}}</b>
        </td>
    </tr>

</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr height="40px">
        <th width="5%">STT</th>
        <th>Nhóm, loại tài nguyên</th>
        <th width="15%">Đơn vị tính</th>
        <th width="20%">Thuế suất</th>
    </tr>

    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
    </tr>
    @foreach($nhomtn as $key=>$tt)
        <!--Nhóm tài nguyên-->
        <tr style="font-weight: bold">
            <td>{{ConverToRoman($key+1)}}</td>
            <td style="text-align: left">{{$tt->tennhom}}</td>
            <td></td>
            <td></td>
        </tr>
        <!--Tài nguyên-->
        <?php $i=1; ?>
        <!--phần 1-->
        @foreach($model as $k=>$ct)
            @if($tt->manhom == $ct->manhom)
                <tr>
                    <td>{{$i++}}</td>
                    <td style="text-align: left">{{$ct->tenhh}}</td>
                    <td>{{$ct->dvt}}</td>
                    <td style="text-align: right">{{number_format($ct->giatn)}}</td>
                </tr>
                <!--phần chi tiết tạm thời làm 2 vòng foreach => nên nghiên cứu làm hàm đệ quy để cho danh mục có nhiều nhánh-->

            @endif
        @endforeach
    @endforeach
</table>
</body>
</html>
