@extends('main')

@section('custom-style')
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>

@stop

@section('content')
    <h3 class="page-title">
        Thông tin danh mục tài sản công<small></small>
    </h3>
    <hr>
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
                    {!! Form::open(['url'=>'giataisancongdm', 'id' => 'create_ttgiadatdiaban', 'class'=>'horizontal-form','files'=>true]) !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã tài sản công<span class="require">*</span></label>
                                        {!!Form::text('mataisan',null, array('id' => 'mataisan','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên tài sản công<span class="require">*</span></label>
                                        {!!Form::text('tentaisan',null, array('id' => 'tentaisan','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                                        {!!Form::text('dvt',null, array('id' => 'dvt','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Diện tích<span class="require">*</span></label>
                                        {!!Form::text('dientich',null, array('id' => 'dientich','data-mask'=>'fdecimal','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giá trị<span class="require">*</span></label>
                                        {!!Form::text('giatri',null, array('id' => 'giatri','data-mask'=>'fdecimal','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Mô tả</label>
                                        {!!Form::text('mota',null, array('id' => 'mota','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>

            </div>
            <div style="text-align: center">
                <a href="{{url('giataisancongdm')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_ttgiadatdiaban").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop