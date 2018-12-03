@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Báo cáo tổng hợp<small> &nbsp;Thẩm định giá tài sản NN</small>
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
                            <label>Thông tư 142/2015/BTC</label>
                            <ol>
                                <li><a data-target="#pl5-thoai-confirm" data-toggle="modal" data-href="{{url('reports/TT142/PL5')}}">Phụ lục 5- Thông tin về tài sản thẩm định giá</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('manage.thamdinhgia.reports.modal-thoai')
@stop