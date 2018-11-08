@if(canGeneral('dinhgia','index'))
@if(can('dinhgia','index'))
<li class="">
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Định giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        <li>
            <a href="javascript:;">
                Giá các loại đất <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('dmqdgiadat')}}">Danh mục quyết định giá đất</a>
                </li>
                <li>
                    <a href="{{url('thongtingiacacloaidat')}}">Thông tin giá các loại đất</a>
                </li>
                <li>
                    <a href="{{url('timkiemthongtingiacacloaidat')}}">Tìm kiếm thông tin giá các loại đất</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá đấu giá đất <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('thongtindaugiadat')}}">Thông tin đấu giá đất</a>
                </li>
                <li>
                    <a href="{{url('timkiemthongtindaugiadat')}}">Tìm kiếm thông tin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá thuê đất, nước<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('giathuematdatmatnuoc')}}">Thông tin giá thuê mặt đất- mặt nước</a>
                </li>
                <li>
                    <a href="{{url('timkiemgiathuematdatmatnuoc')}}">Tìm kiếm thông tin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá rừng<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('dmgiarung')}}">Danh mục giá rừng</a>
                </li>
                <li>
                    <a href="{{url('giarung')}}">Thông tin giá rừng</a>
                </li>
                <li>
                    <a href="{{url('timkiemgiarung')}}">Tìm kiếm thông tin</a>
                </li>
            </ul>
        </li>
        <!--li>
            <a href="javascript:;">
                Giá thuê, mua nhà XH<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Sample Link 1</a>
                </li>
                <li>
                    <a href="#">Sample Link 2</a>
                </li>
                <li>
                    <a href="#">Sample Link 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá nước sạch sinh hoạt<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Sample Link 1</a>
                </li>
                <li>
                    <a href="#">Sample Link 2</a>
                </li>
                <li>
                    <a href="#">Sample Link 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá thuê tài sản công<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Sample Link 1</a>
                </li>
                <li>
                    <a href="#">Sample Link 2</a>
                </li>
                <li>
                    <a href="#">Sample Link 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá dịch vụ GD-ĐT<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Sample Link 1</a>
                </li>
                <li>
                    <a href="#">Sample Link 2</a>
                </li>
                <li>
                    <a href="#">Sample Link 3</a>
                </li>
            </ul>
        </li-->
        <li>
            <a href="javascript:;">
                Giá DV KCB<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('nhomdichvukcb')}}">Nhóm DV KCB</a>
                </li>
                <li>
                    <a href="{{url('dichvukcb')}}">Thông tin DV KCB</a>
                </li>
                <li>
                    <a href="{{url('timkiemdichvukcb')}}">Tìm kiếm thông tin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Mức trợ giá, trợ cước<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Sample Link 1</a>
                </li>
                <li>
                    <a href="#">Sample Link 2</a>
                </li>
                <li>
                    <a href="#">Sample Link 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá HH-DV khác <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('nhomhanghoadichvu')}}">Danh mục HH-DV</a>
                </li>
                <li>
                    <a href="{{url('giahhdvkhac')}}">Thông tin hồ sơ</a>
                </li>
                <li>
                    <a href="{{url('timkiemgiahhdvkhac')}}">Tìm kiếm thông tin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá thuế tài nguyên<span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('nhomthuetn')}}">DM thuế tài nguyên </a>
                </li>
                <li>
                    <a href="{{url('thuetainguyen')}}">Thông tin thuế TN</a>
                </li>
                <li>
                    <a href="{{url('timkiemthuetainguyen')}}">Tìm kiếm thông tin</a>
                </li>
                <li>
                    <a href="{{url('reportsthuetainguyen')}}">Báo cáo tổng hợp</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Giá lệ phí trước bạ <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('nhomlephitruocba')}}">Danh mục nhóm xe </a>
                </li>
                <li>
                    <a href="{{url('lephitruocba')}}">Thông tin giá LPTB</a>
                </li>
                <li>
                    <a href="{{url('timkiemlephitruocba')}}">Tìm kiếm thông tin</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                Phí, lệ phí <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a href="{{url('nhomphilephi')}}">Danh mục nhóm phí lệ phí</a>
                </li>
                <li>
                    <a href="{{url('philephi')}}">Thông tin giá phí, lệ phí</a>
                </li>
                <li>
                    <a href="{{url('timkiemthongtinphilephi')}}">Tìm kiếm thông tin</a>
                </li>
            </ul>
        </li>
    </ul>
</li>
@endif
@endif