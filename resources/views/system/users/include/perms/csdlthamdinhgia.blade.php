@if(canGeneral('csdlthamdinhgia','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    CSDL thẩm định giá địa phương
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->csdlthamdinhgia->index) && $permission->csdlthamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlthamdinhgia][index]"/></td>
                                    <td>CSDL thẩm định giá địa phương</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.users.include.perms.csdlthamdinhgia.thamdinhgia')
                    @include('system.users.include.perms.csdlthamdinhgia.thamdinhgiahh')
                </div>
            </div>
        </div>
    </div>
</div>
@endif