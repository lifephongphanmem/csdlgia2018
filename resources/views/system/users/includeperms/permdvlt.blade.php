@if($model->level == 'T' || $model->level == 'H' || $model->level == 'DVLT')
    <div class="row">
        <div class="col-md-3">
            <h4 style="text-align: center;color: #0000ff  ">Thông tin DN DVLT</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="action">
                <tr>
                    <th class="table-checkbox" width="5%">
                    </th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->dvlt->index) && $permission->dvlt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][index]"/></td>
                    <td>Xem</td>
                </tr>
                <tr>
                    <td>@if($model->level == 'DVLT')<input type="checkbox" {{ (isset($permission->dvlt->create) && $permission->dvlt->create == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][create]"/>@endif</td>
                    <td>Thêm mới</td>
                </tr>
                <tr>
                    <td>@if($model->level == 'DVLT')<input type="checkbox" {{ (isset($permission->dvlt->edit) && $permission->dvlt->edit == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][edit]"/>@endif</td>
                    <td>Chỉnh sửa</td>
                </tr>
                <tr>
                    <td>@if($model->level == 'DVLT')<input type="checkbox" {{ (isset($permission->dvlt->delete) && $permission->dvlt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][delete]"/>@endif</td>
                    <td>Xóa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->dvlt->approve) && $permission->dvlt->approve == 1) ? 'checked' : '' }} value="1" name="roles[dvlt][approve]"/></td>
                    <td>{{($model->level == 'T' || $model->level == 'H') ? 'Xét duyệt' : 'Chuyển'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <h4 style="text-align: center;color: #0000ff  ">Kê khai giá DVLT</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="action">
                <tr>
                    <th class="table-checkbox" width="5%">
                    </th>
                    <th>Chức năng</th>
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
                    <td>{{($model->level == 'T' || $model->level == 'H') ? 'Xét duyệt' : 'Chuyển'}}</td>
                </tr>
                </tbody>
            </table>
    </div>
    </div>
@endif