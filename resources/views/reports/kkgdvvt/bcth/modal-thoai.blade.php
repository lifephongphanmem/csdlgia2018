
<script>
    function ClickBC1(){
        $('#frm_BC1').submit();
    }
    function ClickBC2(){
        $('#frm_BC2').submit();
    }
</script>

<!--Modal Thoại BC1-->
<div id="BC1-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>$url.'BC1','target'=>'_blank' , 'id' => 'frm_BC1', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo thống kê các đơn vị kê khai giá trong khoảng thời gian</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="{{intval(date('Y')).'-01-01'}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="{{intval(date('Y')).'-12-31'}}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBC1()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại BC2-->
<div id="BC2-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>$url.'BC2','target'=>'_blank' , 'id' => 'frm_BC2', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo thống kê chi tiết đơn vị kê khai giá trong khoảng thời gian</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="{{intval(date('Y')).'-01-01'}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="{{intval(date('Y')).'-12-31'}}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBC2()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>