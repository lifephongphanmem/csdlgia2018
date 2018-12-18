@if(canGeneral('bog','index'))
@if(can('bog','index'))
<li class="tooltips" data-container="body" data-placement="right" data-html="true"
    data-original-title="Hàng hóa, dịch vụ thực hiện bình ổn giá">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Bình ổn giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(canGeneral('bpbog','index'))
            @if(can('bpbog','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Trong trường hợp thiên tai, hỏa hoạn, dịch bệnh, tai nạn bất ngờ, căn cứ tình hình thực tế tại địa phương.
                UBND tỉnh quyết định qpas dụng một số biện pháp bình ổn giá">
                <a href=""><span class="title">Biện pháp BOG</span>
                    <span class="arrow"></span>
            </a>
            <ul class="sub-menu" style="display: none;">
                @if(can('dmbpbog','index'))
                <li>
                    <a href="{{url('dmmhbinhongia')}}">Danh mục MH BOG</a>
                </li>
                @endif
                @if(can('thbpbog','timkiem'))
                <li><a href="{{url('timkiemthongtinbog')}}">Tìm kiếm thông tin BOG</a> </li>
                @endif
                <?php $modelmhbinhongia = \App\DmMhBinhOnGia::all()?>
                @if(can('kkbpbog','index'))
                @foreach($modelmhbinhongia as $binhongia)
                <li>
                    <a href="{{url('binhongia?mamh='.$binhongia->mamh)}}">{{$binhongia->hienthi != '' ? $binhongia->hienthi : $binhongia->tenmh}}</a>
                </li>
                @endforeach
                @endif
            </ul>
            </li>
            @endif
        @endif
        @if(canGeneral('dangkygia','index'))
            @if(can('dangkygia','index'))
                <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                    data-original-title="Tổ chức, cá nhận đăng ký giá theo yêu cầu của Sở Tài chính, sở quản lý ngành">
                    <a href="">
                        <span class="title">Đăng ký giá</span>
                        <span class="arrow"></span>
                    </a>

                    <ul class="sub-menu" style="display: none;">
                        <?php $modeldm = \App\DmMhBinhOnGia::all()?>
                        @foreach($modeldm as $dm)
                            @if(canGeneral($dm->phanloai,'index'))
                                @if(can($dm->phanloai,'index'))
                                    <li>
                                        <a href="">
                                            <span class="title">{{$dm->hienthi}}</span>
                                            <span class="arrow"></span>
                                        </a>
                                        <ul class="sub-menu" style="display: none;">
                                            @if(session('admin')->level == 'DKG')
                                                <li><a href="{{url('indexdkg?ma='.$dm->phanloai)}}">Đăng ký giá</a></li>
                                            @endif
                                            @if(session('admin')->level == 'X' || session('admin')->level == 'H' || session('admin')->level == 'T' )
                                                <li><a href="{{url('indexdn?ma='.$dm->phanloai)}}">Thông tin dn đăng ký giá</a></li>
                                                <!--li><a href="">Xét duyệt đăng ký giá</a></li-->
                                                <li><a href="{{url('indexdkg?ma='.$dm->phanloai)}}">Đăng ký giá</a></li>
                                                <li><a href="{{url('indexdkgtk?ma='.$dm->phanloai)}}">Tìm kiếm thông tin đăng ký giá</a></li>
                                                <!--li><a href="{{url('baocaodkg?ma='.$dm->phanloai)}}">Báo cáo tổng hợp</a></li-->
                                            @endif
                                        </ul>
                                    </li>
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
