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
        span {
            text-transform: uppercase;
            font-weight: bold;
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
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modeldn->tendn}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
    <tr>
        <td>Số: {{$modelkk->socv}}<br>V/v thông báo giá</td>
        <td>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;"><i><u>Kính gửi</u></i>: {{$modelcqcq->tendv}}</p>

<p>{!! nl2br(e($modelkk->thqd)) !!}.<b>{{$modeldn->tendn}}</b> gửi Bảng thông báo giá hàng hoá, dịch vụ (đính kèm).</p>

<p>Mức giá kê khai này thực hiện từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</p>

<p><b>{{$modeldn->tendn}}</b> xin chịu trách nhiệm trước pháp luật về tính đúng đắn của mức giá mà chúng tôi đã kê khai./.</p>

<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto;">
    <tr>
        <td style="text-align: left" width="40%">
            <b style="padding-top:0px;"><i>Nơi nhận:</i></b><br>
            - Như trên:<br>
            - Lưu.
            <br>
            @if($modelkk->sohsnhan != '')
                <table  cellspacing="0" cellpadding="0" border="1" style="margin-top: 5px;; border-collapse: collapse;">
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
            @endif
        </td>

        <td style="text-align: center; text-transform: uppercase;" width="60%">
            <b>{{$modeldn->chucdanhky != '' ? $modeldn->chucdanhky : 'Giám đốc'}}</b>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <b style="text-transform: uppercase;">{{$modeldn->nguoiky}}</b>
        </td>
    </tr>
</table>
<p style="page-break-before: always">
    <!--Trang2-->
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 25px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modeldn->tendn}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG KÊ KHAI MỨC GIÁ</p>
<p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%">STT</th>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
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
        <td>{{$tt->mahh}}</td>
        <td>{{$tt->tenhh}}</td>
        <td>{{$tt->qccl}}</td>
        <td style="text-align: center">{{$tt->dvt}}</td>
        <td style="text-align: right">{{number_format($tt->gbdctlk)}}</td>
        <td style="text-align: right">{{number_format($tt->gbdct)}}</td>
        <td></td>
        <td></td>
        <td>{{$tt->ghichu}}</td>
    </tr>
    @endforeach
</table>

<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto; text-align: center;">
    <tr>
        <td></td>
        <td style="text-align: center;text-transform: uppercase; " width="60%">
            <b>{{$modeldn->chucdanhky != '' ? $modeldn->chucdanhky : 'Giám đốc'}}</b><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <b style="text-transform: uppercase;">{{$modeldn->nguoiky}}</b>

        </td>
    </tr>
</table>
<!--Trang3-->
@foreach($modelkkct as $ttpag)
    <p style="page-break-before: always">
    <table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 25px; text-align: center;">
        <tr>
            <td width="40%" style="text-transform: uppercase;">
                <b>{{$modeldn->tendn}}</b><br>
                --------<br>
            </td>
            <td>
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
                <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
            </td>
        </tr>
    </table>
    <p style="text-align: center; font-weight: bold; font-size: 16px;"><b>THUYẾT MINH CƠ CẤU TÍNH GIÁ<br>
            HÀNG HÓA, DỊCH VỤ  ĐĂNG KÝ GIÁ
        </b></p>
    <p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</p>
    <p style="text-align: center"><b>(Đối với mặt hàng sản xuất trong nước)</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Tên mặt hàng: {{$ttpag->tenhh}}</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Quy cách chất lượng: {{$ttpag->qccl}}</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Đơn vị tính: {{$ttpag->dvt}}</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Ghi chú: {{$ttpag->ghichu}}<b></b></p>
    <p><b>I. BẢNG TỔNG HỢP TÍNH GIÁ VỐN, GIÁ BÁN HÀNG HÓA, DỊCH VỤ</b></p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <tr>
            <th width="2%">STT</th>
            <th>Khoản mục chi phí</th>
            <th>ĐVT</th>
            <th>Thành tiền</th>
        </tr>
        <tr>
            <td style="text-align: center"><b>1</b></td>
            <td><b>Chi phí sản xuất</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b></b></td>
        </tr>
        <tr>
            <td style="text-align: center">1.1</td>
            <td><b>Chi phí phí nguyên liệu, vật liệu trực tiếp</b></td>
            <td style="text-align: center"></td>
            <td style="text-align: right"><b>{{number_format($ttpag->cpnvltt)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center">1.2</td>
            <td><b>Chi phí nhân công trực tiếp</b></td>
            <td style="text-align: center"></td>
            <td style="text-align: right"><b>{{number_format($ttpag->cpnctt)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center">1.3</td>
            <td>Chi phí sản xuất chung:</td>
            <td style="text-align: center"></td>
            <td style="text-align: right"></td>
        </tr>
        <tr>
            <td style="text-align: center">a</td>
            <td><i>Chi phí nhân viên phân xưởng</i></td>
            <td style="text-align: center"></td>
            <td style="text-align: right">{{number_format($ttpag->cpnvpx)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">b</td>
            <td><i>Chi phí vật liệu</i></td>
            <td style="text-align: center"></td>
            <td style="text-align: right">{{number_format($ttpag->cpvl)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">c</td>
            <td>Chi phí dụng cụ sản xuất</td>
            <td style="text-align: center"></td>
            <td style="text-align: right">{{number_format($ttpag->cpdcsx)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">d</td>
            <td>Chi phí khấu hao TSCĐ</td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->cpkhtscd)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center">đ</td>
            <td><i>Chi phí dịch vụ mua ngoài</i></td>
            <td style="text-align: center"></td>
            <td style="text-align: right">{{number_format($ttpag->cpdvmn)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">e</td>
            <td><i>Chi phí bằng tiền khác</i></td>
            <td style="text-align: center"></td>
            <td style="text-align: right">{{number_format($ttpag->cpbtk)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">1.4</td>
            <td>Chi phí khác</td>
            <td style="text-align: center"></td>
            <td style="text-align: right">{{number_format($ttpag->cpk)}}</td>
        </tr>
        <tr>
            <td style="text-align: center"></td>
            <td><b>Tổng chi phí sản xuất:</b></td>
            <td style="text-align: center"></td>
            <td style="text-align: right">{{number_format($ttpag->tcpsx)}}</td>
        </tr>
        <tr>
            <td style="text-align: center"><b>2</b></td>
            <td><b>Chi phí bán hàng</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->cpbh)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>3</b></td>
            <td><b>Chi phí quản lý doanh nghiệp</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->cpqldn)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>4</b></td>
            <td><b>Chi phí tài chính</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->cptc)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b></b></td>
            <td><b>Tổng giá thành toàn bộ</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->tgttb)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>5</b></td>
            <td><b>Lợi nhuận dự kiến</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->lndk)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b></b></td>
            <td><b>Giá bán chưa thuế</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->gbct)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>6</b></td>
            <td><b>Thuế tiêu thụ đặc biệt (nếu có)</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->thuettdb)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>7</b></td>
            <td><b>Thuế giá trị gia tăng (nếu có)</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->thuegtgt)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b></b></td>
            <td><b>Giá bán (đã có thuế)</b></td>
            <td style="text-align: center"><b></b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->gbdct)}}</b></td>
        </tr>
    </table>
@endforeach
</body>
</html>