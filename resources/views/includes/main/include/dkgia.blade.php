@if(canGeneral('dangkygia','index'))
@if(can('dangkygia','index'))
<li class="">
    <a href="">
        <i class="icon-bar-chart"></i>
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
