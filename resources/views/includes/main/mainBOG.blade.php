@if(canGeneral('bog','index'))
@if(can('bog','index'))
<li class="">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Bình ổn giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(canGeneral('bpbog','index'))
            @if(can('bpbog','index'))
            <li>
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
        @include('includes.main.include.dkgia')
    </ul>
</li>
@endif
@endif
