<!--Giá đấu giá đất-->
@if(canGeneral('daugiadatts','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->daugiadatts->index) && $permission->daugiadatts->index == 1) ? 'checked' : '' }} value="1" name="roles[daugiadatts][index]"/>Giá đấu giá đất và tài sản gắn liền đất
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
                                    <th>Kê khai giá</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkdaugiadatts->index) && $permission->kkdaugiadatts->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdaugiadatts][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkdaugiadatts->create) && $permission->kkdaugiadatts->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdaugiadatts][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkdaugiadatts->edit) && $permission->kkdaugiadatts->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdaugiadatts][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkdaugiadatts->delete) && $permission->kkdaugiadatts->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdaugiadatts][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkdaugiadatts->approve) && $permission->kkdaugiadatts->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdaugiadatts][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thdaugiadatts->baocao) && $permission->thdaugiadatts->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thdaugiadatts][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thdaugiadatts->congbo) && $permission->thdaugiadatts->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thdaugiadatts][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thdaugiadatts->timkiem) && $permission->thdaugiadatts->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thdaugiadatts][timkiem]"/></td>
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