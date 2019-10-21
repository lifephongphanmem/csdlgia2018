
<script>
    function ClickBC1(url){
        $('#frm_bc1').attr('action',url);
        $('#frm_bc1').submit();
    }
    function ClickBC2(url){
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
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo tổng hợp kê khai Cước vận tải hành khách bằng xe taxi</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><b>Đơn vị</b></label>
                            <select id="mahuyen" name="mahuyen" class="form-control">
                                <option value="all">--Tất cả--</option>
                                @foreach($m_donvi as $donvi)
                                    <option value="{{$donvi->maxa}}">{{$donvi->tendv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label"><b>Phân loại</b></label>
                            <select id="phanloai" name="phanloai" class="form-control">
                                <option value="ngaychuyen">Ngày chuyển hồ sơ</option>
                                <option value="ngayduyet">Ngày duyệt</option>
                            </select>
                        </div>
                    </div>
                    @include('manage.include.reports.time')
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC1('/baocaogiavantaixetaxi/bc1')">BC Tổng hợp</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC2('/baocaogiavantaixetaxi/bc2')">BC chi tiét</button>
                <!--button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBCExcel('/reports/thuetn/bcgiathuetnexcel')">Xuất Excel</button-->
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
