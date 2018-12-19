@if(canGeneral('thamdinhgia','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->thamdinhgia->index) && $permission->thamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[thamdinhgia][index]"/> Thẩm định giá tài sản NN
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
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgia->index) && $permission->kkthamdinhgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgia][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgia->create) && $permission->kkthamdinhgia->create == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgia][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgia->edit) && $permission->kkthamdinhgia->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgia][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgia->delete) && $permission->kkthamdinhgia->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgia][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkthamdinhgia->approve) && $permission->kkthamdinhgia->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkthamdinhgia][approve]"/></td>
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
                                        <td><input type="checkbox" {{ (isset($permission->ththamdinhgia->baocao) && $permission->ththamdinhgia->baocao == 1) ? 'checked' : '' }} value="1" name="roles[ththamdinhgia][baocao]"/></td>
                                        <td>Báo cáo</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ththamdinhgia->congbo) && $permission->ththamdinhgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[ththamdinhgia][congbo]"/></td>
                                        <td>Công bố </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ththamdinhgia->timkiem) && $permission->ththamdinhgia->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[ththamdinhgia][timkiem]"/></td>
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