
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{$pageTitle}}</title>
    <link rel="shortcut icon" href="{{ url('images/LIFESOFT.png')}}" type="image/x-icon">
    <style type="text/css">
        body {
            font: normal 12px/16px time, serif;
        }

        table, p {
            width: 98%;
            margin: auto;
        }

        table tr td:first-child {
            text-align: center;
        }

        td, th {
            padding: 2px;
        }
    </style>
</head>
<body>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%">
            <span style="text-transform: uppercase">{{$inputs['dvcaptren']}}</span><br>
            <span style="text-transform: uppercase;font-weight: bold">{{$inputs['dv']}}</span><br>
            <hr style="width: 10%"> <br>
            Số: ..............
        </td>
        <td>
            <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM<br>
                Độc lập - Tự do - Hạnh phúc</b><br>
            <hr style="width: 15%"><br>
            <i>{{$inputs['diadanh']}}, ngày .... tháng .... năm ....</i>
        </td>
    </tr>
</table>
<p style="font-weight: bold;text-transform: uppercase;text-align: center">BÁO CÁO GIÁ THUẾ TÀI NGUYÊN</p>
<p style="text-align: center">Nhóm tài nguyên: {{$m_nhomthuetn->tennhom}}</p>
<table cellspacing="0" cellpadding="0" border="1" style="margin: 20px auto; border-collapse: collapse;">
   <tr>
       <th style="text-align: center" width="2%">STT</th>
       <th style="text-align: center">Mã tài nguyên</th>
       <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp I</th>
       <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp II</th>
       <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp III</th>
       <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp IV</th>
       <th style="text-align: center">Tên nhóm, loại tài nguyên<br>Cấp V</th>
       <th style="text-align: center">Đơn vi<br>tính</th>
       <th style="text-align: center" >Đơn giá <br>({{$inputs['namlk']}})</th>
       <th style="text-align: center" >Đơn giá <br>({{$inputs['nambc']}})</th>
       <th style="text-align: center" >Tăng giảm</th>
   </tr>
    @foreach($model as $key=>$tt)
        <tr>
        <td style="text-align: center">{{$key+1}}</td>
        <td>{{$tt->matn}}</td>
        <td>{{$tt->cap1}}</td>
        <td>{{$tt->cap2}}</td>
        <td>{{$tt->cap3}}</td>
        <td>{{$tt->cap4}}</td>
        <td>{{$tt->cap5}}</td>
        <td style="text-align: center">{{$tt->dvt}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($tt->dongialk,2)}}</td>
        <td style="text-align: right">{{dinhdangsothapphan($tt->dongiabc,2)}}</td>
        <td style="text-align: right">{{(dinhdangsothapphan($tt->dongiabc,2) == 0 || $tt->dongiabc == '') ? 0 :
        ((dinhdangsothapphan($tt->dongialk,2) == 0 || $tt->dongialk == '') ? 0 : (dinhdangsothapphan($tt->dongiabc/$tt->dongialk,2)))}}</td>
        </tr>
    @endforeach
</table>
<table width="96%" border="0" cellspacing="0" cellpadding="8" style="margin:0 auto 20px; text-align: center;">
    <tr>
        <td width="40%" style="text-align: left">
            <span style="font-weight: bold;font-style: italic">Nơi nhận:</span><br>
            - UBND tỉnh;<br>
            - Bộ tài chính;<br>
            - Lưu: VT, QLGCS.
        </td>
        <td>
            <b>THỦ TRƯỞNG ĐƠN VỊ</b><br>
            <i>(Ký tên, đóng dấu)</i><br><br><br><br><br><br><br>
        </td>
    </tr>
</table>
</body>
</html>
