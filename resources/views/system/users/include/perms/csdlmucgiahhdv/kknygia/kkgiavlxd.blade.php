@if(canGeneral('vlxd','index'))
    @if($model->level == 'VLXD' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->vlxd->index) && $permission->vlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[vlxd][index]"/>Vật liệu xây dựng
                        </div>
                        <div class="tools">
                            <a href="" class="expand" data-original-title="" title="">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form" style="display: none;">
                        <div class="form-body">
                            <div class="row">
                                @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                            </th>
                                            <th>Danh mục VLXD</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmvlxd->index) && $permission->dmvlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[dmvlxd][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmvlxd->create) && $permission->dmvlxd->create == 1) ? 'checked' : '' }} value="1" name="roles[dmvlxd][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmvlxd->edit) && $permission->dmvlxd->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmvlxd][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmvlxd->delete) && $permission->dmvlxd->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmvlxd][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                            </th>
                                            <th>Kê khai giá VLXD</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkvlxd->index) && $permission->kkvlxd->index == 1) ? 'checked' : '' }} value="1" name="roles[kkvlxd][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkvlxd->create) && $permission->kkvlxd->create == 1) ? 'checked' : '' }} value="1" name="roles[kkvlxd][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkvlxd->edit) && $permission->kkvlxd->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkvlxd][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkvlxd->delete) && $permission->kkvlxd->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkvlxd][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkvlxd->approve) && $permission->kkvlxd->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkvlxd][approve]"/></td>
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
                                            <th>Tổng hợp giá VLXD</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thvlxd->baocao) && $permission->thvlxd->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thvlxd][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thvlxd->congbo) && $permission->thvlxd->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thvlxd][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thvlxd->timkiem) && $permission->thvlxd->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thvlxd][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thvlxd->xdttdn) && $permission->thvlxd->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thvlxd][xdttdn]"/></td>
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

