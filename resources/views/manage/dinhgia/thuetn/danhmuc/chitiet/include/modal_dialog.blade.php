<script>
    function getId(id){
        document.getElementById("iddelete").value=id;
    }
    function ClickDelete(){
        $('#frm_delete').submit();
        var btn = document.getElementById('submitdelete');
        btn.disabled = true;
        btn.innerText = 'Loading...'
    }
    function ClickCreate(){
        var valid=true;
        var message='';
        var ten = $('#ten').val();

        if(ten == ''){
            valid=false;
            message +='Tên nhóm, loại tài nguyên không được bỏ trống \n';
        }
        if(valid){
            $("#frm_create").unbind('submit').submit();
            var btn = document.getElementById('submitcreate');
            btn.disabled = true;
            btn.innerText = 'Loading...'
        }else{
            $("#frm_create").submit(function (e) {
                e.preventDefault();
            });
            toastr.error(message,'Lỗi!.');
        }
    }
    function ClickUpdate(){
        var valid=true;
        var message='';
        var matn = $('#edit_matn').val();

        if(matn == ''){
            valid=false;
            message +='Mã tài nguyên không được bỏ trống \n';
        }
        if(valid){
            $("#frm_update").unbind('submit').submit();
            var btn = document.getElementById('submitupdate');
            btn.disabled = true;
            btn.innerText = 'Loading...'
        }else {
            $("#frm_update").submit(function (e) {
                e.preventDefault();
            });
            toastr.error(message, 'Lỗi!.');
        }
    }
    function ClickEdit(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: 'dmthuetn/show',
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (data) {
                $('#edit_ten').val(data.ten);
                $('#edit_dvt').val(data.dvt);
                $('#edit_cap1').val(data.cap1);
                $('#edit_cap2').val(data.cap2);
                $('#edit_cap3').val(data.cap3);
                $('#edit_cap4').val(data.cap4);
                $('#edit_cap5').val(data.cap5);
                $('#edit_level').val(data.level);
                $('#edit_theodoi').val(data.theodoi);
                $('#edit_id').val(data.id);
            }
        });
    }
    function ClickImportExcel(){
        var str = '';
        var ok = true;

        if (!$('#imex_ten').val()) {
            str += '  - Tên nhóm, loại tài nguyên \n';
            $('#imex_matn').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#imex_cap1').val()) {
            str += '  - Tên nhóm, loại tài nguyên cấp I \n';
            $('#imex_cap1').parent().addClass('has-error');
            ok = false;
        }
        if (!$('#imex_cap2').val()) {
            str += '  - Tên nhóm, loại tài nguyên cấp II \n';
            $('#imex_cap2').parent().addClass('has-error');
            ok = false;
        }
        if (!$('#imex_cap3').val()) {
            str += '  - Tên nhóm, loại tài nguyên cấp III \n';
            $('#imex_cap3').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#imex_cap4').val()) {
            str += '  - Tên nhóm, loại tài nguyên cấp IV \n';
            $('#imex_cap4').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#imex_cap5').val()) {
            str += '  - Tên nhóm, loại tài nguyên cấp V \n';
            $('#imex_cap5').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#imex_dvt').val()) {
            str += '  - Đơn vị tính\n';
            $('#imex_dvt').parent().addClass('has-error');
            ok = false;
        }
        if (!$('#imex_level').val()) {
            str += '  - Level\n';
            $('#imex_level').parent().addClass('has-error');
            ok = false;
        }


        if (!$('#tudong').val()) {
            str += '  - Dòng bắt đầu nhận dữ liệu \n';
            $('#tudong').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#dendong').val()) {
            str += '  - Đến dòng dữ liệu \n';
            $('#dendong').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#fexcel').val()) {
            str += '  - File Excel \n';
            $('#fexcel').parent().addClass('has-error');
            ok = false;
        }

        if (ok == false) {
            //alert('Các trường: \n' + str + 'Không được để trống');
            toastr.error('Thông tin: \n' + str + 'Không được để trống','Lỗi!.');
            $('#frm_importexcel').submit(function (e) {
                e.preventDefault();
            });
        }
        else {
            $('#frm_importexcel').unbind('submit').submit();
            var btn = document.getElementById('submitimex');
            btn.disabled = true;
            btn.innerText = 'Loading...'
        }
    }
</script>

<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['url'=>'dmthuetn','id' => 'frm_create'])!!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Thêm mới mặt hàng thuế tài nguyên?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Level<span class="require">*</span></label>
                            <select id="level" name="level" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp I<span class="require">*</span></label>
                            <input type="text" name="cap1" id="cap1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp II<span class="require">*</span></label>
                            <input type="text" name="cap2" id="cap2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp III<span class="require">*</span></label>
                            <input type="text" name="cap3" id="cap3" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp IV<span class="require">*</span></label>
                            <input type="text" name="cap4" id="cap4" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp V<span class="require">*</span></label>
                            <input type="text" name="cap5" id="cap5" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                            <input type="dvt" name="dvt" id="matn" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Tên nhóm, loại tài nguyên<span class="require">*</span></label>
                            <input type="text" name="ten" id="ten" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="manhom" id="manhom" value="{{$inputs['manhom']}}">
            <div class="modal-footer">
                <button type="submit" class="btn blue" onclick="ClickCreate()" id="submitcreate">Đồng ý</button>
                <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--Model-edit-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Chỉnh sửa nhóm loại rừng?</h4>
            </div>
            {!! Form::open(['url'=>'dmthuetn/update','id' => 'frm_update'])!!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Level<span class="require">*</span></label>
                            <select id="edit_level" name="edit_level" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp I<span class="require">*</span></label>
                            <input type="text" name="edit_cap1" id="edit_cap1" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp II<span class="require">*</span></label>
                            <input type="text" name="edit_cap2" id="edit_cap2" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp III<span class="require">*</span></label>
                            <input type="text" name="edit_cap3" id="edit_cap3" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp IV<span class="require">*</span></label>
                            <input type="text" name="edit_cap4" id="edit_cap4" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp V<span class="require">*</span></label>
                            <input type="text" name="edit_cap5" id="edit_cap5" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                            <input type="dvt" name="edit_dvt" id="edit_dvt" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Tên nhóm, loại tài nguyên<span class="require">*</span></label>
                            <input type="text" name="edit_ten" id="edit_ten" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Theo dõi<span class="require">*</span></label>
                            <select id="edit_theodoi" name="edit_theodoi" class="form-control">
                                <option value="TD">Theo dõi</option>
                                <option value="KTD">Không theo dõi</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="modal-footer">
                <button type="submit" class="btn blue" onclick="ClickUpdate()" id="submitupdate">Đồng ý</button>
                <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
            </div>
            {!! Form::close() !!}

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['url'=>'dmthuetn/delete','id' => 'frm_delete'])!!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Đồng ý xóa?</h4>
            </div>
            <input type="hidden" name="iddelete" id="iddelete">
            <div class="modal-footer">
                <button type="submit" class="btn blue" onclick="ClickDelete()" id="submitdelete">Đồng ý</button>
                <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-importexcel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Nhận dữ liệu từ file excel</h4>
            </div>
            {!! Form::open(['url'=>'/dmthuetn/importexcel', 'method'=>'post' , 'files'=>true, 'id' => 'frm_importexcel','enctype'=>'multipart/form-data']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="control-lable"><b style="color: #0000ff;">{{$nhom->tennhom}}</b></label>
                        <input type="hidden" id="imex_manhom" name="imex_manhom" value="{{$inputs['manhom']}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Level<span class="require">*</span></label>
                            <input type="text" name="imex_level" id="imex_level" class="form-control" value="A">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp I<span class="require">*</span></label>
                            <input type="text" name="imex_cap1" id="imex_cap1" class="form-control" value="B">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp II<span class="require">*</span></label>
                            <input type="text" name="imex_cap2" id="imex_cap2" class="form-control" value="C">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp III<span class="require">*</span></label>
                            <input type="text" name="imex_cap3" id="imex_cap3" class="form-control" value="D">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp IV<span class="require">*</span></label>
                            <input type="text" name="imex_cap4" id="imex_cap4" class="form-control" value="E">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Cấp V<span class="require">*</span></label>
                            <input type="text" name="imex_cap5" id="imex_cap5" class="form-control" value="F">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tên tài nguyên<span class="require">*</span></label>
                            <input type="dvt" name="imex_ten" id="imex_ten" class="form-control" value="G">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                            <input type="dvt" name="imex_dvt" id="imex_dvt" class="form-control" value="H">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Từ dòng<span class="require">*</span></label>
                            {!!Form::text('tudong', '4', array('id' => 'tudong','class' => 'form-control required','data-mask'=>'fdecimal'))!!}
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">Đến dòng</label>
                            {!!Form::text('dendong', '111', array('id' => 'dendong','class' => 'form-control','data-mask'=>'fdecimal'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Theo dõi<span class="require">*</span></label>
                            <input id="fexcel" name="fexcel" type="file"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn blue" onclick="ClickImportExcel()" id="submitimex">Đồng ý</button>
                <button type="button" class="btn default" data-dismiss="modal">Hủy</button>
            </div>
            {!! Form::close() !!}

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>