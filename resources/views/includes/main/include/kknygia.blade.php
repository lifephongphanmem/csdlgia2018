@if(canGeneral('kknygia','index'))
    @if(can('kknygia','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá kê khai của hàng hóa, dịch vụ thuộc dnah mục kê khai giá">
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
                @if(canGeneral('vlxd','index'))
                    @if(can('vlxd','index'))
                    <li>
                        <a href="">
                            <span class="title">Vật liệu xây dựng</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            @if(session('admin')->level == 'VLXD')
                                <li><a href="{{url('thongtinkekhaigiavatlieuxaydung')}}">Kê khai giá VLXD</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                <li><a href="{{url('danhmucvatlieuxaydung')}}">Danh mục VLXD</a></li>
                                <li><a href="{{url('thongtindnkkgiavlxd')}}">Kê khai giá VLXD</a></li>
                                <li><a href="{{url('xetduyetkkgiavlxd')}}">Thông tin hồ sơ xét duyệt</a></li>
                                <li><a href="{{url('timkiemkkgiavlxd')}}">Tìm kiếm thông tin</a> </li>
                                <!--li><a href="{{url('baocaokekhaigiavlxd')}}">Báo cáo thống kê</a></li-->
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
                @if(canGeneral('xmtxd','index'))
                    @if(can('xmtxd','index'))
                        <li>
                            <a href="">
                                <span class="title">Xi măng, thép xây dựng</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'XMTXD')
                                    <li><a href="{{url('thongtinkekhaiximangthepxaydung')}}">Kê khai giá xi măng, thép xây dựng</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindnkkgiaxmtxd')}}">Kê khai giá xi măng, thép xây dựng</a></li>
                                    <li><a href="{{url('xetduyetkkgiaxmtxd')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiaxmtxd')}}">Tìm kiếm thông tin</a> </li>
                                    <!--li><a href="{{url('baocaokekhaigiaxmtxd')}}">Báo cáo thống kê</a></li-->
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('dvhdtm','index'))
                    @if(can('dvhdtm','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá dịch vụ hỗ trợ hoạt động thương mại tại cửa khẩu (kho,bến, bãi, bốc xếp hàng hóa tại cửa khẩu, dịch vụ khác">
                            <a href="">
                                <span class="title">Giá dịch vụ hỗ trợ hoạt động thương mại tại cửa khẩu</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DVHDTM')
                                    <li><a href="{{url('thongtinkkdvhoatdongthuongmai')}}">Kê khai giá dịch vụ</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindnkkgiadvhdtm')}}">Kê khai giá dịch vụ</a></li>
                                    <li><a href="{{url('xetduyetkkgiadvhdtm')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiadvhdtm')}}">Tìm kiếm thông tin</a> </li>
                                    <!--li><a href="{{url('baocaokkgiadvhdtm')}}">Báo cáo thống kê</a></li-->
                                @endif
                            </ul>
                        </li>
                        @endif
                    @endif

                <!--li>
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
                @if(canGeneral('tacn','index'))
                    @if(can('tacn','index'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Thức ăn chăn nuôi</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'TACN')
                                    @if(can('kktacn','index'))
                                        <li><a href="{{url('kekhaigiathucanchannuoi')}}">Kê khai giá TACN</a> </li>
                                    @endif
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    @if(can('kktacn','index'))
                                        <li><a href="{{url('thontindntacn')}}">Kê khai giá TACN</a> </li>
                                        <li><a href="{{url('xetduyetkekhaigiatacn')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    @endif
                                    @if(can('thtacn','timkiem'))
                                        <li><a href="{{url('timkiemkekhaigiatacn')}}">Tìm kiếm thông tin</a> </li>
                                    @endif
                                    @if(can('thtacn','baocao'))
                                        <!--li><a href="{{url('baocaokekhaitacn')}}">Báo cáo thống kê</a></li-->
                                    @endif
                                @endif
                            </ul>
                        </li>
                        @endif
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
                @if(canGeneral('dvvt','index'))
                    @if(can('dvvt','index'))
                        <li>
                            <a href=""><span class="title">Dịch vụ vận tải</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(canGeneral('vtxk','index'))
                                    @if(can('vtxk','index'))
                                        @if(canDVVT('dvvt','vtxk'))
                                            <li>
                                                <a href="">
                                                    <span class="title">Vận tải hành khách bằng ôtô tuyến cố định</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu" style="display: none;">
                                                    @if(session('admin')->level == 'DVVT')
                                                        @if(can('dmvtxk','index'))
                                                            <!--li><a href="">Danh mục dịch vụ</a> </li-->
                                                        @endif
                                                        @if(can('kkvtxk','index'))
                                                            <li><a href="{{url('kekhaigiavantaixekhach')}}">Kê khai giá</a></li>
                                                        @endif
                                                    @endif
                                                    @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                                        @if(can('kkvtxk','index'))
                                                            <li><a href="{{url('thongtindnvtxk')}}">Kê khai giá vận tải xe khách</a></li>
                                                            <li><a href="{{url('xetduyetkekhaigiavtxk')}}">Xét duyệt hồ sơ kê khai</a></li>
                                                        @endif
                                                        @if(can('thvtxk','timkiem'))
                                                            <li><a href="{{url('timkiemgiavantaixekhach')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                                        @endif
                                                        @if(can('thvtxk','baocao'))
                                                            <!--li><a href="">Báo cáo</a></li-->
                                                        @endif
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                @endif
                                @if(canGeneral('vtxb','index'))
                                    @if(can('vtxb','index'))
                                        @if(canDVVT('dvvt','vtxb'))
                                            <li>
                                                <a href="">
                                                    <span class="title">Vận tải hành khách bằng xe buýt theo tuyến cố định</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu" style="display: none;">
                                                    <li><a href="">Danh mục dịch vụ</a> </li>
                                                    <li><a href="">Kê khai giá</a></li>
                                                    <li><a href="">Xét duyệt hồ sơ kê khai</a></li>
                                                    <li><a href="">Tìm kiếm hồ sơ kê khai</a></li>
                                                    <li><a href="">Báo cáo</a></li>
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                @endif
                                @if(canGeneral('vtxtx','index'))
                                    @if(can('vtxtx','index'))
                                        @if(canDVVT('dvvt','vtxtx'))
                                            <li>
                                                <a href="">
                                                    <span class="title">Vận tải hành khách bằng xe taxi</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu" style="display: none;">
                                                    @if(session('admin')->level == 'DVVT')
                                                        @if(can('dmvtxtx','index'))
                                                            <!--li><a href="">Danh mục dịch vụ</a> </li-->
                                                        @endif
                                                        @if(can('kkvtxtx','index'))
                                                            <li><a href="{{url('kekhaigiavantaixetaxi')}}">Kê khai giá</a></li>
                                                        @endif
                                                    @endif
                                                    @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                                        @if(can('kkvtxtx','index'))
                                                            <li><a href="{{url('thongtindnvtxtx')}}">Kê khai giá vận tải xe taxi</a></li>
                                                            <li><a href="{{url('xetduyetkekhaigiavtxtx')}}">Xét duyệt hồ sơ kê khai</a></li>
                                                        @endif
                                                        @if(can('thvtxtx','timkiem'))
                                                            <li><a href="{{url('timkiemgiavantaixetaxi')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                                        @endif
                                                        @if(can('thvtxtx','baocao'))
                                                            <!--li><a href="">Báo cáo</a></li-->
                                                        @endif
                                                    @endif
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                @endif
                                @if(canGeneral('vtch','index'))
                                    @if(can('vtch','index'))
                                        @if(canDVVT('dvvt','vtch'))
                                            <li>
                                                <a href="">
                                                    <span class="title">Vận tải khác</span>
                                                    <span class="arrow"></span>
                                                </a>
                                                <ul class="sub-menu" style="display: none;">
                                                    <li><a href="">Danh mục dịch vụ</a> </li>
                                                    <li><a href="">Kê khai giá</a></li>
                                                    <li><a href="">Xét duyệt hồ sơ kê khai</a></li>
                                                    <li><a href="">Tìm kiếm hồ sơ kê khai</a></li>
                                                    <!--li><a href="">Báo cáo</a></li-->
                                                </ul>
                                            </li>
                                        @endif
                                    @endif
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('tpcnte6t','index'))
                    @if(can('tpcnte6t','index'))
                        <li>
                            <a href="">
                                <span class="title">Thực phẩm chức năng cho trẻ em dưới 6 tuổi</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'TPCNTE6T')
                                    @if(can('kktpcnte6t','index'))
                                        <li><a href="{{url('kekhaithucphamchucnangchote6t')}}">Kê khai giá TPCN cho TE dưới 6 tuổi</a> </li>
                                    @endif
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    @if(can('kktpcnte6t','index'))
                                        <li><a href="{{url('thongtindntpcn6t')}}">Kê khai giá TPCN cho TE dưới 6 tuổi</a></li>
                                        <li><a href="{{url('xdkekhaigiatpcnte6t')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    @endif
                                    @if(can('tpcnte6t','timkiem'))
                                        <li><a href="{{url('timkiemkekhaigiatpcnte6t')}}">Tìm kiếm thông tin</a> </li>
                                    @endif
                                    @if(can('tpcnte6t','baocao'))
                                        <!--li><a href="{{url('baocaokekhaigiatpcnte6t')}}">Báo cáo thống kê</a></li-->
                                    @endif
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('dvlt','index'))
                    @if(can('dvlt','index'))
                        <li>
                            <a href="">
                                <span class="title">Dịch vụ lưu trú</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DVLT')
                                    @if(can('dmdvlt','index'))
                                        <li><a href="{{url('thongtincskd')}}">Danh sách CSKD</a> </li>
                                    @endif
                                    @if(can('kkdvlt','index'))
                                        <li><a href="{{url('thongtincskdkkdvlt')}}">Kê khai giá DVLT</a> </li>
                                    @endif
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    @if(can('kkdvlt','index'))
                                        <li><a href="{{url('thongtincskdkkdvlt')}}">Kê khai giá DVLT</a></li>
                                        <li><a href="{{url('xetduyetkkgiadvlt')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    @endif
                                    @if(can('thdvlt','timkiem'))
                                        <li><a href="{{url('timkiemkkgiadvlt')}}">Tìm kiếm thông tin</a> </li>
                                    @endif
                                    @if(can('thdvlt','baocao'))
                                        <li><a href="{{url('baocaokekhaidvlt')}}">Báo cáo thống kê</a></li>
                                    @endif
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @include('includes.main.include.kkdkg')
                </ul>
        </li>
    @endif
@endif
