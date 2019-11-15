@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
<body style="font:normal 14px Times, serif;">
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
<p style="text-align: center;font-weight: bold;font-size: 20px; text-transform: uppercase;">GIÁ DỊCH VỤ KHÁM CHỮA BỆNH @if($inputs['district'] != 'all'){{$districts->diaban}}@endif</p>
@if($inputs['nam'] != 'all')
<p style="text-align: center;font-weight: bold;font-size: 16px">Năm {{$inputs['nam']}}</p>
@endif
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
    <tr>
        <th style="text-align: center" width="2%">STT</th>
        <th style="text-align: center" width="5%">Thời điểm</th>
        <th style="text-align: center">Địa bàn</th>
        <th style="text-align: center">Bệnh viện</th>
        <th style="text-align: center">Mô tả</th>
        <th style="text-align: center" >Đơn vị tính</th>
        <th style="text-align: center" >Đơn giá</th>
    </tr>
    </thead>
    <tbody>
    @if($model->count() != 0)
        @foreach($model as $key => $tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td><b>{{getDayVn($tt->thoidiem)}}</b></td>
                <td><b>{{$tt->diaban}}</b></td>
                <td style="text-align: left;"><b>{{$tt->tenbv}}</b></td>
                <td style="text-align: left" class="active">{{$tt->mota}}</td>
                <td style="text-align: center">{{$tt->dvt}}</td>
                <td style="text-align: center">{{dinhdangsothapphan($tt->dongia,2)}}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td style="text-align: center" colspan="7">Không tìm thấy thông tin. Bạn cần kiểm tra lại điều kiện tìm kiếm!!!</td>
        </tr>
    @endif
    </tbody>
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