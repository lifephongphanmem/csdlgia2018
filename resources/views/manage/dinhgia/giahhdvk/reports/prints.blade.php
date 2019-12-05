@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')

    <p style="text-align: center;font-weight: bold">PHỤ LỤC SỐ 1</p>
    <table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%">
                <span style="text-transform: uppercase">{{$inputs['dvcaptren']}}</span><br>
                <span style="text-transform: uppercase;font-weight: bold">{{$inputs['dv']}}</span><br>
                <hr style="width: 10%"> <br>
                Số: ..{{$model->soqd}}..
            </td>
            <td>
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                    Độc lập - Tự do - Hạnh phúc</b><br>
                <hr style="width: 15%"><br>
                <i>{{$inputs['diadanh']}}, ngày ..{{date('d',strtotime($model->ngayapdung))}}.. tháng ..{{date('m',strtotime($model->ngayapdung))}}.. năm ..{{date('Y',strtotime($model->ngayapdung))}}..</i>
            </td>
        </tr>
    </table>

<p style="text-align: center; font-weight: bold; font-size: 16px;text-transform: uppercase;">BẢNG GIÁ THỊ TRƯỜNG {{$diaban}} THÁNG {{$model->thang}} NĂM {{$model->nam}}</p>
<p style="text-align: center; font-size: 16px;font-style: italic">(Ban hành kèm theo Thông tư số 116/2018/TT-BTC ngày 28/11/2018 của Bộ Tài chính quy định chế độ báo cáo giá thị trường)</p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
        <thead>
        <thead>
        <tr>
            <th width="2%" style="text-align: center">STT</th>
            <th style="text-align: center">Mã<br> hàng hóa</th>
            <th style="text-align: center">Tên hàng hóa dịch vụ</th>
            <th style="text-align: center">Đặc điểm kinh tế, <br>kỹ thuật, quy cách</th>
            <th style="text-align: center">Đơn <br>vị<br> tính</th>
            <th style="text-align: center" >Loại giá</th>
            <th style="text-align: center" >Giá kỳ <br>trước</th>
            <th style="text-align: center" >Giá kỳ <br>này</th>
            <th style="text-align: center">Mức tăng<br>(giảm)</th>
            <th style="text-align: center">Tỷ lệ<br>tăng<br>(giảm)<br>(%)</th>
            <th style="text-align: center">Nguồn thông tin</th>
            <th style="text-align: center" width="10%">Ghi chú</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
            <th>9=8-7</th>
            <th>10=9/7</th>
            <th>11</th>
            <th>12</th>
        </tr>
        </thead>
        <tbody id="ttts">
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
                    <td style="text-align: left">{{$tt->loaigia}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->gialk,5)}}</td>
                    <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->gia,5)}}</td>
                    <td style="text-align: right;font-weight: bold">{{number_format($tt->gialk) == 0 ? '' : dinhdangsothapphan($tt->gia - $tt->gialk,5)}}</td>
                    <td style="text-align: right;font-weight: bold">{{number_format($tt->gialk) == 0 ? ''
                                : dinhdangsothapphan(($tt->gia-$tt->gialk)/$tt->gialk,2)}}</td>
                    <td>{{$tt->nguontt}}</td>
                    <td>{{$tt->ghichu}}</td>
                </tr>
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