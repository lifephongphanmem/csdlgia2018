<script>
    function clickdeleteMulti(){
        $('#frm_deletemulti').submit();
    }
    function ClickUpdate(){
        $('#frm_update').submit();
    }
    function ClickDestroy(){
        $('#frm_destroy').submit();
    }
    function ClickAdd(){
        $('#frm_add').submit();
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
    {!! Form::open(['url'=>'gianuocsachsinhhoat/delete','id' => 'frm_deletemulti'])!!}
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
                            <select class="form-control" name="diabandel" id="diabandel">
                                <option value="All">--Tất cả các địa bàn--</option>
                                <option value="Thành thị">Thành thị</option>
                                <option value="Nông thôn">Nông thôn</option>
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
    {!! Form::open(['url'=>'gianuocsachsinhhoat/update', 'id' => 'frm_update', 'class'=>'horizontal-form']) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin giá nước sạch sinh hoạt</h4>
            </div>
            <div class="modal-body" id="edit_node">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ngày áp dụng<span class="require">*</span></label>
                            {!!Form::text('edit_ngayapdung',null, array('id' => 'edit_ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="edit_diaban" id="edit_diaban">
                                <option value="Thành thị">Thành thị</option>
                                <option value="Nông thôn">Nông thôn</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đối tượng<span class="require">*</span></label>
                            <textarea name="edit_doituong" id="edit_doituong" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Mô tả<span class="require">*</span></label>
                            <textarea name="edit_mota" id="edit_mota" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn giá<span class="require">*</span></label>
                            <input type="text" name="edit_thanhtien" id="edit_thanhtien" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                            <input name="edit_dvt" id="edit_dvt" class="form-control">
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
    {!! Form::open(['url'=>'gianuocsachsinhhoat/destroy','id' => 'frm_destroy'])!!}
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
    {!! Form::open(['url'=>'gianuocsachsinhhoat/add','id' => 'frm_add'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thêm mới giá nước sạch sinh hoạt</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Ngày áp dụng<span class="require">*</span></label>
                            {!!Form::text('add_ngayapdung',null, array('id' => 'add_ngayapdung','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="add_diaban" id="add_diaban">
                                <option value="Thành thị">Thành thị</option>
                                <option value="Nông thôn">Nông thôn</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đối tượng<span class="require">*</span></label>
                            <textarea name="add_doituong" id="add_doituong" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Mô tả<span class="require">*</span></label>
                            <textarea name="add_mota" id="add_mota" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn giá<span class="require">*</span></label>
                            <input type="text" name="add_thanhtien" id="add_thanhtien" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Đơn vị tính<span class="require">*</span></label>
                            <input name="add_dvt" id="add_dvt" class="form-control">
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
    {!! Form::open(['url'=>'gianuocsachsinhhoat/congbo','id' => 'frm_congbo'])!!}
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
    {!! Form::open(['url'=>'gianuocsachsinhhoat/huycongbo','id' => 'frm_huycongbo'])!!}
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
    {!! Form::open(['url'=>'gianuocsachsinhhoat/checkmulti','id' => 'frm_checkmulti'])!!}
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
                                    <option value="{{$i}}" {{($i) == date('Y') ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="diabancheck" id="diabancheck">
                                <option value="All">--Tất cả các địa bàn--</option>
                                <option value="Thành thị">Thành thị</option>
                                <option value="Nông thôn">Nông thôn</option>
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
@include('includes.script.create-header-scripts')