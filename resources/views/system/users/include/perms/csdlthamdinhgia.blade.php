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
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                    </th>
                                    <th>Danh mục hàng hóa thẩm định giá</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmhhthamdinhgia->index) && $permission->dmhhthamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmhhthamdinhgia->create) && $permission->dmhhthamdinhgia->create == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmhhthamdinhgia->edit) && $permission->dmhhthamdinhgia->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmhhthamdinhgia->delete) && $permission->dmhhthamdinhgia->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmhhthamdinhgia][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @include('system.users.include.perms.csdlthamdinhgia.thamdinhgia')
                    @include('system.users.include.perms.csdlthamdinhgia.cungcapgia')
                    @include('system.users.include.perms.csdlthamdinhgia.thamdinhgiahh')
                </div>
            </div>
        </div>
    </div>
</div>
@endif