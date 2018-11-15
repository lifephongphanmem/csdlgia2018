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
            $('#loainha').val('');
            $('#dongia').val('0');
            $('#hesodc').val('');
            $('#thoigian').val('');
        }
        function createmhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtingiathuemuanhaxhct/store',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    loainha: $('#loainha').val(),
                    dongia: $('#dongia').val(),
                    hesodc: $('#hesodc').val(),
                    thoigian: $('#thoigian').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin !!!", "Thành công!");
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
                url: '/thongtingiathuemuanhaxhct/show',
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
                        toastr.error("Không thể chỉnh sửa thông tin mặt hàng!", "Lỗi!");
                }
            })
        }
        function updatemhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtingiathuemuanhaxhct/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#idedit').val(),
                    loainha: $('#loainhaedit').val(),
                    dongia: $('#dongiaedit').val(),
                    hesodc: $('#hesodcedit').val(),
                    thoigian: $('#thoigianedit').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin!!!", "Thành công!");
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
                url: '/thongtingiathuemuanhaxhct/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin!!!", "Thành công!");
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
        Thông tin hồ sơ giá thuê mua nhà xã hội<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtingiathuemuanhaxh/'. $model->id, 'class'=>'horizontal-form','id'=>'update_thongtingiathuemuanhaxh']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Tên nhóm:<span class="require">*</span></label>
                                    <label style="color: blue">{{$modeldm->tennhom}}</label>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Thông tin quyết định<span class="require">*</span></label>
                                    {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required','autofocus'))!!}
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
                                    <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin</button>
                                    &nbsp;
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <div class="row" id="dsmhbog">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Loại nhà</th>
                                        <th style="text-align: center">Thời gian</th>
                                        <th style="text-align: center" width="10%">Giá dịch vụ</th>
                                        <th style="text-align: center" width="10%">Hệ số điều chỉnh</th>
                                        <th width="15%" style="text-align: center">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($modelct as $key=>$ct)
                                        <tr>
                                            <td style="text-align: center">{{$key +1}}</td>
                                            <td class="active">{{$ct->loainha}}</td>
                                            <td class="active">{{$ct->thoigian}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->dongia)}}</td>
                                            <td class="active">{{$ct->hesodc}}</td>
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
                <a href="{{url('thongtingiathuemuanhaxh')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_thongtingiathuemuanhaxh").validate({
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
                    <h4 class="modal-title">Thêm mới thông tin giá thuê mua nhà xã hội</h4>
                </div>
                <div class="modal-body" id="ttmhbog">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Loại nhà</b><span class="require">*</span></label>
                                <div><input type="text" id="loainha" name="loainha" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Thời gian</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="thoigian" name="thoigian" class="form-control"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="dongia" name="dongia" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Hệ số</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="hesodc" name="hesodc" class="form-control"></div>
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
                    <h4 class="modal-title">Chỉnh sửa thông tin giá thuê mua nhà xã hội</h4>
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