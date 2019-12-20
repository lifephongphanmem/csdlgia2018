@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
    <table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="vertical-align: top;">
                <span style="text-transform: uppercase">{{$model->dvbh}}</span><br>
                <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

            </td>
            <td style="vertical-align: top;">
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b>
                <hr style="width: 15%;vertical-align: top; margin-top: 2px">

            </td>
        </tr>
        <tr>
            <td>Số: ..{{$model->soqd}}..</td>
            <td style="text-align: right"><i style="margin-right: 25%;">{{$inputs['diadanh']}}, ngày {{date('d',strtotime($model->ngaybh))}} tháng {{date('m',strtotime($model->ngaybh))}} năm {{date('Y',strtotime($model->ngaybh))}}</i></td>
        </tr>
    </table>
    <p style="text-align: center; font-weight: bold">Phụ lục</p>
    <p style="font-weight: bold;text-transform: uppercase;text-align: center">BẢNG giá tính lệ phí trước bạ đối với nhà và tỷ lệ (%) chất lượng còn lại của nhà chịu lệ phí trước bạ trên địa bàn</p>
    <p style="text-align: center;font-style: italic">(Ban hành kèm theo Quyết định số {{$model->soqd}}
        ngày {{date('d',strtotime($model->ngaybh))}} tháng {{date('m',strtotime($model->ngaybh))}} năm {{date('Y',strtotime($model->ngaybh))}}
        của {{$model->dvbh}})
    </p>
    <p style="text-align: center;font-style: italic">Áp dụng từ ngày {{getDayVn($model->ngayad)}}</p>
    <p style="text-align: left; font-weight: bold">I. Bảng giá nhà xây dựng mới</p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
        <tr>
            <th width="2%" style="text-align: center">STT</th>
            <th style="text-align: center">Loại công trình</th>
            <th style="text-align: center" width="5%">Cấp nhà</th>
            <th style="text-align: center" width="10%">Đơn vị tính</th>
            <th style="text-align: center" width="10%">Đơn giá</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modelctxdm as $key=>$ct)
            <tr>
                <td style="text-align: center">{{$key +1}}</td>
                <td>{{$ct->loaict}}</td>
                <td style="text-align: center">{{$ct->capnha}}</td>
                <td style="text-align: center">{{$ct->dvt}}</td>
                <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($ct->dongia,5)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>{!! nl2br(e($model->ghichuxdm)) !!}</p>
    <p style="text-align: left; font-weight: bold">II. Tỷ lệ phần trăm (%) chất lượng còn lại của nhà</p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
        <tr>
            <th style="text-align: center">Cấp nhà</th>
            <th style="text-align: center" width="10%">Thời gian sử dung (năm)</th>
            <th style="text-align: center" width="10%">Tỷ lệ hao mòn (%/năm)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modelctclcl as $key=>$ct)
            <tr>
                <td style="text-align: left">{{$ct->capnha}}</td>
                <td style="text-align: center">{{dinhdangsothapphan($ct->thoigiansd,3)}}</td>
                <td style="text-align: center">{{dinhdangsothapphan($ct->tylehm,3)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>{!! nl2br(e($model->ghichuclcl)) !!}</p>
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