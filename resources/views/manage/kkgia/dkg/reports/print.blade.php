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
        <td>Số: {{$modelkk->socv}}<br>V/v đăng ký giá</td>
        <td style="text-align: right"><i style="margin-right: 25%;">{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i></td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;"><i><u>Kính gửi</u></i>: {{$modelcqcq->tendv}}</p>
<br><br>
<p>Thực hiện Thông tư số 56/2014/TT-BTC ngày 28/4/2014 của Bộ Tài chính hướng dẫn thực hiện Nghị định 177/2013/NĐ-CP ngày 14 tháng 11 năm 2013 của Chính phủ quy định chi tiết và hướng dẫn thi hành một số điều của Luật Giá và Thông tư số 233/2016/TT-BTC ngày 11/11/2016 của Bộ Tài chính sửa đổi, bổ sung một số điều của Thông tư số 56/2014/TT-BTC</p>

<p><b>{{$modeldn->tendn}}</b> gửi Biểu mẫu đăng ký {{$modelnghe->tennghe}} gồm các văn bản và nội dung sau.</p>

<p>1. Bảng đăng ký mức giá bán cụ thể</p>
<p>2. Giải trình lý do điều chỉnh giá (trong đó có giải thích việc tính mức giá cụ thể áp dụng theo các hướng dẫn, quy định về phương pháp tính giá do cơ quan có thẩm quyền ban hành)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$modelkk->ghichu}}</p>
<p>Mức giá đăng ký này thực hiện từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</p>

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
<p>- Người nộp biểu mẫu : {{$modelkk->nguoinop}}</p>
<p>- Số điện thoại liên lạc : {{$modelkk->dtlh}}</p>
<p>- Số Fax : {{$modelkk->fax}}</p>
<p style="font-weight: bold; text-align: center">Ghi nhận ngày nộp Biểu mẫu đăng ký giá <br>của cơ quan tiếp nhận Biểu mẫu đăng ký giá</p>
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

<p style="page-break-before: always">
    <!--Trang2-->
<hr class="in">

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
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG ĐĂNG KÝ MỨC GIÁ BÁN CỤ THỂ</p>
<p style="text-align: center;"><i>(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</i></p>
<p style="text-align: left; font-size: 16px;">Doanh nghiệp là đơn vị: {{$modelkk->pldn}}</p>
<p style="text-align: left; font-size: 16px;">Đăng ký giá {{$modelkk->plhs}} {{$modelnghe->tennghe}} cụ thể như sau:</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%">STT</th>
        <th width="30%">Tên hàng hóa, dịch vụ</th>
        <th>Quy cách, <br>chất lượng</th>
        <th>Đơn vị<br>tính</th>
        <th width="10%">Mức giá đăng<br>ky hiện<br>hành</th>
        <th width="10%">Mức giá đăng<br>ky mới</th>
        <th>Mức<br> tăng<br>/ giảm</th>
        <th>Tỷ lệ<br> tăng<br>/ giảm</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelkkct as $key=>$tt)
        <tr>
            <td style="text-align: center">{{$key+1}}</td>
            <td>{{$tt->tenhh}}</td>
            <td>{{$tt->quycach}}</td>
            <td style="text-align: center">{{$tt->dvt}}</td>
            <td style="text-align: right">{{number_format($tt->gialk)}}</td>
            <td style="text-align: right">{{number_format($tt->giakk)}}</td>
            <td style="text-align: center">{{$tt->giakk-$tt->gialk}}</td>
            <td style="text-align: center">{{$tt->gialk == 0 ? '100%' : dinhdangsothapphan(($tt->giakk - $tt->gialk)/$tt->gialk*100,2)}}%</td>

            <td>{{$tt->ghichu}}</td>
        </tr>
    @endforeach
</table>
<p style="text-align: left; font-size: 16px;">Mức giá đăng ký này thực hiện từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</p>
<!--Trang3-->
<hr class="in">
<p style="page-break-before: always">
@foreach($modelkkct as $nhapkhau)
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%">
            <b>{{$modeldn->tendn}}</b><br>
            <hr style="width: 10%"><br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b><br>
            <hr style="width: 15%"> <br>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">THUYẾT MINH CƠ CẤU TÍNH GIÁ<br>HÀNG HÓA, DỊCH VỤ ĐĂNG KÝ GIÁ</p>
<p style="text-align: center;"><i>(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</i></p>
<p style="text-align: center; font-weight: bold">(Đối với mặt hàng nhập khẩu)</p>
<p style="text-align: left; font-size: 16px;">Tên hàng hóa, dịch vụ: {{$nhapkhau->tenhh}}</p>
<p style="text-align: left; font-size: 16px;">Đơn vị sản xuất, kinh doanh {{$nhapkhau->nkdonvisxkd}}</p>
<p style="text-align: left; font-size: 16px;">Quy cách phẩm chất, điều kiện bán hàng hoặc giao hàng; chính sách khuyến mại, giảm giá, chiết khấu cho các đối tượng khách hàng (nếu có)<br>{{$nhapkhau->nkqcpc}}</p>
<p style="font-weight: bold"> I. BẢNG TỔNG HỢP TÍNH GÍ VỐN, GIÁ BÁN HÀNG HÓA NHẬP KHẨU CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <thead><tr>
        <th width="5%">STT</th>
        <th width="35%">Khoản mục chi phí</th>
        <th width="10%">Đơn vị tính</th>
        <th width="10%">Thành tiền</th>
        <th >Ghi chú</th>
    </tr></thead>
    <tbody>
    <tr>
        <td style="text-align: center;font-weight: bold">A</td>
        <td style="font-weight: bold">Sản lượng nhập khẩu</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->nksanluongdvt}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->nksanluongtt,5)}}</td>
        <td style="font-weight: bold">{{$nhapkhau->nksanluonggc}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">B</td>
        <td style="font-weight: bold">Giá vốn nhập khẩu</td>
        <td style="text-align: center"></td>
        <td style="text-align: right"></td>
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center">1</td>
        <td>Giá mua tại cửa khẩu Việt Nam (giá CIF)</td>
        <td style="text-align: center">{{$nhapkhau->nkgiamuackdvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nkgiamuacktt,5)}}</td>
        <td>{{$nhapkhau->nkgiamuackgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center">2</td>
        <td>Thuế nhập khẩu</td>
        <td style="text-align: center">{{$nhapkhau->nkthuedvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nkthuett,5)}}</td>
        <td>{{$nhapkhau->nkthueghichu}}</td>
    </tr>
    <tr>
        <td style="text-align: center">3</td>
        <td>Thuế tiêu thụ đặc biệt (nếu có)</td>
        <td style="text-align: center">{{$nhapkhau->nkthuettdbdvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nkthuettdbtt,5)}}</td>
        <td>{{$nhapkhau->nkthuettdbgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center">4</td>
        <td>Các khoản thuế, phí khác (nếu có)</td>
        <td style="text-align: center">{{$nhapkhau->nkthuephikdvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nkthuephiktt),5}}</td>
        <td>{{$nhapkhau->nkthuephikgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center">5</td>
        <td>Các khoản chi bằng tiền khác theo quy định (nếu có)</td>
        <td style="text-align: center">{{$nhapkhau->nktienkdvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nktienktt,5)}}</td>
        <td>{{$nhapkhau->nktienkgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">C</td>
        <td style="font-weight: bold">Chi phí chung</td>
        <td style="text-align: center"></td>
        <td style="text-align: right"></td>
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center">6</td>
        <td>Chi phí tài chính (nếu có)</td>
        <td style="text-align: center">{{$nhapkhau->nkchiphitcdvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nkchiphitctt,5)}}</td>
        <td>{{$nhapkhau->nkchiphitcgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center">7</td>
        <td>Chi phí bán hàng</td>
        <td style="text-align: center">{{$nhapkhau->nkchiphibhdvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nkchiphibhtt,5)}}</td>
        <td>{{$nhapkhau->nkchiphibhgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center">8</td>
        <td>Chi phí quản lý</td>
        <td style="text-align: center">{{$nhapkhau->nkchiphiqldvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->nkchiphiqltt,5)}}</td>
        <td>{{$nhapkhau->nkchiphiqlgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">D</td>
        <td style="font-weight: bold">Tổng chi phí</td>
        <td style="text-align: center"></td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->nkgiamuacktt+$nhapkhau->nkthuett+$nhapkhau->nkthuettdbtt+$nhapkhau->nkthuephiktt+$nhapkhau->nktienktt
                +$nhapkhau->nkchiphitctt+$nhapkhau->nkchiphibhtt+$nhapkhau->nkchiphiqltt,5)}}</td>
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">Đ</td>
        <td style="font-weight: bold">Giá thành toàn bộ 01(một) đơn vị sản phẩm</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->nkgiathanh1spdvt}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($nhapkhau->nkgiathanh1sptt,5)}}</td>
        <td style="font-weight: bold">{{$nhapkhau->nkgiathanh1spgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">E</td>
        <td style="font-weight: bold">Lợi nhuận dự kiến</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->nkloinhuandkdvt}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($nhapkhau->nkloinhuandktt,5)}}</td>
        <td style="font-weight: bold">{{$nhapkhau->nkloinhuandkgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">G</td>
        <td style="font-weight: bold">Thuế giá trị gia tăng, thuế khác (nếu có) theo quy định</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->nkthuegtgtkdvt}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($nhapkhau->nkthuegtgtktt,5)}}</td>
        <td style="font-weight: bold">{{$nhapkhau->nkthuegtgtkgc}}</td>
    </tr>
    <tr>
        <td style="text-align: center;font-weight: bold">H</td>
        <td style="font-weight: bold">Giá bán dự kiến</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->nkgiabandkdvt}}</td>
        <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($nhapkhau->nkgiabandktt,5)}}</td>
        <td style="font-weight: bold">{{$nhapkhau->nkgiabandkgc}}</td>
    </tr>
    </tbody>
</table>
<p style="font-weight: bold">II. GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN MỤC CHI PHÍ CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>
<p>1. Giá mua tại cửa khẩu Việt Nam (giá CIF)<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtgiamuack}}</p>

<p>2. Thuế nhập khẩu<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtthuenk}}</p>

<p>3. Thuế tiêu thụ đặc biệt (nếu có)<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtthuettdb}}</p>

<p>4. Các khoản thuế, phí khác (nếu có)<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtthuephik}}</p>

<p>5. Các khoản chi bằng tiền khác theo quy định (nếu có)<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgttienk}}</p>

<p>6. Chi phí tài chính (nếu có)<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtchiphitc}}</p>

<p>7. Chi phí bán hàng<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtchiphibh}}</p>

<p>8. Chi phí quản lý<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtchiphiql}}</p>

<p>9. Lợi nhuận dự kiến<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtloinhuandk}}</p>

<p>10. Thuế giá trị gia tăng, thuế khác (nếu có) theo quy định<br>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtthuegtgt}}</p>

<p>11. Giá bán dự kiến</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->nkgtgiabandk}}</p>
<!--Trang4-->
<hr class="in">
<p style="page-break-before: always">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%">
            <b>{{$modeldn->tendn}}</b><br>
            <hr style="width: 10%"><br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b><br>
            <hr style="width: 15%"> <br>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">THUYẾT MINH CƠ CẤU TÍNH GIÁ<br>HÀNG HÓA, DỊCH VỤ ĐĂNG KÝ GIÁ</p>
<p style="text-align: center;"><i>(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</i></p>
<p style="text-align: center; font-weight: bold">(Đối với mặt hàng sản xuất trong nước)</p>
<p style="text-align: left; font-size: 16px;">Tên hàng hóa, dịch vụ: {{$nhapkhau->tenhh}}</p>
<p style="text-align: left; font-size: 16px;">Đơn vị sản xuất, kinh doanh {{$nhapkhau->sxdonvisxkd}}</p>
<p style="text-align: left; font-size: 16px;">Quy cách phẩm chất, điều kiện bán hàng hoặc giao hàng; chính sách khuyến mại, giảm giá, chiết khấu cho các đối tượng khách hàng (nếu có)<br>{{$nhapkhau->sxqcpc}}</p>
<p style="font-weight: bold"> I. BẢNG TỔNG HỢP TÍNH GÍ VỐN, GIÁ BÁN HÀNG HÓA NHẬP KHẨU CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <thead><tr>
        <th width="5%">STT</th>
        <th width="35%">Khoản mục chi phí</th>
        <th width="10%">Đơn vị tính</th>
        <th width="10%">Số lượng</th>
        <th width="10%">Đơn giá</th>
        <th width="10%">Thành tiền</th>
    </tr></thead>
    <tbody>
    <tr>
        <td style="text-align: center;font-weight: bold">1</td>
        <td style="font-weight: bold">Chi phí sản xuất</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center">1.1</td>
        <td>Chi phí nguyên liệu, vật liệu trực tiếp</td>
        <td style="text-align: center">{{$nhapkhau->sxchiphinvldvt}}</td>
        <td style="text-align: center">{{dinhdangsothapphan($nhapkhau->sxchiphinvlsl,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphinvldg,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphinvlsl*$nhapkhau->sxchiphinvldg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center">1.2</td>
        <td>Chi phí nhân công trực tiếp</td>
        <td style="text-align: center">{{$nhapkhau->sxchiphincdvt}}</td>
        <td style="text-align: center">{{dinhdangsothapphan($nhapkhau->sxchiphincsl,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphincdg,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphincsl*$nhapkhau->sxchiphincdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center">1.3</td>
        <td>Chi phí sản xuất chung</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td style="text-align: center; font-style: italic">a</td>
        <td style="font-style: italic">Chi phí nhân viên phân xưởng</td>
        <td style="text-align: center; font-style: italic">{{$nhapkhau->sxchiphinvpxdvt}}</td>
        <td style="text-align: center; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphinvpxsl,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphinvpxdg,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphinvpxsl*$nhapkhau->sxchiphinvpxdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-style: italic">b</td>
        <td style="font-style: italic">Chi phí vật liệu</td>
        <td style="text-align: center; font-style: italic">{{$nhapkhau->sxchiphivldvt}}</td>
        <td style="text-align: center; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphivlsl,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphivldg,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphivlsl*$nhapkhau->sxchiphivldg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-style: italic">c</td>
        <td style="font-style: italic">Chi phí dụng cụ sản xuất</td>
        <td style="text-align: center; font-style: italic">{{$nhapkhau->sxchiphidcsxdvt}}</td>
        <td style="text-align: center; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphidcsxsl,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphidcsxdg,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphidcsxsl*$nhapkhau->sxchiphidcsxdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-style: italic">d</td>
        <td style="font-style: italic">Chi phí khấu hao TSCĐ</td>
        <td style="text-align: center; font-style: italic">{{$nhapkhau->sxchiphikhtscddvt}}</td>
        <td style="text-align: center; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphikhtscdsl,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphikhtscddg,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphikhtscdsl*$nhapkhau->sxchiphikhtscddg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-style: italic">đ</td>
        <td style="font-style: italic">Chi phí dịch vụ mua ngoài</td>
        <td style="text-align: center; font-style: italic">{{$nhapkhau->sxchiphidvmndvt}}</td>
        <td style="text-align: center; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphidvmnsl,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphidvmndg,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphidvmnsl*$nhapkhau->sxchiphidvmndg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-style: italic">e</td>
        <td style="font-style: italic">Chi phí bằng tiền khác</td>
        <td style="text-align: center; font-style: italic">{{$nhapkhau->sxchiphitienkdvt}}</td>
        <td style="text-align: center; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphitienksl,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphitienkdg,5)}}</td>
        <td style="text-align: right; font-style: italic">{{dinhdangsothapphan($nhapkhau->sxchiphitienksl*$nhapkhau->sxchiphitienkdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center"></td>
        <td>Tổng chi phí sản xuất</td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right">{{dinhdangsothapphan(
       $nhapkhau->sxchiphinvlsl*$nhapkhau->sxchiphinvldg +

       $nhapkhau->sxchiphincsl*$nhapkhau->sxchiphincdg+

       $nhapkhau->sxchiphinvpxsl*$nhapkhau->sxchiphinvpxdg+

       $nhapkhau->sxchiphivlsl*$nhapkhau->sxchiphivldg+

       $nhapkhau->sxchiphidcsxsl*$nhapkhau->sxchiphidcsxdg+

       $nhapkhau->sxchiphikhtscdsl*$nhapkhau->sxchiphikhtscddg+

       $nhapkhau->sxchiphidvmnsl*$nhapkhau->sxchiphidvmndg+

       $nhapkhau->sxchiphitienksl*$nhapkhau->sxchiphitienkdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center">2</td>
        <td>Chi phí bán hàng</td>
        <td style="text-align: center">{{$nhapkhau->sxchiphibhdvt}}</td>
        <td style="text-align: center">{{dinhdangsothapphan($nhapkhau->sxchiphibhsl,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphibhdg,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphibhsl*$nhapkhau->sxchiphibhdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center">3</td>
        <td>Chi phí quản lý doanh nghiệp</td>
        <td style="text-align: center">{{$nhapkhau->sxchiphiqldndvt}}</td>
        <td style="text-align: center">{{dinhdangsothapphan($nhapkhau->sxchiphiqldnsl,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphiqldndg,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphiqldnsl*$nhapkhau->sxchiphiqldndg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center">4</td>
        <td>Chi phí tài chính</td>
        <td style="text-align: center">{{$nhapkhau->sxchiphitcdvt}}</td>
        <td style="text-align: center">{{dinhdangsothapphan($nhapkhau->sxchiphitcsl,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphitcdg,5)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($nhapkhau->sxchiphitcsl*$nhapkhau->sxchiphitcdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center"></td>
        <td>Tổng giá thành toàn bộ</td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right">{{dinhdangsothapphan(
        $nhapkhau->sxchiphinvlsl*$nhapkhau->sxchiphinvldg +

        $nhapkhau->sxchiphincsl*$nhapkhau->sxchiphincdg +

        $nhapkhau->sxchiphinvpxsl*$nhapkhau->sxchiphinvpxdg +

        $nhapkhau->sxchiphivlsl*$nhapkhau->sxchiphivldg +

        $nhapkhau->sxchiphidcsxsl*$nhapkhau->sxchiphidcsxdg +

        $nhapkhau->sxchiphikhtscdsl*$nhapkhau->sxchiphikhtscddg +

        $nhapkhau->sxchiphidvmnsl*$nhapkhau->sxchiphidvmndg +

        $nhapkhau->sxchiphitienksl*$nhapkhau->sxchiphitienkdg +

        $nhapkhau->sxchiphibhsl*$nhapkhau->sxchiphibhdg +

        $nhapkhau->sxchiphiqldnsl*$nhapkhau->sxchiphiqldndg +

        $nhapkhau->sxchiphitcsl*$nhapkhau->sxchiphitcdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-weight: bold">5</td>
        <td style="font-weight: bold">Lợi nhuận dự kiến</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->sxloinhuandkdvt}}</td>
        <td style="text-align: center; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxloinhuandksl,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxloinhuandkdg,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxloinhuandksl*$nhapkhau->sxloinhuandkdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-weight: bold"></td>
        <td style="font-weight: bold">Giá bán chưa thuế</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->sxgiabanctdvt}}</td>
        <td style="text-align: center; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxgiabanctsl,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxgiabanctdg,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxgiabanctsl*$nhapkhau->sxgiabanctdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-weight: bold">6</td>
        <td style="font-weight: bold">Thuế tiêu thụ đặc biệt (nếu có)</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->sxthuettdbdvt}}</td>
        <td style="text-align: center; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxthuettdbsl,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxthuettdbdg,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxthuettdbsl*$nhapkhau->sxthuettdbdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-weight: bold">7</td>
        <td style="font-weight: bold">Thuế giá trị gia tăng (nếu có)</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->sxthuegtgtdvt}}</td>
        <td style="text-align: center; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxthuegtgtsl,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxthuegtgtdg,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxthuegtgtsl*$nhapkhau->sxthuegtgtdg,5)}}</td>
    </tr>
    <tr>
        <td style="text-align: center; font-weight: bold"></td>
        <td style="font-weight: bold">Giá bán (đã có thuế)</td>
        <td style="text-align: center; font-weight: bold">{{$nhapkhau->sxgiabandvt}}</td>
        <td style="text-align: center; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxgiabansl,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxgiabandg,5)}}</td>
        <td style="text-align: right; font-weight: bold">{{dinhdangsothapphan($nhapkhau->sxgiabansl*$nhapkhau->sxgiabandg,5)}}</td>
    </tr>
    </tbody>
</table>
<p style="font-weight: bold">II. GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN MỤC CHI PHÍ CHO MỘT ĐƠN VỊ SẢN PHẨM HÀNG HÓA</p>

<p>1. Chi phí sản xuất<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtchiphisx}}</p>

<p>2. Chi phí bán hàng<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtchiphibh}}</p>

<p>3. Chi phí quản lý doanh nghiệp<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtchiphiqldn}}</p>

<p>4. Chi phí tài chính<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtchiphitc}}</p>

<p>5. Lợi nhuận dự kiến<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtloinhuandk}}</p>

<p>6. Thuế tiêu thụ đặc biệt (nếu có)<br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtthuettdb}}</p>

<p>10. Thuế giá trị gia tăng (nếu có) <br>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtthuegtgt}}</p>

<p>11. Giá bán (đac có thuế)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$nhapkhau->sxgtgiaban}}</p>
@endforeach
@stop