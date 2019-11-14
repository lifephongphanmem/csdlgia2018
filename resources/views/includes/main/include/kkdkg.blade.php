@if(canKkGiaGr('BOG'))
    <li class="tooltips" data-container="body" data-placement="right" data-html="true"
        data-original-title="Tổ chức, cá nhận đăng ký giá theo yêu cầu của Sở Tài chính, sở quản lý ngành">
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
                                    <li><a href="{{url('hosokkdkg?manghe='.$dm->manghe)}}">Đăng ký giá</a></li>
                                @else
                                    <li><a href="{{url('kkgiamhbog?manghe='.$dm->manghe)}}">Kê khai giá</a></li>
                                @endif
                            @else
                                <li><a href="{{url('thongtinmathangbog?manghe='.$dm->manghe)}}">Phân loại thông tin mặt hàng</a></li>
                                @if($dm->phanloai == 'DK')
                                    <li><a href="{{url('thongtindnkkgdk?manghe='.$dm->manghe)}}">Đăng ký giá</a></li>
                                    <li><a href="{{url('xetduyetkkdkg?manghe='.$dm->manghe)}}">Xét duyệt hồ sơ đăng ký giá</a></li>

                                @else
                                    <li><a href="{{url('thongtindnkkmhbog?manghe='.$dm->manghe)}}">Kê khai giá</a></li>
                                    <li><a href="{{url('xetduyetkkmhbog?manghe='.$dm->manghe)}}">Xét duyệt hồ sơ kê khai giá</a></li>
                                @endif
                                <li><a href="{{url('timkiemkkdkg?manghe='.$dm->manghe)}}">Tìm kiếm thông tin đăng ký giá</a></li>
                                <li><a href="{{url('timkiemkkmhbog?manghe='.$dm->manghe)}}">Tìm kiếm thông tin kê khai giá</a></li>
                                <li><a href="{{url('baocaokekhaidkg?manghe='.$dm->manghe)}}">Báo cáo tổng hợp đăng ký giá</a></li>
                                <li><a href="{{url('baocaokkmhbog?manghe='.$dm->manghe)}}">Báo cáo tổng hợp kê khai giá</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </li>
@endif

