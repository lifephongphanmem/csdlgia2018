@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
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
<p style="font-weight: bold;font-size: 16px;text-transform: uppercase;text-align: center">THÔNG TIN VỀ GIÁ ĐẤT THEO PHÂN LOẠI</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <tr>
        <th style="text-align: center" >Tên phân loại</th>
        <th style="text-align: center" >Xã/ phường</th>
        <th style="text-align: center" >Số quyết định</th>
        <th style="text-align: center">Thời điểm<br> xác định</th>
        <th style="text-align: center">Vị trí đất</th>
        <th style="text-align: center">Giá tiền</th>
        <th style="text-align: center">Ghi chú</th>
    </tr>

    <tr>
        <td style="text-align: center">1</td>
        <td style="text-align: center">2</td>
        <td style="text-align: center">3</td>
        <td style="text-align: center">4</td>
        <td style="text-align: center">5</td>
        <td style="text-align: center">6</td>
        <td style="text-align: center">7</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold;"></td>
        <td colspan="7" style="font-weight: bold;">{{$modeldb->diaban}}</td>
    </tr>
    <tr>
        <td style="text-align: left">{{$model->tenphanloai}}</td>
        <td style="text-align: left">{{$modelxa->diaban}}</td>
        <td>{{$model->soqd}}</td>
        <td>{{getDayVn($model->thoidiem)}}</td>
        <td>{{$model->tenvitri}}</td>
        <td style="text-align: right">{{dinhdangso($model->giatri)}}</td>
        <td></td>
    </tr>

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