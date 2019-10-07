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
        {{$modeldm->mota}}<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'ttpvctqlnn', 'files'=>true,'class'=>'horizontal-form','id'=>'create_ttttqd']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="control-label">Phân loại văn bản<span class="require">*</span></label>--}}
                                        {{--{!! Form::select(--}}
                                        {{--'phanloai',--}}
                                        {{--array(--}}
                                        {{--'gia'=>'Văn bản về giá',--}}
                                        {{--'philephi'=>'Văn bản phí, lệ phí')--}}
                                        {{--,null,--}}
                                        {{--array('id' => 'phanloai', 'class' => 'form-control'))--}}
                                        {{--!!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="control-label">Loại văn bản<span class="require">*</span></label>--}}
                                        {{--{!! Form::select('loaivb',getLoaiVbQlNn(),null, ['id' => 'loaivb','class' => 'form-control required']) !!}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {!!Form::text('phanloai',$inputs['phanloai'], array('id' => 'phanloai','class' => 'form-control'))!!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ký hiệu văn bản<span class="require">*</span></label>
                                        {!!Form::text('kyhieuvb',null, array('id' => 'kyhieuvb','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị ban hành<span class="require">*</span></label>
                                        {!!Form::text('dvbanhanh',null, array('id' => 'dvbanhanh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày ban hành</label>
                                        {!!Form::text('ngaybanhanh',null, array('id' => 'ngaybanhanh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Ngày áp dụng</label>
                                        {!!Form::text('ngayapdung',null, array('id' => 'ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tiêu đề</label>
                                        {!!Form::text('tieude',null, array('id' => 'tieude','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                        <input name="ipf1" id="ipf1" type="file">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 2</label>
                                        <input name="ipf2" id="ipf2" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 3</label>
                                        <input name="ipf3" id="ipf3" type="file">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 4</label>
                                        <input name="ipf4" id="ipf4" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm 5</label>
                                        <input name="ipf5" id="ipf5" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- END FORM-->
                </div>
            </div>
            <div class="col-md-12" style="text-align: center">
                <a href="{{url('ttpvctqlnn?&phanloai='.$inputs['phanloai'])}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn default"> Hủy</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Thêm mới</button>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
        {!! Form::close() !!}
    </div>
    <script type="text/javascript">
        function validateForm(){
            var validator = $("#create_ttttqd").validate({
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