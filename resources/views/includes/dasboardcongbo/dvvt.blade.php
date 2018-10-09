@if(count($modelvtxk) > 0)
<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Vận tải xe khách</span>
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
                    @foreach($modelvtxk as $xk)
                        <div class="col-md-3">
                            <a href="{{url('giavantaixekhach/'.$xk->maxa)}}" style="text-align: center">
                                <img src="{{ url('images/avatar/'.$xk->avatar)}}" width="96" >
                            </a>
                            <p><h3 style="color: #18bc9c"><a href="{{url('giavantaixekhach/'.$xk->maxa)}}">{{$xk->tendn}}</a></h3></p>
                            <p><i class="fa fa-map-marker"></i> {{$xk->diachi}}</p>
                            <p><i class="fa fa-phone"></i> {{$xk->tel}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="actions" style="text-align: right">
                    <a href="{{url('giavantaixekhach')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endif
@if(count($modelvtxb) > 0)
<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Vận tải xe buýt</span>
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
                    @foreach($modelvtxb as $xb)
                        <div class="col-md-3">
                            <a href="{{url('giavantaixebus/'.$xb->maxa)}}" style="text-align: center">
                                <img src="{{ url('images/avatar/'.$xb->avatar)}}" width="96" >
                            </a>
                            <p><h3 style="color: #18bc9c"><a href="{{url('giavantaixebus/'.$xb->maxa)}}">{{$xb->tendn}}</a></h3></p>
                            <p><i class="fa fa-map-marker"></i> {{$xb->diachi}}</p>
                            <p><i class="fa fa-phone"></i> {{$xb->tel}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="actions" style="text-align: right">
                    <a href="{{url('giavantaixebus')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endif
@if(count($modelvtxtx) > 0)
<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Vận tải xe taxi</span>
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
                    @foreach($modelvtxtx as $tx)
                        <div class="col-md-3">
                            <a href="{{url('giavantaixetaxi/'.$tx->maxa)}}" style="text-align: center">
                                <img src="{{ url('images/avatar/'.$tx->avatar)}}" width="96" >
                            </a>
                            <p><h3 style="color: #18bc9c"><a href="{{url('giavantaixetaxi/'.$tx->maxa)}}">{{$tx->tendn}}</a></h3></p>
                            <p><i class="fa fa-map-marker"></i> {{$tx->diachi}}</p>
                            <p><i class="fa fa-phone"></i> {{$tx->tel}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="actions" style="text-align: right">
                    <a href="{{url('giavantaixetaxi')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endif
@if(count($modelvtch) > 0)
<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Vận tải khác</span>
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
                    @foreach($modelvtch as $ch)
                        <div class="col-md-3">
                            <a href="{{url('giavantaikhac/'.$ch->maxa)}}" style="text-align: center">
                                <img src="{{ url('images/avatar/'.$ch->avatar)}}" width="96" >
                            </a>
                            <p><h3 style="color: #18bc9c"><a href="{{url('giavantaikhac/'.$ch->maxa)}}">{{$ch->tendn}}</a></h3></p>
                            <p><i class="fa fa-map-marker"></i> {{$ch->diachi}}</p>
                            <p><i class="fa fa-phone"></i> {{$ch->tel}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="actions" style="text-align: right">
                    <a href="{{url('giavantaikhac')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endif