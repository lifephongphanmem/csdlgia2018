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
            $('#trangthai').change(function() {
                var current_path_url = '/xetduyettdttdn?';
                var trangthai = '&trangthai='+$('#trangthai').val();
                var url = current_path_url + trangthai;
                window.location.href = url;
            });

        })
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Quản lý thay đổi <small>&nbsp;thông tin doanh nghiệp</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label style="font-weight: bold">Trạng thái hồ sơ</label>
                                <select class="form-control" name="trangthai" id="trangthai">
                                    <option value="CD" {{($inputs['trangthai'] == "CD") ? 'selected' : ''}}>Chờ duyệt</option>
                                    <option value="BTL" {{($inputs['trangthai'] == "BTL") ? 'selected' : ''}}>Bị trả lại</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Ngày thay đổi</th>
                            <th style="text-align: center">Tên doanh nghiệp</th>
                            <th style="text-align: center">Mã số thuế</th>
                            <th style="text-align: center">Địa chỉ</th>
                            <th style="text-align: center"">Trạng thái</th>
                            <th style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr class="odd gradeX">
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td style="text-align: center" width="15%">{{getDateTime($tt->created_at)}}</td>
                                <td class="active" width="20%">{{$tt->tendn}}</td>
                                <td width="10%" style="text-align: center"> {{$tt->maxa}}</td>
                                <td> {{$tt->diachi}}</td>
                                @if($tt->trangthai == 'CD')
                                    <td align="center"><span class="badge badge-warning">Chờ duyệt</span>

                                    </td>
                                @elseif($tt->trangthai == 'BTL')
                                        <td align="center">
                                            <span class="badge badge-danger">Bị trả lại</span><br>&nbsp;
                                            Lý do: <b>{{$tt->lydo}}</b>
                                        </td>
                                @endif
                                <td>
                                    <a href="{{url('xetduyettdttdn/'.$tt->id)}}" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- BEGIN DASHBOARD STATS -->

    <!-- END DASHBOARD STATS -->

    <div class="clearfix"></div>
@stop