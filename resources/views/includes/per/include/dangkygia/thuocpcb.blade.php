@if(canGeneral('dkgthuocpcb','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->dkgthuocpcb->index) && $permission->dkgthuocpcb->index == 1) ? 'checked' : '' }} value="1" name="roles[dkgthuocpcb][index]"/>Đăng ký giá thuốc phòng chữa bệnh cho người
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
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocpcb->index) && $permission->kkdkgthuocpcb->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocpcb][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocpcb->create) && $permission->kkdkgthuocpcb->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocpcb][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocpcb->edit) && $permission->kkdkgthuocpcb->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocpcb][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocpcb->delete) && $permission->kkdkgthuocpcb->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocpcb][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkdkgthuocpcb->approve) && $permission->kkdkgthuocpcb->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdkgthuocpcb][approve]"/></td>
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
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocpcb->baocao) && $permission->thdkgthuocpcb->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocpcb][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocpcb->congbo) && $permission->thdkgthuocpcb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocpcb][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocpcb->timkiem) && $permission->thdkgthuocpcb->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocpcb][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thdkgthuocpcb->xdttdn) && $permission->thdkgthuocpcb->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thdkgthuocpcb][xdttdn]"/></td>
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

