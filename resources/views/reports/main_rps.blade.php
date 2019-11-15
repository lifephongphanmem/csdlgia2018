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
        #fixNav{
            background: #f7f7f7;
            width: 100%;
            height: 35px;
            display: block;
            box-shadow: 0px 2px 2px rgba(0,0,0,0.5); /*Đổ bóng cho menu*/
            position: fixed; /*Cho menu cố định 1 vị trí với top và left*/
            top: 0; /*Nằm trên cùng*/
            left: 0; /*Nằm sát bên trái*/
            z-index: 100000; /*Hiển thị lớp trên cùng*/
        }
        #fixNav ul{
            margin: 0;
            padding: 0;

        }
        #fixNav ul li{
            list-style:none inside;
            width: auto;
            float: left;
            line-height: 35px; /*Cho text canh giữa menu*/
            color: #fff;
            padding: 0;
            margin-left:10px;
            position: relative;
        }
        #fixNav ul li a{
            text-transform: uppercase;
            white-space: nowrap; /*Cho chữ trong menu không bị wrap*/
            padding: 0 10px;
            color: #fff;
            display: block;
            font-size: 0.8em;
            text-decoration: none;
        }
        @yield('custom-style')
    </style>
    {{--Ex Doc--}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{url('reports/FileSaver.js')}}"></script>
    <script src="{{url('reports/jquery.wordexport.js')}}"></script>

    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
            {{--crossorigin="anonymous"></script>--}}
    <script src="{{url('reports/table2csv.js')}}"></script>
    <script type="text/javascript">
        function ExDoc(){
            $("#page-content").wordExport();
        }
        function ExCsv(){
            $('#data').table2csv({
                file_name: 'dulieu.csv',
                header_body_space: 0
            });
        }
    </script>
    {{--<script type="text/javascript">--}}

        {{--var _gaq = _gaq || [];--}}
        {{--_gaq.push(['_setAccount', 'UA-36251023-1']);--}}
        {{--_gaq.push(['_setDomainName', 'jqueryscript.net']);--}}
        {{--_gaq.push(['_trackPageview']);--}}

        {{--(function() {--}}
            {{--var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;--}}
            {{--ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';--}}
            {{--var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);--}}
        {{--})();--}}

    {{--</script>--}}
    {{--Ex CSV--}}
    @yield('custom-script')
</head>
<body style="font:normal 14px Times, serif;">
<div class="in">
<nav id="fixNav">
    <ul>
        <li><button onclick=" window.print()">Print</button></li>
        <li><button onclick="ExDoc()"> Export to Doc file </button></li>
        <li><button onclick="ExCsv()"> Export to CSV file </button></li>
    </ul>
</nav>
</div>
<div id="page-content" style="position: relative; margin-top: 40px">
    @yield('content')
</div>
</body>
</html>