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
    <p style="text-align: center; font-weight: bold">Phụ lục {{$modelnhom->manhom}}</p>
    <p style="font-weight: bold;text-transform: uppercase;text-align: center">BẢNG {{$modelnhom->tennhom}}</p>
    <p style="text-align: center;font-style: italic">(Ban hành kèm theo Quyết định số {{$model->soqd}}
        ngày {{date('d',strtotime($model->ngayqd))}} tháng {{date('m',strtotime($model->ngayqd))}} năm {{date('Y',strtotime($model->ngayqd))}}
        của {{$model->cqbh}})
    </p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <tr>
            <th style="text-align: center" colspan="5" width="30%">Mã nhóm, loại tài nguyên</th>
            <th style="text-align: center" rowspan="2">Tên nhóm, loại tài nguyên</th>
            <th style="text-align: center" rowspan="2" width="5%">Đơn vị<br>tính</th>
            <th style="text-align: center" rowspan="2" width="10%">Giá tính thuế tài nguyên (đồng)</th>
        </tr>
        <tr>
            <th style="text-align: center">Cấp I</th>
            <th style="text-align: center">Cấp II</th>
            <th style="text-align: center">Cấp III</th>
            <th style="text-align: center">Cấp IV</th>
            <th style="text-align: center">Cấp V</th>
        </tr>
        @foreach($modelct as $tt)
            <tr>
                <td style="text-align: center">{{$tt->level == 1 ? $tt->cap1 : ''}}</td>
                <td style="text-align: center">{{$tt->level == 2 ? $tt->cap2 : ''}}</td>
                <td style="text-align: center">{{$tt->level == 3 ? $tt->cap3 : ''}}</td>
                <td style="text-align: center">{{$tt->level == 4 ? $tt->cap4 : ''}}</td>
                <td style="text-align: center">{{$tt->level == 5 ? $tt->cap5 : ''}}</td>
                <td style="text-align: left">{{$tt->ten}}</td>
                <td style="text-align: center">{{$tt->dvt}}</td>
                <td style="text-align: right">{{dinhdangsothapphan($tt->gia,5)}}</td>
            </tr>
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