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
        $(function(){

            $('#maxa').change(function() {
                var maxa = '&maxa=' + $('#maxa').val();
                var url = '/thontindntacn?'+ maxa;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin doanh nghiệp kê khai <br><small>&nbsp;Thức ăn chăn nuôi cho gia súc, gia cầm và thủy sản; thuốc thủ y để
            tiêu độc, sát trùng, tay trùng, trị bệnh cho gia súc, gia cầm và thủy sản theo quy
            định của Bộ Nông nghiệp và Phát trỉến nông thôn </small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="portlet-body">
                    @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Đơn vị quản lý</label>
                                    <select name="maxa" id="maxa" class="form-control">
                                        @foreach($modeldv as $dv)
                                            <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['maxa'] ? 'selected' : ''}}>{{$dv->tendv}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Đơn vị quản lý</th>
                            <th style="text-align: center">Tên doanh nghiệp</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="font-weight: bold">{{$tt->tendv}}</td>
                                <td class="active">{{$tt->tendn}}</td>
                                <td>{{$tt->diachikd}}</td>
                                <td>
                                    <a href="{{url('kekhaigiathucanchannuoi/?&masothue='.$tt->maxa)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Kê khai giá </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->
    <div class="clearfix"></div>
@stop