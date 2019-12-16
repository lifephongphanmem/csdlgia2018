@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>

@stop

@section('content')

    <h3 class="page-title">
        Cấu hình <small>&nbsp;chức năng của chương trình</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    {!! Form::open(['url' => '/setting'])!!}
    <div class="row">
        <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th rowspan="2">Nội dung CSDL địa phương</th>
                            <th colspan="2" width="20%">Chức năng</th>
                        </tr>
                        <tr>
                           <th width="10%">Quản lý</th>
                           <th width="10%">Công bố</th>
                        </tr>
                        </thead>
                        <tbody>
                        @include('system.general.csdlgiahhdv')
                        @include('system.general.csdlthamdinhgia')
                        @include('system.general.csdlvbqlnn')
                        @include('system.general.csdlpvctqlnngia')
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12" style="text-align: center">
                        <a href="{{url('general')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                        <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Cập nhật</button>
                    </div>
                </div>
            </div>


        </div>

    </div>
    {!! Form::close() !!}




        <!-- BEGIN DASHBOARD STATS -->

        <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>



@stop