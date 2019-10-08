@if(canGeneral('csdlvbqlnn','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                         CSDL văn bản quản lý nhà nước về giá
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
                                        <td width="2%"><input type="checkbox" {{ (isset($permission->csdlvbqlnn->index) && $permission->csdlvbqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[csdlvbqlnn][index]"/></td>
                                        <td>CSDL văn bản quản lý nhà nước về giá</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            @if(canGeneral('vbgia','index'))
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                            <input type="checkbox" {{ (isset($permission->vbqlnn->index) && $permission->vbqlnn->index == 1) ? 'checked' : '' }} value="1" name="roles[vbqlnn][index]"/>
                                        </th>
                                        <th>Các QĐ, VBQL, điều hành về giá</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->vbgia->index) && $permission->vbgia->index == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->vbgia->create) && $permission->vbgia->create == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->vbgia->edit) && $permission->vbgia->edit == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->vbgia->delete) && $permission->vbgia->delete == 1) ? 'checked' : '' }} value="1" name="roles[vbgia][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('chisogiatieudung','index'))
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                            <input type="checkbox" {{ (isset($permission->chisogiatieudung->index) && $permission->chisogiatieudung->index == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][index]"/>
                                        </th>
                                        <th>Chỉ số giá tiêu dùng (CPI)</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chisogiatieudung->index) && $permission->chisogiatieudung->index == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chisogiatieudung->create) && $permission->chisogiatieudung->create == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chisogiatieudung->edit) && $permission->chisogiatieudung->edit == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->chisogiatieudung->delete) && $permission->chisogiatieudung->delete == 1) ? 'checked' : '' }} value="1" name="roles[chisogiatieudung][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @endif
                            @if(canGeneral('bcthvegia','index'))
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="5%">
                                        </th>
                                        <th>DM báo cáo tổng hợp về giá</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmbcthvegia->index) && $permission->dmbcthvegia->index == 1) ? 'checked' : '' }} value="1" name="roles[dmbcthvegia][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmbcthvegia->create) && $permission->dmbcthvegia->create == 1) ? 'checked' : '' }} value="1" name="roles[dmbcthvegia][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmbcthvegia->edit) && $permission->dmbcthvegia->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmbcthvegia][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->dmbcthvegia->delete) && $permission->dmbcthvegia->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmbcthvegia][delete]"/></td>
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
                                        <th>Báo cáo tổng hợp về giá</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->bcthvegia->index) && $permission->bcthvegia->index == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->bcthvegia->create) && $permission->bcthvegia->create == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->bcthvegia->edit) && $permission->bcthvegia->edit == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->bcthvegia->delete) && $permission->bcthvegia->delete == 1) ? 'checked' : '' }} value="1" name="roles[bcthvegia][delete]"/></td>
                                        <td>Xóa</td>
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