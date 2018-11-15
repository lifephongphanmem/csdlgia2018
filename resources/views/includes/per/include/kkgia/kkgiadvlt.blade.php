@if($model->level == 'DVLT' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
    <div class="col-md-3">
        <table class="table table-striped table-bordered table-hover">
            <thead class="action">
            <tr>
                <th class="table-checkbox" width="5%">
                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                </th>
                <th>Danh mục DVLT</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->index) && $permission->kkdvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->create) && $permission->kkdvlt->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][create]"/></td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->edit) && $permission->kkdvlt->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][edit]"/></td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->delete) && $permission->kkdvlt->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][delete]"/></td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <table class="table table-striped table-bordered table-hover">
            <thead class="action">
            <tr>
                <th class="table-checkbox" width="5%">
                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                </th>
                <th>Kê khai giá DVLT</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->index) && $permission->kkdvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->create) && $permission->kkdvlt->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][create]"/></td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->edit) && $permission->kkdvlt->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][edit]"/></td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->delete) && $permission->kkdvlt->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][delete]"/></td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvlt->approve) && $permission->kkdvlt->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvlt][approve]"/></td>
                <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endif