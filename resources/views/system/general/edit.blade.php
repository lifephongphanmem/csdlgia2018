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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'general/'. $model->id, 'class'=>'horizontal-form','id'=>'update_general']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Cấp bản quyền cho đơn vị<span class="require">*</span></label>
                                    {!!Form::text('tendonvi', null , array('id' => 'tendonvi','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mã quan hệ ngân sách<span class="require">*</span></label>
                                    {!!Form::text('maqhns', null , array('id' => 'maqhns','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa chỉ<span class="require">*</span></label>
                                    {!!Form::text('diachi', null , array('id' => 'diachi','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thông tin liên hệ<span class="require">*</span></label>
                                    {!!Form::text('tel', null , array('id' => 'tel','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thủ trưởng<span class="require">*</span></label>
                                    {!!Form::text('thutruong', null , array('id' => 'thutruong','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Kế toán<span class="require">*</span></label>
                                    {!!Form::text('ketoan', null , array('id' => 'ketoan','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Người lập biểu<span class="require">*</span></label>
                                    {!!Form::text('nguoilapbieu', null , array('id' => 'nguoilapbieu','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa danh<span class="require">*</span></label>
                                    {!!Form::text('diadanh', null , array('id' => 'diadanh','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Thông tin hợp đồng</label>
                                        <textarea id="thongtinhd" class="form-control" name="thongtinhd" cols="10" rows="5"
                                                  placeholder="Thông tin, số điện thoại liên lạc với các bộ phận">{{$model->thongtinhd}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn trả hồ sơ lưu trú<span class="require">*</span></label>
                                    {!!Form::text('thoihanlt', null, array('id' => 'thoihanlt','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn trả hồ sơ vận tải<span class="require">*</span></label>
                                    {!!Form::text('thoihanvt', null, array('id' => 'thoihanvt','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn trả hồ sơ giá sữa<span class="require">*</span></label>
                                    {!!Form::text('thoihangs', null, array('id' => 'thoihangs','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn trả hồ sơ thức ăn chăn nuôi<span class="require">*</span></label>
                                    {!!Form::text('thoihantacn', null, array('id' => 'thoihantacn','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                    </div>

                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('general')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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
    @include('includes.script.create-header-scripts')
@stop