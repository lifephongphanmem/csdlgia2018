
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

<table cellspacing="0" cellpadding="0" border="0" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <td colspan="2" style="text-align: center; font-size: 16px; text-transform: uppercase;">
            <b>Mặt hàng {{$mh}} - {{$nam}}</b>
        </td>
    </tr>

</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th rowspan="2">STT</th>
        <th rowspan="2">Tên đơn vị - mặt hàng</th>
        <th rowspan="2">T12/{{$nam-1}}</th>
        <th @if(count($a_t1) == 0) style='display: none' @endif colspan="{{count($a_t1)}}">Tháng 1/{{$nam}}</th>
        <th @if(count($a_t2) ==0) style='display: none' @endif colspan="{{count($a_t2)}}">Tháng 2/{{$nam}}</th>
        <th @if(count($a_t3) ==0) style='display: none' @endif colspan="{{count($a_t3)}}">Tháng 3/{{$nam}}</th>
        <th @if(count($a_t4) ==0) style='display: none' @endif colspan="{{count($a_t4)}}">Tháng 4/{{$nam}}</th>
        <th @if(count($a_t5) ==0) style='display: none' @endif colspan="{{count($a_t5)}}">Tháng 5/{{$nam}}</th>
        <th @if(count($a_t6) ==0) style='display: none' @endif colspan="{{count($a_t6)}}">Tháng 6/{{$nam}}</th>
        <th @if(count($a_t7) ==0) style='display: none' @endif colspan="{{count($a_t7)}}">Tháng 7/{{$nam}}</th>
        <th @if(count($a_t8) ==0) style='display: none' @endif colspan="{{count($a_t8)}}">Tháng 8/{{$nam}}</th>
        <th @if(count($a_t9) ==0) style='display: none' @endif colspan="{{count($a_t9)}}">Tháng 9/{{$nam}}</th>
        <th @if(count($a_t10) ==0) style='display: none' @endif colspan="{{count($a_t10)}}">Tháng 10/{{$nam}}</th>
        <th @if(count($a_t11) ==0) style='display: none' @endif colspan="{{count($a_t11)}}">Tháng 11/{{$nam}}</th>
        <th @if(count($a_t12) ==0) style='display: none' @endif colspan="{{count($a_t12)}}">Tháng 12/{{$nam}}</th>
    </tr>
    <tr>
        @foreach($a_t1 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t2 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t3 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t4 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t5 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t6 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t7 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t8 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t9 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t10 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t11 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
        @foreach($a_t12 as $key=>$val)
            <th>{!!$val!!}</th>
        @endforeach
    </tr>
    <?php $i=1;
        $col = count($a_t1)+count($a_t2)+count($a_t3)+count($a_t4)+count($a_t5)+count($a_t6)+count($a_t7)+count($a_t8)+count($a_t9)+count($a_t10)+count($a_t11)+count($a_t12)
    ?>
    @foreach($donvi as $dv)
        <tr style="font-weight: bold; font-style: italic">
            <td style="text-align: center;">{{$i++}}</td>
            <td colspan="{{$col +2}}" style="text-align: left;" >{{$dv->tendn}}</td>
        </tr>
        <?php
        $stt=1;
        $chitiet = $model->where('maxa',$dv->maxa);
        $dkg = $m_dkg->where('maxa',$dv->maxa);
        ?>
        @foreach($chitiet as $ct)
            <?php
            $dkgct =array_column($dkg->where('tenhhdv',$ct->tenhhdv)->toarray(),'mucgiamoi','ngaythuchien');
            ?>
            <tr class="money">
                <td style="text-align: right">-</td>
                <td style="text-align: left">{{$ct->tenhhdv}}</td>
                <td>{{dinhdangso($ct->t12)}}</td>
                @foreach($a_t1 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t2 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t3 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t4 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t5 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t6 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t7 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t8 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t9 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t10 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t11 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
                @foreach($a_t12 as $val)
                    <td style="text-align: right">{{dinhdangso($dkgct[$val])}}</td>
                @endforeach
            </tr>
        @endforeach
    @endforeach
</table>
</body>
</html>
