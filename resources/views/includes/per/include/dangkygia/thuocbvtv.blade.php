@if(canGeneral('dkgthuocbvtv','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgthuocbvtv->index) && $permission->dkgthuocbvtv->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgthuocbvtv][index]"/>Đăng ký giá thuốc bảo vệ thực vật
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
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocbvtv->index) && $permission->kkdkgthuocbvtv->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocbvtv][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocbvtv->create) && $permission->kkdkgthuocbvtv->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocbvtv][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocbvtv->edit) && $permission->kkdkgthuocbvtv->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocbvtv][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocbvtv->delete) && $permission->kkdkgthuocbvtv->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocbvtv][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocbvtv->approve) && $permission->kkdkgthuocbvtv->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocbvtv][approve]"/></td>
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
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocbvtv->baocao) && $permission->thdkgthuocbvtv->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocbvtv][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocbvtv->congbo) && $permission->thdkgthuocbvtv->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocbvtv][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocbvtv->timkiem) && $permission->thdkgthuocbvtv->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocbvtv][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocbvtv->xdttdn) && $permission->thdkgthuocbvtv->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocbvtv][xdttdn]"/></td>
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

