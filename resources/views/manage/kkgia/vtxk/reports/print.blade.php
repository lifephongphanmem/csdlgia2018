<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    <style type="text/css">
        body {
            font: normal 14px/16px time, serif;
        }
        table, p {
            width: 98%;
            margin: auto;
        }
        table tr td:first-child {
            text-align: center;
        }
        td, th {
            padding: 10px;
        }
        p{
            padding: 5px;
        }
        @media print {
            .in{
                display: none !important;
            }
        }
    </style>
</head>

<div class="in" style="margin-left: 20px;">
    <input type="submit" onclick=" window.print()" value="In kê khai"  />
</div>

<body style="font:normal 14px Times, serif;">
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
<br><br>
<p>Thực hiện Thông tư số 56/2014/TT-BTC ngày 28/4/2014 của Bộ Tài chính hướng dẫn thực hiện Nghị định 177/2013/NĐ-CP ngày 14 tháng 11 năm 2013 của Chính phủ quy định chi tiết và hướng dẫn thi hành một số điều của Luật Giá và Thông tư số 233/2016/TT-BTC ngày 11/11/2016 của Bộ Tài chính sửa đổi, bổ sung một số điều của Thông tư số 56/2014/TT-BTC </p>

<p><b>{{$modeldn->tendn}}</b> gửi Bảng kê khai mức giá hàng hoá, dịch vụ (đính kèm).</p>

<p>Mức giá kê khai này thực hiện từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</p>

<p><b>{{$modeldn->tendn}}</b> xin chịu trách nhiệm trước pháp luật về tính chính xác của mức giá mà chúng tôi đã kê khai./.</p>

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
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%">STT</th>
        <th style="text-align: center">Loại xe</th>
        <th style="text-align: center">Tên dịch vụ</th>
        <th>Quy cách, <br>chất lượng</th>
        <th>Đơn vị<br>tính</th>
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
        <td>{{$tt->mota}}</td>
        <td>{{$tt->qccl}}</td>
        <td style="text-align: center">{{$tt->dvt}}</td>
        <td style="text-align: right">{{number_format($tt->giathanhlk)}}</td>
        <td style="text-align: right">{{number_format($tt->giathanh)}}</td>
        <td style="text-align: right">{{number_format($tt->giathanh - $tt->giathanhlk)}}</td>
        <td style="text-align: right">{{$tt->dongialk == 0 ? '100' : number_format(($tt->dongia - $tt->dongialk)/$tt->dongialk*100)}}%</td>
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
<!--Trang3-->
{{--@foreach($modelkkct as $ttpag)--}}
    {{--<p style="page-break-before: always">--}}
    {{--<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 25px; text-align: center;">--}}
        {{--<tr>--}}
            {{--<td width="40%" style="text-transform: uppercase;">--}}
                {{--<b>{{$modeldn->tendn}}</b><br>--}}
                {{----------<br>--}}
            {{--</td>--}}
            {{--<td>--}}
                {{--<b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>--}}
                {{--<b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>--}}
            {{--</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td></td>--}}
            {{--<td>--}}
                {{--<i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--</table>--}}
    {{--<p style="text-align: center; font-weight: bold; font-size: 16px;"><b>THUYẾT MINH CƠ CẤU TÍNH GIÁ<br>--}}
            {{--HÀNG HÓA, DỊCH VỤ  ĐĂNG KÝ GIÁ--}}
        {{--</b></p>--}}
    {{--<p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</p>--}}
    {{--<p style="text-align: left; font-size: 16px;"><b>Tên dịch vụ: {{$ttpag->mota}}</b></p>--}}
    {{--<p style="text-align: left; font-size: 16px;"><b>Quy cách chất lượng: {{$ttpag->qccl}}</b></p>--}}
    {{--<p style="text-align: left; font-size: 16px;"><b>Đơn vị tính: {{$ttpag->dvt}}</b></p>--}}
    {{--<p style="text-align: left; font-size: 16px;"><b>Ghi chú: {{$ttpag->ghichu}}<b></b></p>--}}
    {{--<p><b>I. BẢNG TỔNG HỢP TÍNH GIÁ VỐN, GIÁ BÁN HÀNG HÓA, DỊCH VỤ</b></p>--}}

    {{--<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">--}}
        {{--<tr>--}}
            {{--<th width="2%">STT</th>--}}
            {{--<th>Khoản mục chi phí</th>--}}
            {{--<th>ĐVT</th>--}}
            {{--<th>Thành tiền</th>--}}
            {{--<th>Ghi chú</th>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b>A</b></td>--}}
            {{--<td><b>Sản lượng tính giá (Q)</b></td>--}}
            {{--<td style="text-align: center"><b></b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->sltg)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b>B</b></td>--}}
            {{--<td><b>Chi phí sản xuất, kinh doanh</b></td>--}}
            {{--<td style="text-align: center"><b>Đồng</b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphisxkd)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b>I</b></td>--}}
            {{--<td><b>Chi phí trực tiếp:</b></td>--}}
            {{--<td style="text-align: center"><b>Đồng</b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphitt)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">1</td>--}}
            {{--<td><b>Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</b></td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphinl)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">2</td>--}}
            {{--<td><b>Chi phí nhân công trực tiếp</b></td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphinc)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">3</td>--}}
            {{--<td>Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao)</td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right">{{number_format($ttpag->chiphikh)}}</td>--}}
            {{--<td style="text-align: right"></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">4</td>--}}
            {{--<td>Chi phí sản xuất, kinh doanh (chưa tính ở mục 1,2,3) theo đặc thù</td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right">{{number_format($ttpag->chiphisxkddt)}}</td>--}}
            {{--<td style="text-align: right"></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b>II</b></td>--}}
            {{--<td><b>Chi phí chung</b></td>--}}
            {{--<td style="text-align: center"><b>Đồng</b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphic)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">5</td>--}}
            {{--<td><b>Chi phí sản xuất chung</b></td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphisxc)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">6</td>--}}
            {{--<td><b>Chi phí tài chính (nếu có)</b></td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphitc)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">7</td>--}}
            {{--<td>Chi phí bán hàng</td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right">{{number_format($ttpag->chiphibh)}}</td>--}}
            {{--<td style="text-align: right"></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center">8</td>--}}
            {{--<td>Chi phí quản lý</td>--}}
            {{--<td style="text-align: center">Đồng</td>--}}
            {{--<td style="text-align: right">{{number_format($ttpag->chiphiql)}}</td>--}}
            {{--<td style="text-align: right"></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b></b></td>--}}
            {{--<td><b>Tổng chi phí sản xuất, kinh doanh (TC)</b></td>--}}
            {{--<td style="text-align: center"><b>Đồng</b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->tchiphisxkd)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b>C</b></td>--}}
            {{--<td><b>Chi phí phân bổ cho dịch vụ khác (nếu có) (CP)</b></td>--}}
            {{--<td style="text-align: center"><b>Đồng</b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->chiphidvk)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b>D</b></td>--}}
            {{--<td><b>Giá thành toàn bộ (TC-CP)</b></td>--}}
            {{--<td style="text-align: center"><b>Đồng</b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->giathanhtb)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
            {{--<td style="text-align: center"><b>Đ</b></td>--}}
            {{--<td><b>Giá thành toàn bộ 01 (một) đơn vị sản phẩm, dịch vụ (TC-CP)/Q</b></td>--}}
            {{--<td style="text-align: center"><b>Đồng</b></td>--}}
            {{--<td style="text-align: right"><b>{{number_format($ttpag->giathanh)}}</b></td>--}}
            {{--<td style="text-align: right"><b></b></td>--}}
        {{--</tr>--}}
    {{--</table>--}}
{{--<p><b>II . GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN CHI PHÍ (từ mục 1 đến mục 8 bảng tổng hợp tính giá)</b></p>--}}
{{--<br>--}}
{{--<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align: center;">--}}
    {{--<tr>--}}
        {{--<td></td>--}}
        {{--<td style="text-align: center;text-transform: uppercase; " width="60%">--}}
            {{--<b>{{$modeldn->chucdanhky != '' ? $modeldn->chucdanhky : 'Giám đốc'}}</b><br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<br>--}}
            {{--<b style="text-transform: uppercase;">{{$modeldn->nguoiky}}</b>--}}

        {{--</td>--}}
    {{--</tr>--}}
{{--</table>--}}
{{--@endforeach--}}

</body>
</html>