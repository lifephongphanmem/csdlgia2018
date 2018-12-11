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
            $('#nguyengiadenghi').change(function () {
                var sl = $('#sl').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiadn = $('#nguyengiadenghi').val();
                nguyengiadn = nguyengiadn.replace(/,/g, "");
                //nguyengiadn = nguyengiadn.replace(/./g, "");
                var tt = sl * nguyengiadn;
                //alert(nguyengiadn);
                $('#giadenghi').val(tt);
            });
            $('#nguyengiathamdinh').change(function () {
                var sl = $('#sl').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiatd = $('#nguyengiathamdinh').val();
                nguyengiatd = nguyengiatd.replace(/,/g, "");
                //nguyengiatd = nguyengiatd.replace(/./g, "");
                var tt = sl * nguyengiatd;
                //alert(nguyengiatd);
                $('#giatritstd').val(tt);
            });
            $('#songaykq').change(function(){
                addngay();
            });
            $('#thoidiem').change(function(){
                addngay();
            });
        });
    </script>
    <script>
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/thamdinhgiahhctdf/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        $('#tttsedit').replaceWith(data.message);
                        $('#tentsedit').focus();
                        InputMask();
                        tinhtoan();
                    }
                    else
                        toastr.error("Không thể chỉnh sửa thông tin!", "Lỗi!");
                }
            })
        }

        function updatets(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgiahhctdf/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    sl: $('input[name="sledit"]').val(),
                    nguyengiadenghi: $('input[name="nguyengiadenghiedit"]').val(),
                    giadenghi: $('input[name = "giadenghiedit"]').val(),
                    nguyengiathamdinh: $('input[name="nguyengiathamdinhedit"]').val(),
                    giatritstd: $('input[name="giatritstdedit"]').val(),
                    gc: $('textarea[name="gcedit"]').val(),
                    maxa: $('input[name="maxa"]').val(),
                    manhom: $('input[name="manhom"]').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-edit').modal("hide");


                    }else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }

        function tinhtoan(){
            $('#nguyengiadenghiedit').change(function () {
                var sl = $('#sledit').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiadn = $('#nguyengiadenghiedit').val();
                nguyengiadn = nguyengiadn.replace(/,/g, "");
                //nguyengiadn = nguyengiadn.replace(/./g, "");
                var tt = sl * nguyengiadn;
                //alert(nguyengiadn);
                $('#giadenghiedit').val(tt);
            });
            $('#nguyengiathamdinhedit').change(function () {
                var sl = $('#sledit').val();
                sl = sl.replace(/,/g, "");
                //sl = sl.replace(/./g, "");
                var nguyengiatd = $('#nguyengiathamdinhedit').val();
                nguyengiatd = nguyengiatd.replace(/,/g, "");
                //nguyengiatd = nguyengiatd.replace(/./g, "");
                var tt = sl * nguyengiatd;
                //alert(nguyengiatd);
                $('#giatritstdedit').val(tt);
            });
        }

        function addngay(){
            var thoidiem = $('#thoidiem').val();
            var songay = $('#songaykq').val();
            $('#thoihan').val(add_date(thoidiem,songay));
        }

    </script>
@stop

@section('content')
    <h3 class="page-title">
        Hồ sơ thẩm định giá hàng hóa<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::open(['url'=>'thamdinhgiahanghoa', 'id' => 'create_thamdinhgiahh', 'class'=>'horizontal-form']) !!}
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color:blue;">Thông tin hồ sơ</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nhóm hàng hóa<span class="require">*</span></label>
                                    <label style="color: blue"> {{$modelnhom->tennhom}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số hồ sơ thẩm định<span class="require">*</span></label>
                                    {!!Form::text('hosotdgia',null, array('id' => 'hosotdgia','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('thoidiem',null, array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('diadiem',null, array('id' => 'diadiem','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phương pháp thẩm định</label>
                                    {!!Form::text('ppthamdinh',null, array('id' => 'ppthamdinh','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                    {!!Form::text('mucdich',null, array('id' => 'mucdich','class' => 'form-control required'))!!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                    {!!Form::text('dvyeucau',null, array('id' => 'dvyeucau','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Nguồn vốn<span class="require">*</span></label>
                                    <select class="form-control" name="nguonvon" id="nguonvon">
                                        <option value="Cả hai">Cả hai (Nguồn vốn thường xuyên và Nguồn vốn đầu tư)</option>
                                        <option value="Thường xuyên">Nguồn vốn thường xuyên</option>
                                        <option value="Đầu tư">Nguồn vốn đầu tư</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thuế VAT</label>
                                    <select class="form-control" name="thuevat" id="thuevat">
                                        <option value="Giá bao gồm thuế VAT">Giá bao gồm thuế VAT</option>
                                        <option value="Giá chưa bao gồm thuế VAT">Giá chưa bao gồm thuế VAT</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                    {!!Form::text('sotbkl',null, array('id' => 'sotbkl','class' => 'form-control required'))!!}

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                    {!!Form::text('songaykq',0, array('id' => 'songaykq','data-mask'=>'fdecimal','class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn sử dụng kết quả thẩm định</label>
                                    {!!Form::text('thoihan',null, array('id' => 'thoihan','class' => 'form-control','readonly'))!!}
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="maxa" id="maxa" value="{{$inputs['getmaxa']}}">
                        <input type="hidden" name="manhom" id="manhom" value="{{$inputs['manhom']}}">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="color:blue;">Thông tin chi tiết</label>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="dsts">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover" id="sample_3">
                                    <thead>
                                    <tr>
                                        <th width="2%" style="text-align: center">STT</th>
                                        <th style="text-align: center">Nhóm hàng hóa</th>
                                        <th style="text-align: center">Loại hàng hóa- Quy cách</th>
                                        <th style="text-align: center">Đơn vị</br>tính</th>
                                        <th style="text-align: center">Số <br>lượng</th>
                                        <th style="text-align: center">Đơn giá</br>đề nghị</th>
                                        <th style="text-align: center">Giá trị</br>đề nghị</th>
                                        <th style="text-align: center">Đơn giá</br>thẩm định</th>
                                        <th style="text-align: center">Giá trị</br>thẩm định</th>
                                        <th style="text-align: center">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody id="ttts">
                                    @foreach($modelct as $key=>$tt)
                                        <tr>
                                            <td style="text-align: center">{{($key +1)}}</td>
                                            <td style="text-transform: uppercase;font-weight: bold">{{$tt->nhomhh}}</td>
                                            <td class="active">{{$tt->tenhh}}<br>{{$tt->qccl}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiathamdinh)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giatritstd)}}</td>
                                            <td>
                                                <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}})"><i class="fa fa-edit"></i>&nbsp;Cập nhật giá thẩm định</button>
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
                    <a href="{{url('thamdinhgiahanghoa?&maxa='.$inputs['getmaxa'].'&trangthai=CHT')}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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

            var validator = $("#create_thamdinhgiahh").validate({
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
    <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin thẩm định giá hàng hóa</h4>
                </div>
                <div class="modal-body" id="tttsedit">
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @include('includes.script.set_date_thoihanthamdinh')
    @include('includes.script.inputmask-ajax-scripts')
    @include('includes.script.create-header-scripts')
@stop