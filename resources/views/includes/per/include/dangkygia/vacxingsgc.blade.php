@if(canGeneral('dkgvacxingsgc','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgvacxingsgc->index) && $permission->dkgvacxingsgc->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgvacxingsgc][index]"/>Đăng ký giá vắc- xin phòng bệnh gia súc gia cầm
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
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgvacxingsgc->index) && $permission->kkdkgvacxingsgc->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgvacxingsgc][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgvacxingsgc->create) && $permission->kkdkgvacxingsgc->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgvacxingsgc][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgvacxingsgc->edit) && $permission->kkdkgvacxingsgc->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgvacxingsgc][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgvacxingsgc->delete) && $permission->kkdkgvacxingsgc->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgvacxingsgc][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgvacxingsgc->approve) && $permission->kkdkgvacxingsgc->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgvacxingsgc][approve]"/></td>
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
                                            <td><input type="checkbox" {{ (isset($permission->thdkgvacxingsgc->baocao) && $permission->thdkgvacxingsgc->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgvacxingsgc][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgvacxingsgc->congbo) && $permission->thdkgvacxingsgc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgvacxingsgc][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgvacxingsgc->timkiem) && $permission->thdkgvacxingsgc->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgvacxingsgc][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgvacxingsgc->xdttdn) && $permission->thdkgvacxingsgc->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgvacxingsgc][xdttdn]"/></td>
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

