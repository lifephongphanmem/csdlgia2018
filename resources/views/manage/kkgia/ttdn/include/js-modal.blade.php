<!--Model Create-->
<div class="modal fade bs-modal-lg" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thêm mới lĩnh vực kinh doanh</h4>
            </div>
            <div class="modal-body" id="ttmhbog">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Ngành</label>
                            <select class="form-control" name="add_manganh" id="add_manganh">
                                <option>-Chọn ngành kinh doanh--</option>
                                @foreach($nganhs as $nganh)
                                    <option value="{{$nganh->manganh}}">{{$nganh->tennganh}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Nghề</label>
                            <select class="form-control" name="add_manghe" id="add_manghe">
                                <option>-Chọn ngành kinh doanh--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đơn vị nhận hồ sơ</label>
                            <select class="form-control" name="add_mahuyen" id="add_mahuyen">
                                <option>-Chọn đơn vị nhận hồ sơ--</option>
                            </select>
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
<!--Model edit-->
<div class="modal fade bs-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Chỉnh sửa lĩnh vực kinh doanh</h4>
            </div>
            <div class="modal-body" id="edit_lvcc">
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="updatett()">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!--Modal Wide Width-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Đồng ý xóa?</h4>
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
<script>
    $('#add_manganh').change(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'GET',
            url: '/companylvcc/getmanghe',
            data: {
                _token: CSRF_TOKEN,
                manganh: $(this).val()
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    $('#add_manghe').replaceWith(data.message);
                    $('#add_mahuyen').val('');
                    getDvQl();
                }
            }
        });
    });
    function getDvQl(){
        $('#add_manghe').change(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'GET',
                url: '/companylvcc/getdvql',
                data: {
                    _token: CSRF_TOKEN,
                    manghe: $(this).val(),
                    manganh: $('#add_manganh').val()
                },
                dataType: 'JSON',
                success: function (data) {

                    if (data.status == 'success')
                        $('#add_mahuyen').replaceWith(data.message);
                }

            });
        });
    }

    function capnhatts(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/ttdntdct/store',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                manganh: $('#add_manganh').val(),
                manghe: $('#add_manghe').val(),
                mahuyen: $('#add_mahuyen').val(),
                maxa:$('#maxa').val(),
                type: $('#type').val()
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
                }else {
                    toastr.error('Trùng lặp ngành nghề', "Lỗi!!!");
                    $('#modal-create').modal("hide");
                }
            }
        })
    }

    function getidedit(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/ttdntdct/edit',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id,
                mahs: $('#mahs').val()
            },
            dataType: 'JSON',
            success: function (data) {
                if(data.status == 'success')
                    $('#edit_lvcc').replaceWith(data.message);
            }
        })
    }

    function updatett(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/ttdntdct/update',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                mahuyen: $('#edit_mahuyen').val(),
                maxa: $('#maxa').val(),
                id: $('#edit_id').val()
            },
            dataType: 'JSON',
            success: function (data) {
                if(data.status == 'success') {
                    toastr.success("Chỉnh sửa thông tin thành công!");
                    $('#dsts').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-edit').modal("hide");
                }
            }
        })
    }
    function getid(id){
        document.getElementById("iddelete").value=id;
    }
    function deleteRow() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/ttdntdct/delete',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: $('input[name="iddelete"]').val(),
                maxa: $('#maxa').val()
            },
            dataType: 'JSON',
            success: function (data) {
                //if(data.status == 'success') {
                toastr.success("Bạn đã xóa thông tin thành công!", "Thành công!");
                $('#dsts').replaceWith(data.message);
                jQuery(document).ready(function () {
                    TableManaged.init();
                });

                $('#modal-delete').modal("hide");

                //}
            }
        })
    }
</script>