@if(canGeneral('dinhgia','index'))
    @if(can('dinhgia','index'))
        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
            data-original-title="Giá hàng hóa, dịch vụ do UBND định giá">
            <a href="javascript:;">
                <i class="icon-folder"></i>
                <span class="title">Định giá</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                @if(canGeneral('giacldat','index'))
                    {{--Giá đất địa bàn--}}
                    @if(can('giacldat','index'))
                    <li class="">
                        <a href="javascript:;">
                            <span class="title">Giá đất theo địa bàn</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(can('dmgiacldat','index'))
                                <li>
                                    <a href="{{url('thongtugiadatdiaban')}}">Thông tư giá đất địa bàn</a>
                                </li>
                            @endif
                            @if(can('kkgiacldat','index'))
                                <li>
                                    <a href="{{url('giadatdiaban')}}">
                                        Giá đất theo địa bàn
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
                @if(canGeneral('giacldatf','index'))
                    @if(can('giacldatf','index'))
                        {{--Giá đất địa bàn--}}
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá đất theo địa bàn">
                            <a href="{{url('giadatdiabanfile')}}">
                                Giá đất theo địa bàn
                            </a>
                        </li>
                    @endif
                @endif
                @if(canGeneral('giadatduan','index'))
                    @if(can('giadatduan','index'))
                        <li class="">
                            <a href="javascript:;">
                                <span class="title">Giá đất cụ thể dự án</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(can('kkgiadatduan','index'))
                                    <li>
                                        <a href="{{url('thongtingiadatduan')}}">Thông tin giá đất</a>
                                    </li>
                                @endif
                                @if(can('thgiadatduan','baocao'))
                                    <li>
                                        <a href="{{url('baocaogiadatduan')}}">Báo cáo giá đất dự án</a>
                                    </li>
                                @endif
                                @if(can('thgiadatduan','timkiem'))
                                    <li>
                                        <a href="{{url('timkiemgiadatduan')}}">Tìm kiếm thông tin</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                    <!-- làm đất theo phân loại (lấy phân quyền theo giá đất theo địa bàn -->
{{--                @if(canGeneral('giacldat','index'))--}}
{{--                    @if(canGeneral('giadatpl','index'))--}}
{{--                        --}}{{--Giá đất địa bàn--}}
{{--                        @if(can('giadatpl','index'))--}}
{{--                            @if(can('kkgiadatpl','index'))--}}
{{--                                @if(can('thgiadatpl','index'))--}}
                @if(canGeneral('giadatpl','index'))
                        {{--Giá đất địa bàn--}}
                        @if(can('giadatpl','index'))
                            <li class="">
                                <a href="javascript:;">
                                    <span class="title">Giá đất phân loại</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    @if(can('kkgiadatpl','index'))
                                        <li>
                                            <a href="{{url('giadatphanloaidm')}}">
                                                Danh mục các loại đất
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{url('giadatphanloai')}}">
                                                Giá đất theo phân loại
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    @endif
                @if(canGeneral('giadaugiadat','index'))
                    @if(can('giadaugiadat','index'))
                        @if(can('kkgiadaugiadat','index'))
                        <li>
                            <a href="{{url('thongtindaugiadat')}}">Giá đấu giá đất</a>
                            {{--<ul class="sub-menu">--}}
                                {{--@if(can('kkgiadaugiadat','index'))--}}
                                    {{--<li>--}}
                                        {{--<a href="{{url('thongtindaugiadat')}}">Thông tin giá đấu giá đất</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                                {{--@if(can('thgiadaugiadat','timkiem'))--}}
                                    {{--<li>--}}
                                        {{--<a href="{{url('timkiemthongtindaugiadat')}}">Tìm kiếm thông tin</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                            {{--</ul>--}}
                        </li>
                        @endif
                    @endif
                @endif
                @if(canGeneral('daugiadatts','index'))
                    @if(can('daugiadatts','index'))
                        <li>
                            <a href="javascript:;">
                                Giá đấu giá đất và tài sản gắn liền đất <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(can('kkdaugiadatts','index'))
                                    <li>
                                        <a href="{{url('thongtindaugiadatts')}}">Thông tin đấu giá đất và tài sản gắn liền đất</a>
                                    </li>
                                @endif
                                {{--@if(can('thgiadaugiadat','timkiem'))--}}
                                    {{--<li>--}}
                                        {{--<a href="{{url('timkiemthongtindaugiadat')}}">Tìm kiếm thông tin</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('giathuetn','index'))
                    @if(can('giathuetn','index'))
                        <li class="">
                            <a href="javascript:;">
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
                                @if(can('thgiathuetn','baocao'))
                                <li>
                                <a href="{{url('baocaothuetainguyen')}}">Báo cáo tổng hợp</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('giathuedatnuoc','index'))
                    @if(can('giathuedatnuoc','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá cho thuê mặt đất, mặt nước">
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
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá rừng bao gồm rừng sản xuất, rừng phòng hộ và rừng đặc dụng thuộc sở hữu toàn dân do Nhà nước làm đại diện chủ sở hữu">
                            <a href="javascript:;">
                                Giá thuê MT rừng
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(can('dmgiarung','index'))
                                    <li>
                                        <a href="{{url('dmgiarung')}}">Danh mục loại rừng</a>
                                    </li>
                                @endif
                                @if(can('kkgiarung','index'))
                                    <li>
                                        <a href="{{url('giarung')}}">Thông tin giá thuê môi trường rừng</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('giathuemuanhaxh','index'))
                    @if(can('giathuemuanhaxh','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá cho thuê, thuê mua nhà ở xã hội, nhà ở công vụ được đầu tư xây dựng từ ngân sách nhà nước;
                             giá bán hoặc giá cho thuê nhà ở thuộc sở hữu nhà nước theo quy định của pháp luật về nhà ở">
                            @if(can('kkgiathuemuanhaxh','index'))
                            <a href="{{url('thuemuanhaxahoi')}}">
                                Giá thuê mua nhà XH
                                {{--<span class="arrow"></span>--}}
                            </a>
                            @endif
                        </li>
                    @endif
                @endif
                @if(canGeneral('giathuenhacongvu','index'))
                    @if(can('giathuenhacongvu','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true">
                            @if(can('kkgiathuenhacongvu','index'))
                                <a href="{{url('giathuenhacongvu')}}">
                                    Giá thuê nhà công vụ
                                </a>
                            @endif
                        </li>
                    @endif
                @endif
                @if(canGeneral('bannhataidinhcu','index'))
                    @if(can('bannhataidinhcu','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true">
                            @if(can('kkbannhataidinhcu','index'))
                                <a href="{{url('bannhataidinhcu')}}">
                                    Giá bán nhà tái định cư

                                </a>
                            @endif
                        </li>
                    @endif
                @endif
                @if(canGeneral('gianuocsh','index'))
                    @if(can('gianuocsh','index'))
                        <li>
                            <a href="javascript:;">
                                Giá nước sạch sinh hoạt
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{url('dmgianuocsachsinhhoat')}}">Danh mục</a>
                                </li>
                                <li>
                                    <a href="{{url('gianuocsachsinhhoat')}}">Thông tin giá nước sạch</a>
                                </li>
                                <li>
                                    <a href="{{url('tkgianuocsachsinhhoat')}}">Tìm kiếm giá nước sạch sinh hoạt</a>
                                </li>
                                <li>
                                    <a href="{{url('bcgianuocsachsinhhoat')}}">Báo cáo tổng hợp</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('giathuetscong','index'))
                    @if(can('giathuetscong','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá cho thuê tài sản Nhà nước là công trình kết cấu hạ tầng đầu tư từ nguồn ngân sách địa phương">
                            <a href="javascript:;">
                                Giá thuê tài sản công<span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(can('kkgiathuetscong','index'))
                                    <li>
                                        <a href="{{url('thongtinthuetaisancong')}}">Thông tin giá thuê tài sản công</a>
                                    </li>
                                @endif
                                @if(can('thgiathuetscong','timkiem'))
                                    <li>
                                        <a href="{{url('timkiemthongtinthuetaisancong')}}">Tìm kiếm thông tin</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                    <!-- lấy theo phân quyền thuê tài sản -->
                @if(canGeneral('giathuetscong','index'))
                        @if(can('giathuetscong','index'))
                            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                                data-original-title="Giá cho thuê tài sản Nhà nước là công trình kết cấu hạ tầng đầu tư từ nguồn ngân sách địa phương">
                                <a href="javascript:;">
                                    Giá tài sản công<span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{url('giataisancongdm')}}">
                                            Danh mục tài sản công
                                        </a>
                                    </li>
                                    @if(can('kkgiathuetscong','index'))
                                        <li>
                                            <a href="{{url('giataisancong')}}">
                                                Hồ sơ giá tài sản công
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                    @endif

                @if(canGeneral('giadvgddt','index'))
                    @if(can('giadvgddt','index'))

                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá dịch vụ giáo dục, đào tạo áp dụng đối với cơ sở giáo dục mầm non, phổ thông công lập thuộc tỉnh">
                            <a href="{{url('giadvgiaoducdaotao')}}">
                                Giá dịch vụ đào tạo
                            </a>
                        </li>
                    @endif
                @endif

                @if(canGeneral('giadvkcb','index'))
                    @if(can('giadvkcb','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Giá dịch vụ khám bệnh, chữa bệnh đối với cơ sở khám bệnh, chữa bệnh của Nhà nước thuộc phạm vi quản lý của địa phương">
                            <a href="{{url('dichvukcb')}}">
                                Giá dịch vụ khám chữa bệnh
                            </a>
                        </li>
                    @endif
                @endif
                @if(canGeneral('trogiatrocuoc','index'))
                    @if(can('trogiatrocuoc','index'))
                        <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                            data-original-title="Mức trợ giá, trợ cước vận chuyển hàng hóa thuộc danh mục được trợ giá, trợ cước vận chuyển chỉ từ ngân sách địa phương và trung ương;
                            mức giá hoặc khung giá bán lẻ hàng hóa được trợ giá, trợ cước vận chuyển; giá cước vận chuyển cung ứng hàng hóa,
                            dịch vụ thiết yếu thuộc dnah mục được trợ giá phục vụ đồng bào miền núi, vùng sâu, vùng xa và hải đảo">
                            <a href="javascript:;">
                                Mức trợ giá, trợ cước<span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(can('dmtrogiatrocuoc','index'))
                                    <li>
                                        <a href="javascript:;">Danh mục mức trợ giá, trợ cước</a>
                                    </li>
                                @endif
                                @if(can('kktrogiatrocuoc','index'))
                                    <li>
                                        <a href="javascript:;">Thông tin mức trợ giá trợ cước</a>
                                    </li>
                                @endif
                                @if(can('thtrogiatrocuoc','timkiem'))
                                    <li>
                                        <a href="javascript:;">Tìm kiếm thông tin mức trợ giá trợ cước</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                @endif
                @if(canGeneral('giaspdvci','index'))
                    @if(can('giaspdvci','index'))
                        <li>
                            <a href="javascript:;">
                                Giá SP, DVCI, DVSNC, HH-DV đặt hàng <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                {{--@if(can('dmgiaspdvci','index'))--}}
                                    {{--<li>--}}
                                        {{--<a href="javascript:;">Danh mục SP, DVCI, DVSNC, HH-DV đặt hàng</a>--}}
                                    {{--</li>--}}
                                {{--@endif--}}
                                @if(can('kkgiaspdvci','index'))
                                    <li>
                                        <a href="{{url('giaspdvci')}}">Thông tin giá SP, DVCI, DVSNC, HH-DV đặt hàng</a>
                                    </li>
                                @endif
                                @if(can('thgiaspdvci','timkiem'))
                                    <li>
                                        <a href="{{url('tkgiaspdvci')}}">Tìm kiếm thông tin</a>
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