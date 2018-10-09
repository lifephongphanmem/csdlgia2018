@if(count($model_hhtt) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Hàng hóa thị trường</span>
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
                    <table class="table table-striped table-bordered table-hover table-dulieubang">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="5%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_hhtt as $key=>$xk)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td>{{$xk->tendv}}</td>
                                <td><a href="{{url('hanghoathitruong/index?nam='.date('Y').'&pb='.$xk->mahuyen)}}">Xem báo cáo</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="actions" style="text-align: right">
                        <a href="{{url('hanghoathitruong')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

@if(count($model_hhtw) > 0)
<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Hàng hóa, dịch vụ do Trung Ương quy định</span>
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
                <table class="table table-striped table-bordered table-hover table-dulieubang">
                    <thead>
                        <tr>
                            <th style="text-align: center" width="5%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($model_hhtw as $key=>$xk)
                        <tr>
                            <td align="center">{{$key+1}}</td>
                            <td>{{$xk->tendv}}</td>
                            <td><a href="{{url('hanghoatw/index?nam='.date('Y').'&pb='.$xk->mahuyen)}}">Xem báo cáo</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="actions" style="text-align: right">
                    <a href="{{url('hanghoatw')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endif

@if(count($model_hhdp) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Hàng hóa, dịch vụ do địa phương quy định</span>
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
                    <table class="table table-striped table-bordered table-hover table-dulieubang">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="5%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_hhdp as $key=>$xk)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td>{{$xk->tendv}}</td>
                                <td><a href="{{url('hanghoadp/index?nam='.date('Y').'&pb='.$xk->mahuyen)}}">Xem báo cáo</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <div class="actions" style="text-align: right">
                        <a href="{{url('hanghoadp')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

@if(count($model_thuetb) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Thuế trước bạ</span>
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
                    <table class="table table-striped table-bordered table-hover table-dulieubang">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="7%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_thuetb as $key=>$xk)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td>{{$xk->tendv}}</td>
                                <td><a href="{{url('thuetb?nam='.date('Y').'&pb='.$xk->mahuyen)}}">Xem báo cáo</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <div class="actions" style="text-align: right">
                        <a href="{{url('thuetb')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

@if(count($model_thuetn) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Thuế tài nguyên</span>
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
                    <table class="table table-striped table-bordered table-hover table-dulieubang">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="5%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_thuetn as $key=>$xk)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td>{{$xk->tendv}}</td>
                                <td><a href="{{url('thuetn?nam='.date('Y').'&pb='.$xk->mahuyen)}}">Xem báo cáo</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="actions" style="text-align: right">
                        <a href="{{url('thuetn')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

@if(count($model_tdg) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Hồ sơ thẩm định giá</span>
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
                    <table class="table table-striped table-bordered table-hover table-dulieubang">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="5%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_tdg as $key=>$xk)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td>{{$xk->tendv}}</td>
                                <td><a href="{{url('thamdg?nam='.date('Y').'&pb='.$xk->mahuyen)}}">Xem báo cáo</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <div class="actions" style="text-align: right">
                        <a href="{{url('thamdg')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

@if(count($model_cbg) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Hồ sơ công bố giá vật liệu xây dựng</span>
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
                    <table class="table table-striped table-bordered table-hover table-dulieubang">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="5%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_cbg as $key=>$xk)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td>{{$xk->tendv}}</td>
                                <td><a href="{{url('congbg?nam='.date('Y').'&pb='.$xk->mahuyen)}}">Xem báo cáo</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="actions" style="text-align: right">
                        <a href="{{url('congbg')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

@if(count($model_vtd) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Vị trí đất</span>
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
                    <table class="table table-striped table-bordered table-hover table-dulieubang">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="5%">STT</th>
                            <th style="text-align: center" width="75%">Tên đơn vị</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_vtd as $key=>$xk)
                            <tr>
                                <td align="center">{{$key+1}}</td>
                                <td>{{$xk->vitri}}</td>
                                <td><a href="{{url('vtdat?maso='.$xk->maso)}}">Xem giá đất</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="actions" style="text-align: right">
                        <a href="{{url('vtdat?maso=ALL')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

@if(count($model_vbpl) > 0)
    <div class="row margin-top-10">
        <div class=" col-sm-12">
            <!-- BEGIN PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font hide"></i>
                        <span class="caption-subject theme-font bold uppercase">Văn bản pháp luật về giá</span>
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
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Đơn vị</br>ban hành</th>
                            <th style="text-align: center" width="10">Loại văn</br>bản</th>
                            <th style="text-align: center" width="15%">Ngày ban hành/<br>Ngày áp dụng</th>
                            <th style="text-align: center">Số hiệu văn bản</th>
                            <th style="text-align: center">Nội dung</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model_vbpl as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active">{{$tt->dvbanhanh}}</td>
                                <td style="text-align: center">{{$tt->tenloaivanban}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngaybh)}} || {{getDayVn($tt->ngayad)}}</td>
                                <td class="success">{{$tt->khvb}}</td>
                                <td>{{$tt->tieude}}</td>
                                <td><a href="{{url('/vbpl')}}">Xem nội dung</a></td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <div class="actions" style="text-align: right">
                        <a href="{{url('vbpl')}}">Xem chi tiết...</a>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
    </div>
@endif

