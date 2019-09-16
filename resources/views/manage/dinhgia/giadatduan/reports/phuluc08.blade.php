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
            font-size: 16px;
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

<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="font-weight: bold;font-size: 16px;text-transform: uppercase">THÔNG TIN VỀ GIÁ ĐẤT CỤ THỂ CỦA DỰ ÁN TRÊN ĐỊA BÀN</td>
    </tr>
</table>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="text-align: center" rowspan="2">STT</th>
        <th style="text-align: center" rowspan="2">Tên dự án</th>
        <th style="text-align: center" rowspan="2">Xã/ phường</th>
        <th style="text-align: center" rowspan="2">Thời điểm<br> xác định</th>
        <th style="text-align: center" rowspan="2">Diện<br> tích <br>(m2)</th>
        <th style="text-align: center" rowspan="2">Số quyết định</th>
        <th style="text-align: center" colspan="4">Thông tin địa chính</th>
        <th style="text-align: center" colspan="6">Quyết định bảng giá đất của tỉnh</th>
        <th style="text-align: center" colspan="6">Quyết định phê duyệt giá đất của tỉnh</th>
        <th style="text-align: center" colspan="6">Tăng giảm (lần)</th>
    </tr>
    <tr>
        <th style="text-align: center">Loại đất</th>
        <th style="text-align: center">Tên đường</th>
        <th style="text-align: center">Loại đường,<br> khu vực</th>
        <th style="text-align: center">Vị trí</th>

        <th style="text-align: center">Đất ở</th>
        <th style="text-align: center">Đất TMDV</th>
        <th style="text-align: center">Đất SXKD</th>
        <th style="text-align: center">Đất NN<br>(trồng cây <br>lâu năm,<br> hàng năm)</th>
        <th style="text-align: center">Đất nuôi trổng thủy sản</th>
        <th style="text-align: center">Đất làm muối</th>

        <th style="text-align: center">Đất ở</th>
        <th style="text-align: center">Đất TMDV</th>
        <th style="text-align: center">Đất SXKD</th>
        <th style="text-align: center">Đất NN<br>(trồng cây <br>lâu năm,<br> hàng năm)</th>
        <th style="text-align: center">Đất nuôi trổng thủy sản</th>
        <th style="text-align: center">Đất làm muối</th>

        <th style="text-align: center">Đất ở</th>
        <th style="text-align: center">Đất TMDV</th>
        <th style="text-align: center">Đất SXKD</th>
        <th style="text-align: center">Đất NN<br>(trồng cây <br>lâu năm,<br> hàng năm)</th>
        <th style="text-align: center">Đất nuôi trổng thủy sản</th>
        <th style="text-align: center">Đất làm muối</th>
    </tr>
    <tr>
        <td style="text-align: center">1</td>
        <td style="text-align: center">2</td>
        <td style="text-align: center">3</td>
        <td style="text-align: center">4</td>
        <td style="text-align: center">5</td>
        <td style="text-align: center">6</td>
        <td style="text-align: center">7</td>
        <td style="text-align: center">8</td>
        <td style="text-align: center">9</td>
        <td style="text-align: center">10</td>
        <td style="text-align: center">11</td>
        <td style="text-align: center">12</td>
        <td style="text-align: center">13</td>
        <td style="text-align: center">14</td>
        <td style="text-align: center">15</td>
        <td style="text-align: center">16</td>
        <td style="text-align: center">17</td>
        <td style="text-align: center">18</td>
        <td style="text-align: center">19</td>
        <td style="text-align: center">20</td>
        <td style="text-align: center">21</td>
        <td style="text-align: center">22</td>
        <td style="text-align: center">23=17/11</td>
        <td style="text-align: center">24=18/12</td>
        <td style="text-align: center">25=19/13</td>
        <td style="text-align: center">26=20/14</td>
        <td style="text-align: center">27=21/15</td>
        <td style="text-align: center">28=22/16</td>
    </tr>
    @foreach($modeldm as $dm)
        <tr>
            <td style="text-align: center;font-weight: bold;">{{$dm->manhomduan}}</td>
            <td colspan="27" style="font-weight: bold;">{{$dm->tennhomduan}}</td>
        </tr>
        @foreach($modeldb as $gr2=>$db)
            <?php $modeltt = $model->where('manhomduan',$dm->manhomduan)
                            ->where('mahuyen',$db->district);
            ?>
            @if(count($modeltt)>0)
                <tr>
                    <td style="text-align: center;font-weight: bold;">{{IntToRoman($gr2+1)}}</td>
                    <td colspan="20" style="font-weight: bold;">{{$db->diaban}}</td>
                </tr>
                @foreach($modeltt as $gr3=>$tt)
                <tr>
                    <td style="text-align: center">{{$gr3+1}}</td>
                    <td style="text-align: left">{{$tt->tenduan}}</td>
                    <td style="text-align: left">{{$tt->tenxa}}</td>
                    <td style="text-align: center">{{getDayVn($tt->thoidiem)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->dientich,3)}}</td>
                    <td>{{$tt->soqd}}</td>
                    <td style="text-align: center">{{$tt->loaidat}}</td>
                    <td style="text-align: center">{{$tt->tenduong}}</td>
                    <td style="text-align: center">{{$tt->loaiduong}}</td>
                    <td style="text-align: center">{{$tt->vitri}}</td>

                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdgiadato,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdgiadattmdv,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdgiadatsxkd,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdgiadatnn,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdgiadatnuoits,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdgiadatmuoi,3)}}</td>

                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddato,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddattmdv,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatsxkd,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatnn,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatnuoits,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatmuoi,3)}}</td>

                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddato/$tt->qdgiadato,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddattmdv/$tt->qdgiadattmdv,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatsxkd/$tt->qdgiadatsxkd,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatnn/$tt->qdgiadatnn,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatnuoits/$tt->qdgiadatnuoits,3)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->qdpddatmuoi/$tt->qdgiadatmuoi,3)}}</td>
                </tr>
                @endforeach
            @endif
        @endforeach
    @endforeach
</table>