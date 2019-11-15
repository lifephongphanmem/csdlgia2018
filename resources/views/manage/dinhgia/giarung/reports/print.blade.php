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
<p style="text-align: center;font-weight: bold;font-size: 20px">HỒ SƠ GIÁ RỪNG</p>
<p style="text-align: center"><i >({{$model->soqd}})</i></p>
<p style="text-align: center"><i >Ngày áp dụng({{getDayVn($model->ngayapdung)}})</i></p>
<p style="text-align: center"><i >Địa bàn: {{$districts->diaban}}</i></p>


<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <tr>
        <th width="2%" style="text-align: center">STT</th>
        <th style="text-align: center">Nhóm rừng</th>
        <th style="text-align: center">Loại rừng</th>
        <th style="text-align: center" width="10%">Mức độ</th>
        <th style="text-align: center" width="10%">Đơn giá <br>sử dụng</th>
        <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>50 năm</th>
        <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>1 năm</th>
        <th style="text-align: center" width="10%">Đơn giá<br> xử phạt <br>vi phạm<br> về rừng</th>
    </tr>
    @foreach($modelct as $key=>$tt)
        <tr>
            <td style="text-align: center">{{$key + 1}}</td>
            <td>{{$tt->tennhom}}</td>
            <td class="active">{{$tt->loairung}}</td>
            <td>{{$tt->mucdo}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiasd)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiat50)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiat1)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->dongiaxp)}}</td>
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