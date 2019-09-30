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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtugiadatdiaban/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttgiadatdiaban','files'=>true]) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Số quyết định<span class="require">*</span></label>
                                            {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ngày ban hành<span class="require">*</span></label>
                                            {!!Form::text('ngaybanhanh',date('d/m/Y',  strtotime($model->ngaybanhanh)), array('id' => 'ngaybanhanh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label">Ngày áp dụng<span class="require">*</span></label>
                                            {!!Form::text('ngayapdung',date('d/m/Y',  strtotime($model->ngayapdung)), array('id' => 'ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Ghi chú</label>
                                            <input type="text" class="form-control" name="ghichu" id="ghichu">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @if($model->ipt1 != '')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">File hiện tại </label>
                                            <a href="{{url('data/giadatdiaban/'.$model->ipf1)}}">{{$model->ipt1}}</a>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">File đính kèm </label>
                                            {!!Form::file('ipf1',null, array('id' => 'ipf1','class' => 'form-control required'))!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM-->
                        </div>
                </div>
            </div>
            <div style="text-align: center">
                <a href="{{url('thongtugiadatdiaban')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
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