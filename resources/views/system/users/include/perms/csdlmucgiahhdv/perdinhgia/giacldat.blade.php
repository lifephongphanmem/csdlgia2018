<!--Giá các loại đất-->
@if(canGeneral('giacldat','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giacldat->index) && $permission->giacldat->index == 1) ? 'checked' : '' }} value="1" name="roles[giacldat][index]"/>Giá các loại đất
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
                                    <th>DM TTQD giá các loại đất</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiacldat->index) && $permission->dmgiacldat->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacldat][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiacldat->create) && $permission->dmgiacldat->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacldat][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiacldat->edit) && $permission->dmgiacldat->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacldat][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiacldat->delete) && $permission->dmgiacldat->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiacldat][delete]"/></td>
                                    <td>Xóa</td>
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
                                    <th>Kê khai giá các loại đất</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiacldat->index) && $permission->kkgiacldat->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacldat][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiacldat->create) && $permission->kkgiacldat->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacldat][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiacldat->edit) && $permission->kkgiacldat->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacldat][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiacldat->delete) && $permission->kkgiacldat->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiacldat][delete]"/></td>
                                    <td>Xóa</td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiacldat->baocao) && $permission->thgiacldat->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiacldat][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiacldat->congbo) && $permission->thgiacldat->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiacldat][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiacldat->timkiem) && $permission->thgiacldat->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiacldat][timkiem]"/></td>
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