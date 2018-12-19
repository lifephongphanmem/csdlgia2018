<!--Giá thuê tài sản công-->
@if(canGeneral('gialephitruocba','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->gialephitruocba->index) && $permission->gialephitruocba->index == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocba][index]"/>Giá thuế trước bạ
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
                                    <th>DM giá lệ phí trước bạ</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgialephitruocba->index) && $permission->dmgialephitruocba->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgialephitruocba][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgialephitruocba->create) && $permission->dmgialephitruocba->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgialephitruocba][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgialephitruocba->edit) && $permission->dmgialephitruocba->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgialephitruocba][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgialephitruocba->delete) && $permission->dmgialephitruocba->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgialephitruocba][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgialephitruocba->approve) && $permission->dmgialephitruocba->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmgialephitruocba][approve]"/></td>
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
                                    <th>Kê khai giá lệ phí trước bạ</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocba->index) && $permission->kkgialephitruocba->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocba][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocba->create) && $permission->kkgialephitruocba->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocba][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocba->edit) && $permission->kkgialephitruocba->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocba][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocba->delete) && $permission->kkgialephitruocba->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocba][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocba->approve) && $permission->kkgialephitruocba->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocba][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgialephitruocba->baocao) && $permission->thgialephitruocba->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgialephitruocba][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgialephitruocba->congbo) && $permission->thgialephitruocba->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgialephitruocba][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgialephitruocba->timkiem) && $permission->thgialephitruocba->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgialephitruocba][timkiem]"/></td>
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