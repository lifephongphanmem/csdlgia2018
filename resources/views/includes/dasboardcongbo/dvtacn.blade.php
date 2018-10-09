@if(count($modelgs) > 0)
<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Mặt hàng thức ăn chăn nuôi</span>
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
                    @foreach($modeltacn as $tacn)
                        <div class="col-md-3">
                            <a href="{{url('giathucanchannuoi/'.$tacn->maxa)}}" style="text-align: center">
                                <img src="{{ url('images/avatar/'.$tacn->avatar)}}" width="96" >
                            </a>
                            <p><h3 style="color: #18bc9c"><a href="{{url('giathucanchannuoi/'.$tacn->maxa)}}">{{$tacn->tendn}}</a></h3></p>
                            <p><i class="fa fa-map-marker"></i> {{$tacn->diachi}}</p>
                            <p><i class="fa fa-phone"></i> {{$tacn->tel}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="actions" style="text-align: right">
                    <a href="{{url('giathucanchannuoi')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endif