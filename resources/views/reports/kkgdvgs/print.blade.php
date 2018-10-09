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
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG THÔNG BÁO GIÁ CỤ THỂ</p>
<p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</p>
<p style="text-align: left; font-size: 16px;">I. Mức thông báo</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th width="2%">STT</th>
        <th width="30%">Tên hàng hóa, dịch vụ</th>
        <th>Quy cách, <br>chất lượng</th>
        <th>Đơn vị<br>tính</th>
        <th width="10%">Mức giá kê<br>khai hiện<br>hành</th>
        <th width="10%">Mức giá kê<br>khai mới</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelkkct as $key=>$tt)
    <tr>
        <td style="text-align: center">{{$key+1}}</td>
        <td>{{$tt->tenhh}}</td>
        <td>{{$tt->qccl}}</td>
        <td style="text-align: center">{{$tt->dvt}}</td>
        <td style="text-align: right">{{number_format($tt->giaZdvlk)}}</td>
        <td style="text-align: right">{{number_format($tt->giaZdv)}}</td>
        <td>{{$tt->ghichu}}</td>
    </tr>
    @endforeach
</table>
<p style="text-align: left; font-size: 16px;">II. Phân tích nguyên nhân điều chỉnh tăng/giảm giá kê khai của từng mặt hàng</p>
<p>{!! nl2br(e($modelkk->ghichu)) !!}</p>
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
    <p style="text-align: center; font-weight: bold; font-size: 16px;"><b>PHƯƠNG ÁN GIÁ</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Tên mặt hàng: {{$ttpag->tenhh}}</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Quy cách chất lượng: {{$ttpag->qccl}}</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Đơn vị tính: {{$ttpag->dvt}}</b></p>
    <p style="text-align: left; font-size: 16px;"><b>Ghi chú: {{$ttpag->ghichu}}<b></b></p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <tr>
            <th width="2%">STT</th>
            <th>Nội dung chi phí</th>
            <th>Ký hiệu</th>
            <th>Thành tièn</th>
        </tr>
        <tr>
            <td style="text-align: center"><b>A</b></td>
            <td><b>Sản lượng tính giá</b></td>
            <td style="text-align: center"><b>Q</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaQ)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>B</b></td>
            <td><b>Chi phí sản xuất, kinh doanh</b></td>
            <td style="text-align: center"><b>C</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaC)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>I</b></td>
            <td><b>Chi phí trực tiếp</b></td>
            <td style="text-align: center"><b>Ctt</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaCtt)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center">1</td>
            <td>Chi phí nguyên liệu, vật liệu, công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</td>
            <td style="text-align: center">Cvt</td>
            <td style="text-align: right">{{number_format($ttpag->giaCvt)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">2</td>
            <td>Chi phí nhân công trực tiếp</td>
            <td style="text-align: center">Cnc</td>
            <td style="text-align: right">{{number_format($ttpag->giaCnc)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">3</td>
            <td>Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao)</td>
            <td style="text-align: center">Ckh</td>
            <td style="text-align: right">{{number_format($ttpag->giaCkh)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">4</td>
            <td>Chi phí sản xuất, kinh doanh (chưa tính ở trên) theo đặc thù của từng ngành, lĩnh vực</td>
            <td style="text-align: center">Ck</td>
            <td style="text-align: right">{{number_format($ttpag->giaCk)}}</td>
        </tr>
        <tr>
            <td style="text-align: center"><b>II</b></td>
            <td><b>Chi phí chung</b></td>
            <td style="text-align: center"><b>Cc</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaCc)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center">5</td>
            <td>Chi phí sản xuất chung (đối với doanh nghiệp)</td>
            <td style="text-align: center">Ccm</td>
            <td style="text-align: right">{{number_format($ttpag->giaCcm)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">6</td>
            <td>Chi phí tài chính (nếu có)</td>
            <td style="text-align: center">Ctc</td>
            <td style="text-align: right">{{number_format($ttpag->giaCtc)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">7</td>
            <td>Chi phí bán hàng</td>
            <td style="text-align: center">Cbh</td>
            <td style="text-align: right">{{number_format($ttpag->giaCbh)}}</td>
        </tr>
        <tr>
            <td style="text-align: center">8</td>
            <td>Chi phí quản lý</td>
            <td style="text-align: center">Cql</td>
            <td style="text-align: right">{{number_format($ttpag->giaCql)}}</td>
        </tr>
        <tr>
            <td style="text-align: center"><b></b></td>
            <td><b>Tổng chi phí sản xuất, kinh doanh</b></td>
            <td style="text-align: center"><b>TC</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaTC)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>C</b></td>
            <td><b>Chi phí phân bổ cho sản phẩm phụ (nếu có)</b></td>
            <td style="text-align: center"><b>CP</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaCP)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>D</b></td>
            <td><b>Giá thành toàn bộ (TC-CP)</b></td>
            <td style="text-align: center"><b>Z</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaZ)}}</b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>Đ</b></td>
            <td><b>Giá thành toàn bộ 01 (một) đơn vị sản phẩm (TC-CP)/Q</b></td>
            <td style="text-align: center"><b>Zđv</b></td>
            <td style="text-align: right"><b>{{number_format($ttpag->giaZdv)}}</b></td>
        </tr>
    </table>
@endforeach
</body>
</html>