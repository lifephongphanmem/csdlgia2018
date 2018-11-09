@if(canGeneral('dinhgia','index'))
@if(can('dinhgia','index'))
<li class="">
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Định giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(canGeneral('giacldat','index'))
            @if(can('giacldat','index'))
            <li>
                <a href="javascript:;">
                    Giá các loại đất <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('dmgiacldat','index'))
                    <li>
                        <a href="{{url('dmqdgiadat')}}">Danh mục quyết định giá đất</a>
                    </li>
                    @endif
                    @if(can('kkgiacldat','index'))
                    <li>
                        <a href="{{url('thongtingiacacloaidat')}}">Thông tin giá các loại đất</a>
                    </li>
                    @endif
                    @if(can('thgiacldat','timkiem'))
                    <li>
                        <a href="{{url('timkiemthongtingiacacloaidat')}}">Tìm kiếm thông tin giá các loại đất</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giadaugiadat','index'))
            @if(can('giadaugiadat','index'))
            <li>
                <a href="javascript:;">
                    Giá đấu giá đất <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('kkgiadaugiadat','index'))
                    <li>
                        <a href="{{url('thongtindaugiadat')}}">Thông tin đấu giá đất</a>
                    </li>
                    @endif
                    @if(can('thgiadaugiadat','timkiem'))
                    <li>
                        <a href="{{url('timkiemthongtindaugiadat')}}">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giathuedatnuoc','index'))
            @if(can('giathuedatnuoc','index'))
            <li>
                <a href="javascript:;">
                    Giá thuê đất, nước<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('kkgiathuedatnuoc','index'))
                    <li>
                        <a href="{{url('giathuematdatmatnuoc')}}">Thông tin giá thuê mặt đất- mặt nước</a>
                    </li>
                    @endif
                    @if(can('thgiathuedatnuoc','timkiem'))
                    <li>
                        <a href="{{url('timkiemgiathuematdatmatnuoc')}}">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giarung','index'))
            @if(can('giarung','index'))
        <li>
            <a href="javascript:;">
                Giá rừng<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(can('dmgiarung','index'))
                <li>
                    <a href="{{url('dmgiarung')}}">Danh mục giá rừng</a>
                </li>
                @endif
                @if(can('kkgiarung','index'))
                <li>
                    <a href="{{url('giarung')}}">Thông tin giá rừng</a>
                </li>
                @endif
                @if(can('thgiarung','timkiem'))
                <li>
                    <a href="{{url('timkiemgiarung')}}">Tìm kiếm thông tin</a>
                </li>
                @endif
            </ul>
        </li>
            @endif
        @endif
        @if(canGeneral('giathuemuanhaxh','index'))
            @if(can('giathuemuanhaxh','index'))
            <li>
                <a href="javascript:;">
                    Giá thuê, mua nhà XH<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('kkgiathuemuanhaxh','index'))
                    <li>
                        <a href="">Thông tin thuê mua nhà XH</a>
                    </li>
                    @endif
                    @if(can('thgiathuemuanhaxh','timkiem'))
                    <li>
                        <a href="">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('gianuocsh','index'))
            @if(can('gianuocsh','index'))
            <li>
                <a href="javascript:;">
                    Giá nước sạch sinh hoạt<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('kkgianuocsh','index'))
                    <li>
                        <a href="">Thông tin giá nước sạch sinh hoạt</a>
                    </li>
                    @endif
                    @if(can('thgianuocsh','timkiem'))
                    <li>
                        <a href="">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giathuetsc','index'))
            @if(can('giathuetsc','index'))
            <li>
                <a href="javascript:;">
                    Giá thuê tài sản công<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('kkgiathuetsc','index'))
                    <li>
                        <a href="">Thông tin giá thuê tài sản công</a>
                    </li>
                    @endif
                    @if(can('thgiathuetsc','timkiem'))
                    <li>
                        <a href="">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giadvgddt','index'))
            @if(can('giadvgddt','index'))
            <li>
                <a href="javascript:;">
                    Giá dịch vụ GD-ĐT<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('kkgiadvgddt','index'))
                    <li>
                        <a href="#">Thông tin giá DV GD-DT</a>
                    </li>
                    @endif
                    @if(can('thgiadvgddt','timkiem'))
                    <li>
                        <a href="#">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giadvkcb','index'))
            @if(can('giadvkcb','index'))
            <li>
                <a href="javascript:;">
                    Giá DV KCB<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('dmgiadvkcb','index'))
                    <li>
                        <a href="{{url('nhomdichvukcb')}}">Nhóm DV KCB</a>
                    </li>
                    @endif
                    @if(can('kkgiadvkcb','index'))
                    <li>
                        <a href="{{url('dichvukcb')}}">Thông tin DV KCB</a>
                    </li>
                    @endif
                    @if(can('thgiadvkcb','timkiem'))
                    <li>
                        <a href="{{url('timkiemdichvukcb')}}">Tìm kiếm thông tin</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('trogiatrocuoc','index'))
            @if(can('trogiatrocuoc','index'))
            <li>
                <a href="javascript:;">
                    Mức trợ giá, trợ cước<span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(can('dmtrogiatrocuoc','index'))
                    <li>
                        <a href="">Danh mục mức trợ giá, trợ cước</a>
                    </li>
                    @endif
                    @if(can('kktrogiatrocuoc','index'))
                    <li>
                        <a href="">Thông tin mức trợ giá trợ cước</a>
                    </li>
                    @endif
                    @if(can('thtrogiatrocuoc','timkiem'))
                    <li>
                        <a href="#">Sample Link 3</a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giahhdvk','index'))
            @if(can('giahhdvk','index'))
            <li>
                <a href="javascript:;">
                    Giá HH-DV khác <span class="arrow"></span>
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
                </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('giathuetn','index'))
            @if(can('giathuetn','index'))
            <li>
                <a href="">
                    Giá thuế tài nguyên<span class="arrow"></span>
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
            <li>
                <a href="javascript:;">
                    Giá lệ phí trước bạ <span class="arrow"></span>
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
            <li>
                <a href="javascript:;">
                    Phí, lệ phí <span class="arrow"></span>
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
    </ul>
</li>
@endif
@endif