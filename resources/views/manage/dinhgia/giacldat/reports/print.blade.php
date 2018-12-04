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
        span {
            text-transform: uppercase;
            font-weight: bold;
        }
        @media print {
            .in{
                display: none !important;
            }
        }
    </style>
</head>

<div class="in" style="margin-left: 20px;">
    <input type="submit" onclick=" window.print()" value="In kê khai"  />
</div>

<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b></b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>
<p style="text-align: center;font-weight: bold;font-size: 20px;text-transform: uppercase;"></p>
<p style="text-align: center;font-weight: bold;font-size: 20px;text-transform: uppercase;">Địa bàn: {{ $model_diaban->diaban}}</p>


<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="text-align: center">Vị trí đất</th>
        <th style="text-align: center" width="10%">Căn cứ quyết định</th>
        <th style="text-align: center" width="10%">Giá đất</th>
    </tr>
    <?php $model_cap1 = $model->where('capdo','1'); ?>
    @foreach($model_cap1 as $lv1=>$cap1)
        <tr>
            <td style="text-align: left;font-weight: bold;text-transform: uppercase;">{{toAlpha($lv1++) .'.' .$cap1->vitri}}</td>
            <td>{{$cap1->soqd}}</td>
            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap1->giadat)}}</td>
        </tr>
        <?php $model_cap2 = $model->where('magoc',$cap1->maso);
        $lv2=0;
        ?>

        @foreach($model_cap2 as $cap2)
            <tr>
                <td style="text-align: left;font-weight: bold">&nbsp;{{romanNumerals($lv2+1) .'. ' .$cap2->vitri}}</td>
                <td>{{$cap2->soqd}}</td>
                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->giadat)}}</td>
            </tr>
            <?php $model_cap3 = $model->where('magoc',$cap2->maso);
            $lv3=0;
            ?>
            @foreach($model_cap3 as $cap3)
                <tr>
                    <td style="text-align: left;font-style: oblique;font-weight: bold">&nbsp;&nbsp;{{toAlpha($lv3++) .'. ' .$cap3->vitri}}</td>
                    <td>{{$cap3->soqd}}</td>
                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap3->giadat)}}</td>
                </tr>
                <?php $model_cap4 = $model->where('magoc',$cap3->maso); ?>
                @foreach($model_cap4 as $cap4)
                    <tr>
                        <td style="text-align: left;font-style: italic">&nbsp;&nbsp;&nbsp;- {{$cap4->vitri}}</td>
                        <td>{{$cap4->soquyetdinh}}</td>
                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->giadat)}}</td>
                    </tr>
                    <?php $model_cap5 = $model->where('magoc',$cap4->maso); ?>
                    @foreach($model_cap5 as $cap5)
                        <tr>
                            <td style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;+ {{$cap5->vitri}}</td>
                            <td>{{$cap5->soqd}}</td>
                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap5->giadat)}}</td>
                        </tr>
                        <?php $model_cap6 = $model->where('magoc',$cap5->maso); ?>
                        @foreach($model_cap6 as $cap6)
                            <tr>
                                <td style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i. {{$cap6->vitri}}</td>
                                <td>{{$cap6->soqd}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap6->giadat)}}</td>
                            </tr>
                            <?php $model_cap7 = $model->where('magoc',$cap6->maso); ?>
                            @foreach($model_cap7 as $cap7)
                                <tr>
                                    <td style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii. {{$cap7->vitri}}</td>
                                    <td>{{$cap7->soqd}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap7->giadat)}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
    @endforeach
</table>
<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align: center;">
    <tr>
        <td></td>
        <td style="text-align: center;text-transform: uppercase; " width="60%">
            <b></b><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <b style="text-transform: uppercase;"></b>
        </td>
    </tr>
</table>