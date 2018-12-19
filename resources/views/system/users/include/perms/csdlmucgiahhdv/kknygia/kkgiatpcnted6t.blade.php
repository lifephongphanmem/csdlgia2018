@if(canGeneral('tpcnte6t','index'))
    @if($model->level == 'TPCNTE6T' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->tpcnte6t->index) && $permission->tpcnte6t->index == 1) ? 'checked' : '' }} value="1" name="roles[tpcnte6t][index]"/>TPCN cho TE dưới 6 tuổi
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
                                            <th>Kê khai giá TPCNTE6T</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktpcnte6t->index) && $permission->kktpcnte6t->index == 1) ? 'checked' : '' }} value="1" name="roles[kktpcnte6t][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktpcnte6t->create) && $permission->kktpcnte6t->create == 1) ? 'checked' : '' }} value="1" name="roles[kktpcnte6t][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktpcnte6t->edit) && $permission->kktpcnte6t->edit == 1) ? 'checked' : '' }} value="1" name="roles[kktpcnte6t][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktpcnte6t->delete) && $permission->kktpcnte6t->delete == 1) ? 'checked' : '' }} value="1" name="roles[kktpcnte6t][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kktpcnte6t->approve) && $permission->kktpcnte6t->approve == 1) ? 'checked' : '' }} value="1" name="roles[kktpcnte6t][approve]"/></td>
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
                                                <th>Tổng hợp giá TPCNTE6T</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtpcnte6t->baocao) && $permission->thtpcnte6t->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thtpcnte6t][baocao]"/></td>
                                                <td>Báo cáo</td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtpcnte6t->congbo) && $permission->thtpcnte6t->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thtpcnte6t][congbo]"/></td>
                                                <td>Công bố</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtpcnte6t->timkiem) && $permission->thtpcnte6t->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thtpcnte6t][timkiem]"/></td>
                                                <td>Tìm kiếm</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thtpcnte6t->xdttdn) && $permission->thtpcnte6t->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thtpcnte6t][xdttdn]"/></td>
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

