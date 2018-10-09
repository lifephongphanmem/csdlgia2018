@if(count($modellt) > 0)
<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Dịch vụ lưu trú</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="reload" data-original-title="" title="">
                    </a>
                    <a href="javascript:;" class="remove" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="row list-separated">
                    @foreach($modellt as $ks)
                        <div class="col-md-3">
                            <a href="{{url('giadichvuluutru/'.$ks->macskd)}}" style="text-align: center">
                                <img src="{{ url('images/avatar/'.$ks->avatar)}}" width="96" >
                            </a>
                            <p><h3 style="color: #18bc9c"><a href="{{url('giadichvuluutru/'.$ks->macskd)}}">{{$ks->tencskd}}</a></h3></p>
                            <p><i class="fa fa-map-marker"></i> {{$ks->diachikd}}</p>
                            <p><i class="fa fa-phone"></i> {{$ks->telkd}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="actions" style="text-align: right">
                    <a href="{{url('giadichvuluutru')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endif