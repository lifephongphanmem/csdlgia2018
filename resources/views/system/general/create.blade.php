@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin đơn vị bản quyền<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'general', 'id' => 'create_general', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Cấp bản quyền cho đơn vị<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="tendonvi" id="tendonvi" autofocus/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã quan hệ ngân sách<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="maqhns" id="maqhns">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="diachi" id="diachi"/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thông tin liên hệ<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="tel" id="tel">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thủ trưởng<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="thutruong" id="thutruong"/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Kế toán<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="ketoan" id="ketoan">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Người lập biểu<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="nguoilapbieu" id="nguoilapbieu"/>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa danh<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="diadanh" id="diadanh"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Thông tin hợp đồng</label>
                                        <textarea id="thongtinhd" class="form-control" name="thongtinhd" cols="10" rows="5"
                                                  placeholder="Thông tin, số điện thoại liên lạc với các bộ phận"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn trả hồ sơ lưu trú<span class="require">*</span></label>
                                        {!!Form::text('thoihanlt', '0', array('id' => 'thoihanlt','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn trả hồ sơ vận tải<span class="require">*</span></label>
                                        {!!Form::text('thoihanvt', '0', array('id' => 'thoihanvt','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn trả hồ sơ giá sữa<span class="require">*</span></label>
                                        {!!Form::text('thoihangs', '0', array('id' => 'thoihangs','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Thời hạn trả hồ sơ thức ăn chăn nuôi<span class="require">*</span></label>
                                        {!!Form::text('thoihantacn', '0', array('id' => 'thoihantacn','class' => 'form-control','data-mask'=>'fdecimal','style'=>'text-align: right'))!!}
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
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_general").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    @include('includes.script.create-header-scripts')
@stop