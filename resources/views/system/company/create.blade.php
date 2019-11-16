@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
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
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

@stop

@section('content')
    <h3 class="page-title">
        Thông tin doanh nghiệp cung cấp dịch vụ<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'company', 'id' => 'create_town', 'class'=>'horizontal-form', 'files'=>true]) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <input type="hidden" name="mahs" id="mahs" value="{{$inputs['mahs']}}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên doanh nghiệp<span class="require">*</span></label>
                                        {!!Form::text('tendn', null, array('id' => 'tendn','class' => 'form-control required','autofocus'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('tendn') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã số thuế</label>
                                        {!!Form::text('maxa', null, array('id' => 'maxa','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('maxa') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại trụ sở chính</label>
                                        {!!Form::text('tel', null, array('id' => 'tel','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số fax trụ sở chính</label>
                                        {!!Form::text('fax', null, array('id' => 'fax','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ trụ sở</label>
                                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('diachi') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        {!!Form::text('email', null, array('id' => 'email','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('email') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nơi đăng ký nộp thuế</label>
                                        {!!Form::text('noidknopthue', null, array('id' => 'noidknopthue','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('noidknopthue') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giấy đăng ký kinh doanh</label>
                                        {!!Form::text('giayphepkd', null, array('id' => 'giayphepkd','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid" >{{ $errors->first('giayphepkd') }}</em>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Chức danh</label>
                                        {!!Form::text('chucdanh', null, array('id' => 'chucdanh','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('chucdanh') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Họ tên người ký</label>
                                        {!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('nguoiky') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa danh</label>
                                        {!!Form::text('diadanh', null, array('id' => 'diadanh','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('diadanh') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giấy đăng ký kinh doanh</label>
                                        <input name="tailieu" id="tailieu" type="file">
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('tailieu') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                                        {!!Form::text('username', null, array('id' => 'username','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('username') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        {!!Form::text('password', null, array('id' => 'password','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('password') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin lĩnh vực kinh doanh</button>
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="dsts">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                                        <thead>
                                        <tr>
                                            <th width="2%" style="text-align: center">STT</th>
                                            <th style="text-align: center">Mã ngành</th>
                                            <th style="text-align: center">Tên ngành</th>
                                            <th style="text-align: center">Mã nghề</th>
                                            <th style="text-align: center">Tên nghề</th>
                                            <th style="text-align: center">Đơn vị quản lý</th>
                                            <th style="text-align: center">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody id="ttts">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('company')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <!--Model Create-->
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới lĩnh vực kinh doanh</h4>
                </div>
                <div class="modal-body" id="ttmhbog">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ngành</label>
                                <select class="form-control" name="add_manganh" id="add_manganh">
                                    <option>-Chọn ngành kinh doanh--</option>
                                    @foreach($nganhs as $nganh)
                                    <option value="{{$nganh->manganh}}">{{$nganh->tennganh}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Nghề</label>
                                <select class="form-control" name="add_manghe" id="add_manghe">
                                    <option>-Chọn ngành kinh doanh--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Đơn vị nhận hồ sơ</label>
                                <select class="form-control" name="add_mahuyen" id="add_mahuyen">
                                    <option>-Chọn đơn vị nhận hồ sơ--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="capnhatts()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model edit-->
    <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa lĩnh vực kinh doanh</h4>
                </div>
                <div class="modal-body" id="edit_lvcc">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatett()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
    <!--Modal Wide Width-->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa?</h4>
                </div>
                <input type="hidden" id="iddelete" name="iddelete">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="deleteRow()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_town").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <script>
        $('input[name="username"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/ajax/checkusername',
                data: {
                    _token: CSRF_TOKEN,
                    username:$(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại username", "Username nhập vào đã tồn tại!!!");
                        $('input[name="username"]').val('');
                        $('input[name="username"]').focus();
                    }else
                        toastr.success("Username sử dụng được!", "Thành công!");
                }

            });
        });
        $('input[name="maxa"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/ajax/checkmaqhns',
                data: {
                    _token: CSRF_TOKEN,
                    maqhns:$(this).val(),
                    pl:'town'
                },
                dataType: 'JSON',
                success: function (data) {

                    if(data.status != 'success') {
                        toastr.error("Bạn cần nhập lại mã quan hệ ngân sách", "Mã quan hệ ngân sách nhập vào đã tồn tại!!!");
                        $('input[name="maxa"]').val('');
                        $('input[name="maxa"]').focus();
                    }else{
                        toastr.success("Mã quan hệ ngân sách sử dụng được!", "Thành công!");
                    }
                }

            });
        });

        $('#add_manganh').change(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/companylvcc/getmanghe',
                data: {
                    _token: CSRF_TOKEN,
                    manganh: $(this).val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#add_manghe').replaceWith(data.message);
                        $('#add_mahuyen').val('');
                        getDvQl();
                    }

                }

            });
        });
        function getDvQl(){
            $('#add_manghe').change(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/companylvcc/getdvql',
                    data: {
                        _token: CSRF_TOKEN,
                        manghe: $(this).val(),
                        manganh: $('#add_manganh').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success')
                            $('#add_mahuyen').replaceWith(data.message);
                    }

                });
            });
        }
        function capnhatts(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/companylvcc/store',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    manganh: $('#add_manganh').val(),
                    manghe: $('#add_manghe').val(),
                    mahuyen: $('#add_mahuyen').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Bổ xung thông tin thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");
                    }else {
                        toastr.error('Trùng lặp ngành nghề', "Lỗi!!!");
                        $('#modal-create').modal("hide");
                    }
                }
            })
        }
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function deleteRow() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/companylvcc/delete',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    mahs: $('#mahs').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function () {
                        TableManaged.init();
                    });

                    $('#modal-delete').modal("hide");

                    //}
                }
            })
        }

    </script>
    @include('includes.script.create-header-scripts')
    @include('system.company.include.js-modal')
@stop