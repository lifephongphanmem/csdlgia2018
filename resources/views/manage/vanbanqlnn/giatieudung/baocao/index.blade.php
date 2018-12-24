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

                            <ol>
                                <li><a data-target="#pl5-thoai-confirm" data-toggle="modal" data-href="{{url('chisocpi/baocao/tonghop')}}">Báo cáo tổng hợp chỉ số giá tiêu dùng (CPI)</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('manage.vanbanqlnn.giatieudung.baocao.modal-thoai')
@stop