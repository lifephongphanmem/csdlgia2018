@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('vendors/jquery-validate/jquery.validate.min.js')}}"></script>
@stop

@section('content')


    <h3 class="page-title">
        Quản lý thông tin tài khoản
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
                    {!! Form::open(['url'=>'/user_setting', 'id' => 'form-changepass', 'class'=>'form-horizontal form-validate']) !!}
                        <div class="form-body">

                            <div class="form-group">
                                <label for="current-password" class="col-sm-5 control-label">Mật khẩu hiện tại <span class="require">*</span></label>
                                <div class="col-sm-4">
                                    {!!Form::password('current-password', array('id' => 'current-password','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="current-password" class="col-sm-5 control-label">Email xác thực<span class="require">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="emailxt" id="emailxt" value="{{session('admin')->email}}">
                                </div>
                            </div>
                            <!--div class="form-group">
                                <label for="newpassword" class="col-sm-5 control-label">Câu hỏi bí mật <span class="require">*</span></label>
                                <div class="col-sm-4">
                                    {!! Form::select(
                                    'question',
                                    array(
                                    '1' => 'Con vật bạn yêu thích',
                                    '2' => 'Số nhà của bạn',
                                    '3' => 'Món ăn bạn ghét nhất',
                                    '4' => 'Màu bạn thích nhất',
                                    ),null,
                                    array( 'class' => 'form-control'))
                                    !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newpassword2" class="col-sm-5 control-label">Câu trả lời<span class="require">*</span></label>
                                <div class="col-sm-4">
                                    {!!Form::password('answer', array('id' => 'answer','class' => 'form-control required'))!!}
                                </div>
                            </div-->

                        </div>


                    <!-- END FORM-->
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" onclick="validatePassword();" class="btn btn-primary">Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validatePassword(){

            var validator = $("#form-changepass").validate({
                rules: {
                    answer :"required",

                },
                messages: {
                    answer :" Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="current-password"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkpass',
                    data: {
                        _token: CSRF_TOKEN,
                        pass:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập lại mật khẩu", "Mật khẩu nhập vào không đúng");
                            $('input[name="current-password"]').val('');
                            $('input[name="current-password"]').focus();
                        }
                    }

                });
            })
        }(jQuery));
    </script>
@stop