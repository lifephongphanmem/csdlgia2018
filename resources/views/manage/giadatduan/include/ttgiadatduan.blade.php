<h4 style="color: blue">Thông tin dự án</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Địa bàn: <b style="color: blue">{{$modeldb->diaban}}</b></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Tên dự án<span class="require">*</span></label>
            {!!Form::text('tenduan',null, array('id' => 'tenduan','class' => 'form-control required'))!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Thời điểm <span class="require">*</span></label>
            {!!Form::text('thoidiem',isset($model) ? date('d/m/Y',  strtotime($model->thoidiem)) : null, array('id' => 'thoidiem','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Diện tích<span class="require">*</span></label>
            {!!Form::text('dientich',isset($model) ? null : 0, array('id' => 'dintich','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Phân loại<span class="require">*</span></label>
            {!! Form::select('manhomduan',$nhomduan,null,array('id' => 'manhomduan', 'class' => 'form-control')) !!}
        </div>
    </div>

</div>

<h4 style="color: blue">Thông tin quy định</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Loại đất<span class="require">*</span></label>
            {!!Form::text('loaidat',null, array('id' => 'loaidat','class' => 'form-control required'))!!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Tên đường<span class="require">*</span></label>
            {!!Form::text('tenduong',null, array('id' => 'tenduong','class' => 'form-control required'))!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Loại đường, khu vực<span class="require">*</span></label>
            {!!Form::text('loaiduong',null, array('id' => 'loaiduong','class' => 'form-control required'))!!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Vị trí<span class="require">*</span></label>
            {!!Form::text('vitri',null, array('id' => 'vitri','class' => 'form-control required'))!!}
        </div>
    </div>
</div>

<h4 style="color: blue">Thông tin địa chính</h4>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất ở<span class="require">*</span></label>
            {!!Form::text('qddato',isset($model) ? null : 0, array('id' => 'qddato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất SXKD<span class="require">*</span></label>
            {!!Form::text('qddatsxkd',isset($model) ? null : 0, array('id' => 'qddatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất NN - KDC<span class="require">*</span></label>
            {!!Form::text('qddatnnkdc',isset($model) ? null : 0, array('id' => 'qddatnnkdc','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất NN - ngoài KDC<span class="require">*</span></label>
            {!!Form::text('qddatnnnkdc',isset($model) ? null : 0, array('id' => 'qddatnnnkdc','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
</div>

<h4 style="color: blue">Thông tin kết quả thẩm định (sau khi giảm trừ)</h4>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất ở<span class="require">*</span></label>
            {!!Form::text('tddato',isset($model) ? null : 0, array('id' => 'tddato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất SXKD<span class="require">*</span></label>
            {!!Form::text('tddatsxkd',isset($model) ? null : 0, array('id' => 'tddatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất NN - KDC<span class="require">*</span></label>
            {!!Form::text('tddatnnkdc',isset($model) ? null : 0, array('id' => 'tddatnnkdc','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất NN - ngoài KDC<span class="require">*</span></label>
            {!!Form::text('tddatnnnkdc',isset($model) ? null : 0, array('id' => 'tddatnnnkdc','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
</div>