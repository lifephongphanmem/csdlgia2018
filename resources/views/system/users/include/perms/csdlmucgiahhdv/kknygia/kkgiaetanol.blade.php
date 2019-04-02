@if(canGeneral('etanol','index'))
    @if($model->level == 'ETANOL' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->etanol->index) && $permission->etanol->index == 1) ? 'checked' : '' }} value="1" name="roles[etanol][index]"/>Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)
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
                                            <th>Kê khai giá etanol</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kketanol->index) && $permission->kketanol->index == 1) ? 'checked' : '' }} value="1" name="roles[kketanol][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kketanol->create) && $permission->kketanol->create == 1) ? 'checked' : '' }} value="1" name="roles[kketanol][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kketanol->edit) && $permission->kketanol->edit == 1) ? 'checked' : '' }} value="1" name="roles[kketanol][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kketanol->delete) && $permission->kketanol->delete == 1) ? 'checked' : '' }} value="1" name="roles[kketanol][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kketanol->approve) && $permission->kketanol->approve == 1) ? 'checked' : '' }} value="1" name="roles[kketanol][approve]"/></td>
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
                                                <th>Tổng hợp giá etanol</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thetanol->baocao) && $permission->thetanol->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thetanol][baocao]"/></td>
                                                <td>Báo cáo</td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thetanol->congbo) && $permission->thetanol->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thetanol][congbo]"/></td>
                                                <td>Công bố</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thetanol->timkiem) && $permission->thetanol->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thetanol][timkiem]"/></td>
                                                <td>Tìm kiếm</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thetanol->xdttdn) && $permission->thetanol->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thetanol][xdttdn]"/></td>
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