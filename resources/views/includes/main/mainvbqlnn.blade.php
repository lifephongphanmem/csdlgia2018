@if(canGeneral('vbqlnn','index'))
@if(can('vbqlnn','index'))
<li class="">
    <a href="javascript:;">
        <i class="icon-folder"></i>
        <span class="title">Văn bản QLNN về giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(canGeneral('vbgia','index'))
            @if(can('vbgia','index'))
            <li>
                <a href="{{url('vanbanqlnnvegia')}}">Văn bản quản lý NN về giá</a>
            </li>
            @endif
        @endif
    </ul>
</li>
@endif
@endif
