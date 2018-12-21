@if(canGeneral('bog','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X' || $model->level == 'DKG')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->bog->index) && $permission->bog->index == 1) ? 'checked' : '' }} value="1" name="roles[bog][index]"/> Bình ổn giá
                </div>
                <div class="tools">
                    <a href="" class="expand" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body form" style="display: none;">
                <div class="form-body">
                    @if($model->level == 'T' || $model->level == 'H')
                    <div class="row">
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="5%">
                                    </th>
                                    <th>Danh mục mặt hàng BOG</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->index) && $permission->dmbog->index == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->create) && $permission->dmbog->create == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->edit) && $permission->dmbog->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->dmbog->delete) && $permission->dmbog->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmbog][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                    @include('system.users.include.perms.csdlmucgiahhdv.perbog.bpbog')
                    @include('system.users.include.perms.csdlmucgiahhdv.perbog.dkg')
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif
