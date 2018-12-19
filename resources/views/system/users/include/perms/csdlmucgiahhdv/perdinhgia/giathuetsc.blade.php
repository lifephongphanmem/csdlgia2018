<!--Giá thuê tài sản công-->
@if(canGeneral('giathuetscong','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giathuetscong->index) && $permission->giathuetscong->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetscong][index]"/>Giá thuê tài sản công
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
                                    <th>Kê khai giá thuê tài sản công</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetscong->index) && $permission->kkgiathuetscong->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetscong][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetscong->create) && $permission->kkgiathuetscong->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetscong][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetscong->edit) && $permission->kkgiathuetscong->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetscong][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetscong->delete) && $permission->kkgiathuetscong->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetscong][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetscong->approve) && $permission->kkgiathuetscong->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetscong][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetscong->baocao) && $permission->thgiathuetscong->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetscong][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetscong->congbo) && $permission->thgiathuetscong->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetscong][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetscong->timkiem) && $permission->thgiathuetscong->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetscong][timkiem]"/></td>
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