@if(canGeneral('dkgphan','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgphan->index) && $permission->dkgphan->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgphan][index]"/>Đăng ký giá phân đạm Urê; phân NPK
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
                                        <th>Đăng ký giá phân đạm Urê; phân NPK</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgphan->index) && $permission->kkdkgphan->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgphan][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgphan->create) && $permission->kkdkgphan->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgphan][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgphan->edit) && $permission->kkdkgphan->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgphan][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgphan->delete) && $permission->kkdkgphan->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgphan][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgphan->approve) && $permission->kkdkgphan->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgphan][approve]"/></td>
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
                                            <th>Tổng hợp giá phân đạm Urê; phân NPK</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgphan->baocao) && $permission->thdkgphan->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgphan][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgphan->congbo) && $permission->thdkgphan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgphan][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgphan->timkiem) && $permission->thdkgphan->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgphan][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgphan->xdttdn) && $permission->thdkgphan->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgphan][xdttdn]"/></td>
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

