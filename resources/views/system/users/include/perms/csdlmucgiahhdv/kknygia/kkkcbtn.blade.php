@if(canGeneral('kcbtn','index'))
    @if($model->level == 'KCBTN' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->kcbtn->index) && $permission->kcbtn->index == 1) ? 'checked' : '' }} value="1" name="roles[kcbtn][index]"/>
                            Dịch vụ khám bệnh, chữa bệnh cho người tại cơ sở khám bệnh, chữa bệnh tư nhân; khám bệnh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của nhà nước
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
                                            <th class="table-checkbox" width="5%">
                                                <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                            </th>
                                            <th>Kê khai giá </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkkcbtn->index) && $permission->kkkcbtn->index == 1) ? 'checked' : '' }} value="1" name="roles[kkkcbtn][index]"/></td>
                                            <td>Xem</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkkcbtn->create) && $permission->kkkcbtn->create == 1) ? 'checked' : '' }} value="1" name="roles[kkkcbtn][create]"/></td>
                                            <td>Thêm mới</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkkcbtn->edit) && $permission->kkkcbtn->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkkcbtn][edit]"/></td>
                                            <td>Chỉnh sửa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkkcbtn->delete) && $permission->kkkcbtn->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkkcbtn][delete]"/></td>
                                            <td>Xóa</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" {{ (isset($permission->kkkcbtn->approve) && $permission->kkkcbtn->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkkcbtn][approve]"/></td>
                                            <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                    <div class="col-md-3">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead class="action">
                                            <tr>
                                                <th class="table-checkbox" width="5%">
                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                </th>
                                                <th>Tổng hợp giá</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thkcbtn->baocao) && $permission->thkcbtn->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thkcbtn][baocao]"/></td>
                                                <td>Báo cáo</td>
                                            </tr>

                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thkcbtn->congbo) && $permission->thkcbtn->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thkcbtn][congbo]"/></td>
                                                <td>Công bố</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thkcbtn->timkiem) && $permission->thkcbtn->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thkcbtn][timkiem]"/></td>
                                                <td>Tìm kiếm</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" {{ (isset($permission->thkcbtn->xdttdn) && $permission->thkcbtn->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thkcbtn][xdttdn]"/></td>
                                                <td>Xét duyệt thông tin doanh nghiệp</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

