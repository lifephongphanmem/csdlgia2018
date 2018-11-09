@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->dinhgia->index) && $permission->dinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dinhgia][index]"/> Định giá
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    @include('includes.per.include.dinhgia.giacldat')
                    @include('includes.per.include.dinhgia.giadaugiadat')
                    @include('includes.per.include.dinhgia.giathuematdatnuoc')
                    @include('includes.per.include.dinhgia.giarung')
                    @include('includes.per.include.dinhgia.giathuemuanhaxh')
                    @include('includes.per.include.dinhgia.gianuocsh')
                    @include('includes.per.include.dinhgia.giathuetsc')
                    @include('includes.per.include.dinhgia.giadvgddt')
                    @include('includes.per.include.dinhgia.giadvkcb')
                    @include('includes.per.include.dinhgia.trogiatrocuoc')
                    @include('includes.per.include.dinhgia.giahhdvk')
                    @include('includes.per.include.dinhgia.giathuetn')
                    @include('includes.per.include.dinhgia.gialephitruocba')
                    @include('includes.per.include.dinhgia.giaphilephi')
                </div>
            </div>
        </div>
    </div>
</div>
@endif