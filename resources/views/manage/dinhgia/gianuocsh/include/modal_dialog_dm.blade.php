<script>
    function ClickAdd(){
        var str = '';
        var ok = true;

//        if (!$('#add_madoituong').val()) {
//            str += '  - Mã đối tượng \n';
//            $('#add_madoituong').parent().addClass('has-error');
//            ok = false;
//        }

        if (!$('#add_doituongsd').val()) {
            str += '  - Đối tượng sử dụng \n';
            $('#add_doituongsd').parent().addClass('has-error');
            ok = false;
        }

        if (ok == false) {
            //alert('Các trường: \n' + str + 'Không được để trống');
            toastr.error('Thông tin: \n' + str + 'Không được để trống','Lỗi!.');
            $("form").submit(function (e) {
                e.preventDefault();
            });
        }
        else {
            $("#frm_add").unbind('submit').submit();
            var btn = document.getElementById('submitform');
            btn.disabled = true;
            btn.innerText = 'Loading...'
        }
        /*$('#frm_add').submit();*/
    }

    function ClickUpdate(){
        var str = '';
        var ok = true;

//        if (!$('#edit_madoituong').val()) {
//            str += '  - Mã đối tượng \n';
//            $('#edit_madoituong').parent().addClass('has-error');
//            ok = false;
//        }

        if (!$('#edit_doituongsd').val()) {
            str += '  - Đối tượng sử dụng \n';
            $('#edit_doituongsd').parent().addClass('has-error');
            ok = false;
        }

        if (ok == false) {
            //alert('Các trường: \n' + str + 'Không được để trống');
            toastr.error('Thông tin: \n' + str + 'Không được để trống','Lỗi!.');
            $("form").submit(function (e) {
                e.preventDefault();
            });
        }
        else {
            $("#frm_update").unbind('submit').submit();
            var btn = document.getElementById('submitform');
            btn.disabled = true;
            btn.innerText = 'Loading...'
        }
        /*$('#frm_update').submit();*/
    }

    function ClickDestroy(){
        $('#frm_destroy').submit();
    }
</script>
<!--Modal add-->
<div id="add-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'dmgianuocsachsinhhoat/add','id' => 'frm_add'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thêm mới danh mục giá nước sinh hoạt</h4>
            </div>
            <div class="modal-body">
                {{--<div class="row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label">Mã đối tượng<span class="require">*</span></label>--}}
                            {{--<input name="add_madoituong" id="add_madoituong" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đối tượng sử dụng<span class="require">*</span></label>
                            <input name="add_doituongsd" id="add_doituongsd" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickAdd()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!--Modal edit-->
<div id="modal-edit-node" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'dmgianuocsachsinhhoat/update', 'id' => 'frm_update', 'class'=>'horizontal-form']) !!}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin danh mục giá nước sạch sinh hoạt</h4>
            </div>
            <div class="modal-body" id="edit_node">
                {{--<div class="row">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="control-label">Mã đối tượng<span class="require">*</span></label>--}}
                            {{--<input name="edit_madoituong" id="edit_madoituong" class="form-control">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đối tượng sử dụng<span class="require">*</span></label>
                            <input name="edit_doituongsd" id="edit_doituongsd" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="edit_id" id="edit_id">
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary" onclick="ClickUpdate()">Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!--Modal destroy-->
<div id="destroy-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'dmgianuocsachsinhhoat/destroy','id' => 'frm_destroy'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>

                <input type="hidden" name="destroy_id" id="destroy_id">

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickDestroy()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>