<!--Giá nước sạch sinh hoạt-->
@if(canGeneral('gianuocsh','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->gianuocsh->index) && $permission->gianuocsh->index == 1) ? 'checked' : '' }} value="1" name="roles[gianuocsh][index]"/>Giá nước sạch sinh hoạt
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
                                    <th>Kê khai giá nước sạch sinh hoạt</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgianuocsh->index) && $permission->kkgianuocsh->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgianuocsh][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgianuocsh->create) && $permission->kkgianuocsh->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgianuocsh][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgianuocsh->edit) && $permission->kkgianuocsh->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgianuocsh][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgianuocsh->delete) && $permission->kkgianuocsh->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgianuocsh][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgianuocsh->approve) && $permission->kkgianuocsh->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgianuocsh][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgianuocsh->baocao) && $permission->thgianuocsh->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgianuocsh][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgianuocsh->congbo) && $permission->thgianuocsh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgianuocsh][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgianuocsh->timkiem) && $permission->thgianuocsh->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgianuocsh][timkiem]"/></td>
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