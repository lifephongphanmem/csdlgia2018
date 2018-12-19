<!--Giá thuê tài sản công-->
@if(canGeneral('giadvgddt','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giadvgddt->index) && $permission->giadvgddt->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvgddt][index]"/>Giá DV GD-DT
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
                                    <th>Danh mục giá DV GT-DT</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiadvgddt->index) && $permission->dmgiadvgddt->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiadvgddt][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiadvgddt->create) && $permission->dmgiadvgddt->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiadvgddt][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiadvgddt->edit) && $permission->dmgiadvgddt->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiadvgddt][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiadvgddt->delete) && $permission->dmgiadvgddt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiadvgddt][delete]"/></td>
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
                                    <th>Kê khai giá DV GT-DT</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvgddt->index) && $permission->kkgiadvgddt->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvgddt][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvgddt->create) && $permission->kkgiadvgddt->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvgddt][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvgddt->edit) && $permission->kkgiadvgddt->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvgddt][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvgddt->delete) && $permission->kkgiadvgddt->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvgddt][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvgddt->approve) && $permission->kkgiadvgddt->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvgddt][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiadvgddt->baocao) && $permission->thgiadvgddt->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiadvgddt][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadvgddt->congbo) && $permission->thgiadvgddt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiadvgddt][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadvgddt->timkiem) && $permission->thgiadvgddt->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiadvgddt][timkiem]"/></td>
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