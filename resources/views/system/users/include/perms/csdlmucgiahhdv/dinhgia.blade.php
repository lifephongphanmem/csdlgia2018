@if(canGeneral('dinhgia','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
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
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giacldat')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giadatpl')
                    @include('system.users.include.perms.csdlmucgiahhdv.giadatduan')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giadaugiadat')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.daugiadatts')
                    @include('system.users.include.perms.csdlmucgiahhdv.giathuetn')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giathuematdatnuoc')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giarung')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giathuemuanhaxh')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giathuenhacongvu')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.bannhataidinhcu')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.gianuocsh')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giathuetsc')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giadvgddt')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giadvkcb')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.trogiatrocuoc')
                    @include('system.users.include.perms.csdlmucgiahhdv.perdinhgia.giaspdvci')
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif