@if(canGeneral('csdlmucgiahhdv','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    CSDL về mức giá hàng hóa, dịch vụ
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
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->csdlmucgiahhdv->index) && $permission->csdlmucgiahhdv->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlmucgiahhdv][index]"/></td>
                                    <td>CSDL về mức giá hàng hóa, dịch vụ</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.users.include.perms.csdlmucgiahhdv.dinhgia')
                    @include('system.users.include.perms.csdlmucgiahhdv.giahhdvk')
                    @include('system.users.include.perms.csdlmucgiahhdv.giathitruong')
                    @include('system.users.include.perms.csdlmucgiahhdv.gialephitruocba')
                    @include('system.users.include.perms.csdlmucgiahhdv.gialephitruocbanha')
                    @include('system.users.include.perms.csdlmucgiahhdv.giaphilephi')

                    @include('system.users.include.perms.csdlmucgiahhdv.thanhlytaisan')
                    @include('system.users.include.perms.csdlmucgiahhdv.giagocvlxd')
                    @include('system.users.include.perms.csdlmucgiahhdv.bog')
                    @include('system.users.include.perms.csdlmucgiahhdv.kknygia')

                    @include('system.users.include.perms.csdlmucgiahhdv.muataisan')
                    @include('system.users.include.perms.csdlmucgiahhdv.giabatdongsan')
                </div>
            </div>
        </div>
    </div>
</div>
@endif