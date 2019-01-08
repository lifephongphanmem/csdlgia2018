
@if(can('vbqlnn','index'))
<li class="tooltips" data-container="body" data-placement="right" data-html="true"
    data-original-title="Văn bản quản lý nhà nước về giá, các báo cáo tổng hợp">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Văn bản QLNN về giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(canGeneral('vbgia','index'))
            @if(can('vbgia','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Các quyết định, văn bản quản lý, điều hành về giá">
                <a href="{{url('vanbanqlnnvegia')}}">Các quyết định, văn bản quản lý, điều hành về giá</a>
            </li>
            @endif
        @endif

        @if(canGeneral('giacpi','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Giá CPI">
                <a href="{{url('')}}">Giá CPI</a>
                <ul class="sub-menu" style="display: none;">
                    <li>
                        <a href="{{url('/dmhanghoacpi/danhsach')}}">Danh mục hàng hóa</a>
                    </li>
                    <li>
                        <a href="{{url('/hsgiacpi/danhsach?thang='.date('m').'&nam='.date('Y'))}}">Hồ sơ giá hàng hóa</a>
                    </li>
                    <!--
                    @if(session('admin')->level == "H" || session('admin')->level == "T")
                        <li>
                            <a href="{{url('/dmhanghoacpi/danhsach')}}">Danh mục hàng hóa</a>
                        </li>

                        <li>
                            <a href="{{url('/xetduyetcpi/danhsach'.'?nam='.date('Y'))}}">Thông tin chỉ số CPI</a>
                        </li>
                    @else
                        <li>
                            <a href="{{url('/hsgiacpi/danhsach?thang='.date('m').'&nam='.date('Y'))}}">Hồ sơ giá hàng hóa</a>
                        </li>

                        <li>
                            <a href="{{url('/hstonghopcpi/danhsach'.'?nam='.date('Y'))}}">Tổng hợp chỉ số CPI</a>
                        </li>

                        <li>
                            <a href="{{url('/chisocpi/danhsach'.'?nam='.date('Y'))}}">Thông tin chỉ số CPI</a>
                        </li>
                    @endif
                        <li>
                            <a href="{{url('/chisocpi/baocao')}}">Báo cáo chỉ số CPI</a>
                        </li>
                        -->
                </ul>
            </li>
        @endif
    </ul>
</li>
@endif
