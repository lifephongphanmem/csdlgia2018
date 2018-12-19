@if(canGeneral('dvlt','index'))
    @if($model->level == 'DVLT' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->dvlt->index) && $permission->dvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][index]"/>Dịch vụ lưu trú
                        </div>
                        <div class="tools">
                            <a href="" class="expand" data-original-title="" title="">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form" style="display: none;">
                        <div class="form-body">
                            <div class="row">
                                @if($model->level == 'DVLT')
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                            </th>
                                            <th>Danh mục DVLT</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdvlt->index) && $permission->dmdvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[dmdvlt][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdvlt->create) && $permission->dmdvlt->create == 1) ? 'checked' : '' }} value="1" name="roles[dmdvlt][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdvlt->edit) && $permission->dmdvlt->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmdvlt][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdvlt->delete) && $permission->dmdvlt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmdvlt][delete]"/></td>
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
                                            <th>Kê khai giá DVLT</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvlt->index) && $permission->kkdvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvlt->create) && $permission->kkdvlt->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvlt->edit) && $permission->kkdvlt->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvlt->delete) && $permission->kkdvlt->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvlt->approve) && $permission->kkdvlt->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][approve]"/></td>
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
                                            <th>Tổng hợp giá DVLT</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvlt->baocao) && $permission->thdvlt->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdvlt][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvlt->congbo) && $permission->thdvlt->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdvlt][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvlt->timkiem) && $permission->thdvlt->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdvlt][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvlt->xdttdn) && $permission->thdvlt->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdvlt][xdttdn]"/></td>
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

