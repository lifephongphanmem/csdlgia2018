
<script>
    function ClickBC1(url){
        $('#frm_bc1').attr('action',url);
        $('#frm_bc1').submit();
    }
</script>

<!--Modal Thoại PL1-->
<div id="pl1-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'','target'=>'_blank' , 'id' => 'frm_bc1', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo tổng hợp giá hàng hóa thị trường</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><b>Nhóm hàng hóa dịch vụ khác</b></label>
                            <select name="manhom" id="manhom" class="form-control">
                                @foreach($modelnhomhhdvk as $nhomhhdvk)
                                <option value="{{$nhomhhdvk->manhom}}">{{$nhomhhdvk->tennhom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><b>Ngày báo cáo liền kề đến ngày</b></label>
                            <input type="date" id="ngayapdunglk" name="ngayapdunglk" class="form-control" value="{{intval(date('Y')).'-01-01'}}" style="text-align: center">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                        <label><b>Ngày báo cáo đến ngày</b></label>
                            <input type="date" id="ngayapdung" name="ngayapdung" class="form-control" value="{{intval(date('Y')).'-12-31'}}" style="text-align: center">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC1('/reportshanghoadichvukhac/bc1')">Đồng ý</button>
                <!--button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBCExcel('/reports/thuetn/bcgiathuetnexcel')">Xuất Excel</button-->
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

