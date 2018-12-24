
<script>
    function ClickBc1(){
        $('#frm_Bc1').submit();
    }
</script>

<!--Modal Thoại PL5-->
<div id="pl5-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'chisocpi/baocao/tonghop','target'=>'_blank' , 'id' => 'frm_Bc1', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin về tổng hợp chỉ số giá</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><b>Tháng</b></label>
                            {!! Form::select('thang',getThang(),date('m'),array('id' => 'thang', 'class' => 'form-control'))!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><b>Năm</b></label>
                            {!! Form::select('nam',getNam(),date('Y'),array('id' => 'nam', 'class' => 'form-control'))!!}
                        </div>
                    </div>
                    <!--div class="form-group">
                        <div class="col-md-12">
                            <label>Địa bàn quản lý</label>
                            {!! Form::select('district',$a_diaban, null, array('id' => 'district', 'class' => 'form-control'))!!}
                        </div>
                    </div-->
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Cấp hàng hóa</label>
                            {!! Form::select('capdo',array(['1'=>'1','2'=>'2','3'=>'3','4'=>'4']), '1', array('id' => 'capdo', 'class' => 'form-control'))!!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBc1()" >Đồng ý</button>
                <!--button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="" >Xuất Excel</button-->
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

