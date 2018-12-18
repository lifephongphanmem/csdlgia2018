@if(canGeneral('vbqlnn','index'))
@if(can('vbqlnn','index'))
<li class="tooltips" data-container="body" data-placement="right" data-html="true"
    data-original-title="Văn bản quản lý nhà nước về giá, các báo cáo tổng hợp">
    <a href="">
        <i class="icon-folder"></i>
        <span class="title">Văn bản QLNN về giá</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu" style="display: none;">
        @if(canGeneral('vbgia','index'))
            @if(can('vbgia','index'))
            <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                data-original-title="Các quyết định, văn bản quản lý, điều hành về giá">
                <a href="{{url('vanbanqlnnvegia')}}">Văn bản quản lý NN về giá</a>
            </li>
            @endif
        @endif
    </ul>
</li>
@endif
@endif
