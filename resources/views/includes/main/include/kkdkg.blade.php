@if(canKkGiaGr('BOG'))
    <li class="tooltips" data-container="body" data-placement="right" data-html="true"
        data-original-title="Tổ chức, cá nhận Giá đăng ký theo yêu cầu của Sở Tài chính, sở quản lý ngành">
        <a href="javascript:;">
            <span class="title">Mặt hàng trong danh mục bình ổn giá</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            @if($modeldm = \App\Model\system\dmnganhnghekd\DmNgheKd::where('manganh','BOG')
                    ->where('theodoi','TD')
                    ->get())@endif
            @foreach($modeldm as $dm)
                @if(canKkGiaCt('BOG',$dm->manghe))
                    @if($dm->mahuyen != '')
                    <li>
                        <a href="javascript:;">
                            <span class="title">{{$dm->tennghe}}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            @if(session('admin')->level == 'DN')
                                @if($dm->phanloai == 'DK')
                                    <li><a href="{{url('hosokkdkg?manghe='.$dm->manghe)}}">Giá đăng ký</a></li>
                                @else
                                    <li><a href="{{url('kkgiamhbog?manghe='.$dm->manghe)}}">Giá kê khai</a></li>
                                @endif
                            @else
                                <li><a href="{{url('thongtinmathangbog?manghe='.$dm->manghe)}}">Phân loại TTMH</a></li>
                                @if($dm->phanloai == 'DK')
                                    <li><a href="{{url('thongtindnkkgdk?manghe='.$dm->manghe)}}">Giá đăng ký</a></li>
                                    <li><a href="{{url('xetduyetkkdkg?manghe='.$dm->manghe)}}">Xét duyệt HS Giá đăng ký</a></li>

                                @else
                                    <li><a href="{{url('thongtindnkkmhbog?manghe='.$dm->manghe)}}">Giá kê khai</a></li>
                                    <li><a href="{{url('xetduyetkkmhbog?manghe='.$dm->manghe)}}">Xét duyệt HS giá kê khai</a></li>
                                @endif
                                <li><a href="{{url('timkiemkkdkg?manghe='.$dm->manghe)}}">Tìm kiếm TT Giá đăng ký</a></li>
                                <li><a href="{{url('timkiemkkmhbog?manghe='.$dm->manghe)}}">Tìm kiếm TT giá kê khai</a></li>
                                <li><a href="{{url('baocaokekhaidkg?manghe='.$dm->manghe)}}">BCTH Giá đăng ký</a></li>
                                <li><a href="{{url('baocaokkmhbog?manghe='.$dm->manghe)}}">BCTH hợp giá kê khai</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </li>
@endif

