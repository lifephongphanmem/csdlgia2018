
<script>
    function ClickPL1_th(url){
        $('#frm_pl1_th').attr('action',url);
        $('#frm_pl1_th').submit();
    }

    function ClickPL1_dv(url){
        $('#frm_pl1_dv').attr('action',url);
        $('#frm_pl1_dv').submit();
    }
    function ClickPL2(url){
        $('#frm_pl2').attr('action',url);
        $('#frm_pl2').submit();
    }
</script>

<!--Modal Thoại PL1-->
<div id="pl1-th-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'','target'=>'_blank' , 'id' => 'frm_pl1_th', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Bảng giá thị trường</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" autofocus value="2018-01-01">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" autofocus value="2018-12-31">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thị trường hàng hóa</b></label>
                        <div class="col-md-6 ">
                            <select name="thitruong" id="thitruong" class="form-control">
                                @foreach($thitruong as $ct)
                                    <option value="{{$ct->thitruong}}">{{$ct->thitruong}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickPL1_th('/reports/tt55-2011-BTC/PL1_th')">Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL1_th('/reports/tt55-2011-BTC/PL1Excel_th')">Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Modal Thoại PL1-mẫu đơn vị-->
<div id="pl1-dv-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'','target'=>'_blank' , 'id' => 'frm_pl1_dv', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Bảng giá thị trường</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" autofocus value="2018-01-01">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" autofocus value="2018-12-31">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Thị trường hàng hóa</b></label>
                        <div class="col-md-6 ">
                            <select name="thitruong" id="thitruong" class="form-control">
                                @foreach($thitruong as $ct)
                                    <option value="{{$ct->thitruong}}">{{$ct->thitruong}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đơn vị báo cáo</b></label>
                        <div class="col-md-6 ">
                            <select name="mahuyen" id="mahuyen" class="form-control">
                                @foreach($donvi as $ct)
                                    <option value="{{$ct->mahuyen}}">{{$ct->tendv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickPL1_dv('/reports/tt55-2011-BTC/PL1_dv')">Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL1_dv('/reports/tt55-2011-BTC/PL1Excel_dv')">Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

<!--Phụ lục 2-->
<div id="pl2-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'/reports/tt55-2011-BTC/PL2','target'=>'_blank' , 'id' => 'frm_pl2', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Bảng giá hàng hóa xuất nhập khẩu</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Từ ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngaytu" name="ngaytu" class="form-control" value="2017-01-01">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label"><b>Đến ngày</b></label>
                        <div class="col-md-6 ">
                            <input type="date" id="ngayden" name="ngayden" class="form-control" value="2017-12-31">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickPL2('/reports/tt55-2011-BTC/PL2')">Đồng ý</button>
                <button type="submit" data-dismiss="modal" class="btn btn-primary" onclick="ClickPL2Excel('/reports/tt55-2011-BTC/PL2Excel')">Xuất Excel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </form>
</div>

