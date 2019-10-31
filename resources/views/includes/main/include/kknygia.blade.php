@if(canGeneral('kknygia','index'))
    @if(can('kknygia','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá kê khai của hàng hóa, dịch vụ thuộc dah mục kê khai giá">
            <a href="">
                <i class="icon-folder"></i>
                <span class="title">Kê khai - Đăng ký giá</span>
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
                @if(canKkGiaGr('VLXD'))
                    @if(canKkGiaCt('VLXD','VLXD'))
                    <li>
                        <a href="">
                            <span class="title">Vật liệu xây dựng</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            @if(session('admin')->level == 'DN')
                                <li><a href="{{url('thongtinkekhaigiavatlieuxaydung')}}">Kê khai giá VLXD</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                <li><a href="{{url('danhmucvatlieuxaydung')}}">Danh mục VLXD</a></li>
                                <li><a href="{{url('thongtindnkkgiavlxd')}}">Kê khai giá VLXD</a></li>
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
                            <a href="">
                                <span class="title">Xi măng, thép xây dựng</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('thongtinkekhaiximangthepxaydung')}}">Kê khai giá xi măng, thép xây dựng</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindnkkgiaxmtxd')}}">Kê khai giá xi măng, thép xây dựng</a></li>
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
                            <a href="">
                                <span class="title">Giá dịch vụ hỗ trợ hoạt động thương mại tại cửa khẩu</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('thongtinkkdvhoatdongthuongmai')}}">Kê khai giá dịch vụ</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindnkkgiadvhdtm')}}">Kê khai giá dịch vụ</a></li>
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
                        <a href="">
                            <span class="title">Than</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            @if(session('admin')->level == 'DN')
                                <li><a href="{{url('kekhaigiathan')}}">Kê khai giá than</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                <li><a href="{{url('thongtindnthan')}}">Kê khai giá than</a> </li>
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
                        <a href="">
                            <span class="title">Thức ăn chăn nuôi</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiathucanchannuoi')}}">Kê khai giá TACN</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                <li><a href="{{url('thontindntacn')}}">Kê khai giá TACN</a> </li>
                                <li><a href="{{url('xetduyetkekhaigiatacn')}}">Thông tin hồ sơ xét duyệt</a></li>
                                <li><a href="{{url('timkiemkekhaigiatacn')}}">Tìm kiếm thông tin</a> </li>
                                <li><a href="{{url('baocaokekhaitacn')}}">Báo cáo thống kê</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
                @if(canKkGiaGr('GIAY'))
                    @if(canKkGiaCt('GIAY','GIAY'))
                        <li>
                            <a href="">
                                <span class="title">Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('kekhaigiagiay')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindngiay')}}">Kê khai giá </a> </li>
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
                            <a href="">
                                <span class="title">Sách giáo khoa</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('kekhaigiasach')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnsach')}}">Kê khai giá </a> </li>
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
                            <a href="">
                                <span class="title">Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiaetanol')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnetanol')}}">Kê khai giá </a> </li>
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
                        <ul class="sub-menu" style="display: none;">
                            @if(session('admin')->level == 'DN')
                                <li><a href="{{url('kekhaigiadvcang')}}">Kê khai giá</a> </li>
                            @endif
                            @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                <li><a href="{{url('thongtindndvcang')}}">Kê khai giá </a> </li>
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
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiaotonksx')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnotonksx')}}">Kê khai giá </a> </li>
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
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiaxemaynksx')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnxemaynksx')}}">Kê khai giá </a> </li>
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
                @if(canKkGiaGr('KCBTN'))
                    @if(canKkGiaCt('KCBTN','KCBTN'))
                        <li>
                            <a href="">
                                <span class="title">Dịch vụ khám chữa bệnh cho người tại cơ sở khám chữa bệnh tư nhân; khám chữa bệnh theo yêu cầu tại cơ sở khám chữa bệnh của nhà nước</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('kekhaigiakcbtn')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindnkcbtn')}}">Kê khai giá </a> </li>
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
                        <a href=""><span class="title">Dịch vụ vận tải</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            @if(canKkGiaCt('DVVT','VTXK'))
                                <li>
                                    <a href="">
                                        <span class="title">Cước vận tải hành khách bằng ôtô tuyến cố định</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: none;">
                                        @if(session('admin')->level == 'DN')
                                            <!--li><a href="">Danh mục dịch vụ</a> </li-->
                                            <li><a href="{{url('kekhaigiavantaixekhach')}}">Kê khai giá</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvtxk')}}">Kê khai giá vận tải xe khách</a></li>
                                            <li><a href="{{url('xetduyetkekhaigiavtxk')}}">Xét duyệt hồ sơ kê khai</a></li>
                                            <li><a href="{{url('timkiemgiavantaixekhach')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                            <li><a href="{{url('baocaogiavantaixekhach')}}">Báo cáo thống kê</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if(canKkGiaCt('DVVT','VTXB'))
                                <li>
                                    <a href="">
                                        <span class="title">Cước vận tải hành khách bằng xe buýt theo tuyến cố định</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: none;">
                                        @if(session('admin')->level == 'DN')
                                            <li><a href="{{url('kekhaivantaixebuyt')}}">Kê khai giá</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvtxb')}}">Kê khai giá vận tải xe buýt</a></li>
                                            <li><a href="{{url('xetduyetkekhaigiavtxb')}}">Xét duyệt hồ sơ kê khai</a></li>
                                            <li><a href="{{url('timkiemgiavantaixebuyt')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                            <li><a href="{{url('baocaogiavantaixebuyt')}}">Báo cáo thống kê</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if(canKkGiaCt('DVVT','VTXTX'))
                                <li>
                                    <a href="">
                                        <span class="title">Cước vận tải hành khách bằng xe taxi</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: none;">
                                        @if(session('admin')->level == 'DN')
                                                <li><a href="{{url('kekhaigiavantaixetaxi')}}">Kê khai giá</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvtxtx')}}">Kê khai giá vận tải xe taxi</a></li>
                                            <li><a href="{{url('xetduyetkekhaigiavtxtx')}}">Xét duyệt hồ sơ kê khai</a></li>
                                            <li><a href="{{url('timkiemgiavantaixetaxi')}}">Tìm kiếm hồ sơ kê khai</a></li>
                                            <li><a href="{{url('baocaogiavantaixetaxi')}}">Báo cáo thống kê</a></li>
                                        @endif
                                    </ul>
                                </li>
                            @endif
                            @if(canKkGiaCt('DVVT','VCHK'))
                                <li>
                                    <a href="">
                                        <span class="title">Cước vận chuyển hành khách: xe buýt, xe điện, bè mảng</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu" style="display: none;">
                                        @if(session('admin')->level == 'DN')
                                            <li><a href="{{url('kekhaicuocvchk')}}">Kê khai giá</a></li>
                                        @endif
                                        @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                            <li><a href="{{url('thongtindnvchk')}}">Kê khai giá</a></li>
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
                            <a href="">
                                <span class="title">Thực phẩm chức năng cho trẻ em dưới 6 tuổi</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaithucphamchucnangchote6t')}}">Kê khai giá TPCN cho TE dưới 6 tuổi</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtindntpcn6t')}}">Kê khai giá TPCN cho TE dưới 6 tuổi</a></li>
                                    <li><a href="{{url('xdkekhaigiatpcnte6t')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemkekhaigiatpcnte6t')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaigiatpcnte6t')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canKkGiaGr('DVLT'))
                    @if(canKkGiaCt('DVLT','DVLT'))
                        <li>
                            <a href="">
                                <span class="title">Dịch vụ lưu trú</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                        <li><a href="{{url('thongtincskd')}}">Danh sách CSKD</a> </li>
                                        <li><a href="{{url('thongtincskdkkdvlt')}}">Kê khai giá DVLT</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li><a href="{{url('thongtincskdkkdvlt')}}">Kê khai giá DVLT</a></li>
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
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiadvdlbb')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindndlbb')}}">Kê khai giá </a> </li>
                                    <li><a href="{{url('xetduyetgiadvdlbb')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiadvdlbb')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaidvdlbb')}}">Báo cáo thống kê</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canKkGiaGr('TQKDL'))
                    @if(canKkGiaCt('TQKDL','TQKDL'))
                        <li>
                            <a href="javascript:;">
                                <span class="title">Giá vé tham quan tại các khu du lịch</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu" style="display: none;">
                                @if(session('admin')->level == 'DN')
                                    <li><a href="{{url('kekhaigiavetqkdl')}}">Kê khai giá</a> </li>
                                @endif
                                @if(session('admin')->level == 'X' || session('admin')->level == 'T' || session('admin')->level == 'H')
                                    <li><a href="{{url('thongtindntqkdl')}}">Kê khai giá </a> </li>
                                    <li><a href="{{url('xetduyetgiavetqkdl')}}">Thông tin hồ sơ xét duyệt</a></li>
                                    <li><a href="{{url('timkiemgiavetqkdl')}}">Tìm kiếm thông tin</a> </li>
                                    <li><a href="{{url('baocaokekhaigiavetqkdl')}}">Báo cáo thống kê</a></li>
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
