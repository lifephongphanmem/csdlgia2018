@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css')}}"/-->
    <!-- BEGIN THEME STYLES -->
    <!--link href="{{url('assets/global/css/components.css')}}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/layout.css')}}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{url('assets/admin/layout/css/themes/darkblue.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{url('assets/admin/layout/css/custom.css')}}" rel="stylesheet" type="text/css"/-->
    <!-- END THEME STYLES -->
@stop


@section('custom-script')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!--script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js')}}"></script-->
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
        Thông tin<small>&nbsp;giá các loại đất lịch sử</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <div class="portlet-body">
                    <div class="table-toolbar">
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center" rowspan="2">STT</th>
                            <th style="text-align: center" rowspan="2">Địa bàn</th>
                            <th style="text-align: center" rowspan="2">Vị trí</th>
                            <th style="text-align: center" width="10%" rowspan="2">Căn cứ quyết định</th>
                            <th rowspan="2" width="2%">Hệ số K</th>
                            <th style="text-align: center" colspan="4">Giá đất</th>
                            <th rowspan="2">Thông tin thao tác</th>
                        </tr>
                        <tr>
                            <th>VT1</th>
                            <th>VT2</th>
                            <th>VT3</th>
                            <th>VT4</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modelh as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td>{{$tt->hienthi}}</td>
                                <td class="success">{{$tt->vitri}}</td>
                                <td class="text-center">{{$tt->soqd}}</td>
                                <td>{{$tt->hesok}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt1)}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt2)}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt3)}}</td>
                                <td style="text-align: right; font-weight: bold;" class="active">{{dinhdangso($tt->giavt4)}}</td>
                                <td>{{$tt->username}} - {{$tt->thaotac}} - {{getDateTime($tt->created_at)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <a href="{{url('thongtingiacacloaidat?&district='.$model->mahuyen)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
        </div>
    </div>
    <!-- BEGIN DASHBOARD STATS -->
    <!-- END DASHBOARD STATS -->
    <div class="clearfix">
    </div>
@stop