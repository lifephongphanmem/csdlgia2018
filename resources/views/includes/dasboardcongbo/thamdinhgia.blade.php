<div class="row margin-top-10">
    <div class=" col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject theme-font bold uppercase">Thẩm định giá</span>
                </div>
                <div class="tools">
                    <a href="javascript:;" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body" style="display: none;">
                <table class="table table-striped table-bordered table-hover table-dulieubang">
                    <thead>
                    <tr>
                        <th style="text-align: center" width="5%">STT</th>
                        <th style="text-align: center" width="75%">Nhóm mặt hàng</th>
                        <th style="text-align: center" width="20%">Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $modelmhbinhongia = \App\DmMhBinhOnGia::all()?>
                    @foreach($modelmhbinhongia as $key=>$binhongia)
                        <tr>
                            <td align="center">{{$key+1}}</td>
                            <td>{{$binhongia->hienthi != '' ? $binhongia->hienthi : $binhongia->tenmh}}</td>
                            <td><a href="{{url('')}}">Xem báo cáo</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="actions" style="text-align: right">
                    <a href="{{url('')}}">Xem chi tiết...</a>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>