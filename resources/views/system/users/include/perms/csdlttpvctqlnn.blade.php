@if(canGeneral('csdlttpvctqlnn','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                         CSDL thông tin phục vụ công tác quản lý nhà nước về giá
                    </div>
                    <div class="tools">
                        <a href="" class="expand" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" style="display: none;">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td width="2%"><input type="checkbox" {{ (isset($permission->csdlttpvctqlnn->index) && $permission->csdlttpvctqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlttpvctqlnn][index]"/></td>
                                        <td>CSDL thông tin phục vụ công tác quản lý nhà nước về giá</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                        </th>
                                        <th>DM TT phục vụ công tác QLNN về giá</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnndm->index) && $permission->ttpvctqlnndm->index == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnndm][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnndm->create) && $permission->ttpvctqlnndm->create == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnndm][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnndm->edit) && $permission->ttpvctqlnndm->edit == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnndm][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnndm->delete) && $permission->ttpvctqlnndm->delete == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnndm][delete]"/></td>
                                        <td>Xóa</td>
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
                                        <th>TT phục vụ công tác QLNN về giá</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnn->index) && $permission->ttpvctqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnn][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnn->create) && $permission->ttpvctqlnn->create == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnn][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnn->edit) && $permission->ttpvctqlnn->edit == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnn][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->ttpvctqlnn->delete) && $permission->ttpvctqlnn->delete == 1) ? 'checked' : '' }} value="1" name="roles[ttpvctqlnn][delete]"/></td>
                                        <td>Xóa</td>
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