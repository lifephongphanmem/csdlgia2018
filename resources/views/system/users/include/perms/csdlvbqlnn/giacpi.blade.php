@if(canGeneral('giacpi','index'))
    @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->giacpi->index) && $permission->giacpi->index == 1) ? 'checked' : '' }} value="1" name="roles[giacpi][index]"/> Giá CPI
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
                                            <th>Danh mục</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmgiacpi->index) && $permission->dmgiacpi->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacpi][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmgiacpi->create) && $permission->dmgiacpi->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacpi][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmgiacpi->edit) && $permission->dmgiacpi->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacpi][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmgiacpi->delete) && $permission->dmgiacpi->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacpi][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmgiacpi->approve) && $permission->dmgiacpi->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacpi][approve]"/></td>
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
                                            <th>Kê khai hồ sơ</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgiacpi->index) && $permission->kkgiacpi->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacpi][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgiacpi->create) && $permission->kkgiacpi->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacpi][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgiacpi->edit) && $permission->kkgiacpi->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacpi][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgiacpi->delete) && $permission->kkgiacpi->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacpi][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkgiacpi->approve) && $permission->kkgiacpi->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacpi][approve]"/></td>
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
                                            <td><input type="checkbox" {{ (isset($permission->thgiacpi->baocao) && $permission->thgiacpi->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiacpi][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thgiacpi->congbo) && $permission->thgiacpi->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiacpi][congbo]"/></td>
                                            <td>Công bố </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thgiacpi->timkiem) && $permission->ththamdinhgiahh->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiacpi][timkiem]"/></td>
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