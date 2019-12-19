<h4 class="form-section" style="color: #0000ff">Thông tin tỷ lệ phần trăm (%) chất lượng cờn lại của nhà</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <button type="button" data-target="#modal-create-clcl" data-toggle="modal" class="btn btn-success btn-xs" onclick="clearFormClcl()"><i class="fa fa-plus"></i>&nbsp;Thêm mới</button>
            &nbsp;
        </div>
    </div>
    <!--/span-->
</div>
<div class="row" id="bangclcl">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="text-align: center">Cấp nhà</th>
                <th style="text-align: center" width="10%">Thời gian sử dung (năm)</th>
                <th style="text-align: center" width="10%">Tỷ lệ hao mòn (%/năm)</th>
                <th width="15%" style="text-align: center">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modelctclcl as $key=>$ct)
                <tr>
                    <td style="text-align: left">{{$ct->capnha}}</td>
                    <td style="text-align: center">{{dinhdangsothapphan($ct->thoigiansd,3)}}</td>
                    <td style="text-align: center">{{dinhdangsothapphan($ct->thoigiansd,3)}}</td>
                    <td>
                        <button type="button" data-target="#modal-edit-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="EditClcl({{$ct->id}})"><i class="fa fa-edit"></i>&nbsp;Chỉnh sửa</button>
                        <button type="button" data-target="#modal-delete-clcl" data-toggle="modal" class="btn btn-default btn-xs mbs" onclick="GetIdClcl({{$ct->id}})" ><i class="fa fa-trash-o"></i>&nbsp;Xóa</button>
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
            <label class="control-label">Ghi chú tỷ lệ % chất lượng còn lại của nhà<span class="require">*</span></label>
            {!! Form::textarea('ghichuclcl', null,  array('id' => 'soqd','class' => 'form-control required','row'=>'4','col'=>5)) !!}
        </div>
    </div>

</div>



<!--Model Create-->
<div class="modal fade bs-modal-lg" id="modal-create-clcl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thêm mới thông tin % chất lượng còn lại của nhà</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Cấp nhà</b><span class="require">*</span></label>
                            <div><input type="text" id="capnhaclcl" name="capnhaclcl" class="form-control"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Thời gian sử dụng (năm)</b><span class="require">*</span></label>
                            <div><input type="text" style="text-align: right" id="thoigiansd" name="thoigiansd" class="form-control" data-mask="fdecimal"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Tỷ lệ hao mòn (%/năm)</b><span class="require">*</span></label>
                            <div><input type="text" style="text-align: right" id="tylehm" name="tylehm" class="form-control" data-mask="fdecimal"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="CreateClcl()">Thêm mới</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Model Eđit-->
<div class="modal fade bs-modal-lg" id="modal-edit-clcl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Chỉnh sửa thông tin % chất lượng còn lại của nhà</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Cấp nhà</b><span class="require">*</span></label>
                            <div><input type="text" id="edit_capnhaclcl" name="edit_capnhaclcl" class="form-control"></div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Thời gian sử dụng (năm)</b><span class="require">*</span></label>
                            <div><input type="text" style="text-align: right" id="edit_thoigiansd" name="edit_thoigiansd" class="form-control" data-mask="fdecimal"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"><label for="selGender" class="control-label"><b>Tỷ lệ hao mòn (%/năm)</b><span class="require">*</span></label>
                            <div><input type="text" style="text-align: right" id="edit_tylehm" name="edit_tylehm" class="form-control" data-mask="fdecimal"></div>
                        </div>
                    </div>
                    <input type="hidden" id="edit_idclcl" name="edit_idclcl">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="UpdateClcl()">Cập nhật</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Model Delete-->
<div class="modal fade" id="modal-delete-clcl" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Đồng ý xóa thông tin % chất lượng còn lại của nhà?</h4>
            </div>
            <input type="hidden" id="iddeleteclcl" name="iddeleteclcl">
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Thoát</button>
                <button type="button" class="btn btn-primary" onclick="DelClcl()">Đồng ý</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    function clearFormClcl(){
        $('#capnhaclcl').val('');
        $('#thoigiansd').val('');
        $('#tylehm').val('0');
    }
    function CreateClcl(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/lptbnhaclcl/add',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                mahs: $('#mahs').val(),
                capnha: $('#capnhaclcl').val(),
                thoigiansd: $('#thoigiansd').val(),
                tylehm: $('#tylehm').val(),
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin tính lệ phí trước bạ", "Thành công!");
                    $('#bangclcl').replaceWith(data.message);
//                    jQuery(document).ready(function() {
//                        TableManaged.init();
//                    });
                    $('#modal-create-clcl').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
            }
        })

    }
    function EditClcl(id) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        //alert(id);
        $.ajax({
            url: '/lptbnhaclcl/edit',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#edit_capnhaclcl').val(data.capnha);
                $('#edit_thoigiansd').val(data.thoigiansd);
                $('#edit_tylehm').val(data.tylehm);
                $('#edit_idclcl').val(data.id);
            }
        })
    }
    function UpdateClcl(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/lptbnhaclcl/update',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: $('#edit_idclcl').val(),
                capnha: $('#edit_capnhaclcl').val(),
                thoigiansd: $('#edit_thoigiansd').val(),
                tylehm: $('#edit_tylehm').val(),
                mahs: $('#mahs').val(),
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin tính lệ phí trước bạ", "Thành công!");
                    $('#bangclcl').replaceWith(data.message);
//                    jQuery(document).ready(function() {
//                        TableManaged.init();
//                    });
                    $('#modal-edit-clcl').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa nhập!", "Lỗi!");
            }
        })

    }
    function GetIdClcl(id){
        document.getElementById("iddeleteclcl").value=id;
    }
    function DelClcl() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/lptbnhaclcl/del',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: $('#iddeleteclcl').val(),
                mahs: $('#mahs').val(),
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status == 'success') {
                    toastr.success("Cập nhật thông tin tính lệ phí trước bạ", "Thành công!");
                    $('#bangclcl').replaceWith(data.message);
//                    jQuery(document).ready(function() {
//                        TableManaged.init();
//                    });
                    $('#modal-delete-clcl').modal("hide");

                } else
                    toastr.error("Bạn cần kiểm tra lại thông tin vừa xóa!", "Lỗi!");
            }
        })
    }
</script>