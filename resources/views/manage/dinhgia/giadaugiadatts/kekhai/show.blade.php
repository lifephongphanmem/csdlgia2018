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
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%">
            <span style="text-transform: uppercase">{{$inputs['dvcaptren']}}</span><br>
            <span style="text-transform: uppercase;font-weight: bold">{{$inputs['dv']}}</span><br>
            <hr style="width: 10%"> <br>
            Số: ..............
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b><br>
            <hr style="width: 15%"><br>
            <i>{{$inputs['diadanh']}}, ngày .... tháng .... năm ....</i>
        </td>
    </tr>
</table>
<p style="font-weight: bold;font-size: 16px;text-transform: uppercase;text-align: center">THÔNG TIN VỀ GIÁ ĐẤU GIÁ ĐẤT VÀ TÀI SẢN GẮN LIỀN ĐẤT</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="text-align: center" rowspan="2">Tên dự án</th>
        <th style="text-align: center" rowspan="2">Xã/ phường</th>
        <th style="text-align: center" rowspan="2">Thời điểm<br> xác định</th>
        <th style="text-align: center" rowspan="2">Diện<br> tích <br>đất<br>(m2)</th>
        <th style="text-align: center" rowspan="2">Diện<br> tích <br>sàn xây dựng<br>(m2)</th>
        <th style="text-align: center" rowspan="2">Số quyết định phương án đấu giá</th>
        <th style="text-align: center" rowspan="2">Số quyết định đấu giá</th>
        <th style="text-align: center" rowspan="2">Số quyết định phê duyệt giá khởi điểm</th>
        <th style="text-align: center" rowspan="2">Số quyết định công nhận kết quả trúng đấu giá</th>
        <th style="text-align: center" colspan="4">Thông tin địa chính</th>
        <th style="text-align: center" colspan="6">Quyết định bảng giá đất của tỉnh</th>
        <th style="text-align: center" colspan="7">Quyết định phê duyệt giá đất của tỉnh</th>
        <th style="text-align: center" colspan="3">Kết quả trúng đấu giá đất</th>
        <th style="text-align: center" rowspan="2">Ghi chú</th>
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
        <th style="text-align: center">Giá tài sản trên đất</th>

        <th style="text-align: center">Giá đấu giá đất</th>
        <th style="text-align: center">Giá đấu giá tài sản</th>
        <th style="text-align: center">Giá đấu giá đất và tài sản</th>


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
        <td style="text-align: center">23</td>
        <td style="text-align: center">24</td>
        <td style="text-align: center">25</td>
        <td style="text-align: center">26</td>
        <td style="text-align: center">27</td>
        <td style="text-align: center">28</td>
        <td style="text-align: center">29</td>
        <td style="text-align: center">30</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;"></td>
        <td colspan="29" style="font-weight: bold;">{{$modeldb->diaban}}</td>
    </tr>
    <tr>
        <td style="text-align: left">{{$model->tenduan}}</td>
        <td style="text-align: left">{{$modelxa->diaban}}</td>
        <td>{{getDayVn($model->thoidiem)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($model->dientichdat,3)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($model->dientichsanxd,3)}}</td>
        <td>{{$model->soqdpagia}}</td>
        <td>{{$model->soqddaugia}}</td>
        <td>{{$model->soqdgiakhoidiem}}</td>
        <td>{{$model->soqdkqdaugia}}</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    @foreach($modelct as $tt)
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            <td style="text-align: left">{{$tt->loaidat}}</td>
            <td style="text-align: left">{{$tt->tenduong}}</td>
            <td style="text-align: left">{{$tt->loaiduong}}</td>
            <td style="text-align: left">{{$tt->vitri}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdgiadato,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdgiadattmdv,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdgiadatsxkd,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdgiadatnn,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdgiadatnuoits,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdgiadatmuoi,3)}}</td>

            <td style="text-align: right">{{dinhdangsothapphan($tt->qdpddato,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdpddattmdv,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdpddatsxkd,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdpddatnn,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdpddatnuoits,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdpddatmuoi,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->qdpdgiatstd,3)}}</td>

            <td style="text-align: right">{{dinhdangsothapphan($tt->kqgiadaugiadat,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->kqgiadaugiats,3)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($tt->kqgiadaugiadatts,3)}}</td>
            <td style="text-align: right">{{$tt->ghichu}}</td>
        </tr>
    @endforeach
</table>