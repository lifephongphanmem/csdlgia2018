@if(canGeneral('kknygia','index'))
    @if(can('kknygia','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá kê khai của hàng hóa, dịch vụ thuộc dah mục Giá kê khai">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Mức giá kê khai - đăng ký</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(session('admin')->level == 'DN')
                    @if(can('ttdn','index'))
                        <li><a href="{{url('thongtindoanhnghiep')}}">Thông tin doanh nghiệp</a></li>
                    @endif
                @elseif(session('admin')->level == 'T')
                    @if(can('ttdn','approve'))
                        <li><a href="{{url('xetduyettdttdn')}}"> Xét duyệt thay đổi thông tin doanh nghiệp</a></li>
                    @endif
                @endif
                @if(canKkGiaGr('VLXD'))
                    @if(canKkGiaCt('VLXD','VLXD'))
                    <li>
                        <a href="javascript:;">
                            <span class="title">Vật liệu xây dựng</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(session('admin')->level == 'DN')
                                <li><a href="{{url('thongtinkekhaigiavatlieuxaydung')}}">Giá kê khai</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                <li><a href="{{url('danhmucvatlieuxaydung')}}">Danh mục VLXD</a></li>
                                <li><a href="{{url('thongtindnkkgiavlxd')}}">Giá kê khai</a></li>
                                <li><a href="{{url('xetduyetkkgiavlxd')}}">Thông tin hồ sơ xét duyệt</a></li>
                                <li><a href="{{url('timkiemkkgiavlxd')}}">Tìm kiếm thông tin</a> </li>
                                <li><a href="{{url('baocaokekhaigiavlxd')}}">Báo cáo thống kê</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{--Ok--}}
                @endif
                @if(canKkGiaGr('XMTXD'))
                    @if(canKkGiaCt('XMTXD','XMTXD'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Xi măng, thép xây dựng</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('thongtinkekhaiximangthepxaydung')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindnkkgiaxmtxd')}}">Giá kê khai</a></li>
                                    <li><a href="{{url('xetduyetkkgiaxmtxd')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiaxmtxd')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaigiaxmtxd')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--Ok--}}
                @endif
                @if(canKkGiaGr('DVHDTMCK'))
                    @if(canKkGiaCt('DVHDTMCK','DVHDTMCK'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá dịch vụ hỗ trợ hoạt động thương mại tại cửa khẩu (kho,bến, bãi, bốc xếp hàng hóa tại cửa khẩu, dịch vụ khác">
                            <a href="javascript:;">
                                <span class="title">Giá dịch vụ hỗ trợ hoạt động thương mại tại cửa khẩu</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('thongtinkkdvhoatdongthuongmai')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindnkkgiadvhdtm')}}">Giá kê khai</a></li>
                                    <li><a href="{{url('xetduyetkkgiadvhdtm')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiadvhdtm')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokkgiadvhdtm')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--OK--}}
                @endif
                @if(canKkGiaGr('THAN'))
                    @if(canKkGiaCt('THAN','THAN'))
                    <li>
                        <a href="javascript:;">
                            <span class="title">Than</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(session('admin')->level == 'DN')
                                <li><a href="{{url('kekhaigiathan')}}">Giá kê khai than</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                <li><a href="{{url('thongtindnthan')}}">Giá kê khai</a> </li>
                                <li><a href="{{url('xetduyetgiathan')}}">Thông tin hồ sơ xét duyệt</a></li>
                                <li><a href="{{url('timkiemgiathan')}}">Tìm kiếm thông tin</a> </li>
                                <li><a href="{{url('baocaokkgiathan')}}">Báo cáo thống kê</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{--OK--}}
                @endif
                @if(canKkGiaGr('TACN'))
                    @if(canKkGiaCt('TACN','TACN'))
                    <li>
                        <a href="javascript:;">
                            <span class="title">Thức ăn chăn nuôi</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiathucanchannuoi')}}">Giá kê khai</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                <li><a href="{{url('thontindntacn')}}">Giá kê khai</a> </li>
                                <li><a href="{{url('xetduyetkekhaigiatacn')}}">Thông tin hồ sơ xét duyệt</a></li>
                                <li><a href="{{url('timkiemkekhaigiatacn')}}">Tìm kiếm thông tin</a> </li>
                                <li><a href="{{url('baocaokekhaitacn')}}">Báo cáo thống kê</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{--OK--}}
                @endif
                @if(canKkGiaGr('GIAY'))
                    @if(canKkGiaCt('GIAY','GIAY'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('kekhaigiagiay')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindngiay')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiagiay')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiagiay')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokkgiagiay')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canKkGiaGr('SACH'))
                    @if(canKkGiaCt('SACH','SACH'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Sách giáo khoa</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('kekhaigiasach')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnsach')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiasach')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiasach')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokkgiasach')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--OK--}}
                @endif
                @if(canKkGiaGr('ETANOL'))
                    @if(canKkGiaCt('ETANOL','ETANOL'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiaetanol')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnetanol')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiaetanol')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiaetanol')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokkgiaetanol')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--OK--}}
                @endif
                @if(canKkGiaGr('DVCB'))
                    @if(canKkGiaCt('DVCB','DVCB'))
                    <li>
                        <a href="javascript:;">
                            <span class="title">Giá dv tại cảng biển, cảng hàng không</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(session('admin')->level == 'DN')
                                <li><a href="{{url('kekhaigiadvcang')}}">Giá kê khai</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                <li><a href="{{url('thongtindndvcang')}}">Giá kê khai </a> </li>
                                <li><a href="{{url('xetduyetgiadvcang')}}">Thông tin hồ sơ xét duyệt</a></li>
                                <li><a href="{{url('timkiemgiadvcang')}}">Tìm kiếm thông tin</a> </li>
                                <li><a href="{{url('baocaokkgiadvcang')}}">Báo cáo thống kê</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{--Ok--}}
                @endif
                @if(canKkGiaGr('OTO'))
                    @if(canKkGiaCt('OTO','OTO'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Giá ô tô nhập khẩu, sản xuất trong nước dưới 15 chỗ ngồi</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiaotonksx')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnotonksx')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiaotonksx')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiaotonksx')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokkgiaotonksx')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--Ok--}}
                @endif
                @if(canKkGiaGr('XEMAY'))
                    @if(canKkGiaCt('XEMAY','XEMAY'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Giá xe gắn máy nhập khẩu, sản xuất trong nước</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiaxemaynksx')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnxemaynksx')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiaxemaynksx')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiaxemaynksx')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokkgiaxemaynksx')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                            {{--OK--}}
                @endif
                <!--li>
                    <a href="javascript:;">
                        <span class="title">Vận tải đường sắt</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="javascript:;">---</a> </li>
                        <li><a href="javascript:;">Giá kê khai</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <span class="title">Giá vé máy bay</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="javascript:;">---</a> </li>
                        <li><a href="javascript:;">Giá kê khai</a></li>
                    </ul>
                </li-->
                @if(canKkGiaGr('KCBTN'))
                    @if(canKkGiaCt('KCBTN','KCBTN'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Dịch vụ khám chữa bệnh cho người tại cơ sở khám chữa bệnh tư nhân; khám chữa bệnh theo yêu cầu tại cơ sở khám chữa bệnh của nhà nước</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('kekhaigiakcbtn')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnkcbtn')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiakcbtn')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiakcbtn')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaogiakcbtn')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canKkGiaGr('DVVT'))
                    <li>
                        <a href="javascript:;"><span class="title">Dịch vụ vận tải</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(canKkGiaCt('DVVT','VTXK'))
                                <li>
                                    <a href="javascript:;">
                                        <span class="title">Cước vận tải hành khách bằng ôtô tuyến cố định</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        @if(session('admin')->level == 'DN')
                                            <!--li><a href="javascript:;">Danh mục dịch vụ</a> </li-->
                                            <li><a href="{{url('kekhaigiavantaixekhach')}}">Giá kê khai</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvtxk')}}">Giá kê khai</a></li>
                                            <li><a href="{{url('xetduyetkekhaigiavtxk')}}">Xét duyệt hồ sơ kê khai</a></li>
                                            <li><a href="{{url('timkiemgiavantaixekhach')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                            <li><a href="{{url('baocaogiavantaixekhach')}}">Báo cáo thống kê</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if(canKkGiaCt('DVVT','VTXB'))
                                <li>
                                    <a href="javascript:;">
                                        <span class="title">Cước vận tải hành khách bằng xe buýt theo tuyến cố định</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        @if(session('admin')->level == 'DN')
                                            <li><a href="{{url('kekhaivantaixebuyt')}}">Giá kê khai</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvtxb')}}">Giá kê khai</a></li>
                                            <li><a href="{{url('xetduyetkekhaigiavtxb')}}">Xét duyệt hồ sơ kê khai</a></li>
                                            <li><a href="{{url('timkiemgiavantaixebuyt')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                            <li><a href="{{url('baocaogiavantaixebuyt')}}">Báo cáo thống kê</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if(canKkGiaCt('DVVT','VTXTX'))
                                <li>
                                    <a href="javascript:;">
                                        <span class="title">Cước vận tải hành khách bằng xe taxi</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        @if(session('admin')->level == 'DN')
                                                <li><a href="{{url('kekhaigiavantaixetaxi')}}">Giá kê khai</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvtxtx')}}">Giá kê khai</a></li>
                                            <li><a href="{{url('xetduyetkekhaigiavtxtx')}}">Xét duyệt hồ sơ kê khai</a></li>
                                            <li><a href="{{url('timkiemgiavantaixetaxi')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                            <li><a href="{{url('baocaogiavantaixetaxi')}}">Báo cáo thống kê</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if(canKkGiaCt('DVVT','VCHK'))
                                <li>
                                    <a href="javascript:;">
                                        <span class="title">Cước vận chuyển hành khách: xe buýt, xe điện, bè mảng</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        @if(session('admin')->level == 'DN')
                                            <li><a href="{{url('kekhaicuocvchk')}}">Giá kê khai</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvchk')}}">Giá kê khai</a></li>
                                            <li><a href="{{url('xetduyetkekhaicuocvchk')}}">Xét duyệt hồ sơ kê khai</a></li>
                                            <li><a href="{{url('timkiemcuocvchk')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                            <li><a href="{{url('baocaogiacuocvchk')}}">Báo cáo thống kê</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if(canKkGiaGr('TPCNTE6T'))
                    @if(canKkGiaCt('TPCNTE6T','TPCNTE6T'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Thực phẩm chức năng cho trẻ em dưới 6 tuổi</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaithucphamchucnangchote6t')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindntpcn6t')}}">Giá kê khai</a></li>
                                    <li><a href="{{url('xdkekhaigiatpcnte6t')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemkekhaigiatpcnte6t')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaigiatpcnte6t')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--OK--}}
                @endif
                @if(canKkGiaGr('DVLT'))
                    @if(canKkGiaCt('DVLT','DVLT'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Dịch vụ lưu trú</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('thongtincskd')}}">Danh sách CSKD</a> </li>
                                        <li><a href="{{url('thongtincskdkkdvlt')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtincskdkkdvlt')}}">Giá kê khai</a></li>
                                    <li><a href="{{url('xetduyetkkgiadvlt')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemkkgiadvlt')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaidvlt')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canKkGiaGr('DLBB'))
                    @if(canKkGiaCt('DLBB','DLBB'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Giá dịch vụ du lịch tại bãi biển</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiadvdlbb')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindndlbb')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiadvdlbb')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiadvdlbb')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaidvdlbb')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--OK--}}
                @endif
                @if(canKkGiaGr('TQKDL'))
                    @if(canKkGiaCt('TQKDL','TQKDL'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Giá vé tham quan tại các khu du lịch</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiavetqkdl')}}">Giá kê khai</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindntqkdl')}}">Giá kê khai </a> </li>
                                    <li><a href="{{url('xetduyetgiavetqkdl')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiavetqkdl')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaigiavetqkdl')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    {{--OK--}}
                @endif
                @include('includes.main.include.kkdkg')
                </ul>
        </li>
    @endif
@endif
