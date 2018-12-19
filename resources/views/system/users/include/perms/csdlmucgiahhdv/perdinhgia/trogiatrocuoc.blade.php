<!--Giá thuê tài sản công-->
@if(canGeneral('trogiatrocuoc','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->trogiatrocuoc->index) && $permission->trogiatrocuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[trogiatrocuoc][index]"/>Mức trợ giá, trợ cước
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
                                    <th>DM mức trợ giá trợ cước</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmtrogiatrocuoc->index) && $permission->dmtrogiatrocuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[dmtrogiatrocuoc][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmtrogiatrocuoc->create) && $permission->dmtrogiatrocuoc->create == 1) ? 'checked' : '' }} value="1" name="roles[dmtrogiatrocuoc][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmtrogiatrocuoc->edit) && $permission->dmtrogiatrocuoc->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmtrogiatrocuoc][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmtrogiatrocuoc->delete) && $permission->dmtrogiatrocuoc->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmtrogiatrocuoc][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmtrogiatrocuoc->approve) && $permission->dmtrogiatrocuoc->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmtrogiatrocuoc][approve]"/></td>
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
                                    <th>Kê khai mức trợ giá trợ cước</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kktrogiatrocuoc->index) && $permission->kktrogiatrocuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[kktrogiatrocuoc][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kktrogiatrocuoc->create) && $permission->kktrogiatrocuoc->create == 1) ? 'checked' : '' }} value="1" name="roles[kktrogiatrocuoc][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kktrogiatrocuoc->edit) && $permission->kktrogiatrocuoc->edit == 1) ? 'checked' : '' }} value="1" name="roles[kktrogiatrocuoc][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kktrogiatrocuoc->delete) && $permission->kktrogiatrocuoc->delete == 1) ? 'checked' : '' }} value="1" name="roles[kktrogiatrocuoc][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kktrogiatrocuoc->approve) && $permission->kktrogiatrocuoc->approve == 1) ? 'checked' : '' }} value="1" name="roles[kktrogiatrocuoc][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thtrogiatrocuoc->baocao) && $permission->thtrogiatrocuoc->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thtrogiatrocuoc][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thtrogiatrocuoc->congbo) && $permission->thtrogiatrocuoc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thtrogiatrocuoc][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thtrogiatrocuoc->timkiem) && $permission->thtrogiatrocuoc->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thtrogiatrocuoc][timkiem]"/></td>
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