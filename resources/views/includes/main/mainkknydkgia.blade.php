@if(canGeneral('kknydkgia','index'))
    @if(can('kknydkgia','index'))
    <li class="">
        <a href="javascript:;">
            <i class="icon-folder"></i>
            <span class="title">Kê khai - niêm yết giá</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu" style="display: none;">
            @if(session('admin')->level != 'T' && session('admin')->level != 'H' && session('admin')->level != 'X')
                @if(can('ttdn','index'))
                    <li><a href="{{url('thongtindoanhnghiep')}}">Thông tin doanh nghiệp</a></li>
                @endif
            @else
                @if(can('ttdn','approve'))
                <li><a href="{{url('xetduyettdttdn')}}"> Xét duyệt thay đổi thông tin doanh nghiệp</a></li>
                @endif
            @endif
            @include('includes.main.include.kknygia')
        </ul>
    </li>
    @endif
@endif
