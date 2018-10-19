
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
            <b>GIÁ {{$tennhom}}<br></b>
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
        <th width="2%">STT</th>
        <th>Mã dịch vụ</th>
        <th>Các loại dịch vụ</th>
        <th>Đơn vị tính</th>
        <th>Đơn giá</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
    </tr>
        <?php
            $modelct1 = $modelct->where('capdo','1');
            $i = 1;
        ?>

    @foreach($modelct1 as $c1 => $vlcap1)
        <tr>
            <td style="text-align: center">{{$i++}}</td>
            <td>{{$vlcap1->madv}}</td>
            <td>{{$vlcap1->tendichvu}}</td>
            <td style="text-align: center">{{$vlcap1->dvt}}</td>
            <td style="text-align: right;font-weight: bold">{{$vlcap1->dvt != '' ? number_format($vlcap1->giadv) : ''}}</td>

        </tr>
        <?php
            $modelct2 = $modelct->where('capdo','2')->where('magoc',$vlcap1->madv);
            $j =1;
        ?>
        @foreach($modelct2 as $vlcap2)
            <tr>
                <td>{{($i-1).'.'.($j++)}}</td>
                <td>{{$vlcap2->madv}}</td>
                <td>&nbsp;{{$vlcap2->tendichvu}}</td>
                <td style="text-align: center">{{$vlcap2->dvt}}</td>
                <td style="text-align: right;font-weight: bold">{{$vlcap2->dvt != '' ? number_format($vlcap2->giadv) : ''}}</td>

            </tr>
            <?php
            $modelct3 = $modelct->where('capdo','3')->where('magoc',$vlcap2->madv);
            ?>
            @foreach($modelct3 as $vlcap3)
                <tr>
                    <td></td>
                    <td>{{$vlcap3->madv}}</td>
                    <td>&ensp;{{$vlcap3->tendichvu}}</td>
                    <td style="text-align: center">{{$vlcap3->dvt}}</td>
                    <td style="text-align: right;font-weight: bold">{{$vlcap3->dvt != '' ? number_format($vlcap2->giadv) : ''}}</td>

                </tr>
            @endforeach
        @endforeach
    @endforeach
</table>
</body>
</html>
