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
        Văn bản quản lý nhà nước về giá<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtingiabantaisan/'. $model->id, 'files'=>true,'class'=>'horizontal-form','id'=>'update_tlts']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tổ chức đấu giá<span class="require">*</span></label>
                                    <p style="color: blue;font-weight: bold">{{$modeldv->tendv}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Hợp đồng số<span class="require">*</span></label>
                                    {!!Form::text('sohd',null, array('id' => 'sohd','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày hợp đồng<span class="require">*</span></label>
                                    {!!Form::text('ngayhd',date('d/m/Y',  strtotime($model->ngayhd)), array('id' => 'ngayhd','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tổ chức có tài sản</label>
                                    {!!Form::text('benban',null, array('id' => 'benban','class' => 'form-control required'))!!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Tên tài sản</label>
                                    {!!Form::text('tents',null, array('id' => 'tents','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Thông số kỹ thuật<span class="require">*</span></label>
                                    {!!Form::text('thongsokt',null, array('id' => 'thongsokt','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Giá khởi điểm<span class="require">*</span></label>
                                    <input type="text" name="giakhoidiem" id="giakhoidiem" class="form-control required"  data-mask="fdecimal" style="text-align: right;font-weight: bold" value="{{$model->giakhoidiem}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Giá bán<span class="require">*</span></label>
                                    <input type="text" name="giaban" id="giaban" class="form-control required"  data-mask="fdecimal" style="text-align: right;font-weight: bold" value="{{$model->giaban}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    {!!Form::text('ghichu',null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 1</label>
                                    @if(isset($model->ipf1))
                                        <a href="{{url('/data/thanhlytaisan/'.$model->ipf1)}}" target="_blank">{{$model->ipt1}}</a>
                                    @endif
                                    <input name="ipf1" id="ipf1" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 2</label>
                                    @if(isset($model->ipf2))
                                        <a href="{{url('/data/thanhlytaisan/'.$model->ipf2)}}" target="_blank">{{$model->ipt2}}</a>
                                    @endif
                                    <input name="ipf2" id="ipf2" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 3</label>
                                    @if(isset($model->ipf3))
                                        <a href="{{url('/data/thanhlytaisan/'.$model->ipf3)}}" target="_blank">{{$model->ipt3}}</a>
                                    @endif
                                    <input name="ipf3" id="ipf3" type="file">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 4</label>
                                    @if(isset($model->ipf4))
                                        <a href="{{url('/data/thanhlytaisan/'.$model->ipf4)}}" target="_blank">{{$model->ipt4}}</a>
                                    @endif
                                    <input name="ipf4" id="ipf4" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 5</label>
                                    @if(isset($model->ipf5))
                                        <a href="{{url('/data/thanhlytaisan/'.$model->ipf5)}}" target="_blank">{{$model->ipt5}}</a>
                                    @endif
                                    <input name="ipf5" id="ipf5" type="file">
                                </div>
                            </div>
                        </div>
                        {!!Form::hidden('mahs',null, array('id' => 'mahs','class' => 'form-control'))!!}
                    </div>

                    <!-- END FORM-->
                </div>
            </div>
            <div class="col-md-12" style="text-align: center">
                <a href="{{url('thongtingiabantaisan')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhập</button>
            </div>
            <!-- END VALIDATION STATES-->
            {!! Form::close() !!}
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tlts").validate({
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