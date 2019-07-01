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
            font-size: 16px;
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

<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-transform: uppercase;">
            {{$modeldv->tendvcqhienthi}}<br>
            <b>{{$modeldv->tendvhienthi}}</b><br>
            --------<br>
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
        </td>
    </tr>
    <tr>
        <td>Số: {{$model->sotbkl}}<br>V/v thông báo kết quả thẩm định giá<br> {{$model->tttstd}}</td>
        <td><i>{{$modeldv->diadanh}} ,ngày .....tháng .....năm ..... </i> </td>
    </tr>
</table>
<p style="text-align: center;font-size: 20px;">Kính gửi: {{$model->dvyeucau}}</p>
<p>&emsp;&emsp;Căn cứ Luật giá số 11/2012/QH13 ngày 20/6/2012;</p>
<p>&emsp;&emsp;Căn cứ Nghị định số 89/2013/NĐ-CP ngày 6/8/2013 của Chính Phủ quy định chi tiết thi hành một số điều của Luật giá và thẩm định giá;</p>
<p>&emsp;&emsp;Căn cứ Thông tư số 38/2014/TT-BTC ngày 28/3/2014 của Bộ Tài chính hướng dẫn một số điều của Nghị định số 89/2013/NĐ-CP ngày 6/8/2013 của Chính
    phủ quy định chi tiết thi hành một số điều của Luật giá về thẩm định giá;</p>
<p>&emsp;&emsp;Căn cứ Quyết định số 21/2018/QĐ-UBND ngày 20/6/2018 của UBND tỉnh
    Cao Bằng về việc ban hành quy định quản lý Nhà nước về giá trên địa bàn tỉnh
    Cao Bằng;</p>
<p>&emsp;&emsp;Theo đề nghị của {{$model->dvyeucau}} tại Tờ trình {{$model->hosotdgia}} về việc đề nghị thẩm định giá {{$model->tttstd}};</p>
<p>&emsp;&emsp;{{$modeldv->tendvhienthi}} thông báo kết quả thẩm định giá như sau:</p>
<p>&emsp;&emsp;<b>1. Mục đích thẩm định giá</b></p>
<!--p>{{$model->mucdich}}</p-->
<p>&emsp;&emsp;Làm cơ sở để đơn vị tham khảo trong việc mua {{$model->tttstd}} phục vụ
    công tác theo quy định hiện hành.</p>
<p>&emsp;&emsp;<b>2. Thời điểm thẩm định giá</b></p>
<!--p>Tại thời điểm: {{getDayVn($model->thoidiem)}}</p-->
<p>&emsp;&emsp;Tại thời điểm: Tháng {{ date("m",strtotime($model->thoidiem))}}/{{ date("Y",strtotime($model->thoidiem))}}</p>
<p>&emsp;&emsp;<b>3. Nguyên tắc, cơ sở thẩm định giá</b></p>
<p>&emsp;&emsp;Căn cứ hồ sơ do đơn vị cung cấp;</p>
<p>&emsp;&emsp;Căn cứ vào kết quả khảo sát thông tin liên quan đến giá trị vật tư cùng loại;</p>
<p>&emsp;&emsp;<b>4. Phương pháp thẩm định giá</b></p>
<!--p>{{$model->ppthamdinh}}</p-->
<p>&emsp;&emsp;Áp dụng phương pháp so sánh, tiếp cận thông tin thị trường.</p>
<p>&emsp;&emsp;<b>5. Kết quả thẩm định giá</b></p>
<p>&emsp;&emsp;Trên cơ sở các tài liệu do đơn vị cung cấp, qua khảo sát thực tế tại thị trường
    {{$model->diadiem}} với phương pháp thẩm định giá trên được áp dụng trong tính
    toán, {{$modeldv->tendvhienthi}} thông báo kết quả thẩm định giá tại thời điểm Tháng {{ date("m",strtotime($model->thoidiem))}}/{{ date("Y",strtotime($model->thoidiem))}}.</p>
<p>&emsp;&emsp;Tổng giá trị sau thẩm định: <b>{{number_format($modelct->sum('giatritstd'))}}</b> VNĐ</p>
<p>&emsp;&emsp;<i>(Tổng số tiền sau thẩm định bằng chữ: {{VndText($modelct->sum('giatritstd'))}})</i></p>
<p>&emsp;&emsp;<i>(Chi tiết phụ lục đính kèm)</i></p>
<p>&emsp;&emsp;<b>6. Điều kiện, giới hạn kèm theo kết quả thẩm định giá</b></p>
<p>&emsp;&emsp;- Kết quả thẩm định giá chỉ được sử dụng cho một “Mục đích thẩm định giá” duy nhất theo yêu cầu của đơn vị đã được ghi tại phần đầu của Công văn thông báo kết quả thẩm định giá. Đơn vị phải hoàn toàn chịu trách nhiệm khi sử dụng sai mục đích đã yêu cầu.</p>
<p>&emsp;&emsp;- Kết quả thẩm định giá chỉ được tính cho {{$model->tttstd}} đã nêu ở trên. Việc sử dụng kết quả thẩm định giá này áp dụng cho sản phẩm khác dưới bất kỳ hình thức nào không có giá trị.</p>
<p>&emsp;&emsp;- Mức giá {{$model->tttstd}} thông báo nêu trên là mức giá trần, được đưa ra tư vấn trong điều kiện không được trực quan tiếp cận {{$model->tttstd}} cũng như đàm phán về điều kiện kỹ thụât, thương mại…. chỉ dựa trên thông tin về sản phẩm do đơn vị cung cấp. Chủ đầu tư có trách nhịêm quyết định mức giá {{$model->tttstd}} trong giao dịch cụ thể, đảm bảo tính hịêu quả cao nhất có thể.</p>
<p>&emsp;&emsp;- Mức giá của {{$model->tttstd}} sẽ không được xác nhận trong trường hợp sản phẩm không đầy đủ về cơ sở pháp lý cũng như thay đổi đặc tính kỹ thuật như: chất liệu, quy cách, thành phần…. hay thay đổi về đặc tính kinh tế như: xuất xứ, hãng sản xuất, chất lượng….</p>
<p>&emsp;&emsp;- Chỉ bản chính và bản sao Công văn thẩm định giá có đóng dấu đỏ do {{$modeldv->tendvhienthi}} cấp ra mới có giá trị. Mọi hành vi sử dụng bản sao kết quả thẩm định giá mà không có xác nhận của {{$modeldv->tendvhienthi}} đều vi phạm pháp lụât và không có giá trị.</p>
<p>&emsp;&emsp;<b>7.Thời hạn sử dụng kết quả thẩm định giá: </b>có hiệu lực trong vòng {{$model->songaykq}} ngày kể từ ngày ký.</p>
<p>&emsp;&emsp;{{$modeldv->tendvhienthi}} thông báo để đơn vị triển khai thực hiện theo quy định của pháp luật hiện hành./.</p>
<table width="96%" border="0" cellspacing="0" cellpadding="0" style="margin:10px auto;">
    <tr>
        <td style="text-align: left" width="40%">
            <b style="padding-top:0px;"><i>Nơi nhận:</i></b><br>
            - Như trên:<br>
            - Lưu: VT,QLG
        </td>

        <td style="text-align: center; text-transform: uppercase;font-size: 16px" width="60%">
            <b>@if($modeldv->chucvukythay != '')
                    KT. {{$modeldv->chucvuky}}<br> {{$modeldv->chucvukythay}}
                @else
                    {{$modeldv->chucvuky}}
                @endif
            </b>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <b style="text-transform: uppercase;">{{$modeldv->nguoiky}}</b>
        </td>
    </tr>
</table>
<p style="page-break-before: always">
<p style="text-align: center;font-weight:bold;font-size: 20px;text-transform: uppercase;">PHỤ LỤC</p>
<p style="text-align: center;font-size: 16px;"><i>(Kèm theo Công văn số: {{$model->sotbkl}}</i></p>
<p style="text-align: center;font-size: 16px;"><i>Ngày ..... tháng ..... năm ..... của {{$modeldv->tendvhienthi}})</i></p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <thead>
    <tr>
        <th width="2%" style="text-align: center" rowspan="2">STT</th>
        <th style="text-align: center" rowspan="2">Tên vật tư - Quy cách</th>
        <th style="text-align: center" rowspan="2">Thông số kỹ thuật</th>
        <th style="text-align: center" rowspan="2">Đơn<br>vị<br>tính</th>
        <th style="text-align: center" rowspan="2">Số<br>lượng</th>
        <th style="text-align: center" colspan="2">Giá đề nghị</th>
        <th style="text-align: center" colspan="2">Giá thẩm định</th>
    </tr>
    <tr>
        <th style="text-align: center">Đơn giá</th>
        <th style="text-align: center">Thành tiền</th>
        <th style="text-align: center">Đơn giá</th>
        <th style="text-align: center">Thành tiền</th>
    </tr>
    </thead>
    <tbody>
    @foreach($modelct as $key=>$tt)
        <tr>
            <td style="text-align: center">{{($key +1)}}</td>
            <td class="active">{{$tt->tents}}-{{$tt->dacdiempl}}</td>
            <td style="text-align: left">{{$tt->thongsokt}}</td>
            <td style="text-align: center">{{$tt->dvt}}</td>
            <td style="text-align: center">{{number_format($tt->sl)}}</td>
            <td style="text-align: right;">{{number_format($tt->nguyengiadenghi)}}</td>
            <td style="text-align: right;">{{number_format($tt->giadenghi)}}</td>
            <td style="text-align: right;">{{number_format($tt->nguyengiathamdinh)}}</td>
            <td style="text-align: right;">{{number_format($tt->giatritstd)}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td></td>
        <td style="text-align: center;font-weight: bold">Tổng cộng</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: right;font-weight: bold">{{number_format($modelct->sum('giadenghi'))}}</td>
        <td></td>
        <td style="text-align: right;font-weight: bold">{{number_format($modelct->sum('giatritstd'))}}</td>
    </tr>
    </tfoot>
</table>
<p style="text-align: center;font-weight: bold"><i>(Tổng giá trị sau thẩm định: <b>{{number_format($modelct->sum('giatritstd'))}}</b> VNĐ)</i></p>
<p><u>Ghi chú:</u></p>
<p>{!! nl2br(e($model->ghichu)) !!}</p>