@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin tài khoản<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'users/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tttaikhoan']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài khoản<span class="require">*</span></label>
                                        {!!Form::text('name', null, array('id' => 'name','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Trạng thái</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Kích hoạt" {{($model->status == 'Kích hoat' ? 'selected' : '')}}>Kích hoạt</option>
                                            <option value="Vô hiệu" {{($model->status == 'Vô hiệu' ? 'selected' : '')}}>Vô hiệu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tài khoản truy cập<span class="require">*</span></label>
                                        {!!Form::text('username', null, array('id' => 'username','class' => 'form-control required', 'readonly'=>'readonly'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mật khẩu mới<span class="require">*</span></label>
                                        {!!Form::text('newpass', null, array('id' => 'newpass','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        {!!Form::text('email', null, array('id' => 'email','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>

                        </div>

                    <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('users?&phanloai='.$model->level)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tttaikhoan").validate({
                rules: {
                    name :"required",
                },
                messages: {
                    name :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="username"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkuser',
                    data: {
                        _token: CSRF_TOKEN,
                        user:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập tài khoản khác", "Tài khoản nhập vào đã tồn tại!!!");
                            $('input[name="username"]').val('');
                            $('input[name="username"]').focus();
                        }
                    }

                });
            })
        }(jQuery));
    </script>
@stop