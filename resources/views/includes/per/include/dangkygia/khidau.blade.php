@if(canGeneral('dkgkhidau','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgkhidau->index) && $permission->dkgkhidau->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgkhidau][index]"/>Đăng ký giá khí dầu
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
                                        <th>Đăng ký giá khí dầu</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgkhidau->index) && $permission->kkdkgkhidau->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgkhidau][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgkhidau->create) && $permission->kkdkgkhidau->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgkhidau][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgkhidau->edit) && $permission->kkdkgkhidau->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgkhidau][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgkhidau->delete) && $permission->kkdkgkhidau->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgkhidau][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgkhidau->approve) && $permission->kkdkgkhidau->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgkhidau][approve]"/></td>
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
                                            <th>Tổng hợp giá khí dầu</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgkhidau->baocao) && $permission->thdkgkhidau->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgkhidau][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgkhidau->congbo) && $permission->thdkgkhidau->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgkhidau][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgkhidau->timkiem) && $permission->thdkgkhidau->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgkhidau][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgkhidau->xdttdn) && $permission->thdkgkhidau->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgkhidau][xdttdn]"/></td>
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

