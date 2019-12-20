<h4 class="form-section" style="color: #0000ff">Thông tin bảng giá nhà xây dựng mới</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <button type="button" data-target="#modal-create-xdm" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearFormXdm()"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
            &nbsp;
        </div>
    </div>
    <!--/span-->
</div>
<div class="row" id="banggiaxdm">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover" id="sample_3">
            <thead>
            <tr>
                <th width="2%" style="text-align: center">STT</th>
                <th style="text-align: center">Loại công trình</th>
                <th style="text-align: center" width="5%">Cấp nhà</th>
                <th style="text-align: center" width="10%">Đơn vị tính</th>
                <th style="text-align: center" width="10%">Đơn giá</th>
                <th width="15%" style="text-align: center">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modelctxdm as $key=>$ct)
                <tr>
                    <td style="text-align: center">{{$key +1}}</td>
                    <td>{{$ct->loaict}}</td>
                    <td style="text-align: center">{{$ct->capnha}}</td>
                    <td style="text-align: center">{{$ct->dvt}}</td>
                    <td style="text-align: right;font-weight: bold">{{number_format($ct->dongia)}}</td>
                    <td>
                        <button type="button" data-target="#modal-edit-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditXdm({{$ct->id}})"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                        <button type="button" data-target="#modal-delete-xdm" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdXdm({{$ct->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Ghi chú bảng giá nhà xây mới<span class="require">*</span></label>
            {!! Form::textarea('ghichuxdm', null,  array('id' => 'ghichuclcl','class' => 'form-control required','row'=>'4','col'=>5)) !!}
        </div>
    </div>

</div>

<!--Model Create-->
<div class="modal fade bs-modal-lg" id="modal-create-xdm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thêm mới thông tin bảng giá nhà xây dựng mới</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Loại công trình</b><span class="require">*</span></label>
                            <div><input type="text" id="loaict" name="loaict" class="form-control"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Cấp nhà</b><span class="require">*</span></label>
                            <div><select name="capnhaxdm" id="capnhaxdm" class="form-control">
                                    <option value="">--Chọn cấp nhà--</option>
                                    <option value="I">Cấp I</option>
                                    <option value="II">Cấp II</option>
                                    <option value="III">Cấp III</option>
                                    <option value="IV">Cấp IV</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>
                            <div><input type="text" id="dvt" name="dvt" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá</b><span class="require">*</span></label>
                            <div><input type="text" style="text-align: right" id="dongia" name="dongia" class="form-control" data-mask="fdecimal"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="CreateXdm()">Thêm mới</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Model Eđit-->
<div class="modal fade bs-modal-lg" id="modal-edit-xdm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Chỉnh sửa thông tin nhà xây dựng mới</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Loại công trình</b><span class="require">*</span></label>
                            <div><input type="text" id="edit_loaict" name="edit_loaict" class="form-control"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Cấp nhà</b><span class="require">*</span></label>
                            <div><select name="edit_capnhaxdm" id="edit_capnhaxdm" class="form-control">
                                    <option value="">--Chọn cấp nhà--</option>
                                    <option value="I">Cấp I</option>
                                    <option value="II">Cấp II</option>
                                    <option value="III">Cấp III</option>
                                    <option value="IV">Cấp IV</option>
                                </select></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Đơn vị tính</b><span class="require">*</span></label>
                            <div><input type="text" id="edit_dvt" name="edit_dvt" class="form-control"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Đơn giá</b><span class="require">*</span></label>
                            <div><input type="text" style="text-align: right" id="edit_dongia" name="edit_dongia" class="form-control" data-mask="fdecimal"></div>
                        </div>
                    </div>
                    <input type="hidden" id="edit_idxdm" name="edit_idxdm">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="UpdateXdm()">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Model Delete-->
<div class="modal fade" id="modal-delete-xdm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Đồng ý xóa thông tin nhà xây dựng mới?</h4>
            </div>
            <input type="hidden" id="iddeletexdm" name="iddeletexdm">
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="DelXdm()">Đồng ý</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function clearFormXdm(){
        $('#loaict').val('');
        $('#capnhaxdm').val('');
        $('#dvt').val('');
        $('#dongia').val('0');
    }
    function CreateXdm(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/lptbnhaxdm/add',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                mahs: $('#mahs').val(),
                loaict: $('#loaict').val(),
                capnha: $('#capnhaxdm').val(),
                dvt: $('#dvt').val(),
                dongia: $('#dongia').val(),
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin tính lệ phí trước bạ", "Thành công!");
                    $('#banggiaxdm').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-create-xdm').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
            }
        })

    }
    function EditXdm(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //alert(id);
        $.ajax({
            url: '/lptbnhaxdm/edit',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#edit_loaict').val(data.loaict);
                $('#edit_capnhaxdm').val(data.capnha);
                $('#edit_dvt').val(data.dvt);
                $('#edit_dongia').val(data.dongia);
                $('#edit_idxdm').val(data.id);
            }
        })
    }
    function UpdateXdm(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/lptbnhaxdm/update',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: $('#edit_idxdm').val(),
                loaict: $('#edit_loaict').val(),
                capnha: $('#edit_capnhaxdm').val(),
                dvt: $('#edit_dvt').val(),
                dongia: $('#edit_dongia').val(),
                mahs: $('#mahs').val(),
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin tính lệ phí trước bạ", "Thành công!");
                    $('#banggiaxdm').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-edit-xdm').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
            }
        })

    }
    function GetIdXdm(id){
        document.getElementById("iddeletexdm").value=id;
    }
    function DelXdm() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/lptbnhaxdm/del',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: $('#iddeletexdm').val(),
                mahs: $('#mahs').val(),
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin tính lệ phí trước bạ", "Thành công!");
                    $('#banggiaxdm').replaceWith(data.message);
                    jQuery(document).ready(function() {
                        TableManaged.init();
                    });
                    $('#modal-delete-xdm').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa xóa!", "Lỗi!");
            }
        })
    }
</script>