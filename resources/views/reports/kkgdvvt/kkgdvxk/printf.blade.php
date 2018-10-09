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
        span{
            text-transform: uppercase;
            font-weight: bold;

        }
    </style>
</head>
<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modeldonvi->tendonvi}}</b><br>
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
            <i>V/v kê khai giá dịch vụ vận tải bằng ô tô</i>
        </td>
        <td>
            <i>{{$modeldonvi->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>


<p>Kính gửi: {{$modeldonvi->tendvcp}}</p>

<p>Thực hiện quy định tại Thông tư liên tịch số 152/2014/TTLT-BTC-BGTVT
    ngày 15 tháng 10 năm 2014 của Bộ trưởng Bộ Tài chính và Bộ trưởng
    Bộ Giao thông vận tải hướng dẫn thực hiện giá cước vận tải bằng xe
    ô tô và giá dịch vụ hỗ trợ vận tải đường bộ;</p>

<p>{{$modeldonvi->tendonvi}} gửi Bảng kê mức giá vận tải bằng xe ô tô (đính kèm).</p>

<p>Mức giá kê khai này thực hiện từ ngày <span>{{getDayVn($modelkk->ngayhieuluc)}}</span></p>

<p>{{$modeldonvi->tendonvi}} xin chịu trách nhiệm trước pháp luật về tính chính xác của mức giá mà chúng tôi đã kê khai./.</p>

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="60%">
            <b><i>Nơi nhận:</i></b><br>
            - Như trên:<br>
            - Lưu.
        </td>
        <td style="text-align: center; text-transform: uppercase;" width="40%">
            <b>{{$modeldonvi->chucdanh}}</b><br> <span style="font-style: italic; font-weight: normal; text-transform: none">(Ký tên, đóng dấu)</span>

        </td>
    </tr>
    <tr></tr>
    <tr>
        <td style="height: 100px"></td>
        <td><span style="text-align: center;">{{$modeldonvi->nguoiky}}</span></td>
    </tr>
</table>

<p>- Họ tên người nộp Biểu mẫu: {{$modelkk->nguoinop}}</p>
<p>- Số điện thoại liên lạc: {{$modeldonvi->dienthoai}}</p>
<p>- Số fax: {{$modelkk->fax}}</p>

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:100px auto; text-align: center;">
    <tr>
        <td style="text-align: center;">
            <span>Ghi nhận của cơ quan tiếp nhận</span><br>
            <span style="font-style: italic; font-weight: normal; text-transform: none">(Cơ quan tiếp nhận Biểu mẫu kê khai giá ghi ngày, tháng, năm <br>
            nhận được Biểu mẫu kê khai giá và đóng dấu công văn đến)<br></span>
            <br><br><br><br>
        </td>
    </tr>
</table>
<p style="page-break-before: always">

    <!--Trang2-->
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 25px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            <b>{{$modeldonvi->tendonvi}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;">BẢNG KÊ KHAI MỨC GIÁ</p>
<p style="text-align: center; font-style: italic">(Kèm theo công văn số {{$modelkk->socv}}  ngày {{ date("d",strtotime($modelkk->ngaynhap))}} tháng {{ date("m",strtotime($modelkk->ngaynhap))}} năm {{ date("Y",strtotime($modelkk->ngaynhap))}} của {{$modeldonvi->tendonvi}})</p>

<p>1. Tên đơn vị thực hiện kê khai giá: {{$modeldonvi->tendonvi}}</p>
<p>2. Trụ sở (nơi đơn vị đăng ký kinh doanh): {{$modeldonvi->diachi}}</p>
<p>3. {{$modeldonvi->giayphepkd}}</p>
<p>4. Nội dung kê khai theo từng loại hình vận tải, loại hình dịch vụ:</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>Tên dịch vụ</th>
        <th>Quy cách, chất lượng</th>
        <th>Đơn vị<br>tính</th>
        <th>Mức giá kê khai<br>hiện hành</th>
        <th>Mức giá kê khai<br> mới hoặc kê<br>khai lại</th>
        <th>% tăng hoặc<br>giảm giá</th>
        <th>Ghi chú</th>
    </tr>
    @foreach($modelgia as $ctkk)
        <tr>
            <th style="text-align: left; font-weight: normal">{{$ctkk->tendichvu}}</th>
            <th style="text-align: left; font-weight: normal">{{$ctkk->qccl}}</th>
            <th style="text-align: left; font-weight: normal">{{$ctkk->dvt}}</th>
            <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakklk)}}</th>
            <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakk)}}</th>
            <th style="text-align: center; font-weight: normal">
                <?php
               if($ctkk->giakklk>0)
                   if($ctkk->giakklk>$ctkk->giakk)
                       echo '-'.round(($ctkk->giakklk-$ctkk->giakk)/$ctkk->giakklk * 100, 2) . '%';
                    else
                        echo round(($ctkk->giakk-$ctkk->giakklk)/$ctkk->giakk*100,2) . '%';
                ?>
            </th>
            <th style="text-align: left; font-weight: normal">{!! nl2br(e($ctkk->ghichu)) !!}</th>
        </tr>
    @endforeach
</table>
@if(count($model_hl)>0)
    <p>   Giá cước vận chuyển hành lý :</p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <tr>
            <th>Tên dịch vụ</th>
            <th>Quy cách, chất lượng</th>
            <th>Đơn vị<br>tính</th>
            <th>Mức giá kê khai<br>hiện hành</th>
            <th>Mức giá kê khai<br> mới hoặc kê<br>khai lại</th>
            <th>% tăng hoặc<br>giảm giá</th>
            <th>Ghi chú</th>
        </tr>
        @foreach($model_hl as $ctkk)
            <tr>
                <th style="text-align: left; font-weight: normal">{{$ctkk->tendichvu}}</th>
                <th style="text-align: left; font-weight: normal">{{$ctkk->qccl}}</th>
                <th style="text-align: left; font-weight: normal">{{$ctkk->dvt}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giahllk)}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giahl)}}</th>
                <th style="text-align: center; font-weight: normal">
                    <?php
                    if($ctkk->giahllk>0)
                        if($ctkk->giahllk>$ctkk->giahl)
                            echo '-'.round(($ctkk->giahllk-$ctkk->giahl)/$ctkk->giahllk * 100, 2) . '%';
                        else
                            echo round(($ctkk->giahl-$ctkk->giahllk)/$ctkk->giahl*100,2) . '%';
                    ?>
                </th>
                <th style="text-align: left; font-weight: normal">{!! nl2br(e($ctkk->ghichu)) !!}</th>
            </tr>
        @endforeach
    </table>
@endif
<p>5. Các yếu tố chi phí cấu thành giá (đối với kê khai lần đầu); phân tích nguyên nhân, nêu rõ biến động của các yếu tố hình thành giá tác động làm tăng hoặc giảm giá (đối với kê khai lại).</p>
<p>{!! nl2br(e($modelkk->ghichu)) !!}</p>
<p>6. Các trường hợp ưu đãi, giảm giá; điều kiện áp dụng giá (nếu có).</p>
<p>{!! nl2br(e($modelkk->uudai)) !!}</p>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
    <tr>
        <td style="text-align: left;" width="60%">
        </td>
        <td style="text-align: center;text-transform: uppercase; " width="40%">
            <b>{{$modeldonvi->chucdanh}}</b><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <b style="text-transform: uppercase;">{{$modeldonvi->nguoiky}}</b>
        </td>
    </tr>

</table>

<!--p style="page-break-before: always"-->
</body>
</html>