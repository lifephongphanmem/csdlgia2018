<html>
<head>
    <title>Hệ thống CSDL về giá {{isset(getGeneralConfigs()['diadanh']) ? getGeneralConfigs()['diadanh'] : ''}}</title>
</head>
<body>
<h1>Kính gửi: {{isset($modeldv->tendonvi) ? $modeldv->tendonvi : $modeldv->tendv}}</h1>
<p>{{$contentht}}</p>
<p>Vui lòng kiểm tra email thường xuyên để biết kết quả.</p>
<p>Ghi chú: Thông báo này được gửi tự động từ hệ thống tiếp nhận thông tin của chương trình CSDL về giá ./.</p>
</body>
</html>