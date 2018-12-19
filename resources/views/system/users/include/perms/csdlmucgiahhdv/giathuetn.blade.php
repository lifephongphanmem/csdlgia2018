<!--Giá thuê tài sản công-->
@if(canGeneral('giathuetn','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giathuetn->index) && $permission->giathuetn->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetn][index]"/>Giá thuế tài nguyên
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
                                    <th>DM giá thuế tài nguyên</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathuetn->index) && $permission->dmgiathuetn->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuetn][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathuetn->create) && $permission->dmgiathuetn->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuetn][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathuetn->edit) && $permission->dmgiathuetn->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuetn][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathuetn->delete) && $permission->dmgiathuetn->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuetn][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiathuetn->approve) && $permission->dmgiathuetn->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuetn][approve]"/></td>
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
                                    <th>Kê khai giá thuế tài nguyên</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetn->index) && $permission->kkgiathuetn->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetn][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetn->create) && $permission->kkgiathuetn->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetn][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetn->edit) && $permission->kkgiathuetn->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetn][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetn->delete) && $permission->kkgiathuetn->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetn][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetn->approve) && $permission->kkgiathuetn->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetn][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetn->baocao) && $permission->thgiathuetn->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetn][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetn->congbo) && $permission->thgiathuetn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetn][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetn->timkiem) && $permission->thgiathuetn->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetn][timkiem]"/></td>
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