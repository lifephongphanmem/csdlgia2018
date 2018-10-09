@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin địa danh<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'danhmucdiadanh/'. $model->id, 'class'=>'horizontal-form','id'=>'update_town']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div class="form-body">
                        <div class="row">
                            @if($model->level == 'X')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Quận/huyện<span class="require">*</span></label>
                                        <select class="form-control" name="district" id="district">
                                            @foreach($districts as $tt)
                                                <option value="{{$tt->district}}" {{$tt->district == $model->district ? 'selected' : ''}}>{{$tt->diaban}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã địa bàn quận/huyện<span class="require">*</span></label>
                                        {!!Form::text('district', null, array('id' => 'district','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            @endif
                                        <!--/span-->
                        </div>
                        <div class="row">
                            @if($model->level == 'X')
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã địa bàn xã/phường<span class="require">*</span></label>
                                        {!!Form::text('town', null, array('id' => 'town','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa bàn<span class="require">*</span></label>
                                    {!!Form::text('diaban', null, array('id' => 'diaban','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="level" name="level" value="{{$model->level}}">
                    </div>

                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('danhmucdiadanh?&level='.$model->level)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_town").validate({
                rules: {
                    name :"required",
                },
                messages: {
                    name :"Chưa nhập dữ liệu",
                }
            });
        }
    </script>
    <script>
        jQuery(document).ready(function($) {
            $('input[name="maxa"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/ajax/checkmaqhns',
                    data: {
                        _token: CSRF_TOKEN,
                        maqhns:$(this).val(),
                        pl:'town'
                    },
                    dataType: 'JSON',
                    success: function (data) {

                        if(data.status != 'success') {
                            toastr.error("Bạn cần nhập lại mã quan hệ ngân sách", "Mã quan hệ ngân sách nhập vào đã tồn tại!!!");
                            $('input[name="maxa"]').val('');
                            $('input[name="maxa"]').focus();
                        }else{
                            toastr.success("Mã quan hệ ngân sách sử dụng được!", "Thành công!");
                        }
                    }

                });
            });
        }(jQuery));
    </script>
    @include('includes.script.create-header-scripts')
@stop