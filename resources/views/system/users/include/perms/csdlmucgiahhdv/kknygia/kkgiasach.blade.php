@if(canGeneral('sach','index'))
    @if($model->level == 'SACH' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->sach->index) && $permission->sach->index == 1) ? 'checked' : '' }} value="1" name="roles[sach][index]"/>Sách giáo khoa
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
                                            <th>Kê khai giá sách giáo khoa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kksach->index) && $permission->kksach->index == 1) ? 'checked' : '' }} value="1" name="roles[kksach][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kksach->create) && $permission->kksach->create == 1) ? 'checked' : '' }} value="1" name="roles[kksach][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kksach->edit) && $permission->kksach->edit == 1) ? 'checked' : '' }} value="1" name="roles[kksach][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kksach->delete) && $permission->kksach->delete == 1) ? 'checked' : '' }} value="1" name="roles[kksach][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kksach->approve) && $permission->kksach->approve == 1) ? 'checked' : '' }} value="1" name="roles[kksach][approve]"/></td>
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
                                                <th>Tổng hợp giá sách giáo khoa</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thsach->baocao) && $permission->thsach->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thsach][baocao]"/></td>
                                                <td>Báo cáo</td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thsach->congbo) && $permission->thsach->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thsach][congbo]"/></td>
                                                <td>Công bố</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thsach->timkiem) && $permission->thsach->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thsach][timkiem]"/></td>
                                                <td>Tìm kiếm</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thsach->xdttdn) && $permission->thsach->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thsach][xdttdn]"/></td>
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