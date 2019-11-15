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
<p style="text-align: center; font-weight: bold; font-size: 16px;text-transform: uppercase;">BÁO CÁO KÊ KHAI {{$modeldmnghe->tennghe}}</p>
<p style="text-align: center; font-size: 14px;">
    Thời điểm: @if($inputs['time'] == 'ngay')
                   Từ ngày {{$inputs['tungay']}} đến ngày {{$inputs['denngay']}}
               @elseif($inputs['time'] == 'thang')
                    Tháng {{$inputs['thang']}} Năm {{$inputs['nam']}}
               @else
                    Quý {{$inputs['quy']}} Năm {{$inputs['nam']}}
               @endif
</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
    <tr>
        <th style="text-align: center ; margin: auto" width="2%">STT</th>
        <th style="text-align: center" width="20%">Doanh nghiệp</th>
        <th style="text-align: center">Tên hàng hóa, dịch vụ</th>
        <th style="text-align: center">Quy cách, chất lượng</th>
        <th style="text-align: center">Đơn vị<br>tính</th>
        <th style="text-align: center">Giá<br>liền kề</th>
        <th style="text-align: center">Giá <br>kê khai</th>
    </tr>
    </thead>
    <tbody>
    @foreach($modeldvql as $dvql)
        <tr>
            <td></td>
            <td colspan="6" style="font-weight: bold; text-align: left">{{$dvql->tendv}}</td>
        </tr>
        <?php $model = $model->where('mahuyen',$dvql->maxa)?>
        @foreach($model as $key=>$tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td class="active" colspan="6">{{$tt->tendn}}
                    -<b>Mã số thuế:</b> {{$tt->maxa}}
                    -<b>Mã hồ sơ:</b> {{$tt->mahs}}
                . Số công văn :{{$tt->socv}} -
                Ngày hiệu lực: {{getDayVn($tt->ngayhieuluc)}}
                - Ngày chuyển: {{getDateTime($tt->ngaychuyen)}}
                <br>Số hồ sơ nhận: {{$tt->sohsnhan}} - Ngày nhận: {{getDayVn($tt->ngaynhan)}}</td>
            </tr>
            <?php $modelct = $modelct->where('mahs',$tt->mahs)?>
            @foreach($modelct as $key2=>$tt)
                <tr>
                    <td></td>
                    <td style="text-align: center">{{($key2 +1)}}</td>
                    <<td class="active">{{$tt->tenhh}}</td>
                    <td style="text-align: left">{{$tt->quycach}}</td>
                    <td style="text-align: center">{{$tt->dvt}}</td>
                    <td style="text-align: right">{{number_format($tt->gialk)}}</td>
                    <td style="text-align: right">{{number_format($tt->giakk)}}</td>
                </tr>
            @endforeach
        @endforeach
    @endforeach
    </tbody>
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