@if(canGeneral('dkgmuoi','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgmuoi->index) && $permission->dkgmuoi->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgmuoi][index]"/>Đăng ký giá muối ăn
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
                                        <th>Đăng ký giá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgmuoi->index) && $permission->kkdkgmuoi->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgmuoi][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgmuoi->create) && $permission->kkdkgmuoi->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgmuoi][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgmuoi->edit) && $permission->kkdkgmuoi->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgmuoi][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgmuoi->delete) && $permission->kkdkgmuoi->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgmuoi][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgmuoi->approve) && $permission->kkdkgmuoi->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgmuoi][approve]"/></td>
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
                                            <th>Tổng hợp giá</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgmuoi->baocao) && $permission->thdkgmuoi->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgmuoi][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgmuoi->congbo) && $permission->thdkgmuoi->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgmuoi][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgmuoi->timkiem) && $permission->thdkgmuoi->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgmuoi][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgmuoi->xdttdn) && $permission->thdkgmuoi->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgmuoi][xdttdn]"/></td>
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

