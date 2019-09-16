<h4 style="color: blue">Thông tin dự án</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Quận/ huyện</label>
            {!!Form::text('diaban',$modeldb->diaban, array('id' => 'diaban','class' => 'form-control required','disabled'))!!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Xã/phường</b></label>
            {!! Form::select('maxa',$xas,null,array('id' => 'maxa', 'class' => 'form-control required')) !!}
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
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="control-label">Số quyết định<span class="require">*</span></label>
            {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
        </div>
    </div>
</div>

<h4 style="color: blue">Thông tin địa chính</h4>
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

<h4 style="color: blue">Quyết định bảng giá đất của tỉnh</h4>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất ở<span class="require">*</span></label>
            {!!Form::text('qdgiadato',isset($model) ? null : 0, array('id' => 'qdgiadato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất TMDV<span class="require">*</span></label>
            {!!Form::text('qdgiadattmdv',isset($model) ? null : 0, array('id' => 'qdgiadattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất SXKD<span class="require">*</span></label>
            {!!Form::text('qdgiadatsxkd',isset($model) ? null : 0, array('id' => 'qdgiadatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất NN trổng cây lâu năm, hàng năm<span class="require">*</span></label>
            {!!Form::text('qdgiadatnn',isset($model) ? null : 0, array('id' => 'qdgiadatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
            {!!Form::text('qdgiadatnuoits',isset($model) ? null : 0, array('id' => 'qdgiadatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất làm muối<span class="require">*</span></label>
            {!!Form::text('qdgiadatmuoi',isset($model) ? null : 0, array('id' => 'qdgiadatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
</div>

<h4 style="color: blue">Quyết định phê duyệt giá đất của tỉnh</h4>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất ở<span class="require">*</span></label>
            {!!Form::text('qdpddato',isset($model) ? null : 0, array('id' => 'qdpddato','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất TMDV<span class="require">*</span></label>
            {!!Form::text('qdpddattmdv',isset($model) ? null : 0, array('id' => 'qdpddattmdv','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất SXKD<span class="require">*</span></label>
            {!!Form::text('qdpddatsxkd',isset($model) ? null : 0, array('id' => 'qdpddatsxkd','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất NN trổng cây lâu năm, hàng năm<span class="require">*</span></label>
            {!!Form::text('qdpddatnn',isset($model) ? null : 0, array('id' => 'qdpddatnn','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất nuôi trồng thủy sản<span class="require">*</span></label>
            {!!Form::text('qdpddatnuoits',isset($model) ? null : 0, array('id' => 'qdpddatnuoits','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="control-label">Đất làm muối<span class="require">*</span></label>
            {!!Form::text('qdpddatmuoi',isset($model) ? null : 0, array('id' => 'qdpddatmuoi','data-mask'=>'fdecimal','class' => 'form-control required','style'=>'text-align: right;font-weight: bold'))!!}
        </div>
    </div>
</div>