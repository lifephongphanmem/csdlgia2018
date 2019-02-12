@include('includes.main.include.dinhgia')
@if(canGeneral('giahhdvk','index'))
    @if(can('giahhdvk','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá thị trường hàng hóa dịch vụ khác do UBND tỉnh, thành phố trực thuộc trung ương và các Bộ quản lý ngành, lĩnh vực tự quy định thuộc nội dung CSDL giá của mình">
            <a href="">
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
                    @if(can('thgiahhdvk','baocao'))
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
@if(canGeneral('giathuetn','index'))
    @if(can('giathuetn','index'))
        <li class="">
            <a href="">
                <i class="icon-folder"></i>
                <span class="title">Giá thuế tài nguyên</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('dmgiathuetn','index'))
                    <li>
                        <a href="{{url('nhomthuetn')}}">DM thuế tài nguyên </a>
                    </li>
                @endif
                @if(can('kkgiathuetn','index'))
                    <li>
                        <a href="{{url('thuetainguyen')}}">Thông tin thuế TN</a>
                    </li>
                @endif
                @if(can('thgiathetn','timkiem'))
                    <li>
                        <a href="{{url('timkiemthuetainguyen')}}">Tìm kiếm thông tin</a>
                    </li>
                @endif
                @if(can('thgiathuetn','baocao'))
                    <li>
                        <a href="{{url('reportsthuetainguyen')}}">Báo cáo tổng hợp</a>
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
            <a href="">
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
@if(canGeneral('giaphilephi','index'))
    @if(can('giaphilephi','index'))
        <li class="">
            <a href="">
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
        <a href="">
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
<li class="">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Giá đấu thầu mua TS</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        @if(can('kkmuataisan','index'))
            <li>
                <a href="{{url('thongtinmuataisan')}}">Thông tin đấu thầu mua TS</a>
            </li>
        @endif
        @if(can('thmuataisan','timkiem'))
            <li>
                <a href="{{url('timkiemmuataisan')}}">Tìm kiếm thông tin</a>
            </li>
        @endif
    </ul>
</li>

@include('includes.main.include.bog')
@include('includes.main.include.kknygia')