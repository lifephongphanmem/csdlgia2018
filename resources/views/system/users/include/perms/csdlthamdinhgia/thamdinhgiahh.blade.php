@if(canGeneral('thamdinhgiahh','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->thamdinhgiahh->index) && $permission->thamdinhgiahh->index == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgiahh][index]"/> Thẩm định giá hàng hóa dịch vụ
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
                                        <td><input type="checkbox" {{ (isset($permission->dmthamdinhgiahh->index) && $permission->dmthamdinhgiahh->index == 1) ? 'checked' : '' }} value="1" name="roles[dmthamdinhgiahh][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmthamdinhgiahh->create) && $permission->dmthamdinhgiahh->create == 1) ? 'checked' : '' }} value="1" name="roles[dmthamdinhgiahh][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmthamdinhgiahh->edit) && $permission->dmthamdinhgiahh->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmthamdinhgiahh][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmthamdinhgiahh->delete) && $permission->dmthamdinhgiahh->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmthamdinhgiahh][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmthamdinhgiahh->approve) && $permission->dmthamdinhgiahh->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmthamdinhgiahh][approve]"/></td>
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
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgiahh->index) && $permission->kkthamdinhgiahh->index == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgiahh][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgiahh->create) && $permission->kkthamdinhgiahh->create == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgiahh][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgiahh->edit) && $permission->kkthamdinhgiahh->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgiahh][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgiahh->delete) && $permission->kkthamdinhgiahh->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgiahh][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgiahh->approve) && $permission->kkthamdinhgiahh->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgiahh][approve]"/></td>
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
                                        <td><input type="checkbox" {{ (isset($permission->ththamdinhgiahh->baocao) && $permission->ththamdinhgiahh->baocao == 1) ? 'checked' : '' }} value="1" name="roles[ththamdinhgiahh][baocao]"/></td>
                                        <td>Báo cáo</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ththamdinhgiahh->congbo) && $permission->ththamdinhgiahh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[ththamdinhgiahh][congbo]"/></td>
                                        <td>Công bố </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ththamdinhgiahh->timkiem) && $permission->ththamdinhgiahh->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[ththamdinhgiahh][timkiem]"/></td>
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