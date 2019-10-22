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
        <td>Số: {{$modelkk->socv}}<br>V/v đăng ký giá</td>
        <td>
            <i>{{$modeldn->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
        </td>
    </tr>
</table>
<p style="text-align: center; font-weight: bold; font-size: 16px;"><i><u>Kính gửi</u></i>: {{$modelcqcq->tendv}}</p>
<br><br>
<p>Thực hiện Thông tư số 56/2014/TT-BTC ngày 28/4/2014 của Bộ Tài chính hướng dẫn thực hiện Nghị định 177/2013/NĐ-CP ngày 14 tháng 11 năm 2013 của Chính phủ quy định chi tiết và hướng dẫn thi hành một số điều của Luật Giá và Thông tư số 233/2016/TT-BTC ngày 11/11/2016 của Bộ Tài chính sửa đổi, bổ sung một số điều của Thông tư số 56/2014/TT-BTC</p>

<p><b>{{$modeldn->tendn}}</b> gửi Biểu mẫu đăng ký {{$modelnghe->tennghe}} gồm các văn bản và nội dung sau.</p>

<p>1. Bảng đăng ký mức giá bán cụ thể</p>
<p>2. Giải trình lý do điều chỉnh giá (trong đó có giải thích việc tính mức giá cụ thể áp dụng theo các hướng dẫn, quy định về phương pháp tính giá do cơ quan có thẩm quyền ban hành)</p>

<p>Mức giá đăng ký này thực hiện từ ngày {{getDayVn($modelkk->ngayhieuluc)}}</p>

<p><b>{{$modeldn->tendn}}</b> xin chịu trách nhiệm trước pháp luật về tính đúng đắn của mức giá mà chúng tôi đã kê khai./.</p>

<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto;">
    <tr>
        <td style="text-align: left" width="40%">
            <b style="padding-top:0px;"><i>Nơi nhận:</i></b><br>
            - Như trên:<br>
            - Lưu.
            <br>

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
<p>- Người nộp biểu mẫu : {{$modelkk->nguoinop}}</p>
<p>- Số điện thoại liên lạc : {{$modelkk->dtlh}}</p>
<p>- Số Fax : {{$modelkk->fax}}</p>
<p style="font-weight: bold; text-align: center">Ghi nhận ngày nộp Biểu mẫu đăng ký giá <br>của cơ quan tiếp nhận Biểu mẫu đăng ký giá</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin-top: 5px;; border-collapse: collapse;width:15%">
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
        <th width="10%">Mức giá kê<br>khai hiện<br>hành</th>
        <th width="10%">Mức giá kê<br>khai mới</th>
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
</body>
</html>