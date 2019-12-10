<script>
    function editItem(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/giahhdvkhacct/edit',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#edit_manhom').val(data.manhom);
                $('#edit_nhom').val(data.nhom);
                $('#edit_mahhdv').val(data.mahhdv);
                $('#edit_tenhhdv').val(data.tenhhdv);
                $('#edit_dacdiemkt').val(data.dacdiemkt);
                $('#edit_dvt').val(data.dvt);
                $('#edit_gialk').val(data.gialk);
                $('#edit_gia').val(data.gia);
                $('#edit_ghichu').val(data.ghichu);
                $('#edit_nguontt').val(data.nguontt);
                $('#edit_loaigia').val(data.loaigia);
                $('#edit_id').val(data.id);
            },
            error: function (message) {
                toastr.error(message, 'Lỗi!');
            }
        });
    }

    function updatets(){
        //alert('vcl');
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/giahhdvkhacct/update',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: $('#edit_id').val(),
                dacdiemkt: $('#edit_dacdiemkt').val(),
                dvt: $('#edit_dvt').val(),
                gialk: $('#edit_gialk').val(),
                gia: $('#edit_gia').val(),
                loaigia: $('#edit_loaigia').val(),
                nguontt: $('#edit_nguontt').val(),
                ghichu: $('#edit_ghichu').val(),
                mahs: $('#mahs').val(),
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
                            <label class="control-label">Mã nhóm: </label>
                            <input type="text" id="edit_manhom" name="edit_manhom" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tên nhóm: </label>
                            <input type="text" id="edit_nhom" name="edit_nhom" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Mã hàng hóa </label>
                            <input type="text" id="edit_mahhdv" name="edit_mahhdv" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tên hàng hóa </label>
                            <input type="text" id="edit_tenhhdv" name="edit_tenhhdv" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đặc điểm kỹ thuật</label>
                            <input type="text" id="edit_dacdiemkt" name="edit_dacdiemkt" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn vị tính</label>
                            <input type="text" id="edit_dvt" name="edit_dvt" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Loại giá</label>
                            <select class="form-control" id="edit_loaigia" name="edit_loaigia">
                                <option value="Giá bán buôn">Giá bán buôn</option>
                                <option value="Giá bán lẻ">Giá bán lẻ</option>
                                <option value="Giá kê khai">Giá kê khai</option>
                                <option value="Giá đăng ký">Giá đăng ký</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Giá kỳ trước</label>
                            <input type="text" name="edit_gialk" id="edit_gialk" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Giá kỳ này</label>
                            <input type="text" name="edit_gia" id="edit_gia" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Nguồn thông tin</label>
                            <select class="form-control" id="edit_nguontt" name="edit_nguontt">
                                <option value="Do trục tiếp điều tra, thu thập">Do trục tiếp điều tra, thu thập</option>
                                <option value="Hợp đồng mua tin">Hợp đồng mua tin</option>
                                <option value="Do cơ quan/đơn vị quản lý nhà nước có liên quan cung cấp/báo cáo theo quy định">Do cơ quan/đơn vị quản lý nhà nước có liên quan cung cấp/báo cáo theo quy định</option>
                                <option value="Từ thống kê đăng ký giá, kê khai giá, thông báo giá của doanh nghiệp">Từ thống kê đăng ký giá, kê khai giá, thông báo giá của doanh nghiệp</option>
                                <option value="Các nguồn thông tin khác">Các nguồn thông tin khác</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Ghi chú</label>
                            <input type="text" id="edit_ghichu" name="edit_ghichu" class="form-control">
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