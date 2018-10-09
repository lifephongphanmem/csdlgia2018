@extends('main')

@section('custom-style')

@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->

@stop

@section('content')
    <h3 class="page-title">
        Thông tin hàng hóa xuất nhập khẩu<small> thêm mới</small>
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
                    {!! Form::open(['url'=>'dmhanghoa-xuatnhapkhau', 'id' => 'create_tthhxnk', 'class'=>'horizontal-form']) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã hàng hóa<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="mahh" id="mahh" autofocus>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên hàng hóa<span class="require">*</span></label>
                                        <input type="text" class="form-control required" name="tenhh" id="tenhh">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đặc điểm kỹ thuật</label>
                                        <input type="text" class="form-control" name="dacdiemkt" id="dacdiemkt">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Đơn vị tính</label>
                                        <input type="text" class="form-control" name="dvt" id="dvt">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nơi sản xuất</label>
                                        <input type="text" class="form-control" name="nsx" id="nsx">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nơi sản xuất</label>
                                        <select class="form-control" name="theodoi" id="theodoi">
                                            <option value="Có" selected>Có</option>
                                            <option value="Không">Không</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Ghi chú<span class="require">*</span></label>
                                        <input type="text" class="form-control"  name="ghichu" id="ghichu">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" value="{{$nhom}}" name="nhom" id="nhom">
                        <input type="hidden" value="{{$pnhom}}" name="pnhom" id="pnhom">
                        <input type="hidden" value="{{$loai}}" name="loai" id="loai">
                        <div class="form-actions">
                            <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                            <button type="reset" class="btn default"> Huỷ</button>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_tthhxnk").validate({
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
            $('input[name="mahh"]').change(function(){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: '/checkmahhxnk',
                    data: {
                        _token: CSRF_TOKEN,
                        mahh: $(this).val(),
                        nhom:$('input[name="nhom"]').val(),
                        pnhom:$('input[name="pnhom"]').val(),
                        loai:$('input[name="loai"]').val()

                    },
                    success: function (respond) {
                        if(respond != 'ok'){
                            toastr.error("Bạn cần nhập mã hàng hóa khác", "Mã hàng hóa đã tồn tại!!!");
                            $('input[name="mahh"]').val('');
                            $('input[name="mahh"]').focus();
                        }else
                            toastr.success("Mã hàng hóa sử dụng được", "Thành công!");
                    }

                });
            })
        }(jQuery));
    </script>
@stop