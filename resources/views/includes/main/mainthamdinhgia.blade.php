@if(canGeneral('thamdinhgia','index'))
    <li><a href="{{url('dmnhomhanghoa')}}">
            <i class="icon-folder"></i>
            <span class="title">Danh mục hàng hóa</span></a>
    </li>
@if(can('thamdinhgia','index'))
<li class="">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Thẩm định giá</span>
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
@if(canGeneral('thamdinhgiahh','index'))
    @if(can('thamdinhgiahh','index'))
        <!--i class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá trị tài sản được thẩm định giá(đất đai, nhà công trình xây dựng, máy thiết bị, phương tiện vận tải, dây truyền công nghệ, tài sản khác)
            và thông tin, tài liệu liên quan đến kết quả thẩm định giá của Hội đồng Thẩm định giá">
            <a href="">
                <i class="icon-folder"></i>
                <span class="title">Giá hàng hóa</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @if(can('dmthamdinhgiahh','index'))
                    <li>
                        <a href="{{url('dmthamdinhgiahh')}}">DM hàng hóa</a>
                    </li>
                @endif
                @if(can('kkthamdinhgiahh','index'))
                    <li>
                        <a href="{{url('thamdinhgiahanghoa')}}">Giá hàng hóa</a>
                    </li>
                @endif
                @if(can('ththamdinhgiahh','timkiem'))
                    <li>
                        <a href="{{url('timkiemthamdinhgiahanghoa')}}">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                            <!--li>
            <a href="{{url('baocaoththamdinhgiahanghoa')}}">Báo cáo tổng hợp</a>
        </li
            </ul>
        </li-->
    @endif
@endif
<li class="tooltips" data-container="body" data-placement="right" data-html="true"
    data-original-title="">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">DN cung cấp giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
            <li>
                <a href="">DS doanh nghiệp cung cấp giá</a>
            </li>
            <li>
                <a href="">Hồ sơ cung cấp giá</a>
            </li>
            <li>
                <a href="">Tìm kiếm thông tin</a>
            </li>
    </ul>
</li>