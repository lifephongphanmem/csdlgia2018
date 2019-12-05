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

@stop

@section('content')
    <h3 class="page-title">
        Báo cáo giá hàng hóa dịch vụ<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->
<hr>
    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::open(['url'=>'giahhdvkhac', 'id' => 'create_giahhdvkhac', 'class'=>'horizontal-form']) !!}
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <div class="form-body">
                        <h4 style="color: blue">Thông tin hồ sơ</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thông tư quyết định</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$tennhom}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đia bàn:</label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$diaban}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tháng báo cáo: </label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$inputs['thangbc']}}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Năm báo cáo: </label>
                                    <label class="control-label" style="color: blue;font-weight: bold">{{$inputs['nambc']}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số báo cáo<span class="require">*</span></label>
                                    {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày báo cáo<span class="require">*</span></label>
                                    {!!Form::text('ngayapdung',null, array('id' => 'ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số báo cáo liền kề<span class="require">*</span></label>
                                    {!!Form::text('soqdlk',isset($inputs['soqdlk']) ? $inputs['soqdlk'] : '', array('id' => 'soqdlk','class' => 'form-control'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày báo cáo liền kề<span class="require">*</span></label>
                                    {!!Form::text('ngayapdunglk',(isset($inputs['ngayapdunglk']) && $inputs['ngayapdunglk'] != '' ? date('d/m/Y',  strtotime($inputs['ngayapdunglk'])) : null), array('id' => 'ngayapdunglk','data-inputmask'=>"'alias': 'date'",'class' => 'form-control'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    {!!Form::text('ghichu',null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="district" id="district" value="{{$inputs['districtbc']}}">
                        <input type="hidden" name="matt" id="matt" value="{{$inputs['mattbc']}}">
                        <input type="hidden" name="thang" id="thang" value="{{$inputs['thangbc']}}">
                        <input type="hidden" name="nam" id="nam" value="{{$inputs['nambc']}}">
                        <input type="hidden" name="mahs" id="mahs" value="{{$inputs['mahs']}}">
                        <h4 style="color: blue">Thông tin chi tiết</h4>

                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Mã nhóm <br>hàng hóa<br> dịch vụ</th>
                                        <th style="text-align: center">Tên nhóm <br>hàng hóa<br> dịch vụ</th>
                                        <th style="text-align: center">Mã <br> hàng hóa<br> dịch vụ</th>
                                        <th style="text-align: center">Tên hàng hóa dịch vụ</th>
                                        <th style="text-align: center">Đặc điểm kỹ thuật</th>
                                        <th style="text-align: center">Đơn vị tính</th>
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
                                                <td style="text-align: left">{{$tt->dacdiemkt}}</td>
                                                <td style="text-align: center">{{$tt->dvt}}</td>
                                                <td style="text-align: right;font-weight: bold">{{number_format($tt->gialk)}}</td>
                                                <td style="text-align: right;font-weight: bold">{{number_format($tt->gia)}}</td>
                                                <td>
                                                    <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}})"><i class="fa fa-edit"></i>&nbsp;Nhập giá</button>
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
                    <a href="{{url('giahhdvkhac?&district='.$inputs['districtbc'])}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                    <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                    <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Hoàn thành</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->

            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <script type="text/javascript">
        function validateForm(){
            var validator = $("#create_giahhdvkhac").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>

    {{--<!--Modal Edit-->--}}
    {{--<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>--}}
                    {{--<h4 class="modal-title">Kê khai giá hàng hóa dịch vụ </h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body" id="tttsedit">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Mã nhóm hàng hóa dịch vụ<span class="require">*</span></label>--}}
                                {{--<input name="edit_manhom" id="edit_manhom" class="form-control" disabled>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Tên nhóm hàng hóa dịch vụ<span class="require">*</span></label>--}}
                                {{--<input name="edit_nhom" id="edit_nhom" class="form-control" disabled>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Mã hàng hóa dịch vụ<span class="require">*</span></label>--}}
                                {{--<input name="edit_mahhdv" id="edit_mahhdv" class="form-control" disabled>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Tên hàng hóa dịch vụ<span class="require">*</span></label>--}}
                                {{--<input name="edit_tenhhdv" id="edit_tenhhdv" class="form-control" disabled>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Đặc điểm kỹ thuật<span class="require">*</span></label>--}}
                                {{--<input name="edit_dacdiemkt" id="edit_dacdiemkt" class="form-control">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Đơn vị tính<span class="require">*</span></label>--}}
                                {{--<input name="edit_dvt" id="edit_dvt" class="form-control">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-6">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Giá liền kề<span class="require">*</span></label>--}}
                                {{--<input name="edit_gialk" id="edit_gialk" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label">Giá kê khai<span class="require">*</span></label>--}}
                                    {{--<input name="edit_gia" id="edit_gia" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-12">--}}
                            {{--<div class="form-group">--}}
                                {{--<label class="control-label">Ghi chú<span class="require">*</span></label>--}}
                                {{--<input name="edit_ghichu" id="edit_ghichu" class="form-control">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<input type="hidden" id="edit_id" name="edit_id">--}}
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
    @include('manage.dinhgia.giahhdvk.kekhai.modalct')



    <script>
    //ajax
    $(document).on("click", ".agent-add", function () {

    var agent_id = $(this).data('id');

        $("#example-form").submit(function(){
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: '/giahhdvkhac/nhanfilechitietdf1',
                type: 'POST',
                data: formData,
                success: function (data) {
                    alert(data)
                },
                cache: false,
                processData: false
            });

            return false;
        });
    });
    </script>
@stop