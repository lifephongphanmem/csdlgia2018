<!--Giá rừng-->
@if(canGeneral('giarung','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giarung->index) && $permission->giarung->index == 1) ? 'checked' : '' }} value="1" name="roles[giarung][index]"/>Giá rừng
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
                                    <th>Danh mục giá rừng</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiarung->index) && $permission->dmgiarung->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiarung][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiarung->create) && $permission->dmgiarung->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiarung][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiarung->edit) && $permission->dmgiarung->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiarung][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiarung->delete) && $permission->dmgiarung->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiarung][delete]"/></td>
                                    <td>Xóa</td>
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
                                    <th>Kê khai giá rừng</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiarung->index) && $permission->kkgiarung->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiarung][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiarung->create) && $permission->kkgiarung->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiarung][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiarung->edit) && $permission->kkgiarung->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiarung][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiarung->delete) && $permission->kkgiarung->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiarung][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiarung->approve) && $permission->kkgiarung->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiarung][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiarung->baocao) && $permission->thgiarung->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiarung][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiarung->congbo) && $permission->thgiarung->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiarung][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiarung->timkiem) && $permission->thgiarung->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiarung][timkiem]"/></td>
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