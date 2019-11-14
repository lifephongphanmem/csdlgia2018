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
        @yield('custom-style')
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{url('reports/FileSaver.js')}}"></script>
    <script src="{{url('reports/jquery.wordexport.js')}}"></script>
    <script type="text/javascript">
        //        jQuery(document).ready(function($) {
        //            $("a.word-export").click(function(event) {
        //                $("#page-content").wordExport();
        //            });
        //        });
        function ExDoc(){
            $("#page-content").wordExport();
        }
    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    @yield('custom-script')
</head>
<body style="font:normal 14px Times, serif;">

<div class="in">
    <input type="submit" onclick=" window.print()" value="In kê khai"  />
    <button class="word-export" onclick="ExDoc()"> Export to .doc </button>
</div>
<div id="page-content">
    @yield('content')
</div>
</body>
</html>