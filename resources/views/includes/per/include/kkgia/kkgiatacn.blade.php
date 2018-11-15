    <div class="col-md-3">
        <table class="table table-striped table-bordered table-hover">
            <thead class="action">
            <tr>
                <th class="table-checkbox" width="5%">
                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                </th>
                <th>Kê khai giá TACN</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kktacn->index) && $permission->kktacn->index == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kktacn->create) && $permission->kktacn->create == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][create]"/></td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kktacn->edit) && $permission->kktacn->edit == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][edit]"/></td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kktacn->delete) && $permission->kktacn->delete == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][delete]"/></td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kktacn->approve) && $permission->kktacn->approve == 1) ? 'checked' : '' }} value="1" name="roles[kktacn][approve]"/></td>
                <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
            </tr>
            </tbody>
        </table>
    </div>