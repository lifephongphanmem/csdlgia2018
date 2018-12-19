<!--Giá đấu giá đất-->
@if(canGeneral('giadaugiadat','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box yellow">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giadaugiadat->index) && $permission->giadaugiadat->index == 1) ? 'checked' : '' }} value="1" name="roles[giadaugiadat][index]"/>Giá đấu giá đất
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
                                    <th>Kê khai giá đấu giá đất</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadaugiadat->index) && $permission->kkgiadaugiadat->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadaugiadat][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadaugiadat->create) && $permission->kkgiadaugiadat->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadaugiadat][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadaugiadat->edit) && $permission->kkgiadaugiadat->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadaugiadat][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadaugiadat->delete) && $permission->kkgiadaugiadat->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadaugiadat][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadaugiadat->approve) && $permission->kkgiadaugiadat->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadaugiadat][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiadaugiadat->baocao) && $permission->thgiadaugiadat->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiadaugiadat][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadaugiadat->congbo) && $permission->thgiadaugiadat->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiadaugiadat][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadaugiadat->timkiem) && $permission->thgiadaugiadat->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiadaugiadat][timkiem]"/></td>
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