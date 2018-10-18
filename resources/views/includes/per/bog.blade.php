@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->bog->index) && $permission->bog->index == 1) ? 'checked' : '' }} value="1" name="roles[hhtt][index]"/> Mặt hàng bình ổn giá
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
                                    <th>Danh mục mặt hàng BOG</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->index) && $permission->dmbog->index == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->create) && $permission->dmbog->create == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->edit) && $permission->dmbog->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->delete) && $permission->dmbog->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->approve) && $permission->dmbog->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][approve]"/></td>
                                    <td>Xét duyệt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                    </th>
                                    <th>Kê khai BOG</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkbog->index) && $permission->kkbog->index == 1) ? 'checked' : '' }} value="1" name="roles[kkbog][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkbog->create) && $permission->kkbog->create == 1) ? 'checked' : '' }} value="1" name="roles[kkbog][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkbog->edit) && $permission->kkbog->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkbog][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkbog->delete) && $permission->kkbog->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkbog][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkbog->approve) && $permission->kkbog->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkbog][approve]"/></td>
                                    <td>Xét duyệt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                    </th>
                                    <th>Tổng hợp</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->bcbog->index) && $permission->bcbog->index == 1) ? 'checked' : '' }} value="1" name="roles[bcbog][index]"/></td>
                                    <td>Báo cáo</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->cbbog->index) && $permission->cbbog->index == 1) ? 'checked' : '' }} value="1" name="roles[cbbog][index]"/></td>
                                    <td>Công bố </td>
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
@endif