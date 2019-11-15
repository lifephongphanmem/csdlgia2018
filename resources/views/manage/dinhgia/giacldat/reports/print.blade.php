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
<p style="text-align: center;font-weight: bold;font-size: 20px;text-transform: uppercase;"></p>
<p style="text-align: center;font-weight: bold;font-size: 20px;text-transform: uppercase;">GIÁ ĐẤT TRÊN ĐỊA BÀN {{ $model_diaban->diaban}}</p>

<p style="text-align: right"><i>Đơn vị tính: 1000 đồng/m2</i></p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead>
    <tr>
        <th style="text-align: center" rowspan="2">Vị trí đất</th>
        <th style="text-align: center" width="5%" rowspan="2">Căn cứ quyết định</th>
        <th rowspan="2" width="2%">Hệ số K</th>
        <th style="text-align: center" width="10%" colspan="4">Giá đất</th>
    </tr>
    <tr>
        <th>VT1</th>
        <th>VT2</th>
        <th>VT3</th>
        <th>VT4</th>
    </tr>
    </thead>
    <tbody>
    <?php $model_cap1 = $model->where('capdo','1');?>
    <?php $lv1 = 0;?>
    @foreach($model_cap1 as $cap1)
        <tr>
            <td style="text-align: left;font-weight: bold;text-transform: uppercase;">{{toAlpha($lv1++) .' .' .$cap1->vitri}}</td>
            <td>{{$cap1->soqd}}</td>
            <td>{{$cap1->hesok}}</td>
            <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap1->giavt1,3)}}</td>
            <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap1->giavt2,3)}}</td>
            <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap1->giavt3,3)}}</td>
            <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap1->giavt4,3)}}</td>
        </tr>
        <?php $model_cap2 = $model->where('magoc',$cap1->maso);?>
        <?php $lv2 = 1;?>
        @foreach($model_cap2 as $cap2)
            <tr>
                <td style="text-align: left;font-weight: bold">&nbsp;{{romanNumerals($lv2++) .'. ' .$cap2->vitri}}</td>
                <td>{{$cap2->soqd}}</td>
                <td>{{$cap2->hesok}}</td>
                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->giavt1)}}</td>
                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->giavt2)}}</td>
                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->giavt3)}}</td>
                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap2->giavt4)}}</td>
            </tr>
            <?php $model_cap3 = $model->where('magoc',$cap2->maso);?>
            <?php $lv3 = 1;?>
            @foreach($model_cap3 as $cap3)

                <tr>
                    <td style="text-align: left;font-style: oblique;font-weight: bold">&nbsp;&nbsp;{{$lv3++ .'. ' .$cap3->vitri}}</td>
                    <td>{{$cap3->soqd}} </td>
                    <td>{{$cap3->hesok}} </td>
                    <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap3->giavt1,3)}}</td>
                    <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap3->giavt2,3)}}</td>
                    <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap3->giavt3,3)}}</td>
                    <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($cap3->giavt4,3)}}</td>
                </tr>
                <?php $model_cap4 = $model->where('magoc',$cap3->maso); ?>
                @foreach($model_cap4 as $cap4)
                    <tr>
                        <td style="text-align: left;font-style: italic">&nbsp;&nbsp;&nbsp;- {{$cap4->vitri}}</td>
                        <td>{{$cap4->soqd}}</td>
                        <td>{{$cap4->hesok}}</td>
                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->giavt1)}}</td>
                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->giavt2)}}</td>
                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->giavt3)}}</td>
                        <td style="text-align: right; font-weight: bold">{{dinhdangso($cap4->giavt4)}}</td>
                    </tr>
                    <?php $model_cap5 = $model->where('magoc',$cap4->maso); ?>
                    @foreach($model_cap5 as $cap5)
                        <tr>
                            <td style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;+ {{$cap5->vitri}}</td>
                            <td>{{$cap5->soqd}}</td>
                            <td>{{$cap5->hesok}}</td>
                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap5->giavt1)}}</td>
                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap5->giavt2)}}</td>
                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap5->giavt3)}}</td>
                            <td style="text-align: right; font-weight: bold">{{dinhdangso($cap5->giavt4)}}</td>
                        </tr>
                        <?php $model_cap6 = $model->where('magoc',$cap5->maso); ?>
                        @foreach($model_cap6 as $cap6)
                            <tr>
                                <td style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i. {{$cap6->vitri}}</td>
                                <td>{{$cap6->soqd}}</td>
                                <td>{{$cap6->hesok}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap6->giavt1)}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap6->giavt2)}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap6->giavt3)}}</td>
                                <td style="text-align: right; font-weight: bold">{{dinhdangso($cap6->giavt4)}}</td>
                            </tr>
                            <?php $model_cap7 = $model->where('magoc',$cap6->maso); ?>
                            @foreach($model_cap7 as $cap7)
                                <tr>
                                    <td style="text-align: left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii. {{$cap7->vitri}}</td>
                                    <td>{{$cap7->soqd}}</td>
                                    <td>{{$cap7->hesok}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap7->giavt1)}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap7->giavt2)}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap7->giavt3)}}</td>
                                    <td style="text-align: right; font-weight: bold">{{dinhdangso($cap7->giavt4)}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        @endforeach
    @endforeach
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