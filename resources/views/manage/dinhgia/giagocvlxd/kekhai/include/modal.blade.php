<script>
    function clearForm(){
        $('#tenhhdv').val('');
        $('#qccl').val('');
        $('#dvt').val('');
        $('#giagoc').val('');
        $('#qcad').val('');
        $('#ghichu').val('');

    }
    function createttp(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/giagocvlxdct/storett',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                district: $('#district').val(),
                tenhhdv: $('#tenhhdv').val(),
                qccl: $('#qccl').val(),
                dvt: $('#dvt').val(),
                giagoc: $('#giagoc').val(),
                qcad: $('#qcad').val(),
                ghichu: $('#ghichu').val(),
                mahs: $('input[name="mahs"]').val()
            },
            dataType: 'JSON',
            success: function (data) {
                if(data.status == 'success') {
                    toastr.success("Bổ xung thông tin thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-create').modal("hide");

                }
            }
        })
    }
    function editTtPh(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //alert(id);
        $.ajax({
            url: '/giagocvlxdct/edittt',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#tenhhdvedit').val(data.tenhhdv);
                $('#qccledit').val(data.qccl);
                $('#dvtedit').val(data.dvt);
                $('#ghichuedit').val(data.ghichu);
                $('#giagocedit').val(data.giagoc);
                $('#qcadedit').val(data.qcad);
                $('#idedit').val(data.id);
            }
        })
    }

    function updatets() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/giagocvlxdct/updatett',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: $('input[name="idedit"]').val(),
                tenhhdv: $('#tenhhdvedit').val(),
                qccl: $('#qccledit').val(),
                dvt: $('#dvtedit').val(),
                ghichu: $('#ghichuedit').val(),
                giagoc: $('#giagocedit').val(),
                qcad: $('#qcadedit').val(),
                mahs: $('input[name="mahs"]').val()
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Chỉnh sửa thông tin thành công", "Thành công!");
                    $('#dsts').replaceWith(data.message);
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
    function deleteRow() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/giagocvlxdct/deletett',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: $('input[name="iddelete"]').val(),
                mahs: $('input[name="mahs"]').val()
            },
            dataType: 'JSON',
            success: function (data) {
                //if(data.status == 'success') {
                toastr.success("Bạn đã xóa thông tin thành công!", "Thành công!");
                $('#dsts').replaceWith(data.message);
                jQuery(document).ready(function() {
                    TableManaged.init();
                });

                $('#modal-delete').modal("hide");

                //}
            }
        })

    }
</script>
<!--Model them moi ttp-->
<div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thêm mới thông tin vật liệu - quy cách</h4>
            </div>
            <div class="modal-body" id="ttpthemmoi">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Tên vật liệu</b></label>
                            {!!Form::textarea('tenhhdv', null, array('id' => 'tenhhdv','class' => 'form-control','rows'=>'3'))!!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Quy cách chất lượng</b></label>
                            {!!Form::textarea('qccl', null, array('id' => 'qccl','class' => 'form-control','rows'=>'3'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Đơn vị tính</b><span class="require">*</span></label>
                            {!!Form::text('dvt', null, array('id' => 'dvt','class' => 'form-control','required'=>'required'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Giá kê khai</b><span class="require">*</span></label>
                            <div><input type="text" name="giagoc" id="giagoc" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Tiêu chuẩn, Quy chuẩn áp dụng</b></label>
                            {!!Form::textarea('qcad', null, array('id' => 'qcad','class' => 'form-control','rows'=>'2'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Ghi chú</b></label>
                            {!!Form::textarea('ghichu', null, array('id' => 'ghichu','class' => 'form-control','rows'=>'2'))!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="createttp()">Bổ xung</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Modal chỉnh sửa ttp-->
<div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Chỉnh sửa thông tin vật liệu quy cách chất lượng</h4>
            </div>
            <div class="modal-body" id="ttpedit">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Tên vật liệu</b></label>
                            {!!Form::textarea('tenhhdvedit', null, array('id' => 'tenhhdvedit','class' => 'form-control','rows'=>'3'))!!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Quy cách chất lượng</b></label>
                            {!!Form::textarea('qccledit', null, array('id' => 'qccledit','class' => 'form-control','rows'=>'3'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label"><b>Đơn vị tính</b><span class="require">*</span></label>
                            {!!Form::text('dvtedit', null, array('id' => 'dvtedit','class' => 'form-control','required'=>'required'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Giá kê khai</b><span class="require">*</span></label>
                            <div><input type="text" name="giagocedit" id="giagocedit" class="form-control" data-mask="fdecimal" style="text-align: right;font-weight: bold"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Tiêu chuẩn, Quy chuẩn áp dụng</b></label>
                            {!!Form::textarea('qcadedit', null, array('id' => 'qcadedit','class' => 'form-control','rows'=>'2'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label"><b>Ghi chú</b></label>
                            {!!Form::textarea('ghichuedit', null, array('id' => 'ghichuedit','class' => 'form-control','rows'=>'2'))!!}
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="idedit" id="idedit">
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="updatets()">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Modal Xoá-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Đồng ý xóa thông tin?</h4>
            </div>
            <input type="hidden" id="iddelete" name="iddelete">
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="deleteRow()">Đồng ý</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
