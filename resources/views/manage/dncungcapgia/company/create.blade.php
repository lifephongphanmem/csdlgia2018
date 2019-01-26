@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin doanh nghiệp cung cấp giá<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'dsdncungcapgia', 'id' => 'create_town', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <h4>Thông tin doanh nghiệp</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Đơn vị nhận cung cấp giá: {{$modeldv->tendv}}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tên doanh nghiệp</label>
                                        <input class="form-control required" type="text" placeholder="Tên doanh nghiệp" name="tendn" id="tendn" required autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã số thuế</label>
                                        <input class="form-control required" type="text" placeholder="Mã số thuế" name="maxa" id="maxa" required>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Địa chỉ</label>
                                        <input class="form-control placeholder-no-fix" type="text" placeholder="Địa chỉ doanh nghiệp" name="diachi" id="diachi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                            <input class="form-control placeholder-no-fix" type="tel" placeholder="Số điện thoại trụ sở" name="tel" id="tel">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Số fax</label>
                                        <input class="form-control placeholder-no-fix" type="tel" placeholder="Số fax trụ sở" name="fax" id="fax">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control required" type="email" placeholder="Email" name="email" id="email">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nơi đăng ký nộp thuế</label>
                                            <input class="form-control required" type="text" placeholder="Nơi đăng ký nộp thuế" name="noidknopthue" id="noidknopthue">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control required" type="text" placeholder="username" name="username" id="username">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control required" type="text" placeholder="Mật khẩu" name="password" id="password">
                                    </div>
                                </div>
                                <input type="hidden" id="level" name="level" value="CCG">
                                <input type="hidden" id="mahuyen" name="mahuyen" value="{{$inputs['mahuyen']}}">
                                <!--/span-->
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('dsdncungcapgia')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
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
                url: '/ajax/registercheckuser',
                data: {
                    _token: CSRF_TOKEN,
                    user:$(this).val()
                },
                success: function (respond) {
                    if(respond != 'ok'){
                        toastr.error("Bạn cần nhập lại tài khoản đăng ký", "Tài khoản đăng ký nhập vào đã tồn tại hoặc đã được đăng ký!!!");
                        $('input[name="username"]').val('');
                        $('#username').focus();
                    }else
                        toastr.success("Tài khoản đăng ký sử dụng được!", "Thành công!");
                }

            });
        });
        $('input[name="maxa"]').change(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/ajax/registercheckmasothue',
                data: {
                    _token: CSRF_TOKEN,
                    maxa:$(this).val(),
                    level: $('input[name="level"]').val()
                },
                success: function (respond) {
                    //alert(respond);
                    if(respond != 'ok'){
                        toastr.error("Bạn cần nhập lại mã số thuế", "Mã số thuế nhập vào đã tồn tại hoặc đã được đăng ký!!!");
                        $('input[name="maxa"]').val('');
                        $('input[name="maxa"]').focus();
                    }else
                        toastr.success("Mã số thuế sử dụng được!", "Thành công!");
                }
            });
        });
    </script>
    @include('includes.script.create-header-scripts')
@stop