
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
            <b>@if(session('admin')->level == 'T')
                    {{getGeneralConfigs()['donvi']}}
                @else
                    {{session('admin')->name}}
                @endif
            </b><br>
            --------<br>
        </td>
        <td style="text-align: left;" width="70%">

        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px;">
            <b>BÁO CÁO TỔNG HỢP CÔNG BỐ GIÁ VẬT LIỆU VÀ CÔNG BỐ GIÁ BỔ XUNG</b>
            <br>
            <br>
            Từ ngày: {{getDayVn($dk['ngaytu'])}} - Đến ngày {{getDayVn($dk['ngayden'])}}
            @if(session('admin')->level == 'T')
                @if($donvi != 'all')
                    <br>Đơn vị: {{$donvi->ten}}
                @endif
            @endif
        </td>
    </tr>

</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Thời gian</th>
        <th>Tổng số hồ sơ</th>
        <th>Tổng giá trị đề nghị</th>
        <th>Tổng giá trị thực hiện công bố</th>
        <th>Tổng giá trị không thực hiện công bố</th>
        <th>Tổng giá trị sau công bố</th>
        <th>Chênh lệch</th>
        <th>Tỷ lệ<br>%</th>
    </tr>
    <tr style="font-style: italic; font-size: 10px; line-height: 15px;">
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
        <th>5</th>
        <th>6</th>
        <th>7</th>
        <th>8</th>
        <th>9</th>
    </tr>
    @if(count($model))
    @foreach($arraynam as $key=>$nam)
        <tr>
            <td colspan="2"></td>
            <td colspan="7" style="text-align: left"><b>Năm {{$nam}}</b></td>
        </tr>
        @foreach($arrayquy as $key=>$quy)
            <tr>
                <td></td>
                <td colspan="8" style="text-align: left"><b>Quý {{$quy}}</b></td>
            </tr>
            @foreach($model as $key=>$ts)
                @if($nam == $ts->nam && $quy == $ts->quy)
                <tr>
                    <th>{{$key+1}}</th>
                    <th>{{'Tháng '. $ts->thang}}</th>
                    <th style="text-align: right">{{number_format($ts->counths)}}</th>
                    <th style="text-align: right">{{number_format($ts->giadenghi)}}</th>
                    <th style="text-align: right">{{number_format($ts->giaththamdinh)}}</th>
                    <th style="text-align: right">{{number_format($ts->giakththamdinh)}}</th>
                    <th style="text-align: right">{{number_format($ts->giatritstd)}}</th>
                    <th>{{number_format($ts->chenhlech)}}</th>
                    <th>{{$ts->phantram}}</th>
                </tr>
                @endif
            @endforeach
        @endforeach
    @endforeach
    @else
        <tr>
            <th colspan="9">Không có hồ sơ công bố</th>
        </tr>
    @endif
</table>
</body>
</html>
