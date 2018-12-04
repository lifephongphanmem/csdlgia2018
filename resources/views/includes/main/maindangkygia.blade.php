<li class="">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Đăng ký giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        <li>
            <a href="">
                <span class="title">Xăng, dầu</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @if(session('admin')->level == 'DKXD')
                <li><a href="">Đăng ký giá</a></li>
                @endif
                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                    <li><a href="">Thông tin dn đăng ký giá</a></li>
                    <li><a href="">Xét duyệt đăng ký giá</a></li>
                    <li><a href="">Tìm kiếm thông tin đăng ký giá</a></li>
                    <li><a href="">Báo cáo tổng hợp</a></li>
                @endif
            </ul>
        </li>
        <li><a href="{{url('')}}">Điện bán lẻ</a> </li>
        <li><a href="{{url('')}}">Khí dầu hóa lỏng</a> </li>
        <li><a href="{{url('')}}">Phân đạm ure; phân NPK</a> </li>
        <li><a href="{{url('')}}">Thuốc bảo vệ thực vật</a> </li>
        <li><a href="{{url('')}}">Vắc xin phòng bệnh gia súc, gia cầm </a></li>
        <li><a href="{{url('')}}">Muối ăn</a> </li>
        <li><a href="{{url('')}}">Sữa dành cho TE dưới 6 tuổi </a></li>
        <li><a href="{{url('')}}">Đường ăn</a></li>
        <li><a href="{{url('')}}">Thóc gạo tẻ thường </a></li>
        <li><a href="{{url('')}}">Thuốc phòng bệnh</a></li>
    </ul>
</li>
