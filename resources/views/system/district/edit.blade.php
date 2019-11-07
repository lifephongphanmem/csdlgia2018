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
        Thông tin đơn vị quản lý<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'district/'. $model->id, 'class'=>'horizontal-form','id'=>'update_district']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã quan hệ ngân sách</label>
                                        {!!Form::text('mahuyen', null, array('id' => 'mahuyen','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên đơn vị<span class="require">*</span></label>
                                        {!!Form::text('tendv', null, array('id' => 'tendv','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ trụ sở</label>
                                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control'))!!}
                                    </div>
                                </div>

                            </div>
                            <!--div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa danh quản lý<span class="require">*</span></label>
                                        {!! Form::select('district', getDiaDanhH(),null, array('id'=>'district','class'=>'form-control'))!!}
                                    </div>
                                </div>
                            </div-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên đơn vị chủ quản hiển thị<span class="require">*</span></label>
                                        {!!Form::text('tendvcqhienthi', null , array('id' => 'tendvcqhienthi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên đơn vị hiển thị<span class="require">*</span></label>
                                        {!!Form::text('tendvhienthi', null , array('id' => 'tendvhienthi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Thông tin liên hệ </label>
                                        <textarea id="ttlienhe" class="form-control" name="ttlienhe" cols="10" rows="5"
                                                  placeholder="Thông tin, số điện thoại liên lạc với các bộ phận">{{$model->ttlienhe}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email quản lý<span class="require">*</span></label>
                                        {!!Form::text('emailql', null, array('id' => 'emailql','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email quản trị<span class="require">*</span></label>
                                        {!!Form::text('emailqt', null, array('id' => 'emailqt','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('district')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_district").validate({
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
            $('input[name="mahuyen"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/ajax/checkmaqhns',
                    data: {
                        _token: CSRF_TOKEN,
                        maqhns:$(this).val(),
                        pl:'district'
                    },
                    dataType: 'JSON',
                    success: function (data) {

                        if(data.status != 'success') {
                            toastr.error("Bạn cần nhập lại mã quan hệ ngân sách", "Mã quan hệ ngân sách nhập vào đã tồn tại!!!");
                            $('input[name="mahuyen"]').val('');
                            $('input[name="mahuyen"]').focus();
                        }else{
                            toastr.success("Mã quan hệ ngân sách sử dụng được!", "Thành công!");
                        }
                    }

                });
            });
        }(jQuery));
    </script>
    @include('includes.script.create-header-scripts')
@stop