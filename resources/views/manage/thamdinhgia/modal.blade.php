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
            $('#songaykq').change(function(){
                addngay();
            });
            $('#thoidiem').change(function(){
                addngay();
            });
        });
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
                url: '/thamdinhgiact/store',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
//                    mats: $('input[name="mats"]').val(),
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
                    mahs: $('input[name="mahs"]').val()
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
                url: '/thamdinhgiact/edit',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: id
                },
                dataType: 'JSON',
//                success: function (data) {
//                    if(data.status == 'success') {
//                        $('#tttsedit').replaceWith(data.message);
//                        $('#tentsedit').focus();
//                        InputMask();
//                        tinhtoan();
//                    }
//                    else
//                        toastr.error("Không thể chỉnh sửa thông tin tài sản!", "Lỗi!");
//                }
                success: function (data) {
                    $('#tentsedit').val(data.tents);
                    $('#dacdiempledit').val(data.dacdiempl);
                    $('#thongsoktedit').val(data.thongsokt);
                    $('#nguongocedit').val(data.nguongoc);
                    $('#dvtedit').val(data.dvt);
                    $('#sledit').val(data.sl);
                    $('#nguyengiadenghiedit').val(data.nguyengiadenghi);
                    $('#giadenghiedit').val(data.giadenghi);
                    $('#nguyengiathamdinhedit').val(data.nguyengiathamdinh);
                    $('#giatritstdedit').val(data.giatritstd);
                    $('#gcedit').val(data.gc);
                    $('#idedit').val(data.id);
                },
                error: function (message) {
                    toastr.error(message, 'Lỗi!');
                }
            })
        }

        function updatets(){
            //alert('vcl');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/thamdinhgiact/update',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="idedit"]').val(),
//                    mats: $('input[name="matsedit"]').val(),
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
                    mahs: $('input[name="mahs"]').val()
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
                url: '/thamdinhgiact/del',
                type: 'GET',
                data: {
                    _token: CSRF_TOKEN,
                    id: $('input[name="iddelete"]').val(),
                    mahs: $('input[name="mahs"]').val()
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

        function addngay(){
            var thoidiem = $('#thoidiem').val();
            var songay = $('#songaykq').val();
            $('#thoihan').val(add_date(thoidiem,songay));
        }

    </script>
    <!--Modal Edit-->
    <div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Chỉnh sửa thông tin tài sản</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Tên hàng hóa<span class="require">*</span></label>
                                <input type="text" id="tentsedit" name="tentsedit" class="form-control">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Quy cách chất lượng</label>
                                <input type="text" id="dacdiempledit" name="dacdiempledit" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Thông số kỹ thuật</label>
                                <input type="text" name="thongsoktedit" id="thongsoktedit" class="form-control">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Xuất xứ</label>
                                <input type="text" name="nguongocedit" id="nguongocedit" class="form-control">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn vị tính</label>
                                <input type="text" name="dvtedit" id="dvtedit" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Số lượng<span class="require">*</span></label>
                                <input type="text" name="sledit" id="sledit" class="form-control" data-mask="fdecimal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn giá đề nghị<span class="require">*</span></label>
                                <input type="text" name="nguyengiadenghiedit" id="nguyengiadenghiedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá trị đề nghị<span class="require">*</span></label>
                                <input type="text" name="giadenghiedit" id="giadenghiedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Đơn giá thẩm định<span class="require">*</span></label>
                                <input type="text" name="nguyengiathamdinhedit" id="nguyengiathamdinhedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Giá trị tài sản thẩm định<span class="require">*</span></label>
                                <input type="text" name="giatritstdedit" id="giatritstdedit" class="form-control" data-mask="fdecimal" value="0" style="text-align: right;font-weight: bold">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Ghi chú</label>
                                <textarea id="gcedit" class="form-control" name="gcedit" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idedit" id="idedit">
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