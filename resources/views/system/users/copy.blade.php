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
        Thông tin tài khoản<small> sao chép</small>
    </h3>
    <!-- END PAGE HEADER-->
    <div class="note note-success">
        <h4 class="block">Sao chép tài khoản</h4>
        <p>
            Chức năng này dùng để tạo mới một tài khoản với các thông tin tương ứng với tài khoản gốc! Dùng trong các trường hợp muốn tạo tài khoản thứ 2 cùng xử lý các chức năng tương đương tài khoản gốc</a>
        </p>
        <p>Tài khoản đang sao chép: Tên tài khoản: {{$model->name}} - Level : {{getLvUsers($model->level)}}</p>
    </div>
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'users', 'id' => 'create_tttaikhoan', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài khoản<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="name" id="name" autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Trạng thái</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Kích hoạt" selected>Kích hoạt</option>
                                            <option value="Vô hiệu">Vô hiệu</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tài khoản truy cập<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="username" id="username">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mật khẩu<span class="require">*</span></label>
                                        <input type="text" class="form-control required"  name="password" id="password">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>
                    <input type="hidden" name="level" id="level" value="{{$model->level}}">
                    <input type="hidden" name="maxa" id="maxa" value="{{$model->maxa}}">
                    <input type="hidden" name="mahuyen" id="mahuyen" value="{{$model->mahuyen}}">
                    <input type="hidden" name="town" id="town" value="{{$model->town}}">
                    <input type="hidden" name="district" id="district" value="{{$model->district}}">
                    <input type="hidden" name="sadmin" id="sadmin" value="{{$model->sadmin}}">
                    <input type="hidden" name="permission" id="permission" value="{{$model->permission}}">


                    <!-- END FORM-->
                </div>

            </div>
            <div style="text-align: center">
                <a href="{{url('users')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_tttaikhoan").validate({
                rules: {
                    name :"required",
                    mahuyen :"required",
                    username :"required",
                    password :"required"

                },
                messages: {
                    name :"Chưa nhập dữ liệu",
                    mahuyen :"Chưa nhập dữ liệu",
                    username :"Chưa nhập dữ liệu",
                    password :"Chưa nhập dữ liệu"
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
    </script>
@stop