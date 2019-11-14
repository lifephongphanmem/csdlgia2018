@if(canGeneral('bog','index'))
@if(can('bog','index'))
<li class="tooltips" data-container="body" data-placement="right" data-html="true"
    data-original-title="Hàng hóa, dịch vụ thực hiện bình ổn giá">
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Bình ổn giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        @if(can('dmbog','index'))
            <li>
                <a href="{{url('dmmhbinhongia')}}">Danh mục MH BOG</a>
            </li>
        @endif
        @if(canGeneral('bpbog','index'))
            @if(can('bpbog','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Trong trường hợp thiên tai, hỏa hoạn, dịch bệnh, tai nạn bất ngờ, căn cứ tình hình thực tế tại địa phương.
                UBND tỉnh quyết định qpas dụng một số biện pháp bình ổn giá">
                <a href="javascript:;"><span class="title">Biện pháp BOG</span>
                    <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <?php $modelmhbinhongia = \App\DmMhBinhOnGia::all();?>
                @if(can('kkbpbog','index'))
                    @foreach($modelmhbinhongia as $binhongia)
                        <li>
                            <a href="{{url('binhongia?mamh='.$binhongia->mamh)}}">{{$binhongia->hienthi != '' ? $binhongia->hienthi : $binhongia->tenmh}}</a>
                        </li>
                    @endforeach
                @endif
                @if(can('thbpbog','timkiem'))
                <li><a href="{{url('timkiemthongtinbog')}}">Tìm kiếm thông tin BOG</a> </li>
                @endif
            </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('dangkygia','index'))
            @if(can('dangkygia','index'))
                <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                    data-original-title="Tổ chức, cá nhận đăng ký giá theo yêu cầu của Sở Tài chính, sở quản lý ngành">
                    <a href="javascript:;">
                        <span class="title">Đăng ký giá</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php $modeldm = \App\DmMhBinhOnGia::where('dangkykekhai','dangky')->get();?>
                        @foreach($modeldm as $dm)
                            @if(canGeneral($dm->phanloai,'index'))
                                @if(can($dm->phanloai,'index'))
                                        @if(session('admin')->phanloai == $dm->phanloai ||
                                        session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li>
                                        <a href="javascript:;">
                                            <span class="title">{{$dm->hienthi}}</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            @if(session('admin')->level == 'DKG')
                                                <li><a href="{{url('hosodkgbog?ma='.$dm->phanloai)}}">Đăng ký giá</a></li>
                                            @endif
                                            @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                                <!--li><a href="{{url('dsthongtindn?ma='.$dm->phanloai)}}">Thông tin dn đăng ký giá</a></li-->
                                                <!--li><a href="javascript:;">Xét duyệt đăng ký giá</a></li-->
                                                <li><a href="{{url('thongtindndkgbog?ma='.$dm->phanloai)}}">Đăng ký giá</a></li>
                                                <li><a href="{{url('timkiem?ma='.$dm->phanloai)}}">Tìm kiếm thông tin đăng ký giá</a></li>
                                                <!--li><a href="{{url('baocaodkg?ma='.$dm->phanloai)}}">Báo cáo tổng hợp</a></li-->
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endif
    </ul>
</li>
@endif
@endif
