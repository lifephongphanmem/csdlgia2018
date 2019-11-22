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
        Danh mục mặt hàng chi tiết<small>&nbsp;thuế tài nguyên</small>
    </h3>
    <p style="color: #0000ff">{{$nhom->tennhom}}</p>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="actions">
                        @if(can('dmgiathuetn','create'))
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-create" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#modal-importexcel" data-toggle="modal"><i class="fa fa-file-excel-o"></i>&nbsp;Nhận dữ liệu</button>
                        @endif
                        <a href="{{url('nhomthuetn')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th style="text-align: center" width="2%">STT</th>
                            <th style="text-align: center">Level</th>
                            <th style="text-align: center">Cấp I</th>
                            <th style="text-align: center">Cấp II</th>
                            <th style="text-align: center">Cấp III</th>
                            <th style="text-align: center">Cấp IV</th>
                            <th style="text-align: center">Cấp V</th>
                            <th style="text-align: center">Tên nhóm, loại tài nguyên</th>
                            <th style="text-align: center">Đơn vi<br>tính</th>
                            <th style="text-align: center">Theo dõi</th>
                            <th style="text-align: center" width="15%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr class="odd gradeX">
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td>{{$tt->level}}</td>
                            <td>{{$tt->cap1}}</td>
                            <td>{{$tt->cap2}}</td>
                            <td>{{$tt->cap3}}</td>
                            <td>{{$tt->cap4}}</td>
                            <td>{{$tt->cap5}}</td>
                            <td class="active" >{{$tt->ten}}</td>
                            <td style="text-align: center">{{$tt->dvt}}</td>
                            <td style="text-align: center">
                                @if($tt->theodoi == 'KTD')
                                    <span class="badge badge-active">Không theo dõi</span>
                                @else
                                    <span class="badge badge-success">Theo dõi</span>
                                @endif
                            </td>
                            <td>
                                @if(can('dmgiathuetn','edit'))
                                <button type="button" onclick="ClickEdit('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-edit" data-toggle="modal"><i class="fa fa-edit"></i>&nbsp;Sửa</button>
                                @endif
                                @if(can('dmgiathuetn','delete'))
                                    <button type="button" onclick="getId('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#modal-delete" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                @endif
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
    @include('manage.dinhgia.thuetn.danhmuc.chitiet.include.modal_dialog')

@stop