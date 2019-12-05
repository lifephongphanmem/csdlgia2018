
<script>
    function ClickBC1(url){
        $('#frm_bc1').attr('action',url);
        $('#frm_bc1').submit();
    }
    function ClickBC2(url){
        $('#frm_bc2').attr('action',url);
        $('#frm_bc2').submit();
    }
    function ClickBc2Word(url){
        $('#frm_bc2').attr('action',url);
        $('#frm_bc2').submit();
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
                            <select name="matt" id="matt" class="form-control">
                                @foreach($modelnhomhhdvk as $nhomhhdvk)
                                <option value="{{$nhomhhdvk->matt}}">{{$nhomhhdvk->tentt}}</option>
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
</div>
<!--Modal Thoại PL1-->
<div id="pl2-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'','target'=>'_blank' , 'id' => 'frm_bc2', 'class'=>'form-horizontal form-validate']) !!}
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
                            <label><b>Nhóm hàng hóa dịch vụ khác theo tháng</b></label>
                            <select name="matt" id="matt" class="form-control">
                                @foreach($modelnhomhhdvk as $nhomhhdvk)
                                    <option value="{{$nhomhhdvk->matt}}">{{$nhomhhdvk->tentt}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label><b>Tháng liền kề</b></label>
                            {!! Form::select(
                            'thanglk',
                            getThang()
                            ,null,
                            array('id' => 'thanglk', 'class' => 'form-control'))
                            !!}
                        </div>
                        <div class="col-md-6">
                            <label><b>Năm liền kề</b></label>
                            <select name="namlk" id="namlk" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label><b>Tháng</b></label>
                            {!! Form::select(
                            'thang',
                            getThang()
                            ,date('m'),
                            array('id' => 'thang', 'class' => 'form-control'))
                            !!}
                        </div>
                        <div class="col-md-6">
                            <label><b>Năm</b></label>
                            <select name="nam" id="nam" class="form-control">
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
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC2('/reportshanghoadichvukhac/bc2')">Đồng ý</button>
                {{--<button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBc2Word('/reportshanghoadichvukhac/exWordBc2')">Xuất Word</button>--}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
