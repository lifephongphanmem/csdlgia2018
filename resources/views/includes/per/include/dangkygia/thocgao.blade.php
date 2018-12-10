@if(canGeneral('dkgthocgao','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgthocgao->index) && $permission->dkgthocgao->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgthocgao][index]"/>Đăng ký giá Thóc gạo
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
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthocgao->index) && $permission->kkdkgthocgao->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthocgao][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthocgao->create) && $permission->kkdkgthocgao->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthocgao][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthocgao->edit) && $permission->kkdkgthocgao->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthocgao][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthocgao->delete) && $permission->kkdkgthocgao->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthocgao][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthocgao->approve) && $permission->kkdkgthocgao->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthocgao][approve]"/></td>
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
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthocgao->baocao) && $permission->thdkgthocgao->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthocgao][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthocgao->congbo) && $permission->thdkgthocgao->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthocgao][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthocgao->timkiem) && $permission->thdkgthocgao->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthocgao][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthocgao->xdttdn) && $permission->thdkgthocgao->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthocgao][xdttdn]"/></td>
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

