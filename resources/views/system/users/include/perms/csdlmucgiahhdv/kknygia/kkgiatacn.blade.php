@if(canGeneral('tacn','index'))
    @if($model->level == 'TACN' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->tacn->index) && $permission->tacn->index == 1) ? 'checked' : '' }} value="1" name="roles[tacn][index]"/>Thức ăn chăn nuôi
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
                                            <th>Kê khai giá TACN</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktacn->index) && $permission->kktacn->index == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktacn->create) && $permission->kktacn->create == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktacn->edit) && $permission->kktacn->edit == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktacn->delete) && $permission->kktacn->delete == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktacn->approve) && $permission->kktacn->approve == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][approve]"/></td>
                                            <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                    <div class="col-md-3">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="action">
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Tổng hợp giá TACN</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtacn->baocao) && $permission->thtacn->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thtacn][baocao]"/></td>
                                                <td>Báo cáo</td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtacn->congbo) && $permission->thtacn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thtacn][congbo]"/></td>
                                                <td>Công bố</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtacn->timkiem) && $permission->thtacn->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thtacn][timkiem]"/></td>
                                                <td>Tìm kiếm</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtacn->xdttdn) && $permission->thtacn->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thtacn][xdttdn]"/></td>
                                                <td>Xét duyệt thông tin doanh nghiệp</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

