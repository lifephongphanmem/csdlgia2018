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
<!--Trang 3-->
    <!-- phần 1 -->
    <p style="text-align: center; font-weight: bold; font-size: 14px;">Phụ lục số 1</p>
    <p style="text-align: center; font-weight: bold; font-size: 16px;">MẪU VĂN BẢN KÊ KHAI GIÁ</p>
    <span style="text-align: center; font-style: italic; font-weight: normal; text-transform: none"><p style="text-align: center">(Ban hành kèm theo Thông tư liên tịch  số 152/2014/TTLT/BTC-BGTVT ngày
            </br>15/10/2014 của Bộ trưởng Bộ Tài chính và Bộ trưởng Bộ Giao thông vận tải)</p></span>

    <table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 25px; text-align: center;">
        <tr>
            <td>
                <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
                <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b><br>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <span style="text-align: center; font-weight: bold"><p style="font-size: 16px; text-align: center">PHƯƠNG ÁN GIÁ</p></span>
    <br>
    <br>
    <br>
    <br>
    <p> Tên dịch vụ: Kinh doanh vận tải hành khách bằng xe chạy hợp đồng</p>
    <p> Tên đơn vị kinh doanh dịch vụ:</p>
    <span><p style="text-align: center; font-weight: bold">{{$modeldonvi->tendonvi}}</p></span>
    <p> Địa chỉ: {{$modeldonvi->diachi}}</p>
    <p> Số điện thoại: {{$modeldonvi->dienthoai}}</p>
    <p> Số Fax: {{$modeldonvi->fax}}</p>

    <br><br><br><br><br><br><br><br><br>
    <p style="font-size: 14px; text-align: center; font-weight: bold">Khánh Hoà, tháng ... năm ...</p>
    <br><br>

    <p style="page-break-before: always"></p>
    <!-- Hết phần 1 -->
        <!-- Phần 2 -->
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
                <i>V/v kê khai giá dịch vụ vận tải bằng xe taxi</i>
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

    <p>- Họ tên người nộp Biểu mẫu: {{$modelkk->ttnguoinop}}</p>
    <p>- Số điện thoại liên lạc: {{$modelkk->telnguoinop}}</p>
    <p>- Số fax: {{$modelkk->faxnguoinop}}</p>

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
    <p style="page-break-before: always"></p>

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
            <th rowspan="2">STT</th>
            <th rowspan="2">Tên dịch vụ</th>
            <th rowspan="2">Quy cách, chất lượng</th>
            <th rowspan="2">Đơn vị<br>tính</th>
            <th colspan="3">Mức giá kê khai<br>hiện hành</th>
            <th colspan="3">Mức giá kê khai<br> mới hoặc kê<br>khai lại</th>
            <th rowspan="2">% tăng hoặc<br>giảm giá</th>
            <th rowspan="2">Ghi chú</th>
        </tr>
        <tr>
            <th>Giá mở cửa</th>
            <th>Giá km tiếp theo đến km30</th>
            <th>Giá từ km31 trở lên</th>
            <th>Giá mở cửa</th>
            <th>Giá km tiếp theo đến km30</th>
            <th>Giá từ km31 trở lên</th>
        </tr>
        @foreach($modelgia as $key=>$ctkk)
            <tr>
                <th style="text-align: center; font-weight: normal">{{$key +1}}</th>
                <th style="text-align: left; font-weight: normal">{{$ctkk->tendichvu}}</th>
                <th style="text-align: left; font-weight: normal">{{$ctkk->qccl}}</th>
                <th style="text-align: left; font-weight: normal">{{$ctkk->dvt}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakklk).' /'.$ctkk->trenkmlk.'km'}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakklkden)}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakklktl)}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakk).' /'.$ctkk->trenkm.'km'}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakkden)}}</th>
                <th style="text-align: right; font-weight: normal">{{number_format($ctkk->giakktl)}}</th>
                <th style="text-align: center; font-weight: normal">

                </th>
                <th style="text-align: left; font-weight: normal">{!! nl2br(e($ctkk->ghichu)) !!}</th>
            </tr>
        @endforeach
    </table>
    <p>5. Các yếu tố chi phí cấu thành giá (đối với kê khai lần đầu); phân tích nguyên nhân, nêu rõ biến động của các yếu tố hình thành giá tác động làm tăng hoặc giảm giá (đối với kê khai lại).</p>
    <p>{!! nl2br(e($modelkk->ghichu)) !!}</p>
    <p>6. Các trường hợp ưu đãi, giảm giá; điều kiện áp dụng giá (nếu có).</p>
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
<p style="page-break-before: always"></p>
        <!-- Phần 3 -->
@foreach($modelgia as $ctkk)

    <span><p>{{$modeldonvi->tendonvi}}</p></span>
    <span><p style="text-align: center; font-weight: bold; font-size: 16px;">
            Thuyết minh chi phí vận tải và giá cước kê khai {{$ctkk->tendichvu}}</p></span>
    <p style="text-align: center; font-style: italic">
        (Đính kèm theo công văn {{$modelkk->socv}} V/v kê khai giá cước)</p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <tr>
            <th style="width: 5%">STT</th>
            <th style="width: 45%">CÁC CHỈ TIÊU TÍNH GIÁ THÀNH</th>
            <th style="width: 15%">ĐVT</th>
            <th style="width: 15%">KẾT QUẢ</th>
            <th style="width: 20%">bq1kmck</th>
        </tr>
        <?php
            $pag=json_decode($ctkk->pag);
            $cpcodinh = $pag->khauhao+$pag->baohiem+$pag->baohiempt+$pag->baohiemtnds+$pag->lainganhang
                    +$pag->thuevp+$pag->suachualon+$pag->samlop+$pag->dangkiem+$pag->quanly+$pag->banhang;
            $cpbiendoi= $pag->luonglaixe+$pag->nhienlieuchinh+$pag->nhienlieuboitron+$pag->chiphibdcs;
            $cpgiathanh=$cpcodinh+$cpbiendoi;
            //xử lý trường hợp chia cho 0
            $pag->kmcokhach=$pag->kmcokhach==0?1:$pag->kmcokhach;
        ?>

                <tr>
                    <td>I</td>
                    <td>Nguyên giá phương tiện</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->nguyengia)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>II</td>
                    <td>Tổng quãng đường lăn bánh trong năm</td>
                    <td>km</td>
                    <td>{{number_format($pag->tongkm)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>III</td>
                    <td>Tổng quãng đường có khách trong năm</td>
                    <td>km</td>
                    <td>{{number_format($pag->kmcokhach)}}</td>
                    <td></td>
                </tr>

                <tr style="font-weight: bold">
                    <td>IV</td>
                    <td>CHI PHÍ CỐ ĐỊNH</td>
                    <td>đồng</td>
                    <td>{{number_format($cpcodinh)}}</td>
                    <td>{{number_format($cpcodinh/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Chi phí khấu hao phương tiện</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->khauhao)}}</td>
                    <td>{{number_format($pag->khauhao/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Chi phí bảo hiểm xã hội và bảo hiểm y tế</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->baohiem)}}</td>
                    <td>{{number_format($pag->baohiem/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Chi phí bảo hiểm phương tiện</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->baohiempt)}}</td>
                    <td>{{number_format($pag->baohiempt/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Chi phí bảo hiểm TNDS (bảo hiểm con người)</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->baohiemtnds)}}</td>
                    <td>{{number_format($pag->baohiemtnds/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Chi phí lãi vay ngân hàng</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->lainganhang)}}</td>
                    <td>{{number_format($pag->lainganhang/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Chi phí thuê văn phòng, nhà xưởng, bãi đỗ xe</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->thuevp)}}</td>
                    <td>{{number_format($pag->thuevp/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Chi phí TT sửa chữa lớn phương tiện</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->suachualon)}}</td>
                    <td>{{number_format($pag->suachualon/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Chi phí trích trước săm lốp</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->samlop)}}</td>
                    <td>{{number_format($pag->samlop/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Chi phí đăng kiểm định kỳ</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->dangkiem)}}</td>
                    <td>{{number_format($pag->dangkiem/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Chi phí quản lý</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->quanly)}}</td>
                    <td>{{number_format($pag->quanly/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Chi phí bán hàng</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->banhang)}}</td>
                    <td>{{number_format($pag->banhang/$pag->kmcokhach)}}</td>
                </tr>

                <tr style="font-weight: bold">
                    <td>V</td>
                    <td>CHI PHÍ BIẾN ĐỔI</td>
                    <td>đồng</td>
                    <td>{{number_format($cpbiendoi)}}</td>
                    <td>{{number_format($cpbiendoi/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Chi phí lương lái xe</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->luonglaixe)}}</td>
                    <td>{{number_format($pag->luonglaixe/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Chi phí nhiên liệu chính</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->nhienlieuchinh)}}</td>
                    <td>{{number_format($pag->nhienlieuchinh/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Chi phí vật liệu bôi trơn</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->nhienlieuboitron)}}</td>
                    <td>{{number_format($pag->nhienlieuboitron/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Chi phí BDSC các cấp</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->chiphibdcs)}}</td>
                    <td>{{number_format($pag->chiphibdcs/$pag->kmcokhach)}}</td>
                </tr>

                <tr style="font-weight: bold">
                    <td>VI</td>
                    <td>TỔNG CHI PHÍ GIÁ THÀNH</td>
                    <td>đồng</td>
                    <td>{{number_format($cpgiathanh)}}</td>
                    <td>{{number_format($cpgiathanh/$pag->kmcokhach)}}</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Giá thành vận tải</td>
                    <td>đồng/kmck</td>
                    <td>{{number_format($cpgiathanh/$pag->kmcokhach)}}</td>
                    <td></td>
                </tr>

                <tr style="font-weight: bold">
                    <td>VI</td>
                    <td>Giá cước taxi kê khai đã bao gồm thuế VAT</td>
                    <td>đồng/kmck</td>
                    <td>{{number_format($pag->giakekhai)}}</td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold">
                    <td>VII</td>
                    <td>Tổng doanh thu đã trừ thuế GTGT 10%</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->doanhthu)}}</td>
                    <td>{{number_format($pag->doanhthu/$pag->kmcokhach)}}</td>
                </tr>
                <tr style="font-weight: bold">
                    <td>VIII</td>
                    <td>Lợi nhuận dự kiến</td>
                    <td>đồng</td>
                    <td>{{number_format($pag->doanhthu-$cpgiathanh)}}</td>
                    <td></td>
                </tr>
        <!-- hết duyệt -->
    </table>
    <p style="font-weight: bold; font-style: italic">Ghi chú</p>
    <p>{!! nl2br(e($ctkk->ghichu_pag)) !!}</p>
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
    <p style="page-break-before: always"></p>
@endforeach
</body>
</html>