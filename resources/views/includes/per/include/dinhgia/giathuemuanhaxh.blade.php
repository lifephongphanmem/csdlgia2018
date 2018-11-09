<!--Giá thuê mua nhà xã hội-->
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giathuemuanhaxh->index) && $permission->giathuemuanhaxh->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuemuanhaxh][index]"/>Giá thuê mua nhà xã hội
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
                                    <th>Kê khai giá thuê mua nhà XH</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuemuanhaxh->index) && $permission->kkgiathuemuanhaxh->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuemuanhaxh][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuemuanhaxh->create) && $permission->kkgiathuemuanhaxh->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuemuanhaxh][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuemuanhaxh->edit) && $permission->kkgiathuemuanhaxh->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuemuanhaxh][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuemuanhaxh->delete) && $permission->kkgiathuemuanhaxh->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuemuanhaxh][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiathuemuanhaxh->approve) && $permission->kkgiathuemuanhaxh->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuemuanhaxh][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuemuanhaxh->baocao) && $permission->thgiathuemuanhaxh->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuemuanhaxh][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuemuanhaxh->congbo) && $permission->thgiathuemuanhaxh->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuemuanhaxh][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiathuemuanhaxh->timkiem) && $permission->thgiathuemuanhaxh->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuemuanhaxh][timkiem]"/></td>
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