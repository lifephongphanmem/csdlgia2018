@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin cơ sở kinh doanh<small> thêm mới</small>
        <p><h5 style="color: blue">{{$modeldn->tendn}}&nbsp;- Mã số thuế: {{$modeldn->maxa}}</h5></p>
    </h3>
    <!-- END PAGE HEADER-->
    <hr>
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <!--div class="portlet-title">
                </div-->
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'thongtincskd', 'id' => 'create_thongtincskddvlt', 'class'=>'horizontal-form','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên cơ sở kinh doanh<span class="require">*</span></label>
                                        <input type="text" id="tencskd" name="tencskd" class="form-control required" autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Loại hạng<span class="require">*</span></label>
                                        <select id="loaihang" name="loaihang" class="form-control">
                                            <option value="1">1 sao</option>
                                            <option value="2">2 sao</option>
                                            <option value="3" selected>3 sao</option>
                                            <option value="4">4 sao</option>
                                            <option value="5">5 sao</option>
                                            <option value="K">Khác (Nhà nghỉ)</option>
                                            <option value="CXD">Chưa xác định (Khách sạn chưa xác định sao)</option>
                                        </select>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoai<span class="require">*</span></label>
                                        <input type="text" id="telkd" name="telkd" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ</label>
                                        <input type="text" id="diachikd" name="diachikd" class="form-control">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Trang chủ<span class="require">*</span></label>
                                        <input type="text" id="link" name="link" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ảnh đại diện<span class="require">*</span></label>
                                        {!!Form::file('avatar',array('id'=>'avatar','class' => 'passvalid','accept'=>'image/*'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị nhận hồ sơ</label>
                                        <select name="mahuyen" id="mahuyen" class="form-control">
                                            @foreach($modeldv as $dv)
                                                <option value="{{$dv->maxa}}">{{$dv->tendv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('thongtincskddvlt')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_thongtincskddvlt").validate({
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
        jQuery(function($){
            $('select[name="district"]').change(function(){

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/ajax/getTown',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        district: $(this).val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success')
                            $('select[name="town"]').replaceWith(data.message);
                    }
                });
            });
        });
    </script>
@stop