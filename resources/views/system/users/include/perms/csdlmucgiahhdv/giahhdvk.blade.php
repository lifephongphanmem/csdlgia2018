<!--Giá thuê tài sản công-->
@if(canGeneral('giahhdvk','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giahhdvk->index) && $permission->giahhdvk->index == 1) ? 'checked' : '' }} value="1" name="roles[giahhdvk][index]"/>Giá HH-DV khác
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
                                    <th class="table-checkbox" width="2%">
                                    </th>
                                    <th>DM HH-DV khác</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiahhdvk->index) && $permission->dmgiahhdvk->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiahhdvk][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiahhdvk->create) && $permission->dmgiahhdvk->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiahhdvk][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiahhdvk->edit) && $permission->dmgiahhdvk->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiahhdvk][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiahhdvk->delete) && $permission->dmgiahhdvk->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiahhdvk][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiahhdvk->approve) && $permission->dmgiahhdvk->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmgiahhdvk][approve]"/></td>
                                    <td>Xét duyệt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="2%">
                                    </th>
                                    <th>Kê khai giá HH-DV khác</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiahhdvk->index) && $permission->kkgiahhdvk->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiahhdvk][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiahhdvk->create) && $permission->kkgiahhdvk->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiahhdvk][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiahhdvk->edit) && $permission->kkgiahhdvk->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiahhdvk][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiahhdvk->delete) && $permission->kkgiahhdvk->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiahhdvk][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiahhdvk->approve) && $permission->kkgiahhdvk->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiahhdvk][approve]"/></td>
                                    <td>Xét duyệt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="2%">
                                    </th>
                                    <th>Tổng hợp</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiahhdvk->tonghop) && $permission->thgiahhdvk->tonghop == 1) ? 'checked' : '' }} value="1" name="roles[thgiahhdvk][tonghop]"/></td>
                                    <td>Tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiahhdvk->baocao) && $permission->thgiahhdvk->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiahhdvk][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiahhdvk->congbo) && $permission->thgiahhdvk->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiahhdvk][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiahhdvk->timkiem) && $permission->thgiahhdvk->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiahhdvk][timkiem]"/></td>
                                    <td>Tìm kiếm</td>
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
@endif