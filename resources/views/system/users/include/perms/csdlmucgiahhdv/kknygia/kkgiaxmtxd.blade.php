@if(canGeneral('vlxd','index'))
    @if($model->level == 'XMTXD' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->xmtxd->index) && $permission->xmtxd->index == 1) ? 'checked' : '' }} value="1" name="roles[xmtxd][index]"/>Xi măng, thép xây dựng
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
                                            <th>Kê khai giá XMTXD</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkxmtxd->index) && $permission->kkxmtxd->index == 1) ? 'checked' : '' }} value="1" name="roles[kkxmtxd][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkxmtxd->create) && $permission->kkxmtxd->create == 1) ? 'checked' : '' }} value="1" name="roles[kkxmtxd][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkxmtxd->edit) && $permission->kkxmtxd->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkxmtxd][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkxmtxd->delete) && $permission->kkxmtxd->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkxmtxd][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkxmtxd->approve) && $permission->kkxmtxd->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkxmtxd][approve]"/></td>
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
                                            <th>Tổng hợp giá Xi măng, thép xây dựng</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thxmtxd->baocao) && $permission->thxmtxd->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thxmtxd][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>

                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thxmtxd->congbo) && $permission->thxmtxd->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thxmtxd][congbo]"/></td>
                                            <td>Công bố</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thxmtxd->timkiem) && $permission->thxmtxd->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thxmtxd][timkiem]"/></td>
                                            <td>Tìm kiếm</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thxmtxd->xdttdn) && $permission->thxmtxd->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thxmtxd][xdttdn]"/></td>
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

