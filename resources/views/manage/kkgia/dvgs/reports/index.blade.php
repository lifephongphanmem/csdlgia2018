@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
@stop

@section('content')


    <h3 class="page-title">
        Báo cáo tổng hợp <small>kê khai giá thực phẩm chức năng cho trẻ em dưới 6 tuổi</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol>
                                <!--li><a data-target="#BC1-thoai-confirm" data-toggle="modal">Báo cáo tổng hợp hồ sơ kê khai giá (theo đơn vị chủ quản)</a></li>
                                <li><a data-target="#BC2-thoai-confirm" data-toggle="modal">Báo cáo chi tiết hồ sơ kê khai giá (theo đơn vị chủ quản)</a></li>
                                <li><a data-target="#BC3-thoai-confirm" data-toggle="modal">Báo cáo tổng hợp hồ sơ kê khai giá (theo đơn vị kê khai)</a></li>
                                <li><a data-target="#BC4-thoai-confirm" data-toggle="modal">Báo cáo chi tiết hồ sơ kê khai giá (theo đơn vị kê khai)</a></li-->
                                <li><a data-target="#BC5-thoai-confirm" data-toggle="modal">Báo cáo kết quả giải quyết hồ sơ</a></li>
                                <li><a data-target="#BC6-thoai-confirm" data-toggle="modal">Báo cáo đơn vị kê khai TPCN cho TE dưới 6 tuổi</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('manage.kkgia.dvgs.reports.modal-thoai')
@stop