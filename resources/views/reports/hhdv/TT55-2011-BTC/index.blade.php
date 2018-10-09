@extends('main')

@section('custom-style')

@stop


@section('custom-script')

@stop

@section('content')


    <h3 class="page-title">
       Thông tư<small> 142/2015/BTC</small>
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
                                <li><a data-target="#pl1-th-thoai-confirm" data-toggle="modal">Phụ lục 1- Bảng giá thị trường (mẫu tổng hợp)</a> </li>
                                <li><a data-target="#pl1-dv-thoai-confirm" data-toggle="modal">Phụ lục 1- Bảng giá thị trường (mẫu đơn vị)</a> </li>
                                <li><a data-target="#pl2-thoai-confirm" data-toggle="modal" data-href="{{url('reports/tt55-2011-BTC/PL2')}}">Phụ lục 2- Bảng giá hàng hóa nhập khẩu</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('reports.hhdv.TT55-2011-BTC.thoai.modal-thoai')
@stop