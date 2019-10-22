@if(canKkGiaGr('BOG'))
    <li class="tooltips" data-container="body" data-placement="right" data-html="true"
        data-original-title="Tổ chức, cá nhận đăng ký giá theo yêu cầu của Sở Tài chính, sở quản lý ngành">
        <a href="">
            <span class="title">Đăng ký giá mặt hàng trong danh mục bình ổn giá</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu" style="display: none;">
            @if($modeldm = \App\Model\system\dmnganhnghekd\DmNgheKd::where('manganh','BOG')
                    ->where('theodoi','TD')
                    ->get())@endif
            @foreach($modeldm as $dm)
                @if(canKkGiaCt('BOG',$dm->manghe))
                    @if($dm->mahuyen != '')
                    <li>
                        <a href="">
                            <span class="title">{{$dm->tennghe}}</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu" style="display: none;">
                            @if(session('admin')->level == 'DN')
                                <li><a href="{{url('hosokkdkg?manghe='.$dm->manghe)}}">Đăng ký giá</a></li>
                            @else
                                <li><a href="{{url('thongtindnkkgdk?manghe='.$dm->manghe)}}">Đăng ký giá</a></li>
                                <li><a href="{{url('xetduyetkkdkg?manghe='.$dm->manghe)}}">Xét duyệt hồ sơ</a></li>
                                <li><a href="{{url('timkiemkkdkg?manghe='.$dm->manghe)}}">Tìm kiếm thông tin</a></li>
                                <li><a href="{{url('baocaokekhaidkg?manghe='.$dm->manghe)}}">Báo cáo tổng hợp</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </li>
@endif

