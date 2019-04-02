@if(canGeneral('than','index'))
    @if($model->level == 'THAN' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->than->index) && $permission->than->index == 1) ? 'checked' : '' }} value="1" name="roles[than][index]"/>Than
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
                                            <th>Kê khai giá THAN</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkthan->index) && $permission->kkthan->index == 1) ? 'checked' : '' }} value="1" name="roles[kkthan][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkthan->create) && $permission->kkthan->create == 1) ? 'checked' : '' }} value="1" name="roles[kkthan][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkthan->edit) && $permission->kkthan->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkthan][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkthan->delete) && $permission->kkthan->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkthan][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkthan->approve) && $permission->kkthan->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkthan][approve]"/></td>
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
                                                <th>Tổng hợp giá THAN</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ththan->baocao) && $permission->ththan->baocao == 1) ? 'checked' : '' }} value="1" name="roles[ththan][baocao]"/></td>
                                                <td>Báo cáo</td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ththan->congbo) && $permission->ththan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[ththan][congbo]"/></td>
                                                <td>Công bố</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ththan->timkiem) && $permission->ththan->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[ththan][timkiem]"/></td>
                                                <td>Tìm kiếm</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->ththan->xdttdn) && $permission->ththan->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[ththan][xdttdn]"/></td>
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

