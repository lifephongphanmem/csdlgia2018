@if(canGeneral('dkgsuate6t','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgsuate6t->index) && $permission->dkgsuate6t->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgsuate6t][index]"/>Đăng ký giá sữa dành cho trẻ em dưới 6 tuổi
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
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgsuate6t->index) && $permission->kkdkgsuate6t->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgsuate6t][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgsuate6t->create) && $permission->kkdkgsuate6t->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgsuate6t][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgsuate6t->edit) && $permission->kkdkgsuate6t->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgsuate6t][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgsuate6t->delete) && $permission->kkdkgsuate6t->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgsuate6t][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgsuate6t->approve) && $permission->kkdkgsuate6t->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgsuate6t][approve]"/></td>
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
                                            <td><input type="checkbox" {{ (isset($permission->thdkgsuate6t->baocao) && $permission->thdkgsuate6t->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgsuate6t][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgsuate6t->congbo) && $permission->thdkgsuate6t->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgsuate6t][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgsuate6t->timkiem) && $permission->thdkgsuate6t->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgsuate6t][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgsuate6t->xdttdn) && $permission->thdkgsuate6t->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgsuate6t][xdttdn]"/></td>
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

