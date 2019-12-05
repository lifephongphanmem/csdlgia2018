@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
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
    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
    {{--<script>--}}
        {{--function editItem(id) {--}}
            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
            {{--//alert(id);--}}
            {{--$.ajax({--}}
                {{--url: '/thgiahhdvkct/edit',--}}
                {{--type: 'GET',--}}
                {{--data: {--}}
                    {{--_token: CSRF_TOKEN,--}}
                    {{--id: id,--}}
                {{--},--}}
                {{--dataType: 'JSON',--}}
                {{--success: function (data) {--}}
                    {{--if(data.status == 'success') {--}}
                        {{--$('#tttsedit').replaceWith(data.message);--}}
                        {{--InputMask();--}}
                    {{--}--}}
                    {{--else--}}
                        {{--toastr.error("Không thể chỉnh sửa thông tin hàng hóa dịch vụ!", "Lỗi!");--}}
                {{--}--}}
            {{--})--}}
        {{--}--}}

        {{--function updatets(){--}}
            {{--//alert('vcl');--}}
            {{--var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');--}}
            {{--$.ajax({--}}
                {{--url: '/thgiahhdvkct/update',--}}
                {{--type: 'GET',--}}
                {{--data: {--}}
                    {{--_token: CSRF_TOKEN,--}}
                    {{--id: $('input[name="idedit"]').val(),--}}
                    {{--gia: $('input[name="giaedit"]').val(),--}}
                    {{--gialk: $('input[name="gialkedit"]').val(),--}}
                    {{--nguontt: $('input[name="nguonttedit"]').val(),--}}
                    {{--ghichu: $('input[name="ghichuedit"]').val(),--}}
                    {{--mahs: $('input[name="mahs"]').val(),--}}
                {{--},--}}
                {{--dataType: 'JSON',--}}
                {{--success: function (data) {--}}
                    {{--if(data.status == 'success') {--}}
                        {{--toastr.success("Chỉnh sửa thông tin hàng hóa dịch vụ thành công", "Thành công!");--}}
                        {{--$('#dsts').replaceWith(data.message);--}}
                        {{--jQuery(document).ready(function() {--}}
                            {{--TableManaged.init();--}}
                        {{--});--}}
                        {{--$('#modal-edit').modal("hide");--}}


                    {{--}else--}}
                        {{--toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");--}}
                {{--}--}}
            {{--})--}}
        {{--}--}}
    {{--</script>--}}
@stop

@section('content')
    <h3 class="page-title">
        Tổn hợp giá hàng hóa dịch vụ<small> chỉnh sửa</small>
    </h3>
    <!-- END PAGE HEADER-->
<hr>
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::model($model, ['method' => 'PATCH', 'url'=>'tonghopgiahhdvk/'. $model->id, 'class'=>'horizontal-form','id'=>'update_tonghopgiahhdvk']) !!}
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Theo thông tư quyết định:</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$modelnhom->tentt}}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Tháng: </label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$model->thang}}</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label">Năm: </label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$model->nam}}</label>
                                </div>
                            </div>

                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label">Thông tin báo cáo<span class="require">*</span></label>--}}
                                    {{--{!!Form::text('ttbc',null, array('id' => 'ttbc','class' => 'form-control required','autofocus'))!!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="row">
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="control-label">Số báo cáo<span class="require">*</span></label>
                                {!!Form::text('sobc',null, array('id' => 'sobc','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày báo cáo<span class="require">*</span></label>
                                    {!!Form::text('ngaybc',date('d/m/Y',  strtotime($model->ngaybc)), array('id' => 'ngaybc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <input type="hidden" name="mahs" id="mahs" value="{{$model->mahs}}">


                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Mã nhóm <br> hàng hóa<br> dịch vụ</th>
                                        <th style="text-align: center">Tên nhóm <br> hàng hóa dịch vụ</th>
                                        <th style="text-align: center">Mã <br> hàng hóa<br> dịch vụ</th>
                                        <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                                        <th style="text-align: center">Đặc điểm kinh tế,<bR> kỹ thuật, quy cách</th>
                                        <th style="text-align: center" width="5%">Đơn<br> vị<br> tính</th>
                                        <th style="text-align: center" width="10%">Giá kỳ trước</th>
                                        <th style="text-align: center" width="10%">Giá kỳ này</th>
                                        <th style="text-align: center" width="15%">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                        @foreach($modelct as $key=>$tt)
                                            <tr>
                                                <td style="text-align: center">{{$key+1}}</td>
                                                <td style="text-align: center">{{$tt->manhom}}</td>
                                                <td style="text-align: left">{{$tt->nhom}}</td>
                                                <td style="text-align: center">{{$tt->mahhdv}}</td>
                                                <td class="active" style="font-weight: bold">{{$tt->tenhhdv}}</td>
                                                <td>{{$tt->dacdiemkt}}</td>
                                                <td style="text-align: center">{{$tt->dvt}}</td>
                                                <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->gialk,5)}}</td>
                                                <td style="text-align: right;font-weight: bold">{{dinhdangsothapphan($tt->gia,5)}}</td>
                                                <td>
                                                    <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}})"><i class="fa fa-edit"></i>&nbsp;Kê khai</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="text-align: center">
                    <a href="{{url('tonghopgiahhdvk?&trangthai='.$model->trangthai)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->

            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <script type="text/javascript">
        function validateForm(){

            var validator = $("#create_tonghopgiahhdvk").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>



    <!--Modal Edit-->
    {{--<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>--}}
                    {{--<h4 class="modal-title">Tổng hợp giá hàng hóa dịch vụ khác </h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body" id="tttsedit">--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>--}}
                    {{--<button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.modal-content -->--}}
        {{--</div>--}}
        {{--<!-- /.modal-dialog -->--}}
    {{--</div>--}}
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
    @include('manage.dinhgia.giahhdvk.tonghop.modalct')
@stop