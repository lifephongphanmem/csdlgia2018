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
<p style="text-align: center;font-weight: bold;font-size: 20px">HỒ SƠ GIÁ THUÊ NHÀ CÔNG VỤ</p>
<p style="text-align: left"><i >{{$model->soqd}}</i></p>
<p style="text-align: left"><i >Ngày áp dụng: {{getDayVn($model->ngayapdung)}}</i></p>
<p style="text-align: left"><i >Nhóm : {{$modeldm->tennhom}}</i></p>

@if($model->ghichu != '')
    <p style="text-align: left">Ghi chú: {{$model->ghichu}}</p>
@endif

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Loại nhà</th>
        <th style="text-align: center">Thời gian</th>
        <th style="text-align: center" width="10%">Giá dịch vụ</th>
        <th style="text-align: center" width="10%">Hệ số điều chỉnh</th>
    </tr>
    @foreach($modelct as $key=>$tt)
        <tr>
            <td style="text-align: center">{{$key + 1}}</td>
            <td class="active">{{$tt->loainha}}</td>
            <td class="active">{{$tt->thoigian}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongia)}}</td>
            <td class="active">{{$tt->hesodc}}</td>
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