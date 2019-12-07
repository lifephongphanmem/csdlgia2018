@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Báo cáo tổng hợp<small> giá hàng hóa dịch vụ khác</small>
    </h3>
    <!-- END PAGE HEADER-->
<hr>
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <ol>
                                @if(can('thgiahhdvk','tonghop'))
                                <li><a data-target="#pl1-thoai-confirm" data-toggle="modal" data-href="">Báo cáo giá bán lẻ hàng hóa thị trường</a> </li>
                                @endif
                                <li><a data-target="#pl2-thoai-confirm" data-toggle="modal" data-href="">Báo cáo giá hàng hóa thị trường theo tháng</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('manage.dinhgia.giahhdvk.reports.modal-thoai')
@stop