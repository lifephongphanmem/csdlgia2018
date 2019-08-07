
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
                <h4 id="modal-header-primary-label" class="modal-title">Báo cáo tổng hợp giá thị trường</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><b>Đơn vị</b></label>
                            <select name="mahuyen" id="mahuyen" class="form-control">
                                    <option value="all">--Tất cả các đơn vị--</option>
                                @foreach($donvis as $donvi)
                                    <option value="{{$donvi->mahuyen}}">{{$donvi->tendv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label><b>Thông tư</b></label>
                            <select name="matt" id="matt" class="form-control">
                                @foreach($modeltt as $tt)
                                <option value="{{$tt->matt}}">{{$tt->ttqd}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label><b>Tháng báo cáo liền kề </b></label>
                            {!! Form::select(
                            'thanglk',
                            getThang()
                            ,date('m'),
                            array('id' => 'thanglk', 'class' => 'form-control'))
                            !!}
                        </div>
                        <div class="col-md-6">
                            <label><b>Năm báo cáo liền kề </b></label>
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
                            <label><b>Tháng báo cáo</b></label>
                            {!! Form::select(
                            'thang',
                            getThang()
                            ,date('m'),
                            array('id' => 'thang', 'class' => 'form-control'))
                            !!}
                        </div>
                        <div class="col-md-6">
                            <label><b>Năm báo cáo</b></label>
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
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickBC1('baocaogiathitruong/baocaotonghop1')">Đồng ý</button>
                <!--button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickBCExcel('/reports/thuetn/bcgiathuetnexcel')">Xuất Excel</button-->
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

