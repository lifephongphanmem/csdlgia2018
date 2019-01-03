<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>

    <style type="text/css">
        body {
            font: normal 12px/14px time, serif;
        }

        tr > td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th colspan="7" style="text-align: center; font-weight: bold; font-size: 20px;">
                DANH MỤC HÀNG HÓA, DỊCH VỤ
            </th>
        </tr>
    </table>

    <table>
        <tr>
            <td>STT</td>
            <td>Mã hàng</td>
            <td>Tên hàng</td>
            <td>Đơn vị tính</td>
            <td>Đặc điểm kỹ thuật</td>
            <td>Xuất xứ</td>
            <td>Đơn giá</td>
        </tr>

        <?php $i=1; ?>
        @foreach($model_nhom as $nhom)
            <?php $model_hh = $model->where('manhom',$nhom->manhom)?>
            @if(count($model_hh)> 0)
                <?php $stt=1; ?>
                <tr style="font-weight: bold;">
                    <td>{{IntToRoman($i++)}}</td>
                    <td style="text-align: left;" colspan="6">{{$nhom->tennhom}}</td>
                </tr>
                @foreach($model_hh as $ct)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$ct->mahhdv}}</td>
                        <td>{{$ct->tenhhdv}}</td>
                        <td>{{$ct->dvt}}</td>
                        <td>{{$ct->dacdiemkt}}</td>
                        <td>{{$ct->xuatxu}}</td>
                        <td></td>
                    </tr>
                @endforeach

            @endif
        @endforeach
    </table>
</body>
</html>