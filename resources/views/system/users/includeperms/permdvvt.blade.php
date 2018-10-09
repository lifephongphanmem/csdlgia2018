
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'DVVT')
<div class="row">
    <div class="col-md-3">
        <h4 style="text-align: center;color: #0000ff  ">Thông tin DN DVVT</h4>
        <table class="table table-striped table-bordered table-hover">
            <thead class="action">
            <tr>
                <th class="table-checkbox" width="5%"></th>
                <th>Chức năng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->dvvt->index) && $permission->dvvt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][index]"/></td>
                <td>Xem</td>
            </tr>
            <tr>
                <td>@if($model->level == 'DVVT')<input type="checkbox" {{ (isset($permission->dvvt->create) && $permission->dvvt->create == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][create]"/>@endif</td>
                <td>Thêm mới</td>
            </tr>
            <tr>
                <td>@if($model->level == 'DVVT')<input type="checkbox" {{ (isset($permission->dvvt->edit) && $permission->dvvt->edit == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][edit]"/>@endif</td>
                <td>Chỉnh sửa</td>
            </tr>
            <tr>
                <td>@if($model->level == 'DVVT')<input type="checkbox" {{ (isset($permission->dvvt->delete) && $permission->dvvt->delete == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][delete]"/>@endif</td>
                <td>Xóa</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ (isset($permission->dvvt->approve) && $permission->dvvt->approve == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][approve]"/></td>
                <td>{{($model->level == 'T' || $model->level == 'H') ? 'Xét duyệt' : 'Chuyển'}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
@if(canGeneral('dvvt','vtxk'))
    @if(canDVVT($setting,'dvvt','vtxk') || $model->level == 'T' || $model->level == 'H')
        <div class="col-md-3">
            <h4 style="text-align: center;color: #0000ff  ">Kê khai DVVT xe khách</h4>
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
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxk->index) && $permission->kkdvvtxk->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxk][index]"/></td>
                    <td>Xem</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxk->create) && $permission->kkdvvtxk->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxk][create]"/></td>
                    <td>Thêm mới</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxk->edit) && $permission->kkdvvtxk->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxk][edit]"/></td>
                    <td>Chỉnh sửa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxk->delete) && $permission->kkdvvtxk->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxk][delete]"/></td>
                    <td>Xóa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxk->approve) && $permission->kkdvvtxk->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxk][approve]"/></td>
                    <td>{{($model->level == 'T') ? 'Xét duyệt' : 'Chuyển'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    @endif
@endif
@if(canGeneral('dvvt','vtxb'))
    @if(canDVVT($setting,'dvvt','vtxb') || $model->level == 'T' || $model->level == 'H')
        <div class="col-md-3">
            <h4 style="text-align: center;color: #0000ff  ">Kê khai DVVT xe buýt</h4>
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
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxb->index) && $permission->kkdvvtxb->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxb][index]"/></td>
                    <td>Xem</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxb->create) && $permission->kkdvvtxb->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxb][create]"/></td>
                    <td>Thêm mới</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxb->edit) && $permission->kkdvvtxb->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxb][edit]"/></td>
                    <td>Chỉnh sửa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxb->delete) && $permission->kkdvvtxb->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxb][delete]"/></td>
                    <td>Xóa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxb->approve) && $permission->kkdvvtxb->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxb][approve]"/></td>
                    <td>{{($model->level == 'T') ? 'Xét duyệt' : 'Chuyển'}}</td>
                </tr>

                </tbody>
            </table>
        </div>
    @endif
@endif
@if(canGeneral('dvvt','vtxtx'))
    @if(canDVVT($setting,'dvvt','vtxtx') || $model->level == 'T' || $model->level == 'H')
        <div class="col-md-3">
            <h4 style="text-align: center;color: #0000ff  ">Kê khai DVVT xe taxi</h4>
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
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxtx->index) && $permission->kkdvvtxtx->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxtx][index]"/></td>
                    <td>Xem</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxtx->create) && $permission->kkdvvtxtx->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxtx][create]"/></td>
                    <td>Thêm mới</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxtx->edit) && $permission->kkdvvtxtx->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxtx][edit]"/></td>
                    <td>Chỉnh sửa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxtx->delete) && $permission->kkdvvtxtx->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxtx][delete]"/></td>
                    <td>Xóa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtxtx->approve) && $permission->kkdvvtxtx->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtxtx][approve]"/></td>
                    <td>{{($model->level == 'T') ? 'Xét duyệt' : 'Chuyển'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    @endif
@endif
@if(canGeneral('dvvt','vtch'))
    @if(canDVVT($setting,'dvvt','vtch') || $model->level == 'T' || $model->level == 'H')
        <div class="col-md-3">
            <h4 style="text-align: center;color: #0000ff  ">Kê khai DVVT chở hàng</h4>
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
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtch->index) && $permission->kkdvvtch->index == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtch][index]"/></td>
                    <td>Xem</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtch->create) && $permission->kkdvvtch->create == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtch][create]"/></td>
                    <td>Thêm mới</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtch->edit) && $permission->kkdvvtch->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtch][edit]"/></td>
                    <td>Chỉnh sửa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtch->delete) && $permission->kkdvvtch->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtch][delete]"/></td>
                    <td>Xóa</td>
                </tr>
                <tr>
                    <td><input type="checkbox" {{ (isset($permission->kkdvvtch->approve) && $permission->kkdvvtch->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkdvvtch][approve]"/></td>
                    <td>{{($model->level == 'T') ? 'Xét duyệt' : 'Chuyển'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>
@endif
