@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Báo cáo tổng hợp<small> &nbsp;giá đất cụ thể của dự án trên địa bàn</small>
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
                                <li><a data-target="#phuluc08-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL5')}}">Phụ lục 08- Thông tin về giá đất cụ thể của dự án trên địa bàn</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('manage.dinhgia.giadatduan.reports.modal-thoai')
@stop