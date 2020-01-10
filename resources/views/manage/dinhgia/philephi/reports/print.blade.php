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
        <td>Số: ...{{$model->soqd}}...</td>
        <td style="text-align: right"><i style="margin-right: 25%;">{{$inputs['diadanh']}},ngày..{{ date("d",strtotime($model->ngayapdung))}}..tháng..{{ date("m",strtotime($model->ngayapdung))}}..năm..{{ date("Y",strtotime($model->ngayapdung))}}..</i></td>
    </tr>
</table>
<p style="text-align: center;font-weight: bold;font-size: 20px;text-transform: uppercase;">{{$m_nhomphilephi->tennhom}}</p>
<p style="text-align: center;font-weight: bold;font-size: 20px;text-transform: uppercase; ">{{$model->mota}}</p>


<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%">STT</th>
        <th>Tên loại phí</th>
        <th>Mức thu phí<br>({{$model->dvt}})</th>
    </tr>
    @foreach($modelct as $key=>$tt)
    <tr>
        <td style="text-align: center">{{$key+1}}</td>
        <td>{{$tt->ptcp}}</td>
        <td style="text-align: left; font-weight: bold">{{$tt->mucthuphi != 0 ? number_format($tt->mucthuphi) : $tt->ghichu}}</td>
    </tr>
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
@stop