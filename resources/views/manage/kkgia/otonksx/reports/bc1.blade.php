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
    </style>
</head>
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

<p style="text-align: center; font-weight: bold; font-size: 16px;text-transform: uppercase;">BÁO CÁO KÊ KHAI Giá ô tô nhập khẩu, sản xuất trong nước dưới 15 chỗ ngồi</p>
<p style="text-align: center; font-size: 14px;">
    Thời điểm: @if($inputs['time'] == 'ngay')
                   Từ ngày {{$inputs['tungay']}} đến ngày {{$inputs['denngay']}}
               @elseif($inputs['time'] == 'thang')
                    Tháng {{$inputs['thang']}} Năm {{$inputs['nam']}}
               @else
                    Quý {{$inputs['quy']}} Năm {{$inputs['nam']}}
               @endif
</p>

<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
    <thead>
    <tr>
        <th style="text-align: center ; margin: auto" width="2%">STT</th>
        <th style="text-align: center" width="20%">Doanh nghiệp</th>
        <th style="text-align: center" width="8%">Số công văn</th>
        <th style="text-align: center" width="8%">Ngày<br> kê khai</th>
        <th style="text-align: center" width="8%">Ngày thực hiện<br>mức giá</th>
        <th style="text-align: center" width="8%">Ngày chuyển hồ sơ</th>

        <th style="text-align: center" width="15%">Xét duyệt</th>
    </tr>
    </thead>
    <tbody>
    @foreach($modeldvql as $dvql)
        <tr>
            <td></td>
            <td colspan="6" style="font-weight: bold; text-align: left">{{$dvql->tendv}}</td>
        </tr>
        <?php $model = $model->where('mahuyen',$dvql->maxa)?>
        @foreach($model as $key=>$tt)
            <tr>
                <td style="text-align: center">{{$key+1}}</td>
                <td class="active">{{$tt->tendn}}
                    <br><b>Mã số thuế:</b> {{$tt->maxa}}
                    <br><b>Mã hồ sơ:</b> {{$tt->mahs}}</td>
                <td style="text-align: center" class="danger">{{$tt->socv}}</td>
                <td style="text-align: center">{{getDayVn($tt->ngaynhap)}}</td>
                <td style="text-align: center">{{getDayVn($tt->ngayhieuluc)}}</td>
                <td style="text-align: center">{{getDateTime($tt->ngaychuyen)}}</td>
                <td style="text-align: center">Số hồ sơ nhận: {{$tt->sohsnhan}}<br> Ngày nhận: {{getDayVn($tt->ngaynhan)}}</td>


            </tr>
        @endforeach
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td></td>
        <td colspan="6">Tổng cộng: {{$inputs['counths']}} hồ sơ</td>
    </tr>
    </tfoot>
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