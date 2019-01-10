@extends('main')

@section('custom-style')
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop

@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <!--cript src="{{url('assets/admin/pages/scripts/form-validation.js')}}"></script-->
    @include('includes.crumbs.script_inputdate')
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>
@stop

@section('content')
    <h3 class="page-title">
        Thông tin hồ sơ thanh lý tài sản<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['url'=>'thongtinthanhlytaisan', 'files'=>true,'class'=>'horizontal-form','id'=>'create_tlts']) !!}
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
                                        {!!Form::text('ngayqd',null, array('id' => 'ngayqd','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
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
                                        <label class="control-label">Xuất xứ</label>
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
                                        <select name="nam" id="nam" class="form-control">
                                            @if ($nam_start = intval(date('Y')) - 15 ) @endif
                                            @if ($nam_stop = intval(date('Y')) + 1) @endif
                                            @for($i = $nam_start; $i <= $nam_stop; $i++)
                                                <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nguyên giá<span class="require">*</span></label>
                                        <input type="text" name="nguyengia" id="nguyengia" class="form-control required"  data-mask="fdecimal" style="text-align: right;font-weight: bold">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Hao mòn tính đến thời điểm</label>
                                        {!!Form::text('thoidiemhm',null, array('id' => 'thoidiemhm','data-inputmask'=>"'alias': 'date'",'class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Phần trăm hao mòn</label>
                                        <input type="text" name="phantramhm" id="phantramhm" class="form-control"  data-mask="fdecimal">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">File đính kèm</label>
                                        <input name="ipf1" id="ipf1" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- END FORM-->
                </div>
            </div>
            <div class="col-md-12" style="text-align: center">
                <a href="{{url('thongtinthanhlytaisan')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn default"> Hủy</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Thêm mới</button>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
        {!! Form::close() !!}
    </div>
    <script type="text/javascript">
        function validateForm(){
            var validator = $("#create_tlts").validate({
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