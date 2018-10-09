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
        $(function(){
            $('#plbc').change(function() {
                var plbc = $('#plbc').val();
                var url = '/dmtd/pl='+plbc;
                window.location.href = url;
            });
        })
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Danh mục thời điểm<small>&nbsp;báo cáo</small>
    </h3>
    <div class="row" style="padding-top: 15px;padding-bottom: 15px";>
        <div class="col-md-2 text-right" style="padding-top: 5px">
                <label>Phân loại báo cáo</label>
        </div>
        <div class="col-md-4">
                <select class="form-control" name="plbc" id="plbc">
                    <option value="all" {{$pl == 'all' ? 'selected' : ''}}>--Phân loại thời điểm--</option>
                    <option value="Hàng hóa, dịch vụ" {{$pl == 'Hàng hóa, dịch vụ' ? 'selected' : ''}}>Hàng hóa, dịch vụ</option>
                    <option value="Hàng hóa xuất nhập khẩu" {{$pl == 'Hàng hóa xuất nhập khẩu' ? 'selected' : ''}}>Hàng hóa xuất nhập khẩu</option>
                    <option value="Hàng hóa thị trường" {{$pl == 'Hàng hóa thị trường' ? 'selected' : ''}}>Hàng hóa thị trường</option>
                    <option value="Thuế tài nguyên" {{$pl == 'Thuế tài nguyên' ? 'selected' : ''}}>Thuế tài nguyên</option>
                    <option value="Lệ phí trước bạ" {{$pl == 'Lệ phí trước bạ' ? 'selected' : ''}}>Lệ phí trước bạ</option>
                </select>
        </div>
        <div class="col-md-6 text-right" style="padding-top: 5px">
            <a href="{{url('dmthoidiem/create')}}" class="btn btn-default btn-sm">
                <i class="fa fa-plus"></i> Thêm mới </a>
            <a href="" class="btn btn-default btn-sm">
                <i class="fa fa-print"></i> Print </a>
        </div>
    </div>
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
                            <!--th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/>
                            </th-->
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Mã thời điểm</th>
                            <th style="text-align: center">Thời điểm</th>
                            <th style="text-align: center">Từ ngày</th>
                            <th style="text-align: center">Đến ngày</th>
                            <th style="text-align: center">Nhóm</th>
                            <th style="text-align: center">Phân loại báo cáo</th>
                            <th width="15%" style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr>
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td>{{$tt->mathoidiem}}</td>
                            <td class="success">{{$tt->tenthoidiem}}</td>
                            <td>{{$tt->tungay}}</td>
                            <td>{{$tt->denngay}}</td>
                            <td>{{$tt->nhom}}</td>
                            <td>{{$tt->plbc}}</td>
                            <td>
                                <a href="{{url('dmthoidiem/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs">
                                    <i class="fa fa-edit"></i> Chỉnh sửa </a>

                                <button type="button" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal" onclick="getId('{{$tt->id}}')">
                                    <i class="fa fa-trash-o"></i>&nbsp; Xóa</button>

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
    <div class="clearfix">
    </div>
    <div class="modal fade" id="delete-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'dmthoidiem/delete','id' => 'frm_delete'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa?</h4>
                </div>
                <input type="hidden" name="iddelete" id="iddelete">
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
    <script>
        function ClickDelete(){
            $('#frm-demlete').submit();
        }
    </script>
@stop