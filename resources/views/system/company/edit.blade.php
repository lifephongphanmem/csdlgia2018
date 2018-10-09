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
        Thông tin doanh nghiệp cung cấp dịch vụ<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'company/'. $model->id, 'class'=>'horizontal-form','id'=>'update_town']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên doanh nghiệp<span class="require">*</span></label>
                                        {!!Form::text('tendn', null, array('id' => 'tendn','class' => 'form-control required','autofocus'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã số thuế</label>
                                        {{ Form::label('maxa', $model->maxa, array('class' => 'form-control required')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại trụ sở chính</label>
                                        {!!Form::text('tel', null, array('id' => 'tel','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số fax trụ sở chính</label>
                                        {!!Form::text('fax', null, array('id' => 'fax','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ trụ sở</label>
                                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        {!!Form::text('email', null, array('id' => 'email','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nơi đăng ký nộp thuế</label>
                                        {!!Form::text('noidknopthue', null, array('id' => 'noidknopthue','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giấy đăng ký kinh doanh</label>
                                        {!!Form::text('giayphepkd', null, array('id' => 'giayphepkd','class' => 'form-control required'))!!}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Chức danh</label>
                                        {!!Form::text('chucdanh', null, array('id' => 'chucdanh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Họ tên người ký</label>
                                        {!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa danh</label>
                                        {!!Form::text('diadanh', null, array('id' => 'diadanh','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Cơ quan chủ quản</label>
                                        <select class="form-control" id="mahuyen" name="mahuyen">
                                            @foreach($district as $tt)
                                                <option value="{{$tt->mahuyen}}" {{($tt->mahuyen == $model->mahuyen) ? 'selected' : ''}} >{{$tt->tendv}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Link chia sẻ giấy đăng ký kinh doanh</label>
                                        {!!Form::text('tailieu', null, array('id' => 'tailieu','class' => 'form-control required'))!!}
                                    </div>
                                </div>
                            </div>
                            @if($model->level == 'DVVT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="icheck-inline">
                                                <label>
                                                    <input type="checkbox" value="1" {{ (isset($settingdvvt->dvvt->vtxk) && $settingdvvt->dvvt->vtxk == 1) ? 'checked' : '' }} name="roles[dvvt][vtxk]"> Vận tải xe khách </label>
                                                <label>
                                                    <input type="checkbox" value="1" {{(isset($settingdvvt->dvvt->vtxb) && $settingdvvt->dvvt->vtxb == 1) ? 'checked' : '' }} name="roles[dvvt][vtxb]"> Vận tải xe buýt </label>
                                                <label>
                                                    <input type="checkbox" value="1" {{(isset($settingdvvt->dvvt->vtxtx) && $settingdvvt->dvvt->vtxtx == 1) ? 'checked' : '' }} name="roles[dvvt][vtxtx]"> Vận tải xe taxi </label>
                                                <label>
                                                    <input type="checkbox" value="1" {{(isset($settingdvvt->dvvt->vtch) && $settingdvvt->dvvt->vtch == 1) ? 'checked' : '' }} name="roles[dvvt][vtch]"> Vận tải chở hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    <!-- END FORM-->
                </div>
            </div>

            <div style="text-align: center">
                <a href="{{url('company')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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