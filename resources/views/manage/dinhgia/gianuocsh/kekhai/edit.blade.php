@extends('main')

@section('custom-style')
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/select2/select2.css')}}"/>
    <!--Date-->
    <link type="text/css" rel="stylesheet" href="{{ url('vendors/bootstrap-datepicker/css/datepicker.css') }}">
    <!--End Date-->
@stop


@section('custom-script')
    <script type="text/javascript" src="{{url('assets/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{url('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>


    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{url('assets/admin/pages/scripts/table-managed.js')}}"></script>

    <!--Date>
    <script type="text/javascript" src="{{ url('js/jquery-1.10.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/main.js') }}"></script>

    <End Date-->
    <!--Date new-->
    <!--script src="{{url('minhtran/jquery.min.js')}}"></script-->
    <script src="{{url('minhtran/jquery.inputmask.bundle.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $(":input").inputmask();
        });
    </script>
    <!--End date new-->

    <script>
        jQuery(document).ready(function() {
            TableManaged.init();
        });
        function clearForm(){
            $('#doituong').val('');
            $('#giachuathue').val('0');
            $('#thuevat').val('0');
            $('#giacothue').val('0');
            $('#phibvmttyle').val('0');
            $('#phibvmt').val('0');
            $('#thanhtien').val('0');
        }
        function createmhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtingianuocsinhhoatct/store',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    doituong: $('#doituong').val(),
                    giachuathue: $('#giachuathue').val(),
                    thuevat: $('#thuevat').val(),
                    giacothue: $('#giacothue').val(),
                    phibvmttyle: $('#phibvmttyle').val(),
                    phibvmt: $('#phibvmt').val(),
                    thanhtien: $('#thanhtien').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin giá nước sạch sinh hoạt", "Thành công!");
                        $('#dsmhbog').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })

        }
        function editmhbog(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/thongtingianuocsinhhoatct/show',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        $('#ttmhbogedit').replaceWith(data.message);
                        InputMask();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin mặt hàng!", "Lỗi!");
                }
            })
        }
        function updatemhbog(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtingianuocsinhhoatct/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('#idedit').val(),
                    doituong: $('#doituongedit').val(),
                    giachuathue: $('#giachuathueedit').val(),
                    thuevat: $('#thuevatedit').val(),
                    giacothue: $('#giacothueedit').val(),
                    phibvmttyle: $('#phibvmttyleedit').val(),
                    phibvmt: $('#phibvmtedit').val(),
                    thanhtien: $('#thanhtienedit').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    if (data.status == 'success') {
                        toastr.success("Cập nhật thông tin giá nước sạch sinh hoạt", "Thành công!");
                        $('#dsmhbog').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-edit').modal("hide");

                    } else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })

        }
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function delmhbog() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thongtingianuocsinhhoatct/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    mahs: $('#mahs').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin!", "Thành công!");
                    $('#dsmhbog').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });

                    $('#modal-delete').modal("hide");

                    //}
                }
            })
        }
    </script>

@stop

@section('content')


    <h3 class="page-title">
        Thông tin hồ sơ giá nước sạch sinh hoạt<small> chỉnh sửa</small>
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
                    {!! Form::model($model, ['method' => 'PATCH', 'url'=>'thongtingianuocsinhhoat/'. $model->id, 'class'=>'horizontal-form','id'=>'update_thongtingianuocsinhhoat']) !!}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Thông tin quyết định<span class="require">*</span></label>
                                    {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ngày áp dụng<span class="require">*</span></label>
                                    {!!Form::text('ngayapdung',date('d/m/Y',  strtotime($model->ngayapdung)), array('id' => 'ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Ghi chú</label>
                                    {!!Form::text('ghichu',null, array('id' => 'ghichu','class' => 'form-control'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin đối tượng SD</button>
                                    &nbsp;
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <input type="hidden" id="mahs" name="mahs" value="{{$model->mahs}}">

                        <div class="row" id="dsmhbog">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Đối tượng</th>
                                        <th style="text-align: center">Giá chưa <br>thuế<br>(đ/m3)</th>
                                        <th style="text-align: center">Thuế <br>VAT<bR>(đ/m3)</th>
                                        <th style="text-align: center">Giá có<br> thuế</th>
                                        <th style="text-align: center">Phí BVMT <br>tỷ lệ (%)</th>
                                        <th style="text-align: center">Phí BVMT <br>tiền phí<br>(đ/m3)</th>
                                        <th style="text-align: center">Tổng<br>cộng giá<br>tiêu thụ<br>(đ/m3)</th>
                                        <th width="15%" style="text-align: center">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($modelct as $key=>$ct)
                                        <tr>
                                            <td style="text-align: center">{{$key +1}}</td>
                                            <td class="active">{{$ct->doituong}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->giachuathue)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->thuevat)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->giacothue)}}</td>
                                            <td style="text-align: center;font-weight: bold">{{number_format($ct->phibvmttyle)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->phibvmt)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($ct->thanhtien)}}</td>
                                            <td>
                                                <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editmhbog({{$ct->id}})"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$ct->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
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
            <div style="text-align: center">
                <a href="{{url('thongtingianuocsinhhoat')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
                <button type="reset" class="btn btn-default"><i class="fa fa-refresh"></i>&nbsp;Nhập lại</button>
                <button type="submit" class="btn green" onclick="validateForm()"><i class="fa fa-check"></i> Cập nhật</button>
            </div>
            {!! Form::close() !!}
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">
        function validateForm(){

            var validator = $("#update_thongtingianuocsinhhoat").validate({
                rules: {
                    ten :"required"
                },
                messages: {
                    ten :"Chưa nhập dữ liệu"
                }
            });
        }
    </script>
    <!--Model Create-->
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới thông tin đối tượng sử dụng</h4>
                </div>
                <div class="modal-body" id="ttmhbog">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Đối tượng sử dụng</b><span class="require">*</span></label>
                                <div><input type="text" id="doituong" name="doituong" class="form-control" style="font-weight: bold"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Giá chưa thuế</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="giachuathue" name="giachuathue" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Thuế VAT</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="thuevat" name="thuevat" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Giá có thuế</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="giacothue" name="giacothue" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Phí BVMT tỷ lệ(%)</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="phibvmttyle" name="phibvmttyle" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Phí BVMT</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="phibvmt" name="phibvmt" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"><label for="selGender" class="control-label"><b>Tổng cộng giá tiêu thụ</b><span class="require">*</span></label>
                                <div><input type="text" style="text-align: right;font-weight: bold" id="thanhtien" name="thanhtien" class="form-control" data-mask="fdecimal"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="createmhbog()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model Eđit-->
    <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin giá nước sinh hoạt</h4>
                </div>
                <div class="modal-body" id="ttmhbogedit">

                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatemhbog()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Model Delete-->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Đồng ý xóa thông tin?</h4>
                </div>
                <input type="hidden" id="iddelete" name="iddelete">
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="delmhbog()">Đồng ý</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.create-header-scripts')
    @include('includes.script.inputmask-ajax-scripts')
@stop