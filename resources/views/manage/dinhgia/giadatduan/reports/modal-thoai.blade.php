
<script>
    function ClickPhuLuc08(){
        $('#frm_phuluc08').submit();
    }
</script>

<!--Modal Thoại PL08-->
<div id="phuluc08-thoai-confirm" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        {!! Form::open(['url'=>'baocaogiadatduan/phuluc08','target'=>'_blank' , 'id' => 'frm_phuluc08', 'class'=>'form-horizontal form-validate']) !!}
        <div class="modal-content">
            <div class="modal-header modal-header-primary">
                <button type="button" data-dismiss="modal" aria-hidden="true"
                        class="close">&times;</button>
                <h4 id="modal-header-primary-label" class="modal-title">Thông tin về giá đất cụ thể của dự án trên địa bàn</h4>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Năm</label>
                            <select name="nam" id="nam" class="form-control">
                                @if ($nam_start = intval(date('Y')) - 5 ) @endif
                                @if ($nam_stop = intval(date('Y')) + 1) @endif
                                @for($i = $nam_start; $i <= $nam_stop; $i++)
                                    <option value="{{$i}}" {{$i == date('Y') ? 'selected' : ''}}>Năm {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Địa bàn</label>
                            <select name="mahuyen" id="mahuyen" class="form-control">
                                <option value="all">--Tất cả các địa bàn--</option>
                                @foreach($modeldb as $db)
                                    <option value="{{$db->district}}">{{$db->diaban}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Địa bàn</label>
                            <select name="manhomduan" id="manhomduan" class="form-control">
                                <option value="all">--Tất cả--</option>
                                @foreach($modeldm as $dm)
                                    <option value="{{$dm->manhomduan}}">{{$dm->tennhomduan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Hủy thao tác</button>
                <button type="submit" data-dismiss="modal" class="btn btn-success" onclick="ClickPhuLuc08()" >Đồng ý</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

