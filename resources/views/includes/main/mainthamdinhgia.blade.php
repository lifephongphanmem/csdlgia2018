@if(canGeneral('thamdinhgia','index'))
@if(can('thamdinhgia','index'))
<li class="">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Thẩm định giá TSNN</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(can('kkthamdinhgia','index'))
        <li>
            <a href="{{url('thamdinhgia')}}">Hồ sơ thẩm định giá</a>
        </li>
        @endif
        @if(can('ththamdinhgia','timkiem'))
        <li>
            <a href="{{url('timkiemthamdinhgia')}}">Tìm kiếm thông tin</a>
        </li>
        @endif
        @if(can('ththamdinhgia','baocao'))
        <li>
            <a href="{{url('baocaoththamdinhgia')}}">Báo cáo tổng hợp</a>
        </li>
        @endif
    </ul>
</li>
@endif
@endif