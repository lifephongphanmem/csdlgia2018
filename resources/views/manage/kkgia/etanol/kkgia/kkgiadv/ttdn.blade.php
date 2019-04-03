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
                var mahuyen = '&mahuyen='+ $('#mahuyen').val();
                var url = '/thongtindnetanol?'+ mahuyen + maxa;
                window.location.href = url;
            });
            $('#mahuyen').change(function() {
                var mahuyen = '&mahuyen='+ $('#mahuyen').val();
                var url = '/thongtindnetanol?'  + mahuyen;

                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin doanh nghiệp kê khai<small>&nbsp;giá Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="portlet-body">


                        <div class="row">
                            @if(session('admin')->level == 'T')
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label style="font-weight: bold">Đơn vị chủ quản</label>
                                        <select name="mahuyen" id="mahuyen" class="form-control">
                                            @foreach($modeldvql as $dvql)
                                                <option value="{{$dvql->mahuyen}}" {{$dvql->mahuyen == $inputs['mahuyen'] ? 'selected' : ''}}>{{$dvql->tendv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="mahuyen" id="mahuyen" value="{{$inputs['mahuyen']}}">
                            @endif
                            @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label style="font-weight: bold">Đơn vị quản lý</label>
                                    <select name="maxa" id="maxa" class="form-control">
                                        @foreach($modeldv as $dv)
                                            <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['maxa'] ? 'selected' : ''}}>{{$dv->tendv}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                        </div>

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
                                <td>{{$tt->diachi}}</td>
                                <td>
                                    <a href="{{url('kekhaigiaetanol?&masothue='.$tt->maxa)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Kê khai giá </a>
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