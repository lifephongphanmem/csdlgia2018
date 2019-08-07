<!--Giá thuê tài sản công-->
@if(canGeneral('giathitruong','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giathitruong->index) && $permission->giathitruong->index == 1) ? 'checked' : '' }} value="1" name="roles[giathitruong][index]"/>Giá thị trường
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
                                    <th>DM hàng hóa thị trường</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathitruong->index) && $permission->dmgiathitruong->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathitruong][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathitruong->create) && $permission->dmgiathitruong->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathitruong][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathitruong->edit) && $permission->dmgiathitruong->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathitruong][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathitruong->delete) && $permission->dmgiathitruong->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathitruong][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathitruong->approve) && $permission->dmgiathitruong->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathitruong][approve]"/></td>
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
                                    <th>Kê khai giá thị trường</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathitruong->index) && $permission->kkgiathitruong->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathitruong][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathitruong->create) && $permission->kkgiathitruong->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathitruong][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathitruong->edit) && $permission->kkgiathitruong->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathitruong][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathitruong->delete) && $permission->kkgiathitruong->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathitruong][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathitruong->approve) && $permission->kkgiathitruong->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathitruong][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiathitruong->approve) && $permission->thgiathitruong->approve == 1) ? 'checked' : '' }} value="1" name="roles[thgiathitruong][approve]"/></td>
                                    <td>Hủy hoàn thành</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathitruong->edit) && $permission->thgiathitruong->edit == 1) ? 'checked' : '' }} value="1" name="roles[thgiathitruong][edit]"/></td>
                                    <td>Chỉnh sửa BC</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathitruong->baocao) && $permission->thgiathitruong->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiathitruong][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathitruong->congbo) && $permission->thgiathitruong->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiathitruong][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathitruong->timkiem) && $permission->thgiathitruong->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiathitruong][timkiem]"/></td>
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