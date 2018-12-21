@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
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
            $('#nam').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var url = '/thuetainguyen?'+namhs;
                window.location.href = url;
            });
            $('#trangthai').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var trangthai = '&trangthai=' + $('#trangthai').val();
                var url = '/thuetainguyen?'+namhs + trangthai;
                window.location.href = url;
            });

            $('#district').change(function() {
                var nam = '&nam='+ $('#nam').val();
                var trangthai = '&trangthai=' + $('#trangthai').val();
                var district = '&district='+ $('#district').val();
                var url = '/thuetainguyen?' + nam +trangthai + district;

                window.location.href = url;
            });

        });
        function confirmDelete(id) {
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
        function clickcreate(){
            $('#frm_create').submit();
        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ <small>&nbsp;thuế tài nguyên</small>
    </h3>

    <!-- END PAGE HEADER-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box">
                <div class="portlet-title">
                    <div class="caption">
                    </div>
                    <div class="actions">
                        @if(can('kkgiathuetn','create'))
                            <button type="button" class="btn btn-default btn-sm" data-target="#create-modal-confirm" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;
                                Thêm mới</button>
                            <div class="btn-group">
                                <a class="btn btn-default btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="fa fa-file-excel-o"></i>&nbsp;Nhận dữ liệu <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="">File dữ liệu mẫu</a>
                                    </li>
                                    <li>
                                        <a href="">Nhận dữ liệu</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Năm hồ sơ</label>
                                <select name="nam" id="nam" class="form-control">
                                    @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                    @if ($nam_stop = intval(date('Y')) + 1) @endif
                                    @for($i = $nam_start; $i <= $nam_stop; $i++)
                                        <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Trạng thái hồ sơ</label>
                                <select name="trangthai" id="trangthai" class="form-control">
                                    @if(can('kkgiathuetn','create'))
                                    <option value="CHT" {{$trangthai == 'CHT' ? 'selected' : ''}}>Chưa hoàn thành</option>
                                    @endif
                                    <option value="HT" {{$trangthai == 'HT' ? 'selected' : ''}}>Hoàn thành</option>
                                    <option value="HHT" {{$trangthai == 'HHT' ? 'selected' : ''}}>Hủy hoàn thành</option>
                                    <option value="CB" {{$trangthai == 'CB' ? 'selected' : ''}}>Công bố</option>
                                </select>
                            </div>
                        </div>
                        @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Địa bàn quản lý</label>
                                    <select name="district" id="district" class="form-control">
                                        @foreach($modeldb as $db)
                                            <option value="{{$db->district}}" {{$db->district == $district ? 'selected' : ''}}>{{$db->diaban}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Số quyết định</th>
                            <th style="text-align: center">Ngày áp dụng</th>
                            <th style="text-align: center">Nhóm tài nguyên</th>
                            <th style="text-align: center">Ghi chú</th>
                            <th style="text-align: center" width="10%">Trạng thái</th>
                            <th style="text-align: center" width="20%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td class="active"  style="font-weight: bold">{{$tt->soqd}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngayapdung)}}</td>
                                <td class="success" style="font-weight: bold">{{$tt->tennhom}}</td>
                                <td>{{$tt->ghichu}}</td>
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
                                    <a href="{{url('thuetainguyen/'.$tt->id)}}" target="_blank" class="btn btn-default btn-xs mbs"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if($tt->trangthai == 'CHT' || $tt->trangthai == 'HHT')
                                        @if(can('kkgiathuetn','edit'))
                                        <a href="{{url('thuetainguyen/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        @endif
                                        @if(can('kkgiathuetn','approve'))
                                        <button type="button" onclick="confirmHoanthanh('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn thành</button>
                                        @endif
                                        @if($tt->trangthai == 'CHT')
                                            @if(can('kkgiathuetn','delete'))
                                            <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                            Xóa</button>
                                            @endif
                                        @endif
                                    @endif
                                    @if($tt->trangthai == 'HT' || $tt->trangthai == 'CB')
                                        @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                                        @if($tt->trangthai == 'HT')
                                            @if(can('thgiathuetn','congbo'))
                                            <button type="button" onclick="confirmCB('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal-confirm" data-toggle="modal"><i class="fa fa-send"></i>&nbsp;
                                                Công bố</button>
                                            @endif
                                        @endif
                                            @if(can('kkgiathuetn','approve'))
                                            <button type="button" onclick="confirmHHT('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#huyhoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-times"></i>&nbsp;
                                                Hủy hoàn thành</button>
                                            @endif
                                        @endif
                                    @endif

                                    <!--a href="{{url('hoso-thamdinhgia/'.$tt->mahs.'/history')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Lịch sử</a-->
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
    @include('includes.e.modal-attackfile')
    <!--Modal Create-->
    <div id="create-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
        {!! Form::open(['url'=>'/thuetainguyen/create','id' => 'frm_create','method'=>'post'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Thêm mới kê khai giá thuế tài nguyên</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-4 control-label text-right">Phân loại tài nguyên</label>
                            <div class="col-md-8">
                                <select name="manhom" id="manhom" class="form-control">
                                    @foreach($m_nhomthuetn as $ct)
                                        <option value="{{$ct->manhom}}">{{$ct->tennhom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" name="getdistrict" id="getdistrict" value="{{$district}}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickcreate()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'thuetainguyen/delete','id' => 'frm_delete'])!!}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-header-primary">
                    <button type="button" data-dismiss="modal" aria-hidden="true"
                            class="close">&times;</button>
                    <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                    <input type="hidden" name="iddelete" id="iddelete">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                    <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    <script>
        function clickdelete(){
            $('#frm_delete').submit();
        }
    </script>
    <!--Modal Hoàn thành-->
    <div id="hoanthanh-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'thuetainguyen/hoanthanh','id' => 'frm_hoanthanh'])!!}
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
        {!! Form::open(['url'=>'thuetainguyen/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
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
    <!--Modal Công bố-->
    <div id="congbo-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'thuetainguyen/congbo','id' => 'frm_congbo'])!!}
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