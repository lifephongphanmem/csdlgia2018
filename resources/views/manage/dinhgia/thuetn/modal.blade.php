<script>
    function editItem(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //alert(id);
        $.ajax({
            url: '/thuetainguyenct/edit',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#edit_cap1').val(data.cap1);
                $('#edit_cap2').val(data.cap2);
                $('#edit_cap3').val(data.cap3);
                $('#edit_cap4').val(data.cap4);
                $('#edit_cap5').val(data.cap5);
                $('#edit_ten').val(data.ten);
                $('#edit_dvt').val(data.dvt);
                $('#edit_gia').val(data.gia);
                $('#edit_id').val(data.id);
            }
        })
    }

    function updatets(){
        //alert('vcl');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/thuetainguyenct/update',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: $('#edit_id').val(),
                gia: $('#edit_gia').val(),
                mahs: $('#mahs').val()
            },
            dataType: 'JSON',
            success: function (data) {
                if(data.status == 'success') {
                    toastr.success("Chỉnh sửa thông tin hàng hóa dịch vụ thành công", "Thành công!");
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
</script>
<!--Modal Edit-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Kê khai giá thị trường </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Mã nhóm, loại tài nguyên cấp 1 </label>
                            <input type="text" id="edit_cap1" name="edit_cap1" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Mã nhóm, loại tài nguyên cấp 2</label>
                            <input type="text" id="edit_cap2" name="edit_cap2" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Mã nhóm, loại tài nguyên cấp 3 </label>
                            <input type="text" id="edit_cap3" name="edit_cap3" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Mã nhóm, loại tài nguyên cấp 4</label>
                            <input type="text" id="edit_cap4" name="edit_cap4" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Mã nhóm, loại tài nguyên cấp 5</label>
                            <input type="text" id="edit_cap5" name="edit_cap5" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Tên nhóm, loại tài nguyên</label>
                            <input type="text" id="edit_ten" name="edit_ten" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn vị tính</label>
                            <input type="text" id="edit_dvt" name="edit_dvt" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Giá tính thuế tài nguyên (đồng)</label>
                            <input type="text" name="edit_gia" id="edit_gia" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="edit_id" name="edit_id">
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