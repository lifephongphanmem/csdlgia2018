@if(canGeneral('dangkygia','index'))
@if(can('dangkygia','index'))
<li class="">
    <a href="">
        <i class="icon-bar-chart"></i>
        <span class="title">Đăng ký giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
    @if(canGeneral('dkgxangdau','index'))
        @if(can('dkgxangdau','index'))
        <li>
            <a href="">
                <span class="title">Xăng, dầu</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @if(session('admin')->level == 'DKG')
                    <li><a href="">Đăng ký giá</a></li>
                @endif
                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                    <li><a href="">Thông tin dn đăng ký giá</a></li>
                    <li><a href="">Thông tin đăng ký giá</a></li>
                    <li><a href="">Xét duyệt đăng ký giá</a></li>
                    <li><a href="">Tìm kiếm thông tin đăng ký giá</a></li>
                    <li><a href="">Báo cáo tổng hợp</a></li>
                @endif
            </ul>
        </li>
        @endif
    @endif
    @if(canGeneral('dkgdien','index'))
        @if(can('dkgdien','index'))
        <li><a href="{{url('')}}">Điện bán lẻ</a> </li>
        @endif
    @endif
    @if(canGeneral('dkgkhidau','index'))
        @if(can('dkgkhidau','index'))
        <li><a href="{{url('')}}">Khí dầu hóa lỏng</a> </li>
        @endif
    @endif
    @if(canGeneral('dkgphan','index'))
        @if(can('dkgphan','index'))
        <li><a href="{{url('')}}">Phân đạm ure; phân NPK</a> </li>
        @endif
    @endif
    @if(canGeneral('dkgthuocbvtv','index'))
        @if(can('dkgthuocbvtv','index'))
        <li><a href="{{url('')}}">Thuốc bảo vệ thực vật</a> </li>
        @endif
    @endif
    @if(canGeneral('dkgvacxingsgc','index'))
        @if(can('dkgvacxingsgc','index'))
        <li><a href="{{url('')}}">Vắc xin phòng bệnh gia súc, gia cầm </a></li>
        @endif
    @endif
    @if(canGeneral('dkgmuoi','index'))
        @if(can('dkgmuoi','index'))
        <li><a href="{{url('')}}">Muối ăn</a> </li>
        @endif
    @endif
    @if(canGeneral('dkgsuate6t','index'))
        @if(can('dkgsuate6t','index'))
        <li><a href="{{url('')}}">Sữa dành cho TE dưới 6 tuổi </a></li>
        @endif
    @endif
    @if(canGeneral('dkgduong','index'))
        @if(can('dkgduong','index'))
        <li><a href="{{url('')}}">Đường ăn</a></li>
        @endif
    @endif
    @if(canGeneral('dkgthocgao','index'))
        @if(can('dkgthocgao','index'))
        <li><a href="{{url('')}}">Thóc gạo tẻ thường </a></li>
        @endif
    @endif
    @if(canGeneral('dkgthuocpcb','index'))
        @if(can('dkgxangdau','index'))
        <li><a href="{{url('')}}">Thuốc phòng bệnh</a></li>
        @endif
    @endif
    </ul>
</li>
@endif
@endif
