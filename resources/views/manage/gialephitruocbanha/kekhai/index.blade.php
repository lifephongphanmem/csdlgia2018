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
        function getId(id){
            document.getElementById("iddelete").value=id;
        }
        function confirmHoanthanh(id) {
            document.getElementById("idhoanthanh").value=id;
        }
        function confirmHHT(id){
            document.getElementById("idhuyhoanthanh").value=id;
        }
        function confirmCB(id){
            document.getElementById("idcongbo").value=id;
        }

    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ <small>&nbsp;lệ phí tước bạ đối với nhà</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box wi">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        @if(can('kkgialephitruocbanha','create'))
                            <a href="{{url('lephitruocbanha/create')}}" class="btn btn-default btn-sm">
                                <i class="fa fa-plus"></i> Thêm mới </a>
                            {{--<div class="btn-group">--}}
                                {{--<a class="btn btn-default btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">--}}
                                    {{--<i class="fa fa-file-excel-o"></i>&nbsp;Nhận dữ liệu <i class="fa fa-angle-down"></i>--}}
                                {{--</a>--}}
                                {{--<ul class="dropdown-menu pull-right">--}}
                                    {{--<li>--}}
                                        {{--<a href="">File dữ liệu mẫu</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a href="">Nhận dữ liệu</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        @endif
                        <!--a href="" class="btn btn-default btn-sm">
                            <i class="fa fa-print"></i> Print </a-->
                    </div>
                </div>
                <hr>
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
                            <th style="text-align: center">Số quyết định</th>
                            <th style="text-align: center">Ngày ban hành</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th width="20%%" style="text-align: center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                        <tr>
                            <td style="text-align: center">{{$key + 1}}</td>
                            <td class="success">{{$tt->soqd}}</td>
                            <td class="text-center" style="font-weight: bold">{{getDayVn($tt->ngaybh)}}</td>
                            <td class="text-center" style="font-weight: bold">{{getDayVn($tt->ngayad)}}</td>
                            <td style="text-align: center">
                                @if($tt->trangthai == 'HT')
                                    <span class="badge badge-warning">Hoàn thành</span>
                                @elseif($tt->trangthai == 'CHT')
                                    <span class="badge badge-danger">Chưa hoàn thành</span>
                                @elseif($tt->trangthai == 'HHT')
                                    <span class="badge badge-danger">Hủy hoàn thành</span>
                                @else
                                    <span class="badge badge-success">Công bố</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{url('lephitruocbanha/'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                @if($tt->trangthai == 'CHT' || $tt->trangthai == 'HHT')
                                    @if(can('kkgialephitruocbanha','edit'))
                                    <a href="{{url('lephitruocbanha/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs">
                                        <i class="fa fa-edit"></i> Chỉnh sửa </a>
                                    @endif
                                    @if(can('kkgialephitruocbanha','approve'))
                                    <button type="button" onclick="confirmHoanthanh('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn thành</button>
                                    @endif
                                    @if($tt->trangthai == 'CHT')
                                        @if(can('kkgialephitruocbanha','delete'))
                                        <button type="button" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal" onclick="getId('{{$tt->id}}')">
                                            <i class="fa fa-trash-o"></i>&nbsp; Xóa</button>
                                        @endif
                                    @endif
                                @endif
                                @if($tt->trangthai == 'HT' || $tt->trangthai == 'CB')
                                    @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                                        @if($tt->trangthai == 'HT')
                                            @if(can('thgialephitruocbanha','congbo'))
                                            <button type="button" onclick="confirmCB('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal-confirm" data-toggle="modal"><i class="fa fa-send"></i>&nbsp;
                                                Công bố</button>
                                            @endif
                                        @endif
                                        @if(can('kkgialephitruocbanha','approve'))
                                        <button type="button" onclick="confirmHHT('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-times"></i>&nbsp;
                                            Hủy hoàn thành</button>
                                        @endif
                                    @endif
                                @endif

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
                {!! Form::open(['url'=>'lephitruocbanha/delete','id' => 'frm_delete'])!!}
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
    <!--Modal Hoàn thành-->
    <div id="hoanthanh-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'lephitruocbanha/hoanthanh','id' => 'frm_hoanthanh'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn thành hồ sơ?</h4>

                    <input type="hidden" name="idhoanthanh" id="idhoanthanh">

                </div>
                <div class="modal-body">
                    <p style="color: #0000FF">Hồ sơ đã hoàn thành sẽ không được phép chỉnh sửa và xóa hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhoanthanh()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Hủy Hoàn thành-->
    <div id="huyhoanthanh-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'lephitruocbanha/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy hoàn thành hồ sơ?</h4>

                    <input type="hidden" name="idhuyhoanthanh" id="idhuyhoanthanh">

                </div>
                <div class="modal-body">
                    <p style="color: #0000FF">Hồ sơ Bị hủy sẽ chuyển lại cho cơ quan nhập chủ quản có thể chỉnh sửa hồ sơ!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhuyhoanthanh()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Hủy Hoàn thành-->
    <div id="congbo-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'lephitruocbanha/congbo','id' => 'frm_congbo'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý công bố hồ sơ?</h4>

                    <input type="hidden" name="idcongbo" id="idcongbo">

                </div>
                <div class="modal-body">
                    <p style="color: #0000FF">Hồ sơ sẽ được công bố lên trang công bố của tỉnh!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickcongbo()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickhoanthanh(){
            $('#frm_hoanthanh').submit();
        }
        function clickcongbo(){
            $('#frm_congbo').submit();
        }
        function clickhuyhoanthanh(){
            $('#frm_huyhoanthanh').submit();
        }
    </script>
@stop