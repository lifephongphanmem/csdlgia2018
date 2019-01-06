@if(canGeneral('dvhdtm','index'))
    @if($model->level == 'DVHDTM' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->dvhdtm->index) && $permission->dvhdtm->index == 1) ? 'checked' : '' }} value="1" name="roles[dvhdtm][index]"/>Dịch vụ hỗ trợ hoạt động thương mại
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
                                            <th>Kê khai giá DVHDTM</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvhdtm->index) && $permission->kkdvhdtm->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvhdtm][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvhdtm->create) && $permission->kkdvhdtm->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvhdtm][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvhdtm->edit) && $permission->kkdvhdtm->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvhdtm][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvhdtm->delete) && $permission->kkdvhdtm->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvhdtm][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkdvhdtm->approve) && $permission->kkdvhdtm->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvhdtm][approve]"/></td>
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
                                            <th>Tổng hợp giá dịch vụ hỗ trợ hoạt động thương mại</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvhdtm->baocao) && $permission->thdvhdtm->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdvhdtm][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvhdtm->congbo) && $permission->thdvhdtm->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdvhdtm][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvhdtm->timkiem) && $permission->thdvhdtm->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdvhdtm][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdvhdtm->xdttdn) && $permission->thdvhdtm->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdvhdtm][xdttdn]"/></td>
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

