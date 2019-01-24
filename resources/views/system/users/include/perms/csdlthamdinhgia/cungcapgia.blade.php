@if(canGeneral('cungcapgia','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X' && $model->level == 'CCG')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->cungcapgia->index) && $permission->cungcapgia->index == 1) ? 'checked' : '' }} value="1" name="roles[cungcapgia][index]"/> Cung cấp giá
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
                                        <th>Doanh nghiệp Cung cấp giá</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dncungcapgia->index) && $permission->dncungcapgia->index == 1) ? 'checked' : '' }} value="1" name="roles[dncungcapgia][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dncungcapgia->create) && $permission->dncungcapgia->create == 1) ? 'checked' : '' }} value="1" name="roles[dncungcapgia][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dncungcapgia->edit) && $permission->dncungcapgia->edit == 1) ? 'checked' : '' }} value="1" name="roles[dncungcapgia][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dncungcapgia->delete) && $permission->dncungcapgia->delete == 1) ? 'checked' : '' }} value="1" name="roles[dncungcapgia][delete]"/></td>
                                        <td>Xóa</td>
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
                                        <th>Cung cấp giá</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkcungcapgia->index) && $permission->kkcungcapgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkcungcapgia][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkcungcapgia->create) && $permission->kkcungcapgia->create == 1) ? 'checked' : '' }} value="1" name="roles[kkcungcapgia][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkcungcapgia->edit) && $permission->kkcungcapgia->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkcungcapgia][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkcungcapgia->delete) && $permission->kkcungcapgia->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkcungcapgia][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkcungcapgia->approve) && $permission->kkcungcapgia->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkcungcapgia][approve]"/></td>
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
                                        <td><input type="checkbox" {{ (isset($permission->thcungcapgia->baocao) && $permission->thcungcapgia->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thcungcapgia][baocao]"/></td>
                                        <td>Báo cáo</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thcungcapgia->congbo) && $permission->thcungcapgia->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thcungcapgia][congbo]"/></td>
                                        <td>Công bố</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thcungcapgia->timkiem) && $permission->thcungcapgia->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thcungcapgia][timkiem]"/></td>
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