<!--Giá thuê tài sản công-->
@if(canGeneral('thanhlytaisan','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->thanhlytaisan->index) && $permission->thanhlytaisan->index == 1) ? 'checked' : '' }} value="1" name="roles[thanhlytaisan][index]"/>Thanh lý tài sản
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
                                    <th>Kê khai thanh lý tài sản</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkthanhlytaisan->index) && $permission->kkthanhlytaisan->index == 1) ? 'checked' : '' }} value="1" name="roles[kkthanhlytaisan][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkthanhlytaisan->create) && $permission->kkthanhlytaisan->create == 1) ? 'checked' : '' }} value="1" name="roles[kkthanhlytaisan][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkthanhlytaisan->edit) && $permission->kkthanhlytaisan->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkthanhlytaisan][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkthanhlytaisan->delete) && $permission->kkthanhlytaisan->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkthanhlytaisan][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkthanhlytaisan->approve) && $permission->kkthanhlytaisan->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkthanhlytaisan][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->ththanhlytaisan->baocao) && $permission->ththanhlytaisan->baocao == 1) ? 'checked' : '' }} value="1" name="roles[ththanhlytaisan][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->ththanhlytaisan->congbo) && $permission->ththanhlytaisan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[ththanhlytaisan][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->ththanhlytaisan->timkiem) && $permission->ththanhlytaisan->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[ththanhlytaisan][timkiem]"/></td>
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