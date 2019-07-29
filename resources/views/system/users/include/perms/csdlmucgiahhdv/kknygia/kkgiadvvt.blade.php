@if(canGeneral('dvvt','index'))
    @if($model->level == 'DVVT' || $model->level == 'T' || $model->level == 'H' || $model->level == 'X')
        <div class="row">
            <div class="col-md-12 ">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet box yellow">
                    <div class="portlet-title">
                        <div class="caption">
                            <input type="checkbox" {{ (isset($permission->dvvt->index) && $permission->dvvt->index == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][index]"/>Dịch vụ vận tải
                        </div>
                        <div class="tools">
                            <a href="" class="expand" data-original-title="" title="">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body form" style="display: none;">

                        <div class="form-body">
                            @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <td> <input type="checkbox" {{ (isset($permission->dvvt->xdttdn) && $permission->dvvt->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[dvvt][xdttdn]"/></td>
                                            <td>Xét duyệt thông tin doanh nghiệp</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12 ">
                                    <!-- BEGIN SAMPLE FORM PORTLET-->
                                    <!--Vận tải xe khách-->
                                    @if(canGeneral('vtxk','index'))
                                    <div class="portlet box purple">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <input type="checkbox" {{ (isset($permission->vtxk->index) && $permission->vtxk->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxk][index]"/>Vận tải xe khách
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
                                                                <th>Danh mục vận tải xe khách</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxk->index) && $permission->dmvtxk->index == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxk][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxk->create) && $permission->dmvtxk->create == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxk][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxk->edit) && $permission->dmvtxk->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxk][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxk->delete) && $permission->dmvtxk->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxk][delete]"/></td>
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
                                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                </th>
                                                                <th>Kê khai vận tải xe khách</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxk->index) && $permission->kkvtxk->index == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxk][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxk->create) && $permission->kkvtxk->create == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxk][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxk->edit) && $permission->kkvtxk->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxk][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxk->delete) && $permission->kkvtxk->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxk][delete]"/></td>
                                                                <td>Xóa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxk->approve) && $permission->kkvtxk->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxk][approve]"/></td>
                                                                <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                                        <div class="col-md-3">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead class="action">
                                                                <tr>
                                                                    <th class="table-checkbox" width="5%">
                                                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                    </th>
                                                                    <th>Tổng hợp giá vận tải xe khách</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxk->baocao) && $permission->thvtxk->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thvtxk][baocao]"/></td>
                                                                    <td>Báo cáo</td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxk->congbo) && $permission->thvtxk->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thvtxk][congbo]"/></td>
                                                                    <td>Công bố</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxk->timkiem) && $permission->thvtxk->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thvtxk][timkiem]"/></td>
                                                                    <td>Tìm kiếm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxk->xdttdn) && $permission->thvtxk->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thvtxk][xdttdn]"/></td>
                                                                    <td>Xét duyệt thông tin doanh nghiệp</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!--Vận tải xe buýt-->
                                    @if(canGeneral('vtxb','index'))
                                    <div class="portlet box purple">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <input type="checkbox" {{ (isset($permission->vtxb->index) && $permission->vtxb->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxb][index]"/>Vận tải xe buýt
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
                                                                <th>Danh mục vận tải xe buýt</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxb->index) && $permission->dmvtxb->index == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxb][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxb->create) && $permission->dmvtxb->create == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxb][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxb->edit) && $permission->dmvtxb->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxb][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxb->delete) && $permission->dmvtxb->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxb][delete]"/></td>
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
                                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                </th>
                                                                <th>Kê khai vận tải xe buýt</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxb->index) && $permission->kkvtxb->index == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxb][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxb->create) && $permission->kkvtxb->create == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxb][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxb->edit) && $permission->kkvtxb->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxb][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxb->delete) && $permission->kkvtxb->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxb][delete]"/></td>
                                                                <td>Xóa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxb->approve) && $permission->kkvtxb->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxb][approve]"/></td>
                                                                <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                                        <div class="col-md-3">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead class="action">
                                                                <tr>
                                                                    <th class="table-checkbox" width="5%">
                                                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                    </th>
                                                                    <th>Tổng hợp giá vận tải xe buýt</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxb->baocao) && $permission->thvtxb->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thvtxb][baocao]"/></td>
                                                                    <td>Báo cáo</td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxb->congbo) && $permission->thvtxb->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thvtxb][congbo]"/></td>
                                                                    <td>Công bố</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxb->timkiem) && $permission->thvtxb->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thvtxb][timkiem]"/></td>
                                                                    <td>Tìm kiếm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxb->xdttdn) && $permission->thvtxb->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thvtxb][xdttdn]"/></td>
                                                                    <td>Xét duyệt thông tin doanh nghiệp</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!--Vận tải xe taxi-->
                                    @if(canGeneral('vtxtx','index'))
                                    <div class="portlet box purple">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <input type="checkbox" {{ (isset($permission->vtxtx->index) && $permission->vtxtx->index == 1) ? 'checked' : '' }} value="1" name="roles[vtxtx][index]"/>Vận tải xe taxi
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
                                                                <th>Danh mục vận tải xe taxi</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxtx->index) && $permission->dmvtxtx->index == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxtx][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxtx->create) && $permission->dmvtxtx->create == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxtx][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxtx->edit) && $permission->dmvtxtx->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxtx][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtxtx->delete) && $permission->dmvtxtx->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmvtxtx][delete]"/></td>
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
                                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                </th>
                                                                <th>Kê khai vận tải xe taxi</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxtx->index) && $permission->kkvtxtx->index == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxtx][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxtx->create) && $permission->kkvtxtx->create == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxtx][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxtx->edit) && $permission->kkvtxtx->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxtx][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxtx->delete) && $permission->kkvtxtx->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxtx][delete]"/></td>
                                                                <td>Xóa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtxtx->approve) && $permission->kkvtxtx->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkvtxtx][approve]"/></td>
                                                                <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                                        <div class="col-md-3">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead class="action">
                                                                <tr>
                                                                    <th class="table-checkbox" width="5%">
                                                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                    </th>
                                                                    <th>Tổng hợp giá vận tải xe taxi</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxtx->baocao) && $permission->thvtxtx->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thvtxtx][baocao]"/></td>
                                                                    <td>Báo cáo</td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxtx->congbo) && $permission->thvtxtx->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thvtxtx][congbo]"/></td>
                                                                    <td>Công bố</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxtx->timkiem) && $permission->thvtxtx->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thvtxtx][timkiem]"/></td>
                                                                    <td>Tìm kiếm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtxtx->xdttdn) && $permission->thvtxtx->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thvtxtx][xdttdn]"/></td>
                                                                    <td>Xét duyệt thông tin doanh nghiệp</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!--Vận tải khác-->
                                    @if(canGeneral('vtch','index'))
                                    <div class="portlet box purple">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <input type="checkbox" {{ (isset($permission->vtch->index) && $permission->vtch->index == 1) ? 'checked' : '' }} value="1" name="roles[vtch][index]"/>Vận tải khác
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
                                                                <th>Danh mục vận tải khác</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtch->index) && $permission->dmvtch->index == 1) ? 'checked' : '' }} value="1" name="roles[dmvtch][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtch->create) && $permission->dmvtch->create == 1) ? 'checked' : '' }} value="1" name="roles[dmvtch][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtch->edit) && $permission->dmvtch->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmvtch][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->dmvtch->delete) && $permission->dmvtch->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmvtch][delete]"/></td>
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
                                                                    <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                </th>
                                                                <th>Kê khai vận tải khác</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtch->index) && $permission->kkvtch->index == 1) ? 'checked' : '' }} value="1" name="roles[kkvtch][index]"/></td>
                                                                <td>Xem</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtch->create) && $permission->kkvtch->create == 1) ? 'checked' : '' }} value="1" name="roles[kkvtch][create]"/></td>
                                                                <td>Thêm mới</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtch->edit) && $permission->kkvtch->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkvtch][edit]"/></td>
                                                                <td>Chỉnh sửa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtch->delete) && $permission->kkvtch->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkvtch][delete]"/></td>
                                                                <td>Xóa</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="checkbox" {{ (isset($permission->kkvtch->approve) && $permission->kkvtch->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkvtch][approve]"/></td>
                                                                <td>{{($model->level == 'T' || $model->level == 'H'|| $model->level == 'X') ? 'Xét duyệt' : 'Chuyển'}}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    @if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
                                                        <div class="col-md-3">
                                                            <table class="table table-striped table-bordered table-hover">
                                                                <thead class="action">
                                                                <tr>
                                                                    <th class="table-checkbox" width="5%">
                                                                        <!--input type="checkbox" class="group-checkable" data-set="#sample_3 .checkboxes"/-->
                                                                    </th>
                                                                    <th>Tổng hợp giá vận tải khác</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtch->baocao) && $permission->thvtch->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thvtch][baocao]"/></td>
                                                                    <td>Báo cáo</td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtch->congbo) && $permission->thvtch->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thvtch][congbo]"/></td>
                                                                    <td>Công bố</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtch->timkiem) && $permission->thvtch->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thvtch][timkiem]"/></td>
                                                                    <td>Tìm kiếm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="checkbox" {{ (isset($permission->thvtch->xdttdn) && $permission->thvtk->xdttdn == 1) ? 'checked' : '' }} value="1" name="roles[thvtch][xdttdn]"/></td>
                                                                    <td>Xét duyệt thông tin doanh nghiệp</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endif

