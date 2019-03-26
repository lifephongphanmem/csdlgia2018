<!--Giá thuê tài sản công-->
@if(canGeneral('giagocvlxd','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giagocvlxd->index) && $permission->giagocvlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[giagocvlxd][index]"/>Giá gốc vật liệu xây dựng
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
                                    <th>Kê khai giá gốc vật liệu xây dựng</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiagocvlxd->index) && $permission->kkgiagocvlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiagocvlxd][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiagocvlxd->create) && $permission->kkgiagocvlxd->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiagocvlxd][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiagocvlxd->edit) && $permission->kkgiagocvlxd->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiagocvlxd][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiagocvlxd->delete) && $permission->kkgiagocvlxd->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiagocvlxd][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiagocvlxd->approve) && $permission->kkgiagocvlxd->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiagocvlxd][approve]"/></td>
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
                                @if($model->level == 'T' || $model->level == 'H')
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thgiagocvlxd->index) && $permission->thgiagocvlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[thgiagocvlxd][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thgiagocvlxd->create) && $permission->thgiagocvlxd->create == 1) ? 'checked' : '' }} value="1" name="roles[thgiagocvlxd][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thgiagocvlxd->edit) && $permission->thgiagocvlxd->edit == 1) ? 'checked' : '' }} value="1" name="roles[thgiagocvlxd][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thgiagocvlxd->delete) && $permission->thgiagocvlxd->delete == 1) ? 'checked' : '' }} value="1" name="roles[thgiagocvlxd][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thgiagocvlxd->baocao) && $permission->thgiagocvlxd->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiagocvlxd][baocao]"/></td>
                                        <td>Báo cáo tổng hợp</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thgiagocvlxd->congbo) && $permission->thgiagocvlxd->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiagocvlxd][congbo]"/></td>
                                        <td>Công bố</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiagocvlxd->timkiem) && $permission->thgiagocvlxd->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiagocvlxd][timkiem]"/></td>
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