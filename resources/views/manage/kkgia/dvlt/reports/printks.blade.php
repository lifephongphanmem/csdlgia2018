<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
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
        <td width="40%">
            Số: {{$modelkk->socv}}<br>
            <i>V/v kê khai giá dịch vụ lưu trú</i>
        </td>
        <td>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>


<p style="text-align: center; font-weight: bold; font-size: 16px;"><i><u>Kính gửi</u></i>: {{$modelcqcq->tendv}}</p>

<p>Doanh nghiệp chúng tôi tự xây dựng và kê khai giá dịch vụ lưu trú như sau:</p>

<p>-Tên doanh nghiệp: <span>{{$modeldn->tendn}}</span></p>

<p>-Mã số thuế <span>{{$modeldn->masothue}}</span> </p>

<p>-Địa chỉ trụ sở chính: {{$modeldn->diachidn}}</p>

<p>-Điện thoại: {{$modeldn->teldn}}     -     Số fax: {{$modeldn->faxdn}}</p>

<p>-Tên cơ sở kinh doanh: <span>{{$modelcskd->tencskd}}</span></p>

<p>-Loại hạng của cơ sở kinh doanh:@if($modelcskd->loaihang == 'CXD') Chưa xác định (Khách sạn chưa xác định sao) @elseif($modelcskd->loaihang == 'K') Khác (Nhà nghỉ) @else  {{$modelcskd->loaihang}} sao @endif</p>

<p>-Địa chỉ: {{$modelcskd->diachikd}}    -      Điện thoại: {{$modelcskd->telkd}}</p>

<p>Nơi đăng ký nộp thuế của cơ sở kinh doanh đăng ký giá: {{$modeldn->noidknopthue}}</p>

<p>{{$modeldn->tendn}} gửi Bảng kê khai giá dịch vụ lưu trú và kê khai thực hiện kể từ ngày <span>{{getDayVn($modelkk->ngayhieuluc)}}</span></p>
@if($modelkk->socvlk != '')
<p>Bảng kê khai giá gửi kèm theo công văn này sẽ thay thế cho Bảng kê khai giá kèm theo công văn số {{$modelkk->socvlk}}- ngày {{ date("d",strtotime($modelkk->ngaycvlk))}} tháng {{ date("m",strtotime($modelkk->ngaycvlk))}} năm {{ date("Y",strtotime($modelkk->ngaycvlk))}}.</p>
@endif

<p>{{$modeldn->tendn}} xin chịu trách nhiệm trước pháp luật về tính đúng đắn của mức giá mà chúng tôi kê khai.</p>

<p>Đề nghị quý cơ quan ghi nhận ngày nộp Biểu mẫu kê khai giá của {{$modeldn->tendn}} theo quy định</p>

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:10px auto;">
    <tr>
        <td style="text-align: left" width="40%">
            <b style="padding-top:0px;"><i>Nơi nhận:</i></b><br>
            - Như trên:<br>
            - Lưu.<br>
            @if($modelkk->sohsnhan != '')
                <p style="text-align: center">
                Cơ quan tiếp nhận biểu mẫu kê khai giá<br>
                ghi nhận ngày nộp biểu mẫu kê khai giá<br></p>
                <table  cellspacing="0" cellpadding="0" border="1" style="margin-top: 5px; border-collapse: collapse;">
                    <tr>
                        <td><b>{{$modelcqcq->tendv}}</b></td>
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

        <td style="text-align: center; text-transform: uppercase;" width="60%" >
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
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG KÊ KHAI GIÁ DỊCH VỤ LƯU TRÚ</p>
<p style="text-align: center;">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldn->tendn}})</p>
<p style="text-align: right; font-size: 16px;"><i>Đơn vị tính: {{$modelkk->dvt}}</i></p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="text-align: center">Loại phòng/ Quy<br>cách chất lượng<br>phòng</th>
        <th style="text-align: center">Số hiệu<br>Phòng</th>
        <th style="text-align: center">Đối tượng</th>
        <th style="text-align: center">Áp dụng</th>
        <th style="text-align: center">Mức giá kê<br>khai trước<br>liền kề</th>
        <th style="text-align: center">Mức giá kê<br>khai</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelkkct as $ctkk)
        <tr>
            <th style="text-align: left">{{$ctkk->loaip.'-'.$ctkk->qccl}}</th>
            <th style="text-align: left">{{getTtPhong($ctkk->sohieu)}}</th>
            <th style="text-align: left">{{$ctkk->tendoituong}}</th>
            <th style="text-align: left">{{$ctkk->apdung}}</th>
            <th style="text-align: right">{{number_format($ctkk->mucgialk)}}</th>
            <th style="text-align: right">{{number_format($ctkk->mucgiakk)}}</th>
            <th>{{$ctkk->ghichu}}</th>
        </tr>
    @endforeach
</table>
<p>{!! nl2br(e($modelkk->ghichu)) !!}
@if($modelkk->socvlk != '')<br>
    - Mức giá kê khai trước liền kề tại công văn số {{$modelkk->socvlk}} ngày {{getDayVn($modelkk->ngaycvlk)}} của {{$modeldn->tendn}}</p>
@endif
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:10px auto; text-align: center;">
    <tr>
        <td style="text-align: center;" width="40%" >
            @if($modelkk->sohsnhan != '')
                Cơ quan tiếp nhận biểu mẫu kê khai giá<br>
                ghi nhận ngày nộp biểu mẫu kê khai giá<br>
                <table  cellspacing="0" cellpadding="0" border="1" style="margin-top: 5px;; border-collapse: collapse;">
                    <tr>
                        <td><b>{{$modelcqcq->tendv}}</b></td>
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

<p style="page-break-before: always">
<!--Trang3-->
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modeldn->tendn}}</b><br>
            Địa chỉ: {{$modeldn->diachidn}}<br>
            Mã số thuế: {{$modeldn->masothue}}
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG GIÁ PHÒNG</p>
<p style="text-align: center;">Thực hiện từ ngày {{ date("d",strtotime($modelkk->ngayhieuluc))}} tháng {{ date("m",strtotime($modelkk->ngayhieuluc))}} năm {{ date("Y",strtotime($modelkk->ngayhieuluc))}} <br>(Theo bảng giá đã kê khai với cơ quan tài chính  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} )</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="text-align: center">Loại phòng/ Quy<br>cách chất lượng<br>phòng</th>
        <th style="text-align: center">Số hiệu<br>Phòng</th>
        <th style="text-align: center">Đối tượng</th>
        <th style="text-align: center">Áp dụng</th>
        <th width="15%">Mức giá niêm<br>yết</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelkkct as $ctkk)
        <tr>
            <th style="text-align: left">{{$ctkk->loaip.' - '.$ctkk->qccl}}</th>
            <th style="text-align: left">{{getTtPhong($ctkk->sohieu)}}</th>
            <th style="text-align: left">{{$ctkk->tendoituong}}</th>
            <th style="text-align: left">{{$ctkk->apdung}}</th>
            <th style="text-align: right">{{number_format($ctkk->mucgiakk)}}</th>
            <th>{{$ctkk->ghichu}}</th>
        </tr>
    @endforeach
</table>
<p>{!! nl2br(e($modelkk->ghichu)) !!}<br>
    Cơ sở kinh doanh chúng tôi cam kết thực hiện niêm yết giá và bán theo giá niêm yết.<br>
    Nếu sai cơ sở chúng tôi xin hoàn toàn chịu trách nhiệm trước pháp luật.<br>
    Khi cần quý khách có thể liên hệ theo các số điện thoại sau, nếu cơ sở chúng tôi không thực hiện đúng bảng giá đã niêm yết:<br>
    {!! nl2br(e($modelcqcq->ttlh)) !!}
</p>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:10px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="40%">

        </td>
        <td style="text-align: center; text-transform: uppercase;" width="60%">
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
</body>
</html>
