@if(canGeneral('bpbog','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->bpbog->index) && $permission->bpbog->index == 1) ? 'checked' : '' }} value="1" name="roles[bpbog][index]"/>Biện pháp bình ổn giá
                    </div>
                    <div class="tools">
                        <a href="" class="expand" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" style="display: none;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="col-md-3">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead class="action">
                                        <tr>
                                            <th class="table-checkbox" width="5%">
                                            </th>
                                            <th>Kê khai BOG</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkbpbog->index) && $permission->kkbpbog->index == 1) ? 'checked' : '' }} value="1" name="roles[kkbpbog][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkbpbog->create) && $permission->kkbpbog->create == 1) ? 'checked' : '' }} value="1" name="roles[kkbpbog][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkbpbog->edit) && $permission->kkbpbog->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkbpbog][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkbpbog->delete) && $permission->kkbpbog->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkbpbog][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkbpbog->approve) && $permission->kkbpbog->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkbpbog][approve]"/></td>
                                            <td>Xét duyệt</td>
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
                                            <th>Tổng hợp</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thbpbog->baocao) && $permission->thbpbog->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thbpbog][baocao]"/></td>
                                            <td>Báo cáo</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thbpbog->congbo) && $permission->thbpbog->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thbpbog][congbo]"/></td>
                                            <td>Công bố </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->thbpbog->timkiem) && $permission->thbpbog->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thbpbog][timkiem]"/></td>
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
    </div>
@endif
@endif
