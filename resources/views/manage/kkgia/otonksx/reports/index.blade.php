@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Báo cáo tổng hợp<small> kê khai Giá ô tô nhập khẩu, sản xuất trong nước dưới 15 chỗ ngồi</small>
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
                                <li><a data-target="#pl1-thoai-confirm" data-toggle="modal" data-href="">Báo cáo tổng hợp giá kê khai Giá ô tô nhập khẩu, sản xuất trong nước dưới 15 chỗ ngồi theo thời điểm</a> </li>
                                {{--<li><a data-target="#pl2-thoai-confirm" data-toggle="modal" data-href="">Báo cáo chi tiết giá kê khai giá vật liệu xây dựng theo thời điểm</a> </li>--}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('manage.kkgia.otonksx.reports.modal-thoai')
@stop