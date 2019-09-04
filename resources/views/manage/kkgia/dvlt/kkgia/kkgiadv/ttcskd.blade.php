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
                var url = '/thongtincskdkkdvlt?' + maxa;
                window.location.href = url;
            });

        });
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin cơ sở kinh doanh<small>&nbsp; dịch vụ lưu trú</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="row">
                    @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Đơn vị quản lý</label>
                                <select name="maxa" id="maxa" class="form-control">
                                    @foreach($modeldv as $dv)
                                        <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['maxa'] ? 'selected' : ''}}>{{$dv->tendv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Cơ quan quản lý</th>
                            <th style="text-align: center" width="25%">Tên Doanh nghiệp</th>
                            <th style="text-align: center" width="25%">Tên cơ sở kinh doanh</th>
                            <th style="text-align: center" width="10%">Loại hạng</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center" width="10%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key+1}}</td>
                                <td style="font-weight: bold">{{$tt->tendv}}</td>
                                <td style="font-weight: bold">{{$tt->tendn}}</td>
                                <td class="active">{{$tt->tencskd}}</td>
                                <td style="text-align: center">{{$tt->loaihang}}</td>
                                <td>{{$tt->diachikd}}</td>
                                <td>
                                    <a href="{{url('kekhaigiadvlt/?&macskd='.$tt->macskd)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-plus"></i>&nbsp;Kê khai giá</
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