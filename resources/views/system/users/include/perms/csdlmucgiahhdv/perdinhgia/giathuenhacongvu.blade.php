{{--Giá thuê nhà công vụ--}}
@if(canGeneral('giathuenhacongvu','index'))
<div class="row">
    <div class="col-md-12 ">
        <!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet box yellow">
    <div class="portlet-title">
        <div class="caption">
            <input type="checkbox" {{ (isset($permission->giathuenhacongvu->index) && $permission->giathuenhacongvu->index == 1) ? 'checked' : '' }} value="1" name="roles[giathuenhacongvu][index]"/>Giá thuê nhà công vụ
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
                            {{--<th>Danh mục giá thuê nhà công vụ</th>--}}

                        {{--</tr>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmgiathuenhacongvu->index) && $permission->dmgiathuenhacongvu->index == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuenhacongvu][index]"/></td>--}}
                            {{--<td>Xem</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmgiathuenhacongvu->create) && $permission->dmgiathuenhacongvu->create == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuenhacongvu][create]"/></td>--}}
                            {{--<td>Thêm mới</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmgiathuenhacongvu->edit) && $permission->dmgiathuenhacongvu->edit == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuenhacongvu][edit]"/></td>--}}
                            {{--<td>Chỉnh sửa</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td><input type="checkbox" {{ (isset($permission->dmgiathuenhacongvu->delete) && $permission->dmgiathuenhacongvu->delete == 1) ? 'checked' : '' }} value="1" name="roles[dmgiathuenhacongvu][delete]"/></td>--}}
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
                            <th>Kê khai giá thuê nhà công vụ</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="checkbox" {{ (isset($permission->kkgiathuenhacongvu->index) && $permission->kkgiathuenhacongvu->index == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuenhacongvu][index]"/></td>
                            <td>Xem</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" {{ (isset($permission->kkgiathuenhacongvu->create) && $permission->kkgiathuenhacongvu->create == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuenhacongvu][create]"/></td>
                            <td>Thêm mới</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" {{ (isset($permission->kkgiathuenhacongvu->edit) && $permission->kkgiathuenhacongvu->edit == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuenhacongvu][edit]"/></td>
                            <td>Chỉnh sửa</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" {{ (isset($permission->kkgiathuenhacongvu->delete) && $permission->kkgiathuenhacongvu->delete == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuenhacongvu][delete]"/></td>
                            <td>Xóa</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" {{ (isset($permission->kkgiathuenhacongvu->approve) && $permission->kkgiathuenhacongvu->approve == 1) ? 'checked' : '' }} value="1" name="roles[kkgiathuenhacongvu][approve]"/></td>
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
                            <td><input type="checkbox" {{ (isset($permission->thgiathuenhacongvu->baocao) && $permission->thgiathuenhacongvu->baocao == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuenhacongvu][baocao]"/></td>
                            <td>Báo cáo tổng hợp</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" {{ (isset($permission->thgiathuenhacongvu->congbo) && $permission->thgiathuenhacongvu->congbo == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuenhacongvu][congbo]"/></td>
                            <td>Công bố</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" {{ (isset($permission->thgiathuenhacongvu->timkiem) && $permission->thgiathuenhacongvu->timkiem == 1) ? 'checked' : '' }} value="1" name="roles[thgiathuenhacongvu][timkiem]"/></td>
                            <td>Tìm kiếm</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif