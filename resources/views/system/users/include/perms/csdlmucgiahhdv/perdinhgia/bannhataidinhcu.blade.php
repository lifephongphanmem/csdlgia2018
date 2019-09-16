{{--Giá bán nhà tái định cư--}}
@if(canGeneral('bannhataidinhcu','index'))
    <div class="row">
        <div class="col-md-12 ">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <input type="checkbox" {{ (isset($permission->bannhataidinhcu->index) && $permission->bannhataidinhcu->index == 1) ? 'checked' : '' }} value="1" name="roles[bannhataidinhcu][index]"/>Giá bán nhà tái định cư
                    </div>
                    <div class="tools">
                        <a href="" class="expand" data-original-title="" title="">
                        </a>
                    </div>
                </div>
                <div class="portlet-body form" style="display: none;">
                    <div class="form-body">
                        <div class="row">
                            {{--<div class="col-md-3">--}}
                            {{--<table class="table table-striped table-bordered table-hover">--}}
                            {{--<thead class="action">--}}
                            {{--<tr>--}}
                            {{--<th class="table-checkbox" width="2%">--}}
                            {{--</th>--}}
                            {{--<th>Danh mục giá bán nhà tái định cư</th>--}}

                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmbannhataidinhcu->index) && $permission->dmbannhataidinhcu->index == 1) ? 'checked' : '' }} value="1" name="roles[dmbannhataidinhcu][index]"/></td>--}}
                            {{--<td>Xem</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmbannhataidinhcu->create) && $permission->dmbannhataidinhcu->create == 1) ? 'checked' : '' }} value="1" name="roles[dmbannhataidinhcu][create]"/></td>--}}
                            {{--<td>Thêm mới</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmbannhataidinhcu->edit) && $permission->dmbannhataidinhcu->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmbannhataidinhcu][edit]"/></td>--}}
                            {{--<td>Chỉnh sửa</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmbannhataidinhcu->delete) && $permission->dmbannhataidinhcu->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmbannhataidinhcu][delete]"/></td>--}}
                            {{--<td>Xóa</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                            {{--</table>--}}
                            {{--</div>--}}
                            <div class="col-md-3">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="action">
                                    <tr>
                                        <th class="table-checkbox" width="2%">
                                        </th>
                                        <th>Kê khai giá bán nhà tái định cư</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkbannhataidinhcu->index) && $permission->kkbannhataidinhcu->index == 1) ? 'checked' : '' }} value="1" name="roles[kkbannhataidinhcu][index]"/></td>
                                        <td>Xem</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkbannhataidinhcu->create) && $permission->kkbannhataidinhcu->create == 1) ? 'checked' : '' }} value="1" name="roles[kkbannhataidinhcu][create]"/></td>
                                        <td>Thêm mới</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkbannhataidinhcu->edit) && $permission->kkbannhataidinhcu->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkbannhataidinhcu][edit]"/></td>
                                        <td>Chỉnh sửa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkbannhataidinhcu->delete) && $permission->kkbannhataidinhcu->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkbannhataidinhcu][delete]"/></td>
                                        <td>Xóa</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->kkbannhataidinhcu->approve) && $permission->kkbannhataidinhcu->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkbannhataidinhcu][approve]"/></td>
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
                                        <td><input type="checkbox" {{ (isset($permission->thbannhataidinhcu->baocao) && $permission->thbannhataidinhcu->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thbannhataidinhcu][baocao]"/></td>
                                        <td>Báo cáo tổng hợp</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thbannhataidinhcu->congbo) && $permission->thbannhataidinhcu->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thbannhataidinhcu][congbo]"/></td>
                                        <td>Công bố</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" {{ (isset($permission->thbannhataidinhcu->timkiem) && $permission->thbannhataidinhcu->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thbannhataidinhcu][timkiem]"/></td>
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