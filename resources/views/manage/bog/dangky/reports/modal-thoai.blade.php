
<script>
    function ClickBc1(){
        $('#frm_Bc1').submit();
    }
</script>

<!--Modal Thoại PL5-->
<div id="pl5-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'baocaodkg/BcMhBog','target'=>'_blank' , 'id' => 'frm_Bc1', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin kết xuất báo cáo</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><b>Năm</b></label>
                            <select name="namhs" id="namhs" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1 ) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == $nam ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Địa bàn quản lý</label>
                            <select name="maxa" id="maxa" class="form-control">
                                <option value="">--Chọn đơn vị báo cáo--</option>
                                @foreach($m_dv as $db)
                                    <option value="{{$db->maxa}}">{{$db->tendn}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="phanloai" id="phanloai" value="{{$phanloai}}">
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBc1()" >Đồng ý</button>
                <!--button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="" >Xuất Excel</button-->
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

