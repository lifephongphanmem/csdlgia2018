@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>
    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
    </script>
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

@stop

@section('content')
    <h3 class="page-title">
        Thông tin doanh nghiệp<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtindoanhnghiep/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tttaikhoan','files'=>true]) !!}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-body">
                            <input type="hidden" name="type" id="type" value="create">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Tên doanh nghiệp<span class="require">*</span></label>
                                        {!!Form::text('tendn', null, array('id' => 'tendn','class' => 'form-control required','autofocus'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('tendn') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mã số thuế</label>
                                        {!!Form::text('maxa', null, array('id' => 'maxa','class' => 'form-control required', 'disabled'))!!}
                                        <input type="hidden" id="maxa" name="maxa" value="{{$model->maxa}}">
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('maxa') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại trụ sở chính</label>
                                        {!!Form::text('tel', null, array('id' => 'tel','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Số fax trụ sở chính</label>
                                        {!!Form::text('fax', null, array('id' => 'fax','class' => 'form-control'))!!}
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ trụ sở</label>
                                        {!!Form::text('diachi', null, array('id' => 'diachi','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('diachi') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        {!!Form::text('email', null, array('id' => 'email','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('email') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="control-label">Nơi đăng ký nộp thuế</label>--}}
                                        {{--{!!Form::text('noidknopthue', null, array('id' => 'noidknopthue','class' => 'form-control required'))!!}--}}
                                        {{--@if ($errors->any())--}}
                                            {{--<em class="invalid">{{ $errors->first('noidknopthue') }}</em>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="control-label">Giấy đăng ký kinh doanh</label>--}}
                                        {{--{!!Form::text('giayphepkd', null, array('id' => 'giayphepkd','class' => 'form-control required'))!!}--}}
                                        {{--@if ($errors->any())--}}
                                            {{--<em class="invalid" >{{ $errors->first('giayphepkd') }}</em>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="control-label">Chức danh</label>--}}
                                        {{--{!!Form::text('chucdanh', null, array('id' => 'chucdanh','class' => 'form-control required'))!!}--}}
                                        {{--@if ($errors->any())--}}
                                            {{--<em class="invalid">{{ $errors->first('chucdanh') }}</em>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="control-label">Họ tên người ký</label>--}}
                                        {{--{!!Form::text('nguoiky', null, array('id' => 'nguoiky','class' => 'form-control required'))!!}--}}
                                        {{--@if ($errors->any())--}}
                                            {{--<em class="invalid">{{ $errors->first('nguoiky') }}</em>--}}
                                        {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Địa danh</label>
                                        {!!Form::text('diadanh', null, array('id' => 'diadanh','class' => 'form-control required'))!!}
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('diadanh') }}</em>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Giấy đăng ký kinh doanh</label>
                                        <a href="{{url('data/doanhnghiep/'.$model->tailieu)}}" target="_blank">{{$model->giayphepkd}}</a>
                                        <input name="tailieu" id="tailieu" type="file">
                                        @if ($errors->any())
                                            <em class="invalid">{{ $errors->first('tailieu') }}</em>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="control-label">Username</label>--}}
                            {{--{!!Form::text('username', null, array('id' => 'username','class' => 'form-control required'))!!}--}}
                            {{--@if ($errors->any())--}}
                            {{--<em class="invalid">{{ $errors->first('username') }}</em>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                            {{--<label class="control-label">Password</label>--}}
                            {{--{!!Form::text('password', null, array('id' => 'password','class' => 'form-control required'))!!}--}}
                            {{--@if ($errors->any())--}}
                            {{--<em class="invalid">{{ $errors->first('password') }}</em>--}}
                            {{--@endif--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin lĩnh vực kinh doanh</button>
                                        &nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="dsts">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered table-hover" id="sample_3">
                                        <thead>
                                        <tr>
                                            <th width="2%" style="text-align: center">STT</th>
                                            <th style="text-align: center">Mã ngành</th>
                                            <th style="text-align: center">Tên ngành</th>
                                            <th style="text-align: center">Mã nghề</th>
                                            <th style="text-align: center">Tên nghề</th>
                                            <th style="text-align: center">Đơn vị quản lý</th>
                                            <th style="text-align: center">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody id="ttts">
                                        @foreach($modellvcc as $key=>$lvcc)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$lvcc->manganh}}</td>
                                                <td>{{$lvcc->tennganh}}</td>
                                                <td>{{$lvcc->manghe}}</td>
                                                <td>{{$lvcc->tennghe}}</td>
                                                <td>{{$lvcc->tendv}}</td>
                                                <td>
                                                    <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getidedit({{$lvcc->id}});" ><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                    <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$lvcc->id}});" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- END FORM-->
                </div>
            </div>
            <div class="row" style="text-align: center">
                <div class="col-md-12">
                    <a href="{{url('thongtindoanhnghiep')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i>&nbsp;Cập nhật</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_tttaikhoan").validate({
                rules: {
                    name :"required"
                },
                messages: {
                    name :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    @include('manage.kkgia.ttdn.include.js-modal')

@stop