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
            $('#mats').change(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    url: '/addtthanghoa',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahanghoa: $('#mats').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if(data.status == 'success') {
                            toastr.success("Đã tìm thấy thông tin tài sản!", "Thành công!");
                            $('#tents').val(data.tenhanghoa);
                            $('#thongsokt').val(data.thongsokt);
                            $('#nguongoc').val(data.xuatxu);
                            $('#dvt').val(data.dvt);
                        }else {
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                            $('#tents').val('');
                            $('#thongsokt').val('');
                            $('#nguongoc').val('');
                            $('#dvt').val('');
                        }
                    }
                })
            });
        });


    </script>
    <script>

        function clearForm(){
            $('#mats').val('');
            $('#tents').val('');
            $('#dacdiempl').val('');
            $('#thongsokt').val('');
            $('#nguongoc').val('');
            $('#dvt').val('');
            $('#sl').val('1');
            $('#nguyengiadenghi').val('0');
            $('#giadenghi').val('0');
            $('#nguyengiathamdinh').val('0');
            $('#giatritstd').val('0');
            $('#gc').val('');
        }
        function capnhatts(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgiactdf/store',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mats: $('#mats').val(),
                    tents: $('input[name="tents"]').val(),
                    dacdiempl: $('input[name="dacdiempl"]').val(),
                    thongsokt: $('input[name="thongsokt"]').val(),
                    nguongoc: $('input[name="nguongoc"]').val(),
                    dvt: $('input[name="dvt"]').val(),
                    sl: $('input[name="sl"]').val(),
                    nguyengiadenghi: $('input[name="nguyengiadenghi"]').val(),
                    giadenghi: $('input[name = "giadenghi"]').val(),
                    nguyengiathamdinh: $('input[name="nguyengiathamdinh"]').val(),
                    giatritstd:$('input[name="giatritstd"]').val(),
                    gc: $('textarea[name="gc"]').val(),
                    maxa: $('input[name="maxa"]').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    if(data.status == 'success') {
                        toastr.success("Cập nhật thông tin tài sản thành công", "Thành công!");
                        $('#dsts').replaceWith(data.message);
                        jQuery(document).ready(function() {
                            TableManaged.init();
                        });
                        $('#modal-create').modal("hide");
                    }
                    else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }
        function editItem(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            //alert(id);
            $.ajax({
                url: '/thamdinhgiactdf/edit',
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
                        toastr.error("Không thể chỉnh sửa thông tin tài sản!", "Lỗi!");
                }
            })
        }

        function updatets(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgiactdf/update',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
                    mats: $('#matsedit').val(),
                    tents: $('input[name="tentsedit"]').val(),
                    dacdiempl: $('input[name="dacdiempledit"]').val(),
                    thongsokt: $('input[name="thongsoktedit"]').val(),
                    nguongoc: $('input[name ="nguongocedit"]').val(),
                    dvt: $('input[name="dvtedit"]').val(),
                    sl: $('input[name="sledit"]').val(),
                    nguyengiadenghi: $('input[name="nguyengiadenghiedit"]').val(),
                    giadenghi: $('input[name = "giadenghiedit"]').val(),
                    nguyengiathamdinh: $('input[name="nguyengiathamdinhedit"]').val(),
                    giatritstd: $('input[name="giatritstdedit"]').val(),
                    gc: $('textarea[name="gcedit"]').val(),
                    maxa: $('input[name="maxa"]').val(),
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        toastr.success("Chỉnh sửa thông tin tài sản thành công", "Thành công!");
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
        function getid(id){
            document.getElementById("iddelete").value=id;
        }
        function delrow(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgiactdf/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    maxa: $('input[name="maxa"]').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //if(data.status == 'success') {
                    toastr.success("Bạn đã xóa thông tin tài sản thành công!", "Thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-delete').modal("hide");

                    //}
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
            $('#matsedit').change(function () {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/addtthanghoaedit',
                    type: 'GET',
                    data: {
                        _token: CSRF_TOKEN,
                        mahanghoa: $('#matsedit').val()
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status == 'success') {
                            toastr.success("Đã tìm thấy thông tin tài sản!", "Thành công!");
                            $('#tentsedit').val(data.tenhanghoa);
                            $('#thongsoktedit').val(data.thongsokt);
                            $('#nguongocedit').val(data.xuatxu);
                            $('#dvtedit').val(data.dvt);
                        } else {
                            toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                            $('#tentsedit').val('');
                            $('#thongsoktedit').val('');
                            $('#nguongocedit').val('');
                            $('#dvtedit').val('');
                        }
                    }
                })
            });
        }

        function addngay(){
            var thoidiem = $('#thoidiem').val();
            var songay = $('#songaykq').val();
            $('#thoihan').val(add_date(thoidiem,songay));
        }

        function searchgiaHH(){
            //alert($('#mats').val());
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgiactdf/search',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    mats: $('#mats').val()
                },
                dataType: 'JSON',
                success: function (data) {
                    //$('#modal-wide-width').dialog('close');
                    if(data.status == 'success') {
                        $('#ttgiats').replaceWith(data.message);
                    }else
                        toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
                }
            })
        }

    </script>
@stop

@section('content')
    <h3 class="page-title">
        Hồ sơ thẩm định giá<small> thêm mới</small>
    </h3>
    <!-- END PAGE HEADER-->

    <!-- BEGIN DASHBOARD STATS -->
    <div class="row center">
        <div class="col-md-12 center">
            <!-- BEGIN VALIDATION STATES-->
            {!! Form::open(['url'=>'thamdinhgia', 'id' => 'create_thamdinhgia', 'files'=>true, 'class'=>'horizontal-form']) !!}
            <div class="portlet box blue">
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <div class="form-body">
                        <h4 style="color: blue">Thông tin hồ sơ</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đơn vị thẩm định giá: <b style="color: blue">{{$modeldv->tendv}}</b></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Đơn vị yêu cầu thẩm định<span class="require">*</span></label>
                                    {!!Form::text('dvyeucau',null, array('id' => 'dvyeucau','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thông tin tờ trình<span class="require">*</span></label>
                                    {!!Form::text('hosotdgia',null, array('id' => 'hosotdgia','class' => 'form-control required'))!!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Tên hàng hóa yêu cầu thẩm định<span class="require">*</span></label>
                                    {!!Form::text('tttstd',null, array('id' => 'tttstd','class' => 'form-control required','autofocus'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('thoidiem',null, array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                                </div>
                            </div>
                        </div>
                        <!--div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Mục đích thẩm định<span class="require">*</span></label>
                                    {!!Form::text('mucdich',null, array('id' => 'mucdich','class' => 'form-control required'))!!}
                                </div>
                            </div>

                        </div-->
                        <div class="row">

                            <!--div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thuế VAT</label>
                                    <select class="form-control" name="thuevat" id="thuevat">
                                        <option value="Giá bao gồm thuế VAT">Giá bao gồm thuế VAT</option>
                                        <option value="Giá chưa bao gồm thuế VAT">Giá chưa bao gồm thuế VAT</option>
                                    </select>
                                </div>
                            </div-->

                        </div>
                        <!--div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Phương pháp thẩm định</label>
                                    {!!Form::text('ppthamdinh',null, array('id' => 'ppthamdinh','class' => 'form-control required'))!!}
                                </div>
                            </div>
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

                        </div-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Địa điểm thẩm định<span class="require">*</span></label>
                                    {!!Form::text('diadiem',null, array('id' => 'diadiem','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số thông báo kết luận<span class="require">*</span></label>
                                    {!!Form::text('sotbkl',null, array('id' => 'sotbkl','class' => 'form-control required'))!!}

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Số ngày sử dụng kết quả thẩm định</label>
                                    {!!Form::text('songaykq',60, array('id' => 'songaykq','data-mask'=>'fdecimal','class' => 'form-control required'))!!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Thời hạn sử dụng kết quả thẩm định</label>
                                    {!!Form::text('thoihan',null, array('id' => 'thoihan','class' => 'form-control','readonly'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label for="selGender" class="control-label">Ghi chú</label>
                                    <div>
                                        <textarea id="ghichu" class="form-control" name="ghichu" cols="30" rows="5"
                                                >Giá thẩm định đã bao gồm thuế VAT và chi phí vận chuyển, lắp đặt</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 1</label>
                                    <input name="ipf1" id="ipf1" type="file">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 2</label>
                                    <input name="ipf2" id="ipf2" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 3</label>
                                    <input name="ipf3" id="ipf3" type="file">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 4</label>
                                    <input name="ipf4" id="ipf4" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">File đính kèm 5</label>
                                    <input name="ipf5" id="ipf5" type="file">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="maxa" id="maxa" value="{{$maxa}}">
                        <h4 style="color: blue">Thông tin chi tiết hồ sơ</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" data-target="#modal-create" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearForm()"><i class="fa fa-plus"></i>&nbsp;Thêm mới thông tin hàng hóa</button>
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
                                        <th style="text-align: center">Mã hàng hóa</th>
                                        <th style="text-align: center">Tên hàng hóa-Quy cách</th>
                                        <th style="text-align: center">Thông số kỹ thuật</th>
                                        <th style="text-align: center">Xuất xứ</th>
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
                                        <tr id={{$tt->id}}>
                                            <td style="text-align: center">{{($key +1)}}</td>
                                            <td style="text-align: center">{{$tt->mats}}</td>
                                            <td class="active">{{$tt->tents}}-{{$tt->dacdiempl}}</td>
                                            <td style="text-align: left">{{$tt->thongsokt}}</td>
                                            <td style="text-align: left">{{$tt->nguongoc}}</td>
                                            <td style="text-align: center">{{$tt->dvt}}</td>
                                            <td style="text-align: center">{{number_format($tt->sl)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giadenghi)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->nguyengiathamdinh)}}</td>
                                            <td style="text-align: right;font-weight: bold">{{number_format($tt->giatritstd)}}</td>
                                            <td>
                                                <button type="button" data-target="#modal-edit" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="editItem({{$tt->id}})"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                                                <button type="button" data-target="#modal-delete" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="getid({{$tt->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
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
                    <a href="{{url('thamdinhgia?&maxa='.$maxa)}}" class="btn btn-danger"><i class="fa fa-reply"></i>&nbsp;Quay lại</a>
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

            var validator = $("#create_thamdinhgia").validate({
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
                    <h4 class="modal-title">Chỉnh sửa thông tin hàng hóa</h4>
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
    <!--Model Create-->
    <div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Thêm mới thông tin hàng hóa</h4>
                </div>
                <div class="modal-body" id="ttmhbog">
                    @if(canGeneral('dmhhthamdinhgia','index'))
                        @if(can('dmhhthamdinhgia','index'))
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Mã hàng hóa<span class="require">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="mats" name="mats">
                                        <span class="input-group-btn">
                                        <button class="btn blue" type="button" data-target="#modal-search" data-toggle="modal" onclick="searchgiaHH()">Seach!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{url('dmnhomhanghoa')}}" target="_blank">Bổ xung thông tin hàng hóa</a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên hàng hóa<span class="require">*</span></label>
                                <input type="text" id="tents" name="tents" class="form-control">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Quy cách chất lượng</label>
                                <input type="text" id="dacdiempl" name="dacdiempl" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thông số kỹ thuật</label>
                                <input type="text" name="thongsokt" id="thongsokt" class="form-control">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Xuất xứ</label>
                                <input type="text" name="nguongoc" id="nguongoc" class="form-control">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính</label>
                                <input type="text" name="dvt" id="dvt" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số lượng<span class="require">*</span></label>
                                <input type="text" name="sl" id="sl" class="form-control" data-mask="fdecimal" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn giá đề nghị<span class="require">*</span></label>
                                <input type="text" name="nguyengiadenghi" id="nguyengiadenghi" class="form-control" data-mask="fdecimal" value="0" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá trị đề nghị<span class="require">*</span></label>
                                <input type="text" name="giadenghi" id="giadenghi" class="form-control" data-mask="fdecimal" value="0" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn giá thẩm định<span class="require">*</span></label>
                                <input type="text" name="nguyengiathamdinh" id="nguyengiathamdinh" class="form-control" data-mask="fdecimal" value="0" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá trị tài sản thẩm định<span class="require">*</span></label>
                                <input type="text" name="giatritstd" id="giatritstd" class="form-control" data-mask="fdecimal" value="0" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ghi chú</label>
                                <textarea id="gc" class="form-control" name="gc" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                    <button type="button" class="btn btn-primary" onclick="capnhatts()">Thêm mới</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade bs-modal-lg" id="modal-search" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Tìm kiếm đơn giá thẩm định</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="ttgiats">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
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
                    <button type="button" class="btn btn-primary" onclick="delrow()">Đồng ý</button>
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