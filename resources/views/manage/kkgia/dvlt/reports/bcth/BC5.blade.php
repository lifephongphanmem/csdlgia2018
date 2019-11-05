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
        @media print {
            .in{
                display: none !important;
            }
        }
    </style>
</head>

<div class="in" style="margin-left: 20px;">
    <input type="submit" onclick=" window.print()" value="In báo cáo"  />
</div>

<body style="font:normal 14px Times, serif;">
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="vertical-align: top;">
            <span style="text-transform: uppercase">{{$inputs['dvcaptren']}}</span><br>
            <span style="text-transform: uppercase;font-weight: bold">{{$inputs['dv']}}</span>
            <hr style="width: 10%;vertical-align: top;  margin-top: 2px">

        </td>
        <td style="vertical-align: top;">
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b>
            <hr style="width: 15%;vertical-align: top; margin-top: 2px">

        </td>
    </tr>
    <tr>
        <td>Số: ..............</td>
        <td style="text-align: right"><i style="margin-right: 25%;">{{$inputs['diadanh']}}, ngày .... tháng .... năm ....</i></td>
    </tr>
</table>

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td colspan="9" style="text-align: center; font-weight: bold; font-size: 16px;">
            BÁO CÁO KẾT QUẢ GIẢI QUYẾT HỒ SƠ
        </td>
    </tr>
    <tr>
        <td colspan="9" style="text-align: center; font-weight: bold;">
            Từ ngày: {{getDayVn($input['ngaytu'])}} đến ngày {{getDayVn($input['ngayden'])}}
        </td>
    </tr>
    <tr>
        <td colspan="9" style="text-align: center; font-weight: bold;">
            Loại hạng: {{$input['loaihang']=='all'?'Tất cả':$input['loaihang'].' sao'}}
        </td>
    </tr>
    <tr>
        <td colspan="9" style="text-align: center; font-weight: bold;">
            Phân loại hồ sơ: <?php
                if($input['thoihan']=='all'){
                    echo 'Tất cả';
                }else{
                    echo $input['thoihan'];
                }
            ?>
        </td>
    </tr>
</table>


<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <tr>
        <th>STT</th>
        <th>Tên cơ sở kinh doanh</th>
        <th>Loại hạng</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Số công văn</th>
        <th>Ngày gửi kê khai giá</th>
        <th>Ngày trả kết quả</th>
        <th>Ngày thực hiện<br> mức giá kê khai</th>
        <th>Thời hạn giải quyết</th>
    </tr>
            @foreach($model as $key => $ttkk)
                <tr>
                    <th style="text-align: center">{{$key+1}}</th>
                    <th style="text-align: left">{{$ttkk->tencskd}}</th>
                    <th style="text-align: center">{{$ttkk->loaihang}} sao</th>
                    <th style="text-align: left">{{$ttkk->diachikd}}</th>
                    <th style="text-align: center">{{$ttkk->telkd}}</th>
                    <th style="text-align: center">{{$ttkk->socv}}</th>
                    <th style="text-align: center">{{getDateTime($ttkk->ngaychuyen)}}</th>
                    <th style="text-align: center">{{getDayVn($ttkk->ngaynhan)}}</th>
                    <th style="text-align: center">{{getDayVn($ttkk->ngayhieuluc)}}</th>
                    <th style="text-align: center">{{$ttkk->thoihan}}</th>
                </tr>
            @endforeach
    <tr>
        <th style="text-align: left" colspan="10">
            {{'Tổng cộng: '. count($model).' hồ sơ.'}}
        </th>
    </tr>
</table>
<table width="96%" border="0" cellspacing="0" height cellpadding="0" style="margin: 20px auto;text-align: center; height:200px">
    <tr>
        <td width="40%" style="text-align: left; vertical-align: top;">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - UBND tỉnh;<br>
            - Bộ tài chính;<br>
            - Lưu: VT, QLGCS.
        </td>
        <td style="vertical-align: top;">
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i>
        </td>
    </tr>
</table>
</body>
</html>