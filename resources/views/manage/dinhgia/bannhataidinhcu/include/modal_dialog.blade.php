<script>
    function clickdeleteMulti(){
        $('#frm_deletemulti').submit();
    }
    function ClickUpdate(){
        var str = '';
        var ok = true;

        if (!$('#edit_tenduan').val()) {
            str += '  - Tên dự án \n';
            $('#edit_tenduan').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#edit_thoidiemkc').val()) {
            str += '  - Thời điểm khởi công \n';
            $('#edit_thoidiemkc').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#edit_thoidiemht').val()) {
            str += '  - Thời điểm hoàn thành \n';
            $('#edit_thoidiemht').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#edit_dongiaban').val()) {
            str += '  - Đơn giá bán \n';
            $('#edit_dongiaban').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#edit_dongiathuemua').val()) {
            str += '  - Đơn giá thuê mua \n';
            $('#edit_dongiathuemua').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#edit_ttqd').val()) {
            str += '  - Số quyết định phê duyệt giá \n';
            $('#edit_ttqd').parent().addClass('has-error');
            ok = false;
        }

        if (ok == false) {
            //alert('Các trường: \n' + str + 'Không được để trống');
            toastr.error('Thông tin: \n' + str + 'Không được để trống','Lỗi!.');
            $("#frm_update").submit(function (e) {
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
    function ClickAdd(){
        var str = '';
        var ok = true;

        if (!$('#add_tenduan').val()) {
            str += '  - Tên dự án \n';
            $('#add_tenduan').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#add_thoidiemkc').val()) {
            str += '  - Thời điểm khởi công \n';
            $('#add_thoidiemkc').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#add_thoidiemht').val()) {
            str += '  - Thời điểm hoàn thành \n';
            $('#add_thoidiemht').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#add_dongiaban').val()) {
            str += '  - Đơn giá bán \n';
            $('#add_dongiaban').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#add_dongiathuemua').val()) {
            str += '  - Đơn giá thuê mua \n';
            $('#add_dongiathuemua').parent().addClass('has-error');
            ok = false;
        }

        if (!$('#add_ttqd').val()) {
            str += '  - Số quyết định phê duyệt giá \n';
            $('#add_ttqd').parent().addClass('has-error');
            ok = false;
        }

//        if (!$('#add_ghichu').val()) {
//            str += '  - Ghi chú \n';
//            $('#add_ghichu').parent().addClass('has-error');
//            ok = false;
//        }

        if (ok == false) {
            //alert('Các trường: \n' + str + 'Không được để trống');
            toastr.error('Thông tin: \n' + str + 'Không được để trống','Lỗi!.');
            $("#frm_add").submit(function (e) {
                e.preventDefault();
            });
        }
        else {
            $("#frm_add").unbind('submit').submit();
        }

        /*$('#frm_add').submit();*/
    }
    function ClickCongBo(){
        $('#frm_congbo').submit();
    }
    function ClickHuyCongBo(){
        $('#frm_huycongbo').submit();
    }
    function clickCheckMulti(){
        $('#frm_checkmulti').submit();
    }
</script>

<!--Modal Delete-->
<div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'bannhataidinhcu/delete','id' => 'frm_deletemulti'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Năm<span class="require">*</span></label>
                            <select class="form-control" name="namdel" id="namdel">
                                @if ($nam_start = 2015 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="districtdel" id="districtdel">
                                <option value="all">--Tất cả các địa bàn--</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->district}}">{{$district->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdeleteMulti()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<!--Modal edit-->
<div id="modal-edit-node" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'bannhataidinhcu/update', 'id' => 'frm_update', 'class'=>'horizontal-form']) !!}
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin giá bán - thuê mua nhà tái định cư</h4>
            </div>
            <div class="modal-body" id="edit_node">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="edit_district" id="edit_district">
                                @foreach($districts as $district)
                                    <option value="{{$district->district}}">{{$district->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Tên dự án<span class="require">*</span></label>
                            <input name="edit_tenduan" id="edit_tenduan" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Thời điểm khởi công<span class="require">*</span></label>
                            {!!Form::text('edit_thoidiemkc',date('d/m/Y'), array('id' => 'edit_thoidiemkc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Thời điểm hoàn thành<span class="require">*</span></label>
                            {!!Form::text('edit_thoidiemht',date('d/m/Y'), array('id' => 'edit_thoidiemht','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn giá bán<span class="require">*</span></label>
                            <input type="text" name="edit_dongiaban" id="edit_dongiaban" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn giá thuê mua<span class="require">*</span></label>
                            <input type="text" name="edit_dongiathuemua" id="edit_dongiathuemua" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Số TTQĐ<span class="require">*</span></label>
                            <input name="edit_ttqd" id="edit_ttqd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Ghi chú<span class="require">*</span></label>
                            <input name="edit_ghichu" id="edit_ghichu" class="form-control">
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

{{--Model del--}}
<div id="destroy-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'bannhataidinhcu/destroy','id' => 'frm_destroy'])!!}
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

{{--Model add--}}
<div id="add-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'bannhataidinhcu/add','id' => 'frm_add'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thêm mới giá bán - thuê mua nhà tái định cư</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="add_district" id="add_district">
                                @foreach($districts as $district)
                                    <option value="{{$district->district}}">{{$district->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Tên dự án<span class="require">*</span></label>
                            <input name="add_tenduan" id="add_tenduan" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Thời điểm khởi công<span class="require">*</span></label>
                            {!!Form::text('add_thoidiemkc',null, array('id' => 'add_thoidiemkc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Thời điểm hoàn thành<span class="require">*</span></label>
                            {!!Form::text('add_thoidiemht',null, array('id' => 'add_thoidiemht','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn giá bán<span class="require">*</span></label>
                            <input type="text" name="add_dongiaban" id="add_dongiaban" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn giá thuê mua<span class="require">*</span></label>
                            <input type="text" name="add_dongiathuemua" id="add_dongiathuemua" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Số quyết định phê duyệt giá<span class="require">*</span></label>
                            <input name="add_ttqd" id="add_ttqd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Ghi chú<span class="require">*</span></label>
                            <input name="add_ghichu" id="add_ghichu" class="form-control">
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

{{--Model công bố--}}
<div id="congbo-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'bannhataidinhcu/congbo','id' => 'frm_congbo'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý công bố?</h4>

                <input type="hidden" name="congbo_id" id="congbo_id">

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickCongBo()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

{{--Model công bố--}}
<div id="huycongbo-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'bannhataidinhcu/huycongbo','id' => 'frm_huycongbo'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy công bố?</h4>

                <input type="hidden" name="huycongbo_id" id="huycongbo_id">

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickHuyCongBo()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<!--Modal Check-->
<div id="check-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'bannhataidinhcu/checkmulti','id' => 'frm_checkmulti'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý công bố/ hủy?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Trạng thái<span class="require">*</span></label>
                            <select class="form-control" name="trangthaicheck" id="trangthaicheck">
                                <option value="CB">Công bố</option>
                                <option value="HCB">Hủy công bố</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Năm<span class="require">*</span></label>
                            <select class="form-control" name="namcheck" id="namcheck">
                                @if ($nam_start = 2015 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{($i == date('Y')) ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="districtcheck" id="districtcheck">
                                <option value="all">--Tất cả các địa bàn--</option>
                                @foreach($districts as $district)
                                    <option value="{{$district->district}}">{{$district->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickCheckMulti()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>