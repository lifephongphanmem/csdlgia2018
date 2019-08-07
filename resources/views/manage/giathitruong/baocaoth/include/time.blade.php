<label class="control-label"><b>Thời điểm</b></label>
<div class="md-radio-inline">
    <div class="col-md-12">
        <div class="form-group">
            <div class="md-radio">
                <input type="radio" id="radio1" name="time" class="md-radiobtn" value="ngay" checked>
                <label for="radio1">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span>
                    Theo năm</label>
            </div>
            <div class="md-radio">
                <input type="radio" id="radio2" name="time" class="md-radiobtn" value="thang">
                <label for="radio2">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span>
                    Theo tháng</label>
            </div>
            <div class="md-radio">
                <input type="radio" id="radio3" name="time" class="md-radiobtn" value="quy">
                <label for="radio3">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span>
                    Theo quý</label>
            </div>
        </div>
    </div>


    <div class="col-md-12" id="option1">
        <div class="form-group">
            <div class="col-md-6">
                <label><b>Ngày</b></label>
                <input type="text" id="tungay" name="tungay" class="form-control" value="{{'01/01/'.date('Y')}}" style="text-align: center">
                @if ($errors->has('tungay'))
                    <em class="invalid">{{ $errors->first('tungay') }}</em>
                @endif
            </div>
            <div class="col-md-6">
                <label><b>Đến ngày</b></label>
                <input type="text" id="denngay" name="denngay" class="form-control" value="{{'31/12/'.date('Y')}}" style="text-align: center">
                @if ($errors->has('denngay'))
                    <em class="invalid">{{ $errors->first('denngay') }}</em>
                @endif
            </div>
        </div>
    </div>


    <div class="col-md-12" id="option2" style="display: none">
        <div class="form-group">
            <div class="col-md-6">
                <label><b>Tháng</b></label>
                {!! Form::select(
                'thang',
                getThang(),
                null,
                array('id' => 'thang', 'class' => 'form-control'))
                !!}
            </div>
            <div class="col-md-6">
                <label><b>Năm</b></label>
                <select class="form-control" name="nam" id="nam">
                    <?php
                    $imax = date('Y') + 1;
                    $imin = date('Y') - 5;
                    ?>
                    @for($i = $imin; $i <= $imax;$i++)
                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : '' }}>Năm {{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>


    <div class="col-md-12" id="option3" style="display: none">
        <div class="form-group">
            <div class="col-md-6">
                <label><b>Quý</b></label>
                <select class="form-control" name="quy" id="quy">
                    @for($i = 1; $i <= 4;$i++)
                        <option value="{{$i}}">Quý {{$i}}</option>
                    @endfor
                </select>

            </div>
            <div class="col-md-6">
                <label><b>Năm</b></label>
                <select class="form-control" name="nam" id="nam">
                    <?php
                    $imax = date('Y') + 1;
                    $imin = date('Y') - 5;
                    ?>
                    @for($i = $imin; $i <= $imax;$i++)
                        <option value="{{$i}}" {{$i == $inputs['nam'] ? 'selected' : '' }}>Năm {{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
    </div>


</div>
<script>
    document.getElementById("radio1").onclick = function() {
        document.getElementById("option1").style.display = "block";
        document.getElementById("option2").style.display = "none";
        document.getElementById("option3").style.display = "none";
    }
    document.getElementById("radio2").onclick = function() {
        document.getElementById("option1").style.display = "none";
        document.getElementById("option2").style.display = "block";
        document.getElementById("option3").style.display = "none";
    }
    document.getElementById("radio3").onclick = function() {
        document.getElementById("option1").style.display = "none";
        document.getElementById("option2").style.display = "none";
        document.getElementById("option3").style.display = "block";
    }
</script>