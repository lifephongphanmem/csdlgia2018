@if(canGeneral('bog','index'))
    @if(can('bog','index'))
    <li class="tooltips" data-container="body" data-placement="right" data-html="true"
        data-original-title="Hàng hóa, dịch vụ thực hiện bình ổn giá">
        @if(canGeneral('dangkygia','index'))
            @if(can('dangkygia','index'))
                <!--li class="tooltips" data-container="body" data-placement="right" data-html="true"
                    data-original-title="Tổ chức, cá nhận đăng ký giá theo yêu cầu của Sở Tài chính, sở quản lý ngành">
                    <a href="">
                        <span class="title">Mặt hàng bình ổn giá</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu" style="display: none;"-->
                        <?php $modeldm = \App\DmMhBinhOnGia::where('dangkykekhai','kekhai')->get();?>
                        @foreach($modeldm as $dm)
                            @if(canGeneral($dm->phanloai,'index'))
                                @if(can($dm->phanloai,'index'))
                                    @if(session('admin')->phanloai == $dm->phanloai ||
                                    session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                    <li>
                                        <a href="">
                                            <span class="title">{{$dm->hienthi}}</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu" style="display: none;">
                                            @if(session('admin')->level == 'DKG')
                                                {{--<li><a href="{{url('kkdkg?ma='.$dm->phanloai)}}">Kê khai giá</a></li>--}}
                                                <li><a href="{{url('hosokkdkg?ma='.$dm->phanloai)}}">Kê khai giá</a></li>
                                            @endif
                                            @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                                <li><a href="{{url('thongtindnkkgdk?ma='.$dm->phanloai)}}">Kê khai giá</a></li>
                                                <li><a href="{{url('xetduyetkkdkg?ma='.$dm->phanloai)}}">Thông tin hồ sơ xét duyệt</a></li>
                                                <li><a href="{{url('timkiemkkdkg?ma='.$dm->phanloai)}}">Tìm kiếm thông tin đăng ký giá</a></li>
                                                <!--li><a href="{{url('baocaodkg?ma='.$dm->phanloai)}}">Báo cáo tổng hợp</a></li-->
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                @endif
                            @endif
                        @endforeach
                    <!--/ul>
                </li-->
            @endif
        @endif
    </li>
   @endif
@endif

