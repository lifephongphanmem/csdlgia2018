<!--Giá đất cụ thể của dự án-->
@if(canGeneral('muataisan','index'))
@if($model->level == 'T' || $model->level == 'H' || $model->level == 'X')
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <input type="checkbox" {{ (isset($permission->muataisan->index) && $permission->muataisan->index == 1) ? 'checked' : '' }} value="1" name="roles[muataisan][index]"/>Giá trúng thầu của HH-DV được mua sắm theo QĐ của PL về đấu thầu
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
                                    <th class="table-checkbox" width="2%">
                                    </th>
                                    <th>Hồ sơ giá trúng thầu của HH-DV</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsmuataisan->index) && $permission->hsmuataisan->index == 1) ? 'checked' : '' }} value="1" name="roles[hsmuataisan][index]"/></td>
                                    <td>Xem</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsmuataisan->create) && $permission->hsmuataisan->create == 1) ? 'checked' : '' }} value="1" name="roles[hsmuataisan][create]"/></td>
                                    <td>Thêm mới</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsmuataisan->edit) && $permission->hsmuataisan->edit == 1) ? 'checked' : '' }} value="1" name="roles[hsmuataisan][edit]"/></td>
                                    <td>Chỉnh sửa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsmuataisan->delete) && $permission->hsmuataisan->delete == 1) ? 'checked' : '' }} value="1" name="roles[hsmuataisan][delete]"/></td>
                                    <td>Xóa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->hsmuataisan->approve) && $permission->hsmuataisan->approve == 1) ? 'checked' : '' }} value="1" name="roles[hsmuataisan][approve]"/></td>
                                    <td>Xét duyệt</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="action">
                                <tr>
                                    <th class="table-checkbox" width="2%">
                                    </th>
                                    <th>Tổng hợp</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thmuataisan->baocao) && $permission->thmuataisan->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thmuataisan][baocao]"/></td>
                                    <td>Báo cáo tổng hợp</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thmuataisan->congbo) && $permission->thmuataisan->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thmuataisan][congbo]"/></td>
                                    <td>Công bố</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" {{ (isset($permission->thmuataisan->timkiem) && $permission->thmuataisan->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thmuataisan][timkiem]"/></td>
                                    <td>Tìm kiếm</td>
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