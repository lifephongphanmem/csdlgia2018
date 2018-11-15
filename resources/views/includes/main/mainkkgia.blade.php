@if(canGeneral('kkgia','index'))
@if(can('kkgia','index'))
<li class="">
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Giá kê khai HH-DV</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(session('admin')->level != 'T' && session('admin')->level != 'H' && session('admin')->level != 'X')
            @if(can('ttdn','index'))
                <li><a href="{{url('thongtindoanhnghiep')}}">Thông tin doanh nghiệp</a></li>
            @endif
        @endif
        <!--li>
            <a href="javascript:;">
                <span class="title">Xi măng, thép xây dựng</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">Thông tin doanh nghiệp</a></li>
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <span class="title">Than</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">Thông tin doanh nghiệp</a></li>
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li-->
        @if(can('kktacn','index'))
        <!--li>
            <a href="javascript:;">
                <span class="title">Thức ăn chăn nuôi</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @if(session('admin')->level == 'TACN')
                    <li><a href="{{url('thongtindoanhnghiep')}}">Thông tin doanh nghiệp</a></li>
                    <li><a href="{{url('kekhaigiatacn')}}">Kê khai giá TACN</a> </li>
                @endif
                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                    <li><a href="{{url('xetduyetkekhaigiatacn')}}">Thông tin hồ sơ xét duyệt</a></li>

                    <li><a href="{{url('timkiemkekhaigiatacn')}}">Tìm kiếm thông tin</a> </li>
                    <li><a href="{{url('baocaokekhaitacn')}}">Báo cáo thống kê</a></li>
                @endif
            </ul>
        </li-->
        @endif
        <!--li>
            <a href="javascript:;">
                <span class="title">Giấy in,viết,giấy in báo </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">Thông tin doanh nghiệp</a></li>
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li-->
        <!--li>
            <a href="javascript:;">
                <span class="title">Giá dv tại cảng biển, cảng hàng không</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li-->
        <!--li>
            <a href="javascript:;">
                <span class="title">Vận tải đường sắt</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <span class="title">Sách giáo khoa</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:;">
                <span class="title">Giá vé máy bay</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li-->
        <!--li>
            <a href="javascript:;">
                <span class="title">Dịch vụ khám chữa bệnh</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="">---</a> </li>
                <li><a href="">Kê khai giá</a></li>
            </ul>
        </li-->
        @if(can('kkvtxk','index') || can('kkvtxb','index') || can('kkvttx','index') || can('kkvtch','index'))
            @if(session('admin')->level == 'DVVT')
                @if(can('ttdn','index'))
                <li><a href="{{url('thongtindoanhnghiep')}}">Thông tin doanh nghiệp</a></li>
                @endif
            @endif
            <!--li>
                <a href="javascript:;">
                    <span class="title">Vận tải xe khách</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="">Kê khai giá</a> </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="title">Vận tải xe buýt</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="">Kê khai giá</a> </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="title">Vận tải xe taxi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="">Kê khai giá</a> </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="title">Vận tải khác</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" style="display: none;">
                    <li><a href="">Kê khai giá</a> </li>
                </ul>
            </li-->
        @endif
        <!--li>
            <a href="javascript:;">
                <span class="title">Thực phẩm chức năng cho trẻ em dưới 6 tuổi</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">

            </ul>
        </li-->
        @if(can('kkdvgs','index'))
        <li>
            <a href="javascript:;">
                <span class="title">Thực phẩm chức năng cho trẻ em dưới 6 tuổi</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @if(session('admin')->level == 'DVGS')
                    @if(can('ttdn','index'))
                    <li><a href="{{url('thongtindoanhnghiep')}}">Thông tin doanh nghiệp</a></li>
                    @endif
                    @if(can('kkdvgs','create'))
                    <li><a href="{{url('kekhaigiasua')}}">Kê khai giá thực phẩm chức năng</a> </li>
                    @endif
                @endif
                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                    @if(can('kkdvgs','approve'))
                    <li><a href="{{url('xdkekhaigiasua')}}">Thông tin hồ sơ xét duyệt</a></li>
                    @endif
                    <li><a href="{{url('timkiemkekhaigiasua')}}">Tìm kiếm thông tin</a> </li>
                    <li><a href="{{url('baocaokekhaigiasua')}}">Báo cáo thống kê</a></li>
                @endif
            </ul>
        </li>
        @endif

        @if(can('kkdvlt','index'))
        <li>
            <a href="">
                <span class="title">Dịch vụ lưu trú</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @if(session('admin')->level == 'DVLT')
                <li><a href="{{url('thongtincskd')}}">Danh sách CSKD</a> </li>
                <li><a href="{{url('thongtincskdkkdvlt')}}">Kê khai giá DVLT</a> </li>
                @endif
                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                    <li><a href="{{url('thongtincskdkkdvlt')}}">Kê khai giá DVLT</a> </li>
                    <li><a href="{{url('xetduyetkkgiadvlt')}}">Thông tin hồ sơ xét duyệt</a></li>

                    <li><a href="{{url('timkiemkkgiadvlt')}}">Tìm kiếm thông tin</a> </li>
                <li><a href="{{url('baocaokekhaidvlt')}}">Báo cáo thống kê</a></li>
                @endif
            </ul>
        </li>
        @endif


    </ul>
</li>
@endif
@endif