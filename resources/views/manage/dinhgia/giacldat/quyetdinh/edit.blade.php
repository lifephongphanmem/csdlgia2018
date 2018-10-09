@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tin quyết định quy định giá đất<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'dmqdgiadat/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttphongban']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Số hiệu văn bản<span class="require">*</span></label>
                                            {!!Form::text('soquyetdinh', null, array('id' => 'soquyetdinh','class' => 'form-control text-muted'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Ngày ban hành<span class="require">*</span></label>
                                            {!!Form::text('ngayquyetdinh',date('d/m/Y',  strtotime($model->ngayquyetdinh)), array('id' => 'ngayquyetdinh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Tên loại văn bản</label>
                                            {!!Form::text('mota', null, array('id' => 'mota','class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Ghi chú</label>
                                            {!!Form::text('ghichu', null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('dmqdgiadat')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_ttphongban").validate({
                rules: {
                    ten :"required",
                    diachi :"required"
                },
                messages: {
                    ten: "Chưa nhập dữ liệu",
                    diachi: "Chưa nhập dữ liệu"
                }
            });
        }
    </script>
@stop