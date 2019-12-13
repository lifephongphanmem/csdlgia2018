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
        <td>Số: {{$model->soqd}}</td>
        <td style="text-align: center"><i>{{$inputs['diadanh']}}, ngày..{{ date("d",strtotime($model->ngaybc))}}..tháng..{{ date("m",strtotime($model->ngaybc))}}..năm..{{ date("Y",strtotime($model->ngaybc))}}..</i></td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold;font-size: 20px">CÔNG BỐ<br>Giá gốc vật liệu xây dựng {{$diaban->diaban}}</p>
<br>
<p style="text-align: center;font-size: 16px; font-weight: bold" ><u>Thời điểm: Quý {{$model->quy}}/{{$model->nam}}</u></p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
        <tr height="40px">
            <th style="text-align: center" width="2%">STT</th>
            <th style="text-align: center">Tên vật liệu - quy cách</th>
            <th style="text-align: center">ĐVT</th>
            <th style="text-align: center">Giá vật liệu <br>gốc (đ)</th>
            <th style="text-align: center">Tiêu chuẩn, Quy<br> chuẩn áp dụng</th>
            <th style="text-align: center">Ghi chú</th>
        </tr>
        </thead>
    <tbody>
    @foreach($modelct as $key=>$tt)
        <tr>
            <td style="text-align: center">{{($key +1)}}</td>
            <td class="active">{{$tt->tenhhdv}} - {{$tt->qccl}}</td>
            <td style="text-align: center">{{$tt->dvt}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->giagoc)}}</td>
            <td style="text-align: left">{{$tt->qcad}}</td>
            <td style="text-align: left">{{$tt->ghichu}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop
