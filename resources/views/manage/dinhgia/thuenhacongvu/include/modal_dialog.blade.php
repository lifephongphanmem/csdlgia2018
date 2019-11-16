<script>
    function clickdeleteMulti(){
        $('#frm_deletemulti').submit();
    }
    function ClickUpdate(){
        var str = '';
        var ok = true;

        if($('#edit_tenduan').val()==''){
            str += ' - Tên dự án\n';
            ok = false;
        }
        if($('#edit_thoidiemkc').val()==''){
            str += '  - Thời điểm khởi công \n';
            ok = false;
        }
        if($('#edit_thoidiemht').val()==''){
            str += '  - Thời điểm hoàn thành \n';
            ok = false;
        }
        if($('#edit_dongiathue').val()==''){
            str += '  - Đơn giá thuê \n';
            ok = false;
        }
        if($('#edit_ttqd').val()==''){
            str += '  - Số quyết định phê duyệt giá \n';
            ok = false;
        }
        if($('#edit_diaban').val()==''){
            str += '  - Địa bàn \n';
            ok = false;
        }
        //Kết quả
        if ( ok == false){
            alert('Thông tin sau không được để trống: \n' + str );
            $("#frm_update").submit(function (e) {
                e.preventDefault();
            });
        }
        else{
            $("#frm_update").unbind('submit').submit();
        }
    }
    function ClickCongBo(){
        $('#frm_congbo').submit();
    }
    function ClickHuyCongBo(){
        $('#frm_huycongbo').submit();
    }
    function ClickHht(){
        $('#frm_huyhoanthanh').submit();
    }
    function ClickHt(){
        $('#frm_hoanthanh').submit();
    }
    function clickCheckMulti(){
        $('#frm_checkmulti').submit();
    }
    function ClickDestroy(){
        $('#frm_destroy').submit();
    }
    function ClickAdd(){
        var str = '';
        var ok = true;

        if($('#add_tenduan').val()==''){
            str += ' - Tên dự án \n';
            ok = false;
        }
        if($('#add_thoidiemkc').val()==''){
            str += '  - Thời điểm khởi công \n';
            ok = false;
        }
        if($('#add_thoidiemht').val()==''){
            str += '  - Thời điểm hoàn thành \n';
            ok = false;
        }
        if($('#add_diaban').val()==''){
            str += '  - Địa bàn \n';
            ok = false;
        }
        if($('#add_dongiathue').val()==''){
            str += '  - Đơn giá thuê \n';
            ok = false;
        }
        if($('#add_ttqd').val()==''){
            str += '  - Số quyết định phê duyệt giá \n';
            ok = false;
        }

        if ( ok == false){
            alert('Thông tin sau không được để trống: \n' + str );
            $("#frm_add").submit(function (e) {
                e.preventDefault();
            });
        }
        else{
            $("#frm_add").unbind('submit').submit();
        }
    }
</script>

<!--Modal Delete-->
<div id="delete-modal-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'giathuenhacongvu/delete','id' => 'frm_deletemulti'])!!}
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
    {!! Form::open(['url'=>'giathuenhacongvu/update', 'id' => 'frm_update', 'class'=>'horizontal-form']) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Chỉnh sửa thông tin giá thuê nhà ở công vụ</h4>
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
                            {!!Form::text('edit_thoidiemkc',null, array('id' => 'edit_thoidiemkc','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Thời điểm hoàn thành<span class="require">*</span></label>
                            {!!Form::text('edit_thoidiemht',null, array('id' => 'edit_thoidiemht','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đơn giá thuê<span class="require">*</span></label>
                            <input type="text" name="edit_dongiathue" id="edit_dongiathue" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
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
    {!! Form::open(['url'=>'giathuenhacongvu/destroy','id' => 'frm_destroy'])!!}
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
    {!! Form::open(['url'=>'giathuenhacongvu/add','id' => 'frm_add'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thêm mới giá thuê nhà ở công vụ</h4>
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Đơn giá thuê<span class="require">*</span></label>
                            <input type="text" name="add_dongiathue" id="add_dongiathue" class="form-control" data-mask="fdecimal" style="text-align: right; font-weight: bold">
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
    {!! Form::open(['url'=>'giathuenhacongvu/congbo','id' => 'frm_congbo'])!!}
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
    {!! Form::open(['url'=>'giathuenhacongvu/huycongbo','id' => 'frm_huycongbo'])!!}
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
    {!! Form::open(['url'=>'giathuenhacongvu/checkmulti','id' => 'frm_checkmulti'])!!}
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
<!--Modal Hoàn thành-->
<div id="hoanthanh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'giathuenhacongvu/hoanthanh','id' => 'frm_hoanthanh'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hoàn thành hồ sơ?</h4>

                <input type="hidden" name="hoanthanh_id" id="hoanthanh_id">

            </div>
            <div class="modal-body">
                <p style="color: #0000FF">Hồ sơ đã hoàn thành sẽ không được phép chỉnh sửa và xóa hồ sơ nữa!Bạn cần liên hệ cơ quan chủ quản để chỉnh sửa hồ sơ nếu cần!</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickHt()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!--Modal Hủy Hoàn thành-->
<div id="huyhoanthanh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'giathuenhacongvu/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy hoàn thành hồ sơ?</h4>

                <input type="hidden" name="huyhoanthanh_id" id="huyhoanthanh_id">

            </div>
            <div class="modal-body">
                <p style="color: #0000FF">Hồ sơ Bị hủy sẽ chuyển lại cho cơ quan nhập chủ quản có thể chỉnh sửa hồ sơ!</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickHht()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('includes.script.create-header-scripts')
