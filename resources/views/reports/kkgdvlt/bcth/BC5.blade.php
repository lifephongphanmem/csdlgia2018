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
    <input type="submit" onclick=" window.print()" value="In báo cáo"  />
</div>

<body style="font:normal 14px Times, serif;">

<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td colspan="3" style="text-transform: uppercase;">
            <b>{{(isset($modelcqcq)? $modelcqcq->tendv : '')}}</b>
        </td>
        <td colspan="6">
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
        </td>
    </tr>
    <tr>
        <td colspan="3" style="text-transform: uppercase;">
            --------
        </td>
        <td colspan="6">
            <b><i><u>Độc lập - Tự do - Hạnh phúc</u></i></b>
        </td>
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
    @foreach($m_cqcq as $cskd)
        <?php $model_kk=$model->where('cqcq',$cskd->maqhns) ?>
        @if(count($model_kk)>0)
            <tr>
                <th style="text-align: left" colspan="10">
                    {{$cskd->tendv.': '. count($model_kk).' hồ sơ.'}}
                </th>
            </tr>
            <?php $i=1;?>
            @foreach($model_kk as $key => $ttkk)
                <tr>
                    <th style="text-align: center">{{$i++}}</th>
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
        @endif
    @endforeach
    <tr>
        <th style="text-align: left" colspan="10">
            {{'Tổng cộng: '. count($model).' hồ sơ.'}}
        </th>
    </tr>
</table>

<table width="96%" border="0" cellspacing="0" cellpadding="8">
    <tr>
        <td style="text-align: left;" width="50%">

        </td>

        <td style="text-align: center;" width="50%">
            <b>GIÁM ĐỐC</b></br>(Ký tên và đóng dấu)
        </td>
    </tr>

    <tr>
        <td style="text-align: left;" width="50%">

        </td>

        <td style="text-align: center;text-transform: uppercase; " width="50%">
            </br></br></br></br></br>
        </td>
    </tr>
</table>
</body>
</html>