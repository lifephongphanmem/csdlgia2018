@if(canGeneral('kkgia','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->kkgia->index) && $permission->kkgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][index]"/>Kê khai niêm yết giá
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    @include('includes.per.include.kkgia.kkgiadvlt')
                    @include('includes.per.include.kkgia.kkgiatpcnted6t')
                    @include('includes.per.include.kkgia.kkgiatacn')
                    @include('includes.per.include.kkgia.kkgiadvvt')
                </div>
            </div>
        </div>
    </div>
</div>
@endif