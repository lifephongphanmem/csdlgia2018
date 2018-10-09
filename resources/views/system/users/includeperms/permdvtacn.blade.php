@if($model->level == 'T' || $model->level == 'H' || $model->level == 'DVTACN')
<div class="row">
    <div class="col-md-3">
        <h4 style="text-align: center;color: #0000ff">Thông tin DN DVTACN</h4>
        <table class="table table-striped table-bordered table-hover">
            <thead class="action">
            <tr>
                <th class="table-checkbox" width="5%">
                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                </th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->dvtacn->index) && $permission->dvtacn->index == 1) ? 'checked' : '' }} value="1" name="roles[dvtacn][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td>@if($model->level == 'DVTACN')<input type="checkbox" {{ (isset($permission->dvtacn->create) && $permission->dvtacn->create == 1) ? 'checked' : '' }} value="1" name="roles[dvtacn][create]"/>@endif</td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td>@if($model->level == 'DVTACN')<input type="checkbox" {{ (isset($permission->dvtacn->edit) && $permission->dvtacn->edit == 1) ? 'checked' : '' }} value="1" name="roles[dvtacn][edit]"/>@endif</td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td>@if($model->level == 'DVTACN')<input type="checkbox" {{ (isset($permission->dvtacn->delete) && $permission->dvtacn->delete == 1) ? 'checked' : '' }} value="1" name="roles[dvtacn][delete]"/>@endif</td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->dvtacn->approve) && $permission->dvtacn->approve == 1) ? 'checked' : '' }} value="1" name="roles[dvtacn][approve]"/></td>
                <td>{{($model->level == 'T' || $model->level == 'H') ? 'Xét duyệt' : 'Chuyển'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <h4 style="text-align: center;color: #0000ff  ">Kê khai DVTACN</h4>
        <table class="table table-striped table-bordered table-hover">
            <thead class="action">
            <tr>
                <th class="table-checkbox" width="5%">
                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                </th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvtacn->index) && $permission->kkdvtacn->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvtacn][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvtacn->create) && $permission->kkdvtacn->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvtacn][create]"/></td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvtacn->edit) && $permission->kkdvtacn->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvtacn][edit]"/></td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvtacn->delete) && $permission->kkdvtacn->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvtacn][delete]"/></td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvtacn->approve) && $permission->kkdvtacn->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvtacn][approve]"/></td>
                <td>{{($model->level == 'T' || $model->level == 'H') ? 'Xét duyệt' : 'Chuyển'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endif