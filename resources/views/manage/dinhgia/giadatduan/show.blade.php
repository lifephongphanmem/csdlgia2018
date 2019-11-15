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
<p style="font-weight: bold;text-transform: uppercase;text-align: center">THÔNG TIN VỀ GIÁ ĐẤT CỤ THỂ CỦA DỰ ÁN</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
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
    <tr style="font-weight: bold">
        <td style="text-align: center">{{$model->manhomduan}}</td>
        <td colspan="27">{{$model->tennhomduan}}</td>
    </tr>
    <tr style="font-weight: bold">
        <td colspan="28">{{$huyen->diaban}}</td>
    </tr>
    <tr>
        <td style="text-align: center">1</td>
        <td style="text-align: left">{{$model->tenduan}}</td>
        <td style="text-align: left">{{$xa->diaban}}</td>
        <td style="text-align: center">{{getDayVn($model->thoidiem)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->dientich,3)}}</td>
        <td>{{$model->soqd}}</td>
        <td style="text-align: center">{{$model->loaidat}}</td>
        <td style="text-align: center">{{$model->tenduong}}</td>
        <td style="text-align: center">{{$model->loaiduong}}</td>
        <td style="text-align: center">{{$model->vitri}}</td>

        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdgiadato,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdgiadattmdv,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdgiadatsxkd,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdgiadatnn,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdgiadatnuoits,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdgiadatmuoi,3)}}</td>

        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddato,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddattmdv,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatsxkd,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatnn,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatnuoits,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatmuoi,3)}}</td>

        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddato/$model->qdgiadato,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddattmdv/$model->qdgiadattmdv,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatsxkd/$model->qdgiadatsxkd,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatnn/$model->qdgiadatnn,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatnuoits/$model->qdgiadatnuoits,3)}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($model->qdpddatmuoi/$model->qdgiadatmuoi,3)}}</td>
    </tr>
</table>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-align: left">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - UBND tỉnh;<br>
            - Bộ tài chính;<br>
            - Lưu: VT, QLGCS.
        </td>
        <td>
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i><br><br><br><br><br><br><br>
        </td>
    </tr>
</table>
@stop