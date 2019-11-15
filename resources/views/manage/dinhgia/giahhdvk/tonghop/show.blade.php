@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            --------<br><br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br><br>
        </td>
    </tr>
</table>

<p style="text-align: center; font-weight: bold; font-size: 16px;text-transform: uppercase;">{{$model->ttbc}}</p>
<p style="text-align: center; font-size: 16px;">(Kèm theo báo cáo số {{$model->sobc}}, ngày {{getDayVn($model->ngaybc)}})</p>

<p style="text-transform: uppercase;font-weight: bold"></p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
        <tr>
            <th width="2%" style="text-align: center">STT</th>
            <th style="text-align: center" width="5%">Mã hàng hóa</th>
            <th style="text-align: center" width="25%">Tên hàng hóa, dịch vụ</th>
            <th style="text-align: center">Đặc điểm kinh tế,<br> kỹ thuật, quy cách</th>
            <th style="text-align: center" width="5%">Đơn vị <br>tính</th>
            <th style="text-align: center">Loại giá</th>
            <th style="text-align: center" width="5%">Giá kỳ<br>trước</th>
            <th style="text-align: center" width="5%">Giá kỳ<br>này</th>
            <th style="text-align: center" width="5%">Mức<br>tăng<br>(giảm)</th>
            <th style="text-align: center" width="5%">Tỷ lệ<br>tăng<br>(giảm)<br>(%)</th>
            <th style="text-align: center">Nguồn<br>thông tin</th>
            <th style="text-align: center">Ghi chú</th>
        </tr>
        <tr style="font-size: 10px">
            <th>(1)</th>
            <th>(2)</th>
            <th>(3)</th>
            <th>(4)</th>
            <th>(5)</th>
            <th>(6)</th>
            <th>(7)</th>
            <th>(8)</th>
            <th>(9)=(8)-(7)</th>
            <th>(10)=(9)/(7)</th>
            <th>(11)</th>
            <th>(12)</th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="12" style="text-align: left">{{$modelnhom->manhom}}. {{$modelnhom->tennhom}}</td>
    </tr>
    @foreach($modelct as $key=>$tt)

        <tr>
            <td>{{$key+1}}</td>
            <td style="text-align: center">{{$tt->mahhdv}}</td>
            <td class="active" style="font-weight: bold">{{$tt->tenhhdv}}</td>
            <td>{{$tt->dacdiemkt}}</tD>
            <td style="text-align: center">{{$tt->dvt}}</td>
            <td></td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->gialk)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->gia)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->gia - $tt->gialk)}}</td>
            <td style="text-align: right;font-weight: bold">{{number_format($tt->gialk) == 0 ? number_format($tt->gia) == 0 ? 0 : 100
                            : round(number_format($tt->gia)/number_format($tt->gialk),2)}}</td>
            <td>{{$tt->nguontt}}</td>
            <td>{{$tt->ghichu}}</td>
        </tr>
    @endforeach
    </tbody>

</table>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="30%">

        </td>
        <td style="text-align: center;text-transform: uppercase; " width="70%">
            <b></b><br>
        </td>
    </tr>

</table>
@stop