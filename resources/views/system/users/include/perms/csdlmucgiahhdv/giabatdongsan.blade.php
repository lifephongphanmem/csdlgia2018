<!--Giá đất cụ thể của dự án-->
@if(canGeneral('giabatdongsan','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giabatdongsan->index) && $permission->giabatdongsan->index == 1) ? 'checked' : '' }} value="1" name="roles[giabatdongsan][index]"/>Giá giao dịch bất động sản
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
                                    <th>Hồ sơ giá giao dịch bất động sản</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsgiabatdongsan->index) && $permission->hsgiabatdongsan->index == 1) ? 'checked' : '' }} value="1" name="roles[hsgiabatdongsan][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsgiabatdongsan->create) && $permission->hsgiabatdongsan->create == 1) ? 'checked' : '' }} value="1" name="roles[hsgiabatdongsan][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsgiabatdongsan->edit) && $permission->hsgiabatdongsan->edit == 1) ? 'checked' : '' }} value="1" name="roles[hsgiabatdongsan][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsgiabatdongsan->delete) && $permission->hsgiabatdongsan->delete == 1) ? 'checked' : '' }} value="1" name="roles[hsgiabatdongsan][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsgiabatdongsan->approve) && $permission->hsgiabatdongsan->approve == 1) ? 'checked' : '' }} value="1" name="roles[hsgiabatdongsan][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiabatdongsan->baocao) && $permission->thgiabatdongsan->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiabatdongsan][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiabatdongsan->congbo) && $permission->thgiabatdongsan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiabatdongsan][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiabatdongsan->timkiem) && $permission->thgiabatdongsan->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiabatdongsan][timkiem]"/></td>
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