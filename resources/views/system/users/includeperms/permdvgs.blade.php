@if($model->level == 'T' || $model->level == 'H' || $model->level == 'DVGS')
<div class="row">
    <div class="col-md-3">
        <h4 style="text-align: center;color: #0000ff">Thông tin DN DVGS</h4>
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
                <td><input type="checkbox" {{ (isset($permission->dvgs->index) && $permission->dvgs->index == 1) ? 'checked' : '' }} value="1" name="roles[dvgs][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td>
                    @if($model->level == 'DVGS')
                        <input type="checkbox" {{ (isset($permission->dvgs->create) && $permission->dvgs->create == 1) ? 'checked' : '' }} value="1" name="roles[dvgs][create]"/>@endif
                </td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td>
                    @if($model->level == 'DVGS')
                        <input type="checkbox" {{ (isset($permission->dvgs->edit) && $permission->dvgs->edit == 1) ? 'checked' : '' }} value="1" name="roles[dvgs][edit]"/>
                    @endif
                </td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td>
                    @if($model->level == 'DVGS')
                        <input type="checkbox" {{ (isset($permission->dvgs->delete) && $permission->dvgs->delete == 1) ? 'checked' : '' }} value="1" name="roles[dvgs][delete]"/>
                    @endif
                </td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" {{ (isset($permission->dvgs->approve) && $permission->dvgs->approve == 1) ? 'checked' : '' }} value="1" name="roles[dvgs][approve]"/>
                </td>
                <td>{{($model->level == 'T' || $model->level == 'H') ? 'Xét duyệt' : 'Chuyển'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-3">
        <h4 style="text-align: center;color: #0000ff  ">Kê khai DV giá sữa</h4>
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
                <td><input type="checkbox" {{ (isset($permission->kkdvgs->index) && $permission->kkdvgs->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvgs][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvgs->create) && $permission->kkdvgs->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvgs][create]"/></td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvgs->edit) && $permission->kkdvgs->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvgs][edit]"/></td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvgs->delete) && $permission->kkdvgs->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvgs][delete]"/></td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->kkdvgs->approve) && $permission->kkdvgs->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvgs][approve]"/></td>
                <td>{{($model->level == 'T' || $model->level == 'H') ? 'Xét duyệt' : 'Chuyển'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endif