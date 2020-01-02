@include('includes.main.include.dinhgia')
@if(canGeneral('giahhdvk','index'))
    @if(can('giahhdvk','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá thị trường hàng hóa dịch vụ khác do UBND tỉnh, thành phố trực thuộc trung ương và các Bộ quản lý ngành, lĩnh vực tự quy định thuộc nội dung CSDL giá của mình">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Giá HH-DV khác </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('dmgiahhdvk','index'))
                    <li>
                        <a href="{{url('nhomhanghoadichvu')}}">Danh mục HH-DV</a>
                    </li>
                @endif
                @if(can('kkgiahhdvk','index'))
                    <li>
                        <a href="{{url('giahhdvkhac')}}">Thông tin hồ sơ</a>
                    </li>
                @endif
                @if(can('thgiahhdvk','timkiem'))
                    <li>
                        <a href="{{url('timkiemgiahhdvkhac')}}">Tìm kiếm thông tin</a>
                    </li>
                @endif
                @if(session('admin')->level == 'H' || session('admin')->level == 'T')
                    @if(can('thgiahhdvk','tonghop'))
                    <li>
                        <a href="{{url('tonghopgiahhdvk')}}">Tổng hợp giá HH-DV khác</a>
                    </li>
                    @endif
                @endif
                @if(can('thgiahhdvk','baocao'))
                    <li>
                        <a href="{{url('reportshanghoadichvukhac')}}">Báo cáo tổng hợp</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif

@if(canGeneral('giathitruong','index'))
    @if(can('giathitruong','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá thị trường hàng hóa dịch vụ khác do UBND tỉnh, thành phố trực thuộc trung ương và các Bộ quản lý ngành, lĩnh vực tự quy định thuộc nội dung CSDL giá của mình">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Giá thị trường </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('dmgiathitruong','index'))
                    <li>
                        <a href="{{url('thongtugiathitruong')}}">Thông tư giá thị trường</a>
                    </li>
                @endif
                @if(can('kkgiathitruong','index'))
                    <li>
                        <a href="{{url('kekhaigiathitruong')}}">Thông tin hồ sơ</a>
                    </li>
                @endif
                @if(can('thgiathitruong','timkiem'))
                    <li>
                        <a href="{{url('tkgiatrhitruong')}}">Tìm kiếm thông tin</a>
                    </li>
                @endif
                @if(can('thgiathitruong','baocao'))
                    <li>
                        <a href="{{url('baocaogiathitruong')}}">Báo cáo tổng hợp</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif

@if(canGeneral('gialephitruocba','index'))
    @if(can('gialephitruocba','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá tính lệ phí trước bạ do UBND tỉnh, thành phố trực thuộc trung ương ban hành">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Giá lệ phí trước bạ </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('dmgialephitruocba','index'))
                    <li>
                        <a href="{{url('nhomlephitruocba')}}">Danh mục nhóm xe </a>
                    </li>
                @endif
                @if(can('kkgialephitruocba','index'))
                    <li>
                        <a href="{{url('lephitruocba')}}">Thông tin giá LPTB</a>
                    </li>
                @endif
                @if(can('thgialephitruocba','timkiem'))
                    <li>
                        <a href="{{url('timkiemlephitruocba')}}">Tìm kiếm thông tin</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif

@if(canGeneral('gialephitruocbanha','index'))
    @if(can('gialephitruocbanha','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá tính lệ phí trước bạ do UBND tỉnh, thành phố trực thuộc trung ương ban hành">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Giá lệ phí trước bạ đối với nhà </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('kkgialephitruocbanha','index'))
                    <li>
                        <a href="{{url('lephitruocbanha')}}">Thông tin hồ sơ</a>
                    </li>
                @endif
                {{--@if(can('thgialephitruocbanha','timkiem'))--}}
                    {{--<li>--}}
                        {{--<a href="{{url('tklephitruocbanha')}}">Tìm kiếm thông tin</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            </ul>
        </li>
    @endif
@endif

@if(canGeneral('giaphilephi','index'))
    @if(can('giaphilephi','index'))
        <li class="">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Phí, lệ phí</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('dmgiaphilephi','index'))
                    <li>
                        <a href="{{url('nhomphilephi')}}">Danh mục nhóm phí lệ phí</a>
                    </li>
                @endif
                @if(can('kkgiaphilephi','index'))
                    <li>
                        <a href="{{url('philephi')}}">Thông tin giá phí, lệ phí</a>
                    </li>
                @endif
                @if(can('thgiaphilephi','timkiem'))
                    <li>
                        <a href="{{url('timkiemthongtinphilephi')}}">Tìm kiếm thông tin</a>
                    </li>
                @endif
            </ul>
        </li>
    @endif
@endif
@if(canGeneral('thanhlytaisan','index'))
    @if(can('thanhlytaisan','index'))
    <li class="">
        <a href="javascript:;">
            <i class="icon-folder"></i>
            <span class="title">Giá đấu thầu bán TS</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            @if(can('kkthanhlytaisan','index'))
                <li>
                    <a href="{{url('thongtingiabantaisan')}}">Thông tin đấu thầu bán TS</a>
                </li>
            @endif
            @if(can('ththanhlytaisan','timkiem'))
                <li>
                    <a href="{{url('timkiemttgiabantaisan')}}">Tìm kiếm thông tin</a>
                </li>
            @endif
        </ul>
    </li>
    @endif
@endif
@if(canGeneral('giabatdongsan','index'))
    @if(can('giabatdongsan','index'))
        @if(can('hsgiabatdongsan','index'))
        <li class="">
            <a href="{{url('giagiaodichbatdongsan')}}">
                <i class="icon-folder"></i>
                <span class="title">Giá giao dịch bất động sản</span>
                {{--<span class="arrow"></span>--}}
            </a>
            {{--<ul class="sub-menu">--}}
                {{--@if(can('hsgiabatdongsan','index'))--}}
                    {{--<li>--}}
                        {{--<a href="{{url('giagiaodichbatdongsan')}}">Thông tin giá giao dịch bất động sản</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        </li>
        @endif
    @endif
@endif
@if(canGeneral('muataisan','index'))
    @if(can('muataisan','index'))
        @if(can('hsmuataisan','index'))
    <li class="">
        <a href="{{url('thongtinmuataisan')}}">
            <i class="icon-folder"></i>
            <span class="title">Giá trúng thầu của HH-DV được mua sắm theo QĐ của PL về đấu thầu</span>
            {{--<span class="arrow"></span>--}}
        </a>
        {{--<ul class="sub-menu">--}}
            {{--@if(can('hsmuataisan','index'))--}}
                {{--<li>--}}
                    {{--<a href="{{url('thongtinmuataisan')}}">Thông tin trúng thầu HH-DV</a>--}}
                {{--</li>--}}
            {{--@endif--}}
            {{--@if(can('thmuataisan','timkiem'))--}}
                {{--<li>--}}
                    {{--<a href="{{url('timkiemmuataisan')}}">Tìm kiếm thông tin</a>--}}
                {{--</li>--}}
            {{--@endif--}}
        {{--</ul>--}}
    </li>
        @endif
    @endif
@endif
@if(canGeneral('giagocvlxd','index'))
    @if(can('giagocvlxd','index'))
        <li class="">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Giá gốc vật liệu xây dựng</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('kkgiagocvlxd','index'))
                    <li>
                        <a href="{{url('thongtingiagocvlxd')}}">Thông tin hồ sơ</a>
                    </li>
                @endif
                @if(can('thgiagocvlxd','index'))
                    <li>
                        <a href="{{url('tonghopgiagocvlxd')}}">Tổng hợp hồ sơ</a>
                    </li>
                @endif
                {{--@if(can('thgiagocvlxd','timkiem'))--}}
                    {{--<li>--}}
                        {{--<a href="{{url('timkiemttgiagocvlxd')}}">Tìm kiếm thông tin</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            </ul>
        </li>
    @endif
@endif

@include('includes.main.include.kknygia')