@if(canGeneral('thamdinhgiahh','index'))
    @if(can('thamdinhgiahh','index'))
<li class="">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Thẩm định giá hàng hóa</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(can('dmthamdinhgiahh','index'))
        <li>
            <a href="{{url('dmthamdinhgiahh')}}">Danh mục thẩm định giá hàng hóa</a>
        </li>
        @endif
        @if(can('kkthamdinhgiahh','index'))
        <li>
            <a href="{{url('thamdinhgiahanghoa')}}">Hồ sơ thẩm định giá hàng hóa</a>
        </li>
        @endif
        @if(can('ththamdinhgiahh','index'))
        <li>
            <a href="{{url('timkiemthamdinhgiahanghoa')}}">Tìm kiếm thông tin</a>
        </li>
        @endif
        <!--li>
            <a href="{{url('baocaoththamdinhgiahanghoa')}}">Báo cáo tổng hợp</a>
        </li-->
    </ul>
</li>
    @endif
@endif