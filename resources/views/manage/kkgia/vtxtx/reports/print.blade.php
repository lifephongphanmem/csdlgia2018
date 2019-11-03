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
        <td width="40%">
            <b>{{$modeldn->tendn}}</b><br>
            <hr style="width: 10%"> <br>
            Số: {{$modelkk->socv}}<br>V/v kê khai giá hàng hóa, dịch<br>vụ bán trong nước hoặc xuất<br>khẩu
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b><br>
            <hr style="width: 15%"> <br>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;"><i><u>Kính gửi</u></i>: {{$modelcqcq->tendv}}</p>

<p>Thực hiện quy định tại Thông tư liên tịch số 152/2014/TTLT-BTC-BGTVT ngày 15 tháng 10 năm 2014 của Bộ trưởng Bộ Tài chính và Bộ trưởng Bộ Giao thông vận tải hướng dẫn thực hiện giá cước vận tải bằng xe ô tô và giá dịch vụ hỗ trợ vận tải đường bộ;</p>

<p>{!! nl2br(e($modelkk->thqd)) !!}.<b>{{$modeldn->tendn}}</b> gửi Bảng kê mức giá vận tải bằng xe ô tô (đính kèm).</p>

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
            <br>
            <br>
            <br>
            <b style="text-transform: uppercase;">{{$modeldn->nguoiky}}</b>
        </td>
    </tr>
</table>
<p style="page-break-before: always">
    <!--Trang2-->
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%">
            <b>{{$modeldn->tendn}}</b><br>
            <hr style="width: 10%"> <br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b><br>
            <hr style="width: 15%"> <br>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
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
            <br>
            <br>
            <b style="text-transform: uppercase;">{{$modeldn->nguoiky}}</b>

        </td>
    </tr>
</table>
</body>
</html>