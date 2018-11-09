@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--Date-->
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
    <!--End Date-->
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>


    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>

    <!--Date>
    <script type="text/javascript" src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>

    <End Date-->
    <!--Date new-->
    <!--script src="{{url('minhtran/jquery.min.js')}}"></script-->
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
    <!--End date new-->

    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        function clearForm(){
            $('#loairung').val('');
            $('#mucdo').val('');
            $('#dongiasd').val('');
            $('#dongiat50').val('');
            $('#dongiat1').val('');
            $('#dongiaxp').val('');
        }
        function createmhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giarungct/add',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    manhom: $('select[name="manhom"]').val(),
                    loairung: $('#loairung').val(),
                    mucdo: $('#mucdo').val(),
                    dongiasd: $('#dongiasd').val(),
                    dongiat50: $('#dongiat50').val(),
                    dongiat1: $('#dongiat1').val(),
                    dongiaxp: $('#dongiaxp').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin tính lệ phí trước bạ", "Thành công!");
                        $('#dsmhbog').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })

        }
        function editmhbog(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/giarungct/show',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#ttmhbogedit').replaceWith(data.message);
                        InputMask();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin loại rừng!", "Lỗi!");
                }
            })
        }
        function updatemhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giarungct/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#idedit').val(),
                    manhom: $('select[name="manhomedit"]').val(),
                    loairung: $('#loairungedit').val(),
                    mucdo: $('#mucdoedit').val(),
                    dongiasd: $('#dongiasdedit').val(),
                    dongiat50: $('#dongiat50edit').val(),
                    dongiat1: $('#dongiat1edit').val(),
                    dongiaxp: $('#dongiaxpedit').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin giá rừng", "Thành công!");
                        $('#dsmhbog').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-edit').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })

        }
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function delmhbog() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/giarungct/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin loại rừng!", "Thành công!");
                    $('#dsmhbog').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });

                    $('#modal-delete').modal("hide");

                    //}
                }
            })
        }
    </script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin hồ sơ giá rừng<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giarung/'. $model->id, 'class'=>'horizontal-form','id'=>'update_giarung']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />

                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Thông tin quyết định<span class="require">*</span></label>
                                    {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày áp dụng<span class="require">*</span></label>
                                    {!!Form::text('ngayapdung',date('d/m/Y',  strtotime($model->ngayapdung)), array('id' => 'ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    {!!Form::text('ghichu',null, array('id' => 'ghichu','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin rừng</button>
                                    &nbsp;
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">

                        <div class="row" id="dsmhbog">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Nhóm rừng</th>
                                        <th style="text-align: center">Loại rừng</th>
                                        <th style="text-align: center" width="10%">Mức độ</th>
                                        <th style="text-align: center" width="10%">Đơn giá <br>sử dụng</th>
                                        <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>50 năm</th>
                                        <th style="text-align: center" width="10%">Đơn giá <br>thuê <br>1 năm</th>
                                        <th style="text-align: center" width="10%">Đơn giá<br> xử phạt <br>vi phạm<br> về rừng</th>
                                        <th width="15%" style="text-align: center">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($modelct as $key=>$ct)
                                        <tr>
                                            <td style="text-align: center">{{$key +1}}</td>
                                            <td>{{$ct->tennhom}}</td>
                                            <td class="active">{{$ct->loairung}}</td>
                                            <td>{{$ct->mucdo}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->dongiasd)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->dongiat50)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->dongiat1)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->dongiaxp)}}</td>
                                            <td>
                                                <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog({{$ct->id}})"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$ct->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('giarung')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){
            var validator = $("#update_giarung").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <!--Model Create-->
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới thông tin giá rừng</h4>
                </div>
                <div class="modal-body" id="ttmhbog">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Nhóm rừng</b><span class="require">*</span></label>
                                <div>
                                    <select name="manhom" id="manhom" class="form-control">
                                        @foreach($modeldm as $ttdm)
                                            <option value="{{$ttdm->manhom}}">{{$ttdm->tennhom}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Loại rừng</b><span class="require">*</span></label>
                                <div><input type="text" id="loairung" name="loairung" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Mức độ</b><span class="require">*</span></label>
                                <div><input type="text" id="mucdo" name="mucdo" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá sử dụng rừng</b><span class="require">*</span></label>
                                <div><input type="text"  style="text-align: right; font-weight: bold" id="dongiasd" name="dongiasd" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá cho thuê rừng 50 năm</b><span class="require">*</span></label>
                                <div><input type="text"  style="text-align: right; font-weight: bold" id="dongiat50" name="dongiat50" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá cho thuê rừng 1 năm</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right; font-weight: bold" id="dongiat1" name="dongiat1" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá xử phạt vị phạm về rừng</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right ; font-weight: bold" id="dongiaxp" name="dongiaxp" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="createmhbog()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model Eđit-->
    <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin lệ phí trước bạ</h4>
                </div>
                <div class="modal-body" id="ttmhbogedit">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatemhbog()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model Delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa thông tin?</h4>
                </div>
                <input type="hidden" id="iddelete" name="iddelete">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="delmhbog()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
    @include('includes.script.inputmask-ajax-scripts')
@stop