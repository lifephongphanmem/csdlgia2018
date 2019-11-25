<div id="create-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
    {!! Form::open(['url'=>'thuetainguyen/create','id' => 'frm_create','method'=>'post'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thêm mới bảng giá tính thuế tài nguyên trên địa bàn</h4>
            </div>

            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Nhóm tài nguyên</label>
                            <select name="add_manhom" id="add_manhom" class="form-control">
                                @foreach($modeldm as $dm)
                                    <option value="{{$dm->manhom}}">{{$dm->tennhom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Năm báo cáo</label>
                            <select name="add_nam" id="add_nam" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickcreate()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!--Modal Delete-->
<div id="destroy-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'thuetainguyen/delete','id' => 'frm_delete'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý xoá?</h4>
                <input type="hidden" name="iddelete" id="iddelete">

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickdelete()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script>
    function clickdelete(){
        $('#frm_delete').submit();
    }
</script>
<!--Modal Hoàn thành-->
<div id="hoanthanh-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'thuetainguyen/hoanthanh','id' => 'frm_hoanthanh'])!!}
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
    {!! Form::open(['url'=>'thuetainguyen/huyhoanthanh','id' => 'frm_huyhoanthanh'])!!}
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
<!--Modal Công bố-->
<div id="congbo-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'thuetainguyen/congbo','id' => 'frm_congbo'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý công bố hồ sơ?</h4>

                <input type="hidden" name="idcongbo" id="idcongbo">

            </div>
            <div class="modal-body">
                <p style="color: #0000FF">Hồ sơ sẽ được công bố lên trang công bố của tỉnh!</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickcongbo()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<div id="huycongbo-modal" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    {!! Form::open(['url'=>'thuetainguyen/huycongbo','id' => 'frm_huycongbo'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Đồng ý hủy công bố hồ sơ?</h4>

                <input type="hidden" name="idhuycongbo" id="idhuycongbo">

            </div>
            <div class="modal-body">
                <p style="color: #0000FF">Hồ sơ sẽ được hủy công bố lên trang công bố của tỉnh!</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickhuycongbo()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!--Modal File mẫu-->
<div id="modal-filemau" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade bs-modal-lg">
    {!! Form::open(['url'=>'/thuetainguyen/export','id' => 'frm_export','method'=>'post'])!!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Xuất danh mục mặt hàng thuế tài nguyên</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Phân loại nhóm tài nguyên</label>
                            <select class="form-control" name="manhomex" id="manhomex">
                                @foreach($modeldm as $nhom)
                                    <option value="{{$nhom->manhom}}">{{$nhom->tennhom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="clickExport()">Đồng ý</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
<script>
    function clickhoanthanh(){
        $('#frm_hoanthanh').submit();
    }
    function clickcongbo(){
        $('#frm_congbo').submit();
    }
    function clickhuyhoanthanh(){
        $('#frm_huyhoanthanh').submit();
    }
    function clickhuycongbo(){
        $('#frm_huycongbo').submit();
    }
    function clickcreate(){
        $('#frm_create').submit();
    }
    function clickExport(){
        $('#frm_export').submit();
    }

</script>