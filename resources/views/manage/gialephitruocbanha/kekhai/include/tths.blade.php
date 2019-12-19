<h4 class="form-section" style="color: #0000ff">Thông tin hồ sơ</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Thông tin quyết định<span class="require">*</span></label>
            {!!Form::text('soqd',null, array('id' => 'soqd','class' => 'form-control required'))!!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Ngày ban hành<span class="require">*</span></label>
            {!!Form::text('ngaybh',isset($model) ? date('d/m/Y', strtotime($model->ngaybh)) : null, array('id' => 'ngaybh','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Ngày áp dụng<span class="require">*</span></label>
            {!!Form::text('ngayad',isset($model) ? date('d/m/Y',  strtotime($model->ngayad)) : null, array('id' => 'ngayad','data-inputmask'=>"'alias': 'date'",'class' => 'form-control required'))!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label">Đơn vị ban hành<span class="require">*</span></label>
            {!!Form::text('dvbh',null, array('id' => 'dvbh','class' => 'form-control required'))!!}
        </div>
    </div>
</div>