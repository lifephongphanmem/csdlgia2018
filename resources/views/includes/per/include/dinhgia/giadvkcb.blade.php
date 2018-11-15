<!--Giá thuê tài sản công-->
@if(canGeneral('giadvkcb','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->giadvkcb->index) && $permission->giadvkcb->index == 1) ? 'checked' : '' }} value="1" name="roles[giadvkcb][index]"/>Giá DV Khám chữa bệnh
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
                                    <th>Kê khai giá DV KCB</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvkcb->index) && $permission->kkgiadvkcb->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvkcb][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvkcb->create) && $permission->kkgiadvkcb->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvkcb][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvkcb->edit) && $permission->kkgiadvkcb->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvkcb][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvkcb->delete) && $permission->kkgiadvkcb->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvkcb][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->kkgiadvkcb->approve) && $permission->kkgiadvkcb->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiadvkcb][approve]"/></td>
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
                                    <td><input type="checkbox" {{ (isset($permission->thgiadvkcb->baocao) && $permission->thgiadvkcb->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiadvkcb][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadvkcb->congbo) && $permission->thgiadvkcb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiadvkcb][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thgiadvkcb->timkiem) && $permission->thgiadvkcb->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiadvkcb][timkiem]"/></td>
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