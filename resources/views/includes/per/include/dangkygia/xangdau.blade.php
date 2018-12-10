@if(canGeneral('dkgxangdau','index'))

    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgxangdau->index) && $permission->dkgxangdau->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgxangdau][index]"/>Đăng ký giá xăng dầu
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
                                        <th>Đăng ký giá xăng dầu</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgxangdau->index) && $permission->kkdkgxangdau->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgxangdau][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgxangdau->create) && $permission->kkdkgxangdau->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgxangdau][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgxangdau->edit) && $permission->kkdkgxangdau->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgxangdau][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgxangdau->delete) && $permission->kkdkgxangdau->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgxangdau][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgxangdau->approve) && $permission->kkdkgxangdau->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgxangdau][approve]"/></td>
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
                                            <th>Tổng hợp giá xăng dầu</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgxangdau->baocao) && $permission->thdkgxangdau->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgxangdau][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgxangdau->congbo) && $permission->thdkgxangdau->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgxangdau][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgxangdau->timkiem) && $permission->thdkgxangdau->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgxangdau][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgxangdau->xdttdn) && $permission->thdkgxangdau->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgxangdau][xdttdn]"/></td>
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

