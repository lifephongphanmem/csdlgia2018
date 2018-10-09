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
@foreach($modelgia as $ctkk)
    <p style="text-align: center; font-weight: bold; font-size: 14px;">Phụ lục số 3</p>
    <p style="text-align: center; font-weight: bold; font-size: 16px;">MẪU PHƯƠNG ÁN GIÁ</p>
    <span style="text-align: center; font-style: italic; font-weight: normal; text-transform: none"><p style="text-align: center">(Ban hành kèm theo Thông tư liên tịch  số 152/2014/TTLT/BTC-BGTVT ngày
            </br>15/10/2014 của Bộ trưởng Bộ Tài chính và Bộ trưởng Bộ Giao thông vận tải)</p></span>

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
    <br>
    <br>
    <span style="text-align: center; font-weight: bold"><p style="font-size: 16px; text-align: center">HỒ SƠ PHƯƠNG ÁN GIÁ</p></span>

    <p> Tên dịch vụ: {{$ctkk->tendichvu}}</p>
    <p> Tên đơn vị thực hiện kê khai giá: {{$modeldonvi->tendonvi}}</p>
    <p> Địa chỉ: {{$modeldonvi->diachi}}</p>
    <p> Số điện thoại: {{$modeldonvi->dienthoai}}</p>
    <p> Số Fax: {{$modeldonvi->fax}}</p>

    <br><br><br><br><br><br><br><br>

    <p style="page-break-before: always">
        <!-- Hết phần 1 -->
        <!-- Phần 2 -->
    <table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="text-transform: uppercase;">
            </td>
            <td>
                <b>Phụ lục số 3a</b>
            </td>
        </tr>
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
                <i>V/v thẩm định phương án giá</i>
            </td>
            <td>
                <i>{{$modeldonvi->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
            </td>
        </tr>
    </table>


    <p>Kính gửi: {{$modeldonvi->tendvcp}}</p>


    <p>Thực hiện quy định tại Thông tư liên tịch số 152/2014/TTLT-BTC-BGTVT ngày 15 tháng 10 năm 2014  của Bộ trưởng Bộ Tài chính và Bộ trưởng Bộ Giao thông vận tải hướng dẫn thực hiện giá cước vận tải bằng xe ô tô và giá dịch vụ hỗ trợ vận tải đường bộ;</p>

    <p>{{$modeldonvi->tendonvi}} đã lập phương án giá dịch vụ {{$ctkk->tendichvu}}(có phương án giá kèm theo).</p>

    <p>Đề nghị {{(getGeneralConfigs()['tendonvivt'])}} xem xét phê duyệt giá {{$ctkk->tendichvu}} theo quy định của pháp luật./.</p>

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

    <p style="page-break-before: always">
        <!-- Hết phần 2 -->
        <!-- Phần 3 -->
    <table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
        <tr>
            <td width="40%" style="text-transform: uppercase;">
            </td>
            <td>
                <b>Phụ lục số 3b</b>
            </td>
        </tr>
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
            </td>
            <td>
                <i>{{$modeldonvi->diadanh}}, ngày..{{ date("d",strtotime($modelkk->ngaynhap))}}..tháng..{{ date("m",strtotime($modelkk->ngaynhap))}}..năm..{{ date("Y",strtotime($modelkk->ngaynhap))}}..</i>
            </td>
        </tr>
    </table>

    <p style="text-align: center; font-weight: bold; font-size: 16px;">PHƯƠNG ÁN GIÁ</p>
    <p> Tên dịch vụ: {{$ctkk->tendichvu}}</p>
    <p> Đơn vị cung ứng: {{$modeldonvi->tendonvi}}</p>
    <p style="font-weight: bold">I. BẢNG TỔNG HỢP TÍNH GIÁ </p>
    <table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
        <tr>
            <th style="width: 5%">STT</th>
            <th style="width: 45%">Nội dung chi phí</th>
            <th style="width: 15%">Đơn vị tính</th>
            <th style="width: 15%">Thành tiền</th>
            <th style="width: 20%">Ghi chú</th>
        </tr>
        <!-- duyệt -->
        @if(count($modelpag)==0)
            <tr style="font-weight: bold">
                <td>A</td>
                <td>Sản lượng tính giá (Q)</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold">
                <td>B</td>
                <td>Chi phí sản xuất, kinh doanh</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold">
                <td>I</td>
                <td>Chi phí trực tiếp:</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Chi phí nguyên liệu, vật liệu,  công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Chi phí nhân công trực tiếp</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao)</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Chi phí sản xuất, kinh doanh (chưa tính ở mục 1,2,3) theo đặc thù </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold">
                <td>II</td>
                <td>Chi phí chung</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Chi phí sản xuất chung </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Chi phí tài chính (nếu có) </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Chi phí bán hàng </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Chi phí quản lý  </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold">
                <td></td>
                <td>Tổng chi phí sản xuất, kinh doanh (TC)</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold">
                <td>C</td>
                <td>Chi phí phân bổ cho dịch vụ khác (nếu có) (CP)</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold">
                <td>D</td>
                <td>Giá thành toàn bộ (TC-CP)</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold">
                <td>Đ</td>
                <td>Giá thành toàn bộ 01 (một) đơn vị sản phẩm, dịch vụ (TC-CP)/Q</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endif
        @foreach($modelpag as $pag)
            @if($ctkk->madichvu==$pag->madichvu)
                <tr style="font-weight: bold">
                    <td>A</td>
                    <td>Sản lượng tính giá (Q)</td>
                    <td></td>
                    <td>{{$pag->sanluong}}</td>
                    <td></td>
                </tr>
                <?php
                    $cptt=$pag->cpnguyenlieutt+$pag->cpcongnhantt+$pag->cpkhauhaott+$pag->cpsanxuatdt;
                    $cpc=$pag->cpsanxuatc+$pag->cptaichinh+$pag->cpbanhang+$pag->cpquanly;
                ?>
                <tr style="font-weight: bold">
                    <td>B</td>
                    <td>Chi phí sản xuất, kinh doanh</td>
                    <td></td>
                    <td>{{number_format($cptt+$cpc)}}</td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold">
                    <td>I</td>
                    <td>Chi phí trực tiếp:</td>
                    <td></td>
                    <td>{{number_format($cptt)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Chi phí nguyên liệu, vật liệu,  công cụ, dụng cụ, nhiên liệu, năng lượng trực tiếp</td>
                    <td></td>
                    <td>{{number_format($pag->cpnguyenlieutt)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Chi phí nhân công trực tiếp</td>
                    <td></td>
                    <td>{{number_format($pag->cpcongnhantt)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Chi phí khấu hao máy móc thiết bị trực tiếp (trường hợp được trích khấu hao)</td>
                    <td></td>
                    <td>{{number_format($pag->cpkhauhaott)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Chi phí sản xuất, kinh doanh (chưa tính ở mục 1,2,3) theo đặc thù </td>
                    <td></td>
                    <td>{{number_format($pag->cpsanxuatdt)}}</td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold">
                    <td>II</td>
                    <td>Chi phí chung</td>
                    <td></td>
                    <td>{{number_format($cpc)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Chi phí sản xuất chung </td>
                    <td></td>
                    <td>{{number_format($cpc=$pag->cpsanxuatc)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Chi phí tài chính (nếu có) </td>
                    <td></td>
                    <td>{{number_format($pag->cptaichinh)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Chi phí bán hàng </td>
                    <td></td>
                    <td>{{number_format($pag->cpbanhang)}}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Chi phí quản lý  </td>
                    <td></td>
                    <td>{{number_format($pag->cpquanly)}}</td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold">
                    <td></td>
                    <td>Tổng chi phí sản xuất, kinh doanh (TC)</td>
                    <td></td>
                    <td>{{number_format($cpc+$cptt)}}</td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold">
                    <td>C</td>
                    <td>Chi phí phân bổ cho dịch vụ khác (nếu có) (CP)</td>
                    <td></td>
                    <td>{{number_format(0)}}</td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold">
                    <td>D</td>
                    <td>Giá thành toàn bộ (TC-CP)</td>
                    <td></td>
                    <td>{{number_format($cpc+$cptt)}}</td>
                    <td></td>
                </tr>
                <tr style="font-weight: bold">
                    <td>Đ</td>
                    <td>Giá thành toàn bộ 01 (một) đơn vị sản phẩm, dịch vụ (TC-CP)/Q</td>
                    <td></td>
                    <td>{{$pag->sanluong>0?number_format(($cpc+$cptt)/$pag->sanluong):number_format($cpc+$cptt)}}</td>
                    <td></td>
                </tr>
                <?php
                    $giaitrinh=$pag->giaitrinh
                ?>
            @endif
        @endforeach
        <!-- hết duyệt -->
    </table>
    <p><b>II . GIẢI TRÌNH CHI TIẾT CÁCH TÍNH CÁC KHOẢN CHI PHÍ</b> (từ mục 1 đến mục 8 bảng tổng hợp tính giá)</p>
    <p>{!! nl2br(e($giaitrinh)) !!}</p>
    <p style="page-break-before: always">
        <!-- Hết phần 3 -->
@endforeach

        <!-- Phần 4 -->
<p> <b>{{$modeldonvi->tendonvi}}</b></p>
<p> {{$modeldonvi->diachi}}</p>
<p style="font-weight: bold; text-align: center">BẢNG KÊ CHI TIẾT CÁC YẾU TỐ CẤU THÀNH GIÁ</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th style="width: 5%" rowspan="2">STT</th>
        <th rowspan="2">TÊN DỊCH VỤ CUNG ỨNG</th>
        <th rowspan="2">QUY CÁCH CHẤT LƯỢNG</th>
        <th rowspan="2">Đơn vị</br>tính</th>
        <th style="text-align: center" colspan="6">CHI PHÍ CẤU THÀNH GIÁ</th>
        <th rowspan="2">Giá chưa</br>bao gồm</br>VAT</th>
        <th rowspan="2">Thuế VAT</br>10%</th>
        <th rowspan="2">Tổng giá</br>thành</th>
    </tr>
    <tr>
        <th>Dầu</th>
        <th>Mỡ</br>nhớt</th>
        <th>Phụ</br>tùng</th>
        <th>Lương</th>
        <th>Khấu</br>hao</th>
        <th>Khác</th>
    </tr>
    <?php
        $i=1;
    ?>
    @foreach($modelgia as $ctkk)
        <?php
            $giathanh=$ctkk->cpdau+$ctkk->cpmonhot+$ctkk->cpphutung+$ctkk->cpnhancongtt+$ctkk->cpkhauhaott+$ctkk->cpkhac;
        ?>
        <tr>
            <td>{{$i++}}</td>
            <td>{{$ctkk->tendichvu}}</td>
            <td>{{$ctkk->qccl}}</td>
            <td>{{$ctkk->dvt}}</td>
            <td>{{number_format($ctkk->cpdau)}}</td>
            <td>{{number_format($ctkk->cpmonhot)}}</td>
            <td>{{number_format($ctkk->cpphutung)}}</td>
            <td>{{number_format($ctkk->cpnhancongtt)}}</td>
            <td>{{number_format($ctkk->cpkhauhaott)}}</td>
            <td>{{number_format($ctkk->cpkhac)}}</td>
            <td>{{number_format($giathanh)}}</td>
            <td>{{number_format($giathanh/10)}}</td>
            <td>{{number_format($giathanh+$giathanh/10)}}</td>
        </tr>
    @endforeach
    <!-- duyệt -->

            <table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:20px auto; text-align: center;">
                <tr>
                    <td style="text-align: left;" width="60%">
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


</table>

</body>
</html>