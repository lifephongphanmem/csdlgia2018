
@if(canGeneral('vbgia','index'))
    @if(can('vbqlnn','index'))
    <li class="tooltips" data-container="body" data-placement="right" data-html="true"
        data-original-title="Văn bản quản lý nhà nước về giá, các báo cáo tổng hợp">
        <a href="javascript:;">
            <i class="icon-folder"></i>
            <span class="title">Văn bản QLNN về giá - phí, lệ phí</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            @if(canGeneral('vbgia','index'))
                @if(can('vbgia','index'))
                <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                    data-original-title="Các quyết định, văn bản quản lý, điều hành về giá">
                    <a href="{{url('vanbanqlnnvegia')}}">Các quyết định, văn bản quản lý, điều hành về giá - phí, lệ phí</a>
                </li>
                @endif
            @endif
            @if(canGeneral('giacpi','index'))
                @if(can('giacpi','index'))
                    <!--li class="tooltips" data-container="body" data-placement="right" data-html="true"
                        data-original-title="Giá CPI">
                        <a href="javascript:;">Giá CPI</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{url('/dmhanghoacpi/danhsach')}}">Danh mục hàng hóa</a>
                            </li>
                            <li>
                                <a href="{{url('/hsgiacpi/danhsach?thang='.date('m').'&nam='.date('Y'))}}">Hồ sơ giá hàng hóa</a>
                            </li>
                        </ul>
                    </li-->
                @endif
            @endif
        </ul>
    </li>
    @endif
@endif

@if(canGeneral('chisogiatieudung','index'))
    @if(can('chisogiatieudung','index'))
    <li class="tooltips" data-container="body" data-placement="right" data-html="true"
        data-original-title="Chỉ số giá tiêu dùng (CPI)">
        <a href="javascript:;">
            <i class="icon-folder"></i>
            <span class="title">Chỉ số giá tiêu dùng (CPI)</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            @if(can('chisogiatieudung','index'))
                <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                    data-original-title="">
                    <a href="{{url('baocaochisogiatieudung')}}">Báo cáo chỉ số giá tiêu dùng</a>
                </li>
            @endif
        </ul>
    </li>
    @endif
@endif

@if(canGeneral('bcthvegia','index'))
    <li class="tooltips" data-container="body" data-placement="right" data-html="true"
        data-original-title="Các báo cáo tổng hợp về giá">
        <a href="javascript:;">
            <i class="icon-folder"></i>
            <span class="title">Các báo cáo tổng hợp về giá</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            @if(can('dmbcthvegia','index'))
                <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                    data-original-title="">
                    <a href="{{url('dmbaocaothvegia')}}">Danh mục báo cáo tổng hợp</a>
                </li>
            @endif
            @if(can('bcthvegia','index'))
                <?php $modelbcthvegia = \App\Model\manage\vanbanplvegia\baocaoth\BcThVeGiaDm::where('theodoi','TD')->get();?>
                @foreach($modelbcthvegia as $bcthvegia)
                <li class="tooltips" data-container="body" data-placement="right" data-html="true"
                    data-original-title="">
                    <a href="{{url('baocaothvegia?&phanloai='.$bcthvegia->phanloai)}}">{{$bcthvegia->mota}}</a>
                </li>
                @endforeach
            @endif
        </ul>
    </li>
@endif

