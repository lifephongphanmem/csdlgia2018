<!--Giá dv-ts công ích-->
@if(canGeneral('giaspdvci','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giaspdvci->index) && $permission->giaspdvci->index == 1) ? 'checked' : '' }} value="1" name="roles[giaspdvci][index]"/>Giá sản phẩm dịch vụ công ích
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
                                    <th>DM gía sp-dv công ích</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaspdvci->index) && $permission->dmgiaspdvci->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaspdvci][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaspdvci->create) && $permission->dmgiaspdvci->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaspdvci][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaspdvci->edit) && $permission->dmgiaspdvci->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaspdvci][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaspdvci->delete) && $permission->dmgiaspdvci->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaspdvci][delete]"/></td>
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
                                    <th>Kê khai giá sp-dv công ích</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaspdvci->index) && $permission->kkgiaspdvci->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaspdvci][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaspdvci->create) && $permission->kkgiaspdvci->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaspdvci][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaspdvci->edit) && $permission->kkgiaspdvci->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaspdvci][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaspdvci->delete) && $permission->kkgiaspdvci->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaspdvci][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaspdvci->approve) && $permission->kkgiaspdvci->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaspdvci][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiaspdvci->baocao) && $permission->thgiaspdvci->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiaspdvci][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiaspdvci->congbo) && $permission->thgiaspdvci->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiaspdvci][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiaspdvci->timkiem) && $permission->thgiaspdvci->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiaspdvci][timkiem]"/></td>
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