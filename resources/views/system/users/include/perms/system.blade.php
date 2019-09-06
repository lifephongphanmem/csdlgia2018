@if($model->level == 'T')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                     Quản trị hệ thống
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <td width="2%"><input type="checkbox" {{ (isset($permission->system->index) && $permission->system->index == 1) ? 'checked' : '' }} value="1" name="roles[system][index]"/></td>
                                    <td>Quản trị hệ thống</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        @if($model->level == 'T' || $model->level == 'H')
                            @if($model->level == 'T')
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                            </th>
                                            <th>Thông tin ngày nghỉ lễ</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ngaynghile->index) && $permission->ngaynghile->index == 1) ? 'checked' : '' }} value="1" name="roles[ngaynghile][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ngaynghile->create) && $permission->ngaynghile->create == 1) ? 'checked' : '' }} value="1" name="roles[ngaynghile][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ngaynghile->edit) && $permission->ngaynghile->edit == 1) ? 'checked' : '' }} value="1" name="roles[ngaynghile][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->ngaynghile->delete) && $permission->ngaynghile->delete == 1) ? 'checked' : '' }} value="1" name="roles[ngaynghile][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                            </th>
                                            <th>Danh mục địa danh</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdiadanh->index) && $permission->dmdiadanh->index == 1) ? 'checked' : '' }} value="1" name="roles[dmdiadanh][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdiadanh->create) && $permission->dmdiadanh->create == 1) ? 'checked' : '' }} value="1" name="roles[dmdiadanh][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdiadanh->edit) && $permission->dmdiadanh->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmdiadanh][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->dmdiadanh->delete) && $permission->dmdiadanh->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmdiadanh][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%"></th>
                                            <th>Danh sách Đơn vị quản lý</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->districts->index) && $permission->districts->index == 1) ? 'checked' : '' }} value="1" name="roles[districts][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->districts->create) && $permission->districts->create == 1) ? 'checked' : '' }} value="1" name="roles[districts][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->districts->edit) && $permission->districts->edit == 1) ? 'checked' : '' }} value="1" name="roles[districts][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->districts->delete) && $permission->districts->delete == 1) ? 'checked' : '' }} value="1" name="roles[districts][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                        </th>
                                        <th>Danh sách Đơn vị </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->towns->index) && $permission->towns->index == 1) ? 'checked' : '' }} value="1" name="roles[towns][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->towns->create) && $permission->towns->create == 1) ? 'checked' : '' }} value="1" name="roles[towns][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->towns->edit) && $permission->towns->edit == 1) ? 'checked' : '' }} value="1" name="roles[towns][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->towns->delete) && $permission->towns->delete == 1) ? 'checked' : '' }} value="1" name="roles[towns][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                    </th>
                                    <th>Danh sách doanh nghiệp kê khai giá </th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->companies->index) && $permission->companies->index == 1) ? 'checked' : '' }} value="1" name="roles[companies][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->companies->create) && $permission->companies->create == 1) ? 'checked' : '' }} value="1" name="roles[companies][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->companies->edit) && $permission->companies->edit == 1) ? 'checked' : '' }} value="1" name="roles[companies][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->companies->delete) && $permission->companies->delete == 1) ? 'checked' : '' }} value="1" name="roles[companies][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                    </th>
                                    <th>Danh sách tài khoản</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->users->index) && $permission->users->index == 1) ? 'checked' : '' }} value="1" name="roles[users][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->users->create) && $permission->users->create == 1) ? 'checked' : '' }} value="1" name="roles[users][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->users->edit) && $permission->users->edit == 1) ? 'checked' : '' }} value="1" name="roles[users][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->users->delete) && $permission->users->delete == 1) ? 'checked' : '' }} value="1" name="roles[users][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->users->per) && $permission->users->per == 1) ? 'checked' : '' }} value="1" name="roles[users][per]"/></td>
                                    <td>Phân quyền</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                    </th>
                                    <th>Đăng ký tài khoản</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->register->index) && $permission->register->index == 1) ? 'checked' : '' }} value="1" name="roles[register][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->register->create) && $permission->register->create == 1) ? 'checked' : '' }} value="1" name="roles[register][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->register->edit) && $permission->register->edit == 1) ? 'checked' : '' }} value="1" name="roles[register][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->register->delete) && $permission->register->delete == 1) ? 'checked' : '' }} value="1" name="roles[register][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->register->approve) && $permission->register->approve == 1) ? 'checked' : '' }} value="1" name="roles[register][approve]"/></td>
                                    <td>Xét duyệt</td>
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