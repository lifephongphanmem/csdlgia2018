@extends('main')

@section('custom-style')
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->
    @include('includes.crumbs.script_inputdate')
@stop

@section('content')
    <h3 class="page-title">
       Giá giao dịch bất động sản<small> chỉnh sửa</small>
    </h3>
    <hr>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtinmuataisan/'. $model->id, 'class'=>'horizontal-form','id'=>'update_ttttqd','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị chủ quản<span class="require">*</span></label>
                                        {!!Form::text('dvcq',$modeldvcq->tendv, array('id' => 'dvcq','class' => 'form-control required','disabled'))!!}
                                        <input type="hidden" name="mahuyen" id="mahuyen" value="{{$model->mahuyen}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị<span class="require">*</span></label>
                                        {!!Form::text('dv',$modeldv->tendv, array('id' => 'dv','class' => 'form-control required','disabled'))!!}
                                        <input type="hidden" name="maxa" id="maxa" value="{{$model->maxa}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nhóm hàng hóa<span class="require">*</span></label>
                                        <select class="form-control" id="manhom" name="manhom">
                                            @foreach($modelnhomhh as $nhomhh)
                                                <option value="{{$nhomhh->manhom}}" {{$nhomhh->manhom == $model->manhom ? 'selected' : ''}}>{{$nhomhh->tennhom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số quyết định<span class="require">*</span></label>
                                        {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Thông tin quyết định<span class="require">*</span></label>
                                        {!!Form::text('thongtinqd',null, array('id' => 'thongtinqd','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày quyết định</label>
                                        {!!Form::text('ngayqd',date('d/m/Y',  strtotime($model->ngayqd)), array('id' => 'ngayqd','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên nhà thầu</label>
                                        {!!Form::text('tennhathau',null, array('id' => 'tennhathau','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú<span class="require">*</span></label>
                                        {!!Form::text('ghichu',null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 1</label>
                                        @if(isset($model->ipf1))
                                            <a href="{{url('/data/muataisan/'.$model->ipf1)}}" target="_blank">{{$model->ipt1}}</a>
                                        @endif
                                        <input name="ipf1" id="ipf1" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- END FORM-->
                </div>
            </div>
            <div class="col-md-12" style="text-align: center">
                <a href="{{url('thongtinmuataisan?&mahuyen='.$model->mahuyen.'&maxa='.$model->maxa)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhập</button>
            </div>
            <!-- END VALIDATION STATES-->
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_ttttqd").validate({
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
        jQuery(document).ready(function($) {
            $('input[name="khvb"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkkhvb',
                    data: {
                        _token: CSRF_TOKEN,
                        khvb:$(this).val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập lại ký hiệu văn bản", "Ký hiệu văn bản nhập vào đã tồn tại!!!");
                            $('input[name="khvb"]').val('');
                            $('input[name="khvb"]').focus();
                        }
                    }

                });
            })
        }(jQuery));
    </script>
@stop