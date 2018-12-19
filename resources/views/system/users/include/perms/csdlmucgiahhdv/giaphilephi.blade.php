<!--Giá thuê tài sản công-->
@if(canGeneral('giaphilephi','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giaphilephi->index) && $permission->giaphilephi->index == 1) ? 'checked' : '' }} value="1" name="roles[giaphilephi][index]"/>Giá phí lệ phí
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
                                    <th>DM phí lệ phí</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaphilephi->index) && $permission->dmgiaphilephi->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaphilephi][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaphilephi->create) && $permission->dmgiaphilephi->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaphilephi][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaphilephi->edit) && $permission->dmgiaphilephi->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaphilephi][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaphilephi->delete) && $permission->dmgiaphilephi->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaphilephi][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmgiaphilephi->approve) && $permission->dmgiaphilephi->approve == 1) ? 'checked' : '' }} value="1" name="roles[dmgiaphilephi][approve]"/></td>
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
                                    <th>Kê khai phí lệ phí</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaphilephi->index) && $permission->kkgiaphilephi->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaphilephi][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaphilephi->create) && $permission->kkgiaphilephi->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaphilephi][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaphilephi->edit) && $permission->kkgiaphilephi->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaphilephi][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaphilephi->delete) && $permission->kkgiaphilephi->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaphilephi][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiaphilephi->approve) && $permission->kkgiaphilephi->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiaphilephi][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiaphilephi->baocao) && $permission->thgiaphilephi->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiaphilephi][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiaphilephi->congbo) && $permission->thgiaphilephi->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiaphilephi][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiaphilephi->timkiem) && $permission->thgiaphilephi->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiaphilephi][timkiem]"/></td>
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