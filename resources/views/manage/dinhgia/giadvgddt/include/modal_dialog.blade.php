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
    {!! Form::open(['url'=>'giadvgiaoducdaotao/delete','id' => 'frm_deletemulti'])!!}
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
                                    <option value="{{$i.'-'.($i+1)}}" {{($i.'-'.($i+1)) == $inputs['nam'] ? 'selected' : ''}}>{{$i.'-'.($i+1)}}</option>
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
                                <option value="All">--Tất cả các địa bàn--</option>
                                {{--<option value="Thành thị">Thành thị</option>--}}
                                {{--<option value="Nông thôn">Nông thôn</option>--}}
                                {{--<option value="Miền núi">Miền núi</option>--}}
                                {{--<option value="Hải đảo">Hải đảo</option>--}}
                                @foreach($diabans as $diaban)
                                    <option value="{{$diaban->district}}">{{$diaban->diaban}}</option>
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
    {!! Form::open(['url'=>'giadvgiaoducdaotao/update', 'id' => 'frm_update', 'class'=>'horizontal-form']) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin giá dịch vụ giáo dục đào tạo</h4>
            </div>
            <div class="modal-body" id="edit_node">

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
    {!! Form::open(['url'=>'giadvgiaoducdaotao/destroy','id' => 'frm_destroy'])!!}
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
    {!! Form::open(['url'=>'giadvgiaoducdaotao/add','id' => 'frm_add'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thêm mới giá dịch vụ giáo dục đào tạo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Năm<span class="require">*</span></label>
                            <select class="form-control" name="add_nam" id="add_nam">
                                @if ($nam_start = 2015 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i.'-'.($i+1)}}" {{($i.'-'.($i+1)) == (date('Y').'-'.(date('Y')+1)) ? 'selected' : ''}}>{{$i.'-'.($i+1)}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Địa bàn<span class="require">*</span></label>
                            <select class="form-control" name="add_district" id="add_district">
                                {{--<option value="Thành thị">Thành thị</option>--}}
                                {{--<option value="Nông thôn">Nông thôn</option>--}}
                                {{--<option value="Miền núi">Miền núi</option>--}}
                                {{--<option value="Hải đảo">Hải đảo</option>--}}
                                @foreach($diabans as $diaban)
                                    <option value="{{$diaban->district}}">{{$diaban->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Khu vực<span class="require">*</span></label>
                            <textarea name="add_khuvuc" id="add_khuvuc" class="form-control"></textarea>
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
                            <input type="text" name="add_dongia" id="add_dongia" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Thông tư quyết định<span class="require">*</span></label>
                            <input type="text" name="add_ttqd" id="add_ttqd" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Ghi chú<span class="require">*</span></label>
                            <input type="text" name="add_ghichu" id="add_ghichu" class="form-control">
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
    {!! Form::open(['url'=>'giadvgiaoducdaotao/congbo','id' => 'frm_congbo'])!!}
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
    {!! Form::open(['url'=>'giadvgiaoducdaotao/huycongbo','id' => 'frm_huycongbo'])!!}
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
    {!! Form::open(['url'=>'giadvgiaoducdaotao/checkmulti','id' => 'frm_checkmulti'])!!}
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
                               <option value="HT">Hủy công bố</option>
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
                                    <option value="{{$i.'-'.($i+1)}}" {{($i.'-'.($i+1)) == (date('Y').'-'.(date('Y')+1)) ? 'selected' : ''}}>{{$i.'-'.($i+1)}}</option>
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
                                <option value="All">--Tất cả các địa bàn--</option>
                                {{--<option value="Thành thị">Thành thị</option>--}}
                                {{--<option value="Nông thôn">Nông thôn</option>--}}
                                {{--<option value="Miền núi">Miền núi</option>--}}
                                {{--<option value="Hải đảo">Hải đảo</option>--}}
                                @foreach($diabans as $diaban)
                                    <option value="{{$diaban->district}}">{{$diaban->diaban}}</option>
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
<!--Modal Hoàn thành-->
<div id="hoanthanh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'giadvgiaoducdaotao/hoanthanh','id' => 'frm_hoanthanh'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn thành hồ sơ?</h4>

                <input type="hidden" name="idhoanthanh" id="idhoanthanh">

            </div>
            <div class="modal-body">
                <p style="color: #0000FF">Hồ sơ đã hoàn thành sẽ không được phép chỉnh sửa và xóa hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhoanthanh()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!--Modal Hủy Hoàn thành-->
<div id="huyhoanthanh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'giadvgiaoducdaotao/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy hoàn thành hồ sơ?</h4>

                <input type="hidden" name="idhuyhoanthanh" id="idhuyhoanthanh">

            </div>
            <div class="modal-body">
                <p style="color: #0000FF">Hồ sơ Bị hủy sẽ chuyển lại cho cơ quan nhập chủ quản có thể chỉnh sửa hồ sơ!</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhuyhoanthanh()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>