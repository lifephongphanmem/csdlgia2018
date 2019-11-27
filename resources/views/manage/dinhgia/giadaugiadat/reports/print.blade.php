@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="vertical-align: top;">
            <span style="text-transform: uppercase">{{$inputs['dvcaptren']}}</span><br>
            <span style="text-transform: uppercase;font-weight: bold">{{$inputs['dv']}}</span>
            <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

        </td>
        <td style="vertical-align: top;">
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b>
            <hr style="width: 15%;vertical-align: top; margin-top: 2px">

        </td>
    </tr>
    <tr>
        <td>Số: ..............</td>
        <td style="text-align: right"><i style="margin-right: 25%;">{{$inputs['diadanh']}}, ngày .... tháng .... năm ....</i></td>
    </tr>
</table>
<p style="font-weight: bold;font-size: 16px;text-transform: uppercase;text-align: center">THÔNG TIN VỀ GIÁ ĐẤU GIÁ ĐẤT</p>

<table width="96%" cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <tr>
        <th style="text-align: center;width: 1%" rowspan="2" >STT</th>
        <th style="text-align: center" rowspan="2">Tên dự án</th>
        <th style="text-align: center; width: 5%" rowspan="2">Xã/ phường</th>
        <th style="text-align: center" rowspan="2">Thời điểm<br> xác định</th>
        <th style="text-align: center" rowspan="2">Diện<br> tích <br>(m2)</th>
        <th style="text-align: center" rowspan="2">Số quyết định phương án đấu giá</th>
        <th style="text-align: center" rowspan="2">Số quyết định đấu giá</th>
        <th style="text-align: center" rowspan="2">Số quyết định phê duyệt giá khởi điểm</th>
        <th style="text-align: center" rowspan="2">Số quyết định công nhận kết quả trúng đấu giá</th>
        <th style="text-align: center" colspan="4">Thông tin địa chính</th>
        <th style="text-align: center" colspan="6">Quyết định bảng giá đất của tỉnh</th>
        <th style="text-align: center" colspan="6">Quyết định phê duyệt giá khởi điểm đất của tỉnh</th>
        <th style="text-align: center" colspan="6">Kết quả trúng đấu giá</th>
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
        <th style="text-align: center">1</th>
        <th style="text-align: center">2</th>
        <th style="text-align: center">3</th>
        <th style="text-align: center">4</th>
        <th style="text-align: center">5</th>
        <th style="text-align: center">6</th>
        <th style="text-align: center">7</th>
        <th style="text-align: center">8</th>
        <th style="text-align: center">9</th>
        <th style="text-align: center">10</th>
        <th style="text-align: center">11</th>
        <th style="text-align: center">12</th>
        <th style="text-align: center">13</th>
        <th style="text-align: center">14</th>
        <th style="text-align: center">15</th>
        <th style="text-align: center">16</th>
        <th style="text-align: center">17</th>
        <th style="text-align: center">18</th>
        <th style="text-align: center">19</th>
        <th style="text-align: center">20</th>
        <th style="text-align: center">21</th>
        <th style="text-align: center">22</th>
        <th style="text-align: center">23</th>
        <th style="text-align: center">24</th>
        <th style="text-align: center">25</th>
        <th style="text-align: center">26</th>
        <th style="text-align: center">27</th>
        <th style="text-align: center">28</th>
        <th style="text-align: center">29</th>
        <th style="text-align: center">30</th>
        <th style="text-align: center">31</th>
    </tr>
    @foreach($huyens as $gr1=>$huyen)
        <tr>
            <td style="text-align: center;font-weight: bold;text-transform: uppercase">{{toAlpha($gr1+1)}}</td>
            <td colspan="30" style="font-weight: bold;">{{$huyen->diaban}}</td>
        </tr>
        <?php
            $model = $model->where('mahuyen',$huyen->district);
        ?>

        @foreach($model as $gr2=>$tt)
            <?php
            $modeltt = $modelct->where('mahs',$tt->mahs);
            ?>
        <tr style="font-weight: bold;font-style: italic;">
            <td>{{IntToRoman($gr2+1)}}</td>
            <td style="text-align: left">{{$tt->tenduan}}</td>
            <td style="text-align: left">{{$tt->tenxa}}</td>
            <td>{{getDayVn($tt->thoidiem)}}</td>
            <td style="text-align: right">{{dinhdangsothapphan($modeltt->sum('dientich'),3)}}</td>
            <td>{{$tt->soqdpagia}}</td>
            <td>{{$tt->soqddaugia}}</td>
            <td>{{$tt->soqdgiakhoidiem}}</td>
            <td>{{$tt->soqdkqdaugia}}</td>
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
            <td></td>
        </tr>

            @foreach($modeltt as $gr3=>$ct)
            <tr>
                <td>{{$gr3+1}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: right">{{dinhdangsothapphan($ct->dientich,5)}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

                <td style="text-align: left;font-size: 12px">{{$ct->loaidat}}</td>
                <td style="text-align: left;font-size: 12px">{{$ct->tenduong}}</td>
                <td style="text-align: left;font-size: 12px">{{$ct->loaiduong}}</td>
                <td style="text-align: left;font-size: 12px">{{$ct->vitri}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdgiadato,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdgiadattmdv,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdgiadatsxkd,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdgiadatnn,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdgiadatnuoits,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdgiadatmuoi,3)}}</td>

                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdpddato,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdpddattmdv,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdpddatsxkd,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdpddatnn,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdpddatnuoits,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->qdpddatmuoi,3)}}</td>

                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->kqdgdato,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->kqdgdattmdv,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->kqdgdatsxkd,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->kqdgdatnn,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->kqdgdatnuoits,3)}}</td>
                <td style="text-align: right;font-size: 12px">{{dinhdangsothapphan($ct->kqdgdatmuoi,3)}}</td>
            </tr>
            @endforeach
        @endforeach
    @endforeach
</table>
<table width="96%" border="0" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
    <tr>
        <td width="40%" style="text-align: left; vertical-align: top;">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - UBND tỉnh;<br>
            - Bộ tài chính;<br>
            - Lưu: VT, QLGCS.
        </td>
        <td style="vertical-align: top;">
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i>
        </td>
    </tr>
</table>
@stop