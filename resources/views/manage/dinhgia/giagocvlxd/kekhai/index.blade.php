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
    @include('includes.crumbs.script_inputdate')
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        $(function(){
            $('#nam').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var url = '/thongtingiagocvlxd?'+namhs;
                window.location.href = url;
            });
            $('#district').change(function() {
                var namhs = '&nam=' + $('#nam').val();
                var district = '&district=' + $('#district').val();
                var url = '/thongtingiagocvlxd?'+namhs  + district;
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
        function ClickCreate(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: 'kkgiagocvlxd/checkhs',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    district: $('#diaban').val(),
                    nam: $('#namhs').val(),
                    quy: $('#quy').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $("#frm_create").unbind('submit').submit();
                    }else{
                        $("#frm_create").submit(function (e) {
                            e.preventDefault();
                        });
                        toastr.error('Hồ sơ đã được tạo bạn cần kiểm tra lại','Lỗi!.');
                    }
                }
            })
        }
        function ClickIpCreate(){
            var str = '';
            var ok = true;

            if (!$('#tenhhdv').val()) {
                str += '  - Tên vật liệu \n';
                $('#tenhhdv').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#qccl').val()) {
                str += '  - Quy cách chất lượng \n';
                $('#qccl').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#dvt').val()) {
                str += '  - Đơn vị tính \n';
                $('#dvt').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#giagoc').val()) {
                str += '  - Giá gốc \n';
                $('#giagoc').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#qcad').val()) {
                str += '  - Tiêu chuẩn, quy cách \n';
                $('#qcad').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#ghichu').val()) {
                str += '  - Ghi chú \n';
                $('#ghichu').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#tudong').val()) {
                str += '  - Dòng bắt đầu nhận dữ liệu \n';
                $('#tudong').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#dendong').val()) {
                str += '  - Dòng đến nhận dữ liệu \n';
                $('#sodong').parent().addClass('has-error');
                ok = false;
            }

            if (!$('#fexcel').val()) {
                str += '  - File Excel \n';
                $('#fexcel').parent().addClass('has-error');
                ok = false;
            }

            if (ok == false) {
                //alert('Các trường: \n' + str + 'Không được để trống');
                toastr.error('Thông tin: \n' + str + 'Không được để trống','Lỗi!.');
                $("form").submit(function (e) {
                    e.preventDefault();
                });
            }
            else {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: 'kkgiagocvlxd/checkhs',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        district: $('#districtip').val(),
                        nam: $('#namip').val(),
                        quy: $('#quyip').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            var btn = document.getElementById('submitformip');
                            btn.disabled = true;
                            btn.innerText = 'Loading...'
                            $("#frm_ipcreate").unbind('submit').submit();
                        }else{
                            $("#frm_ipcreate").submit(function (e) {
                                e.preventDefault();
                            });
                            toastr.error('Hồ sơ đã được tạo bạn cần kiểm tra lại','Lỗi!.');
                        }
                    }
                })
            }

        }
    </script>
@stop

@section('content')

    <h3 class="page-title">
        Thông tin hồ sơ <small>&nbsp;giá gốc vật liệu xây dựng</small>
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
                        @if(can('kkgiagocvlxd','create'))
                            <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
                            &nbsp;
                            <button type="button" data-target="#modal-ipcreate" data-toggle="modal" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i>&nbsp;Nhận dữ liệu</button>
                            &nbsp;
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
                                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : ''}}>Năm {{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        @if(session('admin')->level == 'T' || session('admin')->level == 'H')
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Địa bàn quản lý</label>
                                <select name="district" id="district" class="form-control">
                                    @foreach($modeldb as $db)
                                        <option value="{{$db->district}}" {{$db->district == $inputs['district'] ? 'selected' : ''}}>{{$db->diaban}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @else
                            <input type="hidden" id="district" name="district" value="{{$inputs['district']}}">
                        @endif
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                        <thead>
                        <tr>
                            <th width="2%" style="text-align: center">STT</th>
                            <th style="text-align: center">Địa bàn</th>
                            <th style="text-align: center">Quý - Năm</th>
                            <th style="text-align: center">Ngày báo cáo</th>
                            <th style="text-align: center">Số quyết định</th>
                            <th style="text-align: center">Trạng thái</th>
                            <th style="text-align: center" width="33%">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model as $key=>$tt)
                            <tr>
                                <td style="text-align: center">{{$key + 1}}</td>
                                <td style="text-align: center">{{$tt->diaban}}</td>
                                <td style="text-align: center">Quý {{$tt->quy}}/ Năm {{$tt->nam}}</td>
                                <td style="text-align: center">{{getDayVn($tt->ngaybc)}}</td>
                                <td style="text-align: center">{{$tt->soqd}}</td>
                                <td style="text-align: center">
                                    @if($tt->trangthai == 'HT')
                                        <span class="badge badge-warning">Hoàn thành</span>
                                    @elseif($tt->trangthai == 'CHT')
                                        <span class="badge badge-danger">Chưa hoàn thành</span>
                                    @elseif($tt->trangthai == 'HHT')
                                        <span class="badge badge-danger">Hủy hoàn thành</span>
                                    @endif
                                    @if($tt->congbo == 'CB')
                                        <br>Hồ sơ đang được công bố
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('thongtingiagocvlxd/'.$tt->id)}}" class="btn btn-default btn-xs mbs" target="_blank"><i class="fa fa-eye"></i>&nbsp;Xem chi tiết</a>
                                    @if($tt->trangthai == 'CHT' || $tt->trangthai == 'HHT')
                                        @if(can('kkgiagocvlxd','edit'))
                                        <a href="{{url('thongtingiagocvlxd/'.$tt->id.'/edit')}}" class="btn btn-default btn-xs mbs"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</a>
                                        @endif
                                        @if(can('kkgiagocvlxd','approve'))
                                        <button type="button" onclick="confirmHoanthanh('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#hoanthanh-modal-confirm" data-toggle="modal"><i class="fa fa-check"></i>&nbsp;Hoàn thành</button>
                                        @endif
                                        @if($tt->trangthai == 'CHT')
                                            @if(can('kkgiagocvlxd','delete'))
                                                <button type="button" onclick="confirmDelete('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#delete-modal-confirm" data-toggle="modal"><i class="fa fa-trash-o"></i>&nbsp;
                                                Xóa</button>
                                            @endif
                                        @endif
                                    @endif
                                    @if($tt->trangthai == 'HT' || $tt->trangthai == 'CB')
                                        @if(session('admin')->level =='T' || session('admin')->level == 'H')
                                            @if($tt->trangthai == 'HT')
                                                @if($tt->congbo != 'CB')
                                                    @if(can('thgiagocvlxd','congbo'))
                                                    <button type="button" onclick="confirmCB('{{$tt->id}}')" class="btn btn-default btn-xs mbs" data-target="#congbo-modal-confirm" data-toggle="modal"><i class="fa fa-send"></i>&nbsp;
                                                        Công bố</button>
                                                    @endif
                                                @endif
                                            @endif
                                            @if(can('thgiadaugiadat','approve'))
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
    @include('includes.e.modal-attackfile')

    <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open(['url'=>'thongtingiagocvlxd/create','id' => 'frm_create'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới hồ sơ giá gốc vật liệu xây dựng?</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Địa bàn báo cáo:</b> {{$diaban->diaban}}</label>
                    </div>
                    <div class="form-group">
                        <label><b>Năm báo cáo:</b> {{$inputs['nam']}}</label>
                    </div>
                    <div class="form-group">
                        <label><b>Quý báo cáo</b></label>
                        <select class="form-control" id="quy" name="quy">
                            <option value="1"{{SelectedQuy(1)}}>Quý 1</option>
                            <option value="2" {{SelectedQuy(2)}}>Quý 2</option>
                            <option value="3" {{SelectedQuy(3)}}>Quý 3</option>
                            <option value="4" {{SelectedQuy(4)}}>Quý 4</option>
                        </select>
                    </div>
                    <input type="hidden" name="diaban" id="diaban" value="{{$inputs['district']}}">
                    <input type="hidden" name="namhs" id="namhs" value="{{$inputs['nam']}}">
                </div>
                {!! Form::close() !!}
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" onclick="ClickCreate()">Đồng ý</button>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade bs-modal-lg" id="modal-ipcreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                {!! Form::open(['url'=>'thongtingiagocvlxd/importex','id' => 'frm_ipcreate','files'=>true,'enctype'=>'multipart/form-data'])!!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Nhận dữ liệu hồ sơ giá gốc vật liệu xây dựng?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Địa bàn báo cáo:</b> {{$diaban->diaban}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Năm báo cáo:</b> {{$inputs['nam']}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Quý báo cáo</b><span class="require">*</span></label>
                                <select class="form-control" id="quyip" name="quyip">
                                    <option value="1"{{SelectedQuy(1)}}>Quý 1</option>
                                    <option value="2" {{SelectedQuy(2)}}>Quý 2</option>
                                    <option value="3" {{SelectedQuy(3)}}>Quý 3</option>
                                    <option value="4" {{SelectedQuy(4)}}>Quý 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Tên vật liệu xây dựng</b><span class="require">*</span></label>
                                <input id="tenhhdv" class="form-control required" name="tenhhdv" type="text" value="A">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Quy cách chất lượng</b><span class="require">*</span></label>
                                <input id="qccl" class="form-control required" name="qccl" type="text" value="B">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>
                                <input id="dvt" class="form-control required" name="dvt" type="text" value="C">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Giá gốc vật liệu </b><span class="require">*</span></label>
                                <input id="giagoc" class="form-control required" name="giagoc" type="text" value="D">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Tiêu chuẩn, quy chuẩn</b><span class="require">*</span></label>
                                <input id="qcad" class="form-control required" name="qcad" type="text" value="E">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Ghi chú</b><span class="require">*</span></label>
                                <input id="ghichu" class="form-control required" name="ghichu" type="text" value="F">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Nhận từ dòng thứ</b><span class="require">*</span></label>
                                <input id="tudong" class="form-control required" data-mask="fdecimal" name="tudong" type="text" value="6">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>Nhận đến dòng thứ</b><span class="require">*</span></label>
                                <input id="dendong" class="form-control required" data-mask="fdecimal" name="dendong" type="text" value="100">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label"><b>File dữ liệu</b><span class="require">*</span></label>
                                <input id="fexcel" name="fexcel" type="file"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="districtip" id="districtip" value="{{$inputs['district']}}">
                    <input type="hidden" name="namip" id="namip" value="{{$inputs['nam']}}">
                </div>
                {!! Form::close() !!}
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn blue" id="submitformip" onclick="ClickIpCreate()">Đồng ý</button>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!--Modal Delete-->
    <div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
        {!! Form::open(['url'=>'thongtingiagocvlxd/delete','id' => 'frm_delete'])!!}
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
        {!! Form::open(['url'=>'thongtingiagocvlxd/hoanthanh','id' => 'frm_hoanthanh'])!!}
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
        {!! Form::open(['url'=>'thongtingiagocvlxd/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
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
        {!! Form::open(['url'=>'thongtingiagocvlxd/congbo','id' => 'frm_congbo'])!!}
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
    @include('includes.script.create-header-scripts')

@stop