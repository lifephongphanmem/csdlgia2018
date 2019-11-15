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
        <td style="vertical-align: top;">Số: {{$modelkk->socv}}<br>V/v kê khai giá <br> vận tải hành khách bằng xe chạy tuyến cố định</td>
        <td style="text-align: right;vertical-align: top;"><i style="margin-right: 25%;">{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i></td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">Kính gửi: {{$modelcqcq->tendv}}</p>
<br><br>
<p>Thực hiện quy định tại Thông tư liên tịch số 152/2014?TTLT-BTC-BGTVT ngày 15 tháng 10 năm 2014
    của Bộ trưởng Bộ Tài chính và Bộ trưởng Bộ Giao thông vận tải hướng dẫn thực hiện giá cước vận tải bằng xe ô tô và giá dịch vụ hỗ trợ vận tải đường bộ;</p>

<p><b>{{$modeldn->tendn}}</b> gửi Bảng kê khai mức giá vận tải hành khách bằng xe chạy tuyến cố định (đính kèm).</p>

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
<p>- Họ và tên người nộp Biểu mẫu : {{$modelkk->nguoinop}}</p>
<p>- Số điện thoại liên lạc : {{$modelkk->dtll}}</p>
<p>- Số Fax : {{$modelkk->fax}}</p>
<p style="font-weight: bold; text-align: center">Ghi nhận <br>của cơ quan tiếp nhận</p>
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

<p>3. Giấy chứng nhận kinh doanh {{$modeldn->giayphepkd}}</p>

<p>4. Nội dung kê khai theo từng loại hình vận tải, loại hình dịch vụ:</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;" id="data">
    <tr>
        <th width="2%">STT</th>
        <th style="text-align: center">Tên dịch vụ cung ứng</th>
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
        <td>{{$tt->tendvcu}}</td>
        <td>{{$tt->qccl}}</td>
        <td style="text-align: center">{{$tt->dvt}}</td>
        <td style="text-align: right">{{number_format($tt->gialk)}}</td>
        <td style="text-align: right">{{number_format($tt->giakk)}}</td>
        <td style="text-align: right">{{number_format($tt->giakk - $tt->gialk)}}</td>
        <td style="text-align: right">{{$tt->gialk == 0 ? '100' : number_format(($tt->giakk - $tt->gialk)/$tt->gialk*100)}}%</td>
        <td>{{$tt->ghichu}}</td>
    </tr>
    @endforeach
</table>
<p>5. Các yếu tố chi phí cấu thành giá (đối với kê khai lần đầu); phân tích nguyên nhân, nêu rõ biến động của các yếu tố hình thành giá, tác động làm tăng
 hoặc giảm giá(đối với kê khai lại)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$modelkk->ytcauthanhgia}}</p>
<p>6. Các trường hợp ưu đãi; giảm giá; điều kiện áp dụng giá (nếu có)</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$modelkk->thydggadgia}}</p>

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

@foreach($modelkkct as $ttpag)
    <!--Trang3-->
    <hr class="in">
    <p style="page-break-before: always">
    <div style="height:700px; margin: 0;overflow: auto; padding: 8px; border: 2px solid #000000; word-wrap: break-word;">
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
        <p style="text-align: center; font-weight: bold; font-size: 16px; margin-top: 100px; margin-bottom: 100px "><b>HỒ SƠ PHƯƠNG ÁN GIÁ</b></p>
        <p style="text-align: left">Tên dịch vụ: {{$ttpag->tendvcu}}</p>
        <p style="text-align: left">Tên đơn vị kinh doanh {{$modeldn->tendn}}</p>
        <p style="text-align: left">Địa chỉ: {{$modeldn->diachi}}</p>
        <p style="text-align: left">Số điện thoại: {{$modeldn->tel}}</p>
        <p style="text-align: left">Số fax: {{$modeldn->fax}}</p>
    </div>
    {{--Trang 4--}}
    <hr class="in">
    <p style="page-break-before: always">
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
            <td style="vertical-align: top;">Số: {{$modelkk->socv}}<br>V/v thẩm định phương án giá <br> vận tải hành khách bằng xe chạy tuyến cố định</td>
            <td style="text-align: right;vertical-align: top;"><i style="margin-right: 25%;">{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i></td>
        </tr>
    </table>
    <p style="text-align: center; font-weight: bold; font-size: 16px;">Kính gửi: {{$modelcqcq->tendv}}</p>
    <br><br>
    <p>Thực hiện quy định tại Thông tư liên tịch số 152/2014?TTLT-BTC-BGTVT ngày 15 tháng 10 năm 2014
        của Bộ trưởng Bộ Tài chính và Bộ trưởng Bộ Giao thông vận tải hướng dẫn thực hiện giá cước vận tải bằng xe ô tô và giá dịch vụ hỗ trợ vận tải đường bộ;</p>

    <p><b>{{$modeldn->tendn}}</b> đã lập phương án giá dịch vụ vận tải hành khách bằng xe chạy tuyến cố định (có phương án giá kèm theo).</p>
    <p>Đề nghị {{$modelcqcq->tendv}} xem xét phê duyệt giá dịch vụ vận tải hành khách bằng xe chạy tuyến cố định theo quy định của pháp luật./.</p>

    <table width="96%" border="0" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
        <tr>
            <td width="40%" style="text-align: left; vertical-align: top;">
                <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
                - Như trên:<br>
                - Lưu VT, {{$modeldn->tendn}}
            </td>
            <td style="vertical-align: top;">
                <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
                <i>(Ký tên, đóng dấu)</i>
            </td>
        </tr>
    </table>
    <!--Trang4-->
    <hr class="in">
    <p style="page-break-before: always">
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
    <p style="text-align: center; font-weight: bold; font-size: 16px;"><b>PHƯƠNG ÁN GIÁ
        </b></p>
    <p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</p>
    <p style="text-align: left; font-size: 16px;"><b>Tên dịch vụ: {{$ttpag->tendvcu}}</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Đơn vị cung ứng: {{$ttpag->dvcu}}</b></p>
    <p><b>I. BẢNG TỔNG HỢP TÍNH GIÁ </b></p>

    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <tr>
            <th width="2%">STT</th>
            <th>Khoản mục chi phí</th>
            <th>ĐVT</th>
            <th>Thành tiền</th>
            <th>Ghi chú</th>
        </tr>
        <tr>
            <td style="text-align: center"><b>A</b></td>
            <td><b>Sản lượng tính giá (Q)</b></td>
            <td style="text-align: center"><b>{{$ttpag->sltgdvt}}</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->sltgtt)}}</b></td>
            <td style="text-align: right"><b>{{$ttpag->sltggc}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>B</b></td>
            <td><b>Chi phí sản xuất, kinh doanh</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b></b></td>
            <td style="text-align: right"><b></b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>I</b></td>
            <td><b>Chi phí trực tiếp:</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b></b></td>
            <td style="text-align: right"><b></b></td>
        </tr>
        <tr>
            <td style="text-align: center">1</td>
            <td>Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</td>
            <td style="text-align: center">{{$tt->chiphinldvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphinltt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphinlgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td>Chi phí nhân công trực tiếp</td>
            <td style="text-align: center">{{$ttpag->chiphincdvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphinctt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphincgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td>Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao)</td>
            <td style="text-align: center">{{$ttpag->chiphikhdvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphikhtt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphikhgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center">4</td>
            <td>Chi phí sản xuất, kinh doanh (chưa tính ở mục 1,2,3) theo đặc thù</td>
            <td style="text-align: center">{{$ttpag->chiphisxkddtdvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphisxkddttt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphisxkddtgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center"><b>II</b></td>
            <td><b>Chi phí chung</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b></b></td>
            <td style="text-align: right"><b></b></td>
        </tr>
        <tr>
            <td style="text-align: center">5</td>
            <td>Chi phí sản xuất chung</td>
            <td style="text-align: center">{{$ttpag->chiphisxcdvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphisxctt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphisxcgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center">6</td>
            <td>Chi phí tài chính (nếu có)</td>
            <td style="text-align: center">{{$ttpag->chiphitcdvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphitctt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphitcgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center">7</td>
            <td>Chi phí bán hàng</td>
            <td style="text-align: center">{{$ttpag->chiphibhdvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphibhtt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphibhgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center">8</td>
            <td>Chi phí quản lý</td>
            <td style="text-align: center">{{$ttpag->chiphiqldvt}}</td>
            <td style="text-align: right">{{number_format($ttpag->chiphiqltt)}}</td>
            <td style="text-align: right">{{$ttpag->chiphiqlgc}}</td>
        </tr>
        <tr>
            <td style="text-align: center"><b></b></td>
            <td><b>Tổng chi phí sản xuất, kinh doanh (TC)</b></td>
            <td style="text-align: center"></td>
            <td style="text-align: right"><b>{{number_format($ttpag->chiphinltt + $ttpag->chiphinctt + $ttpag->chiphikhtt
                                        + $ttpag->chiphisxkddttt + $ttpag->chiphisxctt + $ttpag->chiphitctt
                                        + $ttpag->chiphibhtt + $ttpag->chiphiqltt)}}</b></td>
            <td style="text-align: right"><b></b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>C</b></td>
            <td><b>Chi phí phân bổ cho dịch vụ khác (nếu có) (CP)</b></td>
            <td style="text-align: center"><b>{{$ttpag->chiphidvkdvt}}</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->chiphidvktt)}}</b></td>
            <td style="text-align: right"><b>{{$ttpag->chiphidvkgc}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>D</b></td>
            <td><b>Giá thành toàn bộ (TC-CP)</b></td>
            <td style="text-align: center"></td>
            <td style="text-align: right"><b>{{number_format($ttpag->chiphinltt + $ttpag->chiphinctt + $ttpag->chiphikhtt
                                        + $ttpag->chiphisxkddttt + $ttpag->chiphisxctt + $ttpag->chiphitctt
                                        + $ttpag->chiphibhtt + $ttpag->chiphiqltt - $ttpag->chiphidvktt)}}</b></td>
            <td style="text-align: right"><b></b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>Đ</b></td>
            <td><b>Giá thành toàn bộ 01 (một) đơn vị sản phẩm, dịch vụ (TC-CP)/Q</b></td>
            <td style="text-align: center"></td>
            <td style="text-align: right"><b>{{$ttpag->sltgtt != 0 ? number_format(($ttpag->chiphinltt + $ttpag->chiphinctt + $ttpag->chiphikhtt
                                        + $ttpag->chiphisxkddttt + $ttpag->chiphisxctt + $ttpag->chiphitctt
                                        + $ttpag->chiphibhtt + $ttpag->chiphiqltt - $ttpag->chiphidvktt)/$ttpag->sltgtt) : 0}}</b></td>
            <td style="text-align: right"><b></b></td>
        </tr>
    </table>
<p><b>II . GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN CHI PHÍ (từ mục 1 đến mục 8 bảng tổng hợp tính giá)</b></p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ttpag->giaitrinhctcp}}</p>
@endforeach

@stop