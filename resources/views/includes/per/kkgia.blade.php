@if(canGeneral('kkgia','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->kkgia->index) && $permission->kkgia->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgia][index]"/> Kê khai giá hàng hóa- dịch vụ
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
                                        <th>Thông tin doanh nghiệp</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttdn->index) && $permission->ttdn->index == 1) ? 'checked' : '' }} value="1" name="roles[ttdvlt][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttdn->create) && $permission->ttdn->create == 1) ? 'checked' : '' }} value="1" name="roles[ttdvlt][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttdn->edit) && $permission->ttdn->edit == 1) ? 'checked' : '' }} value="1" name="roles[ttdvlt][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttdn->delete) && $permission->ttdn->delete == 1) ? 'checked' : '' }} value="1" name="roles[ttdvlt][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttdn->approve) && $permission->ttdn->approve == 1) ? 'checked' : '' }} value="1" name="roles[ttdn][approve]"/></td>
                                        <td>{{($model->level == 'T' || $model->level == 'H' || $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @include('includes.per.include.kkgia.kkgiadvlt')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif