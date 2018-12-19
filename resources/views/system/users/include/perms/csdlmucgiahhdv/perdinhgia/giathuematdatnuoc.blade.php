<!--Giá thuê mặt đất nước-->
@if(canGeneral('giathuedatnuoc','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giathuedatnuoc->index) && $permission->giathuedatnuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuedatnuoc][index]"/>Giá thuê mặt đất, mặt nước
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
                                    <th>Kê khai giá thuê mặt đất,nước</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuedatnuoc->index) && $permission->kkgiathuedatnuoc->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuedatnuoc][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuedatnuoc->create) && $permission->kkgiathuedatnuoc->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuedatnuoc][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuedatnuoc->edit) && $permission->kkgiathuedatnuoc->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuedatnuoc][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuedatnuoc->delete) && $permission->kkgiathuedatnuoc->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuedatnuoc][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuedatnuoc->approve) && $permission->kkgiathuedatnuoc->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuedatnuoc][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuedatnuoc->baocao) && $permission->thgiathuedatnuoc->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuedatnuoc][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuedatnuoc->congbo) && $permission->thgiathuedatnuoc->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuedatnuoc][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuedatnuoc->timkiem) && $permission->thgiathuedatnuoc->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuedatnuoc][timkiem]"/></td>
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