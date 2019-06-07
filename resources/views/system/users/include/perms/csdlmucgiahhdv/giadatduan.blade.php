<!--Giá đất cụ thể của dự án-->
@if(canGeneral('giadatduan','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giadatduan->index) && $permission->giadatduan->index == 1) ? 'checked' : '' }} value="1" name="roles[giadatduan][index]"/>Giá đất cụ thể của dự án
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
                                    <th>Kê khai giá đất cụ thể của dự án</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatduan->index) && $permission->kkgiadatduan->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatduan][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatduan->create) && $permission->kkgiadatduan->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatduan][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatduan->edit) && $permission->kkgiadatduan->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatduan][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatduan->delete) && $permission->kkgiadatduan->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatduan][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadatduan->approve) && $permission->kkgiadatduan->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadatduan][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiadatduan->baocao) && $permission->thgiadatduan->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiadatduan][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadatduan->congbo) && $permission->thgiadatduan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiadatduan][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadatduan->timkiem) && $permission->thgiadatduan->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiadatduan][timkiem]"/></td>
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