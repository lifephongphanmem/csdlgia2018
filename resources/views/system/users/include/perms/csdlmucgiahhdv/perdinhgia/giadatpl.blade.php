<!--Giá đất cụ thể của dự án-->
@if(canGeneral('giadatpl','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giadatpl->index) && $permission->giadatpl->index == 1) ? 'checked' : '' }} value="1" name="roles[giadatpl][index]"/>Giá đất phân loại
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
                                    <th class="table-checkbox" width="2%">
                                    </th>
                                    <th>Kê khai giá đất phân loại</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatpl->index) && $permission->kkgiadatpl->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatpl][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatpl->create) && $permission->kkgiadatpl->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatpl][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatpl->edit) && $permission->kkgiadatpl->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatpl][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatpl->delete) && $permission->kkgiadatpl->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatpl][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatpl->approve) && $permission->kkgiadatpl->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatpl][approve]"/></td>
                                    <td>Xét duyệt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="2%">
                                    </th>
                                    <th>Tổng hợp</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadatpl->baocao) && $permission->thgiadatpl->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiadatpl][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadatpl->congbo) && $permission->thgiadatpl->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiadatpl][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadatpl->timkiem) && $permission->thgiadatpl->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiadatpl][timkiem]"/></td>
                                    <td>Tìm kiếm</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif