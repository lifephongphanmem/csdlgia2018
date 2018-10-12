<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->hhtt->index) && $permission->hhtt->index == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][index]"/> Mặt hàng bình ổn giá
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                            <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                        </th>
                                        <th>Chức năng</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hhtt->index) && $permission->hhtt->index == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hhtt->create) && $permission->hhtt->create == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hhtt->edit) && $permission->hhtt->edit == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hhtt->delete) && $permission->hhtt->delete == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->hhtt->approve) && $permission->hhtt->approve == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][approve]"/></td>
                                        <td>Xét duyệt</td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->hhtt->index) && $permission->hhtt->index == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][index]"/> Định giá
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                    </th>
                                    <th>Chức năng</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hhtt->index) && $permission->hhtt->index == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hhtt->create) && $permission->hhtt->create == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hhtt->edit) && $permission->hhtt->edit == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hhtt->delete) && $permission->hhtt->delete == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hhtt->approve) && $permission->hhtt->approve == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][approve]"/></td>
                                    <td>Xét duyệt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>