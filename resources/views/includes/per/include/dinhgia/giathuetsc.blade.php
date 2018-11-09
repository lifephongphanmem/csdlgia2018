<!--Giá thuê tài sản công-->
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giathuetsc->index) && $permission->giathuetsc->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuetsc][index]"/>Giá thuê tài sản công
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
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetsc->index) && $permission->kkgiathuetsc->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetsc][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetsc->create) && $permission->kkgiathuetsc->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetsc][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetsc->edit) && $permission->kkgiathuetsc->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetsc][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetsc->delete) && $permission->kkgiathuetsc->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetsc][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuetsc->approve) && $permission->kkgiathuetsc->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuetsc][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetsc->baocao) && $permission->thgiathuetsc->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetsc][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetsc->congbo) && $permission->thgiathuetsc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetsc][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuetsc->timkiem) && $permission->thgiathuetsc->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuetsc][timkiem]"/></td>
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