@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')


    <h3 class="page-title">
        Thông tin danh mục các loại đất<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'giadatphanloaidm/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttgiadatdiaban','files'=>true]) !!}
                        <div class="form-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Mã vị trí<span class="require">*</span></label>
                                            {!!Form::text('mavitri',null, array('id' => 'mavitri','class' => 'form-control required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Tên vị trí<span class="require">*</span></label>
                                            {!!Form::text('tenvitri',null, array('id' => 'tenvitri','class' => 'form-control required'))!!}
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Loại đất<span class="require">*</span></label>
                                            {!!Form::text('loaidat',null, array('id' => 'loaidat','class' => 'form-control required'))!!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Mô tả</label>
                                            {!!Form::text('mota',null, array('id' => 'mota','class' => 'form-control required'))!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM-->
                        </div>
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('giadatphanloaidm')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    @include('includes.script.create-header-scripts')
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#thongtugiadatdiaban").validate({
                rules: {
                    ten :"required",
                },
                messages: {
                    ten: "Chưa nhập dữ liệu",
                }
            });
        }
    </script>
@stop