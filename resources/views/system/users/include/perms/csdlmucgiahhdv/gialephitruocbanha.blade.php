@if(canGeneral('gialephitruocbanha','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->gialephitruocbanha->index) && $permission->gialephitruocbanha->index == 1) ? 'checked' : '' }} value="1" name="roles[gialephitruocbanha][index]"/>Giá thuế trước bạ đối với nhà
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
                                    <th>Kê khai giá lệ phí trước bạ đối với nhà</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocbanha->index) && $permission->kkgialephitruocbanha->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocbanha][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocbanha->create) && $permission->kkgialephitruocbanha->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocbanha][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocbanha->edit) && $permission->kkgialephitruocbanha->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocbanha][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocbanha->delete) && $permission->kkgialephitruocbanha->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocbanha][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgialephitruocbanha->approve) && $permission->kkgialephitruocbanha->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgialephitruocbanha][approve]"/></td>
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
                                {{--<tr>--}}
                                    {{--<td><input type="checkbox" {{ (isset($permission->thgialephitruocba->baocao) && $permission->thgialephitruocba->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgialephitruocba][baocao]"/></td>--}}
                                    {{--<td>Báo cáo tổng hợp</td>--}}
                                {{--</tr>--}}
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgialephitruocbanha->congbo) && $permission->thgialephitruocbanha->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgialephitruocbanha][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgialephitruocbanha->timkiem) && $permission->thgialephitruocbanha->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgialephitruocbanha][timkiem]"/></td>
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