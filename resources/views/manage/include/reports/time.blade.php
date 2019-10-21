<div class="form-group">
    <div class="col-md-12">
        <label class="control-label"><b>Thời điểm</b></label>
        <div class="md-radio-inline">
            <div class="md-radio">
                <input type="radio" id="radio1"  name="time" class="md-radiobtn radio1" value="ngay" checked>
                <label for="radio1">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span>
                    Theo ngày</label>
            </div>
            <div class="md-radio">
                <input type="radio" id="radio2" name="time" class="md-radiobtn radio2" value="thang">
                <label for="radio2">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span>
                    Theo tháng</label>
            </div>
            <div class="md-radio">
                <input type="radio" id="radio3" name="time" class="md-radiobtn radio3" value="quy">
                <label for="radio3">
                    <span class="inc"></span>
                    <span class="check"></span>
                    <span class="box"></span>
                    Theo quý</label>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-12 option1" id="option1">
        <div class="col-md-6">
            <label><b>Từ ngày</b></label>
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

    <div class="col-md-12 option2" id="option2" style="display: none">
        <div class="col-md-6 thang" id="thang">
            <label><b>Tháng</b></label>
            {!! Form::select(
            'thang',
            getThang(),
            date('m'),
            array('id' => 'thang', 'class' => 'form-control'))
            !!}
        </div>
        <div class="col-md-6 quy" id="quy">
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
                    <option value="{{$i}}" {{$i == date('Y') ? 'selected' : '' }}>Năm {{$i}}</option>
                @endfor
            </select>
        </div>
    </div>
</div>
<script>
//    document.getElementById("radio1").onclick = function() {
//        document.getElementById("option1").style.display = "block";
//        document.getElementById("option2").style.display = "none";
//        document.getElementById("option3").style.display = "none";
//    }
//    document.getElementById("radio2").onclick = function() {
//        document.getElementById("option1").style.display = "none";
//        document.getElementById("quy").style.display = "none";
//        document.getElementById("thang").style.display = "block";
//        document.getElementById("option2").style.display = "block";
//    }
//    document.getElementById("radio3").onclick = function() {
//        document.getElementById("option1").style.display = "none";
//        document.getElementById("option2").style.display = "block";
//        document.getElementById("thang").style.display = "none";
//        document.getElementById("quy").style.display = "block";
//    }

//    $(document).ready(function(){
//        $(".radio1").click(function(){
//            $(".option1").css("display","block");
//            $(".option2, .option3").css("display","none");
//        })
//        $(".radio2").click(function(){
//            $(".option1, .quy").css("display","none");
//            $(".thang, .option2").css("display","block");
//        })
//        $(".radio3").click(function(){
//            $(".option1, .thang").css("display","none");
//            $(".option2, .quy").css("display","block");
//        })
//    });
$(document).ready(function(){
    $(".radio1").click(function(){
        if(this.checked) {
            $(".option1").css("display","block");
            $(".option2, .option3").css("display","none");
        }
    })
    $(".radio2").click(function(){
        if(this.checked) {
            $(".option1, .quy").css("display","none");
            $(".thang, .option2").css("display","block");
        }
    })
    $(".radio3").click(function(){
        if(this.checked) {
            $(".option1, .thang").css("display","none");
            $(".option2, .quy").css("display","block");
        }
    })
});
//$(document).ready(function(){
//    $("input[name='time']").click(function(){
//        $(".radio1").change(function() {
//            if(this.checked) {
//                $(".option1").css("display","block");
//                $(".option2, .option3").css("display","none");
//            }
//        });
//        $(".radio2").change(function() {
//            if(this.checked) {
//                $(".option1, .quy").css("display","none");
//                $(".thang, .option2").css("display","block");
//            }
//        });
//        $(".radio3").change(function() {
//            if(this.checked) {
//                $(".option1, .thang").css("display","none");
//                $(".option2, .quy").css("display","block");
//            }
//        });
//    });
//});
</script>