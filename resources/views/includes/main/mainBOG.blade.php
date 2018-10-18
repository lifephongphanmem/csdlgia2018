@if(can('bog','index'))
<li class="">
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Bình ổn giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(session('admin')->level == 'T')
        <li>
            <a href="{{url('dmmhbinhongia')}}">Danh mục MH BOG</a>
        </li>
        @endif
        <li><a href="{{url('timkiemthongtinbog')}}">Tìm kiếm thông tin BOG</a> </li>
        <?php $modelmhbinhongia = \App\DmMhBinhOnGia::all()?>
        @foreach($modelmhbinhongia as $binhongia)
        <li>
            <a href="{{url('binhongia?mamh='.$binhongia->mamh)}}">{{$binhongia->tenmh}}</a>
        </li>
        @endforeach
    </ul>
</li>
@endif
