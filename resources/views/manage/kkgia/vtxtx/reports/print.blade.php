@extends('reports.main_rps')
@section('custom-style')
@stop


@section('custom-script')

@stop

@section('content')
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="vertical-align: top;">
            <span style="text-transform: uppercase;font-weight: bold">{{$modeldn->tendn}}</span>
            <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

        </td>
        <td style="vertical-align: top;">
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b>
            <hr style="width: 15%;vertical-align: top; margin-top: 2px">

        </td>
    </tr>
    <tr>
        <td>Số: {{$modelkk->socv}}<br>V/v kê khai giá hàng hóa, dịch<br>vụ bán trong nước hoặc xuất<br>khẩu</td>
        <td style="text-align: right"><i style="margin-right: 25%;">{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i></td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;"><i><u>Kính gửi</u></i>: {{$modelcqcq->tendv}}</p>

<p>Thực hiện quy định tại Thông tư liên tịch số 152/2014/TTLT-BTC-BGTVT ngày 15 tháng 10 năm 2014 của Bộ trưởng Bộ Tài chính và Bộ trưởng Bộ Giao thông vận tải hướng dẫn thực hiện giá cước vận tải bằng xe ô tô và giá dịch vụ hỗ trợ vận tải đường bộ;</p>

<p>{!! nl2br(e($modelkk->thqd)) !!}.<b>{{$modeldn->tendn}}</b> gửi Bảng kê mức giá vận tải bằng xe ô tô (đính kèm).</p>

<p>Mức giá kê khai này thực hiện từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</p>

<p><b>{{$modeldn->tendn}}</b> xin chịu trách nhiệm trước pháp luật về tính đúng đắn của mức giá mà chúng tôi đã kê khai./.</p>

<table width="96%" border="0" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
    <tr>
        <td width="40%" style="text-align: left; vertical-align: top;">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - Như trên:<br>
            - Lưu.
        </td>
        <td style="vertical-align: top;">
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i>
        </td>
    </tr>
</table>
<p>- Họ và tên người nộp biểu mẫu : {{$modelkk->nguoinop}}</p>
<p>- Địa chỉ đơn vị thực hiện kê khai: {{$modeldn->diachi}}</p>
<p>- Số điện thoại liên lạc : {{$modelkk->dtll}}</p>
<p>- Email : {{$modelkk->email}}</p>
<p>- Số Fax : {{$modelkk->fax}}</p>
<p style="font-weight: bold; text-align: center">Ghi nhận ngày nộp Văn bản kê khai giá <br>của cơ quan tiếp nhận</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin-top: 5px;; border-collapse: collapse;width:30%">
    <td><b>{{$modelcqcq->tendv}}</b></td>
    <tr>
    </tr>
    <tr>
        <td style="text-align: left;">
            <b>Số:</b> {{$modelkk->sohsnhan}}<br>
            <b>Ngày nhận hồ sơ:</b> {{getDateTime($modelkk->ngaychuyen)}}<br>
            <b>Ngày duyệt hồ sơ:</b> {{getDayVn($modelkk->ngaynhan)}}
        </td>
    </tr>
</table>
<hr class="in">
<p style="page-break-before: always">
    <!--Trang2-->
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="vertical-align: top;">
            <span style="text-transform: uppercase;font-weight: bold">{{$modeldn->tendn}}</span>
            <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

        </td>
        <td style="vertical-align: top;">
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b>
            <hr style="width: 15%;vertical-align: top; margin-top: 2px">
        </td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align: right"><i style="margin-right: 25%;">{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i></td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG KÊ KHAI MỨC GIÁ</p>
<p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</p>
<p>1. Tên đơn vị thực hiện kê khai giá: {{$modeldn->tendn}}</p>

<p>2. Trụ sở (nơi đơn vị đăng ký kinh doanh): {{$modeldn->diachi}}</p>

<p>3. Mã số thuế: {{$modeldn->maxa}}</p>

<p>4. Nội dung kê khai theo từng loại hình vận tải, loại hình dịch vụ:</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <tr>
        <th width="2%">STT</th>
        <th style="text-align: center">Loại xe</th>
        <th>Quy cách, <br>chất lượng</th>
        <th style="text-align: center">Mô tả</th>
        <th width="10%">Mức giá <br>đăng ký hiện<br>hành</th>
        <th width="10%">Mức giá <br>đăng ký mới</th>
        <th>Mức tăng giảm</th>
        <th>Tỷ lệ % tăng giảm</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelkkct as $key=>$tt)
    <tr>
        <td style="text-align: center">{{$key+1}}</td>
        <td>{{$tt->loaixe}}</td>
        <td>{{$tt->qccl}}</td>
        <td>{{$tt->mota}}</td>
        <td style="text-align: right;font-weight: bold">{{number_format($tt->dongialk).'đ/'.$tt->sllk.' '.$tt->dvtlk}}</td>
        <td style="text-align: right;font-weight: bold">{{number_format($tt->dongia).'đ/'.$tt->sl.' '.$tt->dvt}}</td>
        <td style="text-align: right">{{number_format($tt->dongia/$tt->sl - $tt->dongialk/$tt->sllk)}}</td>
        <td style="text-align: center">{{$tt->dongialk == 0 ? '100' : number_format(($tt->dongia/$tt->sl - $tt->dongialk/$tt->sllk)/($tt->dongialk/$tt->sllk)*100)}}%</td>
        <td>{{$tt->ghichu}}</td>
    </tr>
    @endforeach
</table>
<table width="96%" border="0" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
    <tr>
        <td width="40%" style="text-align: left; vertical-align: top;">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - Như trên:<br>
            - Lưu.
        </td>
        <td style="vertical-align: top;">
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i>
        </td>
    </tr>
</table>
@stop