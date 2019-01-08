@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Báo cáo tổng hợp đăng ký giá {{$tenhh}}<small> &nbsp;</small>
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
                                <li><a data-target="#pl5-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL5')}}">Báo cáo mặt hàng đăng ký giá</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('manage.bog.dangky.reports.modal-thoai')
@stop