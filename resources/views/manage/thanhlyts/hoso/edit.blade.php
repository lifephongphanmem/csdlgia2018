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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtinthanhlytaisan/'. $model->id, 'files'=>true,'class'=>'horizontal-form','id'=>'update_tlts']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số quyết định<span class="require">*</span></label>
                                    {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày quyết định<span class="require">*</span></label>
                                    {!!Form::text('ngayqd',date('d/m/Y',  strtotime($model->ngayqd)), array('id' => 'ngayqd','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên tài sản</label>
                                    {!!Form::text('tents',null, array('id' => 'tents','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nhãn hiệu</label>
                                    {!!Form::text('nhanhieu',null, array('id' => 'nhanhieu','class' => 'form-control required'))!!}
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
                                    <label class="control-label">Số khung<span class="require">*</span></label>
                                    {!!Form::text('sokhung',null, array('id' => 'ghichu','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số máy<span class="require">*</span></label>
                                    {!!Form::text('somay',null, array('id' => 'somay','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Năm sản xuất<span class="require">*</span></label>
                                    <select name="namsx" id="namsx" class="form-control">
                                        @if ($nam_start = intval(date('Y')) - 15 ) @endif
                                        @if ($nam_stop = intval(date('Y')) + 1) @endif
                                        @for($i = $nam_start; $i <= $nam_stop; $i++)
                                            <option value="{{$i}}" {{$i == $model->nam ? 'selected' : ''}}>Năm {{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nguyên giá<span class="require">*</span></label>
                                    <input type="text" name="nguyengia" id="nguyengia" class="form-control"  data-mask="fdecimal" style="text-align: right;font-weight: bold" value="{{$model->nguyengia}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Hao mòn tính đến thời điểm<span class="require">*</span></label>
                                    {!!Form::text('thoidiemhm',date('d/m/Y',  strtotime($model->thoidiemhm)), array('id' => 'thoidiemhm','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phần trăm hao mòn<span class="require">*</span></label>
                                    <input type="text" name="phantramhm" id="phantramhm" class="form-control"  data-mask="fdecimal" value="{{$model->phantramhm}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm</label>
                                    @if(isset($model->ipf1))
                                        <p><a href="{{url('/data/thanhlytaisan/'.$model->ipf1)}}" target="_blank">{{$model->ipt1}}</a></p>
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
                <a href="{{url('thongtinthanhlytaisan?&maxa='.$model->maxa)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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
    @include('includes.script.create-header-scripts')
@stop