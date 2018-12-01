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
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        $(function(){
            $('#level').change(function() {
                var current_path_url = '/xetduyettdttdn?';
                var level = '&level='+$('#level').val();
                var url = current_path_url + level;
                window.location.href = url;
            });

            $('#trangthai').change(function() {
                var current_path_url = '/xetduyettdttdn?';
                var trangthai = '&trangthai='+$('#trangthai').val();
                var level = '&level='+$('#level').val();
                var url = current_path_url + trangthai + level;
                window.location.href = url;
            });
            $('#maxa').change(function() {
                var current_path_url = '/xetduyettdttdn?';
                var trangthai = '&trangthai='+$('#trangthai').val();
                var level = '&level='+$('#level').val();
                var maxa = '&maxa='+$('#maxa').val();
                var url = current_path_url + level + trangthai + maxa;
                window.location.href = url;
            });
        })
        function ClickDelete(){
            $('#frm_delete').submit();
        }
    </script>
@stop

@section('content')
    <h3 class="page-title">
        Quản lý thay đổi <small>&nbsp;thông tin doanh nghiệp</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Doanh nghiệp</label>
                                <select class="form-control" name="level" id="level">
                                    <option value="">--Chọn doanh nghiệp cung cấp loại dịch vụ</option>
                                    @if(can('thdvlt','xdttdn'))
                                        <option value="DVLT" {{($inputs['level'] == "DVLT") ? 'selected' : ''}}>Doanh nghiệp dịch vụ lưu trú</option>
                                    @endif
                                    @if(can('thtpcnte6t','xdttdn'))
                                        <option value="TPCNTE6T" {{($inputs['level'] == "TPCNTE6T") ? 'selected' : ''}}>Doanh nghiệp TPCN cho TE dưới 6 tuổi</option>
                                    @endif
                                    @if(can('thtacn','xdttdn'))
                                        <option value="TACN" {{($inputs['level'] == "TACN") ? 'selected' : ''}}>Doanh nghiệp TACN</option>
                                    @endif
                                    @if(can('thdvvt','xdttdn'))
                                        <option value="DVVT" {{($inputs['level'] == "DVVT") ? 'selected' : ''}}>Doanh nghiệp dịch vụ vận tải</option>
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Trạng thái hồ sơ</label>
                                <select class="form-control" name="trangthai" id="trangthai">
                                    <option value="CD" {{($inputs['trangthai'] == "CD") ? 'selected' : ''}}>Chờ duyệt</option>
                                    <option value="BTL" {{($inputs['trangthai'] == "BTL") ? 'selected' : ''}}>Bị trả lại</option>
                                </select>
                            </div>
                        </div>
                        @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Đơn vị quản lý</label>
                                <select class="form-control" name="maxa" id="maxa">
                                    @foreach($modeldv as $dv)
                                        <option value="{{$dv->maxa}}" {{$dv->maxa == $inputs['maxa']? 'selected' : ''}}>{{$dv->tendv}}</option>
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
                            <th style="text-align: center">Ngày thay đổi</th>
                            <th style="text-align: center">Tên doanh nghiệp</th>
                            <th style="text-align: center">Mã số thuế</th>
                            <th style="text-align: center">Phân loại</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center" width="25%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr class="odd gradeX">
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td style="text-align: center" width="15%">{{getDateTime($tt->created_at)}}</td>
                                <td class="active" width="20%">{{$tt->tendn}}</td>
                                <td width="10%" style="text-align: center"> {{$tt->maxa}}</td>
                                <td style="text-align: center"> {{$tt->level}}</td>
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

                                    <!--button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                        Xóa</button-->
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
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'xetduyettdttdn/delete','id' => 'frm_delete'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa?</h4>
                </div>
                <input type="text" name="iddelete" id="iddelete">
                <div class="modal-footer">
                    <button type="submit" class="btn blue" onclick="ClickDelete()">Đồng ý</button>
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@stop