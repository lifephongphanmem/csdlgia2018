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
                Số: ...
            </td>
            <td>
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b><br>
                <hr style="width: 15%"><br>
                <i>{{$inputs['diadanh']}}, ngày .... tháng .... năm ....</i>
            </td>
        </tr>
    </table>

<p style="text-align: center; font-weight: bold; font-size: 16px;">BÁO CÁO<br>GIÁ THỊ TRƯỜNG HÀNG HÓA, DỊCH VỤ</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
        <tr>
            <th width="2%" style="text-align: center" rowspan="2">STT</th>
            <th style="text-align: center" rowspan="2">Mã hàng hóa<br> dịch vụ</th>
            <th style="text-align: center" rowspan="2">Tên hàng hóa dịch vụ</th>
            <th style="text-align: center" rowspan="2">Đặc điểm kỹ thuật</th>
            <th style="text-align: center" rowspan="2">Đơn vị tính</th>
            <th style="text-align: center" width="10%" rowspan="2">Giá liền kề<br>({{getDayVn($inputs['ngayapdunglk'])}})</th>
            <th style="text-align: center" width="10%" rowspan="2">Giá<br>({{getDayVn($inputs['ngayapdung'])}})</th>
            <th style="text-align: center" width="10%" colspan="2">Tăng, giảm</th>
            <th style="text-align: center" width="10%" rowspan="2">Ghi chú</th>
        </tr>
        <tr>
            <th>Mức</th>
            <th>%</th>
        </tr>
        <tr style="font-size: 10px">
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8=7-6</th>
            <th>9=8/6</th>
            <th>10</th>
        </tr>
    </thead>
    <tbody>
    @foreach($modelgr as $sttgr=>$gr)
        <tr>
            <td>{{romanNumerals($sttgr + 1)}}</td>
            <td style="text-align: center">{{$gr->manhom}}</td>
            <td colspan="10" style="font-weight: bold">{{$gr->nhom}}</td>
        </tr>
        @if($ttct = $modelct->where('manhom',$gr->manhom))@endif
            @foreach($ttct as $key=>$tt)
                <tr>
                    <td style="text-align: center">{{$key+1}}</td>
                    <td style="text-align: center">{{$tt->mahhdv}}</td>
                    <td>{{$tt->tenhhdv}}</td>
                    <td>{{$tt->dacdiemkt}}</td>
                    <td style="text-align: center">{{$tt->dvt}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->giathlk,5)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->giath,5)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->giath - $tt->giathlk,5)}}</td>
                    <td style="text-align: right;font-weight: bold">{{number_format($tt->giathlk) == 0 ? number_format($tt->giath) == 0 ? 0 : 100
                                    : dinhdangsothapphan(($tt->giath-$tt->giathlk)/$tt->giathlk,5)}}</td>
                    <td></td>
                </tr>
            @endforeach
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