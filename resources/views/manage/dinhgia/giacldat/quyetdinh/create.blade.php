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
        Thông tin quyết định quy định giá đất<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'dmqdgiadat', 'id' => 'create_ttphong_ban', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />

                        <div class="form-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số hiệu văn bản<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="soquyetdinh" id="soquyetdinh" autofocus>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày ban hành<span class="require">*</span></label>
                                        {!!Form::text('ngayquyetdinh',null, array('id' => 'ngayquyetdinh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Tên loại văn bản</label>
                                        {!!Form::text('mota',null, array('id' => 'motâ','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú</label>
                                        <input type="text" class="form-control" name="ghichu" id="ghichu">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>


                    <!-- END FORM-->
                </div>

            </div>
            <div style="text-align: center">
                <a href="{{url('dmqdgiadat')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_ttphong_ban").validate({
                rules: {
                    level :"required",
                    plttqd :"required",
                    tenloaivanban :"required"
                },
                messages: {
                    level :"Chưa nhập dữ liệu",
                    plttqd :"Chưa nhập dữ liệu",
                    tenloaivanban :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop